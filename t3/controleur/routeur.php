  <?php

require_once __DIR__."/controleurAuthentification.php";
require_once __DIR__."/controleurJeu.php";

class Routeur {
  private $ctrlAuthentification;
  private $ctrlJeu;

  public function __construct() {
    $this->ctrlAuthentification= new ControleurAuthentification();
    $this->ctrlJeu=new ControleurJeu();
  }

  // Traite une requête entrante
  public function route() {
    //savoir ou on en est : tableau

    //non connecter
    if(isset($_SESSION["pseudo"])==false&&empty($_POST)){
      $this->ctrlAuthentification->accueil();
    }


    //en cour de connection
    if(isset($_SESSION["pseudo"])==false&&isset($_POST["pseudo"])){
      //on se connect
      $_COOKIE["pseudo"]=$_POST["pseudo"];
      $_SESSION["pseudo"]=$_POST["pseudo"];
      $_COOKIE["mdp"]=$_POST["mdp"];
      if($this->ctrlAuthentification->verif()){
        $_SESSION["connect"]=true;
        //unset($_COOKIE["pseudo"]);
        //unset($_COOKIE["mdp"]);
      }
    }

    //si pas de combinaison essayer
    if(isset($_SESSION["connect"])&&isset($SESSION["gagne"])==false&& isset($_POST["choixCouleur1"])==false){
      if ($_SESSION["connect"]==true){
        $this->ctrlJeu->start();
      }
    }

    //si une combinaison essayer
    if(isset($_SESSION["connect"])&&isset($SESSION["gagne"])==false&& isset($_POST["choixCouleur1"])){
      if ($_SESSION["connect"]==true){
        $_COOKIE["c1"]=$_POST["choixCouleur1"];
        $_COOKIE["c2"]=$_POST["choixCouleur2"];
        $_COOKIE["c3"]=$_POST["choixCouleur3"];
        $_COOKIE["c4"]=$_POST["choixCouleur4"];
        $this->ctrlJeu->enregistrer();
      }
    }

    if(isset($_SESSION["connect"])&&isset($SESSION["gagne"])==true){
      if ($_SESSION["connect"]==true && $_SESSION["gagne"]==true){
        $this->ctrlJeu->gagner();
      }
    }

    if(isset($_SESSION["connect"])&&isset($SESSION["gagne"])==true){
      if ($_SESSION["connect"]==true && $_SESSION["gagne"]==false){
        $this->ctrlJeu->perdu();
      }
    }
  }


}
?>
