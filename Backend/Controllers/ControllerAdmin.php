<?php

require_once 'Backend/Models/BackendManager.php';
require_once 'app/Vue.php';

class ControllerAdmin {

    private $adminManager;

    public function __construct() {
        $this->adminManager = new BackendManager();
    }

    // Affiche la liste de tous les billets du blog
    public function admin() {
      $billets = $this->adminManager->getBillets();
        $vue = new Vue("admin", "Bienvenue sur mon site");
        $vue->generer(array('billets' => $billets));
    }
}