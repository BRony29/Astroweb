<?php

namespace App\Models;

class GalerieModel extends Model
{
    protected $id;
    protected $dataCaption;
    protected $imagePath;

    public function __construct()
    {
        $this->table = 'galerie';
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
     * Get the value of dataCaption
     */ 
    public function getDataCaption()
    {
        return $this->dataCaption;
    }

    /**
     * Set the value of dataCaption
     *
     * @return  self
     */ 
    public function setDataCaption($dataCaption)
    {
        $this->dataCaption = $dataCaption;

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
}