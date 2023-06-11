<?php include("database.php"); 
session_start();
if (isset($_SESSION['user_id'])&& $_SESSION['user_id'] !== 1) {
 
  header('Location: /Fan Page/index.php');

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
            <a href="" class="logo">
                <img src="images/LogoMessi4.png" alt="">
            </a>
            <div class="ms-auto" style="display: flex; font-size: 1rem;">
                <a href="logout.php" class="nav-link">Cerrar Sesion</a>
            </div>
        </nav>

    </header>


    <main class="container p-4">
        <div class="row">
            <div class="col-md-4">

                <!--Agregar noticias-->
                <div class="card card-body">
                    <form action="save-notice.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Titulo de la Noticia"
                                autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control"
                                placeholder="Texto de la Noticia"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="imagen" class="form-control" id="imagen" required>

                        </div>
                        <input type="submit" name="save-notice" class="btn btn-info btn-block" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered" style="background-color: white;">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha de creacion</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
          $sql = "SELECT * FROM NOTICES;";

          $query = $conn->prepare($sql);
          $query->execute();
          $row = $query->fetchAll();   

          foreach ($row as $key => $value) {
            echo '<tr>
            <td>',$value["image"],'</td>
            <td>',$value["title"],'</td>
            <td>',$value["description"],'</td>
            <td>',$value["created_at"],'</td>
            <td>
              <a href="edit-notice.php?id=',$value["id"],'" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete-notice.php?id=',$value["id"],'" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
        </tbody>';
          }
          ?>
                </table>
            </div>
        </div>
    </main>
</body>

</html>