<?php

require_once 'models/BilletManager.php';
require_once 'views/Vue.php';

class ControllerAccueil {

    private $billetManager;

    public function __construct() {
        $this->billetManager = new BilletManager();
    }

    // Affiche la liste de tous les billets du blog
    public function accueil() {
        $billets = $this->billetManager->getBillets();
        $vue = new Vue("accueil", "Bienvenue sur mon site");
        $vue->generer(array('billets' => $billets));
    }
}