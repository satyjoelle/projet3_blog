<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 29/09/2018
 * Time: 16:44
 */

require_once 'Manager.php';
class CommentaireManager extends Manager

{
    public function getComments($idBillet)

    {
        $sql = "SELECT * FROM commentaires WHERE id_billet=:id";
        $req = $this->db->prepare($sql);
        $req->execute(array(':id'=>$idBillet));
        $commentaire = $req->fetchAll(PDO::FETCH_OBJ);


        return $commentaire;
    }
public function addComments(Commentaire $billet)
    {
$q = $this->db->prepare('INSERT INTO commentaires (author, comment, date_comment) VALUES(:author, :comment, :date_comment)');

        $q->bindValue(':title', $billet->getAuthor());
        $q->bindValue(':post', $billet->getComments());
        $q->bindValue(':date_created', $billet->getDateComment());

        $q->execute();

    }




}