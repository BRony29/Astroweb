<?php

namespace App\Models;

class NotificationsModel extends Model
{
    protected $id;
    protected $titre;
    protected $lue;
    protected $id_Membres;

    public function __construct()
    {
        $this->table = 'notifications';
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
     * Get the value of lue
     */ 
    public function getLue()
    {
        return $this->lue;
    }

    /**
     * Set the value of lue
     *
     * @return  self
     */ 
    public function setLue($lue)
    {
        $this->lue = $lue;

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
