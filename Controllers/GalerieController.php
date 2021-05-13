<?php

namespace App\Controllers;

use App\Models\GalerieModel;
use App\Models\GaleriependingModel;
use App\Models\MembresModel;

class GalerieController extends Controller
{
    /**
     * Méthode permetant d'afficher le carousel d'images
     *
     * @return void
     */
    public function index()
    {
        $galerieModel = new GalerieModel;
        $galeries = $galerieModel->findAll();
        if ($_SESSION['user']->fonction == 0) {
            $galeriePath = array("galeriePath" => "/public/filigranes/");
        } else {
            $galeriePath = array("galeriePath" => "/public/galeries/");
        }
        $this->render('galerie/index', compact('galeries'), compact('galeriePath'));
    }


    /**
     * Méthode permettant l'accès à la gestion de la galerie de photos pour l'administrateur
     *
     * @return void
     */
    public function gestionGalerieAdmin()
    {
        if ($_SESSION['user']->fonction >= 2) {
            $galerieModel = new GalerieModel;
            $galeriependingModel = new GaleriependingModel;
            $galeries = $galerieModel->findAll();
            $pendings = $galeriependingModel->findPendingLogin();
            $this->render('galerie/gestionGalerieAdmin', compact('galeries'), compact('pendings'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant d'ajouter des photos avec et sans filigrane ainsi que des aperçus dans les galeries.
     * Vérification du format, du type et de la taille. Vérification de la résolution (300 x 200) de la vignette.
     * Upload et mise à jour de la BDD si tout est OK.
     *
     * @return void
     */
    public function upload()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Vérifie si les fichiers photo ont été uploadés sans erreur.
                if (
                    isset($_FILES["fileImage"]) && $_FILES["fileImage"]["error"] == 0
                    && isset($_FILES["fileThumb"]) && $_FILES["fileThumb"]["error"] == 0
                    && isset($_FILES["fileFiligrane"]) && $_FILES["fileFiligrane"]["error"] == 0
                ) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["fileImage"]["name"];
                    $filetype = $_FILES["fileImage"]["type"];
                    $filesize = $_FILES["fileImage"]["size"];
                    $filenameThumb = $_FILES["fileThumb"]["name"];
                    $filetypeThumb = $_FILES["fileThumb"]["type"];
                    $filesizeThumb = $_FILES["fileThumb"]["size"];
                    $filenameFiligrane = $_FILES["fileFiligrane"]["name"];
                    $filetypeFiligrane = $_FILES["fileFiligrane"]["type"];
                    $filesizeFiligrane = $_FILES["fileFiligrane"]["size"];
                    // Vérifie l'extension du fichier photo
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) {
                        $errors = ['msg' => 'Veuillez sélectionner un format de fichier valide.<br>Formats autorisés : .jpg, .jpeg, .gif et .png.', 'redirect' => '/galerie/gestionGalerieAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    // Vérifie l'extension du fichier thumb
                    $ext = pathinfo($filenameThumb, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) {
                        $errors = ['msg' => 'Veuillez sélectionner un format de fichier valide.<br>Formats autorisés : .jpg, .jpeg, .gif et .png.', 'redirect' => '/galerie/gestionGalerieAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    // Vérifie l'extension du fichier filigrane
                    $ext = pathinfo($filenameFiligrane, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) {
                        $errors = ['msg' => 'Veuillez sélectionner un format de fichier valide.<br>Formats autorisés : .jpg, .jpeg, .gif et .png.', 'redirect' => '/galerie/gestionGalerieAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    // Vérifie la taille du fichier photo et filigrane - MAX_SIZE_FILE Mo maximum
                    $maxsize = MAX_SIZE_FILE * 1024 * 1024;
                    if ($filesize > $maxsize || $filesizeFiligrane > $maxsize) {
                        $errors = ['msg' => 'La taille d\'un des fichiers est supérieure à la limite autorisée.', 'redirect' => '/galerie/gestionGalerieAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    // Vérifie la taille du fichier thumb - 100 ko maximum
                    $maxsize = MAX_SIZE_THUMB / 1000 * 1024 * 1024;
                    if ($filesizeThumb > $maxsize) {
                        $errors = ['msg' => 'La taille d\'un des fichiers est supérieure à la limite autorisée.', 'redirect' => '/galerie/gestionGalerieAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    // Vérifie le type MIME des fichiers
                    if (in_array($filetype, $allowed) && in_array($filetypeThumb, $allowed) && in_array($filetypeFiligrane, $allowed)) {
                        // Vérifie si le fichier existe avant de le télécharger.
                        if (file_exists("public/galeries/" . $_FILES["fileImage"]["name"])) {
                            $errors = ['msg' => 'Erreur de téléchargement.<br>Un fichier portant ce nom existe déjà.', 'redirect' => '/galerie/gestionGalerieAdmin'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        } else {
                            move_uploaded_File($_FILES["fileThumb"]["tmp_name"], "Public/thumb/" . $_FILES["fileImage"]["name"]);
                            $vignette = 'Public/thumb/' . $_FILES["fileImage"]["name"];
                            $infosVignette = getImageSize($vignette);
                            $largeur = $infosVignette[0];
                            $hauteur = $infosVignette[1];
                            if ($largeur != 300 || $hauteur != 200) {
                                unlink($vignette);
                                $errors = ['msg' => 'La vignette doit avoir la résolution<br>300px x 200px.', 'redirect' => '/galerie/gestionGalerieAdmin'];
                                $this->render('main/errors', compact('errors'));
                                exit;
                            }
                            move_uploaded_file($_FILES["fileImage"]["tmp_name"], "Public/galeries/" . $_FILES["fileImage"]["name"]);
                            move_uploaded_file($_FILES["fileFiligrane"]["tmp_name"], "Public/filigranes/" . $_FILES["fileImage"]["name"]);
                            $galerieModel = new GalerieModel;
                            $donnees = [
                                'dataCaption' => htmlspecialchars(strip_tags($_POST['description'])),
                                'imagePath' => $_FILES["fileImage"]["name"],
                            ];
                            $galerie = $galerieModel->hydrate($donnees);
                            $galerieModel->create($galerie);
                            header('location: /galerie/gestionGalerieAdmin');
                            exit;
                        }
                    } else {
                        $errors = ['msg' => 'Erreur de téléchargement. La signature<br>MIME du fichier n\'est pas correcte.', 'redirect' => '/galerie/gestionGalerieAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                } else {
                    $errors = ['msg' => 'Il y a eu un problème de téléchargement de votre fichier.<br>Veuillez réessayer.', 'redirect' => '/galerie/gestionGalerieAdmin'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de soumettre une photo avec un commentaire.
     * Vérification du format, du type et de la taille.
     * Upload et mise à jour de la BDD si tout est OK.
     * Envoi d'un mail à l'admin pour validation.
     *
     * @return void
     */
    public function soumettre()
    {
        if ($_SESSION['user']->fonction != 0 && $_SESSION['user']->fonction != 3) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_FILES["fileImage"]) && $_FILES["fileImage"]["error"] == 0) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["fileImage"]["name"];
                    $filetype = $_FILES["fileImage"]["type"];
                    $filesize = $_FILES["fileImage"]["size"];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) {
                        $errors = ['msg' => 'Veuillez sélectionner un format de fichier valide.<br>Formats autorisés : .jpg, .jpeg, .gif et .png.', 'redirect' => '/administration/menuAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $maxsize = MAX_SIZE_FILE * 1024 * 1024;
                    if ($filesize > $maxsize) {
                        $errors = ['msg' => 'La taille du fichier est supérieure à la limite autorisée.', 'redirect' => '/administration/menuAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    if (in_array($filetype, $allowed)) {
                        if (file_exists("public/pending/" . $_FILES["fileImage"]["name"])) {
                            $errors = ['msg' => 'Un fichier portant ce nom existe déjà.', 'redirect' => '/administration/menuAdmin'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        }
                        move_uploaded_file($_FILES["fileImage"]["tmp_name"], "Public/pending/" . $_FILES["fileImage"]["name"]);
                        $galeriependingModel = new GaleriependingModel;
                        $donnees = [
                            'description' => htmlspecialchars(strip_tags($_POST['description'])),
                            'imagePath' => $_FILES["fileImage"]["name"],
                            'id_Membres' => $_SESSION['user']->id
                        ];
                        $uploadGalerie = $galeriependingModel->hydrate($donnees);
                        $uploadGalerie->create($uploadGalerie);
                        //notification admin et modérateurs
                        $membresModel = new MembresModel;
                        $adminId = $membresModel->findBy(['fonction'=>3])[0]->id;
                        $this->newNotification($adminId, 'galerie');
                        $moderateurs = $membresModel->findBy(['fonction'=>2]);
                        foreach ($moderateurs as $moderateur){
                            $this->newNotification($moderateur->id, 'galerie');
                        }
                        header('location: /membres/contenu');
                        exit;
                    } else {
                        $errors = ['msg' => 'Erreur de téléchargement. La signature<br>MIME du fichier n\'est pas correcte.', 'redirect' => '/administration/menuAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                } else {
                    $errors = ['msg' => 'Il y a eu un problème de téléchargement de votre fichier.<br>Veuillez réessayer.', 'redirect' => '/administration/menuAdmin'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode de suppression d'une photo de la galerie
     *
     * @return void
     */
    public function supprimerGalerie()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['id_Asupprimer']) && !empty(($_POST['id_Asupprimer']))
            ) {
                if (!$this->verifIdExist($_POST['id_Asupprimer'], 'GalerieModel')) {
                    header('location: /galerie/gestionGalerieAdmin');
                    exit;
                }
                $galerieModel = new GalerieModel;
                //suppression des fichiers du hdd
                $fichier = $galerieModel->find($_POST['id_Asupprimer'])->imagePath;
                unlink("Public/galeries/$fichier");
                unlink("Public/thumb/$fichier");
                unlink("Public/filigranes/$fichier");
                //suppression du fichier de la BDD
                $traitement = $galerieModel->delete($_POST['id_Asupprimer']);
            }
            header('location: /galerie/gestionGalerieAdmin');
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de modifier la description d'une photo
     *
     * @return void
     */
    public function modifierPhoto()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_POST['raison']) && empty($_POST['raison'])){
                    if (isset($_POST['dataCaption']) && !empty($_POST['dataCaption'])) {
                        if (!$this->verifIdExist($_POST['id'], 'GalerieModel')) {
                            header('location: /galerie/gestionGalerieAdmin');
                            exit;
                        }
                        $donnee = [
                            'dataCaption' => htmlspecialchars(strip_tags($_POST['dataCaption']))
                        ];
                        $galerieModel = new GalerieModel;
                        $galerie = $galerieModel->hydrate($donnee);
                        $galerieModel->update($_POST['id'], $galerie);
                        header('location: /galerie/gestionGalerieAdmin');
                        exit;
                    }
                }
            }
            $errors = ['msg' => 'Erreur lors de la mise à jour.', 'redirect' => '/galerie/gestionGalerieAdmin'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    public function supprimerPending()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['id_Asupprimer']) && !empty(($_POST['id_Asupprimer']))
            ) {
                if (!$this->verifIdExist($_POST['id_Asupprimer'], 'GaleriependingModel')) {
                    header('location: /galerie/gestionGalerieAdmin');
                    exit;
                }
                $galeriependingModel = new GaleriependingModel;
                //suppression des fichiers du hdd
                $fichier = $galeriependingModel->find($_POST['id_Asupprimer'])->imagePath;
                unlink("Public/pending/$fichier");
                //suppression du fichier de la BDD
                $traitement = $galeriependingModel->delete($_POST['id_Asupprimer']);
            }
            header('location: /galerie/gestionGalerieAdmin');
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }
}
