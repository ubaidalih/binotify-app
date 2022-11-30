<?php
    require_once('Config.php');
    class Subscription{
        private $db;
        public function __construct()
        {
            $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        }
        
        public function addSubscription($creator_id,$subscriber_id){
            $checking_query = "SELECT * From subscription WHERE creator_id = '$creator_id' AND subscriber_id='$subscriber_id'";
            $check_result= $this->db->query($checking_query);
            if ($check_result->num_rows == 0){
                $query = "INSERT INTO subscription(creator_id,subscriber_id) VALUES('$creator_id','$subscriber_id');";
                $result = $this->db->query($query);

            }
            else{
                $query = "UPDATE subscription SET status='PENDING' WHERE creator_id='$creator_id' AND subscriber_id='$subscriber_id'";
                $result = $this->db->query($query);

            }
        }

        public function refreshSubscription($creator_id, $subscriber_id, $status){
            $checking_query = "SELECT * From subscription WHERE creator_id = '$creator_id' AND subscriber_id='$subscriber_id'";
            $check_result= $this->db->query($checking_query);
            if ($check_result->num_rows == 0){
                $query = "INSERT INTO subscription(creator_id,subscriber_id,status) VALUES('$creator_id','$subscriber_id', '$status');";
                $result = $this->db->query($query);

            }
            else{
                $query = "UPDATE subscription SET status='$status' WHERE creator_id='$creator_id' AND subscriber_id='$subscriber_id'";
                $result = $this->db->query($query);

            }
        }

        public function refresh(){
            $wsdl   = 'http://localhost:3060/binotify-soap-service/subscription?wsdl';
            $client = new SoapClient($wsdl, array('trace'=>1));
            $response_param = $client->getAllRequest();
            $array = json_decode(json_encode($response_param),true);

            foreach($array["return"] as $subscript){
                $this->refreshSubscription($subscript["creator_id"],$subscript["subscriber_id"],$subscript["status"]);
            }
        }
    }
?>