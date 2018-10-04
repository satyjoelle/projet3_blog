<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 27/09/2018
 * Time: 16:21
 */

require_once 'Manager.php';
require_once 'Billet.php';
class BilletManager extends Manager
{

    //renvoie la liste des billets du blog
    public function getBillets()
    {
        $req = $this->db->query('SELECT id, title, post, date_created from billets ORDER BY id DESC');
        $billets = $req->fetchAll(PDO::FETCH_OBJ);
        return $billets;

       /* $sql = ("SELECT id, title, post, date_created from billets ORDER BY id DESC");
        $req = $this->db->prepare($sql);
        $req->execute(array(':id'=>$idBillet, ':title'=>$title, ':post'=>$post, ':datecreated'=>$date_created));
        $req->setFetchMode(PDO::FETCH_CLASS, "Billet", "title");
        $billets = $req->fetch();
        return $billets;*/

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
        $q = $this->db->prepare('INSERT INTO billets (title, post, date_created) VALUES(:title, :post, :date_created)');

        $q->bindValue(':title', $billet->getTitle());
        $q->bindValue(':post', $billet->getPost());
        $q->bindValue(':date_created', $billet->getDateCreated());

        $q->execute();

    }

    //Mise à jour de billets

    public function updateBillet(Billet $billet)
    {
        $q = $this->db->prepare('UPDATE billets SET title = :title, post = :post, date_created = :date_created WHERE id = :id');

        $q->bindValue(':title', $billet->title(), PDO::PARAM_STR);
        $q->bindValue(':post', $billet->post(), PDO::PARAM_STR);
        $q->bindValue(':date_created', $billet->date_created(), PDO::PARAM_STR);
        $q->bindValue(':id', $billet->id(), PDO::PARAM_INT);

        $q->execute();
    }

    public function deleteBillet(Billet $billet)
    {
        $q = $this->db->prepare('DELETE FROM billets WHERE id=' . $billet->id());
        $q->execute();
    }


}