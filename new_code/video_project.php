<?php
require_once 'includes/header.php';
require_once 'includes/project_nav.php';
require_once 'includes/connect.php';
?>

<main class="container">
  <section class="section-gallery">
    <?php
      if(!isset($_GET["project"])){
        echo "<h1 class=\"error\">Error: No id set.</h1>";
      } else if(!ctype_digit($_GET["project"])){
        echo "<h1 class=\"error\">Error: ID must be a number.</h1>";
      } else {
        $project_id = $_GET["project"];
        $query = "SELECT pointer, num_of_photos FROM `video_projects` WHERE id=" . $project_id;
        $project = mysqli_query($con, $query);

        if($project->num_rows === 1){
          $row = $project->fetch_row();
          $pointer = $row[0] ?? false;
          $number_of_photos = $row[1] ?? false;
          echo "<div class=\"video_wrapper\">";
          echo "<video class=\"video\" controls>";
          echo "<source src=\"videos/" . $pointer . "/video.mp4\" type=\"video/mp4\">";
          echo "Your browser does not support MP4 videos.";
          echo "</video>";
          echo "</div>";

          echo "<ul class=\"gallery-list\">";
        
            
            // echo "<li class=\"gallery-images\">";
            // echo "<img class=\"gallery-img\" src=\"videos/" . $pointer . "/head.jpg\" alt=\"Image 1.\">";
            // echo "</li>";
            
            for ($i = 1; $i <= $number_of_photos; $i++) {
              echo "<li class=\"gallery-images\">";
              echo "<img class=\"gallery-img\" src=\"videos/" . $pointer . "/img_" . $i . ".jpg\" alt=\"Image " . $i . ".\">";
              echo "</li>";
            }
          } else {
            echo "<h1 class=\"error\">Error 404: Page Not Found</h1>";
          }
        }
      ?>
    </ul>
  </section>
  <div class="push"></div>
</main>

<?php
require_once 'includes/footer.php';
$con = null;
?>