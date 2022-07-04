<?php
require './model/managers/CharacterManager.php';
print_r($_POST);
print_r($_FILES);
print_r($_SESSION);
if (isset($_POST['name'], $_POST['hp'], $_POST['atk']) && !empty($_POST['name']) && !empty($_POST['hp']) && !empty($_POST['atk'])) {
    if (isset($_SESSION['id']) && $_SESSION['pseudo'] == 'admin') {
        $name = htmlspecialchars($_POST['name']);
        $hp = htmlspecialchars($_POST['hp']);
        $atk = htmlspecialchars($_POST['atk']);
        $charID = htmlspecialchars($_GET['id']);
        if (isset($_FILES) && !empty($_FILES) && !empty($_FILES['img']['tmp_name'])) {
            $tmpName = $_FILES['img']['tmp_name'];
            $imgName = basename($_FILES['img']['name']);
            $size = $_FILES['img']['size'];
            $error = $_FILES['img']['error'];
            $tabExtension = explode('.', $imgName);
            $extension = strtolower(end($tabExtension));
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            /* $maxSize = 4000000; Pour limiter la taille des fichiers uploadés */
            if (in_array($extension, $extensions) /* && $size <= $maxSize */ && $error == 0) {
                $uniqueName = uniqid('', true);
                $file = $uniqueName . "." . $extension;
                move_uploaded_file($tmpName, './asset/img/' . $file);
                $char = CharacterManager::getCharacter($charID);
                unlink($char->getImage());
            } else {
                echo 'alert("Une erreur est survenue")';
                header('Location: ./createCharacter.php');
                die();
            }
        } else {
            $char = CharacterManager::getCharacter($charID);
            $file = $char->getImage();
        }
        Charactermanager::editCharacter($charID, $name, $hp, $atk, './asset/img/' . $file);
        header('Location: ./single.php?id=' . $charID);
        die();
    } else {
        header('Location: ./index.php');
        die();
    }
}
if (isset($_GET['id'], $_SESSION['id']) && !empty($_GET['id']) && $_SESSION['pseudo'] == 'admin' && CharacterManager::characterExists(htmlspecialchars($_GET['id']))) {
    $charID = htmlspecialchars($_GET['id']);
    $character = CharacterManager::getCharacter($charID);
    print_r($character);
} else {
    echo 'KO';
    /*     header('Location: ./index.php');
    die(); */
}
require './views/partials/header.php';

require './views/editCharacterView.php';

require './views/partials/footer.php';
