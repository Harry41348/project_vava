<?php
// session_start();

// Database Connection
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "valeurdb";

// $con = mysqli_connect($server, $username, $password, $database);

// if(!$con) { die("Database connection failed!"); }


if (isset($_POST['submit'])) {
  // $image = $_FILES['image'];

  $fileName = $_FILES['image']['name'];
  $fileTmpName = $_FILES['image']['tmp_name'];
  $fileError = $_FILES['image']['error'];
  $fileType = $_FILES['image']['type'];

  // echo $fileName . "<br/>" . $fileTmpName . "<br/>" . $fileError  . "<br/>" . $fileType;

  // die();
  
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if($fileError === 0){
      // $fileNameNew = $_POST['folder'] . "." . $fileActualExt;
      
      $fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/projects/vava_project/imgs/';
      $fileDestination .= $_POST['folder'] . '/';

      if (!is_dir($fileDestination)) {
        //die("Not a directory.");
        mkdir($fileDestination, 0777, true);
      }

      if(!is_writable($fileDestination)){
        die("Not writable.");
      }

      if($_POST['order'] == 1) {
        $fileDestination .= 'head.';
      } else {
        $fileDestination .= 'img_' . $_POST['order'] . '.';
      }

      $fileDestination .= $fileActualExt;

      if(move_uploaded_file($fileTmpName, $fileDestination)){
        
      } else {
        die("Not uploaded because of error #".$_FILES["image"]["error"]);
      }
      
      header("location: ../editproject.php?project=" . $_POST["id"]);
    } else {
      echo "There was an error with the file upload.";
    }
  } else {
    echo "Allowed file types: 'jpg', 'jpeg' and 'png'.";
  }
}

$con->close();
?>