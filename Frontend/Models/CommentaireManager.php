<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 29/09/2018
 * Time: 16:44
 */

require_once 'app/Manager.php';
require_once 'app/Commentaire.php';
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


public function addComment(Commentaire $commentaire)
    {
        $sql = 'insert into commentaires(author, comment, id_billet)' . ' values( ?, ?, ?)';
        $req = $this->db->prepare($sql);
        $req->execute(array($commentaire->getAuthor(), $commentaire->getComment(), (int)$commentaire->getIdBillet()));



    }




}