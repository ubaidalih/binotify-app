<?php
require_once('../../app/models/Config.php');

if(isset($_POST["subscriber_id"]) && isset($_POST["creator_id"]) && isset($_POST["status"])){
    $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    
    $subscriber_id = $_POST["subscriber_id"];
    $creator_id = $_POST["creator_id"];
    $status = $_POST["status"];

    $checking_query = "SELECT * From subscription WHERE creator_id = '$creator_id' AND subscriber_id='$subscriber_id'";
    $check_result= $db->query($checking_query);
    if ($check_result->num_rows == 0){
        $query = "INSERT INTO subscription(creator_id,subscriber_id,status) VALUES('$creator_id','$subscriber_id', '$status');";
        $result = $db->query($query);
    }
    else{
        $query = "UPDATE subscription SET status='$status' WHERE creator_id='$creator_id' AND subscriber_id='$subscriber_id'";
        $result = $db->query($query);
    }
    if($result){
        $response = ["status" => "success"];
        echo json_encode($response); 
    }
    else{
        $response = ["status" => "failed"];
        echo json_encode($response); 
    }
}
?>