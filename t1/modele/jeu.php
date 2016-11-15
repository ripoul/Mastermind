<?php
/**
* Moteur du mastermind
*/
class Jeu
{
	private $nbCout;
	private $couleur1;
	private $couleur2;
	private $couleur3;
	private $couleur4;
	private $userColors;

	public static $INT_COLORS = array(	1 => "rouge", 
										2 => "jaune",
										3 => "vert",
										4 => "bleu",
										5 => "orange",
										6 => "blanc",
										7 => "violet",
										8 => "fushia");
	public static $COLORS_INT = array(	"rouge" => 1,  
										"jaune" => 2,
										"vert" => 3,
										"bleu" => 4,
										"orange" => 5,
										"blanc" => 6,
										"violet" => 7,
										"fushia" => 8);

	/**
	 * Le constructeur récupère les données précédement établie et les mets a jour si besoin (@see $this->nbCout)
	 * Si il n'y a aucune données de présente (si l'utilisateur n'a pas encore joué) il setup toute les infos utiles
	 */
	function __construct()
	{
		//si les couleurs ont déjà été tirée au sort
		//Donc que l'utilisateur à déjà commencé à jouer
		if(isset($_SESSION["couleur1"], $_SESSION["couleur2"], $_SESSION["couleur3"], $_SESSION["couleur4"], $_SESSION["nbCout"], $_SESSION["userColors"]))
		{
			$this->couleur1 = $_SESSION["couleur1"];
			$this->couleur2 = $_SESSION["couleur2"];
			$this->couleur3 = $_SESSION["couleur3"];
			$this->couleur4 = $_SESSION["couleur4"];
			$this->nbCout = $_SESSION["nbCout"]+1;
			$this->userColors = $_SESSION["userColors"];

		}else{//sinon on les tires au hasard
			$this->couleur1 = rand(1,8);
			$this->couleur2 = rand(1,8);
			$this->couleur3 = rand(1,8);
			$this->couleur4 = rand(1,8);

			$this->nbCout = 0;
			$this->userColors = array();


			$_SESSION["couleur1"] = $this->couleur1;
			$_SESSION["couleur2"] = $this->couleur2;
			$_SESSION["couleur3"] = $this->couleur3;
			$_SESSION["couleur4"] = $this->couleur4;
			$_SESSION["nbCout"] = $this->nbCout;
			$_SESSION["userColors"] = $this->userColors;
		}
		echo "Solution : ".Jeu::$INT_COLORS[$this->couleur1]." ".Jeu::$INT_COLORS[$this->couleur2]." ".Jeu::$INT_COLORS[$this->couleur3]." ".Jeu::$INT_COLORS[$this->couleur4];
	}

	/**
	 * Permet à l'utilisateur de jouer au jeu
	 * mets a jour les pions d'indication (rouge et blanc) pour faire savoir a l'utilisateur si il est sur la bonne voie
	 * mets a jour le resulat de la partie
	 */
	public function jouer()
	{
		
		//si l'utilisateur a choisi des couleurs
		if(isset($_POST["choixCouleur1"], $_POST["choixCouleur2"], $_POST["choixCouleur3"], $_POST["choixCouleur4"]))
		{
			//les couleur sont en lettre on les converti en chiffres
			$c1 = Jeu::$COLORS_INT[$_POST["choixCouleur1"]];
			$c2 = Jeu::$COLORS_INT[$_POST["choixCouleur2"]];
			$c3 = Jeu::$COLORS_INT[$_POST["choixCouleur3"]];
			$c4 = Jeu::$COLORS_INT[$_POST["choixCouleur4"]];

			//echo "Combinaison essayé : ".$c1.$c2.$c3.$c4 ." en ". $this->nbCout;
			
			//REGLES DU MASTERMIND
			//Si dans la proposition, un ou plusieurs pions de couleurs sont bien dans la combinaison mais pas à la bonne place
			// le joueur doit alors tirer la languette blanche selon le nombre.
			//Si dans la proposition, un ou plusieurs pions de couleurs sont bien dans la combinaison et à la bonne place, 
			// le joueur doit alors tirer la languette rouge selon le nombre.
			// 
			// blanc = nombre de couleurs juste indépendament de ca position
			// rouge = nombre de couleurs juste avec la bonne position
			// IMPLEMENTATION
			$userArray = array(0 => $c1, $c2, $c3, $c4);
			$toFindArray = array(0 => $c1, $c2, $c3, $c4);
			$blanc = 4 - array_diff($userArray, $toFindArra);
			
			//si tout est juste
			if($c1 == $this->couleur1 && $c2 == $this->couleur2 && $c3 == $this->couleur3 && $c4 == $this->couleur4 )//L'utilisateur a rentré la bonne combinaison
				$_SESSION["resultat_partie"] = true;

			//Si dans la proposition, un ou plusieurs pions de couleurs sont bien dans la combinaison mais pas à la bonne place, le joueur doit alors tirer la languette blanche selon le nombre.

			//on enrgistre l'historique
			$this->enregistrer($c1, $c2, $c3, $c4);
		}
	
		if($this->nbCout >= 10)
			$_SESSION["resultat_partie"] = false;
	}

	/**
	 * Enregistre l'état de la partie 
	 *  enregistre l'historique des couts
	 *  enregistre le nombre de couts réalisé
	 *  enregistre les indications concernant la positions, les bonnes couleurs pour le joueur
	 * @param  Int $c1 la couleur rentrée par l'utilisateur en 1er position
	 * @param  Int $c2 la couleur rentrée par l'utilisateur en 2eme position
	 * @param  Int $c3 la couleur rentrée par l'utilisateur en 3eme position
	 * @param  Int $c4 la couleur rentrée par l'utilisateur en 4eme position
	 */
	public function enregistrer($c1, $c2, $c3, $c4)
	{
		$_SESSION["nbCout"] = $this->nbCout;
		$tmp = array(0 => $c1, $c2, $c3, $c4);
		array_push($this->userColors, $tmp);
		$_SESSION["userColors"] = $this->userColors;
		//print_r($_SESSION["userColors"]);
	}

	public function fin($modele)
	{
		// if($_SESSION["resultat_partie"])
		// 	echo "Le joueur a gagné";
		// else
		// 	echo "Le joueur a perdu";

		$modele->enregistrer_partie();
	}
}
?>