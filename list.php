<?php include 'header.php';
//Verifier siun user est connecté
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    //On redirige si pas le cas
    header('Location: signin.php');
    exit();
}
//On récupère toutes les infos de la tables boardgames pour la liste
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    try {
        $request = $db->prepare('SELECT * FROM boardgames');
        $request->execute([]);
        $list = $request->fetchAll();
        $msgSuccess = count($list) . " jeux de société trouvé(s)";

    } catch (Exception $e) {
        var_dump($e->getMessage());
    }

} else {
    $msgError = "Merci de vous connecter";
}

include 'box.php';
?>


<!-- Préparation pour les filtrage de la list -->

<!-- <div style="width:50vw; margin:30px auto">
    <label for="boardgameFilter">Filter les jeux par style :</label>
    <select name="boardgameFilter" id="boardgameFilter" style="width:300px">
        <?php foreach ($list as $style) { ?>
            <option value="<?= $style['boardgameStyle'] ?>">
                <?= $style['boardgameStyle'] ?>
            </option>
        <?php } ?>
    </select>
</div> -->


<!-- On affiche la list en bouclant sur la table -->
<div style="display:flex; justify-content: space-evenly;width:60%; flex-wrap: wrap; margin: auto; ">
    <?php foreach ($list as $card) { ?>
        <div class="card" style="width: 18rem; border:none">
            <img src="<?= $card['boardgameImage'] ?>" class="card-img-top" alt="...">
            <div class="card-body"
                style="display:flex; flex-direction:column; align-items:center; justify-content:space-evenly">
                <h5 class="card-title">
                    <?= $card['boardgameName'] ?>
                </h5>
                <a href="data.php?id=<?= $card['boardgameID'] ?>" class="btn btn-primary">Détails</a>
            </div>
        </div>
    <?php } ?>
</div>

<?php include 'footer.php'; ?>