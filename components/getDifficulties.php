<?php
//Selectionner les difficultés qui vont entrer dans le select du formulaire
try {
   $request = $db->prepare('SELECT * FROM difficulties');
   $request->execute([]);
   $difficulties = $request->fetchAll();


} catch (Exception $e) {
   var_dump($e->getMessage());

}