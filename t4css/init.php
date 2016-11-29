<?php
session_start();
require_once __DIR__."/controleur/routeur.php";
$routeur = new Routeur();
$routeur->route();
?>
