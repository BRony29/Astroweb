<?php

namespace Astroweb\Controllers;

use Astroweb\Models\F_categoriesModel;
use Astroweb\Models\F_messagesModel;
use Astroweb\Models\F_souscategoriesModel;
use Astroweb\Models\F_topicsModel;

class ForumController extends Controller
{
    public function index()
    {
        $f_categoriesModel = new F_categoriesModel;
        $f_categories = $f_categoriesModel->findCategorieIndex();
        $f_souscategoriesModel = new F_souscategoriesModel;
        $f_souscategories = $f_souscategoriesModel->findAll();
        $this->render('forum/index', compact("f_categories"), compact("f_souscategories"));
    }

    /* *********************************************** Gestion Administrateur ***********************************************  */

    public function gestion()
    {
        if ($_SESSION['user']->fonction >= 2) {
            $f_categoriesModel = new F_categoriesModel;
            $f_categories = $f_categoriesModel->findAll();
            $f_souscategoriesModel = new F_souscategoriesModel;
            $f_souscategories = $f_souscategoriesModel->findAll();
            $this->render('forum/gestion', compact('f_categories'), compact('f_souscategories'));
            exit;
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }

    /* *********************************************** Gestion des catégories ***********************************************  */

    /**
     * Méthode permettant d'afficher une catégorie du forum
     *
     * @return void
     */
    public function viewCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET) && !empty($_GET)) {
                $params = explode('/', $_GET['p']);
                if (isset($params[2])) {
                    if (!$this->verifIdExist($params[2], 'F_categoriesModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    $f_categoriesModel = new F_categoriesModel;
                    $f_categorie = $f_categoriesModel->find($params[2]);
                    $f_souscategoriesModel = new F_souscategoriesModel;
                    $f_souscategories = $f_souscategoriesModel->findViewCategorie($params[2]);
                    $this->render('forum/viewCategorie', compact('f_categorie'), compact('f_souscategories'));
                    exit;
                }
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


    /**
     * Méthode permettant l'ajout de catégorie
     *
     * @return void
     */
    public function ajoutCategorie()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['raison']) && empty($_POST['raison'])
                    && isset($_POST['ajoutCategorie']) && !empty($_POST['ajoutCategorie'])
                ) {
                    $f_categoriesModel = new F_categoriesModel;
                    $donnees = [
                        'nom' => htmlspecialchars(strip_tags($_POST['ajoutCategorie']))
                    ];
                    $f_categorie = $f_categoriesModel->hydrate($donnees);
                    $f_categoriesModel->create($f_categorie);
                    header('location: /forum/gestion');
                    exit;
                }
                $errors = ['msg' => 'Veuillez remplir correctement les champs.', 'redirect' => '/forum/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de modifier le sujet d'une catégorie
     *
     * @return void
     */
    public function modifierCategorie()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['raison']) && empty($_POST['raison'])
                    && isset($_POST['id_categorie']) && !empty($_POST['id_categorie'])
                    && isset($_POST['sujet_categorie']) && !empty($_POST['sujet_categorie'])
                ) {
                    if (!$this->verifIdExist($_POST['id_categorie'], 'F_categoriesModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    $f_categoriesModel = new F_categoriesModel;
                    $donnees = [
                        'nom' => htmlspecialchars(strip_tags($_POST['sujet_categorie']))
                    ];
                    $f_categorie = $f_categoriesModel->hydrate($donnees);
                    $f_categoriesModel->update($_POST['id_categorie'], $f_categorie);
                    header('location: /forum/gestion');
                    exit;
                }
                $errors = ['msg' => 'Veuillez remplir correctement les champs.', 'redirect' => '/forum/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de supprimer une catégorie
     *
     * @return void
     */
    public function supprimerCategorie()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['id_Asupprimer']) && !empty($_POST['id_Asupprimer'])) {
                    if (!$this->verifIdExist($_POST['id_Asupprimer'], 'F_categoriesModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    //supprimer la categorie
                    $f_categoriesModel = new F_categoriesModel;
                    $f_categoriesModel->delete($_POST['id_Asupprimer']);
                    // supprimer les sous-categories
                    // lister les sous-categories à supprimer
                    $f_souscategoriesModel = new F_souscategoriesModel;
                    $souscategorieListes = $f_souscategoriesModel->findBy(['id_f_categories' => $_POST['id_Asupprimer']]);
                    foreach ($souscategorieListes as $souscategorieListe) {
                        // supprimer les topics de la sous categorie
                        // liste des topics à supprimer
                        $f_topicsModel = new F_topicsModel;
                        $topicListes = $f_topicsModel->findBy(['id_f_souscategories' => $_POST['id_Asupprimer']]);
                        // supprimer les messages de chaque topic puis le topic
                        foreach ($topicListes as $topicListe) {
                            $f_messagesModel = new F_messagesModel;
                            $messageListes = $f_messagesModel->findBy(['id_f_topics' => $topicListe->id]);
                            foreach ($messageListes as $messageListe) {
                                $f_messagesModel->delete($messageListe->id);
                            }
                            $f_topicsModel->delete($topicListe->id);
                        }
                        $f_souscategoriesModel->delete($_POST['id_Asupprimer']);
                    }
                    header('location: /forum/gestion');
                    exit;
                }
                $errors = ['msg' => 'Veuillez remplir correctement les champs.', 'redirect' => '/forum/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /* *********************************************** Gestion des sous catégories ***********************************************  */

    /**
     * Méthode permettant d'afficher une sous catégorie du forum
     *
     * @return void
     */
    public function viewSousCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET) && !empty($_GET)) {
                $params = explode('/', $_GET['p']);
                if (isset($params[2])) {
                    if (!$this->verifIdExist($params[2], 'F_souscategoriesModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    $f_souscategoriesModel = new F_souscategoriesModel;
                    $f_souscategorie = $f_souscategoriesModel->findViewSousCategorie($params[2])[0];
                    $f_topics = $f_souscategoriesModel->findSouscategorieTopics($params[2]);
                    $this->render('forum/viewSouscategorie', compact('f_souscategorie'), compact('f_topics'));
                    exit;
                }
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


    /**
     * Méthode permettant l'ajout d'une sous-catégorie
     *
     * @return void
     */
    public function ajouterSouscategorie()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['raison']) && empty($_POST['raison'])
                    && isset($_POST['ajoutSouscategorie']) && !empty($_POST['ajoutSouscategorie'])
                    && isset($_POST['id_categorie']) && !empty($_POST['id_categorie'])
                ) {
                    $f_souscategoriesModel = new F_souscategoriesModel;
                    $donnees = [
                        'nom' => htmlspecialchars(strip_tags($_POST['ajoutSouscategorie'])),
                        'id_f_categories' => $_POST['id_categorie']
                    ];
                    $f_souscategorie = $f_souscategoriesModel->hydrate($donnees);
                    $f_souscategoriesModel->create($f_souscategorie);
                    header('location: /forum/gestion');
                    exit;
                }
                $errors = ['msg' => 'Veuillez remplir correctement les champs.', 'redirect' => '/forum/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de modifier une sous-catégorie
     *
     * @return void
     */
    public function modifierSouscategorie()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['raison']) && empty($_POST['raison'])
                    && isset($_POST['id_souscategorie']) && !empty($_POST['id_souscategorie'])
                    && isset($_POST['sujet_souscategorie']) && !empty($_POST['sujet_souscategorie'])
                ) {
                    if (!$this->verifIdExist($_POST['id_souscategorie'], 'F_souscategoriesModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    $f_souscategoriesModel = new F_souscategoriesModel;
                    $donnees = [
                        'nom' => htmlspecialchars(strip_tags($_POST['sujet_souscategorie']))
                    ];
                    $f_souscategorie = $f_souscategoriesModel->hydrate($donnees);
                    $f_souscategoriesModel->update($_POST['id_souscategorie'], $f_souscategorie);
                    header('location: /forum/gestion');
                    exit;
                }
                $errors = ['msg' => 'Veuillez remplir correctement les champs.', 'redirect' => '/forum/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de supprimer une sous catégorie, avec tous ses topics et tous ses messages.
     *
     * @return void
     */
    public function supprimerSouscategorie()
    {
        if ($_SESSION['user']->fonction >= 2) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['id_Asupprimer']) && !empty($_POST['id_Asupprimer'])) {
                    if (!$this->verifIdExist($_POST['id_Asupprimer'], 'F_souscategoriesModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    // supprimer la sous categorie
                    $f_souscategoriesModel = new F_souscategoriesModel;
                    $f_souscategoriesModel->delete($_POST['id_Asupprimer']);
                    // supprimer les topics de la sous categorie
                    // liste des topics à supprimer
                    $f_topicsModel = new F_topicsModel;
                    $topicListes = $f_topicsModel->findBy(['id_f_souscategories' => $_POST['id_Asupprimer']]);
                    // supprimer les messages de chaque topic puis le topic
                    foreach ($topicListes as $topicListe) {
                        $f_messagesModel = new F_messagesModel;
                        $messageListes = $f_messagesModel->findBy(['id_f_topics' => $topicListe->id]);
                        foreach ($messageListes as $messageListe) {
                            $f_messagesModel->delete($messageListe->id);
                        }
                        $f_topicsModel->delete($topicListe->id);
                    }
                    header('location: /forum/gestion');
                    exit;
                }
                $errors = ['msg' => 'Veuillez remplir correctement les champs.', 'redirect' => '/forum/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Accès refusé !', 'redirect' => '/main/index'];
        $this->render('main/errors', compact('errors'));
    }

    /* *********************************************** Gestion des topics ***********************************************  */

    /**
     * Méthode créant un nouveau topic suivant les infos entrées dans le formulaire de la page viewsouscategorie
     * Création d'un nouveau topic dans la table f_topics
     * création d'un nouveau message dans la table f_messages
     *
     * @return void
     */
    public function nouveauTopic()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['raison']) && empty($_POST['raison'])) {
                    if (
                        isset($_POST['sujet']) && !empty($_POST['sujet'])
                        && isset($_POST['message']) && !empty($_POST['message'])
                        && isset($_POST['id_souscategorie']) && !empty($_POST['id_souscategorie'])
                    ) {
                        if (isset($_POST['tmail'])) {
                            $notif_mail = 1;
                        } else {
                            $notif_mail = 0;
                        }
                        // recherche de la catégorie
                        $f_souscategoriesModel = new F_souscategoriesModel;
                        $f_souscategories = $f_souscategoriesModel->find($_POST['id_souscategorie']);
                        $id_categorie = $f_souscategories->id_f_categories;
                        // creation du topic dans f_topics
                        $donnees1 = [
                            'sujet' => htmlspecialchars(strip_tags($_POST['sujet'])),
                            'date_heure_creation' => date('Y-m-d H:i:s'),
                            'notif_createur' => $notif_mail,
                            'id_Membres' => $_SESSION['user']->id,
                            'id_f_souscategories' => $_POST['id_souscategorie'],
                            'id_f_categories' => $id_categorie
                        ];
                        $f_topicsModel = new F_topicsModel;
                        $f_topics = $f_topicsModel->hydrate($donnees1);
                        $f_topicsModel->create($f_topics);
                        // creation du message dans f_messages
                        $f_topics = $f_topicsModel->findMax_id();
                        $donnees = [
                            'date_heure_post' => $donnees1['date_heure_creation'],
                            'date_heure_edition' => $donnees1['date_heure_creation'],
                            'contenu' => htmlspecialchars(strip_tags($_POST['message'])),
                            'id_f_topics' => $f_topics->max_id,
                            'id_Membres' => $_SESSION['user']->id
                        ];
                        $f_messagesModel = new F_messagesModel;
                        $f_messages = $f_messagesModel->hydrate($donnees);
                        $f_messagesModel->create($f_messages);
                        header('Location: /forum/viewTopic/' . $f_topics->max_id);
                        exit;
                    }
                }
            }
            $errors = ['msg' => 'Veuillez remplir correctement les champs.', 'redirect' => '/forum/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Veuillez vous connecter<br>pour participer au forum.', 'redirect' => '/forum/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant d'afficher un topic avec tous ses messages
     *
     * @return void
     */
    public function viewTopic()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET) && !empty($_GET)) {
                $params = explode('/', $_GET['p']);
                if (isset($params[2])) {
                    if (!$this->verifIdExist($params[2], 'F_topicsModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    $f_topicsModel = new F_topicsModel;
                    $f_topics = $f_topicsModel->viewTopic($params[2])[0];
                    // chercher les messages du topic
                    $f_messagesModel = new F_messagesModel;
                    $f_messages = $f_messagesModel->viewTopicMessage($params[2]);
                    $this->render('forum/viewTopic', compact('f_topics'), compact('f_messages'));
                    exit;
                }
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


    /**
     * Méthode permettant de supprimer un topic, et tous ses messages.
     *
     * @return void
     */
    public function supprimerTopic()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['id_Asupprimer']) && !empty($_POST['id_Asupprimer'])) {
                    if (!$this->verifIdExist($_POST['id_Asupprimer'], 'F_topicsModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    $f_topicsModel = new F_topicsModel;
                    $f_topics = $f_topicsModel->find($_POST['id_Asupprimer']);
                    if ($f_topics->id_Membres != $_SESSION['user']->id && $_SESSION['user']->fonction < 2) {
                        header('location: /forum/index');
                        exit;
                    }
                    $f_topicsModel->delete($_POST['id_Asupprimer']);
                    //supprimet TOUS les messages du topic
                    $f_messagesModel = new F_messagesModel;
                    $f_messagesModel->deleteMassif($_POST['id_Asupprimer'], 'id_f_topics');
                    if (isset($_SERVER['HTTP_REFERER']) and !empty($_SERVER['HTTP_REFERER'])) {
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        exit;
                    } else {
                        header('location: /forum/viewSouscategorie/' . $f_topics->id_f_souscategories);
                        exit;
                    }
                }
            }
            $errors = ['msg' => 'Erreur de traitement !<br>Veuillez réessayer.', 'redirect' => '/forum/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Veuillez vous connecter<br>pour participer au forum.', 'redirect' => '/forum/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Métode permettant de modifier le topic (sujet)
     *
     * @return void
     */
    public function modifierTopic()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['id_topic']) && !empty($_POST['id_topic'])
                    && isset($_POST['sujet']) && !empty($_POST['sujet'])
                ) {
                    if (!$this->verifIdExist($_POST['id_topic'], 'F_topicsModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    $donnees = [
                        'sujet' => htmlspecialchars(strip_tags($_POST['sujet']))
                    ];
                    $f_topicsModel = new F_topicsModel;
                    $f_topic = $f_topicsModel->hydrate($donnees);
                    $f_topicsModel->update($_POST['id_topic'], $f_topic);
                    $f_topic = $f_topicsModel->find($_POST['id_topic']);
                    header('location: /forum/viewSouscategorie/' . $f_topic->id_f_souscategories);
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur de traitement !<br>Veuillez réessayer.', 'redirect' => '/forum/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Veuillez vous connecter<br>pour participer au forum.', 'redirect' => '/forum/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Modifications du suivi d'un topic par son créateur.
     *
     * @return void
     */
    public function watchUnwatch()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET) && !empty($_GET)) {
                $params = explode('/', $_GET['p']);
                if (isset($params[2])) {
                    if (!$this->verifIdExist($params[2], 'F_topicsModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    $f_topicsModel = new F_topicsModel;
                    $f_topic = $f_topicsModel->find($params[2]);
                    if ($f_topic->notif_createur == 1) {
                        $donnees = ['notif_createur' => 0];
                    } else {
                        $donnees = ['notif_createur' => 1];
                    }
                    $f_topicModif = $f_topicsModel->hydrate($donnees);
                    $f_topicsModel->update($f_topic->id, $f_topicModif);
                }
            }
        }
        if (isset($_SERVER['HTTP_REFERER']) and !empty($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            header('Location: /Main/index');
            exit;
        }
    }

    /* *********************************************** Gestion des messages ***********************************************  */

    /**
     * Méthode de création d'un nouveau message
     *
     * @return void
     */
    public function nouveauMessage()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (
                    isset($_POST['raison']) && empty($_POST['raison'])
                    && isset($_POST['message']) && !empty($_POST['message'])
                    && isset($_POST['id_topic']) && !empty($_POST['id_topic'])
                ) {
                    if (!$this->verifIdExist($_POST['id_topic'], 'F_topicsModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    $donnees = [
                        'date_heure_post' => date('Y-m-d H:i:s'),
                        'date_heure_edition' => date('Y-m-d H:i:s'),
                        'contenu' => htmlspecialchars(strip_tags($_POST['message'])),
                        'id_f_topics' => $_POST['id_topic'],
                        'id_Membres' => $_SESSION['user']->id
                    ];
                    $f_messagesModel = new F_messagesModel;
                    $f_messages = $f_messagesModel->hydrate($donnees);
                    $f_messagesModel->create($f_messages);
                    $this->newNotificationForum($_POST['id_topic']);
                    header("location: /forum/viewTopic/" . $_POST['id_topic']);
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur de traitement !<br>Veuillez réessayer.', 'redirect' => '/forum/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Veuillez vous connecter<br>pour participer au forum.', 'redirect' => '/forum/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode de suppression d'un message.
     *
     * @return void
     */
    public function supprimerMessage()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['id_Asupprimer']) && !empty($_POST['id_Asupprimer'])) {
                    if (!$this->verifIdExist($_POST['id_Asupprimer'], 'F_messagesModel')) {
                        header('location: /forum/index');
                        exit;
                    }
                    $f_messagesModel = new F_messagesModel;
                    $f_messages = $f_messagesModel->find($_POST['id_Asupprimer']);
                    if ($f_messages->id_Membres != $_SESSION['user']->id && $_SESSION['user']->fonction < 2) {
                        header('location: /forum/index');
                        exit;
                    }
                    $f_messagesModel->delete($_POST['id_Asupprimer']);
                    header('location: /forum/viewTopic/' . $f_messages->id_f_topic);
                    exit;
                }
            }
            $errors = ['msg' => 'Erreur de traitement !<br>Veuillez réessayer.', 'redirect' => '/forum/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Veuillez vous connecter<br>pour participer au forum.', 'redirect' => '/forum/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode d'accès au formulaire de modification d'un message
     *
     * @return void
     */
    public function modifierMessage()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET) && !empty($_GET)) {
                    $params = explode('/', $_GET['p']);
                    if (isset($params[2])) {
                        if (!$this->verifIdExist($params[2], 'F_messagesModel')) {
                            header('location: /forum/index');
                            exit;
                        }
                        $f_messagesModel = new F_messagesModel;
                        $f_message = $f_messagesModel->find($params[2]);
                        $f_topicsModel = new F_topicsModel;
                        $f_topic = $f_topicsModel->find($f_message->id_f_topics);
                        $f_categoriesModel = new F_categoriesModel;
                        $f_categorie = $f_categoriesModel->find($f_topic->id_f_categories);
                        $f_souscategoriesModel = new F_souscategoriesModel;
                        $f_souscategorie = $f_souscategoriesModel->find($f_topic->id_f_souscategories);
                        $donnees = [
                            'topic_id' => $f_topic->id,
                            'topic_sujet' => $f_topic->sujet,
                            'categorie_id' => $f_categorie->id,
                            'categorie_name' => $f_categorie->nom,
                            'souscategorie_id' => $f_souscategorie->id,
                            'souscategorie_name' => $f_souscategorie->nom
                        ];
                        $this->render('forum/redigerMessage', compact('f_message'), compact('donnees'));
                        exit;
                    }
                }
            }
            $errors = ['msg' => 'Erreur de traitement !<br>Veuillez réessayer.', 'redirect' => '/forum/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Veuillez vous connecter<br>pour participer au forum.', 'redirect' => '/forum/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode de validation de la modification d'un message.
     *
     * @return void
     */
    public function editMessage()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['raison']) && empty($_POST['raison'])) {
                    if (
                        isset($_POST['id_message']) && !empty($_POST['id_message'])
                        && isset($_POST['id_topic']) && !empty($_POST['id_topic'])
                        && isset($_POST['message']) && !empty($_POST['message'])
                    ) {
                        if (!$this->verifIdExist($_POST['id_message'], 'F_messagesModel')) {
                            header('location: /forum/index');
                            exit;
                        }
                        $donnees = [
                            'contenu' => htmlspecialchars(strip_tags($_POST['message'])),
                            'date_heure_edition' => date('Y-m-d H:i:s')
                        ];
                        $f_messagesModel = new F_messagesModel;
                        $f_message = $f_messagesModel->hydrate($donnees);
                        $f_messagesModel->update($_POST['id_message'], $f_message);
                        header('location: /forum/viewTopic/' . $_POST['id_topic']);
                        exit;
                    }
                }
            }
            $errors = ['msg' => 'Erreur de traitement !<br>Veuillez réessayer.', 'redirect' => '/forum/index'];
            $this->render('main/errors', compact('errors'));
            exit;
        }
        $errors = ['msg' => 'Veuillez vous connecter<br>pour participer au forum.', 'redirect' => '/forum/index'];
        $this->render('main/errors', compact('errors'));
    }


    /**
     * Méthode permettant de citer un message
     *
     * @return void
     */
    public function citerMessage()
    {
        if ($_SESSION['user']->fonction != 0) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET) && !empty($_GET)) {
                    $params = explode('/', $_GET['p']);
                    if (isset($params[2])) {
                        if (!$this->verifIdExist($params[2], 'F_messagesModel')) {
                            header('location: /forum/index');
                            exit;
                        }
                        $f_messagesModel = new F_messagesModel;
                        $f_message = $f_messagesModel->find($params[2]);
                        $f_topicsModel = new F_topicsModel;
                        $f_topic = $f_topicsModel->find($f_message->id_f_topics);
                        $f_categoriesModel = new F_categoriesModel;
                        $f_categorie = $f_categoriesModel->find($f_topic->id_f_categories);
                        $f_souscategoriesModel = new F_souscategoriesModel;
                        $f_souscategorie = $f_souscategoriesModel->find($f_topic->id_f_souscategories);
                        $donnees = [
                            'topic_id' => $f_topic->id,
                            'topic_sujet' => $f_topic->sujet,
                            'categorie_id' => $f_categorie->id,
                            'categorie_name' => $f_categorie->nom,
                            'souscategorie_id' => $f_souscategorie->id,
                            'souscategorie_name' => $f_souscategorie->nom
                        ];
                        $action = [
                            'action' => 'citer'
                        ];
                        $this->render('forum/redigerMessage', compact('f_message'), compact('donnees'), compact('action'));
                        exit;
                    }
                }
                $errors = ['msg' => 'Erreur de traitement !<br>Veuillez réessayer.', 'redirect' => '/forum/index'];
                $this->render('main/errors', compact('errors'));
                exit;
            }
        }
        $errors = ['msg' => 'Veuillez vous connecter<br>pour participer au forum.', 'redirect' => '/forum/index'];
        $this->render('main/errors', compact('errors'));
    }

    /* *********************************************** Gestion des notifications ***********************************************  */

    /**
     * Création d'une notification si le topic est suivi et si le posteur est différent du créateur du topic.
     *
     * @param integer $id_topic ID du topic
     * @return void
     */
    function newNotificationForum(int $id_topic)
    {
        $f_topicsModel = new F_topicsModel;
        $f_topic = $f_topicsModel->find($id_topic);
        if ($f_topic->notif_createur = 1 && $f_topic->id_Membres != $_SESSION['user']->id) {
            $message = 'Bonjour, vous suivez le topic du forum : « ' . $f_topic->sujet . ' ».<br><i class="fas fa-caret-right"></i>&ensp;Ce topic a reçu une réponse, ' . strftime('le %x à %T', strtotime(date("Y-m-d H:i:s" ))) .'<br>';
            $message .= '<i class="fas fa-caret-right"></i>&ensp;<a href="/forum/viewTopic/' . $f_topic->id . '">Visiter le topic...</a>&emsp;';
            $message .= '<a href="/forum/watchUnwatch/' . $f_topic->id . '">Ne plus suivre le topic...</a>';
            $this->newNotification($f_topic->id_Membres, 'message', $message);
        }
    }
}
