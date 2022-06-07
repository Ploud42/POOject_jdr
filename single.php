<?php

require './model/managers/CharacterManager.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $character = CharacterManager::getCharacter($id);
} else {
    header('Location: ./index.php');
    die();
}
if ($character) {
    include './views/partials/header.php';
    include './views/singleView.php';
    include './views/partials/footer.php';
} else {
    header('Location: ./index.php');
    die();
}
