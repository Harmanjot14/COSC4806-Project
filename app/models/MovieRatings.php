<?php

Class MovieRatings{
  
   public function __construct(){
     
   }
   //insert rating into database
   public function rate_movie($movie_title, $user_rating, $user_id){
      $db = db_connect();
      $statement = $db->prepare("INSERT INTO ratings (movie_title, user_rating, user_id) VALUES (:movie_title, :user_rating, :user_id);");
      $statement->execute(['movie_title' => $movie_title, 'user_rating' => $user_rating, 'user_id' => $user_id]);
   }

   //for the users that already rated the movie
   public function already_rated($movie_title, $user_id){
      $db = db_connect();
      $statement = $db->prepare("SELECT * FROM ratings WHERE movie_title = :movie_title AND user_id = :user_id;");
      $statement->execute(['movie_title' => $movie_title, 'user_id' => $user_id]);
      $result = $statement->fetch(PDO::FETCH_ASSOC);
      return $result['user_rating'] ?? null;
   }

}