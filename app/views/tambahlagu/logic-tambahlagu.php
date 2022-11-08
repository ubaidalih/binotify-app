<?php
  include '../db.php';                                      // ini ganti sesuai directory database
  $judul = $_POST["judul"];
  $penyanyi = $_POST["penyanyi"];
  $new_date = date('Y-m-d', strtotime($_POST['tanggal_terbit']));
  $Genre = $_POST["Genre"];
  $durasi = (int) $_POST["duration"];
  $image_file = $_FILES['img_file'];
  $audio_file = $_FILES['audio_file'];

  function createFile($file) {

    // convert atribut file jadi variable

    $file_name = $file['name'];
    $tmp_name = $file['tmp_name'];
    $error = $file['error'];

    // cek error baca file

    if ($error === 0){

      // baca jenis file

      $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
      $file_ex_lc = strtolower($file_ex);
      $audio_allowed_exs = array ("mp3", "aac", "flac", "aac", "wav", "wma");
      $img_allowed_exs = array ("jpeg", "jpg", "png");

      if (in_array($file_ex_lc, $audio_allowed_exs)){

        // rename lagu

        $new_file_name = uniqid("SONG-", true).'.'.$file_ex_lc;

        // simpen di directory server

        $audio_upload_path = "../../public/audio/".$new_file_name;      // ini ganti sesuai directory lagu
        move_uploaded_file($tmp_name, $audio_upload_path);
        return $audio_upload_path;
      }
      else if(in_array($file_ex_lc, $img_allowed_exs)){

        // rename image

        $new_img_name = uniqid("IMG-", true).'.'.$file_ex_lc;

        // simpen di directory server

        $file_upload_path = "../../public/img/".$new_img_name;   // ini ganti sesuai directory image
        move_uploaded_file($tmp_name, $file_upload_path);
        return $file_upload_path;
      }
      // error throws
      else{
        $em = "File type not supported";
        header("location: index.php");
      }
    }
    else{
      $em = "Error disini!";
      header("Location: index.php?error=$em");
    }

  }

  $audio_upload_path = createFile($audio_file);
  $img_upload_path = createFile($image_file);

  $sql = "insert into songs (judul, penyanyi, tanggal_terbit, Genre, duration, audio_path, image_path) values ('$judul', '$penyanyi', '$new_date', '$Genre', '$durasi', '$audio_upload_path', '$img_upload_path')";
  $conn->query($sql);
  $conn->close();
  header("location: index.php");
?>