<?php

require './model/managers/CharacterManager.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $character = CharacterManager::getCharacter($id);
}
include './views/partials/header.php';
include './views/singleView.php';
include './views/partials/footer.php';
