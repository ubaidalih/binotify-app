<?php

require_once __DIR__."/../../public/lib/getid3-master/getid3/getid3.php";

class Detaillagu extends Controller {
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
            $durasi = $this->getDuration(__DIR__."/../../public/audio/".$new_file_name);

            return array($audio_upload_path, $durasi);
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
            $em = "File type not supported!";
            echo "<script>console.log('Debug Objects: " . $em . "' );</script>";
            // header("location: index.php");
            }
        }
        else{
            $em = "File Error!";
            echo "<script>console.log('Debug Objects: " . $em . "' );</script>";
            // header("Location: index.php?error=$em");
        }

    }

    function getDuration($file){
        $getID3 = new getID3;
        $filedetails = $getID3->analyze($file);
        $len = 0;
        $len= $filedetails['playtime_seconds'];
        return floor($len);
    }
  
    public function index($song_name){
        $data["detail_song"] = $this->model("Music")->get_song_detail($song_name);

        $this->view('detaillagu/user',$data);
    }
    public function admin($song_name){
        $data["detail_song"] = $this->model("Music")->get_song_detail($song_name);

        $this->view('detaillagu/admin', $data);
    }
    public function user($song_name){
        $data["detail_song"] = $this->model("Music")->get_song_detail($song_name);

        $this->view('detaillagu/user',$data);
    }

    public function edit($song_name){
        $result = $this->model("Music")->get_song_detail($song_name);
        $data["judul"] = $result[0][0];
        $data["penyanyi"] = $result[0][1];
        $data["tanggal_terbit"] = $result[0][3];
        $data["genre"] = $result[0][5];

        $this->view('detaillagu/edit',$data);
    }

    public function submitedit($song_name){
        $judul = $_POST["judul"];
        $penyanyi = $_POST["penyanyi"];
        $tanggal_terbit = date('Y-m-d', strtotime($_POST['tanggal_terbit']));
        $genre = $_POST["genre"];
        
        $audio_upload_path = "";
        $img_upload_path = "";
        $durasi = 0;
        if(isset($_FILES['audio_file'])){
        $audio_file = $_FILES['audio_file'];
        list($audio_upload_path, $durasi) = $this->createFile($audio_file);

        }
        if(isset($_FILES['img_file'])){
        $image_file = $_FILES['img_file'];
        $img_upload_path = $this->createFile($image_file);
        }

        $result = true;
        if($audio_upload_path === NULL and $img_upload_path === NULL){
            $result = $this->model("Music")->edit_song($song_name, $judul, $penyanyi, $tanggal_terbit, $genre);
        }
        else if($audio_upload_path === NULL){
            $result = $this->model("Music")->edit_song_i($song_name, $judul, $penyanyi, $tanggal_terbit, $genre, $img_upload_path);
        }
        else if($img_upload_path === NULL){
            $result = $this->model("Music")->edit_song_a($song_name, $judul, $penyanyi, $tanggal_terbit, $genre, $durasi, $audio_upload_path);
        }
        else{
            $result = $this->model("Music")->edit_song_ia($song_name, $judul, $penyanyi, $tanggal_terbit, $genre, $durasi, $audio_upload_path, $img_upload_path);
        }
        if($result){
            header("location: /binotify-app/public/detaillagu/admin/".$judul);
        }
        else{
            //kasi error message
            header("location: /binotify-app/public/detaillagu/admin/".$judul);
        }
        
    }

    public function delete($song_name, $previous){
        $result = $this->model("Music")->delete_song($song_name);

        // $previous = substr($previous, 16);
        // header('Location: ' . $previous);
        header('Location: /binotify-app/public/home/admin');
    }
    
    public function check(){
        $judul = $_POST["judul"];
        $judul_lama = $_POST["judul_lama"];
        $result = $this->model('Music')->get_song_detail($judul);
        if($judul === $judul_lama){
          echo "ok";
        }
        else if($result){
          echo "wrong";
        }
        else{
          echo "ok";
        }
    }
}
