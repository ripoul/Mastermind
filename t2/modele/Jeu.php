<?php
class jeu{
  private $nbCout;
	private $couleur1;
	private $couleur2;
	private $couleur3;
	private $couleur4;
	private $userColors;

	public static $INT_COLORS = array(	1 => "rouge", 2 => "jaune",3 => "vert",4 => "bleu",5 => "orange",6 => "blanc",7 => "violet",8 => "fushia");
	public static $COLORS_INT = array(	"rouge" => 1,  "jaune" => 2,"vert" => 3,"bleu" => 4,"orange" => 5,"blanc" => 6,"violet" => 7,"fushia" => 8);

  function __construct(){
    $this->nbCout=0;
    $this->couleur1=Jeu::$INT_COLORS[rand(1,8)];
    $this->couleur2=Jeu::$INT_COLORS[rand(1,8)];
    $this->couleur3=Jeu::$INT_COLORS[rand(1,8)];
    $this->couleur4=Jeu::$INT_COLORS[rand(1,8)];
  }

  function jouer(){
    echo $this->couleur1;
    echo $this->couleur2;
    echo $this->couleur3;
    echo $this->couleur4;
    $nbCout=$nbCout+1;
    if(array_key_exists("choixc1", $_COOKIE)&&array_key_exists("choixc2", $_COOKIE)&&array_key_exists("choixc3", $_COOKIE)&&array_key_exists("choixc4", $_COOKIE)){
      if($_COOKIE["choixc1"]==$this->couleur1&&$_COOKIE["choixc2"]==$this->couleur2&&$_COOKIE["choixc3"]==$this->couleur3&&$_COOKIE["choixc4"]==$this->couleur4){
        echo "gagné";
      }
    }
  }
}
?>
