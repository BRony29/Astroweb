<?php

namespace App\Controllers;

use App\Models\ArticlesImagesModel;
use App\Models\ArticlesModel;
use App\Models\ActualitesModel;
use App\Models\MembresModel;

class ArticlesController extends Controller
{

    public function index()
    {
        $articlesModel = new ArticlesModel;
        $articles = $articlesModel->findArticlesNoContenu();
        $this->render('articles/index', compact('articles'));
    }


    /* *********************************************** Méthodes Articles adhérents ***********************************************  */


    /**
     * Méthode d'accès à la redaction d'un article par un adhérent
     *
     * @return void
     */
    public function nouvelArticle()
    {
        if ($_SESSION['user']->fonction != 0 && $_SESSION['user']->fonction != 3) {
            $this->render('articles/nouvelArticle');
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de valider et d'ajouter un article dans la blibliothèque d'articles
     *
     * @return void
     */
    public function ajoutArticle()
    {
        if ($_SESSION['user']->fonction != 0 && $_SESSION['user']->fonction != 3) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['raison']) && empty($_POST['raison'])) {
                    if (
                        isset($_POST['titre']) && !empty($_POST['titre'])
                        && isset($_POST['categorie']) && !empty($_POST['categorie'])
                        && isset($_POST['contenu']) && !empty($_POST['contenu'])
                        && isset($_POST['description']) && !empty($_POST['description'])
                    ) {
                        $categorie = htmlspecialchars(strip_tags($_POST['categorie']));
                        $titre = htmlspecialchars(strip_tags($_POST['titre']));
                        $date = date("Y-m-d");
                        // création de l'article
                        $donnees = [
                            'categorie' => $categorie,
                            'titre' => $titre,
                            'date' => $date,
                            'id_Membres' => htmlspecialchars(strip_tags($_POST['id'])),
                            'contenu' => htmlspecialchars(strip_tags($_POST['contenu'])),
                        ];
                        $articlesModel = new ArticlesModel;
                        $article = $articlesModel->hydrate($donnees);
                        $articlesModel->create($article);
                        // création de l'actualité
                        $description = htmlspecialchars(strip_tags($_POST['description']));
                        $nouvelleActu = $this->autoActualite($categorie, $titre, $date, $description);
                        // mise à jour de l'article (id_Actualites)
                        $actualitesModel = new ActualitesModel;
                        $lastActuId = $actualitesModel->findMax_id()->max_id;
                        $lastArticleId = $articlesModel->findMax_id()->max_id;
                        $donnees = [
                            'id_Actualites' => $lastActuId
                        ];
                        $article = $articlesModel->hydrate($donnees);
                        $articlesModel->update($lastArticleId, $article);
                        //notification admin
                        $membresModel = new MembresModel;
                        $adminId = $membresModel->findBy(['fonction' => 3])[0]->id;
                        $this->newNotification($adminId, 'article');
                        $moderateurs = $membresModel->findBy(['fonction' => 2]);
                        foreach ($moderateurs as $moderateur) {
                            $this->newNotification($moderateur->id, 'article');
                        }
                        $success = ['msg' => 'Votre article a été publié.', 'redirect' => '/membres/contenu'];
                        $this->render('main/success', compact('success'));
                        exit;
                    }
                    $errors = ['msg' => 'Veuillez remplir tous les champs.', 'redirect' => '/articles/nouvelArticle'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
            }
            $errors = ['msg' => 'Suite à une erreur, votre article n\'a<br>pas été pris en compte.', 'redirect' => '/nouvelArticle'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant d'afficher un article
     *
     * @return void
     */
    public function consulter()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET) && !empty($_GET)) {
                $params = explode('/', $_GET['p']);
                if (isset($params[2])) {
                    if (!$this->verifIdExist($params[2], 'ArticlesModel')) {
                        if ($_SESSION['user']->fonction >= 2) {
                            header('location: /articles/gestion');
                            exit;
                        } else {
                            header('location: /articles/index');
                            exit;
                        }
                    }
                    $articlesModel = new ArticlesModel;
                    $article = $articlesModel->find($params[2]);
                    $this->render('articles/consulter', compact('article'));
                    exit;
                }
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /* *********************************************** Méthodes Articles administrateur ***********************************************  */


    /**
     * Méthode d'accès à la gestion des articles par l'administrateur et les modérateurs
     *
     * @return void
     */
    public function gestion()
    {
        if ($_SESSION['user']->fonction >= 2) {
            $articlesModel = new ArticlesModel;
            $articles = $articlesModel->findArticlesNoContenu();
            $this->render('articles/gestionArticlesAdmin', compact('articles'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant à l'administrateur, aux modérateurs et à l'auteur de supprimer un article
     *
     * @return void
     */
    public function supprimerArticles()
    {
        if ($_SESSION['user']->fonction != 0) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['id_Asupprimer']) && !empty(($_POST['id_Asupprimer']))
            ) {
                if (!$this->verifIdExist($_POST['id_Asupprimer'], 'ArticlesModel')) {
                    header('location: /articles/gestion');
                    exit;
                }
                //Seuls son auteur, l'admin et les modérateurs peuvent le supprimer
                $articlesModel = new ArticlesModel;
                $article = $articlesModel->find($_POST['id_Asupprimer']);
                if ($article->id_Membres == $_SESSION['user']->id || $_SESSION['user']->fonction >= 2) {
                    //supprimer l'actu si elle existe
                    $idActuAsupprimer = $articlesModel->find($_POST['id_Asupprimer'])->id_Actualites;
                    if ($idActuAsupprimer != 0) {
                        $actualitesModel = new ActualitesModel;
                        if ($actualitesModel->find($idActuAsupprimer) != null) {
                            $traitement = $actualitesModel->delete($idActuAsupprimer);
                        }
                    }
                    $traitement = $articlesModel->delete($_POST['id_Asupprimer']);
                    header('Location: ' . $_SESSION['redirect']);
                    exit;
                }
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /* *********************************************** Méthodes Articles administrateur et adhérent ***********************************************  */

    /**
     * Méthode d'accès à la modification d'un article par l'administrateur, un modérateur ou son auteur
     *
     * @return void
     */
    public function editArticles()
    {
        if ($_SESSION['user']->fonction != 0) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'GET'
                && isset($_GET) && !empty($_GET)
            ) {
                $params = explode('/', $_GET['p']);
                if (isset($params[2])) {
                    // on vérifie que l'article existe : ID $params[2] existe dans la base articles, sinon on rediririge
                    if (!$this->verifIdExist($params[2], 'ArticlesModel')) {
                        if ($_SESSION['user']->fonction >= 2) {
                            header('location: /articles/gestion');
                            exit;
                        } else {
                            header('location: /membres/contenu');
                            exit;
                        }
                    }
                    // on instancie l'article à éditer.
                    $articlesModel = new ArticlesModel;
                    $article = $articlesModel->find($params[2]);
                    //Seuls son auteur, l'admin et les modérateurs peuvent le modifier
                    if ($article->id_Membres == $_SESSION['user']->id || $_SESSION['user']->fonction >= 2) {
                        $this->render('articles/editArticles', compact('article'));
                        exit;
                    } else {
                        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                }
            }
            header('location: /articles/gestion');
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode de mise à jour d'un article par l'administrateur, un modérateur ou son auteur
     *
     * @return void
     */
    public function modifierArticles()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['raison']) && empty($_POST['raison'])) {
                    if ($_POST['id_Membres'] == $_SESSION['user']->id || $_SESSION['user']->fonction >= 2) {
                        if (
                            isset($_POST['titre']) && !empty($_POST['titre'])
                            && isset($_POST['categorie']) && !empty($_POST['categorie'])
                            && isset($_POST['contenu']) && !empty($_POST['contenu'])
                        ) {
                            $donnees = [
                                'categorie' => htmlspecialchars(strip_tags($_POST['categorie'])),
                                'titre' => htmlspecialchars(strip_tags($_POST['titre'])),
                                'contenu' => htmlspecialchars(strip_tags($_POST['contenu']))
                            ];
                            $articlesModel = new ArticlesModel;
                            $article = $articlesModel->hydrate($donnees);
                            $article->update($_POST['id'], $article);
                            if ($_SESSION['user']->fonction >= 2) {
                                $success = ['msg' => 'Votre article a été mis à jour.', 'redirect' => '/articles/gestion'];
                                $this->render('main/success', compact('success'));
                                exit;
                            } else {
                                $success = ['msg' => 'Votre article a été mis à jour.', 'redirect' => '/membres/contenu'];
                                $this->render('main/success', compact('success'));
                                exit;
                            }
                        }
                        $errors = ['msg' => 'Suite à une erreur, votre article n\'a<br>pas été pris en compte.', 'redirect' => '/articles/nouvelArticle'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
            }
            $errors = ['msg' => 'Suite à une erreur, votre article n\'a<br>pas été pris en compte.', 'redirect' => '/articles/nouvelArticle'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /* *********************************************** Méthodes Bilibliothèque d'images ***********************************************  */


    /**
     * Méthode d'accès à la gestion de la bibliothèque d'images
     *
     * @return void
     */
    public function bibliothequeGestion()
    {
        if ($_SESSION['user']->fonction >= 2){
            $articlesImagesModel = new ArticlesImagesModel;
            $articlesImages = $articlesImagesModel->findAll();
            $this->render('articles/bibliothequeGestion', compact('articlesImages'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


        /**
     * Méthode d'accès à la bibliothèque d'images
     *
     * @return void
     */
    public function bibliotheque()
    {
        if ($_SESSION['user']->fonction != 0){
            $articlesImagesModel = new ArticlesImagesModel;
            $articlesImages = $articlesImagesModel->findAll();
            $this->render('articles/bibliotheque', compact('articlesImages'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de télécharger une image dans la bibilothèque d'images.
     * Vérification du format, du type et de la taille.
     * Upload et mise à jour de la BDD si tout est OK.
     *
     * @return void
     */
    public function upload()
    {

        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_FILES["fileImage"]) && $_FILES["fileImage"]["error"] == 0) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["fileImage"]["name"];
                    $filetype = $_FILES["fileImage"]["type"];
                    $filesize = $_FILES["fileImage"]["size"];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) {
                        $errors = ['msg' => 'Veuillez sélectionner un format de fichier valide.<br>Formats autorisés : .jpg, .jpeg, .gif et .png.', 'redirect' => '/articles/bibliotheque'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $maxsize = MAX_SIZE_FILE * 1024 * 1024;
                    if ($filesize > $maxsize) {
                        $errors = ['msg' => 'La taille du fichier est supérieure à la limite autorisée.', 'redirect' => '/articles/bibliotheque'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    if (in_array($filetype, $allowed)) {
                        if (file_exists("public/articles/" . $_FILES["fileImage"]["name"])) {
                            $errors = ['msg' => 'Erreur de téléchargement.<br>Un fichier portant ce nom existe déjà.', 'redirect' => '/articles/bibliotheque'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        }
                        move_uploaded_file($_FILES["fileImage"]["tmp_name"], "Public/articles/" . $_FILES["fileImage"]["name"]);
                        $articlesImagesModel = new ArticlesImagesModel;
                        $donnees = [
                            'imagePath' => $_FILES["fileImage"]["name"],
                        ];
                        $articlesImages = $articlesImagesModel->hydrate($donnees);
                        $articlesImages->create($articlesImages);
                        header('location: /articles/bibliotheque');
                        exit;
                    } else {
                        $errors = ['msg' => 'Erreur de téléchargement. La signature<br>MIME du fichier n\'est pas correcte.', 'redirect' => '/articles/bibliotheque'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                }
            }
            $errors = ['msg' => 'Il y a eu un problème de téléchargement de votre fichier.<br>Veuillez réessayer.', 'redirect' => '/articles/bibliotheque'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode de suppression d'une image de la bibliothèque d'images
     *
     * @return void
     */
    public function supprimerImages()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['id_Asupprimer']) && !empty(($_POST['id_Asupprimer']))
            ) {
                if (!$this->verifIdExist($_POST['id_Asupprimer'], 'ArticlesImagesModel')) {
                    header('location: /articles/gestion');
                    exit;
                }
                $articlesImagesModel = new ArticlesImagesModel;
                $fichier = $articlesImagesModel->find($_POST['id_Asupprimer'])->imagePath;
                unlink("Public/articles/$fichier");
                $traitement = $articlesImagesModel->delete($_POST['id_Asupprimer']);
                header('location: /articles/bibliothequeGestion');
                exit;
            }
            $errors = ['msg' => 'Erreur dans le traitement<br>de la demande !', 'redirect' => '/articles/bibliothequeGestion'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /* *********************************************** Auto actualité lors de la création d'un article ***********************************************  */


    /**
     * Méthode générant une actualité après l'ajout d'un article
     *
     * @param array $donnees
     * @return object L'actualiyé créée.
     */
    public function autoActualite(string $categorie, string $titre, string  $date, string $description)
    {
        // Sélection du dernier article créé
        $articlesModel = new ArticlesModel;
        $max_id = $articlesModel->findMax_id()->max_id;
        // création du lien hypertexte BBCode
        $lien = '[br][url=/articles/consulter/' . $max_id . ']Consultez cet article...[/url]';
        // concaténation à la description
        $description = $description . $lien;
        // Choix de l'image de l'actu avec un random entre 10 images
        $imagePath = 'newactu0' . rand(1, 10) . '.png';
        $nouvelActualite = [
            'titre' => $categorie . ': ' . $titre,
            'commentaire' => $description,
            'date' => $date,
            'imagePath' => $imagePath
        ];
        $actualitesModel = new ActualitesModel;
        $actualite = $actualitesModel->hydrate($nouvelActualite);
        $actualite->create($actualite);
    }
}
