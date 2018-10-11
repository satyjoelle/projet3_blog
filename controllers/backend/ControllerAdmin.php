<?php

require_once 'models/BilletManager.php';
require_once 'views/backend/ViewsManager.php';
require_once 'models/Billet.php';
class ControllerAdmin {

    private $billetManager;

    public function __construct() {
        $this->billetManager = new BilletManager();
    }

    // Affiche la liste de tous les billets du blog
    public function admin() {
      $billets = $this->billetManager->getBillets();
        $vue = new ViewsManager("admin", "Bienvenue sur mon site");
        $vue->generer(array('billets' => $billets));
    }

    public function edit($idBillet) {
        $billet = $this->billetManager->getBillet($idBillet);
        $vue = new ViewsManager("edit", "Afficher un billet");
        $vue->generer(array('billet' => $billet));
    }

    public function addForm() {
        if(isset($_POST['submit'])) {
            //var_dump($_POST);
            $title = $_POST['title'];
            $post = $_POST['post'];
            $billet = new Billet(['title' => $title, 'post' => $post]);

            //sauvegarde du commentaire
            $this->billetManager->addBillet($billet);
            header('location: index.php?action=admin');
            //actualisation de l'affichage du billet

        }else{
            $vue = new ViewsManager("addForm", "Bienvenue sur mon site");
            $vue->generer(array());
        }
    }

    public function delete($idBillet) {
        $billets = $this->billetManager->deleteBillet($idBillet);
        header('Location:index.php?action=admin');
    }


    public function login()
    {
        // Vérification du couple user/mdp
        // Si c'est ok, alos on démarre les sessions
        // Si c'est pas ok, on redirge vers la page de connexion

        if(1==1) // si couplage ok
        {
            $_SESSION['auth'] == true;
            header('location : index.php?action=admin');
        }

    }

   public function logout()
    {
        // Si tulisateur connecté
        session_destroy();
        header('location:index.php');
    }
}

