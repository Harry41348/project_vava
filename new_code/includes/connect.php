<?php

  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "vava_photography";

  $con = mysqli_connect($server, $username, $password, $database);

  if(!$con) { die("Database connection failed!"); }

?>