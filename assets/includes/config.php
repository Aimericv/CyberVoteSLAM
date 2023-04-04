<?php
// define('DB_SERVER', '172.16.196.254');
// define('DB_USERNAME', 'cybervote');
// define('DB_PASSWORD', 'cybervote');
// define('DB_NAME', 'cybervote');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'cybervotenew2');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>
