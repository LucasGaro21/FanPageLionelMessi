<?php
include("database.php");  


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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
  

  <title>Fan Page Lio Messi</title>
</head>
<body style= "background-color: #E1F8FF;">
  <header>
    <nav class="navbar navbar-red bg-red">
      <a href="index.php" class="logo">
        <img src="images/LogoMessi4.png" alt="">
      </a>
      <div class="ms-auto" style= "display: flex; font-size: 1rem;" >
      <a href="histo.php" class="nav-link">Historia</a>
      <a href="" class="nav-link">Trayectoria</a>
      <a href="front-notice.php" class="nav-link">Noticias</a>
      <?php if(!empty($user)): ?>
  
  <?= $user['name']; ?>
  <a href="logout.php">
  <span class="material-symbols-outlined">
logout
</span>
  </a>

  <?php endif; ?>
      </div>
    </nav>
    </header>

    <div class="container mt-1">
    
        
  <?php       $sql = "SELECT * FROM NOTICES;";

          $query = $conn->prepare($sql);
          $query->execute();
          $row = $query->fetchAll();   

          foreach ($row as $key => $value) {
            echo '
            <div class="card"style="margin-bottom: 10px;">
      <div class="card-body" >
            <tr>
            <div style="font-size: 1.5rem">
            <td>',$value["title"],'</td>
            </div>
            <br/>
            <td>',$value["description"],'</td>
            
          </tr><br/>
          </div>
      </div>
        ';
      
          }
?> 

      
    </body>
  </html>