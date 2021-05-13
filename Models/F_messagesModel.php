<?php

namespace Astroweb\Models;

class F_messagesModel extends Model
{
    protected $id;
    protected $date_heure_post;
    protected $date_heure_edition;
    protected $contenu;
    protected $id_f_topics;
    protected $id_Membres;

    public function __construct()
    {
        $this->table = 'f_messages';
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
     * Get the value of date_heure_post
     */ 
    public function getDate_heure_post()
    {
        return $this->date_heure_post;
    }

    /**
     * Set the value of date_heure_post
     *
     * @return  self
     */ 
    public function setDate_heure_post($date_heure_post)
    {
        $this->date_heure_post = $date_heure_post;

        return $this;
    }

    /**
     * Get the value of date_heure_edition
     */ 
    public function getDate_heure_edition()
    {
        return $this->date_heure_edition;
    }

    /**
     * Set the value of date_heure_edition
     *
     * @return  self
     */ 
    public function setDate_heure_edition($date_heure_edition)
    {
        $this->date_heure_edition = $date_heure_edition;

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
     * Get the value of id_f_topics
     */ 
    public function getId_f_topics()
    {
        return $this->id_f_topics;
    }

    /**
     * Set the value of id_f_topics
     *
     * @return  self
     */ 
    public function setId_f_topics($id_f_topics)
    {
        $this->id_f_topics = $id_f_topics;

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
}