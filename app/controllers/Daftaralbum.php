<?php

class Daftaralbum extends Controller {
    public function index(){
        $page = $_POST['albumPage'];
        $list_of_album = $this->model("Album")->get_album($page);

        $this->view('daftaralbum/user',$list_of_album);
    }
    public function admin($page){

        $list_of_album = $this->model("Album")->get_album($page);

        $this->view('daftaralbum/admin',$list_of_album);
    }
    public function user($page){

        $list_of_album = $this->model("Album")->get_album($page);
        
        $this->view('daftaralbum/user',$list_of_album);
    }

    public function album($page){
        $list_of_album = $this->model("Album")->get_album($page);

        $this->view('daftaralbum/pagination_page',$list_of_album);
    }
}
