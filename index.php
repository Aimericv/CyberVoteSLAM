<?php
include("./assets/includes/head.php");
include("./assets/includes/header.php");
?>

<div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselBasicExample"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/gouv.jpg" class="d-block w-100"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>Voter c'est important !</h5>
        <p>Cybervote permet de voter en toute sécurité en ligne.</p>
      </div>
    </div>

    <div class="carousel-item">
    <img src="assets/img/gouv.jpg" class="d-block w-100"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>En cas d'absence ? </h5>
        <p>Utilisez cybervote si vous êtes absent, vous pouvez voter depuis le site !</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="assets/img/gouv.jpg" class="d-block w-100"/>
      <div class="carousel-caption d-none d-md-block">
        <h5>Toute démarches sur gouv.fr</h5>
        <p>Vous pouvez faire vos démarches sur gouv.fr</p>
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  <?php
include("./assets/includes/footer.php");
?>
