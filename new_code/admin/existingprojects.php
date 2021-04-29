<?php

require_once '../includes/connect.php';
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
			<p class="admin-text">Existing projects</p>
			<div class="add-photos-wrapper">
        <div class="modify__projects--wrapper">
          <?php 
            $query = "SELECT * FROM `photography_projects` ORDER BY order_index";
            $projects = mysqli_query($con, $query);

            while($row = mysqli_fetch_array($projects)){
              echo "<div class=\"modify__projects--container\">";
                echo "<p class=\"modify__projects--name\">" . $row ['name'] . "</p>";
                echo "<a href=\"editproject.php?project=" . $row ['project_id'] . "\" class=\"modify_projects--link\">";
                echo "<img class=\"modify__projects--imgs\" src=\"../imgs/" . $row ['image_pointer'] . "/head.jpg\" alt=\"" . $row ['name'] . " header image.\">";
                echo "</a>";
              echo "</div>";
            }
          ?>
        </div>
				
			</div>
		</div>
	</body>
</html>