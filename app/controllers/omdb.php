<?php 

class Omdb extends Controller{
    public function index(){
        $this->view('movie/index');
    }
    public function search(){
        $movie_title = $_GET['movie'] ?? '';
        if(empty($movie_title)){
            $this->view('home/index');
            die;
        }
        $api = $this->model('Api');
        $movie = $api->omdb_fetch($movie_title);
        $this->view('movie/index',['movie' => $movie]);
    }
  
}
