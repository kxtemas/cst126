<?php
require_once 'utility.php';
?>
<!DOCTYPE html>

<!-- 
Author: Katie Munoz
File: postresponse.php
Date: 03/03/20
Description:
An PHP file to give the user a response after posting a blog.
-->
<html>
<head>
<meta charset="UTF-8">
<img src="camera.png" alt="LOGO">
<title>Login Success</title>
</head>
<style type="text/css">
Body {
	font-family: Arial, Bold;
	background-color: #CCCAEE;
	color: #000000;
}

img {
	height: 75px;
}

.header {
	font-size: 25px;
	text-align: center;
	display: inline-block;
	position: absolute;
	left: 35%;
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
</style>
<body>
	<div class="header">
		<h2>Thank you for your post!
  <?php
// echo getUserID();
// ?>
    </h2>
	</div>
    <?php
    // $users = getAllUsers($dbName, $tableName);
    // echo "<p> print_r \$users<br>";
    // print_r($users);
    // echo"</p>";
    // include ('_displayUsers.php');
    ?>
    <ul>
		<li style="display: inline"><a href="loginresponse.php">Home Page</a></li>
		<li style="display: inline"><a href="blogpost.html">Create a Blog Post</a></li>
		<li style="display: inline"><a href="founder.html">About the Creator</a></li>
		<li style="display: inline"><a href="makeBlogRequest.php">List Blogs</a></li>
		<li style="display: inline"><a href="searchblogs.html">Search a Blog Post</a></li>
		<li style="display: inline"><a href="index.html">Log Out</a></li>
	</ul>
	<h4>To edit your post, please click "List Blogs".</h4>
</body>
</html>