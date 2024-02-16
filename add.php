<?php include 'header.php';
include 'components/existingUserControl.php';
include 'components/getStyles.php';
include 'components/getDifficulties.php';
include 'components/itemAdd.php';
include 'box.php';
?>

<h1 style="text-align:center">Ajouter un jeu de société</h1>

<form action="" method="post" style="width: 60%; margin:35px auto">
    <div class="mb-3">
        <label for="name" class="form-label">Nom du jeu</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="style" class="form-label">Style</label>
        <select class="form-control" name="style" id="style">
            <!-- On boucle sur les style -->
            <?php foreach ($styles as $style) {
                echo "<option value='{$style['styleName']}'>{$style['styleName']}</option>";
            } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="difficulty" class="form-label">Difficulté</label>
        <select class="form-control" name="difficulty" id="difficulty">
            <!-- On boucle sur les difficultés -->
            <?php foreach ($difficulties as $difficulty) {
                echo "<option value='{$difficulty['difficultyName']}'>{$difficulty['difficultyName']}</option>";
            } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="playerNumber" class="form-label">Nombre de joueurs</label>
        <input type="text" class="form-control" name="playerNumber" id="playerNumber">
    </div>
    <div class="form-group">
        <label for="pitch">Description</label>
        <textarea class="form-control" name="pitch" id="pitch" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label">Durée (h)</label>
        <input type="time" class="form-control" name="duration" id="duration">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Lien de l'image</label>
        <input type="text" class="form-control" name="image" id="image">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prix de vente (en euros)</label>
        <input type="text" class="form-control" name="price" id="price">
    </div>

    <button type="submit" class="btn btn-success">Mettre en vente le jeu</button>
</form>


<?php include 'footer.php' ?>