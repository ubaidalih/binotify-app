<?php
  include '../db.php';
  $id = $_GET['id'];
  $sql = "delete from songs where song_id=$id";
  $conn->query($sql);
  $conn->close();
  header("location: index.php");
?>