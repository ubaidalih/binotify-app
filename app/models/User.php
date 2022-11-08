<?php
require_once('Config.php');

class User{
    private $db;
    public function __construct(){
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    }


    // insert new user
    public function insert_user($email, $password, $username){
        $query = "INSERT INTO user(email, password, username, isAdmin) 
                    VALUES('$email', '$password', '$username', 0)";
        if ($this->db->query($query) === TRUE){
            return true;
        } else {
            return false;
        }
    }

    public function get_user_id($username){
        $query = "SELECT user_id FROM user WHERE username = '$username'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return ($result->fetch_all()[0][0]);
        } else {
            return false;
        }
    }

    public function get_user_id_by_email($email){
        $query = "SELECT user_id FROM user WHERE email = '$email'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return ($result->fetch_all()[0][0]);
        } else {
            return false;
        }
    }

    // return user (id, username, email, role)
    public function get_user($username, $password){
        $query = "SELECT user_id, username, email, isAdmin FROM user
                    WHERE username='$username' and password='$password'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return ($result->fetch_all());
        } else {
            return false;
        }
    }

    // return user (id, username, email, role)
    public function get_user_by_email($email, $password) {
        $query = "SELECT user_id, username, password, email, isAdmin FROM user
                    WHERE email='$email'";
        $result = $this->db->query($query);
        if($result->num_rows != 0) {
            $result = $result->fetch_all();
            if(password_verify($password, $result[0][2])){
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    # get role from username
    public function get_role($username){
        $query = "SELECT isAdmin FROM user
                    WHERE username='$username'";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return ($result->fetch_all()[0][0]);
        } else {
            return "User not found";
        }
    }

    public function get_all_user(){
        $query = "SELECT username, email FROM user";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return ($result->fetch_all());
        } else {
            return false;
        }
    }
}

?>