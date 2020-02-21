<?php require_once("includes/sessions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("includes/connection.php"); ?>

<?php
if(isset($_POST['insert']))
{
    $target = "images/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $name = addslashes($_POST['name']);
    $description = addslashes($_POST['description']);
    $category = addslashes($_POST['category']);
    $query = "INSERT INTO portfolio (name,description,picture,category) Values ('$name', '$description','$image', '$category')";
    if($mysqli->query($query) or die($mysqli->error))
    {
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
        {
        echo "<script>alert('Project Added Succesfully')</script>";
        }
        else
        {
            echo "<script>alert('Error Uploading the Image')</script>";
        }
    }
    else{
        echo "<script>alert('Error Connecting to the Database')</script>";
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
                                <h2 class="pageheader-name">Home</h2>
                                <p class="pageheader-text">Edit Projects</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Projects</li>
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
                                    <h5 class="card-header">Add To Your Portfolio</h5>
                                    <div class="card-body">
                                        <form method="post" action="portfolio.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                                <label for="inputText3" class="col-form-label"> Project Name</label>
                                                <input id="inputText3" type="text" class="form-control" name="name">
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
                                                <br/>
                                                <label class="custom-file-label" for="customFile">Select Picture</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description"></textarea>
                                            </div>
                                            <input type ="submit" name = "insert" id= "insert" value="Submit" class="btn btn-primary">
                                        </form>
                                    </div>
                                 </div>
                     </div>
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="text-center">Click the image to edit the post</h3>
                    </div>

                    <?php
                        $query2 = "SELECT * FROM portfolio ORDER BY id DESC";
                        $result = $mysqli->query($query2) or die($mysqli->error);
                        while ($row = $result->fetch_assoc())
                        {?>

                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <h5 class="card-header">Name: <?php echo $row['name']; ?></h5>
                                            <div class="card-body">
                                                <div class="metric-value d-inline-block">
                                                    <h4 class="mb-1">Category: <?php echo $row['category']; ?></h4>
                                                </div>
                                                <div>
                                                    <a href = "edit.php?portfolio=<?php echo urlencode($row['id']); ?>"><img src='images/<?php echo $row['picture']?>' alt="user" class="rounded" width="100%"></a>
                                                </div>
                                            </div>
                                            <div class="card-body bg-light">
                                                <h6><?php echo $row['description']; ?><h6>
                                            </div>
                                            <div class="card-footer text-center bg-white">
                                            <a href = "delete.php?portfolioid=<?php echo  urlencode($row['id']); ?>" onclick="return confirm('Are you sure you want to delete this picture?');">Delete Post</a>
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