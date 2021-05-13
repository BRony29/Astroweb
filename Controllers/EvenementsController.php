<?php

namespace App\Controllers;

use App\Models\EvenementsModel;

class EvenementsController extends Controller
{
    public function index()
    {
        $evenementsModel = new EvenementsModel;
        $evenements = $evenementsModel->findAllDesc();
        $this->render('evenements/index', compact('evenements'));
    }


    public function gestionAdmin()
    {
        if ($_SESSION['user']->fonction >= 2) {
            $evenementsModel = new EvenementsModel;
            $evenements = $evenementsModel->findAllDesc();
            $this->render('evenements/gestionAdmin', compact('evenements'));
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     *  Accès à la gestion d'un évènement
     *
     * @return void
     */
    public function gestion()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (
                $_SERVER["REQUEST_METHOD"] == "POST"
                && isset($_POST['id']) && !empty($_POST['id'])
            ) {
                if (!$this->verifIdExist($_POST['id'], 'EvenementsModel')) {
                    header('location: /calendar/index');
                    exit;
                }
                $id = htmlspecialchars(strip_tags($_POST['id']));
                $evenementsModel = new EvenementsModel;
                $evenement = $evenementsModel->find($id);
                $this->render('evenements/gestion', compact('evenement'));
                exit;
            }
            header('location: /calendar/index');
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant d'ajouter un évènement
     *
     * @return void
     */
    public function ajoutEvenements()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (
                    isset($_POST['date']) && !empty($_POST['date'])
                    && isset($_POST['heure']) && !empty($_POST['heure'])
                    && isset($_POST['titre']) && !empty($_POST['titre'])
                    && isset($_POST['lieu']) && !empty($_POST['lieu'])
                    && isset($_POST['description']) && !empty($_POST['description'])
                ) {
                    $date = htmlspecialchars(strip_tags($_POST['date']));
                    $heure = htmlspecialchars(strip_tags($_POST['heure']));
                    $dateTemp = explode('/', $date);
                    if ($heure == '24:00') {
                        $heure = '23:59:59';
                    }
                    $date = $dateTemp[2] . '-' . $dateTemp[1] . '-' . $dateTemp[0] . ' ' . $heure;
                    $evenementsModel = new EvenementsModel;
                    $donnees = [
                        'date' => $date,
                        'titre' => htmlspecialchars(strip_tags($_POST['titre'])),
                        'lieu' => htmlspecialchars(strip_tags($_POST['lieu'])),
                        'description' => htmlspecialchars(strip_tags($_POST['description']))
                    ];
                    $evenement = $evenementsModel->hydrate($donnees);
                    $evenement->create($evenement);
                    header('location: /calendar/index/' . $dateTemp[1] . '/' . $dateTemp[2]);
                    exit;
                }
                $errors = ['msg' => 'Veuillez remplir tous les champs', 'redirect' => '/calendar/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
            $errors = ['msg' => 'Suite à une erreur, votre nouvel évènement n\'a<br>pas été pris en compte. Veuillez réessayer.', 'redirect' => '/calendar/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant à l'administrateur et aux modérateurs de supprimer un évènement
     *
     * @return void
     */
    public function supprimerEvenements()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST'
                && isset($_POST['id_Asupprimer']) && !empty(($_POST['id_Asupprimer']))
            ) {
                if (!$this->verifIdExist($_POST['id_Asupprimer'], 'EvenementsModel')) {
                    header('location: /calendar/index');
                    exit;
                }
                $evenementsModel = new EvenementsModel;
                $traitement = $evenementsModel->delete($_POST['id_Asupprimer']);
            }
            if (isset($_SESSION['redirect']) && !empty($_SESSION['redirect'])) {
                header('Location: ' . $_SESSION['redirect']);
                exit;
            } else {
                header('location: /calendar/index');
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de valider la modification d'un évènement
     *
     * @return void
     */
    public function modifieEvenements()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['raison']) && empty($_POST['raison'])) {
                    if (
                        isset($_POST['date']) && !empty($_POST['date'])
                        && isset($_POST['heure']) && !empty($_POST['heure'])
                        && isset($_POST['titre']) && !empty($_POST['titre'])
                        && isset($_POST['description']) && !empty($_POST['description'])
                        && isset($_POST['id']) && !empty($_POST['id'])
                        && isset($_POST['lieu']) && !empty($_POST['lieu'])
                    ) {
                        if (!$this->verifIdExist($_POST['id'], 'EvenementsModel')) {
                            header('location: /calendar/index');
                            exit;
                        }
                        $date = htmlspecialchars(strip_tags($_POST['date']));
                        $heure = htmlspecialchars(strip_tags($_POST['heure']));
                        if ($heure == '24:00:00') {
                            $heure = '23:59:59';
                        }
                        $dateTemp = explode('/', $date);
                        $date = $dateTemp[2] . '-' . $dateTemp[1] . '-' . $dateTemp[0] . ' ' . $heure;
                        $donnees = [
                            'date' => $date,
                            'titre' => htmlspecialchars(strip_tags($_POST['titre'])),
                            'lieu' => htmlspecialchars(strip_tags($_POST['lieu'])),
                            'description' => htmlspecialchars(strip_tags($_POST['description']))
                        ];
                        $evenementsModel = new EvenementsModel;
                        $evenement = $evenementsModel->hydrate($donnees);
                        $evenementsModel->update($_POST['id'], $evenement);
                        if (isset($_SESSION['redirect']) && !empty($_SESSION['redirect'])) {
                            header('Location: ' . $_SESSION['redirect']);
                            exit;
                        } else {
                            header('location: /calendar/index/' . $dateTemp[1] . '/' . $dateTemp[2]);
                            header('location: /calendar/index');
                            exit;
                        }
                    }
                }
            }
            $errors = ['msg' => 'La mise à jour à échouée.', 'redirect' => ' /calendar/index'];
            $this->render('main/errors', compact('errors'));
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }
}
