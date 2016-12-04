<?php
require_once __DIR__."/../vue/vue.php";
require_once __DIR__."/../vue/css.php";
require_once __DIR__."/../modele/modele.php";

class ControleurAuthentification{

  private $vue;
  private $css;
  private $mod;


  function __construct(){
    $this->vue=new Vue();
    $this->mod=new Modele();
    $this->css=new Css();
  }

  function accueil(){
    $this->css->head_pse();
    $this->vue->demandePseudo();
  }

  function verif(){
    if($this->mod->exists()){
      return true;
    }
    else{
      $this->css->head_2b();
      $this->vue->pseudonok();
    }
  }

  function enregistrerPartie(){
    $this->mod->enregistrerPartie();
  }

  function historiquePartie(){
    $tab=$this->mod->get10Partie();
    $this->css->head_2b();
    $this->vue->histoPartie($tab);
  }
}
?>
