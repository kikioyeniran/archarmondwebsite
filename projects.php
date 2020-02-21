<?php
include("includes/header.php")
?>

<!-- bradcam_area  -->
<div class="bradcam_area breadcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Projects</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- gallery -->
<div class="gallery_area">
    <div class="container">
        <div class="row grid">
            <?php
            $query2 = "SELECT * FROM projects";
            $result = $mysqli->query($query2) or die($mysqli->error);
            while ($row = $result->fetch_assoc()) { ?>
                <div class="col-xl-4 col-lg-6 grid-item cat1 col-md-6">
                    <div class="single-gallery mb-20">
                        <div class="portfolio-img">
                            <img src="admin/images/<?php echo $row['picture']; ?>" alt="">
                        </div>
                        <div class="gallery_hover">
                            <a href="project-details.php?proj=<?php echo urlencode($row['id']); ?>" class="hover_inner">
                                <h3><?php echo $row['name']; ?></h3>
                                <span><?php echo $row['client']; ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="More_Works_btn text-center">
                    <a class="boxed-btn3-green-2" href="#">More Works</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ gallery -->

<!-- project  -->
<div class="project_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="project_info text-center">
                    <h3>Do you Have any Project?</h3>
                    <p>We are committed to delivering quality value <br>
                        for every kind of construction, architectural or building project.</p>
                    <a href="contact.php" class="boxed-btn3-white">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ project  -->

<?php
                                                            include("includes/footer.php")
?>