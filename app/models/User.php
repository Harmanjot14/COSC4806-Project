<?php

Class User {

  public $username;
  public $password;
  public $auth = false;

  public function __construct() {

  }

  public function test () {
    $db = db_connect();
    $statement = $db->prepare("select * from users;");
    $statement->execute();
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    return $rows;
  }

  /*to log all the login attempts to the database*/
  public function login_attempts($username, $status){
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO login_attempts (username, status, time) VALUES (:username, :status, NOW());");
    $statement->execute(['username' => $username, 'status' => $status]);
  }


  public function authenticate($username, $password) {
    $username = strtolower($username);
    $db = db_connect();
    $statement = $db->prepare("select * from users WHERE username = :name;");
    $statement->bindValue(':name', $username);
    $statement->execute();
    $rows = $statement->fetch(PDO::FETCH_ASSOC);

    /*unset lockout after 60sec*/
    if(isset($_SESSION['lockout']) && $_SESSION['lockout'] <= time()){
      unset($_SESSION['lockout']);
      unset($_SESSION['failedAuth']);
    }
    /*lockout for 60 seconds*/
    if(isset($_SESSION['lockout']) && $_SESSION['lockout'] > time()){
      $_SESSION['error'] = "You have been locked out for 60 seconds, Please try again later";
      header('Location: /login');
      exit;
    }

    if (password_verify($password, $rows['password'])) {
      $_SESSION['auth'] = 1;
      $_SESSION['username'] = ucwords($username);
      $_SESSION['user_id'] = $rows['id'];    

      unset($_SESSION['failedAuth']);
      /*Added login_attempt good in table after succesful login*/
      $this->login_attempts($username, 'Good');
      header('Location: /home');
      die;
    } else {
        if(isset($_SESSION['failedAuth'])) {
          $_SESSION['failedAuth'] ++; //increment
        } else {
          $_SESSION['failedAuth'] = 1;
        }
        /*Added login_attempt bad in table after failed login*/
       $this->login_attempts($username, 'Bad');

       if($_SESSION['failedAuth'] >= 3){
         $_SESSION['lockout'] = time() + 60;
         $_SESSION['error'] = "You have been locked out for 60 seconds, Please try again later";
       }
       else{
         $_SESSION['error'] = "Invalid username or password";
       }
        header('Location: /login');
        die;
      }
    }

  /* to create a new user*/
  public function create_user($username, $password){
    $db = db_connect();
    /*to check if username already exists*/
    $statement = $db->prepare("select * from users where username = :username;");
    $statement->execute(['username' => $username]);
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    if ($rows){
      return "Username already exists";
    }
    /*validate password is at least 10 characters*/
    if (strlen($password) < 10 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password)){
      $_SESSION['error'] = "Password must be at least 10 characters, contain at least one uppercase letter and one lowercase letter";
      header('Location: /create/index');
      exit;
    }

    /*hashed password*/
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    /*create a new user*/
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password);");
    $statement->execute(['username' => $username, 'password' => $hashedPassword]);
    return "Username and Password created successfully";
  }

}
