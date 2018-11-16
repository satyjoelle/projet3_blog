<?php

require_once 'models/BilletManager.php';
require_once 'views/vue.php';
require_once 'models/Billet.php';
require_once 'models/CommentaireManager.php';

class ControllerAdmin
{

    private $billetManager;


    public function __construct()
    {
        $this->billetManager = new BilletManager();
        $this->commentaireManager = new CommentaireManager();

    }

    // Affiche la liste de tous les billets du blog
    public function admin()
    {
        if ($this->billetManager->verif()) {

            $billets = $this->billetManager->getBillets();
            $vue = new Vue("backend","admin", "Bienvenue sur mon site");
            $vue->generer(array('billets' => $billets));
        } else {
            header('location: index.php?action=login');

        }

    }


    //ajout de billet
    public function addForm() {
        if ($this->billetManager->verif()) {
            if (isset($_POST['submit'])) {

                $title = $_POST['title'];
                $post = $_POST['post'];
                $billet = new Billet(['title' => $title, 'post' => $post]);

                $this->billetManager->addBillet($billet);
                header('location: index.php?action=admin');


            } else {
                //formulaire ajout du billet
                $vue = new Vue("backend", "addForm", "Bienvenue sur mon site");
                $vue->generer(array());
            }
        }else {
            header('location: index.php?action=login');

        }
    }


//modifier un billet
    public function edit($idBillet)
    {
        if ($this->billetManager->verif()) {


            if (isset($_POST ['submit'])) {

                $title = $_POST['title'];
                $post = $_POST['post'];
                $billet = new Billet(['title' => $title, 'post' => $post]);
                //modifier le billet dont l'id
                $this->billetManager->edit($billet, $idBillet);

                //on est redirigé vers admin
                header('location: index.php?action=admin');

            } else {
                //formulaire de modification du billet
                $billet = $this->billetManager->getBillet($idBillet);
                $vue = new Vue("backend", "edit", "Afficher un billet");
                $vue->generer(array('billet' => $billet));

            }

        } else {
            header('location: index.php?action=login');

        }
    }



    public function delete($idBillet)
    {
        if ($this->billetManager->verif()) {
            $this->billetManager->deleteBillet($idBillet);
            //supprimer le commentaire avec le billet
            $this->commentaireManager->deleteCommentsLinkedToAPost($idBillet);
            header('Location:index.php?action=admin');

        }else {

            header( 'location: index.php?action=login');

        }



    }


}



