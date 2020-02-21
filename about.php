<?php
include("includes/header.php")
?>
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>About Us</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<?php
$query2 = "SELECT * FROM about WHERE id = 1 LIMIT 1";
$result = $mysqli->query($query2) or die($mysqli->error);
$row = $result->fetch_assoc();
?>
<!-- about  -->
<div class="about_area">
    <div class="container-fluid p-0">
        <div class="row no-gutters align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="about_image">
                    <img src="admin/images/<?php echo $row['picture']; ?>" alt="">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="about_info">
                    <h3>Archamond Concept</h3>
                    <p><?php echo $row['profile']; ?></p>
                    <ul>
                        <li> Design + Build </li>
                        <li> Construction </li>
                        <li> Facility and Project Management </li>
                        <li> Architectural and Building plans services </li>
                        <li> Construction and Project management </li>
                        <li> Facilities and Property management </li>
                        <li> Interior and external Designing specialist </li>
                        <li> Construction and vocational skill training Recruitment and procurement services</li>
                        <li> Photography and Design Reports </li>
                    </ul>

                    <div class="about_btn">
                        <a class="boxed-btn3" href="#">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ about  -->

<!-- counter  -->
<div class="counter_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="single_counter text-center">
                    <h3> <span class="counter">350</span> <span>+</span> </h3>
                    <span>Total Projects</span>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_counter text-center">
                    <h3> <span class="counter">40</span> </h3>
                    <span>On Going Projects</span>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_counter text-center">
                    <h3> <span class="counter">95</span> <span>%</span> </h3>
                    <span>Job Success</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ counter  -->

<!-- Start Align Area -->
<div class="whole-wrap">
    <div class="container box_1170">
        <h1 style="text-align:center"> Our Directors</h1>
        <?php
                                            $query2 = "SELECT * FROM directors ORDER BY id DESC";
                                            $result = $mysqli->query($query2) or die($mysqli->error);
                                            while ($row = $result->fetch_assoc()) {
                                                if ($row['id'] % 2 != 0) { ?>
                <div class="section-top-border">
                    <h3 class="mb-30"><?php echo $row['name']; ?></h3>
                    <h4 class="mb-30"><?php echo $row['portfolio']; ?></4>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="admin/images/<?php echo $row['picture']; ?>" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-9 mt-sm-20">
                                <p><?php echo $row['profile']; ?></p>
                            </div>
                        </div>
                </div>
            <?php } else { ?>
                <div class="section-top-border text-right">
                    <h3 class="mb-30"><?php echo $row['name']; ?></h3>
                    <h4 class="mb-30"><?php echo $row['portfolio']; ?></4>
                        <div class="row">
                            <div class="col-md-9">
                                <p class="text-right"><?php echo $row['profile']; ?></p>
                            </div>
                            <div class="col-md-3">
                                <img src="admin/images/<?php echo $row['picture']; ?>" alt="" class="img-fluid">
                            </div>
                        </div>
                </div <?php }
                                                } ?> <div class="section-top-border">
                <h3>Image Gallery</h3>
                <div class="row gallery-item">
                    <?php
                                                $query2 = "SELECT * FROM gallery";
                                                $result = $mysqli->query($query2) or die($mysqli->error);
                                                while ($row = $result->fetch_assoc()) { ?>
                        <div class="col-md-4">
                            <a href="admin/images/<?php echo $row['picture']; ?>" class="img-pop-up">
                                <div class="single-gallery-image" style="background: url(admin/images/<?php echo $row['picture']; ?>);"></div>
                            </a>
                        </div>
                    <?php } ?>
                    <!-- <div class="col-md-4">
                        <a href="img/elements/g2.jpg" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(img/elements/g2.jpg);"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="img/elements/g3.jpg" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(img/elements/g3.jpg);"></div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="img/elements/g4.jpg" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(img/elements/g4.jpg);"></div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="img/elements/g5.jpg" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(img/elements/g5.jpg);"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="img/elements/g6.jpg" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(img/elements/g6.jpg);"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="img/elements/g7.jpg" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(img/elements/g7.jpg);"></div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="img/elements/g8.jpg" class="img-pop-up">
                            <div class="single-gallery-image" style="background: url(img/elements/g8.jpg);"></div>
                        </a>
                    </div> -->
                </div>
    </div>
</div>
</div>



<?php
                                                                                                    include("includes/footer.php")
?>