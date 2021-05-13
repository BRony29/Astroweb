<?php

namespace App\Controllers;

use App\Models\NotificationsModel;

class NotificationsController extends Controller
{
    public function index()
    {
        if ($_SESSION['user']->fonction != 0) {
            $notificationsModel = new NotificationsModel;
            $notifications = $notificationsModel->findBy(['id_Membres' => $_SESSION['user']->id]);
            $this->render('notifications/index', compact('notifications'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Suppression d'une notification
     *
     * @return void
     */
    public function supprimerNotification()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['raison']) && empty($_POST['raison'])
                    && isset($_POST['id_Asupprimer']) && !empty($_POST['id_Asupprimer'])
                ) {
                    if (!$this->verifIdExist($_POST['id_Asupprimer'], 'NotificationsModel')) {
                        header('location: /notifications/index');
                        exit;
                    }
                    $notificationsModel = new NotificationsModel;
                    $notification = $notificationsModel->find($_POST['id_Asupprimer']);
                    if ($notification->id_Membres != $_SESSION['user']->id) {
                        header('location: /notifications/index');
                        exit;
                    }
                    $traitement = $notificationsModel->delete($_POST['id_Asupprimer']);
                    header('location: /notifications/index');
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur dans le traitement<br>de votre demande.', 'redirect' => '/notifications/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Modification de la visibilité (lue / non lue) d'une notification
     *
     * @return void
     */
    public function modifierVue()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET) && !empty($_GET)) {
                    $params = explode('/', $_GET['p']);
                    if (isset($params[2])) {
                        if (!$this->verifIdExist($params[2], 'NotificationsModel')) {
                            header('location: /notifications/index');
                            exit;
                        }
                        $notificationsModel = new NotificationsModel;
                        $notification = $notificationsModel->find($params[2]);
                        if ($notification->id_Membres != $_SESSION['user']->id) {
                            header('location: /notifications/index');
                            exit;
                        }
                        if ($notification->lue == 1) {
                            $modifLue = 0;
                        } else {
                            $modifLue = 1;
                        }
                        $donnees = [
                            'lue' => $modifLue
                        ];
                        $notificationModif = $notificationsModel->hydrate($donnees);
                        $notificationsModel->update($params[2], $notificationModif);
                        header('location: /notifications/index');
                        exit;
                    }
                }
            }
            $errors = ['msg' => 'Erreur dans le traitement<br>de votre demande.', 'redirect' => '/notifications/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Modification de la visibilité de tous les messages
     *
     * @return void
     */
    public function modifierTout()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['raison']) && empty($_POST['raison'])
                    && isset($_POST['modification']) && !empty($_POST['modification'])
                ) {
                    $notificationsModel = new NotificationsModel;
                    if ($_POST['modification'] == 'lu') {
                        $notificationsModel->modificationMassive($_SESSION['user']->id, 'id_Membres', 1, 'lue');
                    } else {
                        $notificationsModel->modificationMassive($_SESSION['user']->id, 'id_Membres', 0, 'lue');
                    }
                    header('location: /notifications/index');
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur dans le traitement<br>de votre demande.', 'redirect' => '/notifications/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Supression massive de tous les messages d'un adhérent
     *
     * @return void
     */
    public function supprimerTout()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['raison']) && empty($_POST['raison'])
                ) {
                    $notificationsModel = new NotificationsModel;
                    $notificationsModel->deleteMassif($_SESSION['user']->id, 'id_Membres');
                    header('location: /notifications/index');
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur dans le traitement<br>de votre demande.', 'redirect' => '/notifications/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Suppression des notifications lues OU non lues
     *
     * @return void
     */
    public function supprimerSelection()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['raison']) && empty($_POST['raison'])
                    && isset($_POST['modification']) && !empty($_POST['modification'])
                ) {
                    $notificationsModel = new NotificationsModel;
                    if ($_POST['modification'] == 'lu') {
                        $notificationsModel->deleteMassif2($_SESSION['user']->id, 'id_Membres', 1, 'lue');
                    } else {
                        $notificationsModel->deleteMassif2($_SESSION['user']->id, 'id_Membres', 0, 'lue');
                    }
                    header('location: /notifications/index');
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur dans le traitement<br>de votre demande.', 'redirect' => '/notifications/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Envoi d'un message à un adhérent
     *
     * @return void
     */
    public function EnvoiMessage()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['raison']) && empty($_POST['raison'])
                    && isset($_POST['id_destinataire']) && !empty($_POST['id_destinataire'])
                    && isset($_POST['login_expediteur']) && !empty($_POST['login_expediteur'])
                    && isset($_POST['id_expediteur']) && !empty($_POST['id_expediteur'])
                    && isset($_POST['message']) && !empty($_POST['message'])
                ) {
                    $messagePropre = htmlspecialchars(strip_tags($_POST['message']));
                    if ($_POST['id_destinataire'] == $_POST['id_expediteur']) {
                        $message = 'Mémo :<br>« ' . $messagePropre . ' »';
                    } else {
                        $message = 'Vous avez un message de ' . $_POST['login_expediteur'] . ' : « ' . $messagePropre . ' »';
                        $message = $message . '&emsp;<button class="float-right btn btn-outline-primary btn-xs my-1 mx-2" type="button" data-toggle="modal" data-target="#ajouterModal" title="Répondre" data-whatever="' . $_POST['id_expediteur'] . '"><i class="far fa-comments"></i></button>';
                    }
                    $this->newNotification($_POST['id_destinataire'], 'message', $message);
                    if (isset($_SERVER['HTTP_REFERER']) and !empty($_SERVER['HTTP_REFERER'])) {
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        exit;
                    } else {
                        header('Location: /Main/index');
                        exit;
                    }
                }
            }
            $errors = ['msg' => 'Erreur dans le traitement<br>de votre demande.', 'redirect' => '/notifications/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }
}
