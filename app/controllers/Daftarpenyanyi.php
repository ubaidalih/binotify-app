<?php

class Daftarpenyanyi extends Controller {
    public function index(){
        
        $page = $_POST['pageTotal'];
        $list_of_penyanyi = $this->model("Penyanyi")->get_penyanyi($page);

        $this->model("Subscription")->refresh();
        $this->view('daftarpenyanyi/index',$list_of_penyanyi);

    }

    public function user($page){

        
        $this->model("Subscription")->refresh();
        $list_of_penyanyi = $this->model("Penyanyi")->get_penyanyi($page);

        $this->view('daftarpenyanyi/index',$list_of_penyanyi);

    }

    public function penyanyi($page){
        $this->model("Subscription")->refresh();
        $list_of_penyanyi = $this->model("Penyanyi")->get_penyanyi($page);


        $this->view('daftarpenyanyi/index',$list_of_penyanyi);

    }
}
