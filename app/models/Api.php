<?php

class Api{

    //for omdb api
    public function omdb_fetch($movie_title){
        $url = "http://www.omdbapi.com/?apikey=".$_ENV['omdb_key']."&t=".urlencode($movie_title);
        $json = file_get_contents($url);
        $movie = json_decode($json, true);
        return $movie;
    }

    //for gemini api
    public function call_gemini($movie_title){
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=".$_ENV['GEMINI_KEY'];
        $text = "Write a few sentences review about the movie with movie release date and people opinion " . $movie_title;
        $data = array(
            "contents" => array(
              array(
                "parts" => array(
                  array(
                    "text" => $text
                  )
                )
              )
            )
        );

        $json_data = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        
        if(curl_errno($ch)){
          echo 'Curl error: ' . curl_error($ch);
        }  
        curl_close($ch);
        $json = json_decode($response, true);
        return $json ['candidates'][0] ['content']['parts'][0]['text'] ?? 'Gemini could not provide a review' ;
    }

    
}