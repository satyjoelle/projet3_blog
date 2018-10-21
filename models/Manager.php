<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 24/09/2018
 * Time: 23:14
 */


abstract class Manager
{


    //objet PDO d'accès à la BDD
    protected $db;

    public function __construct()
    {
        $this->getBdd();
    }

    public function getBdd()
    {
        if ($this->db == null) {
            //création de la connexion à la bdd
            $this->db = new PDO('mysql:host=localhost;dbname=projet_blogecrivain;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        }

        return $this->db;

    }


}





