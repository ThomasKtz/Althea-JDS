<?php include 'header.php';
include 'components/existingUserControl.php';
include 'components/getBoardgameInfos.php';
?>
<!-- //Afficher les infos du jeu avec du contenu dynamique récupéré depuis le select -->
<h1 style="text-align:center">Détails de
    <?= $boardgameInfos['boardgameName'] ?> vendu par
    <?= $boardgameInfos['boardgameSeller'] ?>
</h1>
<section class="container" style="display:flex; justify-content:space-between;align-items:center; margin-top:50px">
    <div>
        <img style="max-width: 350px" src="<?= $boardgameInfos['boardgameImage'] ?>" alt="">
    </div>
    <div style="margin-left:35px; width:50%">
        <div style="display:flex; justify-content:space-between">
            <h2>
                <?= $boardgameInfos['boardgameName'] ?>
            </h2>
            <h2>
                <?= $boardgameInfos['boardgamePrice'] ?> €

            </h2>
        </div>
        <h5>
            <?= $boardgameInfos['boardgameStyle'] ?>
        </h5>
        <h5>
            <?= $boardgameInfos['boardgamePlayerNumber'] ?> joueurs maximum
        </h5>
        <p>
            <?= $boardgameInfos['boardgamePitch'] ?>
        </p>
        <div style="display:flex; justify-content:space-between; margin-top:30px">
            <a href="" class="btn btn-primary">Acheter ce jeu (
                <?= $boardgameInfos['boardgamePrice'] ?> €)
            </a>
            <!-- On renvoie vers sellerContact.php en entrant en GET le nom du vendeur du jeu récupéré dans le select -->
            <a href="sellerContact.php?sellerName=<?= $boardgameInfos['boardgameSeller'] ?>&id=<?= $boardgameInfos['boardgameID'] ?>"
                class="btn btn-warning">Contacter
                <?= $boardgameInfos['boardgameSeller'] ?>
            </a>
            <!-- On renvoie vers modif.php en entrant en GET l'id du jeu affiché -->
            <a href="modif.php?id=<?= $boardgameInfos['boardgameID'] ?>" class="btn btn-success">Modifier
                la fiche de
                <?= $boardgameInfos['boardgameName'] ?>
            </a>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>