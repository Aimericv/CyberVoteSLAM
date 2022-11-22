<?php
include("./assets/includes/head.php");
include("./assets/includes/header.php");
session_start();
if (!isset($_SESSION['login'])) {
	header ('Location: login.php');
	exit();
}
?>


  <!DOCTYPE html>
<html>
  <head>
    <title>Formulaire</title>
    
  
  </head>
  <body>
    <div class="main-block">
      <h1>Inscription de dossier</h1>
      <form action="/" method="post">
        
        <label id="icon" for="prenom"><i class="fas fa-user"></i></label>
        <input type="text" name="prenom" id="prenom" placeholder="Prenom" required/>
        <label id="icon" for="nom"><i class="fas fa-user"></i></label>
        <input type="text" name="nom" id="nom" placeholder="Nom" required/>
        <label id="icon" for="code_postale"><i class="fas fa-location-dot"></i></label>
        <input type="text" name="code_postale" id="nom" placeholder="Code Postal" required/>
        <label id="icon" for="date_naissance"><i class="fas fa-birthday-cake"></i></label>
        <input type="text" name="date_naissance" id="nom" placeholder="Date de naissance" required/>
        
        
        <div class="btn-block">
        <button type="submit" method="post" onclick="javascript: form.action='';">Envoyer</button>
        
        <?php
          $servername = "localhost";
          $username = "cybervote";
          $password = "cybervote";
          $dbname = "cybervote";
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
            //echo "Nouveaux enregistrement ajoutés avec sucéés";
          } catch(PDOException $e) {
            echo $sql . "
          " . $e->getMessage();
          }
          $conn = null;
          ?>
         
        
        </div>
      </form>
    </div>
  </body>
</html>



  <?php
include("./assets/includes/footer.php");
?>
