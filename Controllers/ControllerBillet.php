<?php

require_once 'Models/BilletManager.php';
require_once 'Models/CommentaireManager.php';
require_once 'Views/Vue.php';

class ControllerBillet{

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new BilletManager();
        $this->commentaire = new CommentaireManager();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getComments($idBillet);
        $vue = new Vue("Billet", "Afficher un billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }
}