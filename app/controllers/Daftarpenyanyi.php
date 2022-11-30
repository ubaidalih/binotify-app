<?php

class Daftarpenyanyi extends Controller {
    public function index(){
        while (true) {
            $page = $_POST['pageTotal'];
            $list_of_penyanyi = $this->model("Penyanyi")->get_penyanyi($page);

            $this->model("Subscription")->refresh();
            $this->view('daftarpenyanyi/index',$list_of_penyanyi);

            sleep(30);
        }
    }

    public function user($page){
        $while (true) {
            $list_of_penyanyi = $this->model("Penyanyi")->get_penyanyi($page);

            $this->model("Subscription")->refresh();
            $this->view('daftarpenyanyi/index',$list_of_penyanyi);

            sleep(30);
        }
    }

    public function penyanyi($page){
        while (true) {
            $list_of_penyanyi = $this->model("Penyanyi")->get_penyanyi($page);

            $this->model("Subscription")->refresh();
            $this->view('daftarpenyanyi/index',$list_of_penyanyi);

            sleep(30);
        }
    }
}
