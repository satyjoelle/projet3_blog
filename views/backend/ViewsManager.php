<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 01/10/2018
 * Time: 22:39
 */

class ViewsManager {

    private $fichier;
   // private $fichier2;
    private $title;

    public function __construct($action) {

            $this->fichier = "views/backend/vue" . $action . ".php";


    }


    // Génère et affiche la vue
    public function generer($donnees) {
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier('views/backend/TemplateBackend.php',
            array('title' => $this->title, 'contenu' => $contenu));
        echo $vue;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            extract($donnees);
            ob_start();
            require $fichier;
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}