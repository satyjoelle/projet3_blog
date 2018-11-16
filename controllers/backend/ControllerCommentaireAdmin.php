<?php

require_once 'models/CommentaireManager.php';
require_once 'views/vue.php';
require_once 'models/Commentaire.php';
require_once 'models/Verification.php';


Class ControllerCommentaireAdmin
{

    private $commentaireManager;
    private $Commentaire;

    public function __construct()
    {

        $this->commentaireManager = new CommentaireManager();
        $this->verification = new Verification ();


    }

//Affiche tous les commentaire du blog

    public function adminComment()
    {

            $commentSignaled = $this->commentaireManager->listComments();
            $vue = new Vue("backend", "adminComment" ,"Affichage des commentaire");
             $vue->generer(array( 'commentSignaled' => $commentSignaled));

    }

    public function signaledComment($id, $signaled)
    {

            //$commentaire = new commentaire([ 'id'=>$id, 'signaled' => $signaled]);
           // $commentaire->setSignaled(1);
             $this->commentaireManager->updateComments($id, $signaled);

    }

    public function deleteComment($id)
    {
        if ($this->verification->verif()){

            $this->commentaireManager->deleteComment($id);
            header('Location:index.php?action=admin');

        }else{
            header('Location: index.php?action=login');


        }
    }

}







