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

    public static function characterExists($id)
    {
        $db = dbconnect();
        $statement = $db->prepare("SELECT * FROM characters WHERE id=:id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (empty($result))
            return 0;
        else
            return 1;
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

    public static function editCharacter($id, $name, $hp, $atk, $image)
    {
        $db = dbconnect();
        $query = $db->prepare("UPDATE characters SET  name=:name, hp=:hp, atk=:atk, image=:image WHERE id=:id");
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $name);
        $query->bindParam(':hp', $hp);
        $query->bindParam(':atk', $atk);
        $query->bindParam(':image', $image);
        $query->execute();
    }
}
