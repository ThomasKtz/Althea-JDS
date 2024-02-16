<?php
//Verifier si le formulaire est bien rempli
if (
   isset($_POST['name']) &&
   isset($_POST['style']) &&
   isset($_POST['difficulty']) &&
   isset($_POST['playerNumber']) &&
   isset($_POST['pitch']) &&
   isset($_POST['duration']) &&
   isset($_POST['image']) &&
   isset($_POST['price'])
) {
   //Verifier si les champs sont vides
   if (
      empty($_POST['name']) ||
      empty($_POST['style']) ||
      empty($_POST['difficulty']) ||
      empty($_POST['playerNumber']) ||
      empty($_POST['pitch']) ||
      empty($_POST['duration']) ||
      empty($_POST['image']) ||
      empty($_POST['price'])
   ) {
      //on renvoie une erreur
      $msgError = "Merci de remplir la totalité de champs";
      //sinon
   } else {
      //Inserer les valeurs du formulaire dans la tbale boardgames
      try {
         $request = $db->prepare('INSERT INTO boardgames (
           boardgameName,
           boardgameStyle,
           boardgameDifficulty,
           boardgamePlayerNumber,
           boardgamePitch,
           boardgameDuration,
           boardgameImage,
           boardgamePrice,
           boardgameSeller)
           VALUES (?,?,?,?,?,?,?,?,?)');

         $request->execute([
            $_POST['name'],
            $_POST['style'],
            $_POST['difficulty'],
            $_POST['playerNumber'],
            $_POST['pitch'],
            $_POST['duration'],
            $_POST['image'],
            $_POST['price'],
            $_SESSION['user']['pseudo'],
         ]);

         $msgSuccess = "Jeu bien ajouté !";

      } catch (Exception $e) {
         var_dump($e->getMessage());
         $msgError = "Ajout impossible";
      }
   }


}