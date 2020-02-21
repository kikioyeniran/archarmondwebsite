<?php require_once("includes/sessions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("includes/connection.php"); ?>

<?php

if(isset($_POST['insert']))
{
    $target = "images/".basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];

    $query = "INSERT INTO gallery(picture) Values ('$image')";
    if($mysqli->query($query) or die($mysqli->error))
    {
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
        {
        echo "<script>alert('image uploaded succesfully')</script>";
        }
        else
        {
            echo "<script>alert('error uploading image')</script>";
        }
    }
    else{
        echo "<script>alert('error connecting to DB')</script>";
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
                                <p class="pageheader-text">Insert and Delete images from the gallery</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
                                    <h5 class="card-header">Insert New Image</h5>
                                    <div class="card-body">
                                        <form method="post" action="gallery.php" enctype="multipart/form-data">
                                            <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="image" multiple>
                                                <br/>
                                                <label class="custom-file-label" for="customFile">Select Picture</label>
                                            </div>
                                            <input type ="submit" name = "insert" id= "insert" value="Submit" class="btn btn-primary">
                                        </form>
                                    </div>
                                 </div>
                     </div>
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="text-center">Images in the Gallery</h3>
                    </div>

                    <?php
                        $query2 = "SELECT * FROM gallery";
                        $result = $mysqli->query($query2) or die($mysqli->error);
                        while ($row = $result->fetch_assoc())
                        {?>

                     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                            <img src='images/<?php echo $row['picture']?>' alt="user" class="rounded" width="100%">
                                <div class="card-footer text-center bg-white">
                                <a href = "delete.php?galleryid=<?php echo  urlencode($row['id']); ?>" onclick="return confirm('Are you sure you want to delete this picture?');">Delete Post</a>
                                </div>
                            </div>
                    </div>
                    <?php } ?>
</div>
<?php
include("includes/footer.php");
?>