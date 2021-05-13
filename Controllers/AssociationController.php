<?php

namespace Astroweb\Controllers;

use Astroweb\Models\AssociationModel;
use Astroweb\Models\MembresModel;

class AssociationController extends Controller
{
    /**
     * cette méthode affichera une page listant l'association et ses attributs
     *
     * @return void
     */
    public function index()
    {
        $membresModel = new MembresModel;
        if ($_SESSION['user']->fonction >= 2) {
            $associationModel = new AssociationModel;
            // on va chercher l'association avec l'id = 1 (ce projet est mono association mais peut être adpaté multi associations)
            $association = $associationModel->find(1);
            $this->render('association/index', compact('association'));
            exit;
        }
        header('location: /Main/index');
    }


    /**
     * Cette méthode modifie les champs de l'association
     *
     * @return void
     */
    public function associationUpdate()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if (isset($_POST) && !empty($_POST)){
                $associationModel = new AssociationModel;
                if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
                    $errors = ['msg' => 'Format Email invalide !', 'redirect' => '/association/index'];
                    $this->render('main/errors', compact('errors'));
                    exit;
                }
                $donnees = [
                    'nom' => htmlspecialchars(strip_tags($_POST['nom'])),
                    'adresse' => htmlspecialchars(strip_tags($_POST['adresse'])),
                    'codePostale' => htmlspecialchars(strip_tags($_POST['codePostale'])),
                    'ville' => htmlspecialchars(strip_tags($_POST['ville'])),
                    'nSiret' => htmlspecialchars(strip_tags($_POST['nSiret'])),
                    'nRNA' => htmlspecialchars(strip_tags($_POST['nRNA'])),
                    'tel' => htmlspecialchars(strip_tags($_POST['tel'])),
                    'email' => htmlspecialchars(strip_tags($_POST['email']))
                ];
                $association = $associationModel->hydrate($donnees);
                $associationModel->update(1, $association);
                $association = $associationModel->find(1);
                $this->render('association/index', compact('association'));
                exit;
            } else {
                $this->render('administration/menuAdmin');
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }
}
