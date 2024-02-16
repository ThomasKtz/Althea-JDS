<?php include 'header.php';

try {
    $request = $db->prepare('SELECT * FROM roles');
    $request->execute([]);
    $roles = $request->fetchAll();


} catch (Exception $e) {
    var_dump($e->getMessage());

}

if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['pswrd']) && isset($_POST['role']) && isset($_POST['birthday'])) {
    if (empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['pswrd']) || empty($_POST['role']) || empty($_POST['birthday'])) {
        $msgError = "Merci de remplir tous les champs";

    } else {
        $pswrdHash = password_hash($_POST['pswrd'], PASSWORD_DEFAULT);

        try{
            $request = $db->prepare('INSERT INTO users (userPseudo, userEmail, userPswrd, userBirthday, userRole) VALUES (?,?,?,?,?)');
            $request->execute([
                $_POST['pseudo'],
                $_POST['email'],
                $pswrdHash,
                $_POST['birthday'],
                $_POST['role'],
            ]);

            // $_SESSION['user'] = [
            //     'pseudo' => $_POST['pseudo'],
            //     'role' => $_POST['role'],
            //     'email' => $_POST['email'],
            // ];

            header('Location: signin.php');
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

}


?>


<div
    style="border-radius: 50px;background: #d4d4d4;box-shadow:  20px 20px 60px #b4b4b4,-20px -20px 60px #f4f4f4;margin:60px auto 20px auto; padding:60px;width:50%">
<h1 style="text-align:center">S'inscrire</h1>
<form action="" method="post" style="width: 60%; margin: auto">
    <div class="mb-3">
        <label for="pseudo" class="form-label">Votre pseudo</label>
        <input type="text" class="form-control" name="pseudo" id="pseudo" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Votre email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="mb-3">
        <label for="pswrd" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" name="pswrd" id="pswrd">
    </div>
    <div class="mb-3">
        <label for="birthday" class="form-label">Votre date de naissance</label>
        <input type="date" class="form-control" name="birthday" id="birthday">
    </div>
    <div>
        <label for="role" class="form-label">Votre rôle</label>
        <select name="role" id="role" class="form-select">
            <?php foreach ($roles as $role) {
                echo "<option value='{$role['roleName']}'>{$role['roleName']}</option>";
            } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top:20px">S'inscrire</button>
</form>
</div>




<?php include 'footer.php'; ?>