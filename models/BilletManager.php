<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 27/09/2018
 * Time: 16:21
 */

require_once 'models/Manager.php';
require_once 'models/Billet.php';
class BilletManager extends Manager
{

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

    public function getBillet($idBillet)
    {
        $sql = "SELECT * FROM billets WHERE id=:id";
        $req = $this->db->prepare($sql);
        $req->execute(array(':id'=>$idBillet));
        $req->setFetchMode(PDO::FETCH_CLASS, "Billet");
        $billet = $req->fetch();
        return $billet;
    }

    //creation du billet

    public function addBillet(Billet $billet)
    {
        $q = $this->db->prepare('INSERT INTO billets (title, post, date_created) VALUES(:title, :post, NOW())');

        $q->bindValue(':title', $billet->getTitle());
        $q->bindValue(':post', $billet->getPost());

        $q->execute();

    }

    //Mise à jour de billets

    public function edit(Billet $billet, $idBillet)
    {
        $q = $this->db->prepare('UPDATE billets SET title = :title, post = :post WHERE id = :id');

        $q->bindValue(':title', $billet->getTitle(), PDO::PARAM_STR);
        $q->bindValue(':post', $billet->getPost(), PDO::PARAM_STR);
        $q->bindValue(':id', $idBillet, PDO::PARAM_INT);

        $q->execute();
    }

    public function deleteBillet($idBillet)
    {
        $q = $this->db->prepare('DELETE FROM billets WHERE id=' . $idBillet);
        $q->execute();
    }


}