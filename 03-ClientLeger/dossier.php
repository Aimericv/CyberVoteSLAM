<?php
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
    <input type="text" id="form3Example3" class="form-control" name="code_postale" require/>
    <label class="form-label" for="form3Example3">Code postale</label>
  </div>

  <div class="form-outline mb-4">
    <input type="date" id="form3Example4" class="form-control" name="date_naissance" />
    <label class="form-label" for="form3Example4">Date de naissance</label>
  </div>



  <button type="submit" class="btn btn-primary btn-block mb-4" method="post" onclick="javascript: form.action='';"><i class="fas fa-check"></i> Valider les informations</button>

 
        
        <?php
          $servername = DB_SERVER;
          $username = DB_USERNAME;
          $password = DB_PASSWORD;
          $dbname = DB_NAME;
          $a= $_POST['nom'];
          $b= $_POST['prenom'];
          $c= $_POST['code_postale'];
          $d= $_POST['date_naissance'];

          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // définir le mode exception d'erreur PDO 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "INSERT INTO `Electeur` ( `nom`, `prenom`, `code_postale`, `date_naissance`)
          VALUES( '$a', '$b', '$c', '$d')
          ";

            // utiliser la fonction exec() car aucun résultat n'est renvoyé
            $conn->exec($sql);
            header("Location: resultat.php");
            //echo "Nouveaux enregistrement ajoutés avec sucéés";
          } catch(PDOException $e) {
            echo  'Merci de compléter vos informations.' ;
          }
          $conn = null;
          ?>
         
         </form>
        </div>
      </form>
    </div>




  <?php
include("./assets/includes/footer.php");
?>
