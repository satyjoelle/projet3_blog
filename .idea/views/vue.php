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
    private $app;

    public function __construct($app, $action, $title) {

        $this->app = $app;
        $this->fichier= "views/".$this->app."/vue" . ucfirst($action) . ".php";
        $this->title = $title;

    }

    // Génère et affiche les vues
    public function generer($donnees = null) {
        $contenu = $this->genererFichier($this->fichier, $donnees);


        $vue = $this->genererFichier('views/'.$this->app.'/Template.php',
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