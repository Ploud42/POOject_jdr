<div class="center-align">
    <h1>Veuillez vous authentifier</h1>
    <form action="" method="post">
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <label for="pseudo">Pseudo : </label>
                <input type="text" id="pseudo" name="pseudo" <?php
                                                                if (isset($_COOKIE['PSEUDO_USER']) && !empty($_COOKIE['PSEUDO_USER'])) {
                                                                    echo 'value="' . $_COOKIE['PSEUDO_USER'] . '"';
                                                                }
                                                                ?> required="required">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <label for="pwd">Mot de passe : </label>
                <input type="password" id="pwd" name="pwd" required="required">
            </div>
        </div>
        <p>
            <label for="rmbMe">
                <input type="checkbox" class="filled-in" checked="checked" id="rmbMe" name="rememberMe">
                <span>Se souvenir de moi (pendant une semaine)</span>
            </label>
        </p>
        <button class="btn waves-effect waves-light" type="submit" name="action">Soumettre
            <i class="material-icons right">send</i>
        </button>
    </form>
    <div class="row">
        <div class="input-field col s8 offset-s2">
            <h3>Vous n'avez pas de compte?</h3>
            <a class="waves-effect waves-light btn" href="./createUser.php">Créer un compte</a>
        </div>
    </div>
</div>