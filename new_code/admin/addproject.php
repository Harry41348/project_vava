<?php

session_start();

// Database Connection
$server = "localhost";
$username = "root";
$password = "";
$database = "valeurdb";

$con = mysqli_connect($server, $username, $password, $database);

if(!$con) { die("Database connection failed!"); }

for ($i=1; $i < $_POST["num_of_photos"]+1; $i++) { 
  $image_name = "image_" . $i;
    // $image = $_FILES[$image_name];
  
  $fileName = $_FILES[$image_name]['name'];
  $fileTmpName = $_FILES[$image_name]['tmp_name'];
  $fileError = $_FILES[$image_name]['error'];
  $fileType = $_FILES[$image_name]['type'];
  
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if($fileError === 0){
      // $fileNameNew = "project_test";
      
      $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/projects/vava_project/imgs/';
      $fileDestination .= $_POST['dir'] . '/';

      
      if (!is_dir($fileDestination)) {
        die("Not a directory.");
      }
      if(!is_writable($fileDestination)){
        die("Not writable.");
      }

      if($i == 1) {
        $fileDestination .= 'head.';
      } else {
        $fileDestination .= 'img_' . $i . '.';
      }

      $fileDestination .= $fileActualExt;

      if(move_uploaded_file($fileTmpName, $fileDestination)){
        
      } else {
        die("Not uploaded because of error #".$_FILES["image"]["error"]);
      }
      
      header("location: index.php");
    } else {
      echo "There was an error with the file upload.";
    }
  } else {
    echo "Allowed file types: 'jpg', 'jpeg' and 'png'.";
  }
}

$con->close();

?>