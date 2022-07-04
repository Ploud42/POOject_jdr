<div class="center-align">
    <div class="row">
        <h1 class="col s8 offset-s2">Editer <?php echo $character->getName() ?></h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <label for="name">Nom du héro :</label>
                <input type="text" id="name" name="name" value="<?php echo $character->getName() ?>" required="required">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <label for="hp">Points de vie :</label>
                <input type="text" id="hp" name="hp" value="<?php echo $character->getHp() ?>" required="required">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <label for="atk">Points d'attaque :</label>
                <input type="text" id="atk" name="atk" value="<?php echo $character->getAtk() ?>" required="required">
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <label for="img" class="form-label"><strong>Avatar :</strong></label>
                <input type="file" class="form-control" id="img" name="img">
            </div>
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action">Soumettre
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>
</div>