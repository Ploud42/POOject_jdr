<div class="row">
    <h1>Choisissez votre héro</h1>
</div>
<div class="row">
    <?php foreach ($characters as $character) { ?>
        <div class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-image">

                    <?php
                    if ($character->getImage()) {
                        echo '<img class="card-img-top" src="' . $character->getImage() . '">';
                        echo '<span class="card-title card-alert">' . $character->getName() . '</span>';
                    }
                    ?>

                </div>
                <div class="card-content white-text">
                    <?php
                    if (!$character->getImage()) {
                        echo '<span class="card-title">' . $character->getName() . '</span>';
                    }
                    ?>
                    <p>HP : <?php echo $character->getHp() ?></p>
                    <p>Attack : <?php echo $character->getAtk() ?></p>
                </div>
                <div class="card-action">
                    <a href="./single.php?id=<?php echo $character->getID() ?>">I choose you !</a>
                    <?php
                    if (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] == 'admin') {
                        echo '<a class="" href="./editCharacter.php?id=' . $character->getID() . '">Editer</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>