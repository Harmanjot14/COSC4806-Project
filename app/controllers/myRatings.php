<?php

class MyRatings extends Controller{

    public function index(){
        session_start();
        
        $movieModel = $this->model('MovieRatings');
        $user_id = $_SESSION['user_id'];
        $ratings = $movieModel->get_rating_by_user($user_id);
        $this->view('myRatings/index', ['ratings' => $ratings]);
    }
}

