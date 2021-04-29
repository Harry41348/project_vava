<?php

  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "valeurdb";

  $con = mysqli_connect($server, $username, $password, $database);

  if(!$con) { die("Database connection failed!"); }

?>