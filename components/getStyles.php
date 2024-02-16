<?php
//Selectionner les styles qui vont entrer dans le select du formulaire
try {
   $request = $db->prepare('SELECT * FROM styles');
   $request->execute([]);
   $styles = $request->fetchAll();


} catch (Exception $e) {
   var_dump($e->getMessage());

}