<?php
/**
* Classe sintétisant toutes les vue de jeu
*/
require_once __DIR__."/../modele/jeu.php";

class Vue
{
	/**
	 * Le début d'un entête html pour simplifier l'affichage d'une page
	 * @var String
	 */
	private static $HTML_HEADER = 
	"<!DOCTYPE html>
	<html>
	<head>
		<title>MasterMind</title>
		<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">
		<meta charset=\"utf-8\">
	</head>
	<body>";

	/**
	 * La fin d'un entête html pour simplifier l'affichage d'une page
	 * @var String
	 */
		private static $HTML_FOOTER = 
		"</body>
		</html>";

		function __construct()
		{
		}

	/**
	 * Affiche la page d'authentification
	 */
	public function display_auth($mauvaisMDP = false)
	{
		//echo "Pas implementé";
		echo Vue::$HTML_HEADER;
		?>
		<p>Veullez entrez vos identidiant de connexion</p>
		<?php if($mauvaisMDP) echo "<p>Mauvais couple Nom / mot de passe. Veuillez reessayer</p>";?>
		<form action="" method="POST">
			<p><input type="text" name="connNom" placeholder="Votre identifiant"></p>
			<p><input type="password" name="connPass" placeholder="Password"></p>
			<p><input type="submit" name="Envoyer" value="Se connecter"></p>
			<input type="hidden" name="tryConn" value=" ">
		</form>
		<?php
		echo Vue::$HTML_FOOTER;
	}

	/**
	 * Affiche le jeu dans son état actuel
	 * Donne la grille correspondant à l'historique
	 * Affiche 4 selection (HTML select) pour permettre à l'utilisateur de choisir ces couleurs 
	 * en fonction de l'historique 
	 */
	public function display_jeu($jouable, $result)
	{
		if(isset($_SESSION["userColors"]))
			$couleur = $_SESSION["userColors"];

		
		echo Vue::$HTML_HEADER;
		
		//affichage de la table d'historique des couts joué
		echo "<table border = 'border'>";
		for($i = 0; $i< 10; $i++)
		{
			?>	
			<tr>
				<?php
				for($j = 0; $j< 4; $j++)
				{
					?>
					<td><?php echo (isset($couleur[$i][$j]))? Jeu::$INT_COLORS[$couleur[$i][$j]] : "   "; ?></td>
					<?php
				}
				?>
			</tr>
			<?php
		}
		echo"</table>";

		//affichage de la commande de jeu
		// (les boutons pour choisir quel couleur va où)
		if($jouable){
			echo "<form action=\"\" method=\"POST\"><p>"; 
			for($k=1; $k<=4; $k++)
			{
				?>
				<select name="<?php echo "choixCouleur".$k; ?>">
					<option value="rouge" class="rouge">rouge</option>
					<option value="jaune" class="jaune">jaune</option>
					<option value="vert" class="vert">vert</option>
					<option value="bleu" class="bleu">bleu</option>
					<option value="orange" class="orange">orange</option>
					<option value="blanc" class="blanc">blanc</option>
					<option value="violet" class="violet">violet</option>
					<option value="fushia" class="fushia">fushia</option>
				</select>
				<?php
			}
			?>
			</p>
			<p><input type="submit" value="Essayer cette combinaison"></p>
			<input type="hidden" name="tryComb" value=" ">
			</form>
			<?php
		}else
		{
			$this->display_fin($result);
			$this->reessayer();
		}
		$this->deconnexion();

		echo Vue::$HTML_FOOTER;
	}

	/**
	 * Fonction affichant un bouton pour ce deconnecter
	 */
	public function deconnexion()
	{
		?>
		<p><form action="" method="POST">
			<input type="hidden" name="deconnexion" value=" ">
			<input type="submit" name="" value="Se déconnecter">
		</form></p>
		<?php
	}

	/**
	 * Affiche le résulat de la partie :
	 * 	victoire en nb couts
	 * 	cuisante defaite, nul/20, level pas tro for
	 * @param  boolean $result Donne le résultat de la partie true => gagné, false => perdu
	 */
	public function display_fin($result)
	{
		if($result){
			?>
			<H3>Bravo vous avez gagné en <?php echo $_SESSION["nbCout"]?> cout(s)</H3>
			<?php
		}else{
			?>
			<H3>Vous avez perdu</H3>
			<?php
		}
	}

	/**
	 * Affiche le bouton pour reessayer une partie
	 */
	public function reessayer()
	{
		?>
		<p><form action="" method="POST">
			<input type="hidden" name="retry" value=" ">
			<input type="submit" value="Recommencer">
		</form></p>
		<?php
	}
}

?>