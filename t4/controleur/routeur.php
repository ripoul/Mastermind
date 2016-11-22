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
  public function route() {
    //savoir ou on en est : tableau

    if(isset($_POST["ch_ut"])){
      //echo "ch_ut";
      unset($_POST);
      unset($_COOKIE);
      $_SESSION=array();
      //unset($_SESSION);
    }

    if(isset($_POST["recomencer"])){
      //echo "recomencer";
      $_COOKIE["tmp"]=$_SESSION["pseudo"];
      unset($_POST);
      $_SESSION=array();
      //unset($_SESSION);
      $_SESSION["pseudo"]=$_COOKIE["tmp"];
      $_SESSION["connect"]=true;
      //$_SESSION["soluce"]=null;
      unset($_COOKIE);
    }

    //non connecter
    if(isset($_SESSION["pseudo"])==false&&empty($_POST)){
      $this->ctrlAuthentification->accueil();
    }


    //en cour de connection
    if(isset($_SESSION["pseudo"])==false&&isset($_POST["pseudo"])){
      //on se connect
      //echo "premier";
      $_COOKIE["pseudo"]=$_POST["pseudo"];
      $_COOKIE["mdp"]=$_POST["mdp"];
      $_SESSION["pseudo"]=$_POST["pseudo"];
      if($this->ctrlAuthentification->verif()){
        $_SESSION["connect"]=true;
        $_SESSION["pseudo"]=$_POST["pseudo"];
        unset($_COOKIE["pseudo"]);
        unset($_COOKIE["mdp"]);
        unset($_POST["pseudo"]);
        unset($_POST["mdp"]);
      }
    }

    //si une combinaison essayer
    if(isset($_SESSION["connect"])&&isset($_SESSION["gagne"])==false&& isset($_POST["choixCouleur1"])){
      //echo "compi";
      if ($_SESSION["connect"]==true){
        $_COOKIE["c1"]=$_POST["choixCouleur1"];
        $_COOKIE["c2"]=$_POST["choixCouleur2"];
        $_COOKIE["c3"]=$_POST["choixCouleur3"];
        $_COOKIE["c4"]=$_POST["choixCouleur4"];
        unset($_POST["choixCouleur1"]);
        unset($_POST["choixCouleur2"]);
        unset($_POST["choixCouleur3"]);
        unset($_POST["choixCouleur4"]);
        $this->ctrlJeu->enregistrer();
      }
    }

    //si pas de combinaison essayer
    if(isset($_SESSION["connect"])&&isset($_SESSION["gagne"])==false&& isset($_POST["choixCouleur1"])==false){
      //echo "pas de compi";
      if ($_SESSION["connect"]==true){
        $this->ctrlJeu->start();
      }
    }

    if(isset($_SESSION["connect"])&&isset($_SESSION["gagne"])==true){
      //echo "gangne ou perd";
      if ($_SESSION["connect"]==true && $_SESSION["gagne"]==true){
        $this->ctrlAuthentification->enregistrerPartie();
        $this->ctrlJeu->gagner();
      }
    }

    if(isset($_SESSION["connect"])&&isset($_SESSION["gagne"])==true){
      //echo "gangne ou perd";
      if ($_SESSION["connect"]==true && $_SESSION["gagne"]==false){
        $this->ctrlAuthentification->enregistrerPartie();
        $this->ctrlJeu->perdu();
      }
    }

    if(isset($_POST["sup"])){
      unset($_POST);
      unset($_COOKIE);
      $_SESSION=array();
      echo "fini";
    }
  }


}
?>
