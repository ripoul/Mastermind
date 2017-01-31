<?php

class MonException extends Exception{
  private $chaine;
  public function __construct($chaine){
    $this->chaine=$chaine;
  }
  public function afficher(){
    return $this->chaine;
  }
}


class ConnexionException extends MonException{
}

class TableAccesException extends MonException{
}

/*
*Classe représentant le lien entre l'applicaton php et la base de donnee mysql.
*@version 1.0
* @since 03/12/2016
* @author LE BRIS Jules & DROUARD Antoine
*/
class Modele{
  /**
   * la connextion a la base de donnee
   * @var PDO
   */
  private $connexion;

  /**
   * le constructeur du lien : etablissement de la connextion avec la BD
   */
  public function __construct(){
    try{
      $chaine="mysql:host=localhost;dbname=PHP_MASTER";
      $this->connexion = new PDO($chaine,"nom_utilisateur","mdp");
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
      $exception=new ConnexionException("problème de connection à la base");
      throw $exception;
    }
  }

  /**
   * fonction qui deconecte la base de donnee
   */
public function deconnexion(){
  $this->connexion=null;
}

/**
 * fonction qui recupere les 5 meilleurs parties quelque soit les pseudo
 */
public function get10Partie(){
  try{
    $statement=$this->connexion->prepare("SELECT * from parties order by nombreCoups limit 0,5;");
    $statement->bindParam(1, $pseudoParam);
    $pseudoParam=$_SESSION["pseudo"];
    $statement->execute();
    $var3=$statement->fetchAll(PDO::FETCH_ASSOC);
    $var1=0;
    $var2=0;

    $statement=$this->connexion->prepare("SELECT COUNT(*) FROM parties where pseudo=?;");
    $statement->bindParam(1, $pseudoParam);
    $pseudoParam=$_SESSION["pseudo"];
    $statement->execute();
    $var1=$statement->fetchAll(PDO::FETCH_ASSOC);

    $statement=$this->connexion->prepare("SELECT COUNT(*) FROM parties where pseudo=? and partieGagnee=1;");
    $statement->bindParam(1, $pseudoParam);
    $pseudoParam=$_SESSION["pseudo"];
    $statement->execute();
    $var2=$statement->fetchAll(PDO::FETCH_ASSOC);

    //array_push($tab, $var1, $var2);

    $tab=$arrayName = array(1 => $var3, 2 =>$var1, 3=> $var2);

    return($tab);
  }
  catch(PDOException $e){
    throw new TableAccesException("problème avec la table parties");
  }
}

/**
 * fonction qui verifie si le mot de passe et le pseudo corresponde a une entrée dans la base de donnee
 * @return true si pseudo et mot de passe ok false sinon
 */
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

/**
 * enregistre la partie finie dans la bd
 */
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
    $statement->bindParam(2, $var);
    $statement->bindParam(3, $_SESSION["nb_cout"]);
    $statement->execute();
  }
  catch(PDOException $e){
    $this->deconnexion();
    throw new TableAccesException("problème avec la table partie");
  }
}
}

?>
