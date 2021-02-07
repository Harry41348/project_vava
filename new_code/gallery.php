<?php
require_once 'includes/header.php';
require_once 'includes/connect.php';
?>


<header class="header__main">
    <nav class="nav">
        <ul class="nav__list">
            <li class="nav__item"><a href="#" class="nav__link nav__link-active">Gallery</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Videos</a></li>
        </ul>
    </nav>

    <h1 class="header__text header__primary">Vava Rush</h1>
    <h1 class="header__text header__secondary">Creative Director</h1>
</header>

<main class="container">
    <section class="section-gallery">
        <ul class="gallery-list">
            <?php
                $query = "SELECT * FROM `projects` ";
                $projects = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($projects)){
                    echo "<li class=\"gallery-images\">";
                    echo "<a href=\"project.php?project=" . $row ['project_id'] . "\"><img class=\"gallery-img\" src=\"data:image;base64," . base64_encode($row['image_header']) . "\" alt=\"" . $row ['name'] . " header image.\">";
                    echo "<div class=\"gallery-text\">View Project</div></a>";
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