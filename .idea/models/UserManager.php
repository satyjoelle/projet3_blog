<?php

require_once 'User.php';
class UserManager extends Manager

{


    public function findFirst(string $username)
    {
        $req = $this->db->prepare('SELECT * FROM user WHERE pseudo = ?');
        $req->execute(array($username));
        $req->setFetchMode(PDO::FETCH_CLASS, "User");
        return $req->fetch();
    }

}

