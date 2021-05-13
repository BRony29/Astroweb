<?php

namespace App\Controllers;

use App\Models\MembresModel;
use App\Models\RecuperationModel;

class AdministrationController extends Controller
{
    /**
     * Ouverture de la fenêtre de connexion
     *
     * @return void
     */
    public function login()
    {
        if (isset($_SESSION['recup_email'])) {
            unset($_SESSION['recup_email']);
            unset($_SESSION['code']);
        }
        if ($_SESSION['user']->fonction != 0) {
            $this->logout();
        } else {
            $this->render('administration/login');
        }
    }


    /**
     * Accès au menu d'administration
     *
     * @return void
     */
    public function menuAdmin()
    {
        if ($_SESSION['user']->fonction >= 2) {
            $this->render('administration/menuAdmin');
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Accès au menu profil pour les adhérents
     *
     * @return void
     */
    public function profil()
    {
        if ($_SESSION['user']->fonction != 0 && $_SESSION['user']->fonction != 3) {
            $this->render('membres/menuMembre');
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Métode permettant de mettre à jour le login de l'administrateur. Logout après le changmement.
     *
     * @return void
     */
    public function administrateurLogin()
    {
        if ($_SESSION['user']->fonction == 3) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['login']) && !empty($_POST['login'])
            ) {
                if ($this->verifExistLogin($_POST['login'])) {
                    $errors = ['msg' => 'Ce login existe déjà.<br>Veuillez en choisir un autre.', 'redirect' => '/administration/configAdmin'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                $donnees = [
                    'login' => htmlspecialchars(strip_tags($_POST['login']))
                ];
                $membresModel = new MembresModel;
                $administrateur = $membresModel->findBy(['fonction' => 3])[0];
                $administrateurModif = $membresModel->hydrate($donnees);
                $membresModel->update($administrateur->id, $administrateurModif);
                unset($administrateur);
                unset($administrateurModif);
            }
            $exit = new MembresController;
            $exit->logout();
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }

    /**
     * Métode permettant de mettte à jour l'adresse email de l'aministrateur.
     *
     * @return void
     */
    public function administrateurEmail()
    {
        if ($_SESSION['user']->fonction == 3) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['email']) && !empty($_POST['email'])
            ) {
                if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
                    $errors = ['msg' => 'Format d\'email invalide !', 'redirect' => '/administration/configAdmin'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                $donnees = [
                    'email' => htmlspecialchars(strip_tags($_POST['email']))
                ];
                $membresModel = new MembresModel;
                $administrateur = $membresModel->findBy(['fonction' => 3])[0];
                $administrateurModif = $membresModel->hydrate($donnees);
                $membresModel->update($administrateur->id, $administrateurModif);
                unset($administrateur);
                unset($administrateurModif);
            }
            header('location: /administration/configAdmin');
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Métode permettant de mettre à jour le mot de passe de l'aministrateur. Logout après tout changmement.
     *
     * @return void
     */
    public function administrateurPwd()
    {
        if ($_SESSION['user']->fonction == 3) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['motDePasse1']) && isset($_POST['motDePasse2'])
                && !empty($_POST['motDePasse1']) && !empty($_POST['motDePasse2'])
                && $_POST['motDePasse1'] == $_POST['motDePasse2']
            ) {
                if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$#', $_POST['motDePasse1'])) {
                    if (!($this->validPassword($_POST['motDePasse1']))) {
                        $errors = ['msg' => 'Mot de passe non valide !', 'redirect' => '/administration/configAdmin'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $motdePasse = htmlspecialchars(strip_tags($_POST['motDePasse1']));
                    $donnees = [
                        'pwd' => password_hash($motdePasse, PASSWORD_BCRYPT)
                    ];
                    $membresModel = new MembresModel;
                    $administrateur = $membresModel->findBy(['fonction' => 3])[0];
                    $administrateurModif = $membresModel->hydrate($donnees);
                    $membresModel->update($administrateur->id, $administrateurModif);
                    unset($administrateur);
                    unset($administrateurModif);
                    $exit = new MembresController;
                    $exit->logout();
                } else {
                    $errors = ['msg' => 'Mot de passe non valide !', 'redirect' => '/administration/configAdmin'];
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


    /**
     * cette méthode affichera une page permettant de configurer les paramètres administrateur,
     * les paramètres du site et les modérateurs
     *
     * @return void
     */
    public function configAdmin()
    {
        if ($_SESSION['user']->fonction == 3) {
            $membresModel = new MembresModel;
            $administrateur = $membresModel->findBy(['fonction' => 3])[0];
            $moderateurs = $membresModel->findBy(['fonction' => 2]);
            $this->render('administration/configAdmin', compact('administrateur'), compact('moderateurs'));
            unset($administrateur);
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /* *********************************************** Méthodes de mot de passe oublié ***********************************************  */


    /**
     * Méthode d'accès au formulaire de mot de passe oublié.
     *
     * @return void
     */
    public function forgottenPwd()
    {
        $this->render('administration/forgottenPwd');
    }


    /**
     * Vérification de l'existence de l'adresse mail dans la BDD puis traitement
     * si oui, création code de récup, sauvegarde dans la BDD (création ou mise à jour), envoi de mail
     *
     * @return void
     */
    public function forgottenPwdVerifMail()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
            && isset($_POST["email"]) && !empty($_POST["email"])
        ) {
            $email = htmlspecialchars(strip_tags($_POST["email"]));
            // recherche de l'adresse mail dans la table membres pour voir si elle est associée à un compte.
            $membresModel = new MembresModel;
            $membre = $membresModel->findBy(['email' => $email]);
            if (count($membre) == 0) {
                $errors = ['msg' => 'Cette adresse mail<br>n\'est pas enregistrée !', 'redirect' => '/administration/login'];
                $this->render('main/errors', compact('errors'));
                exit;
            } else {
                $_SESSION['recup_email'] = $membre[0]->email;
                $_SESSION['code'] = false;
                // création du code de récupération
                $recup_code = "";
                for ($i = 0; $i < 8; $i++) {
                    $recup_code .= mt_rand(0, 9);
                }
                // verifier si le mail existe dejà dans la table recuperation
                $recuperationModel = new RecuperationModel;
                $recuperation = $recuperationModel->findby(['email' => $_SESSION['recup_email']]);
                // s'il nexiste pas, création d'une récuperation
                if (count($recuperation) == 0) {
                    $donnees = [
                        'email' => $_SESSION['recup_email'],
                        'code' => $recup_code
                    ];
                    $recuperation = $recuperationModel->hydrate($donnees);
                    $recuperationModel->create($recuperation);
                    // s'il existe, mise à jour du code de la récupération
                } else {
                    $id = $recuperation[0]->id;
                    $donnees = [
                        'code' => $recup_code,
                        'confirme' => 0
                    ];
                    $recuperation = $recuperationModel->hydrate($donnees);
                    $recuperationModel->update($id, $recuperation);
                }
                // récupération du mail de l'administrateur
                $administrateurEmail = $membresModel->findBy(['fonction' => 3])[0]->email;
                // création du mail
                $header = "MIME-Version: 1.0\r\n";
                $header .= 'From:"[VOUS]"<' . $administrateurEmail . '>' . "\n";
                // $header .= 'From:"[VOUS]"<admin@ronald-begoc.fr>' . "\n";
                $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
                $header .= 'Content-Transfer-Encoding: 8bit';
                $message = '<html>
                <head>
                    <title>Récupération de mot de passe - Votresite</title>
                    <meta charset="utf-8" />
                </head>
                <body>  
                    <font color="#303030";>
                    <div align="center">
                        <table width="600px">
                            <tr>
                                <td>
                                    <div align="center">Bonjour <b>' . $_SESSION['recup_login'] . '</b><br>
                                        Voici votre code de récupération: <b>' . $recup_code . '</b><br><br>A bientôt sur <a href="http://www.ronald-begoc.fr/">Pégase</a> !
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <font size="2">
                                    <br>Ceci est un email automatique, merci de ne pas y répondre
                                    </font>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </font>
                </body></html>';
                // envoi du mail
                mail($_SESSION['recup_email'], "Récupération de mot de passe - Pégase", $message, $header);
                header("Location: /administration/forgottenPwd");
                exit;
            }
        }
        $errors = ['msg' => 'Erreur d\'adresse email !', 'redirect' => '/administration/login'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode de vérification du code envoyé par mail.
     * si erreur code, incrémentation de 'confirme'. Si confirme >=3 il faut recommencer
     *
     * @return void
     */
    public function forgottenPwdVerifCode()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
            && isset($_POST["code"]) && !empty($_POST["code"])
        ) {
            $code = htmlspecialchars(strip_tags($_POST["code"]));
            $recuperationModel = new RecuperationModel;
            $recuperation = $recuperationModel->findBy(['email' => $_SESSION['recup_email']])[0];
            if ($_POST['code'] == $recuperation->code) {
                $_SESSION['code'] = true;
                header("Location: /administration/forgottenPwd");
                exit;
            } else {
                $donnees = [
                    'confirme' => $recuperation->confirme + 1
                ];
                $maj_confirme = $recuperationModel->hydrate($donnees);
                $recuperationModel->update($recuperation->id, $maj_confirme);
                if ($donnees['confirme'] >= 3) {
                    unset($_SESSION['recup_email']);
                    unset($_SESSION['code']);
                    $errors = ['msg' => 'Trop d\'erreurs de code !<br>Veuillez recommencer la procédure !', 'redirect' => '/administration/login'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                $errors = ['msg' => 'Code incorrect !', 'redirect' => '/administration/forgottenPwd'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Code incorrect !', 'redirect' => '/administration/forgottenPwd'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * méthode de remplacement du mot de passe après vérif email et code envoyé.
     *
     * @return void
     */
    public function forgottenPwdValide()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
            && !is_null($_POST['motDePasse1']) && !is_null($_POST['motDePasse2'])
            && !empty($_POST['motDePasse1']) && !empty($_POST['motDePasse2'])
            && $_POST['motDePasse1'] === $_POST['motDePasse2']
        ) {
            if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$#', $_POST['motDePasse1'])) {
                if (!($this->validPassword($_POST['motDePasse1']))) {
                    $errors = ['msg' => 'Mot de passe non valide.', 'redirect' => '/administration/forgottenPwd'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                $motdePasse = htmlspecialchars(strip_tags($_POST['motDePasse1']));
                $membresModel = new MembresModel;
                $membre_recup = $membresModel->findBy(['email' => $_SESSION['recup_email']])[0];
                $donnees = [
                    'pwd' => password_hash($motdePasse, PASSWORD_BCRYPT)
                ];
                $membre = $membresModel->hydrate($donnees);
                $membresModel->update($membre_recup->id, $membre);
                unset($_SESSION['recup_email']);
                unset($_SESSION['code']);
                $success = ['msg' => 'Mot de passe mis à jour.', 'redirect' => '/administration/login'];
                $this->render('main/success', compact('success'));
                exit;
            } else {
                $errors = ['msg' => 'Mot de passe non valide.', 'redirect' => '/administration/forgottenPwd'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        } else {
            $errors = ['msg' => 'Erreur dans la vérification !<br>Mot de passe incorrect.', 'redirect' => '/administration/forgottenPwd'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
    }

}
