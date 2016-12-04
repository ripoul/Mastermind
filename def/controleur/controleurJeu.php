<?php
require_once __DIR__."/../vue/vue.php";
require_once __DIR__."/../modele/Jeu.php";
/*
*Controleur qui fais le lien entre la vu et le modele du jeu Mastermind
*@version 1.0
* @since 03/12/2016
* @author LE BRIS Jules & DROUARD Antoine
*/
class ControleurJeu{

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
 * le modele du jeu
 * @var Modele
 */
  private $mod;

  /**
   * le constructeur du controleur
   */
  function __construct(){
    $this->vue=new Vue();
    $this->mod=new Jeu();
    $this->css=new Css();
  }

  /**
   * fonction qui gere l'affichage de la demande de proposition.
   */
  function start(){
    $this->css->head_3b();
    $this->vue->premiere_demande();
  }

  /**
   * fonction qui gere l'affichage de la page de victoire.
   */
  function gagner(){
    $this->css->head_2b();
    $this->vue->gagner();
  }

  /**
   * fonction qui gere l'affichage de la page de defaite.
   */
  function perdu(){
    $this->css->head_2b();
    $this->vue->perdu();
  }

  /**
   * fonction qui gere l'enregistrement du coup qui vient d'etre jouer.
   */
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
