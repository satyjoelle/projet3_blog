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
            $this->db = new PDO('mysql:host=db733036290.db.1and1.com;dbname=db733036290;charset=utf8', 'dbo733036290', 'joelle123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        return $this->db;

    }
    public function verif(){
        $secu = (isset($_SESSION['pseudo']) && isset ($_SESSION['password']));
        return $secu;
    }



}





