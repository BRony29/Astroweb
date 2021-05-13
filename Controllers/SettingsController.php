<?php

namespace Astroweb\Controllers;

use Astroweb\Models\SettingsModel;
use Astroweb\Models\MembresModel;

class SettingsController extends Controller
{

    /**
     * Méthode permettant de modifier les paramètres du site.
     *
     * @return void
     */
    public function parametreSite()
    {
        if ($_SESSION['user']->fonction == 3) {
            if (isset($_POST) && !empty($_POST)) {
                switch ($_POST['param']) {
                    case 'limite':
                        $limite = htmlspecialchars(strip_tags($_POST['limite']));
                        if ($limite <= 0 || $limite > 5){
                            $errors = ['msg' => 'Saisie incorrecte, veuillez<br>choisir une valeur entre 1 et 5.', 'redirect' => '/Administration/configAdmin'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        }
                        $donnees = ['essaisMax' => $limite];
                        break;
                    case 'duree':
                        $duree = htmlspecialchars(strip_tags($_POST['duree']));
                        if ($duree < 600 || $duree > 3600){
                            $errors = ['msg' => 'Saisie incorrecte, veuillez<br>choisir une valeur entre 600 et 3600.', 'redirect' => '/Administration/configAdmin'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        }
                        $donnees = ['dureeSession' => $duree];
                        break;
                    case 'taille':
                        $taille = htmlspecialchars(strip_tags($_POST['taille']));
                        if ($taille < 1 || $taille > 5){
                            $errors = ['msg' => 'Saisie incorrecte, veuillez<br>choisir une valeur entre 1 et 5.', 'redirect' => '/Administration/configAdmin'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        }
                        $donnees = ['poidsPhoto' => $taille];
                        break;
                    case 'thumb':
                        $thumb = htmlspecialchars(strip_tags($_POST['thumb']));
                        if ($thumb < 100 || $thumb > 500){
                            $errors = ['msg' => 'Saisie incorrecte, veuillez<br>choisir une valeur entre 100 et 500.', 'redirect' => '/Administration/configAdmin'];
                            $this->render('main/errors', compact('errors'));
                            exit;
                        }
                        $donnees = ['poidsThumb' => $thumb];
                        break;
                }
                $settingsModel = new SettingsModel;
                $newSettings = $settingsModel->hydrate($donnees);
                $settingsModel->update(1, $newSettings);
                header('location: /Administration/configAdmin');
                exit;
            } else {
                header('location: /Administration/configAdmin');
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode de modification du mot de passe par defaut
     *
     * @return void
     */
    public function defaultpwd()
    {
        if ($_SESSION['user']->fonction == 3) {
            if (
                !is_null($_POST['motDePasse3']) && !is_null($_POST['motDePasse4'])
                && !empty($_POST['motDePasse3']) && !empty($_POST['motDePasse4'])
                && $_POST['motDePasse3'] === $_POST['motDePasse4']
            ) {
                $motdePasse = htmlspecialchars(strip_tags($_POST['motDePasse3']));
                if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$#', $motdePasse)) {
                    if (!($this->validPassword($motdePasse))) {
                        $errors = ['msg' => 'Erreur dans la vérification !<br>Mot de passe incorrect.', 'redirect' => '/administration/configAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $donnees = [
                        'defaultPwd' => password_hash($motdePasse, PASSWORD_BCRYPT)
                    ];
                    $settingsModel = new SettingsModel;
                    $newSettings = $settingsModel->hydrate($donnees);
                    $settingsModel->update(1, $newSettings);
                    $success = ['msg' => 'Mot de passe remplacé avec succès !', 'redirect' => '/administration/configAdmin'];
                    $this->render('main/success', compact('success'));
                    exit;
                } else {
                    $errors = ['msg' => 'Erreur dans la vérification !<br>Mot de passe incorrect.', 'redirect' => '/administration/configAdmin'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
            } else {
                $errors = ['msg' => 'Erreur dans la vérification !<br>Mot de passe incorrect.', 'redirect' => '/administration/configAdmin'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /* *********************************************** Gestion Modérateur ***********************************************  */


    /**
     * méthode donnant accès au choix d'un nouveau modérateur selon les entrées du formulaire
     *
     * @return void
     */
    public function ajoutModerateur()
    {
        if ($_SESSION['user']->fonction == 3) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['raison']) && empty($_POST['raison'])
            ) {
                if (!empty($_POST['login_moderateur']) || !empty($_POST['nom_moderateur']) || !empty($_POST['prenom_moderateur'])) {
                    $login_moderateur = htmlspecialchars($_POST['login_moderateur']);
                    $nom_moderateur = htmlspecialchars($_POST['nom_moderateur']);
                    $prenom_moderateur = htmlspecialchars($_POST['prenom_moderateur']);
                    $membresModel = new MembresModel;
                    $login_search = $membresModel->findBy(['login' => $login_moderateur]);
                    $nom_search = $membresModel->findBy(['nom' => $nom_moderateur]);
                    $prenom_search = $membresModel->findBy(['prenom' => $prenom_moderateur]);
                    $this->render('administration/nouveauModerateur', compact('login_search'), compact('nom_search'), compact('prenom_search'));
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur de remplissage du formulaire.', 'redirect' => '/administration/menuAdmin'];
            $this->render('main/errors', compact('errors'));
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Métode configurant le nouveau modérateur après confirmation
     *
     * @return void
     */
    public function ajoutModerateurConfirme()
    {

        if ($_SESSION['user']->fonction == 3) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['raison']) && empty($_POST['raison'])
                && isset($_POST['id_modo']) && !empty($_POST['id_modo'])
            ) {
                if (!$this->verifIdExist($_POST['id_modo'], 'MembresModel')) {
                    header('location: /administration/configAdmin');
                    exit;
                }
                $donnees = [
                    'fonction' => 2
                ];
                $membresModel = new MembresModel;
                $traitement = $membresModel->hydrate($donnees);
                $membresModel->update(($_POST['id_modo']), $traitement);
                $message = strftime('Le %x à %T', strtotime(date("Y-m-d H:i:s" ))).' : Vous avez été nommé <b>modérateur</b>. Si ce n\'est déjà fait, veuillez vous reconnecter afin que le changement prenne effet.';
                $this->newNotification($_POST['id_modo'], 'message', $message);
                header('location: /administration/configAdmin');
                exit;
            }
            $errors = ['msg' => 'Erreur dans le traitement de la demande.', 'redirect' => '/administration/menuAdmin'];
            $this->render('main/errors', compact('errors'));
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Métode supprimant le status de modérateur après confirmation
     *
     * @return void
     */
    public function supprimerModerateur()
    {
        if ($_SESSION['user']->fonction == 3) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['raison']) && empty($_POST['raison'])
                && isset($_POST['id_Asupprimer']) && !empty($_POST['id_Asupprimer'])
            ) {
                if (!$this->verifIdExist($_POST['id_Asupprimer'], 'MembresModel')) {
                    header('location: /administration/configAdmin');
                    exit;
                }
                $donnees = [
                    'fonction' => 1
                ];
                $membresModel = new MembresModel;
                $traitement = $membresModel->hydrate($donnees);
                $membresModel->update(($_POST['id_Asupprimer']), $traitement);
                $message = strftime('Le %x à %T', strtotime(date("Y-m-d H:i:s" ))).' : Vous n\'êtes plus <b>modérateur</b>. Si ce n\'est déjà fait, veuillez vous reconnecter afin que le changement prenne effet.';
                $this->newNotification($_POST['id_Asupprimer'], 'message', $message);
                header('location: /administration/configAdmin');
                exit;
            }
            $errors = ['msg' => 'Erreur dans le traitement de la demande.', 'redirect' => '/administration/menuAdmin'];
            $this->render('main/errors', compact('errors'));
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


}
