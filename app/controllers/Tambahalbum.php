<?php
        require_once __DIR__."/../models/Album.php";

class Tambahalbum extends Controller {
    public function createFile($file) {

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

          $audio_upload_path = "/binotify-app/public/audio/".$new_file_name;      // ini ganti sesuai directory lagu
          move_uploaded_file($tmp_name, __DIR__."/../../public/audio/".$new_file_name);
          return $audio_upload_path;
        }
        else if(in_array($file_ex_lc, $img_allowed_exs)){

          // rename image

          $new_img_name = uniqid("IMG-", true).'.'.$file_ex_lc;

          // simpen di directory server

          $file_upload_path = "/binotify-app/public/img/".$new_img_name;   // ini ganti sesuai directory image
          move_uploaded_file($tmp_name, __DIR__."/../../public/img/".$new_img_name);
          return $file_upload_path;
        }
        // error throws
        else{
          $em = "File type not supported";
          header("location: index.php?error=$em");
        }
      }
      else{
        $em = "Error uploading file!";
        header("Location: index.php?error=$em");
      }

    }
    public function index(){
        $this->view('tambahalbum/index');
    }
    public function submit(){
        $judul = $_POST["judul"];
        $result = $this->model('Album')->get_album_detail($judul);
        if($result){
            //album udah ada
            header("location: /binotify-app/public/tambahalbum/index");
        }
        else{
            $penyanyi = $_POST["penyanyi"];
            $new_date = date('Y-m-d', strtotime($_POST['tanggal_terbit']));
            $genre = $_POST["genre"];
            $durasi = (int) $_POST["duration"];
            $img_upload_path = "";
            if(isset($_FILES['img_file'])){
            $image_file = $_FILES['img_file'];
            $img_upload_path = $this->createFile($image_file);
            }

            $result = $this->model('Album')->insert_album($judul, $penyanyi, $new_date, $genre, $durasi, $img_upload_path);

            if($result){
                header("location: binotify-app/public/tambahalbum/index");
            }
            else{
                //kasi error message
                header("location: binotify-app/public/tambahalbum/index");
            }
        }
    }
    
    public function check(){
      $judul = $_POST["judul"];
      $result = $this->model('Album')->get_album_detail($judul);
      if($result){
        echo "wrong";
      }
      else{
        echo "ok";
      }
    }
}