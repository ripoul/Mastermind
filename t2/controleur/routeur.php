<?php

require_once __DIR__."/controleurAuthentification.php";
require_once __DIR__."/controleurJeu.php";

class Routeur {
  private $ctrlAuthentification;
  private $ctrlJeu;

  public function __construct() {
    $this->ctrlAuthentification= new ControleurAuthentification();
    $this->ctrlJeu=new ControleurJeu();
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
        if($this->ctrlAuthentification->verif()){
          $this->ctrlJeu->start();
        }
        else{
          $this->ctrlAuthentification->accueil();
        }
      }
      else{
        if(array_key_exists("choixCouleur1", $_POST)){
          $_COOKIE["c1"]=$_POST["choixCouleur1"];
          $_COOKIE["c2"]=$_POST["choixCouleur2"];
          $_COOKIE["c3"]=$_POST["choixCouleur3"];
          $_COOKIE["c4"]=$_POST["choixCouleur4"];
          $this->ctrlJeu->next();
        }
      }
    }
  }
}
?>
