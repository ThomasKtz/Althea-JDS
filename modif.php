<?php include 'header.php';
include 'components/itemModification.php';
include 'components/getBoardgameInfos.php';
?>
<!-- On verifie sur l'user connecté est celui qui à posté l'annonce -->
<?php if ($boardgameInfos['boardgameSeller'] !== $_SESSION['user']['pseudo']) {

    $msgError = "Vous n'avez pas les droits pour modifier la fiche de ce jeu, merci de contacter le vendeur.";
    include 'box.php';
    ?>
    <div style="width:300px; margin:auto">
        <a href="data.php?id=<?= $boardgameInfos['boardgameID'] ?>" class="btn btn-primary" style="width:100%">Retourner à
            la fiche du jeu</a>
    </div>
    <!-- Si c'est le cas on rend les modifications possibles -->
<?php } else { ?>

    <h1 style="text-align:center">Modifier la fiche de
        <?= $boardgameInfos['boardgameName'] ?>
    </h1>
    <!-- Le formulaire de mofification est prérempli avec les infos déjà présentes sur le jeu -->
    <form action="" method="post" style="width: 60%; margin:35px auto">
        <div class="mb-3">
            <label for="name" class="form-label">Nom du jeu</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                value="<?= $boardgameInfos['boardgameName'] ?>">
        </div>
        <div class="mb-3">
            <label for="style" class="form-label">Style</label>
            <select class="form-control" name="style" id="style">
                <?php foreach ($styles as $style) { ?>
                    <option value="<?= $style['styleName'] ?>">
                        <?= $style['styleName'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="difficulty" class="form-label">Difficulté</label>
            <select class="form-control" name="difficulty" id="difficulty">
                <?php foreach ($difficulties as $difficulty) { ?>
                    <option value="<?= $difficulty['difficultyName'] ?>">
                        <?= $difficulty['difficultyName'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="playerNumber" class="form-label">Nombre de joueurs</label>
            <input type="text" class="form-control" name="playerNumber" id="playerNumber"
                value="<?= $boardgameInfos['boardgamePlayerNumber'] ?>">
        </div>
        <div class="form-group">
            <label for="pitch">Description</label>
            <textarea class="form-control" name="pitch" id="pitch"
                rows="3"><?= $boardgameInfos['boardgamePitch'] ?>"</textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Durée (h)</label>
            <input type="time" class="form-control" name="duration" id="duration"
                value="<?= $boardgameInfos['boardgameDuration'] ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Lien de l'image</label>
            <input type="text" class="form-control" name="image" id="image"
                value="<?= $boardgameInfos['boardgameImage'] ?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prix de vente (en euros)</label>
            <input type="text" class="form-control" name="price" id="price"
                value="<?= $boardgameInfos['boardgamePrice'] ?>">
        </div>

        <button type="submit" class="btn btn-success">Modifier la fiche</button>
    </form>

    <?php

}


include 'footer.php'; ?>