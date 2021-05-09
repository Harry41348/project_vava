<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

// Database Connection
require_once '../connect.php';

$fileDestination = $_SERVER['DOCUMENT_ROOT'] . $directory;
$fileDestination .= $_POST["dir"] . '/';

if (is_dir($fileDestination)) {
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

				<div class="admin-form new-content">
					<p class="admin-text">Add photos</p>
					<form class="add-project" action="addproject.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <?php 
						echo "<input type=\"hidden\" name=\"num_of_photos\" value=\"" . $_POST["num_of_photos"] . "\">";
						echo "<input type=\"hidden\" name=\"dir\" value=\"" . $_POST["dir"] . "\">";
						echo "<input type=\"hidden\" name=\"name\" value=\"" . $_POST["name"] . "\">";
						echo "<input type=\"hidden\" name=\"order\" value=\"" . $_POST["order"] . "\">";
              for ($i=1; $i < $_POST["num_of_photos"] + 1; $i++) { 
                echo "<input type=\"file\" accept=\"image/*\" name=\"image_" . $i . "\" id=\"image_" . $i .  "\">";
                echo "<label for=\"image_" . $i . "\">Image " . $i . "</label>";
              }
            ?>
						<button type="submit" name="submit">Add photos</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>