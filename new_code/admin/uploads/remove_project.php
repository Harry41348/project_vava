<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

// Database Connection
$server = "localhost";
$username = "root";
$password = "";
$database = "valeurdb";

$con = mysqli_connect($server, $username, $password, $database);

if(!$con) { die("Database connection failed!"); }

// Get the project
$query = "SELECT * FROM `photography_projects` WHERE project_id=" . $_POST["id"];
$project = mysqli_query($con, $query);

if($project->num_rows === 1){
  $row = $project->fetch_row();
} else {
  die("ERROR: Project does not exist");
}

$dir = $row[2];

// Get the new values

$sql  = "DELETE FROM `photography_projects` WHERE `photography_projects`.`project_id` = " . $_POST["id"];

if(!mysqli_query($con, $sql)){
  die("ERROR: Not able to execute $sql." . mysqli_error($sql));
}

header('Location: ../editproject.php?project=' . $_POST['id']);

$con->close();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>