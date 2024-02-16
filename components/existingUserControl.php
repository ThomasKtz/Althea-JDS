<?php
//Verifier siun user est connecté
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
   //On redirige si pas le cas
   header('Location: signin.php');
   exit();
}