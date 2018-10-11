<?php

require_once 'models/BilletManager.php';
require_once 'models/CommentaireManager.php';
require_once 'models/Commentaire.php';
require_once 'Views/frontend/Vue.php';

class ControllerBillet{

    private $billet;
    private $commentaireManager;
    private $commentaire;

    public function __construct() {
        $this->billet = new BilletManager();
        $this->commentaireManager = new CommentaireManager();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaireManager->getComments($idBillet);
        $vue = new Vue("Billet", "Afficher un billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajouter un commentaire à un billet
    public function commenter($author, $comment, $idBillet) {
        //var_dump($_POST);
        $commentaire = new Commentaire();

        $commentaire->setAuthor($author);
        $commentaire->setComment($comment);
        $commentaire->setIdBillet($idBillet);

        //sauvegarde du commentaire
        $this->commentaireManager->addComment($commentaire);

        //actualisation de l'affichage du billet
        header('location:index.php?action=billet&id='+$idBillet);



    }



}