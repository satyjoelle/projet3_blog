<?php
require_once 'models/CommentaireManager.php';
require_once 'views/backend/ViewsManager.php';
require_once 'models/Commentaire.php';

Class ControllerCommentaireAdmin
{

    private $CommentaireManager;
    private $Commentaire;

    public function __construct()
    {
        $this->commentaireManager = new CommentaireManager();
    }

//Affiche tous les commentaire du blog

    public function adminComment()
    {

        if (isset($_SESSION['pseudo']) && isset ($_SESSION['password'])) {

            $commentSignaled = $this->commentaireManager->listComments();
            $vue = new ViewsManager("adminComment", "Nos Commentaires");
            //var_dump($commentSignaled);
             $vue->generer(array('title' =>  "Affichage des commentaires", 'commentSignaled' => $commentSignaled));
        } else {

            header('location: index.php?action=login');

        }
    }

    public function signaledComment( $id, $signaled)
    {

        if (isset($_SESSION ['pseudo']) && isset($_SESSION['password'])) {

          //var_dump($_POST);

            $commentaire = new commentaire([ 'id'=>$id, 'signaled' => $signaled]);
            $commentaire->setSignaled(1);
             $this->commentaireManager->updateComments($commentaire);
           // $vue = new  ViewsManager("signaledComment", "Commentaires signalés");
            //var_dump($Signaled)
            //$vue->generer(array('title' => "Affichage des commentaires signalés", 'Signaledcomment0' => $Signaled));

        }else{

            header('location: index.php?action=login');


        }
    }





}









