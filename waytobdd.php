<?php
$servername = "localhost";
//$username = "garage@admin";
//$password = "garageadmin";
$username = "garage@admin";
$password = "garageadmin";
$dbname = "garage_lartigue";

$serverName = "localhost\\sqlexpress"; //serverName\instanceName
$connectionInfo = array( "Database"=>$dbname, "UID"=>$username, "PWD"=>$password);
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    // echo "Connexion établie.<br />";
}else{
     echo "La connexion n'a pu être établie.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>