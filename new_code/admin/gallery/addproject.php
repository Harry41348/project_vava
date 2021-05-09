<?php

session_start();

// Database Connection
require_once '../connect.php';

$fileDestination = $_SERVER['DOCUMENT_ROOT'] . $directory;
$fileDestination .= $_POST["dir"] . '/';

if (!is_dir($fileDestination)) {
	//die("Not a directory.");
	mkdir($fileDestination, 0777, true);

	$sql = "INSERT INTO `photography_projects` (`name`, `image_pointer`, `date`, `order_index`, `number_of_photos`)";
	$sql .= "VALUES ('" . $_POST["name"] . "', '" . $_POST["dir"] . "', '2021-03-08', '" . $_POST["order"];
	$sql .= "', '". $_POST["num_of_photos"] . "');";

	if(!mysqli_query($con, $sql)){
		die("ERROR: Not able to execute $sql." . mysqli_error($sql));
	}
} else {
	die("ERROR: Directory already exists");
}

for ($i=1; $i < $_POST["num_of_photos"]+1; $i++) {
  $image_name = "image_" . $i;
  $fileTmpName = $_FILES[$image_name]['tmp_name'];
  if(is_uploaded_file($fileTmpName)){
      // $image = $_FILES[$image_name];
    
    $fileName = $_FILES[$image_name]['name'];
    $fileError = $_FILES[$image_name]['error'];
    $fileType = $_FILES[$image_name]['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
      if($fileError === 0){
        // $fileNameNew = "project_test";
        
        $fileDestination = $_SERVER['DOCUMENT_ROOT'] . $directory;
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

        $fileDestination .= 'jpg';

        if(move_uploaded_file($fileTmpName, $fileDestination)){
          
        } else {
          die("Not uploaded because of error #".$_FILES["image"]["error"]);
        }
      } else {
        die("There was an error with the file upload.");
      }
    } else {
      die("Allowed file types: 'jpg', 'jpeg' and 'png'.");
    }
  }
}

header("location: ../index.php");

$con->close();

?>