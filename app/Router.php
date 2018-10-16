<?php

require_once 'controllers/backend/ControllerAdmin.php';
require_once 'controllers/frontend/ControllerAccueil.php';
require_once 'controllers/frontend/ControllerBillet.php';
require_once 'controllers/backend/ControllerUser.php';
require_once 'Views/frontend/Vue.php';
require_once 'Views/backend/ViewsManager.php';
require_once 'Views/backend/vueUser.php';
//require_once 'Backend/Views/Vue.php';


class Router {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlAdmin;
    private $ctrlUser;

    public function __construct() {
        $this->ctrlAccueil = new ControllerAccueil();
        $this->ctrlBillet = new ControllerBillet();
        $this->ctrlAdmin = new ControllerAdmin();
        $this->ctrlUser = new ControllerUser();
    }

    // Traite une requête entrante
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    if (isset($_GET['id'])) {
                        $idBillet = intval($_GET['id']);
                        if ($idBillet != 0) {
                            $this->ctrlBillet->billet($idBillet);
                        }
                        else
                            throw new Exception("Identifiant de billet non valide");
                    }

                    else
                        throw new Exception("Identifiant de billet non défini");
                }
                else if ($_GET['action'] == 'commenter') {
                    $author = $this->getParametre($_POST, 'author');
                    $comment = $this->getParametre($_POST, 'comment');
                    $idBillet = $this->getParametre($_POST, 'idBillet');
                    $this->ctrlBillet->commenter($author, $comment, $idBillet);
                }
                else if($_GET['action']=='admin'){
                    $this->ctrlAdmin->admin();
                }
                else if($_GET['action']=='addForm'){
                    $this->ctrlAdmin->addForm();
                }

                else if($_GET['action']=='delete'){
                    if (isset($_GET['id'])) {
                        $idBillet = intval($_GET['id']);
                        if ($idBillet != 0) {
                            $this->ctrlAdmin->delete($idBillet);
                        }

                        else
                            throw new Exception("Identifiant de billet non valide");
                    }
                }
                else if($_GET['action']=='edit'){
                    if (isset($_GET['id'])) {
                        $idBillet = intval($_GET['id']);
                        if ($idBillet != 0) {
                            $this->ctrlAdmin->edit($idBillet);
                        }

                        //connexion
                        elseif ($_GET['action']=='InsertUser'){
                            if (isset($_GET['User'])){
                                $User =intval($_GET['user']);
                                if ($User !=0){
                                    $this->ctrlUser->InsertUser($User);
                                }
                            }
                        }


                        else
                            throw new Exception("Identifiant de billet non valide");
                    }
                }

                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            echo $e->getLine();
            echo $e->getFile();
            //echo $e->getCode();
            $this->erreur($e->getMessage());
            //echo $_GET['action'];
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
}