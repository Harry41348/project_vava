<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

// Database Connection
require_once '../connect.php';

// Get the project
$query = "SELECT * FROM `video_projects` WHERE id=" . $_POST["id"];
$project = mysqli_query($con, $query);

if($project->num_rows === 1){
  $row = $project->fetch_row();
} else {
  die("ERROR: Project does not exist");
}

// Get the new values
if(isset($_POST["name"])){
  $project_name = $_POST["name"];
} else {
  $project_name = $row [1];
}
$num_of_photos = $_POST["num_of_photos"];
$order = $_POST["order"];

$sql  = "UPDATE `video_projects` SET `name` = '$project_name', `project_order` = '$order', ";
$sql .= "`num_of_photos` = '$num_of_photos' WHERE `video_projects`.`id`=";
$sql .= $_POST["id"];

if(!mysqli_query($con, $sql)){
  die("ERROR: Not able to execute $sql." . mysqli_error($sql));
}

header('Location: editproject.php?project=' . $_POST['id']);

$con->close();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>