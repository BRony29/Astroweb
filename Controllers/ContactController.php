<?php

namespace App\Controllers;

use App\Models\MembresModel;

class ContactController extends Controller
{
    public function index()
    {
        $this->render('contact/index');
    }


    /**
     * Méthode d'envoi de mail via le formulaire contact
     * Vérification de la provenance du visiteur, Honeypot, vérif format email.
     *
     * @return void
     */
    public function envoiMail()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['raison']) && empty($_POST['raison'])) {
                if (
                    isset($_POST['nom']) && !empty($_POST['nom'])
                    && isset($_POST['prenom']) && !empty($_POST['prenom'])
                    && isset($_POST['email']) && !empty($_POST['email'])
                    && isset($_POST['sujet']) && !empty($_POST['sujet'])
                    && isset($_POST['message']) && !empty($_POST['message'])
                    && isset($_POST['organisation']) && !empty($_POST['organisation'])
                ) {
                    if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
                        $errors = ['msg' => 'Format Email invalide !', 'redirect' => '/contact/index'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $nom = htmlspecialchars(strip_tags($_POST['nom']));
                    $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
                    $email = htmlspecialchars(strip_tags($_POST['email']));
                    $sujet = htmlspecialchars(strip_tags($_POST['sujet']));
                    $message = htmlspecialchars(strip_tags($_POST['message']));
                    $organisation = htmlspecialchars(strip_tags($_POST['organisation']));
                    // récupération du mail de l'administrateur et des modérateurs
                    $membresModel = new MembresModel;
                    $administrateurEmail = $membresModel->findBy(['fonction' => 3])[0]->email;
                    $moderateurs = $membresModel->findBy(['fonction' => 2]);
                    // création du mail
                    $msg = "NOM : $nom \nPRENOM : $prenom \nORGANISATION : $organisation";
                    $msg .= "\nEMAIL : $email";
                    $msg .= "\nMESSAGE : $message\n";
                    $subject = "SUJET : $sujet";
                    $headers = "From: formulaire. ";
                    $headers .= "Reply-To: $email\n\n";
                    // envoi des mails aux modérateurs
                    foreach($moderateurs as $moderateur){
                        $to = $moderateur->email;
                        mail($to, $subject, $msg, $headers);
                    }
                    // envoi du mail à l'administrateur et redirection
                    $to = $administrateurEmail;
                    if (mail($to, $subject, $msg, $headers)) {
                        $success = ['msg' => 'Votre message a bien été envoyé.', 'redirect' => '/contact/index'];
                        $this->render('main/success', compact('success'));
                        exit;
                    } else {
                        $errors = ['msg' => 'Echec. Votre message<br> n\'a pas pu être envoyé.', 'redirect' => '/contact/index'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                }
                $errors = ['msg' => 'Veuillez remplir tous les champs.', 'redirect' => '/contact/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Erreur. Votre demande<br>ne peut être traitée', 'redirect' => '/contact/index'];
        $this->render('main/errors', compact('errors'));
        exit;
    }

        /* *********************************************** Méthodes annuaire ***********************************************  */


    /**
     * Méthode d'accès à l'annuaire
     *
     * @return void
     */
    public function annuaire()
    {
        if ($_SESSION['user']->fonction != 0) {
            $membresModel = new MembresModel;
            $membres = $membresModel->findAll();
            $this->render('contact/annuaire', compact('membres'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }

}
