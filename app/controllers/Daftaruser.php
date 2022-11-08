<?php

class Daftaruser extends Controller {
    public function index(){
        $list_of_user = $this->model("User")->get_all_user();

        $this->view('daftaruser/index', $list_of_user);
    }
    
}