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
    <link rel="stylesheet" href="resources/styles-histo.css" />
    <link rel="stylesheet" href="resources/font.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
                LEO MESSI
            </h1>
        </div>
        <div class="body-right-side">
            <img src="images/liomessi.png" alt="Leo Messi" />
        </div>
    </div>
    </div>
    <div class="main-body">
        <div class="section-container barcelona">
            <div class="section">
                <h2>BARCELONA</h2>
                <ul>
                    <li>JUGÓ 778 PARTIDOS</li>
                    <li>ANOTÓ 672 GOLES</li>
                    <li>REALIZÓ 268 ASISTENCIAS</li>
                    <li>OBTUVO 35 TÍTULOS</li>
                </ul>
            </div>
        </div>

        <div class="section-container psg">
            <div class="section">
                <h2>PARIS SAINT-GERMAIN</h2>
                <ul>
                    <li>JUGÓ 70 PARTIDOS</li>
                    <li>ANOTÓ 31 GOLES</li>
                    <li>REALIZÓ 33 ASISTENCIAS</li>
                    <li>OBTUVO 2 TÍTULOS</li>
                </ul>
            </div>
        </div>

        <div class="section-container argentina">
            <div class="section">
                <h2>SELECCIÓN ARGENTINA</h2>
                <ul>
                    <li>JUGÓ 174 PARTIDOS</li>
                    <li>ANOTÓ 102 GOLES</li>
                    <li>REALIZÓ 54 ASISTENCIAS</li>
                    <li>OBTUVO 5 TÍTULOS</li>
                </ul>
            </div>
        </div>

        <div class="section-container individual-achievements">
            <div class="section">
                <h2>LOGROS INDIVIDUALES</h2>
                <ul>
                    <li>Récord de más goles en una temporada: 91 (2012)</li>
                    <li>Balón de Oro en: 2009, 2011, 2012, 2013, 2016, 2019, 2021 </li>
                    <li>Jugador de Argentina más joven en marcar en un Mundial: 18 años y 357 días.</li>
                </ul>
            </div>
        </div>

        <div class="section-container highlighted-moments">
            <div class="section">
                <h2>MOMENTOS DESTACADOS</h2>
                <ul>
                    <li>Gol en la final de la Liga de Campeones de la UEFA 2011</li>
                    <li>Campeon de UEFA CHAMPIONS LEAGUE (2006, 2009, 2011, 2015)</li>
                    <li>Campeon del Mundo con la Selección Argentina (2022)</li>
                </ul>
            </div>
        </div>

        <div class="section-container additional-data">
            <div class="section">
                <h2>DATOS ADICIONALES</h2>
                <ul>
                    <li>Promedio de goles por partido: 0,78</li>
                    <li>Promedio de asistencias por temporada: 0,43</li>
                    <li>Número de hat-tricks: 49 </li>
                </ul>
            </div>
        </div>
</body>