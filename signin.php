<?php include 'header.php';


if (isset($_GET['logout']) && $_GET['logout'] == "true") {
    $_SESSION = [];
    session_destroy();
}
// On vérifie si le pseudo et le mdp sont définis
if (isset($_POST['pseudo']) && isset($_POST['pswrd'])) {
    // On vérifie si l'un des champs est vide
    if (empty($_POST['pseudo']) || empty($_POST['pswrd'])) {
        $msgError = "Merci de remplir tous les champs";
    } else {
        // On réucpère les infos de l'user dans la table user
        try {
            $request = $db->prepare('SELECT * FROM users WHERE userPseudo = ?');
            $request->execute([
                $_POST['pseudo']
            ]);
            $user = $request->fetch();
            // On vérifie si le mdp saisi et celui enregistré en bdd correspondent
            if (!$user || !password_verify($_POST['pswrd'], $user['userPswrd'])) {
                $msgError = 'Identifiants incorrects';
            } else {
                // On authentifie l'user dans la session
                $_SESSION['user'] = [
                    'pseudo' => $user['userPseudo'],
                    'role' => $user['userRole'],
                    'email' => $user['userEmail'],
                ];
                header('Location: index.php?login=true');
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
include 'box.php';



?>

<div
    style="border-radius: 50px;background: #d4d4d4;box-shadow:  20px 20px 60px #b4b4b4,-20px -20px 60px #f4f4f4;margin:60px auto 20px auto; padding:60px;width:50%">
    <h1 style="text-align:center; margin:20px">Connexion</h1>
    <form action="" method="post" style=" margin: auto">
        <div class="mb-3">
            <label for="pseudo" class="form-label">Votre pseudo</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="pswrd" class="form-label">Votre mot de passe</label>
            <input type="password" class="form-control" name="pswrd" id="pswrd">
        </div>
        <button type="submit" class="btn btn-success">Se connecter</button>
    </form>
</div>





<?php include 'footer.php'; ?>