<?php
require("constants.php");
// 1. Create Database Connection
/*	$connection = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	if(!$connection){
		die("Database connection failed: ". mysql_error());
		}
//2. Select the database to use
	$db_select = mysql_select_db(DB_NAME, $connection);
	if(!$db_select){
		die("Database connection failed: ". mysql_error());
		}*/
$mysqli = new mysqli('localhost', 'root', '', 'archamond') or die(mysqli_error($mysqli));
