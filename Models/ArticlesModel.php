<?php

namespace Astroweb\Models;

class ArticlesModel extends Model
{
    protected $id;
    protected $categorie;
    protected $titre;
    protected $date;
    protected $contenu;
    protected $id_Membres;
    protected $id_Actualites;

    public function __construct()
    {
        $this->table = 'articles';
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
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

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
     * Get the value of id_Actualites
     */ 
    public function getId_Actualites()
    {
        return $this->id_Actualites;
    }

    /**
     * Set the value of id_Actualites
     *
     * @return  self
     */ 
    public function setId_Actualites($id_Actualites)
    {
        $this->id_Actualites = $id_Actualites;

        return $this;
    }
}