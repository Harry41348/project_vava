<?php $page = basename($_SERVER['PHP_SELF']); ?>

<nav class="navtop">
			<div>
				<h1>Valeur Rush</h1>
				<!-- <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a> -->
        <?php 
          if ($page != "existingprojects.php") {
            echo "<a href=\"existingprojects.php\"><i class=\"fas fa-project-diagram\"></i>Projects</a>";
          }
          if ($page != "index.php") {
            echo "<a href=\"index.php\"><i class=\"fas fa-home\"></i>Home</a>";
          }
          if ($page != "addusers.php") {
            if($_SESSION['master']){
              echo "<a href=\"addusers.php\"><i class=\"fas fa-user-circle\"></i>Add Users</a>";
            };
          }
					
				?>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>