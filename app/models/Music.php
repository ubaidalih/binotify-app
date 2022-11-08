<?php

require_once('Config.php');

class Music{
    private $db;
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    }

    public function get_top_ten_music(){
        $query = "SELECT  Judul, Genre, Penyanyi, Tanggal_terbit, Image_path FROM song  ORDER BY  Judul LIMIT 0,10";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return($result -> fetch_all());
        }
        else{
            return false;
        }
    }

    public function search_music($keyword,$page){

        $query = "SELECT  Judul, Genre, Penyanyi, Tanggal_terbit, Image_path FROM song WHERE  Judul LIKE '%".$keyword."%' OR  Penyanyi LIKE '%".$keyword."%' OR  Tanggal_terbit LIKE '%".$keyword."%'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){

            // Pagination
            $dataEachPage = 5;
            $dataTotal = $result->num_rows;
            $pageTotal = ceil($dataTotal / $dataEachPage);

            $dataStart = ($dataEachPage * $page) - $dataEachPage;
            $query = "SELECT Judul,Genre,Penyanyi,Tanggal_terbit,Image_path FROM song WHERE Judul LIKE '%".$keyword."%' OR  Penyanyi LIKE '%".$keyword."%' OR  Tanggal_terbit LIKE '%".$keyword."%' LIMIT $dataStart, $dataEachPage";
            $result = $this->db->query($query)->fetch_all();

            $resp['data'] = $result;
            $resp['pageTotal'] = $pageTotal;
            return($resp);
        }
        else{
            return false;
        }
    }

    public function get_all_genre(){
        $query = "SELECT DISTINCT Genre FROM song";
        $result = $this->db->query($query)->fetch_all();
        return($result);
    }

    public function genre_filter($keyword,$page,$genre){
        $query = "SELECT Judul,Genre,Penyanyi,Tanggal_terbit,Image_path FROM song WHERE (Judul LIKE '%".$keyword."%' OR  Penyanyi LIKE '%".$keyword."%' OR  Tanggal_terbit LIKE '%".$keyword."%') and Genre LIKE '%".$genre."%'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){

            // Pagination
            $dataEachPage = 5;
            $dataTotal = $result->num_rows;
            $pageTotal = ceil($dataTotal / $dataEachPage);

            $dataStart = ($dataEachPage * $page) - $dataEachPage;
            $query = "SELECT Judul,Genre,Penyanyi,Tanggal_terbit,Image_path FROM song WHERE (Judul LIKE '%".$keyword."%' OR  Penyanyi LIKE '%".$keyword."%' OR  Tanggal_terbit LIKE '%".$keyword."%') and Genre LIKE '%".$genre."%' LIMIT $dataStart, $dataEachPage";
            $result = $this->db->query($query)->fetch_all();

            $resp['data'] = $result;
            $resp['pageTotal'] = $pageTotal;
            return($resp);
        }
        else{
            return false;
        }
    }

    public function sort_date($keyword,$page){
        $query = "SELECT  Judul, Genre, Penyanyi, Tanggal_terbit, Image_path FROM song WHERE  Judul LIKE '%".$keyword."%' OR  Penyanyi LIKE '%".$keyword."%' OR  Tanggal_terbit LIKE '%".$keyword."%'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){

            // Pagination
            $dataEachPage = 5;
            $dataTotal = $result->num_rows;
            $pageTotal = ceil($dataTotal / $dataEachPage);

            $dataStart = ($dataEachPage * $page) - $dataEachPage;
            $query = "SELECT Judul,Genre,Penyanyi,Tanggal_terbit,Image_path FROM song WHERE Judul LIKE '%".$keyword."%' OR  Penyanyi LIKE '%".$keyword."%' OR  Tanggal_terbit LIKE '%".$keyword."%' ORDER BY Tanggal_terbit LIMIT $dataStart, $dataEachPage";
            $result = $this->db->query($query)->fetch_all();

            $resp['data'] = $result;
            $resp['pageTotal'] = $pageTotal;
            return($resp);
        }
        else{
            return false;
        }
    }

    public function sort_tittle($keyword,$page){
        $query = "SELECT  Judul, Genre, Penyanyi, Tanggal_terbit, Image_path FROM song WHERE  Judul LIKE '%".$keyword."%' OR  Penyanyi LIKE '%".$keyword."%' OR  Tanggal_terbit LIKE '%".$keyword."%'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){

            // Pagination
            $dataEachPage = 5;
            $dataTotal = $result->num_rows;
            $pageTotal = ceil($dataTotal / $dataEachPage);

            $dataStart = ($dataEachPage * $page) - $dataEachPage;
            $query = "SELECT Judul,Genre,Penyanyi,Tanggal_terbit,Image_path FROM song WHERE Judul LIKE '%".$keyword."%' OR  Penyanyi LIKE '%".$keyword."%' OR  Tanggal_terbit LIKE '%".$keyword."%' ORDER BY Judul LIMIT $dataStart, $dataEachPage";
            $result = $this->db->query($query)->fetch_all();

            $resp['data'] = $result;
            $resp['pageTotal'] = $pageTotal;
            return($resp);
        }
        else{
            return false;
        }
    }

    public function get_song_detail($song_name){
        $query = "SELECT Judul, Penyanyi, Duration, Tanggal_terbit, Image_path, Genre, Audio_path FROM song WHERE REPLACE(Judul, ' ', '') = '$song_name'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return($result -> fetch_all());
        }
        else{
            return false;
        }
    }

    public function insert_song($judul, $penyanyi, $tanggal_terbit, $genre, $duration, $audio_path, $image_path){
        $query = "insert into song (judul, penyanyi, tanggal_terbit, Genre, duration, audio_path, image_path, album_id) values ('$judul', '$penyanyi', '$tanggal_terbit', '$genre', '$duration', '$audio_path', '$image_path', NULL)";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function edit_song_ia($judul_lama, $judul, $penyanyi, $tanggal_terbit, $genre, $duration, $audio_path, $image_path){
        $query = "UPDATE album SET Total_duration = Total_duration - (SELECT Duration FROM song WHERE REPLACE(Judul, ' ', '') = '$judul_lama') + $duration WHERE album_id = (SELECT album_id FROM song WHERE REPLACE(Judul, ' ', '') = '$judul_lama')";
        $result = $this->db->query($query);
        $query = "UPDATE song SET Judul='$judul', Penyanyi='$penyanyi', Tanggal_terbit='$tanggal_terbit', Genre='$genre', Duration='$duration', Audio_path='$audio_path', Image_path='$image_path' WHERE REPLACE(Judul, ' ', '') = '$judul_lama'";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function edit_song_i($judul_lama, $judul, $penyanyi, $tanggal_terbit, $genre, $image_path){
        $query = "UPDATE song SET Judul='$judul', Penyanyi='$penyanyi', Tanggal_terbit='$tanggal_terbit', Genre='$genre', Image_path='$image_path' WHERE REPLACE(Judul, ' ', '') = '$judul_lama'";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function edit_song_a($judul_lama, $judul, $penyanyi, $tanggal_terbit, $genre, $duration, $audio_path){
        $query = "UPDATE album SET Total_duration = Total_duration - (SELECT Duration FROM song WHERE REPLACE(Judul, ' ', '') = '$judul_lama') + $duration WHERE album_id = (SELECT album_id FROM song WHERE REPLACE(Judul, ' ', '') = '$judul_lama')";
        $result = $this->db->query($query);
        $query = "UPDATE song SET Judul='$judul', Penyanyi='$penyanyi', Tanggal_terbit='$tanggal_terbit', Genre='$genre', Duration='$duration', Audio_path='$audio_path' WHERE REPLACE(Judul, ' ', '') = '$judul_lama'";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function edit_song($judul_lama, $judul, $penyanyi, $tanggal_terbit, $genre){
        $query = "UPDATE song SET Judul='$judul', Penyanyi='$penyanyi', Tanggal_terbit='$tanggal_terbit', Genre='$genre' WHERE REPLACE(Judul, ' ', '') = '$judul_lama'";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_song($judul){
        //update album duration
        $query = "UPDATE album SET Total_duration = Total_duration - (SELECT Duration FROM song WHERE Judul = '$judul') WHERE album_id = (SELECT album_id FROM song WHERE Judul = '$judul')";
        $result = $this->db->query($query);
        $query = "DELETE FROM song WHERE REPLACE(Judul, ' ', '') = '$judul'";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_song_without_album($album_name){
        $query = "SELECT Judul, Penyanyi, Duration, Tanggal_terbit, Image_path, Genre, Audio_path FROM song WHERE album_id IS NULL AND Penyanyi = (SELECT Penyanyi FROM album WHERE REPLACE(Judul, ' ', '') = '$album_name')";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return($result -> fetch_all());
        }
        else{
            return false;
        }
    }

    public function add_song_to_album($album_name, $song_name){
        $query = "UPDATE album SET Total_duration = Total_duration + (SELECT Duration FROM song WHERE REPLACE(Judul, ' ', '') = '$song_name') WHERE album_id = (SELECT album_id FROM album WHERE REPLACE(Judul, ' ', '') = '$album_name')";
        $result = $this->db->query($query);
        $query = "UPDATE song SET album_id = (SELECT album_id FROM album WHERE REPLACE(Judul, ' ', '') = '$album_name') WHERE REPLACE(Judul, ' ', '') = '$song_name'";
        $result = $this->db->query($query);
        if ($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_song_from_album($album_name, $song_name){
        $query = "UPDATE album SET Total_duration = Total_duration - (SELECT Duration FROM song WHERE REPLACE(Judul, ' ', '') = '$song_name') WHERE album_id = (SELECT album_id FROM album WHERE REPLACE(Judul, ' ', '') = '$album_name')";
        $result = $this->db->query($query);
        $query = "UPDATE song SET album_id = NULL WHERE REPLACE(Judul, ' ', '') = '$song_name'";
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