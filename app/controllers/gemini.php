<?php 

class Gemini extends Controller{
    public function index(){
        $this->view('movie/index');
    }

    public function review(){
        $rawData = file_get_contents('php://input');
        $data = json_decode($rawData, true);
        
        $movie_title = $data['movie_title'] ?? '';
        $api = $this->model('Api');
        $review = $api->call_gemini($movie_title);
        
        header('Content-Type: application/json');
        echo json_encode(['review' => $review]);
       
    }
}