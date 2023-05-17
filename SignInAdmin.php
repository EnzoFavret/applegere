<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('waytobdd.php');
if (isset($_REQUEST['user'], $_REQUEST['pass'])){

  $user = stripslashes($_REQUEST['user']);
  $user = mysqli_real_escape_string($connect, $user); 
  $pass = stripslashes($_REQUEST['pass']);
  $pass = mysqli_real_escape_string($connect, $pass);

    $query = "INSERT into `Users` (login, mdp)
              VALUES ('".hash('sha256', $user)."', '".hash('sha256', $pass)."')";
			 

    $resultat = mysqli_query($connect, $query);
	
    if($resultat){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3> 
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else
	
{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title">GarageLartigue</h1>
    <h1 class="box-title">Inscrire</h1>
  <input type="text" class="box-input" name="user" placeholder="Nom d'utilisateur" required />
    <input type="password" class="box-input" name="pass" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
</form>
<?php } ?>
</body>
</html>