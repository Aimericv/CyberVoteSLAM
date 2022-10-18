<?php
include("./assets/includes/head.php");
include("./assets/includes/header.php");
?>
  <h1>Hello, world!</h1>

  <!DOCTYPE html>
<html>
  <head>
    <title>Formulaire</title>
    
    
    <style>
      html, body {
      display: flex;
      justify-content: center;
      height: 100%;
      }
      body, div, h1, form, input, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #666;
      }
      h1 {
      padding: 10px 0;
      font-size: 32px;
      font-weight: 300;
      text-align: center;
      }
      p {
      font-size: 12px;
      }
      hr {
      color: #a9a9a9;
      opacity: 0.3;
      }
      .main-block {
      max-width: 340px; 
      min-height: 460px; 
      padding: 10px 0;
      margin: auto;
      border-radius: 5px; 
      border: solid 1px #ccc;
      box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
      background: #ebebeb; 
      }
      form {
      margin: 0 30px;
      }
      
      input[type=radio] {
      display: none;
      }
      label#icon {
      margin: 0;
      border-radius: 5px 0 0 5px;
      }
      label.radio {
      position: relative;
      display: inline-block;
      padding-top: 4px;
      margin-right: 20px;
      text-indent: 30px;
      overflow: visible;
      cursor: pointer;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #1c87c9;
      }
      label.radio:after {
      content: "";
      position: absolute;
      width: 9px;
      height: 4px;
      top: 8px;
      left: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      input[type=text], input[type=password] {
      width: calc(100% - 57px);
      height: 36px;
      margin: 13px 0 0 -5px;
      padding-left: 10px; 
      border-radius: 0 5px 5px 0;
      border: solid 1px #cbc9c9; 
      box-shadow: 1px 2px 5px rgba(0,0,0,.09); 
      background: #fff; 
      }
      input[type=password] {
      margin-bottom: 15px;
      }
      #icon {
      display: inline-block;
      padding: 12px;
      
      text-align: center;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 100%;
      padding: 10px 0;
      margin: 10px auto;
      border-radius: 5px; 
      border: none;
      background: #1c87c9; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: #26a9e0;
      }
    </style>
  </head>
  <body>
    <div class="main-block">
      <h1>Connexion</h1>
      <form action="/" method="post">
        
        <label id="icon" for="prenom"><i class="fas fa-envelope"></i></label>
        <input type="text" name="prenom" id="prenom" placeholder="Prenom" required/>
        <label id="icon" for="nom"><i class="fas fa-user"></i></label>
        <input type="text" name="nom" id="nom" placeholder="Nom" required/>
        
        
        <div class="btn-block">
        
          <button type="submit" method="post" onclick="javascript: form.action='';">Envoyer</button>
          <?php
          $mysqli = mysqli_connect("172.16.0.196", "cybervote", "cybervote", "cybervote");
          if (mysqli_connect_errno()) {
             echo "Echec lors de la connexion à MySQL : " . mysqli_connect_error();
          }
        
          $result_json = array();
          $results = mysqli_query($mysqli, "SELECT * FROM candidat WHERE nom='" . $_POST['nom'] . "'" );
          while($row = mysqli_fetch_assoc($results)) {
            $result_json[] = $row;
          }
          ?>
         
        
        </div>
      </form>
    </div>
  </body>
</html>



  <?php
include("./assets/includes/footer.php");
?>