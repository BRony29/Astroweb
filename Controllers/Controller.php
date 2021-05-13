<?php

namespace App\Controllers;

use App\Models\ActualitesModel;
use App\Models\ArticlesImagesModel;
use App\Models\ArticlesModel;
use App\Models\EvenementsModel;
use App\Models\GalerieModel;
use App\Models\GaleriependingModel;
use App\Models\LivredorsModel;
use App\Models\MembresModel;
use App\Models\F_categoriesModel;
use App\Models\F_souscategoriesModel;
use App\Models\F_topicsModel;
use App\Models\F_messagesModel;
use App\Models\NotificationsModel;
use App\Models\SettingsModel;

abstract class Controller
{
    /**
     * Envoi des infos collectées à la vue afin d'afficher la page demandée
     *
     * @param string $fichier
     * @param array $donnees
     * @param array $donnees2
     * @return void
     */
    public function render(string $fichier, array $donnees = [], array $donnees2 = [], array $donnees3 = [], array $donnees4 = [], array $donnees5 = [])
    {
        extract($donnees);
        extract($donnees2);
        extract($donnees3);
        extract($donnees4);
        extract($donnees5);
        ob_start();
        require_once ROOT . '/App/views/header.php';
        $header = ob_get_clean();
        ob_start();
        require_once ROOT . '/App/views/menu.php';
        $menu = ob_get_clean();
        ob_start();
        require_once ROOT . '/App/views/' . $fichier . '.php';
        $contenu = ob_get_clean();
        ob_start();
        require_once ROOT . '/App/views/footer.php';
        $footer = ob_get_clean();
        require_once ROOT . '/App/views/default.php';
    }


