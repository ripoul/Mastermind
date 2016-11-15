<?php
// Classe generale de definition d'exception
class MonException extends Exception{
    private $chaine;
    public function __construct($chaine){
        $this->chaine=$chaine;
    }

    public function message(){
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

class Modele
{
    private $connexion;

    // Constructeur de la classe
    // remplacer X par les informations qui vous concernent
    public function __construct($dbname, $user,$password){
        try{
            $chaine="mysql:host=localhost;dbname=".$dbname;
            $this->connexion = new PDO($chaine,$user,$password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e->getMessage();
            $exception=new ConnexionException("Problème de connection à la base");
            throw $exception;
        }
    }




    // A développer
    // méthode qui permet de se deconnecter de la base
    public function deconnexion(){
        $this->connexion=null;
    }

    /**
     * Permet de connaitre les pseudos de tous les joueurs inscrit
     * @return Array Les joueur issu de la table joueurs
     */
    public function getPseudos(){
        try{  

            $statement=$this->connexion->query("SELECT pseudo from joueurs;");

            while($ligne=$statement->fetch()){
                $result[]=$ligne['pseudo'];
            }
            return($result);
        }
        catch(PDOException $e){
            echo $e->getMessage();
            throw new TableAccesException("problème avec la table joueurs");
        }  
    }

    /**
     * Permet de savoir si un joueur exist dans la base de données
     * @param  String $pseudo Le joueur en question
     * @return boolean         vrai si il exist faux sinon
     */
    public function exists($pseudo){
        try{  
            $statement = $this->connexion->prepare("select * from joueurs where pseudo=?;");
            $statement->bindParam(1, $pseudo);
            $statement->execute();
            $result=$statement->fetch(PDO::FETCH_ASSOC);

            if ($result["pseudo"] == $pseudo){
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
            throw new TableAccesException("problème avec la table joueurs");
        }
    }

    /**
     * Retourne le mot de passe du joueur concerné
     * ! Je ne promet rien quand à la validité du code si le joueur n'existe pas !
     * Le mot de passe renvoyé est crypté avec la fonction crypt() de php
     * @param  String $pseudo le pseudo du joueur
     * @return String         Le mot de passe du joueur demandé crypté
     */     
    public function getPassword($pseudo)
    {
        try{  
            $statement = $this->connexion->prepare("select motDePasse from joueurs where pseudo=?;");
            $statement->bindParam(1, $pseudo);
            $statement->execute();

            $result=$statement->fetch(PDO::FETCH_ASSOC)["motDePasse"];

            return $result;

        }
        catch(PDOException $e){
            echo $e->getMessage();
            throw new TableAccesException("problème avec la table joueurs");
        }
    }


    public function enregistrer_partie()
    {
        try{  
            $statement = $this->connexion->prepare("INSERT INTO `parties`(`pseudo`, `partieGagnee`, `nombreCoups`) VALUES (?,?,?)");
            // $statement->bindParam(1, $_SESSION["Nomjoueur"]);
            // $statement->bindParam(2, $_SESSION["resultat_partie"]);
            // $statement->bindParam(3, $_SESSION["nbCout"]);
            $p1 = $_SESSION["Nomjoueur"];
            $p2 = $_SESSION["resultat_partie"];
            $p3 = $_SESSION["nbCout"];
            $statement->bindValue(1, $p1);
            $statement->bindValue(2, $p2);
            $statement->bindValue(3, $p3);
            $statement->execute();
        }
        catch(PDOException $e){
            echo $e->getMessage();
            throw new TableAccesException("problème avec la table partie");
        }
    }


}

?>
