<?php

require_once 'models/BilletManager.php';
require_once 'views/backend/ViewsManager.php';
require_once 'models/Billet.php';
class ControllerAdmin
{

    private $billetManager;

    public function __construct()
    {
        $this->billetManager = new BilletManager();
    }

    // Affiche la liste de tous les billets du blog
    public function admin()
    {
        if (isset($_SESSION['pseudo']) && isset($_SESSION['password'])) {

            $billets = $this->billetManager->getBillets();
            $vue = new ViewsManager("admin", "Bienvenue sur mon site");
            $vue->generer(array('billets' => $billets));
        } else {
            header('location: index.php?action=login');

        }

    }

    public function edit($idBillet)
    {
        if (isset($_SESSION['pseudo']) && isset ($_SESSION['password'])) {


            if (isset($_POST ['submit'])) {

                $billet = new Billet(['title' => null, 'post' => null]);

                //var_dump($_POST);
                $billet->setTitle($_POST['title']);
                $billet->setPost($_POST['post']);
                $this->billetManager->edit($billet, $idBillet);

                header('location: index.php?action=admin');

            } else {
                $billet = $this->billetManager->getBillet($idBillet);
                $vue = new ViewsManager("edit", "Afficher un billet");
                $vue->generer(array('billet' => $billet));

            }

        } else {
            header('location: index.php?action=login');

        }
    }

//ajout de billet
    public function addForm() {
        if (isset($_SESSION['pseudo']) && isset ($_SESSION['password'])) {
            if (isset($_POST['submit'])) {
                var_dump($_POST);
                $title = $_POST['title'];
                $post = $_POST['post'];
                $billet = new Billet(['title' => $title, 'post' => $post]);

                //sauvegarde du commentaire
                $this->billetManager->addBillet($billet);
                header('location: index.php?action=admin');
                //actualisation de l'affichage du billet

            } else {
                $vue = new ViewsManager("addForm", "Bienvenue sur mon site");
                $vue->generer(array());
            }
        }else {
                header('location: index.php?action=login');

            }
        }

    public function delete($idBillet)
    {
        if (isset($_SESSION['pseudo']) && isset ($_SESSION['password'])) {
            $this->billetManager->deleteBillet($idBillet);
            header('Location:index.php?action=admin');

        }else {

            header( 'location: index.php?action=login');

    }

    }

}

