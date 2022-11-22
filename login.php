<?php
include("./assets/includes/head.php");
include("./assets/includes/header.php");
include("./assets/includes/config.php");
?>

<body>
  <?php

session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $query = "SELECT * FROM `electeur` WHERE numero_carte_vote='$username'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['login'] = $username;
      header("Location: dossier.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
  <div class="row d-flex justify-content-center">
    <div class="col-md-6">
      <div class="main-block">
        <h1>Authentification</h1>
      </div>
      <?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
      <form method="post" name="login">
        <div class="form-outline mb-4 ">
          <input type="text" id="form2Example1" class="form-control" name="username" placeholder="Numéro de carte vote"
            required />
          <label class="form-label" for="form2Example1">Numéro de carte vote</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Se connecter</button>
    </div>
    </form>
  </div>
  </div>
</body>

</html>



<?php
include("./assets/includes/footer.php");
?>