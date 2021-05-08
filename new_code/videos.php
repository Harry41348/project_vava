<?php
require_once 'includes/header.php';
require_once 'includes/connect.php';
?>

<header class="header__gallery">
    <nav class="nav">
        <ul class="nav__list">
            <li class="nav__item"><a href="gallery.php" class="nav__link nav__link-inverted">Gallery</a></li>
            <li class="nav__item"><a href="#" class="nav__link nav__link-active">Videos</a></li>
        </ul>
    </nav>

    <!-- <h1 class="header__text header__primary">Vava Rush</h1>
    <h1 class="header__text header__secondary">Creative Director</h1> -->
</header>

<main class="container">
    <section class="about">
        <p class="paragraph about-paragraph">Video projects</p>
    </section>
    <section class="section-video-gallery">
        <ul class="gallery-list">
            <?php
                $query = "SELECT * FROM `video_projects` ORDER BY project_order";
                $projects = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($projects)){
                    echo "<li class=\"gallery-videos\">";
                    echo "<a href=\"video_project.php?project=" . $row ['id'] . "\"><img class=\"gallery-thumbnail\" src=\"videos/" . $row ['pointer'] . "/thumbnail.jpg\" alt=\"" . $row ['name'] . " thumbnail image.\">";
                    echo "<div class=\"gallery-text\">View Project</div></a>";
                    echo "</li>";
                }
            ?>
        </ul>
    </section>
    <div class="push"></div>
</main>

<?php
$con = null;
require_once 'includes/footer.php';
?>