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
    }
?>