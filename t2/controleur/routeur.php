<?php

require_once __DIR__."/controleurAuthentification.php";

class Routeur {
  private $ctrlAuthentification;

  public function __construct() {
    $this->ctrlAuthentification= new ControleurAuthentification();
  }

  // Traite une requête entrante
  public function routerRequete() {
    if (empty($_POST)){
      $this->ctrlAuthentification->accueil();
    }
    else{
      if(array_key_exists("pseudo", $_POST)){
        $_COOKIE["pseudo"]=$_POST["pseudo"];
        $_COOKIE["mdp"]=$_POST["mdp"];
        $this->ctrlAuthentification->verif();
      }
    }
  }
}
?>
