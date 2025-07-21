<?php

class Create extends Controller {

    public function index() {		
      $this->view('create/index');
    }

    public function save(){
      session_start();

      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        //to check if password match
        if ($password != $confirm_password){
           $_SESSION ['error'] = "Passwords do not match";
          header('Location: /create/index');
          return;
        }
        else{
          $user = $this->model('User');
          $result = $user->create_user($username, $password);
          if ($result == "Username and Password created successfully"){
            $_SESSION['failed_attempts'] = 0;
            $_SESSION['success'] = "Username and Password created successfully <br><br> <a href='/login'>Go to Login Page</a>";

            header('Location: /create/index');
            return;
          }
          else{
            $_SESSION['error'] = $result;
          }
        }
      }
    }
}
