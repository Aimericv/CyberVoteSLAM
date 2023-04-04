<?php
include("./assets/includes/head.php");
include("./assets/includes/header.php");
include("./assets/includes/config.php");

// Récupère l'id de l'élection sélectionnée dans la liste déroulante
if (isset($_GET['election'])) {
  $id_election = $_GET['election'];
} else {
  $id_election = null;
}

?>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title">Résultat des votes saison :</h5>
    <p class="card-text">
    <div class="container">
  <div class="row">
 
  </div>
</div>
  <table class="table">
  
  <tbody>
  <form id="election-form">
  <div class="form-group">
	<style>.select-election {
  max-width: 170px;
}</style>
  <label for="selectElection">Sélectionnez une élection :</label>
  <select class="form-select select-election" id="selectElection" name="election" onchange="this.form.submit()">
    <?php
      $result = $conn->query("SELECT * FROM Election");
      while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['id_election'].'"';
        if ($id_election == $row['id_election']) {
          echo ' selected';
        }
        echo '>'.$row['nom_election'].'</option>';
      }
    ?>
  </select>
</div>
  </form>




<?php
if ($id_election !== null) {
  $services = $conn->query("SELECT c.Nom_Candidat, c.Prenom_Candidat, e.nom_election, sp.NbVoix
                            FROM Candidat c
                            JOIN Se_Presentent sp ON c.Id_Candidat = sp.Id_Candidat
                            JOIN Election e ON sp.id_election = e.id_election
                            WHERE sp.id_election = $id_election
                            ORDER BY e.nom_election, sp.NbVoix DESC");
  if ($services->num_rows > 0) {
?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nom:</th>
          <th scope="col">Prénom:</th>
          <th scope="col">Nombre de votes:</th>
        </tr>
      </thead>
      <tbody>
<?php
    while($row = $services->fetch_assoc()) {
?>
        <tr>
          <td><?= $row['Nom_Candidat'] ?></td>
          <td><?= $row['Prenom_Candidat'] ?></td>
          <td><?= $row['NbVoix'] ?></td>
        </tr>
<?php
    }
?>
        <tr>
          <td>Vote blanc</td>
          <td>-</td>
          <td>
<?php
    $result = $conn->query("SELECT VoteBlanc FROM Election WHERE id_election = $id_election");
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo $row['VoteBlanc'];
    } else {
      echo '0';
    }
?>
          </td>
        </tr>
      </tbody>
    </table>
<?php
  } else {
?>
    <p>Aucun résultat trouvé.</p>
<?php
  }
}
?>


