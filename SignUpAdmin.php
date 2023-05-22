<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('waytobdd.php');
if (isset($_REQUEST['user'], $_REQUEST['pass'])){

  $user = $_REQUEST['user'];
  $pass = $_REQUEST['pass'];

  $query = "INSERT INTO Users (id, login, mdp) VALUES (?, ?, ?)";
  
  $params = array(3, hash('sha256', $user), hash('sha256', $pass));
  $result = sqlsrv_query($conn, $query, $params);

  if($result){
     echo "<div class='success'>
           <h3>Vous êtes inscrit avec succès.</h3> 
           <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
     </div>";
  } else {
    $errors = sqlsrv_errors();
    foreach ($errors as $error) {
      echo "Erreur SQL : " . $error['message'] . "<br/>";
    }
  }
} else {
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title">GarageLartigue</h1>
  <h1 class="box-title">Inscription</h1>
  <input type="text" class="box-input" name="user" placeholder="Nom d'utilisateur" required />
  <input type="password" class="box-input" name="pass" placeholder="Mot de passe" required />
  <input type="submit" name="submit" value="S'inscrire" class="box-button" />
</form>
<?php } ?>
</body>
</html>
