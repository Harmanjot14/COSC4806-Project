<?php

Class MovieRatings{
  
   public function __construct(){
     
   }
   public function rate_movie($movie_title, $user_rating, $user_id){
      $db = db_connect();
      $statement = $db->prepare("INSERT INTO ratings (movie_title, user_rating, user_id) VALUES (:movie_title, :user_rating, :user_id);");
      $statement->execute(['movie_title' => $movie_title, 'user_rating' => $user_rating, 'user_id' => $user_id]);
      return "Movie rated successfully";
   }
}