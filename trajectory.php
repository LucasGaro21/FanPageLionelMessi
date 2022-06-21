<?php
  //session_start();

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
  <link rel="stylesheet" href="./resources/styles-histo.css" />
  <link rel="stylesheet" href="./resources/font.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
  <title>Trayectoria de Messi</title>
</head>

<body>
  <header>
    <a href="index2.php" class="logo">
      <img src="images/LogoMessi4.png" alt="">
    </a>
    <nav>
      <a href="histo.php" class="nav-link">Historia</a>
      <a href="" class="nav-link">Trayectoria</a>
      <a href="front-notice.php" class="nav-link">Noticias</a>
      <?php if(!empty($user)): ?>
  
      <?= $user['name']; ?>
      <?php endif; ?>
      <a href="logout.php">
      <span class="material-symbols-outlined">
    logout
    </span>
      </a>
    
      
    </nav>
  </header>
  <div class="top-body">
  <div class="body-left-side">
      <h1>
        Lionel Messi 
      </h1>
      </div>
      <div class="body-right-side">
      <div class="first-photo" style="position: absolute;">
        <img src="images/brazos-cruzados-leo-messi.gif"style="padding-top: 70px;" />
      </div>
    </div>
    </div>
    <div class="main-body">
    <h2>
        BARCELONA
    </h2>
    <H4>
        JUGO 778 PARTIDOS</BR>
        ANOTÓ 672 GOLES</BR>
        REALIZÓ 268 ASISTENCIAS</BR>
        OBTUVO 35 TITULOS</BR>
        
    </H4>
    </BR>
    </BR>

    <h2>
        PARIS SAINT-GERMAIN
    </h2>
    <H4>
        JUGO 33 PARTIDOS</BR>
        ANOTÓ 11 GOLES</BR>
        REALIZÓ 14 ASISTENCIAS</BR>
        OBTUVO 1 TITULOS</BR>
        
    </H4>
    </BR>
    </BR>

    <h2>
        SELECCIÓN ARGENTINA
    </h2>
    <H4>
        JUGO 161 PARTIDOS</BR>
        ANOTÓ 86 GOLES</BR>
        REALIZÓ 49 ASISTENCIAS</BR>
        OBTUVO 4 TITULOS</BR>
        
    </H4>
      </div>
  </body>