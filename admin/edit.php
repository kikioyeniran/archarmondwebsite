<?php require_once("includes/sessions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
include("includes/header.php")
?>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-name">Home</h2>
                        <p class="pageheader-text">Edit</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Edit Project Post</h5>
                        <div class="card-body">
                            <!-- ===============EDIT portfolio==========================-->
                            <?php
                            if (isset($_GET['portfolio'])) {
                                $id = $_GET['portfolio'];
                                $query = "SELECT * FROM portfolio WHERE id = {$id} ORDER BY id ASC";
                                $result = $mysqli->query($query) or die($mysqli->error);
                                $row = $result->fetch_assoc();
                            ?>
                                <form method="post" enctype="multipart/form-data" action="update.php?portfolio=<?php echo $_GET['portfolio'] ?>">
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Name</label>
                                        <input id="inputText3" type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label"> Select Project Category</label>
                                        <select class="form-control" name="category">
                                            <option value="Real Estate">Real Estate</option>
                                            <option value="Media and Marketing">Media and Marketing</option>
                                            <option value="Human Resources">Human Resources</option>
                                        </select>
                                    </div>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <br />
                                        <label class="custom-file-label" for="customFile">Select Picture</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Short Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="description"><?php echo $row['description']; ?></textarea>
                                    </div>
                                    <input type="submit" name="upd_portfolio" id="upd_portfolio" value="Update" class="btn btn-primary" />
                                </form>
                            <?php
                                                                                                                                }
                            ?>

                            <!-- ===============EDIT project==========================-->
                            <?php
                                                                                                                                if (isset($_GET['project'])) {
                                                                                                                                    $id = $_GET['project'];
                                                                                                                                    $query = "SELECT * FROM projects WHERE id = {$id} ORDER BY id ASC";
                                                                                                                                    $result = $mysqli->query($query) or die($mysqli->error);
                                                                                                                                    $row = $result->fetch_assoc();
                            ?>
                                <form method="post" enctype="multipart/form-data" action="update.php?project=<?php echo $_GET['project'] ?>">
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Name</label>
                                        <input id="inputText3" type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Client</label>
                                        <input id="inputText3" type="text" class="form-control" name="client" value="<?php echo $row['client']; ?>">
                                    </div>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <br />
                                        <label class="custom-file-label" for="customFile">Select Picture</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Short Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="description"><?php echo $row['description']; ?></textarea>
                                    </div>
                                    <input type="submit" name="upd_project" id="upd_project" value="Update" class="btn btn-primary" />
                                </form>
                            <?php
                                                                                                                                }
                            ?>

                            <!-- ===============EDIT engagement==========================-->
                            <?php
                                                                                                                                if (isset($_GET['engagement'])) {
                                                                                                                                    $id = $_GET['engagement'];
                                                                                                                                    $query = "SELECT * FROM engagements WHERE id = {$id} ORDER BY id ASC";
                                                                                                                                    $result = $mysqli->query($query) or die($mysqli->error);
                                                                                                                                    $row = $result->fetch_assoc();
                            ?>
                                <form method="post" enctype="multipart/form-data" action="update.php?engagement=<?php echo $_GET['engagement'] ?>">
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Input engagement Theme</label>
                                        <input id="inputText3" type="text" class="form-control" name="theme" value="<?php echo $row['theme']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Input engagement Location</label>
                                        <input id="inputText3" type="text" class="form-control" name="location" value="<?php echo $row['location']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Select Date</label>
                                        <div class="input-group date" id="datetimepicker10" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker10" name="dt" id="dt" value="<?php echo $row['dt']; ?>" />
                                            <div class="input-group-append" data-target="#datetimepicker10" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-file mb-3">
                                        <input type="hidden" name="sixe" value="2000000">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">

                                        <br />
                                        <label class="custom-file-label" for="customFile">Select Poster</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Short Summary</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="description"><?php echo $row['description']; ?></textarea>
                                    </div>
                                    <input type="submit" name="upd_engagement" id="upd_engagement" value="Update" class="btn btn-primary" />
                                </form>
                            <?php
                                                                                                                                                                }
                            ?>

                            <!-- ===============EDIT TESTIMONY==========================-->
                            <?php
                                                                                                                                                                if (isset($_GET['testimony'])) {
                                                                                                                                                                    $id = $_GET['testimony'];
                                                                                                                                                                    $query = "SELECT * FROM testimonies WHERE id = {$id} ORDER BY id ASC";
                                                                                                                                                                    $result = $mysqli->query($query) or die($mysqli->error);
                                                                                                                                                                    $row = $result->fetch_assoc();
                            ?>
                                <form method="post" enctype="multipart/form-data" action="update.php?testimony=<?php echo $_GET['testimony'] ?>">
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Name</label>
                                        <input id="inputText3" type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Portforlio</label>
                                        <input id="inputText3" type="text" class="form-control" name="portfolio" value="<?php echo $row['portfolio']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Testimony</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="testimony"><?php echo $row['testimony']; ?></textarea>
                                    </div>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <br />
                                        <label class="custom-file-label" for="customFile">Select Picture</label>
                                    </div>
                                    <input type="submit" name="upd_testimony" id="upd_testimony" value="Update" class="btn btn-primary" />
                                </form>
                            <?php
                                                                                                                                                                }
                            ?>
                            <!-- ===============EDIT director==========================-->
                            <?php
                                                                                                                                                                if (isset($_GET['director'])) {
                                                                                                                                                                    $id = $_GET['director'];
                                                                                                                                                                    $query = "SELECT * FROM directors WHERE id = {$id} ORDER BY id ASC";
                                                                                                                                                                    $result = $mysqli->query($query) or die($mysqli->error);
                                                                                                                                                                    $row = $result->fetch_assoc();
                            ?>
                                <form method="post" enctype="multipart/form-data" action="update.php?director=<?php echo $_GET['director'] ?>">
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Name</label>
                                        <input id="inputText3" type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Portfolio</label>
                                        <input id="inputText3" type="text" class="form-control" name="portfolio" value="<?php echo $row['portfolio']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Profile</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="profile"><?php echo $row['profile']; ?></textarea>
                                    </div>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <br />
                                        <label class="custom-file-label" for="customFile">Select Picture</label>
                                    </div>
                                    <input type="submit" name="upd_director" id="upd_director" value="Update" class="btn btn-primary" />
                                </form>
                            <?php
                                                                                                                                                                }
                            ?>


                            <!-- ===============EDIT BLOG==========================-->
                            <?php
                                                                                                                                                                if (isset($_GET['blog'])) {
                                                                                                                                                                    $id = $_GET['blog'];
                                                                                                                                                                    $query = "SELECT * FROM blog WHERE id = {$id} ORDER BY id ASC";
                                                                                                                                                                    $result = $mysqli->query($query) or die($mysqli->error);
                                                                                                                                                                    $row = $result->fetch_assoc();
                            ?>
                                <form method="post" enctype="multipart/form-data" action="update.php?blog=<?php echo $_GET['blog'] ?>">
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Title</label>
                                        <input id="inputText3" type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Author</label>
                                        <input id="inputText3" type="text" class="form-control" name="author" value="<?php echo $row['author']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Select Date</label>
                                        <div class="input-group date" id="datetimepicker10" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker10" name="dt" value="<?php echo $row['dt']; ?>" />
                                            <div class="input-group-append" data-target="#datetimepicker10" data-toggle="datetimepicker">
                                                <div classs="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                    </script>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <br />
                                        <label class="custom-file-label" for="customFile">Select Picture</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Short Summary</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="summary"><?php echo $row['summary']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Main Blog Post</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="main_post"><?php echo $row['main_post']; ?></textarea>
                                    </div>
                                    <input type="submit" name="upd_blog" id="upd_blog" value="Update" class="btn btn-primary" />
                                </form>
                            <?php
                                                                                                                                                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                                                                                                                                                                include("includes/footer.php");
        ?>