<?php

class Movie extends Controller{
  
    public function index(){
        $this->view('movie/index');
    }
    
    public function rate(){
        $movie_title = $_POST['movie_title'];
        $user_rating = $_POST['user_rating'];
        $user_id = $_SESSION['user_id'];
        
        $movieRate = $this->model('MovieRatings');
        $movieRate->rate_movie($movie_title, $user_rating, $user_id);
        
        header("Location: /movie/index");
        exit;
    }

  
    
}