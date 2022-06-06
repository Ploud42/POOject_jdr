<?php
require './model/managers/CharacterManager.php';

/* $harry = new Character('Harry', 105, 15);
$drago = new Character('Drago', 110, 9);
$harry->autoAttack($drago);
print_r($harry);
print_r($drago);
echo $harry;

$Hermione = new Wizard("Hermione", 120, 25);
$Hermione->setMana(250);
print_r($Hermione); */

$characters = CharacterManager::getAllCharacters();
require './views/partials/header.php';

require './views/indexView.php';

require './views/partials/footer.php';
