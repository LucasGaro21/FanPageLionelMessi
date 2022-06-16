<?php

  session_start();

  
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_id']= $results['id'];
    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      if($_SESSION['user_id']==1){
        header("Location: /Fan Page/notices.php");
        
      }
      else{
      header("Location: /Fan Page/index2.php");
      
    }
    } else {
      $message = 'La contraseña es incorrecta';
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
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="./resources/styles-login.css">
  <link rel="stylesheet" href="./resources/font.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>

<body>
  
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
    <h5>Iniciar Sesión</h5>
    <form action="login.php" method="POST">
      <input name="email" class="controls" type="email" value="" placeholder="Usuario">
      <input name="password" class="controls" type="password" value="" placeholder="Contraseña">
      <?php if(!empty($message)): ?>
  <p>
    <?= $message ?>
  </p>
  <?php endif; ?>
      <p class="register"><a href="signup.php">Registrarse</a></p> 
     <a href=""><button class="btn"><span>Ingresar</span></button></a>
    </form>

  </section>
</body>
</html>