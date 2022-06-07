<?php

require 'connection.php';
require './model/entities/Character.php';

class CharacterManager
{
    public static function getAllCharacters()
    {
        $db = dbconnect();
        $query = $db->query("SELECT * FROM characters");
        $results = $query->fetchAll(PDO::FETCH_CLASS, 'Character');
        return $results;
    }

    public static function getCharacter($id)
    {
        $db = dbconnect();
        $query = $db->query("SELECT * FROM characters WHERE id=$id");
        $query->setFetchMode(PDO::FETCH_CLASS, 'Character');
        $result = $query->fetch();
        return $result;
    }

    public static function addCharacter($name, $hp, $atk, $image)
    {
        $db = dbconnect();
        $query = $db->prepare("INSERT INTO characters VALUES (null, :name, :hp, :atk, :image)");
        $query->bindParam(':name', $name);
        $query->bindParam(':hp', $hp);
        $query->bindParam(':atk', $atk);
        $query->bindParam(':image', $image);
        $query->execute();
        $id = $db->lastInsertId();
        return ($id);
    }
}
