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

function next(){
  $this->vue->suivante();
}

function verif(){
  if($this->mod->exists()){
    $this->vue->pseudook();
  }
  else{
    $this->vue->pseudonok();
  }
}
}
?>
