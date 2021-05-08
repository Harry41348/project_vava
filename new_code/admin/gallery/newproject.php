<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

// Database Connection
require_once '../connect.php';

$fileDestination = $_SERVER['DOCUMENT_ROOT'] . '/projects/vava_project/imgs/';
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



$con->close();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Panel</title>
		<link href="../../css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<?php include("../nav.php") ?>

		<!-- Content -->
		<div class="content">
			<div class="add-photos-wrapper">

				<div class="register register-photos">
					<p class="admin-text">Add photos</p>
					<form action="addproject.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <?php 
						echo "<input type=\"hidden\" name=\"num_of_photos\" value=\"" . $_POST["num_of_photos"] . "\">";
						echo "<input type=\"hidden\" name=\"dir\" value=\"" . $_POST["dir"] . "\">";
              for ($i=1; $i < $_POST["num_of_photos"] + 1; $i++) { 
                echo "<label for=\"image_" . $i . "\">Image " . $i . "</label>";
                echo "<input type=\"file\" accept=\"image/*\" name=\"image_" . $i . "\" id=\"image " . $i .  "\" required>";
              }
            ?>
						<button type="submit" name="submit">Add photos</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>