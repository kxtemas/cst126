<!DOCTYPE html>
<!-- 
Author: Katie Munoz
File: deletehandler.php
Date: 04/03/20
Description:
An php file for the user to delete blogs from database.
-->
<html>
<head>
<meta charset="UTF-8">
<title> Blog App</title>
<link href = "default.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php 
    // error reporting
    ini_set('display_errors','1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    // requires
    include ('session.php');
    include ('myfuncs.php');
    include ('utility.php');
    // global variables and constants
    $dbName = "activity";
    $posttableName = "posts";
    $userstableName = "users";
    $userID = getUserID();
    $user = getUser($dbName, $userstableName,getUserID());
    $postid = $_GET['postid'];
    deleteBlog($dbName, $posttableName, $postid)
    ?>


	<h3>Thank for the time your post was posted for,
	<?php echo $user ?></h3>
	<hr>
	<ul>
		<li style="display: inline"><a href="loginresponse.php">Home Page</a></li>
		<li style="display: inline"><a href="blogpost.html">Create a Blog Post</a></li>
		<li style="display: inline"><a href="founder.html">About the Creator</a></li>
		<li style="display: inline"><a href="makeBlogRequest.php">List Blogs</a></li>
		<li style="display: inline"><a href="searchblogs.html">Search a Blog Post</a></li>
		<li style="display: inline"><a href="index.html">Log Out</a></li>
		</ul>
	<hr>


</body>
</html>