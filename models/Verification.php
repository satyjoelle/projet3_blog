<?php

Class Verification {


    public function verif(){

        $secu = (isset($_SESSION['pseudo']) && isset ($_SESSION['password']));
        return $secu;
    }




}