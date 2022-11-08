<?php

class Register extends Controller {
    public function index(){
        $this->view('register/index');
    }

    public function register_check(){
        if(isset($_POST["username"]) and isset($_POST["email"])){
            $email = $_POST["email"];
            $username = $_POST["username"];
            $result1 = $this->model('User')->get_user_id($username);
            $result2 = $this->model('User')->get_user_id_by_email($email);
            if ($result1 === false and $result2 === false) {
                echo "ok";
            } else if($result1 and $result2 === false){
                echo "username";
            } else if($result2 and $result1 === false){
                echo "email";
            } else {
                echo "both";
            }
        } else {
            echo "wrong";
        }
        
    }

    public function logic(){
        if (isset($_POST["username"]) and isset($_POST["email"]) and isset($_POST["password"]) and isset($_POST["confirm-password"])) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirm-password"];
            if ($password == $confirmpassword) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $search_username = $this->model('User')->get_user_id($username);
                $search_email = $this->model('User')->get_user_id_by_email($email);
                if ($search_username !== false) {
                    echo "<p>Your username is already registered.</p>";
                } else if($search_email !== false){
                    echo "<p>Your email is already registered.</p>";
                }else {
                    if ($this->model('User')->insert_user($email, $hashed_password, $username)) {
                        header("Location: /binotify-app/public/login/index");
                        exit();
                    } else {
                        echo "<p>An error occured while we were registering your account. Pls try again.</p>";
                    }
                }
            }
        } 
    }
}