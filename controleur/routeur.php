<?php

require_once __DIR__."/controleurAuthentification.php";
require_once __DIR__."/controleurJeu.php";
/*
*Controleur qui gere l'avancement de programme (savoir si un cout est jouer ou connaitre la demande de l'utilisateur)
*@version 1.0
* @since 03/12/2016
* @author LE BRIS Jules & DROUARD Antoine
*/
class Routeur {
  /**
   * Le controleur de la base de donnee
   * @var ControleurAuthentification
   */
  private $ctrlAuthentification;

  /**
   * Le controleur du jeu
   * @var ControleurJeu
   */
  private $ctrlJeu;

  /**
   * le constructeur du controleur
   */
  public function __construct() {
    $this->ctrlAuthentification= new ControleurAuthentification();
    $this->ctrlJeu=new ControleurJeu();
  }

  /**
   * traite une requete entrante
   */
  public function route() {

    if(isset($_POST["ch_ut"])){
      unset($_POST);
      unset($_COOKIE);
      $_SESSION=array();
    }

    if(isset($_POST["recomencer"])){
      $_COOKIE["tmp"]=$_SESSION["pseudo"];
      unset($_POST);
      $_SESSION=array();
      $_SESSION["pseudo"]=$_COOKIE["tmp"];
      $_SESSION["connect"]=true;
      unset($_COOKIE);
    }

    //non connecter
    if(isset($_SESSION["pseudo"])==false&&empty($_POST)){
      $this->ctrlAuthentification->accueil();
    }


    //en cour de connection
    if(isset($_SESSION["pseudo"])==false&&isset($_POST["pseudo"])){
      //on se connect
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
    if(isset($_SESSION["connect"])&&isset($_SESSION["gagne"])==false&& isset($_POST["choixCouleur1"])==false&&isset($_POST["histo"])==false){
      if ($_SESSION["connect"]==true){
        $this->ctrlJeu->start();
      }
    }


    if(isset($_SESSION["connect"])&&isset($_SESSION["gagne"])==true){
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

    if(isset($_POST["histo"])){
      unset($_POST);
      $this->ctrlAuthentification->historiquePartie();
    }
  }
}
?>
