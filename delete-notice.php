<?php

include("database.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM NOTICES WHERE id = $id";
  $query = $conn->prepare($sql);
  $query->execute();
  header('Location: notices.php');
}

?>