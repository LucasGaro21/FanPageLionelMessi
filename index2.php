<?php

  require 'database.php';
 
 
  

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, name, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="32x32" href="/Fan Page/images/messi-vector.jpg">
  <link rel="stylesheet" href="./resources/styles.css" />
  <link rel="stylesheet" href="./resources/font.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
  

  <title>Fan Page Lio Messi</title>
</head>

<body>
  
  <header>
    <a href="" class="logo">
      <img src="images/LogoMessi4.png" alt="">
    </a>
    <nav>
      <a href="histo.php" class="nav-link">Historia</a>
      <a href="" class="nav-link">Trayectoria</a>
      <a href="front-notice.php" class="nav-link">Noticias</a>
  <a href="logout.php">
  <span class="material-symbols-outlined">
logout
</span>
  </a>
    </nav>
  </header>

  <div class="main-body">
    <div class="body-left-side">
      <p>LIONEL ANDRÉS <br />MESSI CUCCITINI</p>
      <p class="body-slogan">
        <em>¡Bienvenidos a la Fan Page de Lio Messi!</em>
      </p>
    </div>
    <div class="body-right-side">
      <img class="messi1" src="images/messi1.jpg" alt="" />
    </div>
  </div>

  <h1 class="stats-title">ESTADÍSTICAS</h1>
  <div class="stats">
    <div class="imagen-stats-goals" style="background-image: url(./images/messi-goal.gif);">
      <div class="info">
        <p class="headline">769</br> Goles </p>
      </div>
    </div>
    <div class="imagen-stats-matches" style="background-image: url(./images/messi-matches.gif);">
      <div class="info">
        <p class="headline">973</br> Partidos </p>
      </div>
    </div>
    <div class="imagen-stats-assists" style="background-image: url(./images/messi-assist.gif);">
      <div class="info">
        <p class="headline">331</br> Asistencias </p>
      </div>
    </div>
    <div class="imagen-stats-titles" style="background-image: url(./images/messi-cup.gif);">
      <div class="info">
        <p class="headline">40</br> Titulos </p>
      </div>
    </div>
  </div>


  <div class="goals">
    <div class="amount-goals">
      <div class="amount">
        <div class="amount-arg">
          <p>86</br></br>Goles en </br>Selección Argentina</p>
        </div>
      </div>
      <div class="amount">
        <div class="amount-brc">
          <p>672</br></br>Goles en </br>FC Barcelona</p>
        </div>
      </div>
      <div class="amount">
        <div class="amount-psg">
          <p>11</br></br>Goles en </br>Paris Saint-Germain</p>
        </div>
      </div>
    </div>

    <div class="best-goals">
      <div class="title-goals">
        <p>
          MEJORES GOLES
        </p>
      </div>
      <div class="video-goals">
        <center>
          <iframe width="740" height="460" src="https://www.youtube.com/embed/AVr8eWl7_NE?controls=0&amp;start=15"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </center>
      </div>
    </div>

    <footer>
      <div class="main-footer">
        <div class="footer-left-side">
          <h6 style= "font-size: 0.5em;color: #DFDFDF;padding-top: 60px;">Copyright 2022</h6>
        </div>
        <div class="footer-right-side">
          <a href="" class="nav-link">Contacto</a> <br /><br />
          <a href="" class="nav-link">Recomendaciones</a>
        </div>
      </div>
      <div class="social-media">
        <a href="https://www.twitter.com/" class="icon icon-twitter" target="_blank"></a>
        <a href="https://www.instagram.com/" class="icon icon-instagram" target="_blank"></a>
        <a href="https://www.facebook.com/" class="icon icon-facebook2" target="_blank"></a>
      </div>
    </footer>
</body>

</html>