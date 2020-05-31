<?php
// used to connect to the database
$db_host = "localhost";
$db_name = "login";
$db_user = "root";
$db_pass = "root";
  
try {
    $con = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
}
  
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>