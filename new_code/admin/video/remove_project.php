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

$dir = $row[2];

$fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/projects/vava_project/videos/' . $dir . '/';
$it = new RecursiveDirectoryIterator($fileDestination, RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);

foreach($files as $file) {
    if ($file->isDir()){
        rmdir($file->getRealPath());
    } else {
        unlink($file->getRealPath());
    }
}

if (!rmdir($fileDestination)) {
	die("Directory failed to be removed.");
}

// Get the new values

$sql  = "DELETE FROM `video_projects` WHERE `video_projects`.`id` = " . $_POST["id"];

if(!mysqli_query($con, $sql)){
  die("ERROR: Not able to execute $sql." . mysqli_error($sql));
}

header('Location: existingvideos.php');

$con->close();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>