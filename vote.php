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

$servername = DB_SERVER;
          $username = DB_USERNAME;
          $password = DB_PASSWORD;
          $dbname = DB_NAME;


//$mysqli = new mysqli("172.16.196.254", "cybervote", "cybervote", "cybervote");
$mysqli = new mysqli("localhost", "root", "root", "cybervotev2");
$mysqli->set_charset("utf8");
$requete = "SELECT * FROM Candidat";
$resultat = $mysqli->query($requete);


$requete3 = "SELECT * FROM Candidat";
$resultat3 = $mysqli->query($requete);
$x=0;
while ($ligne = $resultat3->fetch_assoc()){
  $x=$x+1;

  if (isset($_POST[''.$x.'']))
      {
        $sql ="UPDATE Se_Presentent SET NbVoix=NbVoix+1 WHERE Id_Candidat='$x'" ;
        $resultat2 = $mysqli->query($sql);
        header("Location: dossier.php");
      }

}

$mysqli->close();



?>


<center>
<h3>Liste des candidats :</h3>
<br>
<table>
    <tbody>
        <tr>

    <?php while ($ligne = $resultat->fetch_assoc()) {

echo '<td><i class="fa-solid fa-user"></i> ' . $ligne['Nom_Candidat'] . '' . ' ' . $ligne['Prenom_Candidat'] . '&emsp;' . '' . 
'<form action="" method="post" name="">
<br>
&emsp;&emsp;<input type="submit" name ="' .$ligne['Id_Candidat'].'" class="btn btn-primary" value="voter">
</form></td>' ;

}?>
        </tr>
    </tbody>
</table>
</center>

<?php
include("./assets/includes/footer.php");
?>