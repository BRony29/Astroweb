<?php

namespace App\Controllers;

use App\Models\ActualitesModel;

class ActualitesController extends Controller
{
    public function index()
    {
        $actualitesModel = new ActualitesModel;
        $actualites = $actualitesModel->findAllDesc();
        $this->render('actualites/index', compact('actualites'));
    }


    /**
     *  Méthode d'accès au tableau de gestion des actualités
     *
     * @return void
     */
    public function gestion()
    {
        if ($_SESSION['user']->fonction >= 2) {
            $actualitesModel = new ActualitesModel;
            $actualites = $actualitesModel->findAllDesc();
            $this->render('actualites/gestionActualitesAdmin', compact('actualites'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant l'ajout d'actualité
     *
     * @return void
     */
    public function ajoutActualites()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (
                $_SERVER["REQUEST_METHOD"] == "POST"
                && isset($_POST['raison']) && empty($_POST['raison'])
            ) {
                if (
                    isset($_FILES["fileVignette"]) && $_FILES["fileVignette"]["error"] == 0
                    && isset($_POST['titre']) && !empty($_POST['titre'])
                    && isset($_POST['commentaire']) && !empty($_POST['commentaire'])
                ) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["fileVignette"]["name"];
                    $filetype = $_FILES["fileVignette"]["type"];
                    $filesize = $_FILES["fileVignette"]["size"];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) {
                        $errors = ['msg' => 'Veuillez sélectionner un format de fichier valide.<br>Formats autorisés : .jpg, .jpeg, .gif et .png.', 'redirect' => '/actualites/gestion'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $maxsize = MAX_SIZE_THUMB / 1000 * 1024 * 1024;
                    if ($filesize > $maxsize) {
                        $errors = ['msg' => 'Le poids du fichier est supérieur à<br>la limite autorisée.', 'redirect' => '/actualites/gestion'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    if (in_array($filetype, $allowed)) {
                        if (file_exists("public/actualites/" . $_FILES["fileVignette"]["name"])) {
                            $errors = ['msg' => 'Un fichier portant ce<br>nom existe déjà.', 'redirect' => '/actualites/gestion'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        } else {
                            move_uploaded_file($_FILES["fileVignette"]["tmp_name"], "Public/actualites/" . $_FILES["fileVignette"]["name"]);
                            $vignette = 'Public/actualites/' . $_FILES["fileVignette"]["name"];
                            $infosVignette = getImageSize($vignette);
                            $largeur = $infosVignette[0];
                            $hauteur = $infosVignette[1];
                            if ($largeur != 300 || $hauteur != 200) {
                                unlink($vignette);
                                $errors = ['msg' => 'La vignette doit avoir la résolution<br>300px x 200px.', 'redirect' => '/actualites/gestion'];
                                $this->render('main/errors', compact('errors'));
                                exit;
                            }
                            $actualitesModel = new ActualitesModel;
                            $donnees = [
                                'titre' => htmlspecialchars(strip_tags($_POST['titre'])),
                                'commentaire' => htmlspecialchars(strip_tags($_POST['commentaire'])),
                                'imagePath' => $filename,
                                'date' => date("Y-m-d")
                            ];
                            $actualite = $actualitesModel->hydrate($donnees);
                            $actualite->create($actualite);
                            header('location: /actualites/gestion');
                            exit;
                        }
                    }
                    $errors = ['msg' => 'La signature du fichier<br>n\'est pas correcte.', 'redirect' => '/actualites/gestion'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                $errors = ['msg' => 'Veuillez remplir tous les champs.', 'redirect' => '/actualites/gestion'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
            $errors = ['msg' => 'Erreur de traitement', 'redirect' => '/main/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant à l'administrateur de supprimer une actualité
     *
     * @return void
     */
    public function supprimerActualites()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['id_Asupprimer']) && !empty(($_POST['id_Asupprimer']))
            ) {
                if (!$this->verifIdExist($_POST['id_Asupprimer'], 'ActualitesModel')) {
                    header('location: /actualites/gestion');
                    exit;
                }
                $actualitesModel = new ActualitesModel;
                $fichier = $actualitesModel->find($_POST['id_Asupprimer'])->imagePath;
                $actu = ['newactu01.png', 'newactu02.png', 'newactu03.png', 'newactu04.png', 'newactu05.png'];
                if (!in_array($fichier, $actu)) {
                    unlink("Public/actualites/$fichier");
                }
                $traitement = $actualitesModel->delete($_POST['id_Asupprimer']);
                header('location: /actualites/gestion');
                exit;
            }
            $errors = ['msg' => 'Erreur de traitement !', 'redirect' => '/main/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de modifier une actualité
     *
     * @return void
     */
    public function modifieActualites()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['raison']) && empty($_POST['raison'])) {
                    if (
                        isset($_POST['titre']) && !empty($_POST['titre'])
                        && isset($_POST['commentaire']) && !empty($_POST['commentaire'])
                        && isset($_POST['id']) && !empty($_POST['id'])
                    ) {
                        if (!$this->verifIdExist($_POST['id'], 'ActualitesModel')) {
                            header('location: /actualites/gestion');
                            exit;
                        }
                        $donnee = [
                            'titre' => htmlspecialchars(strip_tags($_POST['titre'])),
                            'commentaire' => htmlspecialchars(strip_tags($_POST['commentaire']))
                        ];
                        $actualitesModel = new ActualitesModel;
                        $actualite = $actualitesModel->hydrate($donnee);
                        $actualitesModel->update($_POST['id'], $actualite);
                        header('location: /actualites/gestion');
                        exit;
                    }
                    $errors = ['msg' => 'Veuillez remplir tous les champs.', 'redirect' => '/actualites/gestion'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur de traitement', 'redirect' => '/main/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }

}
