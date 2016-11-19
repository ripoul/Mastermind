<?php
class Vue{


function __construct(){

}


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
  pseudo ou mdp incorect

  <form method="post" action="init.php">
  <input type="submit" name="soumettre" value="menue principal"/>
  </form>


  <br/>
  <br/>

  <?php
 }

function premiere_demande(){
  ?>
  <form method="post" action="init.php">
  <?php
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
  </p>
  <p><input type="submit" value="Essayer cette combinaison"></p>
  <input type="hidden" name="tryComb" value=" ">
  </form>
  <?php
}

function suivante(){
  ?>
  <form method="post" action="init.php">
  <?php
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
    <table>
      <tr>
       <td><?php echo $_COOKIE["c1"] ?></td>
       <td><?php echo $_COOKIE["c2"] ?></td>
       <td><?php echo $_COOKIE["c3"] ?></td>
       <td><?php echo $_COOKIE["c4"] ?></td>
      </tr>
      <tr>
       <td><?php  ?></td>
       <td><?php  ?></td>
       <td><?php  ?></td>
       <td><?php  ?></td>
      </tr>
    </table>

  </p>
  <p><input type="submit" value="Essayer cette combinaison"></p>
  <input type="hidden" name="tryComb" value=" ">
  </form>
  <?php
}

}
?>
