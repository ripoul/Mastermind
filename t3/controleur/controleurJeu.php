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
  //rajouter le lien au jeu LOOOOOOOOOOOOOL oui javais pas vu pk sa marchait pas tres bien
}

function gagner(){
  $this->vue->gagner();
}

function perdu(){
  $this->vue->perdu();
}

function enregistrer(){
  //si premier tour on cree la matrice de cout jouer
  if (isset($_SESSION["cout"])==false) {
    $_SESSION["cout"]=array($_SESSION["nb_cout"] => array("c1" => $_COOKIE["c1"], "c2" => $_COOKIE["c2"],"c3" => $_COOKIE["c3"],"c4" => $_COOKIE["c4"]));
    //supprimer les cookie
  }
  else{
    $_SESSION["cout"][$_SESSION["nb_cout"]]=array("c1" => $_COOKIE["c1"], "c2" => $_COOKIE["c2"],"c3" => $_COOKIE["c3"],"c4" => $_COOKIE["c4"]);
    //supprimer les cookie
  }

}
}
?>
