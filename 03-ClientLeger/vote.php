<?php
include("./assets/includes/head.php");
include("./assets/includes/header.php");
if (!isset($_SESSION['login'])) {
    header ('Location: login.php');
    exit();
}




?>







<?php
echo"<br>";

$mysqli = new mysqli("172.16.196.254", "cybervote", "cybervote", "cybervote");
$mysqli->set_charset("utf8");
$requete = "SELECT * FROM candidat";
$resultat = $mysqli->query($requete);


while ($ligne = $resultat->fetch_assoc()) {

  echo $ligne['nom'] . ' ' . $ligne['prenom'] . '<form action="" method="post" name="">

  <input type="submit" name ="' .$ligne['Id_candidat'].'" value="voter">
  </form>'.'<br>';
 
}


$requete3 = "SELECT * FROM candidat";
$resultat3 = $mysqli->query($requete);
$x=0;
while ($ligne = $resultat3->fetch_assoc()){
  $x=$x+1;

  if (isset($_POST[''.$x.'']))
      {
        $sql ="UPDATE Resultat SET nb_vote=nb_vote+1 WHERE Id_candidat='$x'" ;
        $resultat2 = $mysqli->query($sql);
        header("Location: dossier.php");
      }

}






 



$mysqli->close();



?>

<?php
include("./assets/includes/footer.php");
?>