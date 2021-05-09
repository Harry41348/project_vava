<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin Panel</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<?php include("nav.php") ?>

		<!-- Content -->
		<div class="content">
			<p class="admin-text">Admin Panel</p>
			<p>Welcome back, <span style="text-transform: capitalize;"><?=$_SESSION['name']?></span>!</p>
			<p class="admin-text">Add project</p>
			<div class="add-photos-wrapper">
				<div class="admin-form new-content">
					<p class="admin-text form-header">New Photography Project</p>
					<form action="gallery/newproject.php" method="POST" autocomplete="off">
						<input type="text" name="name" placeholder="Project Name" id="name" required>
						<input type="text" name="dir" placeholder="Directory Name (unique)" id="dir" required>
						<input type="int" name="num_of_photos" placeholder="Number of photos" id="num_of_photos" step="1" required>
						<input type="int" name="order" placeholder="Order in gallery" id="order" required>
						<input type="submit" value="Create project">
					</form>
				</div>

				<div class="admin-form new-content">
					<p class="admin-text form-header">New Video Project</p>
					<form action="video/newproject.php" method="POST" autocomplete="off">
						<input type="text" name="name" placeholder="Project Name" id="name" required>
						<input type="text" name="dir" placeholder="Directory Name" id="dir" required>
						<input type="int" name="num_of_photos" placeholder="Number of photos" id="num_of_photos" step="1" required>
						<input type="int" name="order" placeholder="Order in gallery" id="order" required>
						<input type="submit" value="Create project">
					</form>
				</div>
				<!-- Add individual photos -->
				<!--
				<div class="register register-photos">
					<p class="admin-text">Add photos</p>
					<form action="addphotos.php" method="POST" autocomplete="off" enctype="multipart/form-data">
						<input type="text" name="folder" placeholder="Project Name" id="folder" value="<?php echo $_GET["project"]; ?>">
						<input type="int" name="order" placeholder="Order [Start at 1]" id="order" required>
						<input type="file" accept="image/*" name="image" id="image" required>
						<button type="submit" name="submit">Add photo</button>
					</form>
				</div>-->
			</div>
		</div>
	</body>
</html>