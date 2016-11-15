<?php
require_once __DIR__."/../modele/modeleBDD.php";

class controleurAuth{
	public function __construct()
	{
		
	}

	/**
	 * Fonction qui test si un utilisateur peut ce connecter à une base de donnée
	 * @param Modele $modele Le modele de BDD utilisé
	 * @param String $nom le nom entré dans la barre de connection
	 * @param String $pass le mot de passe entré dans la barre de connection
	 */
	function connect($modele, $nom, $pass)
	{
		try{
			$result = false;
			if($modele->exists($nom))
			{
				$DBpass = $modele->getPassword($nom);
				$givenEncryptPass = crypt($pass, $DBpass);//on encrypte le mdp comme avec l'algo de cryptage, le sel, les option déjà utilisée lors de l'enregistrement
				if($DBpass == $givenEncryptPass)//si le mdp de la bdd et celui que nous venons d'encrypter est le même alors on connect
				{
					$result = true;
					$_SESSION["Nomjoueur"] = $nom;
				}
			}
			return $result;
		}catch(TableAccesException $e){
			echo "Impossible de trouver l'info dans la bdd";
		}
	}
}


?>