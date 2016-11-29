<?php
require_once __DIR__."/../vue/vue.php";
require_once __DIR__."/../modele/Jeu.php";

class ControleurJeu{

  private $vue;
  private $mod;


  function __construct(){
    $this->vue=new Vue();
    $this->mod=new Jeu();
  }

  function start(){
    $this->vue->premiere_demande();
  }

  function gagner(){
    $this->vue->gagner();
  }

  function perdu(){
    $this->vue->perdu();
  }

  function enregistrer(){
    $this->mod->jouer();
    $_SESSION["cout"][$_SESSION["nb_cout"]]=array(0 => $_COOKIE["c1"], 1 => $_COOKIE["c2"],2 => $_COOKIE["c3"],3 => $_COOKIE["c4"], "brouge" => $_COOKIE["cpt_rouge"], "bblanc"=>$_COOKIE["cpt_blanc"]);
    //supprimer les cookie
    unset($_COOKIE["c1"]);
    unset($_COOKIE["c2"]);
    unset($_COOKIE["c3"]);
    unset($_COOKIE["c4"]);
  }
}
?>
