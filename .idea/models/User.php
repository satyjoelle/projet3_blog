<?php

Class User extends Entity{

    private $pseudo;
    private $email;
    private $password;
    private $date_registration;

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDateRegistration()
    {
        return $this->date_registration;
    }

    /**
     * @param mixed $date_registration
     */
    public function setDateRegistration($date_registration)
    {
        $this->date_registration = $date_registration;
    }

}



