<?php

class UserManager extends Manager

{
    public function InsertUser(User $user, $email, $password){

        // Insertion

        $q = $this->db->prepare("INSERT INTO user  SET pseudo = :pseudo, email = :email, password = :password, date_inscription = NOW()");

        $q->bindValue(':pseudo', $user->getPseudo());
        $q->bindValue(':email',  $email->getEmail());
        $q->bindValue(':password', $password->getPassword());

        $q->execute();
    }

}

