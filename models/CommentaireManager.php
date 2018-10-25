<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 29/09/2018
 * Time: 16:44
 */

require_once 'models/Manager.php';
require_once 'models/Commentaire.php';
class CommentaireManager extends Manager

{
    public function getComments($idBillet)

    {
        $sql = "SELECT * FROM commentaires WHERE id_billet=:id";
        $req = $this->db->prepare($sql);
        $req->execute(array(':id'=>$idBillet));
        $req->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
        $commentaire = $req->fetchAll();
        return $commentaire;

    }

    public function listComments ()
    {
        $sql = "SELECT * FROM commentaires ";
        $req = $this->db->prepare($sql);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
        $commentaires = $req->fetchAll();
        //var_dump($commentaires);
        return $commentaires;
    }

    public function updateComments(Commentaire $commentaire)
    {

            $q = $this->db->prepare('UPDATE commentaires SET signaled = :signaled WHERE id = :id');

            $q->bindValue(':signaled', $commentaire->getSignaled(), PDO::PARAM_STR);
            $q->bindValue(':id', $commentaire->getId(), PDO::PARAM_INT);
            $q->execute();

    }



public function addComment(Commentaire $commentaire)
    {
        $sql = 'insert into commentaires(author, comment, id_billet)' . ' values( ?, ?, ?)';
        $req = $this->db->prepare($sql);
        $req->execute(array($commentaire->getAuthor(), $commentaire->getComment(), (int)$commentaire->getIdBillet()));


    }


    public function deleteComments($idBillet)
    {
        $q = $this->db->prepare('DELETE FROM commentaire WHERE id=' . $idBillet);
        $q->execute();
    }



}