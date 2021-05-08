<?php

    $server = "localhost:3306";
    $username = "qjujzxmy_admin_v";
    $password = "valeuradmin";
    $database = "qjujzxmy_valeurdb";


    $con = mysqli_connect($server, $username, $password, $database);

    if(!$con) { die("Database connection failed!"); }

?>