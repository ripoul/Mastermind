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
      gagne
      <form method="post" action="init.php">
        <input type="submit" name="recomencer" value="recomencer"/>
        <input type="submit" name="ch_ut" value="changer utilisateur"/>
      </form>

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
          perdu
          <br/>
          <form method="post" action="init.php">
            <input type="submit" name="recomencer" value="recomencer"/>
            <input type="submit" name="ch_ut" value="changer utilisateur"/>
          </form>
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
            if (isset($_SESSION["cout"])) {
	  				?>	
							<center>						
							<table style="border: 1px solid black">
            <?php
							for ($i=1; $i < $_SESSION["nb_cout"]+1; $i++) {
								?>
								<tr>
								<?php                
								for ($j=0; $j < 4; $j++) {
									?>
									<td style="border: 1px solid black" width="50" height="50">
								<?php
                  echo $_SESSION["cout"][$i][$j]." ";
                }
								?></td>
									<td>
										<table>
											<tr>
												<td style="border: 1px solid black" width="25" height="25"></td>
												<td style="border: 1px solid black" width="25" height="25"></td>
											</tr>
											<tr>
												<td style="border: 1px solid black" width="25" height="25"></td>
												<td style="border: 1px solid black" width="25" height="25"></td>
											</tr>
										</table>
									</td>
								</tr>
								<?php
                echo $_SESSION["cout"][$i]["brouge"]." ".$_SESSION["cout"][$i]["bnoire"]."<br/>";
              }
            }
            ?>
            <form method="post" action="init.php">
              <?php

              for ($i=0; $i < 4; $i++) {
                echo($_SESSION["soluce"][$i]." ");
              }

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
						</center>
          </p>
          <p><input type="submit" value="Essayer cette combinaison"></p>
          <input type="hidden" name="tryComb" value=" ">
        </form>
        <?php
      }
    }
    ?>
