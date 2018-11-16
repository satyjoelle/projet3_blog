<?php

require_once 'models/CommentaireManager.php';
require_once 'views/vue.php';
require_once 'models/Commentaire.php';


Class ControllerCommentaireAdmin
{

    private $commentaireManager;
    private $Commentaire;

    public function __construct()
    {

        $this->commentaireManager = new CommentaireManager();

    }

//Affiche tous les commentaire du blog

    public function adminComment()
    {

        if ($this->commentaireManager->verif()) {

            $commentSignaled = $this->commentaireManager->listComments();
            $vue = new Vue("backend", "adminComment" ,"Affichage des commentaire");
             $vue->generer(array( 'commentSignaled' => $commentSignaled));
        } else {


            header('location: index.php?action=login');

        }
    }

    public function signaledComment($id, $signaled)
    {

        if ($this->commentaireManager->verif()) {

            $commentaire = new commentaire([ 'id'=>$id, 'signaled' => $signaled]);
            $commentaire->setSignaled(1);
             $this->commentaireManager->updateComments($commentaire);

        }else{

            header('location: index.php?action=login');

        }
    }

    public function deleteComment($id)
    {
        if ($this->commentaireManager->verif()){

            $this->commentaireManager->deleteComment($id);
            header('Location:index.php?action=admin');

        }else{
            header('Location: index.php?action=login');


        }
    }

}







