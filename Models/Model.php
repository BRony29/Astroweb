<?php

namespace App\Models;

use DateTime;
use DateTimeImmutable;
use App\Core\Db;

class Model extends Db
{
    // Table de la base de données
    protected $table;

    // Instance de connexion
    private $db;


    /* *********************************************** Méthodes globales ***********************************************  */


    /**
     * Sélection de tous les enregistrements d'une table
     * @return array Tableau des enregistrements trouvés
     */
    public function findAll()
    {
        $query = $this->requete('SELECT * FROM ' . $this->table);
        return $query->fetchAll();
    }


    /**
     * Sélection de tous les enregistrements d'une table rangés par login 
     * @return array Tableau des enregistrements trouvés
     */
    public function findAllLogin()
    {
        $query = $this->requete("SELECT * FROM {$this->table} ORDER BY login");
        return $query->fetchAll();
    }


    /**
     * Sélection de tous les enregistrements d'une table rangés par ordre descendant 
     * @return array Tableau des enregistrements trouvés
     */
    public function findAllDesc()
    {
        $query = $this->requete("SELECT * FROM {$this->table} ORDER BY id DESC");
        return $query->fetchAll();
    }


    /**
     * Sélection de plusieurs enregistrements suivant un tableau de critères
     * @param array $criteres Tableau de critères
     * @return array Tableau des enregistrements trouvés
     */
    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];
        foreach ($criteres as $champ => $valeur) {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
        }
        // On transforme le tableau en chaîne de caractères séparée par des AND
        $liste_champs = implode(' AND ', $champs);
        // On exécute la requête
        return $this->requete('SELECT * FROM ' . $this->table . ' WHERE ' . $liste_champs, $valeurs)->fetchAll();
    }


    /**
     * Sélection d'un enregistrement suivant son id
     * @param int $id id de l'enregistrement
     * @return object Objet contenant l'enregistrement trouvé
     */
    public function find(int $id)
    {
        // On exécute la requête
        return $this->requete("SELECT * FROM {$this->table} WHERE id = $id")->fetch();
    }


    /**
     * Sélection de l'id le plus élévé dans une table
     *
     * @return Object Objet contenant l'enregistrement trouvé
     */
    public function findMax_id()
    {
        // return $query = $this->requete("SELECT MAX(id) AS max_id FROM {$this->table}")->fetch();
        return $this->requete("SELECT MAX(id) AS max_id FROM {$this->table}")->fetch();
    }


    /**
     * Insertion d'un enregistrement suivant un tableau de données
     * @param Model $model Objet à créer
     * @return bool
     */
    public function create(Model $model)
    {
        $champs = [];
        $inter = [];
        $valeurs = [];
        // On boucle pour éclater le tableau
        foreach ($model as $champ => $valeur) {
            // INSERT INTO annonces (titre, description, actif) VALUES (?, ?, ?)
            if ($valeur != null && $champ != 'db' && $champ != 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }
        // On transforme le tableau "champs" en une chaine de caractères
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);
        // On exécute la requête
        return $this->requete('INSERT INTO ' . $this->table . ' (' . $liste_champs . ') VALUES(' . $liste_inter . ')', $valeurs);
    }


    /**
     * Mise à jour d'un enregistrement suivant un tableau de données
     * @param int $id id de l'enregistrement à modifier
     * @param Model $model Objet à modifier
     * @return bool
     */
    public function update(int $id, Model $model)
    {
        $champs = [];
        $valeurs = [];
        // On boucle pour éclater le tableau
        foreach ($model as $champ => $valeur) {
            // UPDATE annonces SET titre = ?, description = ?, actif = ? WHERE id= ?
            if ($valeur !== null && $champ != 'db' && $champ != 'table') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $id;
        // On transforme le tableau "champs" en une chaine de caractères
        $liste_champs = implode(', ', $champs);
        // On exécute la requête
        return $this->requete('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?', $valeurs);
    }


    /**
     * Suppression d'un enregistrement
     * @param int $id id de l'enregistrement à supprimer
     * @return bool 
     */
    public function delete($id)
    {
        return $this->requete("DELETE FROM {$this->table}  WHERE id = ?", [$id]);
    }


    /**
     * Méthode qui exécutera les requêtes
     * @param string $sql Requête SQL à exécuter
     * @param array $attributs Attributs à ajouter à la requête 
     * @return PDOStatement|false 
     */
    public function requete(string $sql, array $attributs = null)
    {
        // On récupère l'instance de Db
        $this->db = Db::getInstance();
        // On vérifie si on a des attributs
        if ($attributs !== null) {
            // Requête préparée
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {
            // Requête simple
            return $this->db->query($sql);
        }
    }


    /**
     * Hydratation des données
     * @param array $donnees Tableau associatif des données
     * @return self Retourne l'objet hydraté
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                // On appelle le setter.
                $this->$setter($value);
            }
        }
        return $this;
    }


    /* *********************************************** Méthodes GaleriependingModel ***********************************************  */


    /**
     * * Extrait un tableau de données avec une jointure gauche entre deux tables 
     *
     * @return Array Tableau des enregistrements trouvés
     */
    public function findPendingLogin()
    {
        return $this->requete("SELECT galeriepending.id, description, imagePath, login FROM galeriepending LEFT JOIN membres ON galeriepending.id_Membres = membres.id")->fetchAll();
    }


    /* *********************************************** Méthodes ArticlesModel ***********************************************  */


    /**
     * Extrait un tableau contenant les id, categorie et titre des articles
     * rangé par ordre alphabétique des catégories puis des titres
     * @return Array Tableau des enregistrements trouvés
     */
    public function findArticlesNoContenu()
    {
        return $this->requete("SELECT id, categorie, titre FROM {$this->table} ORDER by categorie, titre")->fetchAll();
    }


    /* *********************************************** Méthodes ForumModel ***********************************************  */


    /**
     * Extrait un tableau contenant les categories du forum, le nombre de message par catégorie, le dernier
     * message de chaque catégorie (sujet et id), classé par ordre alphabétique inversé des catégories.
     * page forum index
     *
     * @return array Tableau des enregistrements trouvés
     */
    public function findCategorieIndex()
    {
        return $this->requete("SELECT f_categories.id, f_categories.nom, 
        (SELECT count(*) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_categories = f_categories.id) AS compteur,
        (SELECT id FROM f_messages WHERE f_messages.id =
            (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_categories = f_categories.id)) AS id_msg,
        (SELECT date_heure_post FROM f_messages WHERE f_messages.id =
            (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_categories = f_categories.id)) AS dhp_msg,
        (SELECT date_heure_edition FROM f_messages WHERE f_messages.id =
            (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_categories = f_categories.id)) AS dhe_msg,
        (SELECT id_f_topics FROM f_messages WHERE f_messages.id =
            (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_categories = f_categories.id)) AS id_topic,
        (SELECT membres.login FROM membres WHERE membres.id = 
            (SELECT id_Membres FROM f_messages WHERE f_messages.id =
                (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_categories = f_categories.id))) AS auteur_msg,
        (SELECT id FROM f_topics WHERE f_topics.id =
            (SELECT f_messages.id_f_topics FROM f_messages WHERE f_messages.id =
                (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_categories = f_categories.id))) AS id_sujet,
        (SELECT sujet FROM f_topics WHERE f_topics.id =
            (SELECT f_messages.id_f_topics FROM f_messages WHERE f_messages.id =
                (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_categories = f_categories.id))) AS sujet
        FROM f_categories ORDER BY f_categories.nom DESC")->fetchAll();
    }


    /**
     * Extrait d'un tableau contenant toutes les sous-categories d'une catégorie avec id, nom.
     * le nombre de message de chaque sous-categorie.
     * et le dernier message de chaque catégorie.
     * page viewcategorie
     *
     * @param integer $id ID de la sous catégorie
     * @return array Tableau des enregistrements trouvés
     */
    public function findViewCategorie($id)
    {
        return $this->requete("SELECT f_souscategories.id, f_souscategories.nom,
        (SELECT COUNT(*) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_souscategories = f_souscategories.id) AS compteur,
        (SELECT id FROM f_topics WHERE f_topics.id =
            (SELECT f_messages.id_f_topics FROM f_messages WHERE f_messages.id =
                (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_souscategories = f_souscategories.id))) AS id_topic,
        (SELECT sujet FROM f_topics WHERE f_topics.id =
            (SELECT f_messages.id_f_topics FROM f_messages WHERE f_messages.id =
                (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_souscategories = f_souscategories.id))) AS sujet,
        (SELECT login FROM membres WHERE membres.id =
            (SELECT id_Membres FROM f_messages WHERE f_messages.id =
                (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_souscategories = f_souscategories.id))) AS auteur_msg,
        (SELECT date_heure_post FROM f_messages WHERE f_messages.id = 
            (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_souscategories = f_souscategories.id)) AS dhp_msg,
        (SELECT date_heure_edition FROM f_messages WHERE f_messages.id = 
            (SELECT MAX(f_messages.id) FROM f_messages INNER JOIN f_topics WHERE f_messages.id_f_topics = f_topics.id AND f_topics.id_f_souscategories = f_souscategories.id)) AS dhe_msg
        FROM f_souscategories WHERE f_souscategories.id_f_categories = $id")->fetchAll();
    }


    /**
     * Extrait un tableau contenant l'id et le nom de la sous categorie et le nom et l'id de la categorie mère
     * page viewSouscategorie
     * 
     * @param integer $id ID de la sous categorie
     * @return array Tableau des enregistrements trouvés
     */
    public function findViewSousCategorie(int $id)
    {
        return $this->requete("SELECT id, nom, id_f_categories,
        (SELECT nom FROM f_categories WHERE f_categories.id = f_souscategories.id_f_categories) AS categorie
        FROM f_souscategories WHERE f_souscategories.id = $id")->fetchAll();
    }


    /**
     * Extrait d'un tableau contenant tous les topics reliés à une sous catégorie avec :
     * id, sujet, contenu, date_heure_creation, createur des topics.
     * le dernier message de chaque topic.
     * page viewSouscategorie
     *
     * @param integer $id ID de la sous catégorie
     * @return array Tableau des enregistrements trouvés
     */
    public function findSouscategorieTopics(int $id)
    {
        return $this->requete("SELECT f_topics.id, f_topics.sujet, f_topics.date_heure_creation AS dhc_topic, f_topics.id_Membres AS auteur_topic_id,
        (SELECT login FROM membres WHERE membres.id = f_topics.id_Membres) AS auteur_topic,
        (SELECT login FROM membres WHERE membres.id =
            (SELECT id_Membres FROM f_messages WHERE f_messages.id = 
                (SELECT MAX(id) FROM f_messages WHERE f_messages.id_f_topics = f_topics.id))) AS auteur_msg,
        (SELECT date_heure_edition FROM f_messages WHERE f_messages.id =
            (SELECT MAX(id) FROM f_messages WHERE f_messages.id_f_topics = f_topics.id)) AS dhe_msg,
        (SELECT date_heure_post FROM f_messages WHERE f_messages.id =
            (SELECT MAX(id) FROM f_messages WHERE f_messages.id_f_topics = f_topics.id)) AS dhp_msg
        FROM f_topics WHERE f_topics.id_f_souscategories = $id ORDER BY f_topics.id DESC")->fetchAll();
    }


    /**
     * Extrait d'un tableau contenant un topic
     * page viewTopic
     * 
     * @param integer $id ID du topic
     * @return array Tableau des enregistrements trouvés
     */
    public function viewTopic(int $id)
    {
        return $this->requete("SELECT id, sujet, date_heure_creation AS dhc_topic, id_f_categories, id_f_souscategories, notif_createur,
        (SELECT login FROM membres WHERE membres.id = f_topics.id_Membres) AS auteur_topic,
        (SELECT nom FROM f_souscategories WHERE f_souscategories.id = f_topics.id_f_souscategories) AS nom_f_souscategories,
        (SELECT nom FROM f_categories WHERE f_categories.id = f_topics.id_f_categories) AS nom_f_categories
        FROM f_topics WHERE f_topics.id = $id")->fetchAll();
    }


    /**
     * Extrait d'un tableau contenant tous les messages d'un topic.
     * page viewTopic
     * 
     * @param integer $id ID du topic
     * @return array Tableau des enregistrements trouvés
     */
    public function viewTopicMessage(int $id)
    {
        return $this->requete("SELECT id, date_heure_post AS dhp_msg, date_heure_edition AS dhe_msg, contenu, id_Membres AS id_auteur,
        (SELECT login FROM membres WHERE membres.id = f_messages.id_Membres) AS login_auteur
        FROM f_messages WHERE f_messages.id_f_topics=$id")->fetchAll();
    }


    /**
     * Suppression massive de données dans le forum
     * Suppression massive des notifications d'un adhérent
     *
     * @param integer $id ID du topic ou de la categorie ou de la sous categorie à supprimer.
     * @param string $attribut : Colonne définissant la suppression (id_f_topics, id_f_categories ou id_f_souscategories)
     * @return void
     */
    public function deleteMassif(int $id, string $attribut)
    {
        return $this->requete("DELETE FROM {$this->table} WHERE {$this->table}.$attribut = ?", [$id]);
    }


/* *********************************************** Méthodes NotificationsModel ***********************************************  */


    /**
     * Modification massive de données, par exemple les notifications d'un adhérent
     *
     * @param integer $id ID de l'adhérent
     * @param string $attribut1 Champs de la première condition: 'id_Membres' par exemple
     * @param integer $valeur Valeur à mettre dans le champs $attribut2
     * @param string $attribut2 Champs de la seconde condition:, 'lue' par exemple
     * @return void
     */
    public function modificationMassive(int $id, string $attribut1, int $valeur, string $attribut2)
    {
        return $this->requete("UPDATE {$this->table} SET $attribut2 = ? WHERE {$this->table}.$attribut1 = ? AND {$this->table}.$attribut2 !=  ?", [$valeur, $id, $valeur]);
    }


    /**
     * Suppression massive de données, par exemple les notifications d'un adhérent
     *
     * @param integer $id ID de l'adhérent
     * @param string $attribut1 Champs de la première condition: 'id_Membres' par exemple
     * @param integer $valeur Valeur à mettre dans le champs $attribut2
     * @param string $attribut2 Champs de la seconde condition:, 'lue' par exemple
     * @return void
     */
    public function deleteMassif2(int $id, string $attribut1, int $valeur, string $attribut2)
    {
        return $this->requete("DELETE FROM {$this->table} WHERE {$this->table}.$attribut1 = ? AND {$this->table}.$attribut2 = ?", [$id, $valeur]);
    }


    /* *********************************************** Méthodes Rechercher ***********************************************  */


    /**
     * Recherche parmi les adhérents
     *
     * @param string $valeur Chaîne de cractères à rechercher
     * @return array Tableau des enregistrements trouvés
     */
    public function searchAdherent(string $valeur)
    {
        return $this->requete("SELECT login, prenom, tel, email FROM membres
        WHERE nom LIKE '%".$valeur."%'
        OR prenom LIKE '%".$valeur."%'
        OR login LIKE '%".$valeur."%'
        OR adresse LIKE '%".$valeur."%'
        OR ville LIKE '%".$valeur."%'
        ORDER BY id DESC")->fetchAll();
    }


    /**
     * Recherche parmi les articles
     *
     * @param string $valeur Chaîne de cractères à rechercher
     * @return array Tableau des enregistrements trouvés
     */
    public function searchArticle(string $valeur)
    {
        return $this->requete("SELECT titre, id FROM articles
        WHERE titre LIKE '%".$valeur."%'
        OR contenu LIKE '%".$valeur."%'
        ORDER BY id DESC")->fetchAll();
    }


    /**
     * Recherche parmi les actualités
     *
     * @param string $valeur Chaîne de cractères à rechercher
     * @return array Tableau des enregistrements trouvés
     */
    public function searchActualite(string $valeur)
    {
        return $this->requete("SELECT titre, date, commentaire FROM actualites
        WHERE titre LIKE '%".$valeur."%'
        OR commentaire LIKE '%".$valeur."%'
        ORDER BY id DESC")->fetchAll();
    }


    /**
     * Recherche parmi les évènements
     *
     * @param string $valeur Chaîne de cractères à rechercher
     * @return array Tableau des enregistrements trouvés
     */
    public function searchEvenement(string $valeur)
    {
        return $this->requete("SELECT titre, lieu, description, date FROM evenements
        WHERE titre LIKE '%".$valeur."%'
        OR lieu LIKE '%".$valeur."%'
        OR description LIKE '%".$valeur."%'
        ORDER BY id DESC")->fetchAll();
    }


    /**
     * Recherche dans les messages du forum
     *
     * @param string $valeur Chaîne de cractères à rechercher
     * @return array Tableau des enregistrements trouvés
     */
    public function searchF_messages(string $valeur)
    {
        return $this->requete("SELECT contenu, id_f_topics AS topic_id,
        (SELECT login FROM membres WHERE membres.id = f_messages.id_Membres) AS auteur_msg,
        (SELECT f_topics.sujet FROM f_topics WHERE f_topics.id = f_messages.id_f_topics) AS topic_sujet
        FROM f_messages
        WHERE f_messages.contenu LIKE '%".$valeur."%'
        ORDER BY id_f_topics DESC")->fetchAll();
    }


    /* *********************************************** Méthodes Calendrier ***********************************************  */


    /**
     * Retourne un tableau des évènements entre deux dates.
     *
     * @param DateTimeImmutable $start Date de début
     * @param DateTimeImmutable $end Date de fin
     * @return  array Tableau des enregistrements trouvés
     */
    public function calendarEvents(DateTimeImmutable $start, DateTimeImmutable $end)
    {
        return $this->requete("SELECT * from {$this->table} WHERE date BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'")->fetchAll();
    }

}

