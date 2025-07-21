<?php

class Api{

    //for omdb api
    public function omdb_fetch($movie_title){
        $url = "http://www.omdbapi.com/?apikey=".$_ENV['omdb_key']."&t=".$movie_title;
        $json = file_get_contents($url);
        $movie = json_decode($json, true);
        return $movie;
    }

    //for gemini api
    public function call_gemini($movie_title){
      
    }
}