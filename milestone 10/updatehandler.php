<!DOCTYPE html>
<!-- 
Author: Katie Munoz
File: updatehandler.php
Date: 04/12/20
Description:
An php file for the user to update content in their blogs.
-->
<html>
<head>
<meta charset="UTF-8">
<title> My Activity 5 App</title>
</head>
<style type="text/css">
Body {
	font-family: Arial, Bold;
	background-color: #CCCAEE;
	color: #000000;
}

.header {
	font-size: 25px;
	text-align: center;
	display: inline-block;
	position: absolute;
	left: 40%;
}

ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: #333;
}

li {
	float: left;
}

li a {
	display: block;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
}

li a:hover {
	background-color: #111;
}

.active {
	background-color: #4CAF50;
}

p {
	font-size: 20px;
	text-align: center;
}

img {
	height: 75px;
}

input [type=submit] {
	align: center
}
</style>
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
    $tableName = "Users";
    $userID = getUserID();
    getUser($dbName, $tableName,getUserID());
    $postid = $_POST['postid'];
    $content =$_POST['Content'];
    updateBlog($dbName, $posttableName, $postid, $userID, $content);
    ?>
    <header>
<img src="camera.png " alt="LOGO">
		<div class="header">
			<h3>Thank you for your update!</h3>
		</div>
	</header>
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

	<h4>To view your updated post, click "List Blogs".</h4>
</body>
</html>