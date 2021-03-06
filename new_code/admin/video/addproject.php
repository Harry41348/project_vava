<?php

session_start();

// Database Connection
require_once '../connect.php';

$fileDestination = $_SERVER['DOCUMENT_ROOT'] . $video_directory;
$fileDestination .= $_POST["dir"] . '/';

if (!is_dir($fileDestination)) {
	//die("Not a directory.");
	
	if (!mkdir($fileDestination, 0777, true)) {
		die("Failed to create");
	}

	$sql = "INSERT INTO `video_projects` (`name`, `pointer`, `date`, `project_order`, `num_of_photos`)";
	$sql .= "VALUES ('" . $_POST["name"] . "', '" . $_POST["dir"] . "', '2021-03-08', '" . $_POST["order"];
	$sql .= "', '". $_POST["num_of_photos"] . "');";

	if(!mysqli_query($con, $sql)){
		die("ERROR: Not able to execute $sql." . mysqli_error($sql));
	}
} else {
	die("ERROR: Directory already exists");
}

// Images

for ($i=0; $i < $_POST["num_of_photos"]+1; $i++) { 
  if($i == 0){
    $image_name = "thumbnail";
  } else {
    $image_name = "image_" . $i;
  }
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
      
      $fileDestination = $_SERVER['DOCUMENT_ROOT'] . $video_directory;
      $fileDestination .= $_POST['dir'] . '/';

      
      if (!is_dir($fileDestination)) {
        die("Not a directory.");
      }
      if(!is_writable($fileDestination)){
        die("Not writable.");
      }

      if($i == 0) {
        $fileDestination .= 'thumbnail.';
      } else {
        $fileDestination .= 'img_' . $i . '.';
      }

      $fileDestination .= "jpg";

      if(move_uploaded_file($fileTmpName, $fileDestination)){
        
      } else {
        die("Not uploaded because of error #".$_FILES["image"]["error"]);
      }
      
      // header("location: ../index.php");
    } else {
      echo "There was an error with the file upload.";
    }
  } else {
    echo "Allowed file types: 'jpg', 'jpeg' and 'png'.";
  }
}

// $image = $_FILES[$image_name];

$video = 'video';

$fileName = $_FILES[$video]['name'];
$fileTmpName = $_FILES[$video]['tmp_name'];
$fileError = $_FILES[$video]['error'];
$fileType = $_FILES[$video]['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('mp4');

if (in_array($fileActualExt, $allowed)) {
  if($fileError === 0){
    // $fileNameNew = "project_test";
    
    $fileDestination = $_SERVER['DOCUMENT_ROOT'] . $video_directory;
    $fileDestination .= $_POST['dir'] . '/';

    
    if (!is_dir($fileDestination)) {
      die("Not a directory.");
    }
    if(!is_writable($fileDestination)){
      die("Not writable.");
    }

    $fileDestination .= 'video.mp4';

    if(move_uploaded_file($fileTmpName, $fileDestination)){
      
    } else {
      die("Not uploaded because of error #".$_FILES[$video]["error"]);
    }
    
    header("location: ../index.php");
  } else {
    echo "There was an error with the file upload.";
  }
} else {
  echo "Allowed file types: 'jpg', 'jpeg' and 'png'.";
}

$con->close();

?>