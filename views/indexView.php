<div class="row">
    <?php foreach ($characters as $character) { ?>
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><?php echo $character->getName() ?></span>
                    <p>HP : <?php echo $character->getHp() ?></p>
                    <p>Attack : <?php echo $character->getAtk() ?></p>
                </div>
                <div class="card-action">
                    <a href="./single.php?id=<?php echo $character->getID() ?>">This is a link</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>