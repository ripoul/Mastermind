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


class Modele{
  private $connexion;
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
    /*$chaine="mysql:host=localhost;dbname=E155251B";
    $this->connexion = new PDO($chaine,"E155251B","E155251B");
    $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
  $exception=new ConnexionException("problème de connection à la base");
  throw $exception;
}*/
}

public function deconnexion(){
  $this->connexion=null;
}

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
