<?php
require_once 'models/UserManager.php';
//require_once 'views/backend/UserManager.php';
require_once 'models/User.php';
Class ControllerUser {

    private $UserManager;
    private $User;

    public function __construct()
    {
        $this->UserManager = new UserManager();

    }

    //login
    function login (){
        if ($this->request->data){
            $data = $this->request->data;
            $data->password = sha1($data->password);
            $this->loadModels ('User');
            $user = $this->User->findFirst(array('conditions'=> array('login' => $data->login, 'password' => $data->password)));

            if (!empty($user)){
                $_SESSION['auth']==true;
                header('location : index?action=admin');
            }
             $this->request->data->password = '';


        }
    }

    //logout, deconnexion
    function logout(){

        unset($_SESSION['User']);
        $this->Session->setFlash('Vous etes maintenant deconnecté');
        header('location:index.php');

    }
}
