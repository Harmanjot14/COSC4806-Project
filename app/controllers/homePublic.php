<?php

class HomePublic extends Controller {

    public function index() {
      $this->view('homePublic/index');
    }
    public function search(){
        $movie_title = $_GET['movie'] ?? '';

        if(empty($movie_title)){
            $this->view('homePublic/index');
            return;
        }
        $api = $this->model('Api');
        $movie = $api->omdb_fetch($movie_title);

        if (!$movie || $movie['Response'] === 'False') {
          $this->view('homePublic/index', ['error' => 'Movie not found.']);
          return;
        }

        $this->view('homePublic/index',['movie' => $movie]);

    }

}
