<?php require_once("includes/sessions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("includes/connection.php"); ?>

<?php
if (isset($_POST['insert'])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $info = getimagesize($_FILES["image"]["tmp_name"]);
    $allowed_types = array(IMG_GIF, IMG_JPEG, IMG_PNG, IMG_JPG);
    $title = addslashes(mysqli_real_escape_string($mysqli, $_POST['title']));
    $author = addslashes($_POST['author']);
    $dt = date('d-m-y H:i:s', strtotime($_POST['dt']));
    $summary = addslashes(mysqli_real_escape_string($mysqli, $_POST['summary']));
    $main_post = addslashes(nl2br(mysqli_real_escape_string($mysqli, $_POST['main_post'])));

    $query = "INSERT INTO blog(title,summary,main_post,dt,picture,author) Values (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        echo "SQL Insert Error";
    } else{
        mysqli_stmt_bind_param($stmt, "ssssss", $title, $summary, $main_post, $dt, $image, $author);
        if (!in_array($info[2], $allowed_types)) {
            echo "<script>alert('Invalid file type chosen. Please select a valid picture type')</script>";
        } else {
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    echo "<script>alert('image uploaded succesfully')</script>";
                } else {
                    echo "<script>alert('error uploading image')</script>";
                }
            } else {
                echo "<script>alert('error connecting to DB')</script>";
            }
        }
    }
?>

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
                        <h2 class="pageheader-title">Home</h2>
                        <p class="pageheader-text">Edit Blog</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                        <h5 class="card-header">Create New Blog Post</h5>
                        <div class="card-body">
                            <form method="post" action="blog.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Title</label>
                                    <input id="inputText3" type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Author</label>
                                    <input id="inputText3" type="text" class="form-control" name="author">
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Select Date</label>
                                    <div class="input-group date" id="datetimepicker10" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker10" name="dt" />
                                        <div class="input-group-append" data-target="#datetimepicker10" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
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
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="summary"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Main Blog Post</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="main_post"></textarea>
                                </div>
                                <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3 class="text-center">Click the image to edit the post</h3>
                </div>

                <?php
                $stmt = mysqli_stmt_init($mysqli);
                $stmt = $mysqli->prepare("SELECT * FROM blog ORDER by id DESC");
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows === 0) exit('No rows');
                while ($row = $result->fetch_assoc()) { ?>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">TITLE: <?php echo $row['title']; ?></h5>
                            <div class="card-body">
                                <div class="metric-value d-inline-block">
                                    <h4 class="mb-1">AUTHOR: <?php echo $row['author']; ?></h4>
                                </div>
                                <div>
                                    <a href="edit.php?blog=<?php echo urlencode($row['id']); ?>"><img src='images/<?php echo $row['picture'] ?>' alt="user" class="rounded" width="100%"></a>
                                </div>
                            </div>
                            <div class="card-body bg-light">
                                <div id="sparkline-1"><?php echo $row['summary']; ?></div>
                                <h6><?php echo $row['dt']; ?><h6>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="delete.php?blogid=<?php echo  urlencode($row['id']); ?>" onclick="return confirm('Are you sure you want to delete this picture?');">Delete Post</a>
                            </div>
                        </div>
                    </div>

                <?php }

                ?>



            </div>

        </div>
        <?php
        include("includes/footer.php");
        ?>