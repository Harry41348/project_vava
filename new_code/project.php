<?php
require_once 'includes/header.php';
require_once 'includes/project_nav.php';
require_once 'includes/connect.php';
?>

<main class="container">
  <section class="section-gallery">
    <ul class="gallery-list">
      <?php
        $project_id = $_GET["project"];
        $query = "SELECT * FROM `photos` WHERE project_id = 1";
        $project = mysqli_query($con, $query);

        while($row = mysqli_fetch_array($project)){
          echo "<li class=\"gallery-images\">";
          echo "<img class=\"gallery-img\" src=\"data:image;base64," . base64_encode($row['image']) . "\" alt=\"Image " . $row ['order_index'] . ".\">";
          echo "</li>";
        }
      ?>
    </ul>
  </section>
</main>

<?php
require_once 'includes/footer.php';
$con = null;
?>