<?php
include("includes/header.php")
?>
<!-- bradcam_area  -->
<div class="bradcam_area breadcam_bg_4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Blog</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php
                    $query2 = "SELECT * FROM blog ORDER BY id DESC";
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
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="admin/images/<?php echo $row['picture']; ?>" alt="">
                                <a href="blog-single.php?blog=<?php echo urlencode($row['id']); ?>" class="blog_item_date">
                                    <h3><?php echo $day; ?></h3>
                                    <p><?php echo $month; ?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="blog-single.php?blog=<?php echo urlencode($row['id']); ?>">
                                    <h2><?php echo $row['title']; ?></h2>
                                </a>
                                <p><?php echo $row['summary']; ?></p>
                                <ul class="blog-info-link">
                                    <li><a href="blog-single.php?blog=<?php echo urlencode($row['id']); ?>"><i class="fa fa-user"></i> <?php echo $row['author']; ?></a></li>
                                    <li><a href="blog-single.php?blog=<?php echo urlencode($row['id']); ?>"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>
                    <?php } ?>



                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
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


                    <!-- <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_5.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_6.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_7.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_8.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_9.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="img/post/post_10.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </aside> -->


                    <!-- <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>

                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Subscribe</button>
                        </form>
                    </aside> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
<?php
                                                                                                                                    include("includes/footer.php")
?>