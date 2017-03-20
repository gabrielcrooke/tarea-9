<?php

/**
 *
 */
class home extends controllers
{

  function __construct()
  {

  }

  //twig values
  public function index($data = [])
  {
      $user = $this->model("userModel");
      $this->view("index",[]);

  }
  public function perfil($data = [])
  {
      $user = $this->model("userModel");
      $this->view("perfil",[]);

  }
  public function aboutUs($data = [])
  {
      $user = $this->model("userModel");
      $this->view("aboutUs",[]);

  }
}



 ?>
