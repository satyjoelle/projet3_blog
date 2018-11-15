<?php

require_once 'models/BilletManager.php';
require_once 'views/vue.php';

class ControllerAccueil {

    private $billetManager;

    public function __construct() {
        $this->billetManager = new BilletManager();
    }

    // Affiche la liste de tous les billets du blog
    public function accueil() {
        $billets = $this->billetManager->getBillets();
        $vue = new Vue("frontend", "accueil", "Bienvenue sur mon site");
        $vue->generer(array('billets' => $billets));
    }
}