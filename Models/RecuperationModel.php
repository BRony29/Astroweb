<?php

namespace App\Models;

class RecuperationModel extends Model
{
    protected $id;
    protected $email;
    protected $code;
    protected $confirme;

    public function __construct()
    {
        $this->table = 'recuperation';
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

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of confirme
     */
    public function getConfirme()
    {
        return $this->confirme;
    }

    /**
     * Set the value of confirme
     *
     * @return  self
     */
    public function setConfirme($confirme)
    {
        $this->confirme = $confirme;

        return $this;
    }
}
