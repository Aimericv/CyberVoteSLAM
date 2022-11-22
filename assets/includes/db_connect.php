<?php
include 'config.php';

try
{
        $bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>