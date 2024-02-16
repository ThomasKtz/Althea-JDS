<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [];
}

try {

    $db = new PDO('mysql:host=localhost; dbname=althea; charset=utf8', 'root', '');

} catch (Exception $e) {
    var_dump($e->getMessage());
}

$msgSuccess = "";
$msgError = "";
// var_dump($_SESSION);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Althéa (JDS)</title>
</head>

<body style="">
    <header style="margin-bottom:30px;">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="add.php">Ajouter un jeu</a>
                        <a class="nav-link" href="list.php">Liste des jeux</a>
                        <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                            <a class="nav-link" href="index.php?logout=true">Se déconnecter</a>
                        <?php } else { ?>
                            <a class="nav-link" href="signup.php">S'inscrire</a>
                            <a class="nav-link" href="signin.php">Se connecter</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>