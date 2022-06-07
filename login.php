<?php

require './model/managers/UserManager.php';

if (isset($_POST['pseudo'], $_POST['pwd'], $_POST['rememberMe']) && userManager::userExists($_POST['pseudo'], $_POST['pwd']) && $_POST['rememberMe'] == 'on') {
    setcookie(
        'PSEUDO_USER',
        $_POST['pseudo'],
        [
            'expires' => time() + 3600 * 24 * 7,
            'secure' => true,
            'httponly' => true,
        ]
    );
}

if (isset($_SESSION['pseudo'], $_SESSION['pwd'])) {
    header('Location: ./index.php');
    die();
} else if (isset($_POST['pseudo'], $_POST['pwd'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $result = userManager::userExists($pseudo, $pwd);
    if (!$result) {
        echo '<p class="alert">Cet utilisateur n\'existe pas</p>';
    } else if ($result == -1) {
        echo '<p class="alert">Mauvais mot de passe</p>';
        print_r($_POST);
    } else {
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['pwd'] = $pwd;
        $_SESSION['id'] = $result;
        header('Location: ./index.php');
        die();
    }
}

require './views/partials/header.php';

require './views/loginView.php';

require './views/partials/footer.php';
