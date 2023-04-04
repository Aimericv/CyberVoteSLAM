<?php


//faut changer le systeme d'auth
//au lieu d'ajouter dans la bdd on doit check si les données sont les mêmes que dans la bdd
//rajouter un champs code secret
include("./assets/includes/head.php");
include("./assets/includes/header.php");
include("./assets/includes/config.php");
if (!isset($_SESSION['login'])) {
	header ('Location: login.php');
	exit();
}
?>

  <div class="row d-flex justify-content-center">
    <div class="col-md-6">
    <div class="main-block">
      <h1>Mon dossier d'inscription</h1>
      <form action="/" method="post">

  

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example1" class="form-control"  name="prenom"/>
        <label class="form-label" for="form3Example1">Prénom</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2" class="form-control" name="nom"/>
        <label class="form-label" for="form3Example2">Nom</label>
      </div>
    </div>
  </div>

  <div class="form-outline mb-4">
    <input type="text" id="form3Example3" class="form-control" name="code_postal" require/>
    <label class="form-label" for="form3Example3">Code postal</label>
  </div>

  <div class="form-outline mb-4">
    <input type="date" id="form3Example4" class="form-control" name="date_naissance" />
    <label class="form-label" for="form3Example4">Date de naissance</label>
  </div>

  <div class="form-outline mb-4">
    <input type="text" id="form3Example4" class="form-control" name="code_secret" />
    <label class="form-label" for="form3Example4">Code secret</label>
  </div>



  <button type="submit" class="btn btn-primary btn-block mb-4" method="post" onclick="javascript: form.action='';"><i class="fas fa-check"></i> Valider les informations</button>

 
  <?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if ($conn === false) {
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

$nom = $_POST['nom'];
$nom = mysqli_real_escape_string($conn, stripslashes($nom));

$prenom = $_POST['prenom'];
$prenom = mysqli_real_escape_string($conn, stripslashes($prenom));

$date_naissance = $_POST['date_naissance'];
$date_naissance = mysqli_real_escape_string($conn, stripslashes($date_naissance));

$code_postal = $_POST['code_postal'];
$code_postal = mysqli_real_escape_string($conn, stripslashes($code_postal));



$query = "SELECT `Nom_Electeur` FROM `Electeur` WHERE `Nom_Electeur` = '$nom' AND `Prenom_Electeur` = '$prenom' AND `date_naissance` = '$date_naissance'AND `code_postal` = '$code_postal'";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);
 
if ($rows >= 1) {
  $selected_election_id = $_GET['id_election'];
  $code_secret = mysqli_real_escape_string($conn, stripslashes($_POST['code_secret']));
  $query = "SELECT `CodeSecret` FROM `Asso_10` JOIN `Election` ON `Asso_10`.`id_election` = `Election`.`id_election` WHERE `CodeSecret` = '$code_secret' AND `Asso_10`.`id_election` = $selected_election_id";
  
  $result = mysqli_query($conn, $query);
  $rows = mysqli_num_rows($result);
  if ($rows >= 1) {
    // Si le code secret est correct, on redirige vers la page de résultat
    header("Location: resultat.php?election=$selected_election_id");
    exit();
  } else {
    $message = "Le code secret est incorrect.";
  }
} else {
  $message = "Les informations d'identification sont incorrectes.";
}

?>
         
         </form>
        </div>
      </form>
    </div>




  <?php
include("./assets/includes/footer.php");
?>
