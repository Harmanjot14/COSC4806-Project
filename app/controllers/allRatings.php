<?php

class AllRatings extends Controller{

    public function index(){
        session_start();

        $movieModel = $this->model('MovieRatings');
        $all_ratings = $movieModel-> get_all_ratings_with_username();
        $this->view('allRatings/index', ['ratings' => $all_ratings]);
    }
}