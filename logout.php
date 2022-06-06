<?php
session_start();
if (isset($_SESSION['pseudo'], $_SESSION['pwd'])) {
    session_destroy();
}
header('Location: ./index.php');
die();
