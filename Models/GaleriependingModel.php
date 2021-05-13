<?php

namespace App\Models;

class GaleriependingModel extends Model
{
    protected $id;
    protected $description;
    protected $imagePath;
    protected $id_Membres;

    public function __construct()
    {
        $this->table = 'galeriepending';
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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of imagePath
     */ 
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * Set the value of imagePath
     *
     * @return  self
     */ 
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;

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