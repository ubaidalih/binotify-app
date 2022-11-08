<?php
require_once('Config.php');

class Album{
    private $db;
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    }

    public function get_album($page){
        $query = "SELECT Judul, Penyanyi, YEAR(Tanggal_terbit), Image_path, Genre FROM album ORDER BY Judul";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            // Pagination
            $dataEachPage = 5;
            $dataTotal = $result->num_rows;
            $pageTotal = ceil($dataTotal / $dataEachPage);

            $dataStart = ($dataEachPage * $page) - $dataEachPage;
            $query = "SELECT Judul, Penyanyi, YEAR(Tanggal_terbit), Image_path, Genre FROM album ORDER BY Judul LIMIT $dataStart, $dataEachPage";
            $result = $this->db->query($query)->fetch_all();

            $resp['data'] = $result;
            $resp['pageTotal'] = $pageTotal;
            return($resp);
        }
        else{
            return false;
        }
    }

    public function get_album_detail($album_name){
        $query = "SELECT Judul, Penyanyi, Total_duration, YEAR(Tanggal_terbit), Image_path, Genre FROM album WHERE REPLACE(Judul, ' ', '') = '$album_name'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return($result -> fetch_all());
        }
        else{
            return false;
        }
    }

    public function get_song($album_name){
        $query = "SELECT song.Judul, song.Penyanyi, song.Tanggal_terbit, song.Image_path, song.Genre FROM song INNER JOIN album WHERE album.album_id = song.album_id AND REPLACE(album.Judul, ' ', '') = '$album_name'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return($result -> fetch_all());
        }
        else{
            return false;
        }
    }

    public function insert_album($judul, $penyanyi, $tanggal_terbit, $genre, $total_duration, $image_path){
        $query = "insert into album (Judul, Penyanyi, Tanggal_terbit, Genre, Total_duration, Image_path) values ('$judul', '$penyanyi', '$tanggal_terbit', '$genre', 0, '$image_path')";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function edit_album($judul_lama, $judul, $penyanyi, $tanggal_terbit, $genre){
        $query = "UPDATE album SET Judul = '$judul', Penyanyi = '$penyanyi', Tanggal_terbit = '$tanggal_terbit', Genre = '$genre' WHERE REPLACE(Judul, ' ', '') = '$judul_lama'";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function edit_album_i($judul_lama, $judul, $penyanyi, $tanggal_terbit, $genre, $image_path){
        $query = "UPDATE album SET Judul = '$judul', Penyanyi = '$penyanyi', Tanggal_terbit = '$tanggal_terbit', Genre = '$genre', Image_path = '$image_path' WHERE REPLACE(Judul, ' ', '') = '$judul_lama'";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_album($album_name){
        $query = "UPDATE song SET album_id = NULL WHERE album_id = (SELECT album_id FROM album WHERE REPLACE(Judul, ' ', '') = '$album_name')";
        $result = $this->db->query($query);
        $query = "DELETE FROM album WHERE REPLACE(Judul, ' ', '') = '$album_name'";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

}
?>