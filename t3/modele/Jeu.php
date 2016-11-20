<?php
class jeu{
	private $userColors;

	public static $INT_COLORS = array(	1 => "rouge", 2 => "jaune",3 => "vert",4 => "bleu",5 => "orange",6 => "blanc",7 => "violet",8 => "fushia");
	public static $COLORS_INT = array(	"rouge" => 1,  "jaune" => 2,"vert" => 3,"bleu" => 4,"orange" => 5,"blanc" => 6,"violet" => 7,"fushia" => 8);

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
			if ($_SESSION["nb_cout"]>10&&isset($_SESSION["gagne"])==false) {
				$_SESSION["gagne"]=false;
			}
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
