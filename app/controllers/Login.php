<?php

class Login extends Controller {
    public function index(){
        $this->view('login/index');
    }

    public function login_check(){
        if(isset($_POST["email"]) and isset($_POST["password"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $result = $this->model('User')->get_user_by_email($email, $password);
            if ($result !== false) {
                echo "ok";
            } else {
                echo "wrong";
            }
        }
        else{
            echo "wrong";
        }
    }

    public function logic(){
        if (isset($_POST["email"]) and isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $result = $this->model("User")->get_user_by_email($email, $password);
            if ($result) {
                $role = $result[0][4];
                $username = $result[0][1];
                setcookie("username", $username, time() + (86400), "/");
                setcookie("role", $role, time() + (86400), "/");
                if($role == "1")
                    header("Location: /tugas-besar-1/public/home/admin");
                else{
                    header("Location: /tugas-besar-1/public/home/user");
                }
            }
        }
    }

    // public function submit(){
    //     if (isset($_POST["email"]) and isset($_POST["password"])) {
    //         // $model_path = '../../models/User.php';
    //         // // $model_path = '/tugas-besar-1/app/models/User.php';
    //         // require_once($model_path);
    //         // $User = new User();

    //         $email = $_POST["email"];
    //         $password = $_POST["password"];
    //         $data["result"] = $this->model('User')->get_user_by_email($email, $password);
    //         $this->view('login/index', $data);
    //         // if ($result) {
    //         //     $role = $result[0][3];
    //         //     $username = $result[0][1];
    //         //     setcookie("username", $username, time() + (86400 * 30), "/"); // 30 hari, "/" artinya cookie buat seluruh website
    //         //     setcookie("role", $role, time() + (86400 * 30), "/"); 
    //         //     header("Location: /app/views/home/index.php");
    //         //     exit();
    //         // }
    //     }
    // }
}