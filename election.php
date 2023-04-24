<?php

include("./assets/includes/head.php");
include("./assets/includes/header.php");
include("./assets/includes/config.php");
if (!isset($_SESSION['login'])) {
  header ('Location: login.php');
  exit();
}

$mysqli = new mysqli("localhost", "root", "root", "cybervotenew2");
$mysqli->set_charset("utf8");
$requete = "SELECT * FROM Election";
$resultat = $mysqli->query($requete);

while ($ligne = $resultat->fetch_assoc()) {

  echo $ligne['nom_election'] . ' ' . $ligne['date_election'] . '<form action="vote.php?id_election=' . $ligne['id_election'].'" method="post" name="">


   
  
    <input type="submit" name ="' .$ligne['Id_candidat'].'" value="voter">
    </form>'.'<br>';

    
   
  }




  

 

?>