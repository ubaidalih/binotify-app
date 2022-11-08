<?php

class Detailalbum extends Controller {
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

            $audio_upload_path = "/tugas-besar-1/public/audio/".$new_file_name;      // ini ganti sesuai directory lagu
            move_uploaded_file($tmp_name, __DIR__."/../../public/audio/".$new_file_name);
            $durasi = $this->getDuration(__DIR__."/../../public/audio/".$new_file_name);

            return array($audio_upload_path, $durasi);
            }
            else if(in_array($file_ex_lc, $img_allowed_exs)){

            // rename image

            $new_img_name = uniqid("IMG-", true).'.'.$file_ex_lc;

            // simpen di directory server

            $file_upload_path = "/tugas-besar-1/public/img/".$new_img_name;   // ini ganti sesuai directory image
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

    public function index($album_name){
        $data["detail_album"] = $this->model("Album")->get_album_detail($album_name);
        $data["list_of_song"] = $this->model("Album")->get_song($album_name);

        $this->view('detailalbum/user',$data);
    }
    public function admin($album_name){
        $data["detail_album"] = $this->model("Album")->get_album_detail($album_name);
        $data["list_of_song"] = $this->model("Album")->get_song($album_name);

        $this->view('detailalbum/admin',$data);
    }
    public function user($album_name){
        $data["detail_album"] = $this->model("Album")->get_album_detail($album_name);
        $data["list_of_song"] = $this->model("Album")->get_song($album_name);

        $this->view('detailalbum/user',$data);
    }

    public function tambah($album_name){
        $data["detail_album"] = $this->model("Album")->get_album_detail($album_name);
        $data["list_of_song"] = $this->model("Music")->get_song_without_album($album_name);

        $this->view('detailalbum/tambah', $data);
    }

    public function submittambah($album_name, $song_name){
        $result = $this->model("Music")->add_song_to_album($album_name, $song_name);

        header('Location: /tugas-besar-1/public/detailalbum/admin/'. $album_name);
    }

    public function hapus($album_name){
        $data["detail_album"] = $this->model("Album")->get_album_detail($album_name);
        $data["list_of_song"] = $this->model("Album")->get_song($album_name);

        $this->view('detailalbum/hapus',$data);
    }

    public function submithapus($album_name, $song_name){
        $result = $this->model("Music")->delete_song_from_album($album_name, $song_name);

        header('Location: /tugas-besar-1/public/detailalbum/admin/'. $album_name);
    }

    public function delete($album_name){
        $result = $this->model("Album")->delete_album($album_name);
        
        header('Location: /tugas-besar-1/public/daftaralbum/admin/1');
    }

    public function edit($album_name){
        $result = $this->model("Album")->get_album_detail($album_name);
        $data["judul"] = $result[0][0];
        $data["penyanyi"] = $result[0][1];
        $data["tanggal_terbit"] = $result[0][3];
        $data["genre"] = $result[0][5];

        $this->view('detailalbum/edit',$data);
    }

    public function submitedit($song_name){
        $judul = $_POST["judul"];
        $penyanyi = $_POST["penyanyi"];
        $tanggal_terbit = date('Y-m-d', strtotime($_POST['tanggal_terbit']));
        $genre = $_POST["genre"];
        
        $img_upload_path = "";
        if(isset($_FILES['img_file'])){
        $image_file = $_FILES['img_file'];
        $img_upload_path = $this->createFile($image_file);
        }
        echo "<script>console.log('Debug Objects: " . $song_name . "' );</script>";
        echo "<script>console.log('Debug Objects: " . $judul . "' );</script>";
        echo "<script>console.log('Debug Objects: " . $img_upload_path . "' );</script>";

        $result = true;
        if($img_upload_path === NULL){
            $result = $this->model("Album")->edit_album($song_name, $judul, $penyanyi, $tanggal_terbit, $genre);
        }
        else{
            $result = $this->model("Album")->edit_album_i($song_name, $judul, $penyanyi, $tanggal_terbit, $genre, $img_upload_path);
        }
        echo "<script>console.log('Debug Objects: " . $judul . "' );</script>";
        echo "<script>console.log('Debug Objects: " . $result . "' );</script>";
        if($result){
            header("location: /tugas-besar-1/public/detailalbum/admin/".$judul);
        }
        else{
            //kasi error message
            header("location: /tugas-besar-1/public/detailalbum/admin/".$judul);
        }
    }

    public function check(){
        $judul = $_POST["judul"];
        $judul_lama = $_POST["judul_lama"];
        $result = $this->model('Album')->get_album_detail($judul);
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
