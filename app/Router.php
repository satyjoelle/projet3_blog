<?php

require_once 'Backend/controllers/ControllerAdmin.php';
require_once 'Frontend/controllers/ControllerAccueil.php';
require_once 'Frontend/controllers/ControllerBillet.php';
require_once 'Vue.php';
//require_once 'Backend/Views/Vue.php';


class Router {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlAdmin;

    public function __construct() {
        $this->ctrlAccueil = new ControllerAccueil();
        $this->ctrlBillet = new ControllerBillet();
        $this->ctrlAdmin = new ControllerAdmin();
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