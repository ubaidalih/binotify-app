<?php
        require_once __DIR__."/../models/Music.php";

class Home extends Controller {
    public function index(){
        $Music = new Music();
        $data = $Music->get_top_ten_music();

        $this->view('home/user',$data);
    }
    public function admin(){
        $Music = new Music();
        $list_of_music = $Music->get_top_ten_music();

        $this->view('home/admin', $list_of_music);
    }
    public function user(){
        $Music = new Music();
        $data= $Music->get_top_ten_music();

        $this->view('home/user',$data);
    }

    public function search(){
        $Music = new Music();
        $key = $_POST['keyword'];
        $page = $_POST['page'];

        $data['music']= $Music->search_music($key,$page);
        $data['genre']= $Music->get_all_genre();

        $this->view('home/search-page',$data);
    }

    public function dateSorted(){
        $Music = new Music();
        $key = $_POST['keyword'];
        $page = $_POST['page'];

        $data['music'] = $Music->sort_date($key,$page);
        $data['genre']= $Music->get_all_genre();
        $this->view('home/search-page',$data);
    }

    public function tittleSorted(){
        $Music = new Music();
        $key = $_POST['keyword'];
        $page = $_POST['page'];

        $data['music'] = $Music->sort_tittle($key,$page);
        $data['genre']= $Music->get_all_genre();
        $this->view('home/search-page',$data);
    }

    public function filter_genre($genre){
        $Music = new Music();
        $key = $_POST['keyword'];
        $page = $_POST['page'];
        $data['genre']= $Music->get_all_genre();
        $data['music'] = $Music->genre_filter($key,$page,$genre);

        $this->view('home/search-page',$data);
    }

    public function logout(){
        if (isset($_COOKIE['username'])) {
            // unset($_COOKIE['username']);
            setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp
        }
        if (isset($_COOKIE['role'])) {
            // unset($_COOKIE['role']);
            setcookie('role', '', time() - 3600, '/'); // empty value and old timestamp
        }
        header("Location: /tugas-besar-1/public/Login");
        // setcookie("username","",time()-3600, "/");
        // setcookie("role","",time()-3600,"/");
    }
}