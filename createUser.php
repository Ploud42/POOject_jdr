<?php
require './model/managers/UserManager.php';

if (isset($_POST['pseudo'], $_POST['pwd1'], $_POST['pwd2'], $_POST['mail'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['pwd1']) && !empty($_POST['pwd2']) && !empty($_POST['mail'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $pwd1 = htmlspecialchars($_POST['pwd1']);
        $pwd2 = htmlspecialchars($_POST['pwd2']);
        $mail = htmlspecialchars($_POST['mail']);
        if ($pwd1 == $pwd2) {
            $check_user = UserManager::userExists($pseudo, $pwd1);
            if (!$check_user) {
                UserManager::addUser($pseudo, $pwd1, $mail);
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['pwd'] = $pwd1;
                $_SESSION['id'] = UserManager::userExists($pseudo, $pwd1);
                header('Location: ./index.php');
                die();
            } else if ($check_user == -1)
                echo 'Cet pseudo existe deja';
            else
                echo 'Ce compte existe deja';
        } else
            echo 'Les deux mots de passe ne correspondent pas';
    } else
        echo 'Veuillez remplir les champs vides';
}

require './views/partials/header.php';

require './views/createUserView.php';

require './views/partials/footer.php';