    /**
     * Connection utilisateur et ouverture de session
     * 
     * @return void
     */
    public function connexion()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //// Traitement des entrées $_POST contre les erreurs et les intrusions
            if (
                !isset($_POST['login']) || !isset($_POST['MotDePasse'])
                || empty(($_POST['login'])) || empty($_POST['MotDePasse'])
            ) {
                $errors = ['msg' => 'Login ou mot de passe incorrect.', 'redirect' => '/administration/login'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
            $login = htmlspecialchars(strip_tags($_POST['login']));
            $motDePasse = htmlspecialchars(strip_tags($_POST['MotDePasse']));
            $membresModel = new MembresModel;
            //// connection superAdmin (reset compte administrateur)
            $settingsModel = new SettingsModel();
            $settings  = $settingsModel->find(1);
            $superadminLogin = $settings->superadminLogin;
            $superadminPwd = $settings->superadminPwd;
            if ($login === $superadminLogin) {
                if (password_verify($motDePasse, $superadminPwd)) {
                    $donnees = [
                        'login' => 'admin',
                        'pwd' => '$2y$10$2QG/xyzFfFh2zr5uH6H2wusv3I5gPG3gceIAyc4H9KuSEAE1zipMO',
                        'actif' => '1',
                        'loginError' => 0
                    ];
                    $administrateur = $membresModel->findby(['fonction' => 0])[0];
                    $administrateurReset = $membresModel->hydrate($donnees);
                    $membresModel->update($administrateur->id, $administrateurReset);
                    unset($administrateur);
                    unset($administrateurReset);
                    unset($superadministrateur);
                    $exit = new MembresController;
                    $exit->logout();
                }
            }
            //// Connection
            $membre = $membresModel->findBy(['login' => $login]);
            // vérifier que la taille du tableau récupérer est égale à 0. Si oui le compte n'existe pas , sinon il existe et on continue
            if (count($membre) == 0) {
                $errors = ['msg' => 'Login ou mot de passe incorrect.', 'redirect' => '/administration/login'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
            $membre = $membre[0];
            // vérifier si le compte est actif; s'il ne l'est pas : erreur
            if ($membre->actif === '0') {
                $errors = ['msg' => 'Votre compte est désactivé ou verrouillé.<br>Contactez votre Administrateur.', 'redirect' => '/main/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
            //vérifier le mot de passe, s'il n'est pas bon : erreur et incrémentation compteur d'erreur.
            $verify = password_verify($motDePasse, $membre->pwd);
            if (!$verify) {
                $membre->loginError += 1;
                $donnees = ['loginError' => $membre->loginError];
                $traitement = $membresModel->hydrate($donnees);
                $membresModel->update($membre->id, $traitement);
                if ($membre->loginError >= MAX_LOGIN_ERROR) {
                    $donnees = ['actif' => 0];
                    $traitement = $membresModel->hydrate($donnees);
                    $membresModel->update($membre->id, $traitement);
                    $errors = ['msg' => 'Votre compte est désactivé ou verrouillé.<br>Contactez votre Administrateur.', 'redirect' => '/main/index'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                $errors = ['msg' => 'Login ou mot de passe incorrect.', 'redirect' => '/administration/login'];
                $this->render('main/errors', compact('errors'));
                exit;
                // le mot de passe est le bon : connexion
            } else {
                $_SESSION['user'] = $membre;
                // if (isset($_COOKIE['accept_cookie'])) {
                //     setcookie("pegase", $_SESSION['user']->login, time() + 365 * 24 * 3600, '/', null, false, true);
                // }
                setcookie("pegase", $_SESSION['user']->login, time() + 365 * 24 * 3600, '/', null, false, true);
                if ($membre->loginError > 0) {
                    $donnees = ['loginError' => 0];
                    $traitement = $membresModel->hydrate($donnees);
                    $membresModel->update($membre->id, $traitement);
                }
                $notificationsModel = new NotificationsModel;
                $notifs = [
                    'notifslues' => count($notificationsModel->findBy(['id_Membres' => $membre->id, 'lue' => 1])),
                    'notifsnonlues' => count($notificationsModel->findBy(['id_Membres' => $membre->id, 'lue' => 0]))
                ];
                $this->render('administration/loginSuccess', compact('notifs'));
                exit;
            }
        }
        header('location: /Main/index');
    }


    /**
     * Déconnexion de l'utilisateur et cloture de la session
     * @return exit 
     */
    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: ' . '/');
        exit;
    }


    /**
     * vérification si un login existe dans la table
     *
     * @param string $login
     * @param integer $id
     * @return bool true si existe, false sinon
     */
    public function verifExistLogin(string $login, int $id = null)
    {
        $membresModel = new MembresModel;
        $membres = $membresModel->findAll();
        if (is_null($id)) {
            foreach ($membres as $membre) {
                if ($membre->login == $login) {
                    return true;
                }
            }
        } else {
            foreach ($membres as $membre) {
                if ($membre->login == $login && $membre->id != $id) {
                    return true;
                }
            }
        }
        return false;
    }


    /**
     * Methode permettant d'invalider un changement de mot de passe s'il contient certains caractères.
     *
     * @param string $aVerifier
     * @return boolean
     */
    public function validPassword(string $aVerifier): bool
    {
        $tabs = ['\\', '/', '<', '>', '&', '\'', '"'];
        foreach ($tabs as $tab) {
            if (strpos($aVerifier, $tab)) return false;
        }
        return true;
    }


    /**
     * Méthode permettant de déterminer si un id existe dans une table
     *
     * @param integer $id ID à rechercher dans la table
     * @param string $table Table dans laquelle effectuer la recherche
     * @return bool
     */
    public function verifIdExist(int $id, string $table)
    {
        switch ($table) {
            case 'ArticlesModel':
                $tableModel = new ArticlesModel;
                break;
            case 'ActualitesModel':
                $tableModel = new ActualitesModel;
                break;
            case 'ArticlesImagesModel':
                $tableModel = new ArticlesImagesModel;
                break;
            case 'EvenementsModel':
                $tableModel = new EvenementsModel;
                break;
            case 'GalerieModel':
                $tableModel = new GalerieModel;
                break;
            case 'GaleriependingModel':
                $tableModel = new GaleriependingModel;
                break;
            case 'LivredorsModel':
                $tableModel = new LivredorsModel;
                break;
            case 'MembresModel':
                $tableModel = new MembresModel;
                break;
            case 'F_souscategoriesModel':
                $tableModel = new F_souscategoriesModel;
                break;
            case 'F_categoriesModel':
                $tableModel = new F_categoriesModel;
                break;
            case 'F_topicsModel':
                $tableModel = new F_topicsModel;
                break;
            case 'F_messagesModel':
                $tableModel = new F_messagesModel;
                break;
            case 'NotificationsModel':
                $tableModel = new NotificationsModel;
                break;
            default:
                return false;
                break;
        }
        $resultat = $tableModel->findBy(['id' => $id]);
        if (count($resultat) == 1) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Méthode créant une nouvelle notification
     *
     * @param integer $id ID de l'adhérent à notifier
     * @param string $type Type de notification
     * @return void
     */
    public function newNotification(int $id, string $type, string $message = NULL)
    {
        switch ($type) {
            case 'galerie':
                $titre = strftime('Le %x à %T', strtotime(date("Y-m-d H:i:s" ))).' : Une nouvelle photo a été déposé et est en attente.';
                break;
            case 'article':
                $titre = strftime('Le %x à %T', strtotime(date("Y-m-d H:i:s" ))).' : Un nouvel article a été rédigé et publié.';
                break;
            case 'message':
                $titre = $message;
                break;
            case 'livredor':
                $titre =  strftime('Le %x à %T', strtotime(date("Y-m-d H:i:s" ))).' : Un nouveau commentaire a été publié dans le livre d\'or.';
                break;
        }
        $donnees = [
            'titre' => $titre,
            'lue' => false,
            'id_Membres' => $id
        ];
        $notificationsModel = new NotificationsModel;
        $notification = $notificationsModel->hydrate($donnees);
        $notificationsModel->create($notification);
    }

}
