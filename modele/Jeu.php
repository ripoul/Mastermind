<?php
/*
*Classe représentant le jeu du masterminds
*@version 1.0
* @since 03/12/2016
* @author LE BRIS Jules & DROUARD Antoine
*/
class jeu{
	/**
   * les couleur pouvant etre choisi associer a un numéro
   * @var array
   */
	public static $INT_COLORS = array(	1 => "red", 2 => "yellow",3 => "green",4 => "blue",5 => "orange",6 => "white",7 => "purple",8 => "fuchsia");

	/**
   * le constructeur du modele du jeu
   */
	function __construct(){
		if(isset($_SESSION["nb_cout"])==false){
			$_SESSION["nb_cout"]=0;
			$_SESSION["soluce"]=array(0 => Jeu::$INT_COLORS[rand(1,8)], 1 => Jeu::$INT_COLORS[rand(1,8)],2 => Jeu::$INT_COLORS[rand(1,8)],3 => Jeu::$INT_COLORS[rand(1,8)]);
		}
	}

	/**
   * fonction maitre de la classe : elle verifie si le joueur a gagner ou perdu. elle calcule aussi le noubre de bile a la bone place ou non.
   */
	function jouer(){
		$_SESSION["nb_cout"]=$_SESSION["nb_cout"]+1;
		if(array_key_exists("c1", $_COOKIE)&&array_key_exists("c2", $_COOKIE)&&array_key_exists("c3", $_COOKIE)&&array_key_exists("c4", $_COOKIE)){
			if($_COOKIE["c1"]==$_SESSION["soluce"][0]&&$_COOKIE["c2"]==$_SESSION["soluce"][1]&&$_COOKIE["c3"]==$_SESSION["soluce"][2]&&$_COOKIE["c4"]==$_SESSION["soluce"][3]){
				$_SESSION["gagne"]=true;
			}
			if ($_SESSION["nb_cout"]>9&&isset($_SESSION["gagne"])==false) {
				$_SESSION["gagne"]=false;
			}

			//bille rouge = bien placer
			$cpt_rouge=0;
			for ($i=0; $i < 4; $i++) {
				if($_SESSION["soluce"][$i]==$_COOKIE["c".($i+1)]){
					$cpt_rouge=$cpt_rouge+1;
				}
			}
			$_COOKIE["cpt_rouge"]=$cpt_rouge;

			//bille blanche=mal placer mais presente
			$cpt_blanc=0;
			$tab_soluce=$_SESSION["soluce"];
			$tab_proposition= array(0 => $_COOKIE["c1"], 1 => $_COOKIE["c2"], 2 => $_COOKIE["c3"], 3 => $_COOKIE["c4"]);
			for ($i=0; $i <4 ; $i++) {
				for ($j=0; $j < 4; $j++) {
					if (isset($tab_proposition[$i]) && isset($tab_soluce[$j]) && $tab_soluce[$j]==$tab_proposition[$i]) {
						$cpt_blanc=$cpt_blanc+1;
						unset($tab_soluce[$j]);
						unset($tab_proposition[$i]);
					}
				}
			}
			$cpt_blanc=$cpt_blanc-$cpt_rouge;
			$_COOKIE["cpt_blanc"]=$cpt_blanc;
		}
	}
}
?>
