<?php
require_once __DIR__."/controleurAuth.php";
require_once __DIR__."/../modele/modeleBDD.php";
require_once __DIR__."/../vue/vue.php";
require_once __DIR__."/../modele/jeu.php";
require_once __DIR__."/../config.php";

/**
* Classe permettant de diriger l'utilisateur sur les différentes vu lui permettant de jouer au jeu et de s'authtifier
*/
class Routeur
{
	private $controleurAuth;
	private $modele;
	private $vue;

	private $jeu;

	private $estAuth;
	private $Nomjoueur;
	private $tryComb;

	private $connNom;
	private $connPass;
	private $tryConn;

	private $fin;

	function __construct()
	{
		$this->controleurAuth = new ControleurAuth();
		$this->modele = new Modele(Config::$DB_NAME, Config::$DB_USERNAME, Config::$DB_PASSWORD);
		$this->vue = new Vue();
	}

	/**
	 * Fonction de base permettant le traitement de la demande
	 */
	function lancement(){
		$this->recupData();

		/*
		si l'utilisateur n'est pas authetifier
			si l'utilisateur n'a pas essayer de s'auth
				on demande à la vue d'afficher la page d'identification
			sinon
				on vérifie les identifiants de connexion
		Si l'utilisateur est auth
			on joue
		 */
			if($this->tryConn)
			{
				$this->estAuth = $this->controleurAuth->connect($this->modele, $this->connNom, $this->connPass);
			}

			if($this->estAuth)
			{
				//si l'utilisateur est authetifié
				$this->jeu = new Jeu();
				if(!isset($_SESSION["resultat_partie"]))
				{
					if($this->tryComb)
					{
						$this->jeu->jouer();
					}
				}
				
				
				if(isset($_SESSION["resultat_partie"]))
				{
					$this->vue->display_jeu(false, $_SESSION["resultat_partie"]);
					$this->jeu->fin($this->modele);
				}else{
					$this->vue->display_jeu(true, "");
				}
			}else{
				$this->vue->display_auth($this->tryConn);
			}
		}

	/**
	 * Fonction permettant de retrouver toute les données qu'a déjà rentrer l'utilisateur
	 */
	function recupData()
	{	
		//si l'utilisateur c'est déjà connecter AVEC succes
		if(isset($_SESSION["Nomjoueur"]))
		{
			$this->Nomjoueur = $_SESSION["Nomjoueur"];
			$this->estAuth = true;

			if(isset($_POST["tryComb"]))
			{
				$this->tryComb = $_POST["tryComb"];
			}
		}else{
			$this->Nomjoueur = "";
			$this->estAuth = false;
		}

		//si l'utilisateur essaye de se connecter
		if(isset($_POST["tryConn"])){
			if(isset($_POST["connNom"], $_POST["connPass"]))
			{
				$this->connNom = $_POST["connNom"];
				$this->connPass = $_POST["connPass"];
			}
			else
			{
				//TODO demander à la vue d'afficher une erreur
				$this->connNom = "";
				$this->connPass = "";
			}
			$this->tryConn = true;
		}

		//si l'utilisateur essaye de ce déconnecter
		if(isset($_POST["deconnexion"]))
		{
			// Détruit toutes les variables de session
			$_SESSION = array();

			// Si vous voulez détruire complètement la session, effacez également
			// le cookie de session.
			// Note : cela détruira la session et pas seulement les données de session !
			if (ini_get("session.use_cookies")) {
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,
					$params["path"], $params["domain"],
					$params["secure"], $params["httponly"]
					);
			}

			// Finalement, on détruit la session.
			session_destroy();
			$this->tryConn = false;
			$this->estAuth = false;
		}

		//le joueur souhait recommencer une partie
		if(isset($_POST["retry"]))
		{
			$name = $_SESSION["Nomjoueur"];
			session_unset();
			$_SESSION["Nomjoueur"] = $name;
		}

	}
}
?>