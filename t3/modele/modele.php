<?php

// Classe generale de definition d'exception
class MonException extends Exception{
  private $chaine;
  public function __construct($chaine){
    $this->chaine=$chaine;
  }

  public function afficher(){
    return $this->chaine;
  }

}


// Exception relative à un probleme de connexion
class ConnexionException extends MonException{
}

// Exception relative à un probleme d'accès à une table
class TableAccesException extends MonException{
}


// Classe qui gère les accès à la base de données

class Modele{
private $connexion;

// Constructeur de la classe
// remplacer X par les informations qui vous concernent

  public function __construct(){
   try{
      /*$chaine="mysql:host=localhost;dbname=PHP_MASTER";
      $this->connexion = new PDO($chaine,"nom_utilisateur","mdp");
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     }
    catch(PDOException $e){
      $exception=new ConnexionException("problème de connection à la base");
      throw $exception;
    }*/
    $chaine="mysql:host=localhost;dbname=E155251B";
    $this->connexion = new PDO($chaine,"E155251B","E155251B");
    $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   }
  catch(PDOException $e){
    $exception=new ConnexionException("problème de connection à la base");
    throw $exception;
  }
  }




// A développer
// méthode qui permet de se deconnecter de la base
public function deconnexion(){
   $this->connexion=null;
}


//A développer
// utiliser une requête classique
// méthode qui permet de récupérer les pseudos dans la table pseudo
// post-condition:
//retourne un tableau à une dimension qui contient les pseudos.
// si un problème est rencontré, une exception de type TableAccesException est levée

public function getPseudos(){
 try{

$statement=$this->connexion->query("SELECT pseudo from pseudonyme;");

while($ligne=$statement->fetch()){
$result[]=$ligne['pseudo'];
}
return($result);
}
catch(PDOException $e){
    throw new TableAccesException("problème avec la table pseudonyme");
  }
}



//A développer
// utiliser une requête préparée
//vérifie qu'un pseudo existe dans la table pseudonyme
// post-condition retourne vrai si le pseudo existe sinon faux
// si un problème est rencontré, une exception de type TableAccesException est levée
public function exists(){
try{
	$statement = $this->connexion->prepare("select pseudo from joueurs where pseudo=?;");
	$statement->bindParam(1, $pseudoParam);
	$pseudoParam=$_COOKIE["pseudo"];
	$statement->execute();
	$result=$statement->fetch(PDO::FETCH_ASSOC);

	if ($result["pseudo"]!=NUll){
    $statement = $this->connexion->prepare("select motDePasse from joueurs where pseudo=?;");
  	$statement->bindParam(1, $pseudoParam);
  	$pseudoParam=$result["pseudo"];
  	$statement->execute();
  	$result=$statement->fetch(PDO::FETCH_ASSOC);

    if (crypt($_COOKIE["mdp"], $result["motDePasse"])== $result["motDePasse"]) {
      unset($_COOKIE["mdp"]);
      return true;
    }
	}
	return false;
}
catch(PDOException $e){
    $this->deconnexion();
    throw new TableAccesException("problème avec la table pseudonyme");
    }
}

public function enregistrerPartie(){
  try{
  	$statement = $this->connexion->prepare("insert into parties (pseudo, partieGagnee, nombreCoups) values (?,?,?);");
  	$statement->bindParam(1, $_SESSION["pseudo"]);
    if ($_SESSION["gagne"]) {
      $var=1;
    }
    else{
      $var=0;
    }
    $varr=9;
    //$_SESSION["nb_cout"]
    $statement->bindParam(2, $var);
    $statement->bindParam(3, $varr);
  	$statement->execute();
  	//$result=$statement->fetch(PDO::FETCH_ASSOC);
  }
  catch(PDOException $e){
      $this->deconnexion();
      throw new TableAccesException("problème avec la table partie");
      }
}
}

?>
