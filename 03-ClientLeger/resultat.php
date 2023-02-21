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
										$services = $conn->query("SELECT * from Resultat ORDER BY nb_vote DESC LIMIT 10");
										if ($services->num_rows > 0) {
										    while($row = $services->fetch_assoc()) {
									?>
									<tr>
										<td><?= $row['nom'] ?></td>
										<td><?= $row['prenom'] ?></td>
										<td><?= $row['nb_vote'] ?></td>
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