<?php
/*
*Classe contenant le html de toutes les vus
*@version 1.0
* @since 03/12/2016
* @author LE BRIS Jules & DROUARD Antoine
*/
class Vue{

  /**
  *constructeur de la classe Vue
  */
  function __construct(){

  }

  /**
  *fontion qui affiche la demande de pseudo
  */
  function demandePseudo(){
    //header("Content-type: text/html; charset=utf-8");
    ?>
    <header>
      <p id="mastermindTitre"><img src="ressources/img/mastermindTitre.png" alt="Mastermind" /></p>
    </header>
    <body>
      <div class="login">
        <h1>Connexion</h1>
        <form method="post" action="index.php">
          <input type="text" name="pseudo" placeholder="Identifiant" required="required" />
          <input type="password" name="mdp" placeholder="Mot de passe" required="required" />
          <button type="submit" name="soumettre" class="btn btn-primary btn-block btn-large">Je veux jouer!</button>
        </form>
      </div>
    </body>
    </html>


    <?php
  }

  /**
  *fontion qui affiche la page de victoire
  */
  function gagner(){
    ?>
    <body>
      <div class="login">
        <h1>  GAGN&Eacute;</h1>
        <h3>gagne en <?php echo $_SESSION["nb_cout"]; ?> coup(s)</h3>
        <form method="post" action="index.php">
          <button type="submit" name="ch_ut" class="btn btn-primary btn-block btn-large">Changer d'utilisateur</button>
          <button type="submit" name="recomencer" class="btn btn-primary btn-block btn-large">Recommencer partie</button>
        </div>
        <?php
      }

      /**
      *fontion qui affiche la page de defaite
      */
      function perdu(){
        ?>
        <body>
          <div class="login">
            <h1> Perdu !</h1><br/><br/>
            <form method="post" action="index.php">
              <div class="bouton-aligne">
                <button type="submit" name="recomencer" class="btn btn-primary btn-block btn-large">recommencer partie</button>
              </div>
              <div class="bouton-aligne">
                <button type="submit" name="ch_ut" class="btn btn-primary btn-block btn-large">changer utilisateur</button>
              </div>
            </form>

            <h4>La reponse était :</h4>
            <div class="tableau">
              <table bgcolor="LightGrey">
                <?php
                for ($j=0; $j < 4; $j++) {
                  ?>
                  <td style="border: 1px solid black" width="50" height="50" bgcolor="<?php echo $_SESSION["soluce"][$j]?>">
                    <?php
                  }
                  ?>
                </table>
              </div>

              <?php
              if (isset($_SESSION["cout"])) {
                ?>
                <div class="tableau">
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
                          ?>
                        </td>
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
                                  <td style="border: 1px solid black" width="25" height="25" bgcolor="White"></td>
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
                                <td style="border: 1px solid black" width="25" height="25" bgcolor="grey"></td>
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
                                  <td style="border: 1px solid black" width="25" height="25" bgcolor="White"></td>
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
                                <td style="border: 1px solid black" width="25" height="25" bgcolor="grey"></td>
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
                    ?>
                  </table>
                </div>
                <?php
              }
              ?>
            </div>


          </body>
          </html>

          <?php
        }


        /**
        *fontion qui affiche un message mot de passe incorecte
        */
        function pseudonok(){
          ?>
          <body>
            <div class="login">
              <h1>Identifiants incorects</h1>
              <form method="post" action="index.php">
                <button type="submit" name="ch_ut" class="btn btn-primary btn-block btn-large">Menu principal</button>
              </form>
            </div>

          </body>
          </html>

          <?php
        }

        /**
        *fontion qui affiche les precedentes proposition de l'utilisateur et propose differente option
        */
        function premiere_demande(){
          ?>
          <body>
            <div class="login">
              <h4> Nombre de coups restant : <?php if(isset($_SESSION["nb_cout"])){echo 10-$_SESSION["nb_cout"];} else{echo(10);} ?> coup(s). </h4><br/><br/>
              <?php
              //si on veux l'affichage de la solution
              /*if(isset($_SESSION["soluce"])){
              for ($i=0; $i < 4; $i++) {
              echo($_SESSION["soluce"][$i]." ");
            }
          }*/
          ?>
          <form method="post" action="index.php">
            <?php
            for($k=1; $k<=4; $k++)
            {
              ?>
              <div class="petitselect">
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
              </div>
              <?php
            }
            ?>
          </p>
          <p>
            <div class="bouton-try">
              <button type="submit" name="soumettre" class="btn btn-primary btn-block btn-large">Essayer cette combinaison</button>
            </div>
          </form>

          <form method="post" action="index.php">
            <div class="bouton-aligne">
              <button type="submit" name="recomencer" class="btn btn-primary btn-block btn-large">recommencer partie</button>
            </div>
            <div class="bouton-aligne">
              <button type="submit" name="ch_ut" class="btn btn-primary btn-block btn-large">changer utilisateur</button>
            </div>
            <div class="bouton-aligne">
              <button type="submit" name="histo" class="btn btn-primary btn-block btn-large">afficher meilleur partie</button>
            </div>
          </form>

          <?php
          if (isset($_SESSION["cout"])) {
            ?>
            <div class="tableau">
              <table style="border: 1px solid black"  bgcolor="LightGrey">
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
                                <td style="border: 1px solid black" width="25" height="25" bgcolor="White"></td>
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
                              <td style="border: 1px solid black" width="25" height="25" bgcolor="grey"></td>
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
                                <td style="border: 1px solid black" width="25" height="25" bgcolor="White"></td>
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
                              <td style="border: 1px solid black" width="25" height="25" bgcolor="grey"></td>
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
                  ?>
                </table>
              </div>
              <?php
            }
            ?>
          </div>


        </body>
        </html>

        <?php
      }

      /**
      *fontion qui affiche les 5 meilleurs partie
      *@param array $histo le tableau contenant les 5 meilleurs parties et leurs resultats
      */
      function histoPartie($histo){
        ?>
        <body>
          <div class="login">
            <h1>Meilleur partie enregistrer</h1>
            utilisateur->gagner?->nombre de coups </br>
            <?php
            for ($i=0; $i < count($histo[1]); $i++) {
              print($histo["1"][$i]['pseudo']."->".$histo["1"][$i]['partieGagnee']."->".$histo["1"][$i]['nombreCoups']);
              ?><br>
              <?php
            }
            $nbjouer=$histo[2][0]["COUNT(*)"];
            $nbgagner =$histo[3][0]["COUNT(*)"];
            $ratio= $nbgagner/$nbjouer*100;

            ?>
            <br/>
            <br/>
            <h1>Historique partie</h1>
            <br/>

            Vous avez un ratio de <?php echo(round($ratio,2));?>% de victoire.

            <br/>
            <br/>
            <form method="post" action="index.php">
              <button type="submit" name="cont" class="btn btn-primary btn-block btn-large">retour</button>
            </form>
          </div>

        </body>
        </html>
        <?php
      }
    }
    ?>
