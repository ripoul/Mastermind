<?php
class Vue{

function demandePseudo(){
header("Content-type: text/html; charset=utf-8");
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

function pseudonok(){
  ?>
  <html>
  <body>
  <br/>
  <br/>
  pseudo nok

  <form method="post" action="init.php">
  <input type="submit" name="soumettre" value="menue principal"/>
  </form>


  <br/>
  <br/>

  <?php
 }

 function msg($tab){
   ?>
   <html>
   <body>
   <h2>Commentaire</h2>
  <form method="post" action="init.php">
   <textarea name="commentaire" rows="4" cols="50">
   </textarea>
   <input type="submit" name="soumettre" value="envoyer"/>
   </form>

   <h2>Historique Commentaire<h2>
    <?php
    for ($i=0; $i < count($tab); $i++) {
      print($tab[$i]['pseudo'].":".$tab[$i]['message']);
      ?><br>
      <?php
    }


    ?>
   <br/>
   <br/>

   <?php
 }

 function message2($tab){
   ?>
   <html>
   <body>
   <h2>Commentaire</h2>
  <form method="post" action="init.php">
   <textarea name="commentaire" rows="4" cols="50">
   </textarea>
   <input type="submit" name="soumettre" value="envoyer"/>
   </form>

   <h2>Historique Commentaire<h2>
    <?php
    for ($i=0; $i < count($tab); $i++) {
      print($tab[$i]['pseudo'].":".$tab[$i]['message']);
      ?><br>
      <?php
    }


    ?>
   <br/>
   <br/>

   <?php
 }
}
?>
