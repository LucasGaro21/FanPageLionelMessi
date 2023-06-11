<?php

require('database.php');




if (isset($_POST['save-notice'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $imagen = $_FILES['imagen']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
  move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
  $sql = "INSERT INTO NOTICES(title, description, image) VALUES ('$title', '$description', '$imagen')";
  $query = $conn->prepare($sql);
  $query->execute();
  

  $_SESSION['message'] = 'Noticia guardada';
  $_SESSION['message_type'] = 'success';
  header('Location: notices.php');


}

?>