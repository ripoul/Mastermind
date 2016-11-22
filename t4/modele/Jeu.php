<?php
class jeu{
	private $userColors;

	public static $INT_COLORS = array(	1 => "red", 2 => "yellow",3 => "green",4 => "blue",5 => "orange",6 => "white",7 => "purple",8 => "fuchsia");
	public static $COLORS_INT = array(	"red" => 1,  "yellow" => 2,"green" => 3,"blue" => 4,"orange" => 5,"white" => 6,"purple" => 7,"fuchsia" => 8);

	function __construct(){
		if(isset($_SESSION["nb_cout"])==false){
			$_SESSION["nb_cout"]=0;
			$_SESSION["soluce"]=array(0 => Jeu::$INT_COLORS[rand(1,8)], 1 => Jeu::$INT_COLORS[rand(1,8)],2 => Jeu::$INT_COLORS[rand(1,8)],3 => Jeu::$INT_COLORS[rand(1,8)]);
		}
	}

	function jouer(){
		$_SESSION["nb_cout"]=$_SESSION["nb_cout"]+1;
		if(array_key_exists("c1", $_COOKIE)&&array_key_exists("c2", $_COOKIE)&&array_key_exists("c3", $_COOKIE)&&array_key_exists("c4", $_COOKIE)){
			if($_COOKIE["c1"]==$_SESSION["soluce"][0]&&$_COOKIE["c2"]==$_SESSION["soluce"][1]&&$_COOKIE["c3"]==$_SESSION["soluce"][2]&&$_COOKIE["c4"]==$_SESSION["soluce"][3]){
				$_SESSION["gagne"]=true;
				return;
			}
			if ($_SESSION["nb_cout"]>9&&isset($_SESSION["gagne"])==false) {
				$_SESSION["gagne"]=false;
				return;
			}

			//gestion des petites boules rouge (bien placer)
			$cpt_rouge=0;
			for ($i=0; $i < 4; $i++) {
				if($_SESSION["soluce"][$i]==$_COOKIE["c".($i+1)]){
					$cpt_rouge=$cpt_rouge+1;
				}
			}
			$_COOKIE["cpt_rouge"]=$cpt_rouge;


			$cpt_noire=0;
			$_vartab["tab_tmp"]=array();
			for ($i=0; $i < 4; $i++) {
				for ($j=0; $j < 4; $j++) {
					if($_SESSION["soluce"][$i]==$_COOKIE["c".($j+1)] && in_array($_COOKIE["c".($j+1)], $_vartab["tab_tmp"])==false){
						$_vartab["tab_tmp"][1]=$_COOKIE["c".($j+1)];
						$cpt_noire=$cpt_noire+1;
					}
				}
			}
			unset($_vartab);
			$cpt_noire=$cpt_noire-$cpt_rouge;
			$_COOKIE["cpt_noire"]=$cpt_noire;
		}
	}

	function converts_int_c($nb){
		return Jeu::$INT_COLORS[$nb];
	}

	function converts_c_int($color){
		return Jeu::$COLORS_INT[$color];
	}
}
?>
