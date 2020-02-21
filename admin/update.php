<?php require_once("includes/sessions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php


//Portfolio Update Function===================================================================================================
if (isset($_POST["upd_portfolio"])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $errors = array();
    $required_fields = array('name', 'description', 'category');
    foreach ($required_fields as $fieldname) {
        //var_dump($_POST[$fieldname]);
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) {
            $errors[] = $fieldname;
        }
    }
    if (empty($errors)) {
        $id = mysql_prep($_GET['portfolio']);
        $name = mysql_prep($_POST['name']);
        $description = mysql_prep($_POST['description']);
        $category = mysql_prep($_POST['category']);
        $image = $_FILES['image']['name'];
        if (empty($image)) {
            $query = "UPDATE portfolio SET name = '{$name}', description = '{$description}', category = '{$category}' WHERE id = {$id} ";
        } else {
            $query = "UPDATE portfolio SET name = '{$name}', picture = '{$image}', description = '{$description}' category = '{$category}' WHERE id = {$id} ";
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        if ($result = $mysqli->query($query) or die($mysqli->error)) {
            confirm_query($result);
            if (mysqli_affected_rows($mysqli) == 1) {
                redirect_to("portfolio.php");
                //header("Location: portfolio.php");
            } else {
                echo "<script>alert(\"The portfolio post update failed\")<script>";
            }
        } else {
            echo "<script>alert('Info not inserted into the database')</script>";
            echo mysql_error();
        }
    } else {
        echo "there r errors";
        var_dump($errors);
    }
}

//projectss Update Function===================================================================================================
if (isset($_POST["upd_projectss"])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $errors = array();
    $required_fields = array('name', 'client', 'description');
    foreach ($required_fields as $fieldname) {
        //var_dump($_POST[$fieldname]);
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) {
            $errors[] = $fieldname;
        }
    }
    if (empty($errors)) {
        $id = mysql_prep($_GET['projects']);
        $name = mysql_prep($_POST['name']);
        $client = mysql_prep($_POST['client']);
        $description = mysql_prep($_POST['description']);
        $image = $_FILES['image']['name'];
        if (empty($image)) {
            $query = "UPDATE projects SET name = '{$name}', client = '{$client}', description = '{$description}' WHERE id = {$id} ";
        } else {
            $query = "UPDATE projects SET name = '{$name}', client = '{$client}', description = '{$description}', picture = '{$image}' WHERE id = {$id} ";
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        if ($result = $mysqli->query($query) or die($mysqli->error)) {
            confirm_query($result);
            if (mysqli_affected_rows($mysqli) == 1) {
                header("Location: projects.php");
            } else {
                echo "<script>alert(\"The spade post update failed\")<script>";
            }
        } else {
            echo "<script>alert('Info not inserted into the database')</script>";
            // echo mysql_error();
        }
    } else {
        echo "there r errors";
        var_dump($errors);
    }
}
//Edit Single director profile=======================================
if (isset($_POST["upd_director"])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $errors = array();
    $required_fields = array('name', 'profile');
    foreach ($required_fields as $fieldname) {
        //var_dump($_POST[$fieldname]);
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) {
            $errors[] = $fieldname;
        }
    }

    if (empty($errors)) {
        $id = addslashes($_GET['director']);
        $name = addslashes($_POST['name']);
        $profile = nl2br(addslashes($_POST['profile']));
        $portfolio = addslashes($_POST['portfolio']);
        $image = $_FILES['image']['name'];
        if (empty($image)) {
            $query = "UPDATE directors SET name = '{$name}', profile = '{$profile}', portfolio = '{$portfolio}' WHERE id = {$id} ";
        } else {
            $query = "UPDATE directors SET name = '{$name}', profile = '{$profile}', picture = '{$image}', portfolio = '{$portfolio}' WHERE id = {$id} ";
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        if ($result = $mysqli->query($query) or die($mysqli->error)) {

            if (mysqli_affected_rows($mysqli) == 1) {
                header("Location: directors.php");
            } else {
                echo "<script>alert(\"The profile update failed\")<script>";
            }
        } else {
            echo "<script>alert('Info not inserted into the database')</script>";
            echo mysql_error();
        }
    } else {
        echo "there r errors";
        var_dump($errors);
    }
}

// Edit engagement Post========================================
if (isset($_POST["upd_engagement"])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $errors = array();
    $required_fields = array('theme', 'location', 'dt', 'description');
    foreach ($required_fields as $fieldname) {
        //var_dump($_POST[$fieldname]);
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) {
            $errors[] = $fieldname;
        }
    }
    if (empty($errors)) {
        $id = addslashes($_GET['engagement']);
        $theme = addslashes($_POST['theme']);
        $location = addslashes($_POST['location']);
        $description = addslashes($_POST['description']);
        $date = addslashes(date('y-m-d H:i:s', strtotime($_POST['dt'])));
        $image = $_FILES['image']['name'];
        if (empty($image)) {
            $query = "UPDATE engagements SET theme = '{$theme}', location = '{$location}', description = '{$description}', dt = '{$date}' WHERE id = {$id} ";
        } else {
            $query = "UPDATE engagements SET theme = '{$theme}', location = '{$location}', description = '{$description}', dt = '{$date}', picture = '{$image}' WHERE id = {$id} ";
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        if ($result = $mysqli->query($query) or die($mysqli->error)) {

            if (mysqli_affected_rows($mysqli) == 1) {
                header("Location: engagements.php");
            } else {
                echo "<script>alert(\"The engagement update failed\")<script>";
            }
        } else {
            echo "<script>alert('Info not inserted into the database')</script>";
            echo mysql_error();
        }
    } else {
        echo "there r errors";
        var_dump($errors);
    }
}

//Edit Single Testimony=======================================
if (isset($_POST["upd_testimony"])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $errors = array();
    $required_fields = array('name', 'testimony', 'portfolio');
    foreach ($required_fields as $fieldname) {
        //var_dump($_POST[$fieldname]);
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) {
            $errors[] = $fieldname;
        }
    }

    if (empty($errors)) {
        $id = addslashes($_GET['testimony']);
        $name = addslashes($_POST['name']);
        $testimony = addslashes($_POST['testimony']);
        $portfolio = addslashes($_POST['portfolio']);
        $image = $_FILES['image']['name'];
        if (empty($image)) {
            $query = "UPDATE testimonies SET name = '{$name}', testimony = '{$testimony}', portfolio = '{$portfolio}' WHERE id = {$id} ";
        } else {
            $query = "UPDATE testimonies SET name = '{$name}', testimony = '{$testimony}', portfolio = '{$portfolio}', picture = '{$image}' WHERE id = {$id} ";
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        if ($result = $mysqli->query($query) or die($mysqli->error)) {

            if (mysqli_affected_rows($mysqli) == 1) {
                header("Location: testimonies.php");
            } else {
                echo "<script>alert(\"The testimony update failed\")<script>";
            }
        } else {
            echo "<script>alert('Info not inserted into the database')</script>";
            echo mysql_error();
        }
    } else {
        echo "there r errors";
        var_dump($errors);
    }
}

//About Update Function===================================================================================================
if (isset($_POST["upd_about"])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $errors = array();
    $required_fields = array('profile');
    foreach ($required_fields as $fieldname) {
        //var_dump($_POST[$fieldname]);
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) {
            $errors[] = $fieldname;
        }
    }
    if (empty($errors)) {
        $id = 1;
        $profile = mysql_prep(nl2br($_POST['profile']));
        $image = $_FILES['image']['name'];
        if (empty($image)) {
            $query = "UPDATE about SET profile = '{$profile}' WHERE id = {$id} ";
        } else {
            $query = "UPDATE about SET profile = '{$profile}', picture = '{$image}' WHERE id = {$id} ";
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        if ($result = $mysqli->query($query) or die($mysqli->error)) {
            confirm_query($result);
            if (mysqli_affected_rows($mysqli) == 1) {
                echo "<script>alert(\"The details were succesfully updated\")<script>";
                redirect_to("about.php");
            } else {
                echo "<script>alert(\"The update failed\")<script>";
            }
        } else {
            echo "<script>alert('Info not inserted into the database')</script>";
            echo mysql_error();
        }
    } else {
        echo "there r errors";
        var_dump($errors);
    }
}


//Blog Update Function===================================================================================================
if (isset($_POST["upd_blog"])) {
    $target = "images/" . basename($_FILES['image']['name']);
    $errors = array();
    $required_fields = array('title', 'author', 'summary', 'main_post', 'dt');
    foreach ($required_fields as $fieldname) {
        //var_dump($_POST[$fieldname]);
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) {
            $errors[] = $fieldname;
        }
    }
    if (empty($errors)) {
        $id = mysql_prep($_GET['blog']);
        $title = mysql_prep($_POST['title']);
        $author = mysql_prep($_POST['author']);
        $summary = mysql_prep($_POST['summary']);
        $main_post = nl2br(addslashes($_POST['main_post']));
        $date = mysql_prep(date('y-m-d H:i:s', strtotime($_POST['dt'])));
        $image = $_FILES['image']['name'];
        if (empty($image)) {
            $query = "UPDATE blog SET title = '{$title}', author = '{$author}', dt = '{$date}', summary = '{$summary}', main_post = '{$main_post}' WHERE id = {$id} ";
        } else {
            $query = "UPDATE blog SET title = '{$title}', author = '{$author}', dt = '{$date}', picture = '{$image}', summary = '{$summary}', main_post = '{$main_post}' WHERE id = {$id} ";
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        if ($result = $mysqli->query($query) or die($mysqli->error)) {
            confirm_query($result);
            if (mysqli_affected_rows($mysqli) == 1) {
                header("Location: blog.php");
            } else {
                echo "<script>alert(\"The blog post update failed\")<script>";
            }
        } else {
            echo "<script>alert('Info not inserted into the database')</script>";
            echo mysql_error();
        }
    } else {
        echo "there r errors";
        var_dump($errors);
    }
}

?>