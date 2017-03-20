<?php

/**
 *
 */
class aboutUs extends controllers
{

  function __construct()
  {
    # code...
  }

  public function index($data = [])
  {
      $user = $this->model("userModel");
      $this->view("index",[]);

  }
}



 ?>
