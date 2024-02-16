<?php include 'header.php';
//Destruction de la session si logout est present en GET
if (isset($_GET['logout']) && $_GET['logout'] == "true") {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php');
    exit();
}
//Message de bienvenue si login est présent en GET
if (isset($_GET['login']) && $_GET['login'] === 'true') {
    $msgSuccess = "Bienvenue " . $_SESSION['user']['pseudo'] . "!";
}

include 'box.php';
?>

<h1 style="text-align:center">Bienvenue chez Althéa</h1>


<?php include 'footer.php'; ?>