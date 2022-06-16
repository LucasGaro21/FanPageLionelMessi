<?php
include("database.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM NOTICES WHERE id=$id";
  $query = $conn->prepare($sql);
  $query->execute();
  if (($sql) == 1) {
    $row = $sql;
    $title = $row['title'];
    $description = $row['description'];
  }
}

if (isset($_POST['edit'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];

  $sql = "UPDATE notices set title = '$title', description = '$description' WHERE id=$id";
  $query = $conn->prepare($sql);
  $query->execute();
  
  header('Location: notices.php');
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
      <a href="notices.php" class="logo">
        <img src="images/LogoMessi4.png" alt="">
      </a>
      <div class="ms-auto" style= "display: flex; font-size: 1rem;" >
      <a href="logout.php" class="nav-link">Cerrar Sesion</a>
      </div>
    </nav>
    
  </header>
  <h1 style= "text-align: center; margin-top: 15px;">Editar Noticia</h1>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit-notice.php?id=<?php echo $_GET['id']; ?>" method="POST">
      
        <div class="form-group">
          <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Editar Titulo">
        </div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Editar Descripción"><?php echo $description;?></textarea>
        </div>
        <button class="btn-warning" name="edit">
          Guardar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>