<?php
require_once('Config.php');

Class Premiumsong {
    private $db;
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    }

    public function get_lagupremium($penyanyi_id, $page){
        $ch = curl_init();
        $data = array(
            'user_id' => $penyanyi_id
        );
        $queryString =  http_build_query($data);
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/api/listpenyanyi/id?'.$queryString);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        $resp['name'] = $result[0]->name;
        
        $username = $_COOKIE['username'];
        $query = "SELECT user_id FROM user WHERE username = '$username'";
        $result = $this->db->query($query);
        $result = $result->fetch_all();
        $user_id = $result[0][0];
        $ch = curl_init();
        $data = array(
            'creator_id' => $penyanyi_id,
            'subscriber_id' => $user_id
        );
        $data =  http_build_query($data);
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/api/song/read');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        var_dump($result);
        $resp['list_of_song'] = [];
        if (count($result) != 0){
            // Pagination
            $dataEachPage = 5;
            $dataTotal = count($result);
            $pageTotal = ceil($dataTotal / $dataEachPage);

            $dataStart = ($dataEachPage * $page) - $dataEachPage;
            $result = array_slice($result, $dataStart, min($dataTotal - $dataStart, $dataEachPage));
            $resp['list_of_song'] = $result;
            
            $resp['pageTotal'] = $pageTotal;
            return($resp);
        }
        else{
            return($resp);
        }
    }
}
?>