<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])&& !empty($_POST['name'])) {
    $sql = "INSERT INTO users (email, password, name) VALUES (:email, :password, :name)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':name', $_POST['name']);

    if ($stmt->execute()) {
      $message = 'Usuario creado con exito!';
      
      header("Location:http://localhost/Fan%20Page/login.php");
      $_SESSION['message'] = 'Usuario creado con exito!';
      $_SESSION['message_type'] = 'warining';
    } else {
      $message = 'Error, no pudimos crear su cuenta';
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="32x32"  href="/Fan Page/images/messi-vector.jpg">
    <title>Registrarse</title>
    <link rel="stylesheet" href="./resources/styles-login.css">
    <link rel="stylesheet" href="./resources/font.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
  </head>
  <body>
  <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
        <?php endif; ?>
  <header>
    <a href="index.php" class="logo">
        <img src="images/LogoMessi4.png" alt="">
    </a>
    <nav>
    <a href="login.php" class="nav-link">Ingresar</a>
    <a href="signup.php" class="nav-link">Crear Cuenta</a>
    </nav>
</header>

    <section class="login">
        <h1>Suscripciones</h1>
      <h5>Registrar</h5>
      <form action="signup.php" method="POST">
      <input name="name" class="controls username" type="name"  value="" placeholder="Nombre" required>
      <input name="email" class="controls" type="email"  value="" placeholder="Email" required>
      <input name="password" class="controls password" type="password"  value="" placeholder="Contraseña" required>
      <button class="btn btn-register"><span>Registrar</span></button>
    </form>
    </section>
  
  <script src="validateRegister.js"></script>
  </body>
  
</html>