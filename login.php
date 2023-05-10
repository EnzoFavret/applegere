<?php
require('waytobdd.php');
session_start();

if(isset($_POST['submit'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM Users WHERE login = ? AND mdp = ?";
    $params = array($username, $password);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if($row){
        $_SESSION['username'] = $row['login'];
        $_SESSION['id'] = $row['id'];
        header("Location: Adminpage.php");
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

    sqlsrv_free_stmt($stmt);
}

?>

<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <Title>Connexion</Title>
    </head>
    <body>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title msg"></h1>
<h1 class="box-title msg">Connexion</h1>
<input type="text" class="box-input msg" name="user" placeholder="Nom d'utilisateur">
<input type="password" class="box-input msg" name="pass" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button msg">
</form>

</body>
</html>