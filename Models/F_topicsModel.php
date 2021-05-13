<?php

namespace App\Models;

class F_topicsModel extends Model
{
    protected $id;
    protected $sujet;
    protected $contenu;
    protected $date_heure_creation;
    protected $notif_createur;
    protected $id_Membres;
    protected $id_f_souscategories;
    protected $id_f_categories;

    public function __construct()
    {
        $this->table = 'f_topics';
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of sujet
     */ 
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set the value of sujet
     *
     * @return  self
     */ 
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get the value of contenu
     */ 
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */ 
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of date_heure_creation
     */ 
    public function getDate_heure_creation()
    {
        return $this->date_heure_creation;
    }

    /**
     * Set the value of date_heure_creation
     *
     * @return  self
     */ 
    public function setDate_heure_creation($date_heure_creation)
    {
        $this->date_heure_creation = $date_heure_creation;

        return $this;
    }

    /**
     * Get the value of notif_createur
     */ 
    public function getNotif_createur()
    {
        return $this->notif_createur;
    }

    /**
     * Set the value of notif_createur
     *
     * @return  self
     */ 
    public function setNotif_createur($notif_createur)
    {
        $this->notif_createur = $notif_createur;

        return $this;
    }

    /**
     * Get the value of id_Membres
     */ 
    public function getId_Membres()
    {
        return $this->id_Membres;
    }

    /**
     * Set the value of id_Membres
     *
     * @return  self
     */ 
    public function setId_Membres($id_Membres)
    {
        $this->id_Membres = $id_Membres;

        return $this;
    }

    /**
     * Get the value of id_f_souscategories
     */ 
    public function getId_f_souscategories()
    {
        return $this->id_f_souscategories;
    }

    /**
     * Set the value of id_f_souscategories
     *
     * @return  self
     */ 
    public function setId_f_souscategories($id_f_souscategories)
    {
        $this->id_f_souscategories = $id_f_souscategories;

        return $this;
    }

    /**
     * Get the value of id_f_categories
     */ 
    public function getId_f_categories()
    {
        return $this->id_f_categories;
    }

    /**
     * Set the value of id_f_categories
     *
     * @return  self
     */ 
    public function setId_f_categories($id_f_categories)
    {
        $this->id_f_categories = $id_f_categories;

        return $this;
    }
}