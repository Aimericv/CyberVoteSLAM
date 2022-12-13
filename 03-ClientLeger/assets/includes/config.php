<?php
define('DB_SERVER', '172.16.196.254');
define('DB_USERNAME', 'cybervote');
define('DB_PASSWORD', 'cybervote');
define('DB_NAME', 'cybervote');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>
