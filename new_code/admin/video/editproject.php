<?php

require_once '../connect.php';
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../login.php');
	exit;
}

$query = "SELECT * FROM `video_projects` WHERE id=" . $_GET["project"];
$project = mysqli_query($con, $query);

if($project->num_rows === 1){
  $row = $project->fetch_row();
} else {
  die("ERROR: Project does not exist");
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
	<body class="loggedin body-edit">
		<?php include("../nav.php") ?>

		<!-- Content -->
		<div class="content">
      <p class="admin-text"><?php echo $row [1]; ?></p>
      <div class="remove__project--container">
        <form action="remove_project.php" method="post">
          <input type="hidden" name="id" value="<?php echo $row[0] ?>">
          <input type="submit" value="Remove Project" onclick="return confirm('Are you sure?');">
        </form>
      </div>
			<div class="add-photos-wrapper">
				<div class="admin-form new-content edit-project">
          <p class="admin-text">Edit Project</p>
          <form action="changeproject.php" method="POST" autocomplete="off">
            <input type="hidden" name="id" placeholder="<?php echo $row[0]; ?>">
            <div class="label-container">
              <label for="name">Project title</label>
              <input type="text" name="name" placeholder="Project Title" value="<?php echo $row [1]; ?>" id="name">
            </div>
            <div class="label-container">
              <label for="num_of_photos">Number of photos</label>
              <input type="int" name="num_of_photos" placeholder="Number of photos" id="num_of_photos" step="1" value="<?php echo $row [4]; ?>">
            </div>
            <div class="label-container">
              <label for="order">Order</label>
              <input type="int" name="order" placeholder="Order [Start at 1]" id="order" value="<?php echo $row [3]; ?>">
            </div>
						<input type="submit" value="Submit changes">
          </form>
        </div>
      </div>
      <?php
        echo "<h1>Thumbnail</h1>";
        echo "<div class=\"modify__projects--container\">";
          echo "<img class=\"modify__projects--imgs\" src=\"../../videos/" . $row [2] . "/thumbnail.jpg\" alt=\"" . $row [1] . " thumbnail image.\">";
          echo "<form action=\"changephoto.php\" method=\"POST\" autocomplete=\"off\" enctype=\"multipart/form-data\">";
            echo "<input type=\"hidden\" name=\"id\" value=\"" . $row[0] . "\">";
            echo "<input type=\"hidden\" name=\"order\" value=\"1\">";
            echo "<input type=\"hidden\" name=\"folder\" value=\"" . $row [2] . "\">";
            echo "<input type=\"file\" accept=\"image\" name=\"image\" id=\"image\" required>";
            echo "<button type=\"submit\" name=\"submit\">Submit Photo</button>";
					echo "</form>";
        echo "</div>";
        
        for ($i = 1; $i <= $row [4]; $i++) {
          echo "<h1>Image " . $i . "</h1>";
          echo "<div class=\"modify__projects--container\">";
            echo "<img class=\"modify__projects--imgs\" src=\"../../videos/" . $row [2] . "/img_" . $i . ".jpg\" alt=\"Image " . $i . ".\">";
            echo "<form action=\"changephoto.php\" method=\"POST\" autocomplete=\"off\" enctype=\"multipart/form-data\">";
              echo "<input type=\"hidden\" name=\"id\" value=\"" . $row[0] . "\">";
              echo "<input type=\"hidden\" name=\"order\" value=\"" . $i . "\">";
              echo "<input type=\"hidden\" name=\"folder\" value=\"" . $row [2] . "\">";
              echo "<input type=\"file\" accept=\"image\" name=\"image\" id=\"image\" required>";
              echo "<button type=\"submit\" name=\"submit\">Submit Photo</button>";
            echo "</form>";
          echo "</div>";
        }
      ?>				
			</div>
		</div>
	</body>
</html>