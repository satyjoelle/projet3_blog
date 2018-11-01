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

    //afficher les commentaires avec son billet
    public function listComments ()
    {
        $sql = "SELECT c.*, b.title as titleBillet FROM commentaires c, billets b WHERE c.id_billet = b.id ";
        $req = $this->db->prepare($sql);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, "Commentaire");
        $commentaires = $req->fetchAll();
        return $commentaires;
    }


    //ajout des commentaires
    public function addComment(Commentaire $commentaire)
    {
        $sql = 'insert into commentaires(author, comment, id_billet)' . ' values( ?, ?, ?)';
        $req = $this->db->prepare($sql);
        $req->execute(array($commentaire->getAuthor(), $commentaire->getComment(), (int)$commentaire->getIdBillet()));

    }

    //mise à jour des commentaires signalés
    public function updateComments(Commentaire $commentaire)
    {

            $q = $this->db->prepare('UPDATE commentaires SET signaled = :signaled WHERE id = :id');
            $q->bindValue(':signaled', $commentaire->getSignaled(), PDO::PARAM_STR);
            $q->bindValue(':id', $commentaire->getId(), PDO::PARAM_INT);
            $q->execute();

    }

//supprimer des commentaires signalés
    public function deleteComment($id)
    {
        $q = $this->db->prepare('DELETE FROM commentaires WHERE id=' . $id);
        $q->execute();
    }


    public function deleteCommentsLinkedToAPost($idbillet)
    {
        $q = $this->db->prepare('DELETE FROM commentaires WHERE id_billet=' . $idbillet);
        $q->execute();
    }
}
