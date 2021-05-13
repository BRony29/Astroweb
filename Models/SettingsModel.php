<?php

namespace App\Models;

class SettingsModel extends Model
{
    protected $id;
    protected $defaultPwd;
    protected $essaisMax;
    protected $dureeSession;
    protected $poidsPhoto;
    protected $poidsThumb;

    public function __construct()
    {
        $this->table = 'settings';
    }

    /**
     * Get the value of defaultPwd
     */ 
    public function getDefaultPwd()
    {
        return $this->defaultPwd;
    }

    /**
     * Set the value of defaultPwd
     *
     * @return  self
     */ 
    public function setDefaultPwd($defaultPwd)
    {
        $this->defaultPwd = $defaultPwd;

        return $this;
    }

    /**
     * Get the value of essaisMax
     */ 
    public function getEssaisMax()
    {
        return $this->essaisMax;
    }

    /**
     * Set the value of essaisMax
     *
     * @return  self
     */ 
    public function setEssaisMax($essaisMax)
    {
        $this->essaisMax = $essaisMax;

        return $this;
    }

    /**
     * Get the value of dureeSession
     */ 
    public function getDureeSession()
    {
        return $this->dureeSession;
    }

    /**
     * Set the value of dureeSession
     *
     * @return  self
     */ 
    public function setDureeSession($dureeSession)
    {
        $this->dureeSession = $dureeSession;

        return $this;
    }

    /**
     * Get the value of poidsPhoto
     */ 
    public function getPoidsPhoto()
    {
        return $this->poidsPhoto;
    }

    /**
     * Set the value of poidsPhoto
     *
     * @return  self
     */ 
    public function setPoidsPhoto($poidsPhoto)
    {
        $this->poidsPhoto = $poidsPhoto;

        return $this;
    }

    /**
     * Get the value of poidsThumb
     */ 
    public function getPoidsThumb()
    {
        return $this->poidsThumb;
    }

    /**
     * Set the value of poidsThumb
     *
     * @return  self
     */ 
    public function setPoidsThumb($poidsThumb)
    {
        $this->poidsThumb = $poidsThumb;

        return $this;
    }
}