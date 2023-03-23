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



  <button type="submit" class="btn btn-primary btn-block mb-4" method="post" onclick="javascript: form.action='';"><i class="fas fa-check"></i> Valider les informations</button>

 
  <?php


// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['login'])) {
	header ('Location: login.php');
	exit();
}

// Vérifie si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Vérifie si toutes les données sont présentes
  if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['code_postal']) && !empty($_POST['date_naissance'])) {

    $servername = DB_SERVER;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $dbname = DB_NAME;

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $code_postal = $_POST['code_postal'];
    $date_naissance = $_POST['date_naissance'];

   

    
    

    // Vérifie si l'utilisateur a plus de 18 ans
    $date_naissance_timestamp = strtotime($date_naissance);
    $age = date('Y') - date('Y', $date_naissance_timestamp);
    if (date('md') < date('md', $date_naissance_timestamp)) {
      $age--;
    }
    if ($age < 18) {
      echo "Vous devez avoir au moins 18 ans pour vous inscrire.";
    } else {
      // Vérifie si le code postal est valide
      if (preg_match("#^[0-9]{5}$#", $code_postal)) {
        try {

          
          // Connexion à la base de données
        // Connexion à la base de données
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




// Obtient le dernier Id_Electeur de la base de données
$stmt = $conn->query("SELECT MAX(Id_Electeur) FROM Electeur");
$lastId = $stmt->fetchColumn();

// Incrémente le dernier Id_Electeur pour obtenir le nouvel Id_Electeur
$newId = $lastId + 1;

// Prépare la requête SQL pour insérer les données dans la base de données
$stmt = $conn->prepare("INSERT INTO Electeur (Id_Electeur, Nom_Electeur, Prenom_Electeur, code_postal, date_naissance) VALUES (:id, :nom, :prenom, :code_postal, :date_naissance)");


// Lie les paramètres de la requête SQL aux valeurs du formulaire
$stmt->bindParam(':id', $newId);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':code_postal', $code_postal);
$stmt->bindParam(':date_naissance', $date_naissance);

// Exécute la requête SQL pour insérer les données dans la base de données
$stmt->execute();


          // Redirige l'utilisateur vers la page de résultat
         
          header("Location: resultat.php");
          exit();
        } catch (PDOException $e) {
          echo "Erreur : " . $e->getMessage();
        }

        // Ferme la connexion à la base de données
        $conn = null;
      } else {
        echo "Le code postal est invalide.";
      }
    }
  } else {
    echo "Tous les champs sont obligatoires.";
  }
}
?>
         
         </form>
        </div>
      </form>
    </div>




  <?php
include("./assets/includes/footer.php");
?>
