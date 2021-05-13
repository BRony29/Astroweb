<?php

namespace App\Models;

class F_souscategoriesModel extends Model
{
    protected $id;
    protected $nom;
    protected $id_f_categories;

    public function __construct()
    {
        $this->table = 'f_souscategories';
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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

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