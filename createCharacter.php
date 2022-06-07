<?php
require './model/managers/CharacterManager.php';
print_r($_POST);
print_r($_FILES);
print_r($_SESSION);
if (isset($_POST['name'], $_POST['hp'], $_POST['atk'], $_FILES['img']) && !empty($_POST['name']) && !empty($_POST['hp']) && !empty($_POST['atk'])) {
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        echo 'test';
        $name = htmlspecialchars($_POST['name']);
        $hp = htmlspecialchars($_POST['hp']);
        $atk = htmlspecialchars($_POST['atk']);
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
        } else {
            echo 'alert("Une erreur est survenue")';
            header('Location: ./createCharacter.php');
            die();
        }
        $post_id = Charactermanager::addCharacter($name, $hp, $atk, './asset/img/' . $file);
        header('Location: ./single.php?id=' . $post_id);
        die();
    } else if (!isset($_SESSION['id'])) {
        header('Location: ./index.php');
        die();
    }
}
require './views/partials/header.php';

require './views/createCharacterView.php';

require './views/partials/footer.php';
