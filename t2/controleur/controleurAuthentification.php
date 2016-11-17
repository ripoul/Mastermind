<?php
require_once __DIR__."/../vue/vue.php";
require_once __DIR__."/../modele/modele.php";

class ControleurAuthentification{

private $vue;
private $mod;


function __construct(){
$this->vue=new Vue();
$this->mod=new Modele();
}

function accueil(){
  $this->vue->demandePseudo();
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
