<?php

namespace Astroweb\Controllers;

use Astroweb\Models\MembresModel;
use Astroweb\Models\SettingsModel;
use Astroweb\Models\ArticlesModel;

class MembresController extends Controller
{
    /**
     * cette méthode affichera une page listant toutes les adhérants de l'association
     *
     * @return void
     */
    public function index()
    {

        if ($_SESSION['user']->fonction >= 2) {
            $membresModel = new MembresModel;
            $membres = $membresModel->findAllLogin();
            $this->render('membres/index', compact('membres'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Cette méthode permet d'activer et de désactiver un compte
     *
     * @return void
     */
    public function actifMembre()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (isset($_GET) && !empty($_GET)) {
                $params = explode('/', $_GET['p']);
                if (isset($params[2])) {
                    if (!$this->verifIdExist($params[2], 'MembresModel')) {
                        header('location: /membres/index');
                        exit;
                    }
                    $membresModel = new MembresModel;
                    $membre = $membresModel->find($params[2]);
                    if ($membre->actif == '1') {
                        $donnees = ['actif' => 0];
                    } else {
                        $donnees = ['actif' => 1, 'loginError' => 0];
                    }
                    $traitement = $membresModel->hydrate($donnees);
                    $membresModel->update($params[2], $traitement);
                    header('location: /membres/index');
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur dans le traiement de votre demande', 'redirect' => '/membres/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Cette méthode permet de supprimer un adhérant
     *
     * @return void
     */
    public function supprimerMembre()
    {

        if ($_SESSION['user']->fonction >= 2) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['id_Asupprimer']) && !empty(($_POST['id_Asupprimer']))
            ) {
                if (!$this->verifIdExist($_POST['id_Asupprimer'], 'MembresModel')) {
                    header('location: /membres/index');
                    exit;
                }
                $membresModel = new MembresModel;
                // si je suis modérateur, vérifier si le membre à supprimer n'est pas un modorateur, si oui : NIET
                $membreASupprimer = $membresModel->find($_POST['id_Asupprimer']);
                if ($membreASupprimer->fonction == 2 && $_SESSION['user']->fonction == 2) {
                    $errors = ['msg' => 'Action interdite', 'redirect' => '/administration/menuAdmin'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                $traitement = $membresModel->delete($_POST['id_Asupprimer']);
                header('location: /membres/index');
                exit;
            }
            $errors = ['msg' => 'Erreur dans le traiement de votre demande', 'redirect' => '/membres/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Cette méthode permet de visualiser et de modifier un adhérant
     *
     * @return void
     */
    public function detailMembre()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (isset($_GET) && !empty($_GET)) {
                $params = explode('/', $_GET['p']);
                if (isset($params[2])) {
                    if (!$this->verifIdExist($params[2], 'MembresModel')) {
                        header('location: /membres/index');
                        exit;
                    }
                    $membresModel = new MembresModel;
                    // si je suis modérateur, vérifier si le membre à modifier n'est pas un modérateur, si oui : NIET
                    $membreASupprimer = $membresModel->find($params[2]);
                    if ($membreASupprimer->fonction == 2 && $_SESSION['user']->fonction == 2) {
                        $errors = ['msg' => 'Action interdite', 'redirect' => '/administration/menuAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $membre = $membresModel->find($params[2]);
                    $this->render('membres/details', compact('membre'));
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur dans le traiement de votre demande', 'redirect' => '/membres/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Cette méthode permet de confirmer les modifications d'un adhérant par l'administrateur
     *
     * @return void
     */
    public function modifierMembre()
    {
        if ($_SESSION['user']->fonction >= 2) {
            $membresModel = new MembresModel;
            if (
                isset($_POST['login']) && !empty($_POST['login'])
                && isset($_POST['nom']) && !empty($_POST['nom'])
                && isset($_POST['prenom']) && !empty($_POST['prenom'])
            ) {
                if ($this->verifExistLogin($_POST['login'], $_POST['id'])) {
                    $errors = ['msg' => 'Ce login est déjà utlisé.', 'redirect' => '/membres/index'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
                    $errors = ['msg' => 'Format Email invalide !', 'redirect' => '/membres/index'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                if ($_POST['actif'] == 'non') {
                    $actif = 0;
                } else {
                    $actif = 1;
                }
                $donnees = [
                    'id' => $_POST['id'],
                    'login' => htmlspecialchars(strip_tags($_POST['login'])),
                    'nom' => htmlspecialchars(strip_tags($_POST['nom'])),
                    'prenom' => htmlspecialchars(strip_tags($_POST['prenom'])),
                    'adresse' => htmlspecialchars(strip_tags($_POST['adresse'])),
                    'codePostale' => htmlspecialchars(strip_tags($_POST['codePostale'])),
                    'ville' => htmlspecialchars(strip_tags($_POST['ville'])),
                    'tel' => htmlspecialchars(strip_tags($_POST['tel'])),
                    'email' => htmlspecialchars(strip_tags($_POST['email'])),
                    'actif' => $actif
                ];
                $membre = $membresModel->hydrate($donnees);
                $membresModel->update($_POST['id'], $membre);
                header('location: /membres/index');
                exit;
            }
            $errors = ['msg' => 'Erreur dans le traiement de votre demande', 'redirect' => '/membres/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode confirmant l'ajout d'un nouvel adhérant
     *
     * @return void
     */
    public function ajoutMembreConfirme()
    {

        if ($_SESSION['user']->fonction >= 2) {
            $membresModel = new MembresModel;
            if (
                isset($_POST['login']) && !empty($_POST['login'])
                && isset($_POST['nom']) && !empty($_POST['nom'])
                && isset($_POST['prenom']) && !empty($_POST['prenom'])
            ) {
                if ($this->verifExistLogin($_POST['login'])) {
                    $errors = ['msg' => 'Ce login est déjà utlisé.', 'redirect' => '/membres/index'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                $settingsModel = new SettingsModel;
                $settings = $settingsModel->find(1);
                $donnees = [
                    'login' => htmlspecialchars(strip_tags($_POST['login'])),
                    'nom' => htmlspecialchars(strip_tags($_POST['nom'])),
                    'prenom' => htmlspecialchars(strip_tags($_POST['prenom'])),
                    'adresse' => 'A remplir',
                    'codePostale' => 00000,
                    'ville' => 'A remplir',
                    'tel' => 'A remplir',
                    'email' => 'No-reply@astroweb.fr',
                    'actif' => '1',
                    'fonction' => 1,
                    'pwd' => $settings->defaultPwd,
                    'id_Associations' => 1,
                ];
                $membre = $membresModel->hydrate($donnees);
                $membresModel->create($membre);
                $success = ['msg' => 'Le nouvel adhérent a été ajouté avec succès.<br>Son mot de passe est celui par défaut !', 'redirect' => '/membres/index'];
                $this->render('main/success', compact('success'));
                exit;
            }
            $errors = ['msg' => 'Erreur dans le traiement de votre demande', 'redirect' => '/membres/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant à un adhérant d'éditer son profil sauf le mot de passe, Logout après tout changmement.
     *
     * @return void
     */
    public function editMembre()
    {
        if ($_SESSION['user']->fonction == 1 || $_SESSION['user']->fonction == 2) {
            if (
                isset($_POST['login']) && !empty($_POST['login'])
                && isset($_POST['nom']) && !empty($_POST['nom'])
                && isset($_POST['prenom']) && !empty($_POST['prenom'])
            ) {
                if ($_SESSION['user']->id == $_POST['id']) {
                    if ($this->verifExistLogin($_POST['login'], $_POST['id'])) {
                        $errors = ['msg' => 'Ce login est déjà utilisé', 'redirect' => '/administration/profil'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    if (isset($_POST['email']) && !empty($_POST['email'])) {
                        if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
                            $errors = ['msg' => 'Format Email invalide !', 'redirect' => '/administration/profil'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        }
                    }
                    $membresModel = new MembresModel;
                    $donnees = [
                        'login' => htmlspecialchars(strip_tags($_POST['login'])),
                        'nom' => htmlspecialchars(strip_tags($_POST['nom'])),
                        'prenom' => htmlspecialchars(strip_tags($_POST['prenom'])),
                        'adresse' => htmlspecialchars(strip_tags($_POST['adresse'])),
                        'codePostale' => htmlspecialchars(strip_tags($_POST['codePostale'])),
                        'ville' => htmlspecialchars(strip_tags($_POST['ville'])),
                        'tel' => htmlspecialchars(strip_tags($_POST['tel'])),
                        'email' => htmlspecialchars(strip_tags($_POST['email']))
                    ];
                    $membre = $membresModel->hydrate($donnees);
                    $membresModel->update($_POST['id'], $membre);
                    $exit = new MembresController;
                    $exit->logout();
                }
                $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
            $errors = ['msg' => 'Erreur dans le traiement de votre demande', 'redirect' => '/administration/profil'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode de modification du mot de passe d'un membre, la sortie est différente selon que l'on est l'admin ou le membre (logout)
     *
     * @return void
     */
    public function editMembrePwd()
    {
        if ($_SESSION['user']->fonction != 0) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && !is_null($_POST['motDePasse1']) && !is_null($_POST['motDePasse2'])
                && !empty($_POST['motDePasse1']) && !empty($_POST['motDePasse2'])
                && $_POST['motDePasse1'] === $_POST['motDePasse2']
            ) {
                if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$#', $_POST['motDePasse1'])) {
                    if (!($this->validPassword($_POST['motDePasse1']))) {
                        if ($_SESSION['user']->fonction == 3) {
                            $errors = ['msg' => 'Mot de passe non valide, il doit contenir au minimum :<br>une minuscule, une majuscule, un chiffre, 8 caractères.<br>Les caractères \ / < > &  \' " sont à exclure.', 'redirect' => '/membres/index'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        }
                        if ($_SESSION['user']->fonction == 2 && $_SESSION['user']->id != $_POST['id']) {
                            $errors = ['msg' => 'Mot de passe non valide, il doit contenir au minimum :<br>une minuscule, une majuscule, un chiffre, 8 caractères.<br>Les caractères \ / < > &  \' " sont à exclure.', 'redirect' => '/membres/index'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        }
                        $errors = ['msg' => 'Mot de passe non valide, il doit contenir au minimum :<br>une minuscule, une majuscule, un chiffre, 8 caractères.<br>Les caractères \ / < > &  \' " sont à exclure.', 'redirect' => '/administration/profil'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $motdePasse = htmlspecialchars(strip_tags($_POST['motDePasse1']));
                    $donnees = [
                        'pwd' => password_hash($motdePasse, PASSWORD_BCRYPT)
                    ];
                    $membresModel = new MembresModel;
                    $membre = $membresModel->hydrate($donnees);
                    $membresModel->update($_POST['id'], $membre);
                    if ($_SESSION['user']->fonction == 3) {
                        $membre = $membresModel->find($_POST['id']);
                        $this->render('membres/details', compact('membre'));
                        exit;
                    }
                    if ($_SESSION['user']->fonction == 2 && $_SESSION['user']->id != $_POST['id']) {
                        $membre = $membresModel->find($_POST['id']);
                        $this->render('membres/details', compact('membre'));
                        exit;
                    }
                    $exit = new MembresController;
                    $exit->logout();
                } else {
                    if ($_SESSION['user']->fonction == 3) {
                        $errors = ['msg' => 'Mot de passe non valide, il doit contenir au minimum :<br>une minuscule, une majuscule, un chiffre, 8 caractères.<br>Les caractères \ / < > &  \' " sont à exclure.', 'redirect' => '/membres/index'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    if ($_SESSION['user']->fonction == 2 && $_SESSION['user']->id != $_POST['id']) {
                        $errors = ['msg' => 'Mot de passe non valide, il doit contenir au minimum :<br>une minuscule, une majuscule, un chiffre, 8 caractères.<br>Les caractères \ / < > &  \' " sont à exclure.', 'redirect' => '/membres/index'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $errors = ['msg' => 'Mot de passe non valide, il doit contenir au minimum :<br>une minuscule, une majuscule, un chiffre, 8 caractères.<br>Les caractères \ / < > &  \' " sont à exclure.', 'redirect' => '/administration/profil'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
            } else {
                if ($_SESSION['user']->fonction == 3) {
                    $errors = ['msg' => 'Erreur dans la vérification !<br>Mot de passe incorrect.', 'redirect' => '/membres/index'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                if ($_SESSION['user']->fonction == 2 && $_SESSION['user']->id != $_POST['id']) {
                    $errors = ['msg' => 'Erreur dans la vérification !<br>Mot de passe incorrect.', 'redirect' => '/membres/index'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                $errors = ['msg' => 'Erreur dans la vérification !<br>Mot de passe incorrect.', 'redirect' => '/administration/profil'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode d'accès la page contenu des adhérents
     *
     * @return void
     */
    public function contenu()
    {
        if ($_SESSION['user']->fonction != 0 && $_SESSION['user']->fonction != 3) {
            $articlesModel = new ArticlesModel;
            $articles = $articlesModel->findBy(['id_Membres' => $_SESSION['user']->id]);
            $this->render('membres/contenu', compact('articles'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }
}
