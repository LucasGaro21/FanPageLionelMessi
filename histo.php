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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <title>Historia de Messi</title>
</head>

<body>
    <header>
        <a href="index2.php" class="logo">
            <img src="images/LogoMessi4.png" alt="">
        </a>
        <nav>
            <a href="histo.php" class="nav-link">Historia</a>
            <a href="trajectory.php" class="nav-link">Trayectoria</a>
            <a href="front-notice.php" class="nav-link">Noticias</a>
            <?php if (!empty($user)): ?>

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
                Lionel Andrés Messi Cuccitini
            </h1>
        </div>
        <div class="body-right-side">
            <div class="first-photo">
                <img src="images/messi-cari1.png" />
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="messi-kid">
            <div class="messi-kid-text">
                Conocido como "Leo", "Pulga", "Enano", nació el 24 de junio de 1987 en la Clínica Italiana de Rosario
                con un
                peso de 3,600 kilos, es hijo de Celia Cuccittini y de Jorge Messi, hermano de Rodrigo, Matías y María
                Sol. Vivió
                su infancia en una casa de la calle Lavalleja, en el barrio La Bajada, Rosario.</br></br>
                Lionel de chiquito era fanatico del futbol, todo el tiempo le gustaba andar con una pelota, hasta para
                ir a
                hacer las compras-relato Matias,uno de sus hermanos. Comenzo a practicar Futbol a los 4 años de edad en
                el club
                "Abanderado Grandoli" que se ubicaba cerca de su casa. Su abuela Celia fue quien lo alentó a jugar y
                dedicarse
                al fútbol, lo llevaba a cada entrenamiento y partido.<br /></br>
                Un dia, Leo acompaña a su abuela, Celia, a ver el partido de uno de sus hermanos, categoría 86, una
                categoria
                más grande que el, y al equipo le faltaba un jugador, asique el tecnico le pidió a su abuela si "se lo
                prestaba"
                para completar el equipo, Leo termino jugando ese partido y la "rompió", desde ahi todos notaron que el
                era un
                distinto.</br></br>
                En 1994, comenzó a entrenarse en las divisiones inferiores de Newell's Old Boys.
                Un año mas tarde a Leo lo diagnostican que tenia: deficiencia de la hormona de crecimiento, un
                tratamiento
                costoso, que sus padres no disponía de los recursos económicos necesarios, le piden a su club Newell's
                Old Boys,
                si se podia hacer cargo, y desde la directiva se lo negaron, luego Leo fue a probarse a River Plate,
                jugó un par
                de partidos los cuales la rompio, haciendo 2 o 3 goles por partido, y el encargado de inferiores de
                River, pidió
                su contratación pero nunca se concretó, porque Newell's nunca le dio el pase.</br></br>
                A los 13 años, viaja con su papá a Barcelona, al cual le habia salido una oferta de trabajo, y Leo fue a
                probarse a las inferiores del FC. BARCELONA, el tecnico quedo sorprendido por su talento, que lo hizo
                firmar con
                el club en un contrato realizado con una servilleta de papel, luego se incorporó al club, y este se hizo
                cargo
                de su tratamiento.
                Messi se formó en La Masia, campo de entremiento del Barsa, pasando por todas sus categorias, antes de
                llegar al
                Primer equipo.
            </div>
            <div class="container">
                <ul class="slider">
                    <li id="slide1">
                        <img src="images/Messi-kid1.jpg" />
                    </li>
                    <li id="slide2">
                        <img src="images/messi-kid2.jpg" />
                    </li>
                    <li id="slide3">
                        <img src="images/Messi-kid.jpg" />
                    </li>
                </ul>

                <ul class="menu">
                    <li>
                        <a href="#slide1">1</a>
                    </li>
                    <li>
                        <a href="#slide2">2</a>
                    </li>
                    <li>
                        <a href="#slide3">3</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="messi-barcelona">
            Lionel llegó al primer equipo del Fc. Barcelona, de la mano de Frank Rijkaard, DT del equipo, debutando en
            un
            partido amistoso contra el Fc. Oporto, el 16 de noviembre de 2003, a los 16 años de edad.<br /></br>
            Su primer partido oficial, se va a dar el 16 de octubre de 2004, en el derby catalán, contra el RCD.
            Espanyol,
            convirtiéndose en el jugador más joven del Barcelona en jugar un partido de la Primera División de la Liga
            Española, y su primer gol oficial llegaria el 1 de mayo de 2005, en la trigésimo cuarta fecha de La Liga
            contra el
            Albacete Balompié.<br /></br>
            En junio de ese mismo año, Messi firma su primer contrato como jugador del primer equipo, que lo vinculaba
            con el
            club hasta 2010 y tenía una cláusula de rescisión de 150 millones de euros, similar a las de Ronaldinho y
            Samuel
            Eto'o, que eran sus compañeros de equipo. <br /></br>
            En la temporada 2006-2007, Leo se afirma como titular del primer equipo, en la cual le marco un Hat-Trick al
            Real
            Madrid, finalizando con 14 goles en 26 partidos. <br /></br>
            En la temporada 2008-2009, con Pep Guardiola a la cabeza del equipo, Messi recibiendo el dorsal nro 10
            (legado
            tras la salida de Ronaldinho del equipo). El equipo tuvó una campaña increible, futbol lírico, encadenaron
            victorias y resultados que destrozaron todos los récords y consiguieron que nunca antes había logrado ningún
            equipo español, ganar el "Triplete": ganar en una misma temporada la Copa del Rey, la Liga y la Liga de
            Campeones.<br /></br>
            Messi en esta temporada, logró jugar 51 partidos, convirtiendo 38 goles. El triplete obtenido, daba acceso a
            otros
            3 torneos: Supercopa de España, la Supercopa de Europa y el Mundial de Clubes, los cuales termino ganando en
            Fc.Barcelona, y obtendrian un nuevo record histórico: ganar en un solo año los seis trofeos de las seis
            competiciones en que participaba. <br /></br>
            Un año mas tarde, en la siguiente temporada, la Pulga logra convertir 47 goles en la temporada, 34 por la
            Liga
            Española, lo que le da su primer Pichichi (maximo goleador de esa Liga) y su primer Balón de Oro.
        </div>
        <div class="container">
            <ul class="slider">
                <li id="slide5">
                    <img src="images/debut-messi1.jpg" />
                </li>
                <li id="slide6">
                    <img src="images/debut-messi2.jpg" />
                </li>
                <li id="slide7">
                    <img src="images/primer-gol-messi.jpg" />
                </li>
                <li id="slide8">
                    <img src="images/primer-gol-messi1.jpg" />
                </li>
                <li id="slide9">
                    <img src="images/messi-triplete.jpg" />
                </li>
                <li id="slide10">
                    <img src="images/primer-balon-messi.jpg" />
                </li>
            </ul>

            <ul class="menu">
                <li>
                    <a href="#slide5">1</a>
                </li>
                <li>
                    <a href="#slide6">2</a>
                </li>
                <li>
                    <a href="#slide7">3</a>
                </li>
                <li>
                    <a href="#slide8">4</a>
                </li>
                <li>
                    <a href="#slide9">5</a>
                </li>
                <li>
                    <a href="#slide10">6</a>
                </li>
            </ul>
        </div>
        <div class="messi-argentina">

        </div>
    </div>
</body>