<?php
require_once __DIR__."/../vue/vue.php";
require_once __DIR__."/../vue/css.php";
require_once __DIR__."/../modele/modele.php";
/*
*Controleur qui fais le lien entre la vu et la base de donnée
*@version 1.0
* @since 03/12/2016
* @author LE BRIS Jules & DROUARD Antoine
*/
class ControleurAuthentification{
  /**
   * La vu
   * @var Vue
   */
  private $vue;

  /**
 * Les heads de la vu
 * @var Css
 */
 private $css;

  /**
 * le modele de la base de donnée
 * @var Modele
 */
  private $mod;

  /**
   * le constructeur du controleur
   */
  function __construct(){
    $this->vue=new Vue();
    $this->mod=new Modele();
    $this->css=new Css();
  }

  /**
   * fonction qui gere l'affichage de la page d'accueil.
   */
  function accueil(){
    $this->css->head_pse();
    $this->vue->demandePseudo();
  }

  /**
   * fonction qui verifie si un pseudo entrer en le bon
   * @return true si le pseudo est le bon
   */
  function verif(){
    if($this->mod->exists()){
      return true;
    }
    else{
      $this->css->head_2b();
      $this->vue->pseudonok();
    }
  }

  /**
   * fonction qui gere l'enregistrement d'une partie
   */
  function enregistrerPartie(){
    $this->mod->enregistrerPartie();
  }

  /**
   * fonction qui gere la recuperation des 5 meilleurs parties et qui gere son affichage.
   */
  function historiquePartie(){
    $tab=$this->mod->get10Partie();
    $this->css->head_2b();
    $this->vue->histoPartie($tab);
  }
}
?>
