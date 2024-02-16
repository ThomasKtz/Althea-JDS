<?php
// On récupère les infos du jeu dont l'id apparait en GET
try {
   $request = $db->prepare('SELECT * FROM boardgames WHERE boardgameID = ?');
   $request->execute([
      $_GET['id']
   ]);
   $boardgameInfos = $request->fetch();

   try {
      $request = $db->prepare('SELECT * FROM styles');
      $request->execute([]);
      $styles = $request->fetchAll();


   } catch (Exception $e) {
      var_dump($e->getMessage());

   }
   try {
      $request = $db->prepare('SELECT * FROM difficulties');
      $request->execute([]);
      $difficulties = $request->fetchAll();


   } catch (Exception $e) {
      var_dump($e->getMessage());

   }

} catch (Exception $e) {
   var_dump($e->getMessage());
}