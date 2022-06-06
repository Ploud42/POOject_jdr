<ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li>
</ul>
<ul id="userDropdown" class="dropdown-content">
    <li><a class="dropdown-item" href="./create_post.php">Créer un article</a></li>
    <?php echo '<li><a class="dropdown-item" href="./author_posts.php?author_id=' . $_SESSION['id'] . '">Vos articles</a></li>'; ?>
    <li><a class="dropdown-item" href="./login_deco.php">Se déconnecter</a></li>
</ul>

<nav>
    <div class="nav-wrapper">
        <a href="./index.php" class="brand-logo"><img src="./asset/img/WClogo.png" class="img_logo"></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="./index.php">Acceuil</a></li>
            <?php
            if (isset($_SESSION['pseudo'], $_SESSION['pwd'], $_SESSION['id'])) {
            ?>
                <li><a class="dropdown-trigger" href="#!" data-target="userDropdown"><?php echo 'Bonjour <strong class="text-info">' . $_SESSION['pseudo'] . '</strong>, ravis de vous revoir.'; ?><i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-item" href="./logout.php">Se déconnecter</a></li>
            <?php
            } else
                echo '<li class="nav-item"><a class="nav-link text-primary" href="./login.php">Se connecter</a></li>';
            ?>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>