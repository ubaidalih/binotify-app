<?php

class Lagupremium extends Controller {
    public function index($penyanyi_id){
        $data = $this->model("Premiumsong")->get_lagupremium($penyanyi_id, 1);

        $this->view('lagupremium/index',$data);
    }

    public function user($penyanyi_id, $page){

        $data = $this->model("Premiumsong")->get_lagupremium($penyanyi_id, $page);
        
        $this->view('lagupremium/index',$data);
    }

    public function lagu($penyanyi_id, $page){
        $data = $this->model("Premiumsong")->get_lagupremium($penyanyi_id, $page);

        $this->view('lagupremium/pagination_page',$data);
    }
}
