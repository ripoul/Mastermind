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

    if(isset($_SESSION["connect"])){
      if ($_SESSION["connect"]==true){
        $this->ctrlJeu->start();
      }
    }
  }


}
?>
