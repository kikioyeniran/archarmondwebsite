<?php
include("includes/header.php");

if (isset($_GET['blog'])) {
    $id = $_GET['blog'];
    $query2 = "SELECT * FROM blog WHERE id={$id} LIMIT 1";
    $result = $mysqli->query($query2) or die($mysqli->error);
    $row = $result->fetch_assoc();
    $dt = $row['dt'];
    $new_dt = explode(" ", $dt);
    $date = date("M, j, Y", strtotime($new_dt[0]));
    $timw = $new_dt[1];
    $new_dt2 = explode(",", $date);
    $month = $new_dt2[0];
    $day = $new_dt2[1];
    $year = $new_dt2[2];
    $timw = $new_dt[1];
?>

    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Blog Details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="admin/images/<?php echo $row['picture']; ?>" alt="">
                        </div>
                        <div class="blog_details">
                            <h2><?php echo $row['title']; ?></h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> <?php echo $row['author']; ?></a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                            </ul>
                            <div class="quote-wrapper">
                                <div class="quotes"><?php echo $row['summary']; ?>
                                </div>
                            </div>
                            <p><?php echo $row['main_post']; ?></p>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                                people like this</p>
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                            </div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="img/post/preview.png" alt="">
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#">
                                            <span class="lnr text-white ti-arrow-left"></span>
                                        </a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="#">
                                            <h4>Space The Final Frontier</h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="#">
                                            <h4>Telescopes 101</h4>
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#">
                                            <span class="lnr text-white ti-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="img/post/next.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img src="img/blog/author.png" alt="">
                            <div class="media-body">
                                <a href="#">
                                    <h4><?php echo $row['author'] ?></h4>
                                </a>
                                <p></p>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Technology</p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Architecture</p>
                                        <p>(10)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Construction</p>
                                        <p>(03)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Product</p>
                                        <p>(11)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Inspiration</p>
                                        <p>21</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Health Care (21)</p>
                                        <p>09</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            <?php $query2 = "SELECT * FROM blog ORDER BY id DESC LIMIT 4";
                                                                            $result = $mysqli->query($query2) or die($mysqli->error);
                                                                            while ($row = $result->fetch_assoc()) {
                                                                                $dt = $row['dt'];
                                                                                $new_dt = explode(" ", $dt);
                                                                                $date = date("M, j, Y", strtotime($new_dt[0]));
                                                                                $timw = $new_dt[1];
                                                                                $new_dt2 = explode(",", $date);
                                                                                $month = $new_dt2[0];
                                                                                $day = $new_dt2[1];
                                                                                $year = $new_dt2[2];
                                                                                $timw = $new_dt[1];
                            ?>
                                <div class="media post_item">
                                    <img src="admin/images/<?php echo $row['picture']; ?>" alt="post" style="max-width: 20%;">
                                    <div class="media-body">
                                        <a href="blog-single.php?blog=<?php echo urlencode($row['id']); ?>">
                                            <h3><?php echo $row['title']; ?></h3>
                                        </a>
                                        <p><?php echo $day . " " . $month . ", " . $year; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">project</a>
                                </li>
                                <li>
                                    <a href="#">construction</a>
                                </li>
                                <li>
                                    <a href="#">technology</a>
                                </li>
                                <li>
                                    <a href="#">travel</a>
                                </li>
                                <li>
                                    <a href="#">buildings</a>
                                </li>
                                <li>
                                    <a href="#">advancement</a>
                                </li>
                                <li>
                                    <a href="#">design</a>
                                </li>
                                <li>
                                    <a href="#">illustration</a>
                                </li>
                            </ul>
                        </aside>

                    </div>
                </div>
            </div>
    </section>
    <!--================ Blog Area end =================-->

<?php
                                                                            include("includes/footer.php");
                                                                        } else {
                                                                            redirect_to("blog.php");
                                                                        }
?>