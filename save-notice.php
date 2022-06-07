
<?php

require('database.php');

if (@!$_SESSION['user_id']){
  header("Location: indexhide.php");
}

if (isset($_POST['save-notice'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $sql = "INSERT INTO NOTICES(title, description) VALUES ('$title', '$description')";
  $query = $conn->prepare($sql);
  $query->execute();
  
  

  $_SESSION['message'] = 'Noticia guardada';
  $_SESSION['message_type'] = 'success';
  header('Location: notices.php');

}

?>