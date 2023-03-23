<?php
include("./assets/includes/head.php");
include("./assets/includes/header.php");
include("./assets/includes/config.php");

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
  <thead>
    <tr>
      <th scope="col">Nom:</th>
      <th scope="col">Prénom:</th>
      <th scope="col">Nombre de votes:</th>
    </tr>
  </thead>
  <tbody>
									<?php
									
										$services = $conn->query("SELECT c.Nom_Candidat, c.Prenom_Candidat, e.nom_election, sp.NbVoix
										FROM Candidat c
										JOIN Se_Presentent sp ON c.Id_Candidat = sp.Id_Candidat
										JOIN Election e ON sp.id_election = e.id_election
										ORDER BY e.nom_election, sp.NbVoix DESC;
										");
										if ($services->num_rows > 0) {
										    while($row = $services->fetch_assoc()) {
									?>
									<tr>
										<td><?= $row['Nom_Candidat'] ?></td>
										<td><?= $row['Prenom_Candidat'] ?></td>
										<td><?= $row['NbVoix'] ?></td>
									</tr>
									<?php }
										} else {
									?>
									<tr>
										<td>-</td>
										<td>-</td>
										<td>-</td>
									</tr>
									<?php }	?>
								</tbody>
</table>
</p>
<button type="button" class="btn btn-primary">Voir plus <i class="fa-solid fa-plus"></i></button>
  </div>
</div>
  <?php
include("./assets/includes/footer.php");
?>