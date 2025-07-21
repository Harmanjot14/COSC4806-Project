<?php

class HomePublic extends Controller {

    public function index() {
      $this->view('homePublic/index');
      die;
    }

}
