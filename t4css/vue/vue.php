<?php
class Vue{


  function __construct(){

  }


  function demandePseudo(){
    //header("Content-type: text/html; charset=utf-8");
    ?>


    <html >
    <head>
      <meta charset="UTF-8">
      <title>Mastermind</title>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


          <style>
          /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
          @import url(http://fonts.googleapis.com/css?family=Open+Sans);
    .btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
    .btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
    .btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
    .btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
    .btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
    .btn-primary.active { color: rgba(255, 255, 255, 0.75); }
    .btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
    .btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
    .btn-block { width: 100%; display:block; }

    * { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

    html { width: 100%; height:100%; overflow:hidden; }

    body {
    	width: 100%;
    	height:100%;
    	font-family: 'Open Sans', sans-serif;
    	background: #092756;
    	background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
    	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    	background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    	background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
    	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
    }
    .login {
    	position: absolute;
    	top: 50%;
    	left: 50%;
    	margin: -150px 0 0 -150px;
    	width:300px;
    	height:300px;
    }
    .login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

    input {
    	width: 100%;
    	margin-bottom: 10px;
    	background: rgba(0,0,0,0.3);
    	border: none;
    	outline: none;
    	padding: 10px;
    	font-size: 13px;
    	color: #fff;
    	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
    	border: 1px solid rgba(0,0,0,0.3);
    	border-radius: 4px;
    	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
    	-webkit-transition: box-shadow .5s ease;
    	-moz-transition: box-shadow .5s ease;
    	-o-transition: box-shadow .5s ease;
    	-ms-transition: box-shadow .5s ease;
    	transition: box-shadow .5s ease;
    }
    input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

	#mastermindTitre {
		text-align: center;
	}

        </style>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    </head>

	<header>
		<p id="mastermindTitre"><img src="ressources/img/mastermindTitre.png" alt="Mastermind" /></p>
	</header>
    <body>
      <div class="login">
    	<h1>Connexion</h1>
        <form method="post" action="init.php">
        	<input type="text" name="pseudo" placeholder="Identifiant" required="required" />
            <input type="password" name="mdp" placeholder="Mot de passe" required="required" />
            <button type="submit" name="soumettre" class="btn btn-primary btn-block btn-large">Je veux jouer!</button>
        </form>
    </div>
    </body>
    </html>


  <?php
}

  function gagner(){
    ?>

    <html >
    <head>
      <meta charset="UTF-8">
      <title>Mastermind</title>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


          <style>
          /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
          @import url(http://fonts.googleapis.com/css?family=Open+Sans);
    .btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
    .btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
    .btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
    .btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
    .btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
    .btn-primary.active { color: rgba(255, 255, 255, 0.75); }
    .btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
    .btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
    .btn-block { width: 100%; display:block; }

    * { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

    html { width: 100%; height:100%; overflow:hidden; }

    body {
      width: 100%;
      height:100%;
      font-family: 'Open Sans', sans-serif;
      background: #092756;
      background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
      background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
      background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
      background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
      background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
    }
    .login {
      position: absolute;
      top: 50%;
      left: 50%;
      margin: -150px 0 0 -150px;
      width:300px;
      height:300px;
    }
    .login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

    input {
      width: 100%;
      margin-bottom: 10px;
      background: rgba(0,0,0,0.3);
      border: none;
      outline: none;
      padding: 10px;
      font-size: 13px;
      color: #fff;
      text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
      border: 1px solid rgba(0,0,0,0.3);
      border-radius: 4px;
      box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
      -webkit-transition: box-shadow .5s ease;
      -moz-transition: box-shadow .5s ease;
      -o-transition: box-shadow .5s ease;
      -ms-transition: box-shadow .5s ease;
      transition: box-shadow .5s ease;
    }
    input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

        </style>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    </head>

    <body>
      <div class="login">
      <h1>  GAGN&Eacute;</h1>
      <h3>gagne en <?php echo $_SESSION["nb_cout"]; ?> coup(s)</h3>
        <form method="post" action="init.php">
            <button type="submit" name="ch_ut" class="btn btn-primary btn-block btn-large">Changer d'utilisateur</button>
            <button type="submit" name="recomencer" class="btn btn-primary btn-block btn-large">Recommencer partie</button>
    </div>
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
                              <td style="border: 1px solid black" width="25" height="25"></td>
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
                              <td style="border: 1px solid black" width="25" height="25"></td>
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
            <html >
            <head>
              <meta charset="UTF-8">
              <title>Mastermind</title>

              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


                  <style>
                  /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
                  @import url(http://fonts.googleapis.com/css?family=Open+Sans);
            .btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
            .btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
            .btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
            .btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
            .btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
            .btn-primary.active { color: rgba(255, 255, 255, 0.75); }
            .btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
            .btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
            .btn-block { width: 100%; display:block; }

            * { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

            html { width: 100%; height:100%; overflow:hidden; }

            body {
            	width: 100%;
            	height:100%;
            	font-family: 'Open Sans', sans-serif;
            	background: #092756;
            	background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
            	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
            	background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
            	background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
            	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
            	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
            }
            .login {
            	position: absolute;
            	top: 50%;
            	left: 50%;
            	margin: -150px 0 0 -150px;
            	width:300px;
            	height:300px;
            }
            .login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

            input {
            	width: 100%;
            	margin-bottom: 10px;
            	background: rgba(0,0,0,0.3);
            	border: none;
            	outline: none;
            	padding: 10px;
            	font-size: 13px;
            	color: #fff;
            	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
            	border: 1px solid rgba(0,0,0,0.3);
            	border-radius: 4px;
            	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
            	-webkit-transition: box-shadow .5s ease;
            	-moz-transition: box-shadow .5s ease;
            	-o-transition: box-shadow .5s ease;
            	-ms-transition: box-shadow .5s ease;
            	transition: box-shadow .5s ease;
            }
            input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

                </style>

              <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

            </head>

            <body>
              <div class="login">
            	<h1>Identifiants incorects</h1>
                <form method="post" action="init.php">
                    <button type="submit" name="ch_ut" class="btn btn-primary btn-block btn-large">Menu principal</button>
                </form>
            </div>

            </body>
            </html>

              <?php
            }

            function premiere_demande(){
              ?>

              <html >
              <head>
                <meta charset="UTF-8">
                <title>Mastermind</title>

                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


                    <style>
                    /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
                    @import url(http://fonts.googleapis.com/css?family=Open+Sans);
              .btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
              .btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
              .btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
              .btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
              .btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
              .btn-primary.active { color: rgba(255, 255, 255, 0.75); }
              .btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
              .btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
              .btn-block { width: 100%; display:block; }

              * { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

              html { width: 100%; height:100%; overflow:hidden; }

              body {
              	width: 100%;
              	height:100%;
              	font-family: 'Open Sans', sans-serif;
              	background: #092756;
              	background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
              	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
              	background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
              	background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
              	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
              	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
              }
              .login {
              	position: absolute;
              	left: 50%;
              	margin: 0 0 0 -250px;
              	width:500px;
              	height:300px;
              }
              .login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

              input {
              	width: 100%;
              	margin-bottom: 10px;
              	background: rgba(0,0,0,0.3);
              	border: none;
              	outline: none;
              	padding: 10px;
              	font-size: 13px;
              	color: #fff;
              	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
              	border: 1px solid rgba(0,0,0,0.3);
              	border-radius: 4px;
              	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
              	-webkit-transition: box-shadow .5s ease;
              	-moz-transition: box-shadow .5s ease;
              	-o-transition: box-shadow .5s ease;
              	-ms-transition: box-shadow .5s ease;
              	transition: box-shadow .5s ease;
              }
              input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }



              div.bouton-aligne{
	                display:inline-block;
	                width:30%;
	                margin:5px 1% 5px 1%;
	                text-align:center;
              }

              div.bouton-try{
                width:96%;
                margin:5px 1% 5px 1%;
              }

              div.petitselect{
	                display:inline-block;
	                width:22%;
	                margin:5px 1% 5px 1%;
	                text-align:center;
              }

                  </style>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

              </head>

              <body>
                <div class="login">
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
                                      <td style="border: 1px solid black" width="25" height="25"></td>
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
                                      <td style="border: 1px solid black" width="25" height="25"></td>
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
                      }
                      ?>

                      <center> Nombre de coups restant : <?php if(isset($_SESSION["nb_cout"])){echo 10-$_SESSION["nb_cout"];} else{echo(10);} ?> coup(s). </center><br/><br/>
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

                <form method="post" action="init.php">
                  <div class="bouton-aligne">
                  <button type="submit" name="recommencer" class="btn btn-primary btn-block btn-large">recommencer partie</button>
                  </div>
                  <div class="bouton-aligne">
                  <button type="submit" name="ch_ut" class="btn btn-primary btn-block btn-large">changer utilisateur</button>
                  </div>
                  <div class="bouton-aligne">
                  <button type="submit" name="histo" class="btn btn-primary btn-block btn-large">afficher meilleur partie</button>
                  </div>
                </form>

              </div>
              </body>
              </html>

            <?php
          }

          function histoPartie($histo){
            ?>


            <html>
            <head>
              <meta charset="UTF-8">
              <title>Mastermind</title>

              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


                  <style>
                  /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
                  @import url(http://fonts.googleapis.com/css?family=Open+Sans);
            .btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
            .btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
            .btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
            .btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
            .btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
            .btn-primary.active { color: rgba(255, 255, 255, 0.75); }
            .btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
            .btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
            .btn-block { width: 100%; display:block; }

            * { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

            html { width: 100%; height:100%; overflow:hidden; }

            body {
              width: 100%;
              height:100%;
              font-family: 'Open Sans', sans-serif;
              background: #092756;
              background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
              background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
              background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
              background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
              background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
              filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
            }
            .login {
              position: absolute;
              left: 50%;
              margin: 0 0 0 -150px;
              width:300px;
              height:300px;
            }
            .login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

            input {
              width: 100%;
              margin-bottom: 10px;
              background: rgba(0,0,0,0.3);
              border: none;
              outline: none;
              padding: 10px;
              font-size: 13px;
              color: #fff;
              text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
              border: 1px solid rgba(0,0,0,0.3);
              border-radius: 4px;
              box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
              -webkit-transition: box-shadow .5s ease;
              -moz-transition: box-shadow .5s ease;
              -o-transition: box-shadow .5s ease;
              -ms-transition: box-shadow .5s ease;
              transition: box-shadow .5s ease;
            }
            input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

                </style>

              <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

            </head>

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
                <form method="post" action="init.php">
                    <button type="submit" name="cont" class="btn btn-primary btn-block btn-large">retour</button>
                </form>
            </div>

            </body>
            </html>
            <?
            }
          }
          ?>
