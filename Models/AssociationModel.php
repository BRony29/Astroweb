<?php

namespace App\Models;

class AssociationModel extends Model
{
    protected $nom;
    protected $adresse;
    protected $codePostale;
    protected $ville;
    protected $nSiret;
    protected $nRNA;
    protected $tel;
    protected $email;

    public function __construct()
    {
        $this->table = 'associations';
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
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of codePostale
     */
    public function getCodePostale()
    {
        return $this->codePostale;
    }

    /**
     * Set the value of codePostale
     *
     * @return  self
     */
    public function setCodePostale($codePostale)
    {
        $this->codePostale = $codePostale;

        return $this;
    }

    /**
     * Get the value of ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of nSiret
     */
    public function getNSiret()
    {
        return $this->nSiret;
    }

    /**
     * Set the value of nSiret
     *
     * @return  self
     */
    public function setNSiret($nSiret)
    {
        $this->nSiret = $nSiret;

        return $this;
    }

    /**
     * Get the value of nRNA
     */
    public function getNRNA()
    {
        return $this->nRNA;
    }

    /**
     * Set the value of nRNA
     *
     * @return  self
     */
    public function setNRNA($nRNA)
    {
        $this->nRNA = $nRNA;

        return $this;
    }

    /**
     * Get the value of tel
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
