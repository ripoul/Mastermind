<?php
class Vue{


  function __construct(){

  }


  function demandePseudo(){
    //header("Content-type: text/html; charset=utf-8");
    ?>
    <html>
    <body>
      <br/>
      <br/>
      <form method="post" action="init.php">
        Entrer votre pseudo  <input type="text" name="pseudo"/>
      </br>
      Entrer votre mot de passe  <input type="password" name="mdp"/>
    </br>
    <input type="submit" name="soumettre" value="envoyer"/>
  </form>
  <br/>
  <br/>
  <?php
}

function pseudook(){
  ?>
  <html>
  <body>
    <br/>
    <br/>
    pseudo ok
    <br/>
    <br/>

    <?php
  }

  function gagner(){
    ?>
    <html>
    <body>
      <br/>
      <br/>
      <center>
        <h3>gagne en <?php echo $_SESSION["nb_cout"]; ?> cout(s)</h3>
        <br/>
        <br/>
        <form method="post" action="init.php">
          <input type="submit" name="recomencer" value="recomencer"/>
          <input type="submit" name="ch_ut" value="changer utilisateur"/>
        </form>
      </center>
      <br/>
      <br/>

      <?php
    }


    function perdu(){
      ?>
      <html>
      <body>
        <br/>
        <br/>
        <center>
          <h1>perdu</h1>
          <br/>
          La reponse était :
          <table>
            <?php
            for ($j=0; $j < 4; $j++) {
              ?>
              <td style="border: 1px solid black" width="50" height="50" bgcolor="<?php echo $_SESSION["soluce"][$j]?>">
                <?php
              }
              ?>
            </table>

          </br>

          <?php
          if (isset($_SESSION["cout"])) {
            ?>
            <table style="border: 1px solid black">
              <?php
              for ($i=1; $i < $_SESSION["nb_cout"]+1; $i++) {
                ?>
                <tr>
                  <?php
                  for ($j=0; $j < 4; $j++) {
                    ?>
                    <td style="border: 1px solid black" width="50" height="50" bgcolor="<?php echo $_SESSION["cout"][$i][$j]?>">
                      <?php
                      echo $_SESSION["cout"][$i][$j]." ";
                    }
                    ?></td>
                    <td>
                      <table>
                        <tr>
                          <?php
                          $blanc = $_SESSION["cout"][$i]["bblanc"];
                          $rouge = $_SESSION["cout"][$i]["brouge"];
                          $cptG=0;
                          for ($a=0; $a < 2; $a++) {
                            if($blanc!=0) {
                              ?>
                              <td style="border: 1px solid black" width="25" height="25" bgcolor="grey"></td>
                              <?php
                              $blanc--;
                              $cptG++;
                            } else {
                              if($rouge!=0) {
                                ?>
                                <td style="border: 1px solid black" width="25" height="25" bgcolor="red"></td>
                                <?php
                                $rouge--;
                                $cptG++;
                              }
                            }
                          }

                          while($cptG<2){
                            ?>
                            <td style="border: 1px solid black" width="25" height="25"></td>
                            <?php
                            $cptG++;
                          }

                          ?>
                        </tr>
                        <tr>
                          <?php
                          for ($a=0; $a < 2; $a++) {
                            if($blanc!=0) {
                              ?>
                              <td style="border: 1px solid black" width="25" height="25" bgcolor="grey"></td>
                              <?php
                              $blanc--;
                              $cptG++;
                            } else {
                              if($rouge!=0) {
                                ?>
                                <td style="border: 1px solid black" width="25" height="25" bgcolor="red"></td>
                                <?php
                                $rouge--;
                                $cptG++;
                              }
                            }
                          }

                          while($cptG<4){
                            ?>
                            <td style="border: 1px solid black" width="25" height="25"></td>
                            <?php
                            $cptG++;
                          }

                          ?>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>

              <form method="post" action="init.php">
                <input type="submit" name="recomencer" value="recomencer"/>
                <input type="submit" name="ch_ut" value="changer utilisateur"/>
              </form>
            </center>
            <br/>

            <?php
          }



          function pseudonok(){
            ?>
            <html>
            <body>
              <br/>
              <br/>
              pseudo ou mdp incorect

              <form method="post" action="init.php">
                <input type="submit" name="ch_ut" value=" menue principal"/>
              </form>


              <br/>
              <br/>

              <?php
            }

            function premiere_demande(){
              ?>
              <center>
                <?php
                if (isset($_SESSION["cout"])) {
                  ?>
                  <table style="border: 1px solid black">
                    <?php
                    for ($i=1; $i < $_SESSION["nb_cout"]+1; $i++) {
                      ?>
                      <tr>
                        <?php
                        for ($j=0; $j < 4; $j++) {
                          ?>
                          <td style="border: 1px solid black" width="50" height="50" bgcolor="<?php echo $_SESSION["cout"][$i][$j]?>">
                            <?php
                            echo $_SESSION["cout"][$i][$j]." ";
                          }
                          ?></td>
                          <td>
                            <table>
                              <tr>
                                <?php
                                $blanc = $_SESSION["cout"][$i]["bblanc"];
                                $rouge = $_SESSION["cout"][$i]["brouge"];
                                $cptG=0;
                                for ($a=0; $a < 2; $a++) {
                                  if($blanc!=0) {
                                    ?>
                                    <td style="border: 1px solid black" width="25" height="25" bgcolor="grey"></td>
                                    <?php
                                    $blanc--;
                                    $cptG++;
                                  } else {
                                    if($rouge!=0) {
                                      ?>
                                      <td style="border: 1px solid black" width="25" height="25" bgcolor="red"></td>
                                      <?php
                                      $rouge--;
                                      $cptG++;
                                    }
                                  }
                                }

                                while($cptG<2){
                                  ?>
                                  <td style="border: 1px solid black" width="25" height="25"></td>
                                  <?php
                                  $cptG++;
                                }

                                ?>
                              </tr>
                              <tr>
                                <?php
                                for ($a=0; $a < 2; $a++) {
                                  if($blanc!=0) {
                                    ?>
                                    <td style="border: 1px solid black" width="25" height="25" bgcolor="grey"></td>
                                    <?php
                                    $blanc--;
                                    $cptG++;
                                  } else {
                                    if($rouge!=0) {
                                      ?>
                                      <td style="border: 1px solid black" width="25" height="25" bgcolor="red"></td>
                                      <?php
                                      $rouge--;
                                      $cptG++;
                                    }
                                  }
                                }

                                while($cptG<4){
                                  ?>
                                  <td style="border: 1px solid black" width="25" height="25"></td>
                                  <?php
                                  $cptG++;
                                }

                                ?>
                              </tr>
                            </table>
                          </td>
                        </tr>
                        <?php
                      }
                    }
                    ?>
                    <form method="post" action="init.php">
                      <?php
                      //si on veux l'affichage de la solution
                      /*if(isset($_SESSION["soluce"])){
                      for ($i=0; $i < 4; $i++) {
                      echo($_SESSION["soluce"][$i]." ");
                    }
                  }*/

                  for($k=1; $k<=4; $k++)
                  {
                    ?>
                    <select name="<?php echo "choixCouleur".$k; ?>">
                      <option value="red" style="background-color: red">rouge</option>
                      <option value="yellow" style="background-color: yellow">jaune</option>
                      <option value="green" style="background-color: green">vert</option>
                      <option value="blue" style="background-color: blue">bleu</option>
                      <option value="orange" style="background-color: orange">orange</option>
                      <option value="white" style="background-color: white">blanc</option>
                      <option value="purple" style="background-color: purple">violet</option>
                      <option value="fuchsia" style="background-color: fuchsia">fushia</option>
                    </select>
                    <?php
                  }
                  ?>

                </p>
                <p><input type="submit" value="Essayer cette combinaison"></p>
                <input type="submit" name="recomencer" value="recomencer partie"/>
                <input type="submit" name="ch_ut" value="changer utilisateur"/>
              </form>
            </center>
            <?php
          }
        }
        ?>
