<?php
require_once('Config.php');

Class Penyanyi {
    private $db;
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    }

    public function get_penyanyi($page){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost:3000/api/listpenyanyi/');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result);
        if (count($result) != 0){
            // Pagination
            $dataTotal = count($result);
            $dataEachPage = 5;
            $pageTotal = ceil($dataTotal / $dataEachPage);

            $dataStart = ($dataEachPage * $page) - $dataEachPage;
            $result = array_slice($result, $dataStart, min($dataTotal - $dataStart, $dataEachPage));

            //check for subscription in db
            for($i = 0; $i < count($result); $i++){
                $query = "SELECT status FROM subscription INNER JOIN user WHERE subscriber_id = user_id AND username = '".$_COOKIE['username']."' AND creator_id = '".$result[$i]->user_id."'";
                $result2 = $this->db->query($query);
                if ($result2->num_rows != 0){
                    $result2 = $result2->fetch_all();
                    $result[$i]->subscribed = $result2[0][0];
                }
                else{
                    $result[$i]->subscribed = false;
                }
            }

            $resp['data'] = $result;
            $resp['pageTotal'] = $pageTotal;
            return($resp);
        }
        else{
            return false;
        }
    }
}
?>