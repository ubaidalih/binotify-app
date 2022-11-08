<?php
  include '../db.php';
  require __DIR__ . '/create.php'; // buat manggil function createFile

  $song_id = $_POST['song_id'];
  $judul = $_POST['Judul'];
  $penyanyi = $_POST['Penyanyi'];
  $new_date = date('Y-m-d', strtotime($_POST['Tanggal_terbit']));
  $Genre = $_POST['Genre'];
  $durasi = (int) $_POST["duration"];
  $image_file = $_FILES['Image_file'];
  $audio_file = $_FILES['Audio_file'];

  $audio_upload_path = createFile($audio_file);
  $img_upload_path = createFile($image_file);

  $sql = "update songs set judul='$judul', penyanyi='$penyanyi', tanggal_terbit='$new_date', Genre='$Genre', Duration='$durasi', Audio_path='$audio_upload_path', Image_path='$img_upload_path' where song_id=$song_id";
  $result = $conn->query($sql);
  $conn->close();
  header("location: index.php");
