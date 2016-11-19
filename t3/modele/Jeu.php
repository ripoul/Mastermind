<?php
class jeu{
	private $userColors;

	public static $INT_COLORS = array(	1 => "rouge", 2 => "jaune",3 => "vert",4 => "bleu",5 => "orange",6 => "blanc",7 => "violet",8 => "fushia");
	public static $COLORS_INT = array(	"rouge" => 1,  "jaune" => 2,"vert" => 3,"bleu" => 4,"orange" => 5,"blanc" => 6,"violet" => 7,"fushia" => 8);

  function __construct(){
    if(isset($_SESSION["nb_cout"])==false){
      $_SESSION["nb_cout"]=0;
      $_SESSION["soluce"]=array(c1 => Jeu::$INT_COLORS[rand(1,8)], c2 => Jeu::$INT_COLORS[rand(1,8)],c3 => Jeu::$INT_COLORS[rand(1,8)],c4 => Jeu::$INT_COLORS[rand(1,8)]);
    }

  }

  function jouer(){
    $_SESSION["nb_cout"]=$_SESSION["nb_cout"]+1;
    if(array_key_exists("choixc1", $_COOKIE)&&array_key_exists("choixc2", $_COOKIE)&&array_key_exists("choixc3", $_COOKIE)&&array_key_exists("choixc4", $_COOKIE)){
      if($_COOKIE["choixc1"]==$this->couleur1&&$_COOKIE["choixc2"]==$this->couleur2&&$_COOKIE["choixc3"]==$this->couleur3&&$_COOKIE["choixc4"]==$this->couleur4){
        echo "gagné";
      }
    }
  }

  function converts_int_c($nb){

  }

  function converts_c_int($color){

  }
}
?>
