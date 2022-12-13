<?php
session_start();?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CyberVote</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resultat.php"><i class="fas fa-stream"></i> Résultat</a>
      </li>
      <?php if(!isset($_SESSION['login'])) { ?>
        <li class="nav-item">
        <a class="nav-link" href="login.php"><i class="fas fa-unlock"></i> Authentification</a>
      </li>	

      <?php } else { ?>
        <li class="nav-item">
        <a class="nav-link" href="vote.php"><i class="fas fa-envelope"></i> Voter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dossier.php"><i class="fas fa-wrench"></i> Mon dossier</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fas fa-user-alt-slash"></i> Déconnexion</a>
      </li>			
 <?php } ?>



 </li>
    </ul>

  </div>
</nav>