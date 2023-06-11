<?php
include("database.php");

$page_number = 1;

if (isset($_GET['page'])) {
  $page_number = $_GET['page'];
}
$max_results = 3;
$row_start = ($page_number - 1) * $max_results;

$order_by = '';

if (isset($_GET['order_by'])) {
  $order_by = $_GET['order_by'];
  if ($order_by == 'created_at_asc') {
    $order_by = 'created_at ASC';
  } elseif ($order_by == 'created_at_desc') {
    $order_by = 'created_at DESC';
  }
}

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
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="32x32" href="/Fan Page/images/messi-vector.jpg">
    <link rel="stylesheet" href="./resources/styles-notices.css" />
    <link rel="stylesheet" href="./resources/font.css" />
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">


    <title>Fan Page Lio Messi</title>
</head>

<body style="background-color: #E1F8FF;">
    <header>
        <nav class="navbar navbar-red bg-red">
            <a href="index2.php" class="logo">
                <img src="images/LogoMessi4.png" alt="">
            </a>
            <div class="ms-auto" style="display: flex; font-size: 1rem;">
                <a href="histo.php" class="nav-link" style="color: #00394B;">Historia</a>
                <a href="trajectory.php" class="nav-link" style="color: #00394B;">Trayectoria</a>
                <a href="front-notice.php" class="nav-link" style="color: #00394B;">Noticias</a>
                <a href="logout.php">
                    <span class="material-symbols-outlined" style="color: #00394B;">
                        logout
                    </span>
                </a>
            </div>
        </nav>
    </header>

    <a href="front-notice.php?page=<?php echo $page_number; ?>&order=asc"
        style="display: table; color:#00C1FF;margin-left: 1.5%;">Ordenar ascendente</a>
    <a href="front-notice.php?page=<?php echo $page_number; ?>&order=desc"
        style="display: table; color:#00C1FF;margin-left: 1.5%;">Ordenar descendente</a>

    <div class="container mt-1">

        <?php
$direction = isset($_GET['order']) && $_GET['order'] === 'asc' ? 'ASC' : 'DESC';
$sql = "SELECT * FROM NOTICES ORDER BY created_at $direction LIMIT $row_start, $max_results;";
$query = $conn->prepare($sql);
$query->execute();
$row = $query->fetchAll();


    foreach ($row as $key => $value) {
      echo '
            <div class="card"style="margin-bottom: 5px; margin-top: 5px;">
              <div class="card-body" >
                <tr>
                
                  <img class="img-notices" src="./uploads/', $value['image'], '">
                  
                  <div style="font-size: 2.5rem; font-family:fantasy;">
                   <td>', $value["title"], '</td>
                  </div>
                <br/>
            <td>', $value["description"], '</td>
          </tr>
          <br/>
          </div>
          </div >
        ';

    }
    ?>

        <div class="pages" style="margin-bottom:10px;">

            <?php
      $query2 = $conn->prepare("SELECT * FROM NOTICES;");
      $query2->execute();
      $total_notices = $query2->rowCount();
      $max_pages = ceil($total_notices / $max_results);
      ?>

            <?php
      if ($page_number > 1) {
        for ($i = 1; $i < $page_number; $i++) {
          ?>
            <button class="btn btn-page">
                <?php echo $i; ?>
            </button>
            <?php
        }
      }
      ?>
            <button class="btn btn-page" style="background-color: #00C1FF; color:white;">
                <?php echo $page_number; ?>
            </button>

            <?php
      for ($i = $page_number + 1; $i < $max_pages + 1; $i++) {
        ?>
            <button class="btn btn-page" style="background-color: white; color:black;">
                <?php echo $i; ?>
            </button>
            <?php
      }
      ?>
        </div>
        <script src="goToPage.js"></script>
</body>

</html>