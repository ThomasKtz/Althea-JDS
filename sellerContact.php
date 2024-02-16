<?php include 'header.php';
// On récupère les infos du jeu grace au vendeur
try {
    $request = $db->prepare('SELECT * FROM boardgames WHERE boardgameSeller = ? AND boardgameID = ?');
    $request->execute([$_GET['sellerName'], $_GET['id']]);
    $boardgame = $request->fetch();


} catch (Exception $e) {
    var_dump($e->getMessage());
}
// On récupère l'email du vendeur depuis la table users pour envoyer le mail
try {
    $request = $db->prepare('SELECT userEmail FROM users WHERE userPseudo = ?');
    $request->execute([$_GET['sellerName']]);
    $seller = $request->fetch();


} catch (Exception $e) {
    var_dump($e->getMessage());
}



?>

<h1 style="text-align:center">Contacter
    <?= $boardgame['boardgameSeller'] ?>
</h1>
<!-- le formulaire est prérempli avec des infos obtenus dans la table boardgames -->
<form action="" method="post" style="width: 60%; margin:35px auto">

    <label for="pitch">Votre message</label>
    <textarea class="form-control" name="pitch" id="pitch" rows="3" style="margin:30px 0 ">
    Bonjour <?= $boardgame['boardgameSeller'] ?>,
    Je suis intéréssé(e) par l'achat de <?= $boardgame['boardgameName'] ?>.
    </textarea>
    <a href="mailto:<?= $seller['userEmail'] ?>" class="btn btn-success">Envoyer le message</a>
    <a href="data.php?id=<?= $boardgame['boardgameID'] ?>" class="btn btn-primary">Retourner à la fiche du jeu</a>
</form>

<?php include 'footer.php'; ?>