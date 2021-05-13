<?php

namespace App\Controllers;

use App\Models\ActualitesModel;
use App\Models\ArticlesModel;
use App\Models\EvenementsModel;
use App\Models\MembresModel;
use App\Models\F_messagesModel;

class MainController extends Controller
{
    public function index()
    {
        $actualitesModel = new ActualitesModel;
        $evenementsModel = new EvenementsModel;
        $actualites = $actualitesModel->findAllDesc();
        $evenements = $evenementsModel->findAllDesc();
        $this->render('main/index', compact('actualites'), compact('evenements'));
    }

    public function confidentialite()
    {
        $this->render('main/confidentialite');
    }

    public function aPropos()
    {
        $this->render('main/aPropos');
    }

    public function planSite()
    {
        $this->render('main/planSite');
    }

    public function error404()
    {
        $this->render('main/error404');
    }

    public function rechercher()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
            && isset($_POST['rechercher']) && !empty($_POST['rechercher'])
        ) {
            $_SESSION['search'] = htmlspecialchars(strip_tags($_POST['rechercher']), ENT_QUOTES);
            $membresModel = new MembresModel;
            $adherents = $membresModel->searchAdherent($_SESSION['search']);
            $articlesModel = new ArticlesModel;
            $articles = $articlesModel->searchArticle($_SESSION['search']);
            $actualitesModel = new ActualitesModel;
            $actualites = $actualitesModel->searchActualite($_SESSION['search']);
            $evenementsModel = new EvenementsModel;
            $evenements = $evenementsModel->searchEvenement($_SESSION['search']);
            $f_messagesModel = new F_messagesModel;
            $f_messages = $f_messagesModel->searchF_messages($_SESSION['search']);
            $this->render('main/rechercher', compact('adherents'), compact('articles'), compact('actualites'), compact('evenements'), compact('f_messages'));
            exit;
        }
        if (isset($_SERVER['HTTP_REFERER']) and !empty($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            header('Location: /Main/index');
            exit;
        }
    }

    public function undefined(){
        header('Location: /Main/index');
        exit;
    }

    // public function calendrier()
    // {
    //     $this->render('main/cal');
    // }

}