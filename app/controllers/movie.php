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
        $done_rated = $movieRate->already_rated($movie_title, $user_id);
        if($done_rated !== null){
            $_SESSION['error'] = "You have already rated this movie!";
            $_SESSION['rating_done'] = $done_rated;
        }
        else{
            $movieRate->rate_movie($movie_title, $user_rating, $user_id);
            $_SESSION['success'] = "Rating submitted successfully!";
            $_SESSION['rating_done'] = $user_rating;
        }
        
        $movie = $_SESSION['last_movie'] ?? null;
        $this->view('movie/index', ['movie' => $movie]);
        
    }

  
    
}