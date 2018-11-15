<?php

require_once 'models/UserManager.php';
require_once 'models/User.php';
require_once 'views/vue.php';

class ControllerUser {

    private $userManager;
    private $user;

    public function __construct()
    {
        $this->userManager = new UserManager();

    }

    //login
    public function postLogin (){

        $user = $this->userManager->findFirst($_POST['pseudo']);

        if( $user->getPassword() === sha1($_POST['password']))
        {
            $_SESSION['pseudo']= $user->getPseudo();
            $_SESSION['password']= $user->getPassword();

            // Ok la connexion est bonne
            header('location: index.php?action=admin');
        } else {
            // mdp ou identifiant incorrect
            header('location: index.php?action=login');


        }
    }

    public function login(){
        $vue = new Vue("backend", "user", " Connexion ");
        $vue->generer();
    }

    //logout, deconnexion
    public function logout(){

        session_unset();
        session_destroy();
        header('location: index.php?action=login');

    }
}
