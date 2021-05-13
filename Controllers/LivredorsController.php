<?php

namespace Astroweb\Controllers;

use Astroweb\Models\LivredorsModel;
use Astroweb\Models\MembresModel;

class LivredorsController extends Controller
{
    public function index()
    {
        $livredorsModel = new LivredorsModel;
        $livredors = $livredorsModel->findAllDesc();
        $this->render('livredors/index', compact('livredors'));
    }


    /**
     * Méthode permettant d'accéder à la gestion du livre d'or par l'administrateur
     *
     * @return void
     */
    public function gestion()
    {
        if ($_SESSION['user']->fonction >= 2){
            $livredorsModel = new LivredorsModel;
            $livredors = $livredorsModel->findAllDesc();
            $this->render('livredors/gestion', compact('livredors'));
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant d'ajouter un message dans le livre d'or
     * Vérification de la provenance du visiteur, Honeypot, vérif format email.
     *
     * @return void
     */
    public function ajoutMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['raison']) && empty($_POST['raison'])) {
                if (
                    isset($_POST['pseudo']) && !empty($_POST['pseudo'])
                    && isset($_POST['email']) && !empty($_POST['email'])
                    && isset($_POST['message']) && !empty($_POST['message'])
                ) {
                    if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
                        $errors = ['msg' => 'Format Email invalide.', 'redirect' => '/livredors/index'];
                        $this->render('main/errors', compact('errors'));
                        exit;
                    }
                    $donnees = [
                        'pseudo' => htmlspecialchars(strip_tags($_POST['pseudo'])),
                        'email' => htmlspecialchars(strip_tags($_POST['email'])),
                        'date' => date("Y-m-d"),
                        'message' => htmlspecialchars(strip_tags($_POST['message'])),
                    ];
                    $livredorsModel = new LivredorsModel;
                    $livredors = $livredorsModel->hydrate($donnees);
                    $livredors->create($livredors);
                    //notification admin
                    $membresModel = new MembresModel;
                    $adminId = $membresModel->findBy(['fonction'=>3])[0]->id;
                    $this->newNotification($adminId, 'livredor');
                    $moderateurs = $membresModel->findBy(['fonction'=>2]);
                    foreach ($moderateurs as $moderateur){
                        $this->newNotification($moderateur->id, 'livredor');
                    }
                    $success = ['msg' => 'Votre message a été pris en compte.', 'redirect' => '/livredors/index'];
                    $this->render('main/success', compact('success'));
                    exit;
                }
                $errors = ['msg' => 'Veuillez remplir tous les champs.', 'redirect' => '/livredors/index'];
                $this->render('main/errors', compact('errors'));
            }
        }
        $errors = ['msg' => 'Votre message n\'a pas été pris en<br>compte. Veuillez réessayer.', 'redirect' => '/livredors/index'];
        $this->render('main/errors', compact('errors'));
        exit;
    }


    /**
     * Métode permettant à l'administrateur de supprimer un message du livre d'or
     *
     * @return void
     */
    public function supprimerLivredors()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['id_Asupprimer']) && !empty(($_POST['id_Asupprimer']))
            ) {
                if (!$this->verifIdExist($_POST['id_Asupprimer'], 'LivredorsModel')) {
                    header('location: /Livredors/gestion');
                    exit;
                }
                $livredorsModel = new LivredorsModel;
                $traitement = $livredorsModel->delete($_POST['id_Asupprimer']);
                header('location: /Livredors/gestion');
                exit;
            }
            header('location: /Livredors/gestion');
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }
}
