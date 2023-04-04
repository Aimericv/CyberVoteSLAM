<?php
include("./assets/includes/head.php");
include("./assets/includes/header.php");
if (!isset($_SESSION['login'])) {
    header ('Location: login.php');
    exit();
}

?>

<?php
echo "<br>";

$servername = DB_SERVER;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_NAME;

//$mysqli = new mysqli("172.16.196.254", "cybervote", "cybervote", "cybervote");
$mysqli = new mysqli("localhost", "root", "root", "cybervotenew2");
$mysqli->set_charset("utf8");
$id_election = $_GET['id_election'];

// Check if vote blanc is enabled for this election
$result = $mysqli->query("SELECT VoteBlanc FROM Election WHERE id_election = $id_election");
$row = $result->fetch_assoc();
$vote_blanc_enabled = $row['VoteBlanc'];

$requete = "SELECT *
FROM Candidat c
INNER JOIN Se_Presentent sp ON c.Id_Candidat = sp.Id_Candidat
WHERE sp.id_election = $id_election;";
$resultat = $mysqli->query($requete);

$requete3 = "SELECT * FROM Candidat ";
$resultat3 = $mysqli->query($requete3);

while ($ligne = $resultat3->fetch_assoc()) {
    $x = $ligne['Id_Candidat'];
    if (isset($_POST["$x"])) {
        $sql = "UPDATE Se_Presentent SET NbVoix = NbVoix + 1 WHERE Id_Candidat = '$x'";
        $resultat2 = $mysqli->query($sql);
        header("Location: dossier.php");
    }
}


    if (isset($_POST['vote-blanc'])) {
        $sql = "UPDATE Election SET VoteBlanc = VoteBlanc + 1 WHERE id_election = $id_election";
        $resultat2 = $mysqli->query($sql);
        header("Location: dossier.php");
    }


$mysqli->close();
?>

<div class="container">
    <center>
        <h3>Liste des candidats :</h3>
        <br>
        <table>
            <tbody>
                <tr>
                    <?php while ($ligne = $resultat->fetch_assoc()) : ?>
                        <td>
                            <i class="fa-solid fa-user"></i> <?= $ligne['Nom_Candidat'] . ' ' . $ligne['Prenom_Candidat'] ?>&emsp;
                            <form action="" method="post" name="">
                                <br>&emsp;&emsp;
                                <input type="submit" name="<?= $ligne['Id_Candidat'] ?>" class="btn btn-primary" value="voter">
                            </form>
                        </td>
                    <?php endwhile; ?>
              
              
                
                    <td>
                        <i class="fa-solid fa-user"></i> Vote blanc&emsp;
                        <form action="" method="post" name="">
                            <br>&emsp;&emsp;
                            <input type="submit" name="vote-blanc" class="btn btn-primary" value="voter">
                        </form>
                    </td>
                    </tr>
              
            </tbody>
        </table>
    </center>
</div>

<?php include("./assets/includes/footer.php"); ?>
