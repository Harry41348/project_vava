<?php $page = basename($_SERVER['PHP_SELF']); ?>

<nav class="navtop">
			<div>
				<h1><a href="/" style="font-size: 2rem;">Valeur Rush</a></h1>
				<!-- <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a> -->
        <?php
          if ($page != "index.php") {
            echo "<a href=\"" . $admin_directory . "index.php\"><i class=\"fas fa-home\"></i>Home</a>";
          }
          if ($page != "existingprojects.php") {
            echo "<a href=\"" . $admin_directory . "gallery/existingprojects.php\"><i class=\"fas fa-project-diagram\"></i>Photography Projects</a>";
          }
          if ($page != "existingvideos.php") {
            echo "<a href=\"" . $admin_directory . "video/existingvideos.php\"><i class=\"fas fa-video\"></i>Video Projects</a>";
          }
          if ($page != "addusers.php") {
            if($_SESSION['master']){
              echo "<a href=\"" . $admin_directory . "addusers.php\"><i class=\"fas fa-user-circle\"></i>Add Users</a>";
            };
          }
					
				?>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>