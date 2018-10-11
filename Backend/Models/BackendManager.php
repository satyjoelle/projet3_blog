<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 11/10/2018
 * Time: 11:49
 */
require_once 'app/Manager.php';
require_once 'app/Billet.php';

Class BackendManager extends Manager {

    //renvoie la liste des billets du blog
    public function getBillets()
    {
        $sql = 'SELECT id, title, post, date_created from billets ORDER BY id DESC';
        $req = $this->db->prepare($sql);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Billet');
        $billets = $req->fetchAll();
        return $billets;

    }











}