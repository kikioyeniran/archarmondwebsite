<?php require_once("includes/sessions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php

if (isset($_GET['portfolioid'])) {
    $id = mysql_prep($_GET['portfolioid']);
    if ($id) {
        $stmt = $mysqli->prepare("DELETE FROM portfolio WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            header("Location: portfolio.php");
        } else {
            //Deletion Failed
            echo "<script>alert(\"Image deleted from database\")<script>";
        }
    } else {
        //subject didn't exist in  database
        header("Location: portfolio.php");
    }
}

if (isset($_GET['projectsid'])) {
    $id = mysql_prep($_GET['projectsid']);
    if ($id) {
        $stmt = $mysqli->prepare("DELETE FROM projects WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            header("Location: projects.php");
        } else {
            //Deletion Failed
            echo "<script>alert(\"Image deleted from database\")<script>";
        }
    } else {
        //subject didn't exist in  database
        header("Location: projects.php");
    }
}

if (isset($_GET['directorid'])) {
    $id = mysql_prep($_GET['directorid']);
    if ($id) {
        $stmt = $mysqli->prepare("DELETE FROM directors WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            header("Location: directors.php");
        } else {
            //Deletion Failed
            echo "<script>alert(\"Image deleted from database\")<script>";
        }
    } else {
        //subject didn't exist in  database
        header("Location: directors.php");
    }
}

?>
