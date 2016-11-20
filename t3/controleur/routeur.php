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
        unset($_COOKIE["pseudo"]);
        unset($_COOKIE["mdp"]);
        unset($_POST["pseudo"]);
        unset($_POST["mdp"]);
      }
    }

    //si pas de combinaison essayer
    if(isset($_SESSION["connect"])&&isset($SESSION["gagne"])==false&& isset($_POST["choixCouleur1"])==false){
      if ($_SESSION["connect"]==true){
        //echo "test4";
        $this->ctrlJeu->start();
        //echo "test5";
      }
    }

    //si une combinaison essayer
    if(isset($_SESSION["connect"])&&isset($_SESSION["gagne"])==false&& isset($_POST["choixCouleur1"])){
      if ($_SESSION["connect"]==true){
        //echo "test1";
        $_COOKIE["c1"]=$_POST["choixCouleur1"];
        $_COOKIE["c2"]=$_POST["choixCouleur2"];
        $_COOKIE["c3"]=$_POST["choixCouleur3"];
        $_COOKIE["c4"]=$_POST["choixCouleur4"];
        unset($_POST["choixCouleur1"]);
        unset($_POST["choixCouleur2"]);
        unset($_POST["choixCouleur3"]);
        unset($_POST["choixCouleur4"]);
        //echo var_dump($_POST);
        //echo var_dump($_COOKIE);
        //echo var_dump($_SESSION);
        //echo "test2";
        $this->ctrlJeu->enregistrer();
        //echo var_dump($_SESSION);
        //echo "test3";
      }
    }

    if(isset($_SESSION["connect"])&&isset($_SESSION["gagne"])==true){
      if ($_SESSION["connect"]==true && $_SESSION["gagne"]==true){
        $this->ctrlJeu->gagner();
      }
    }

    if(isset($_SESSION["connect"])&&isset($_SESSION["gagne"])==true){
      if ($_SESSION["connect"]==true && $_SESSION["gagne"]==false){
        $this->ctrlJeu->perdu();
      }
    }
  }


}
?>
