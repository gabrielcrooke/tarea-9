<?php

/**
 *
 */
class conexion extends mysqli
{

  function __construct()
  {
    parent::__construct("localhost", "root", "12345abc","Tarea9");
    $this->connect_errno ? die("BD!!!!") : null;
    $this->set_charset("utf8");

  }

  function rows($query)
  {
    return mysqli_num_rows($query);
  }

    public function free_R($query)
 {
   return mysqli_free_result($query);
 }

 public function fetch_A($query)
 {
   return mysqli_fetch_array($query);
 }

 public function fetch_O($query)
 {
   return mysqli_fetch_object($query);
 }

}




 ?>
