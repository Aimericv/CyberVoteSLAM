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
  var_dump($ligne);
  echo $ligne['nom'] . ' ' . $ligne['prenom'] . '<form action="" method="post" name="">
  <input type="hidden" value="' .$ligne['Id_candidat'].'">
  <input type="submit" value="voter">
  </form>'.'<br>';
 
}


 $sql = "INSERT INTO `Resultat` ( `nb_vote`, `id_election`, `id_candidat`, `nom`, `prenom`)
 VALUES( '1', '', '', '', '')
 ";
$resultat = $mysqli->query($sql);



$mysqli->close();
//"INSERT INTO `Vote` (`Id_candidat`,`Id_Electeur`,`id_election`,`vote`) values (1, 666, 1, 1)

// # compte
// select count(*) AS "RESULTAT", id_candidat from Vote where id_election=1 GROUP by Id_candidat;

// # Inserer un nouveau vote
// insert into Vote (Id_candidat,Id_Electeur,id_election, vote) values (1, 666, 1, '');

?>
