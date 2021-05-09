<?php

  $location = '/projects/vava_project/';

  $directory = $location . 'imgs/';
  $video_directory = $location . 'videos/';
  $admin_directory = $location . 'admin/';
  

  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "valeurdb";

  // $server = "localhost:3306";
  // $username = "qjujzxmy_admin_v";
  // $password = "valeuradmin";
  // $database = "qjujzxmy_valeurdb";

  $con = mysqli_connect($server, $username, $password, $database);

  if(!$con) { die("Database connection failed!"); }

?>