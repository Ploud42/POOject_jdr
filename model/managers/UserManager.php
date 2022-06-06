<?php

require 'connection.php';
require './model/entities/User.php';

class UserManager
{
    public static function getAllUsers()
    {
        $db = dbconnect();
        $query = $db->query("SELECT * FROM users");
        $results = $query->fetchAll(PDO::FETCH_CLASS, 'User');
        return $results;
    }

    public static function getUser($id)
    {
        $db = dbconnect();
        $query = $db->query("SELECT * FROM users WHERE id=$id");
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $query->fetch();
        return $result;
    }

    public static function userExists($pseudo, $pwd)
    {
        $db = dbconnect();
        $statement = $db->query("SELECT * FROM users WHERE pseudo = '$pseudo'");
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        echo $user['password'];
        if (empty($user))
            return 0;
        else if (password_verify($pwd, $user['password']))
            return $user['id'];
        else
            return -1;
    }

    public static function addUser($pseudo, $pwd, $mail)
    {
        $pwd = password_hash($pwd, PASSWORD_BCRYPT);
        $db = dbconnect();
        $query = $db->prepare("INSERT INTO users VALUES (null, :pseudo, :mail, :pwd)");
        $query->bindParam(':pseudo', $pseudo);
        $query->bindParam(':mail', $mail);
        $query->bindParam(':pwd', $pwd);
        $query->execute();
    }
}
