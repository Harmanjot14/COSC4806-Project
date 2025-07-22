<?php 

class Omdb extends Controller{
    public function index(){
        $this->view('movie/index');
    }
    
    public function search(){
        
        unset($_SESSION['success']);
        $movie_title = $_GET['movie'] ?? '';
        
        if(empty($movie_title)){
            $this->view('home/index');
            return;
        }
        $api = $this->model('Api');
        $movie = $api->omdb_fetch($movie_title);
        
        if (!$movie || $movie['Response'] === 'False') {
          $this->view('movie/index', ['error' => 'Movie not found.']);
          return;
        }
        $_SESSION['last_movie'] = $movie;  
        $movieRate = $this->model('MovieRatings');
        $done_rated = $movieRate->already_rated($movie['Title'], $_SESSION['user_id']);
        if($done_rated !== null){
            $_SESSION['error'] = "You have already rated this movie!";
            $_SESSION['rating_done'] = $done_rated;
        }
        else{
            unset($_SESSION['error'], $_SESSION['rating_done']);
        }
            
        $this->view('movie/index',['movie' => $movie]);
          
    }
  
}
