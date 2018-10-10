<?php
/**
 * Created by PhpStorm.
 * User: faveu
 * Date: 01/10/2018
 * Time: 22:39
 */

class Vue {

    private $fichier;
    private $title;

    public function __construct($action) {
        $this->fichier = "Frontend/Views/vue" . $action . ".php";

    }


    // Génère et affiche la vue
    public function generer($donnees) {
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier('Frontend/Views/Template.php',
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