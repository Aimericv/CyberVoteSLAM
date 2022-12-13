<?php
include("./assets/includes/head.php");
include("./assets/includes/header.php");
if (!isset($_SESSION['login'])) {
    header ('Location: login.php');
    exit();
}


?>




  <h1>Hello, world!</h1>


<?php
include("./assets/includes/footer.php");
?>

<?php

$mysqli = new mysqli("172.16.196.254", "cybervote", "cybervote", "cybervote");
$mysqli->set_charset("utf8");
$requete = "SELECT * FROM candidat";
$resultat = $mysqli->query($requete);


while ($ligne = $resultat->fetch_assoc()) {

  echo $ligne['nom'] . ' ' . $ligne['prenom'] . '<form action="" method="post" name="">

  <input type="submit" name ="' .$ligne['Id_candidat'].'" value="voter">
  </form>'.'<br>';
 
}

$sql ="UPDATE Resultat SET nb_vote=nb_vote+1 WHERE Id_candidat='1'" ;
$resultat2 = $mysqli->query($sql);



 



$mysqli->close();



?>