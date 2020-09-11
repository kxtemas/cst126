<!DOCTYPE html>
<!-- 
Name: Katie Munoz
Date: 04/ 06/ 2020
File: SearchHandler.php
Description: Matches the user search to those set in the database.
 -->
<html>
<head>
<meta charset="UTF-8">

<title>Blog App</title>
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
table.mytable
    {position: absolute;
     left: 42.5%;
     border:5px solid white;
     width: 250px;}
    
table.mytable >thead > tr> th
    {font-size: 5 em;}
    
table.mytable > tbody > tr > td 
    {color: #999;}
</style>
<body>
    <?php
    // error reporting
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    // requires
    include ('session.php');
    include ('myfuncs.php');
    include ('utility.php');
    // global variables and constants
    $dbName = "activity";
    $posttableName = "posts";

    define('EMPTY_STRING', "");
    ?>
	<header>
		<!---insert image from files--->
		<img src="camera.png" alt="LOGO">
		<div class="header">
			<h2>Search for a Blog</h2>
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
	<table class="mytable">
	<?php
$title = $_POST['searchTitle'];
$content = $_POST['searchContent'];

$blogs = searchBlogs($dbName, $posttableName, $title, $content);
for ($index = 0; $index < count($blogs); $index ++) {

    echo "<tr>";
    echo "<th>" . $blogs[$index][1] . "</th>";
    echo "<td><li><a href= 'getblogrequest.php? 
                userID_PostsBy=" . $blogs[$index][0] . "&Title=" 
	    . $blogs[$index][1] . "&Content=" . $blogs[$index][2] . "&postid=" 
	    . $blogs[$index][3] . "'>View</a></td></li>";
    echo "</tr>";
   
}
?>
		</table> 
<?php

?>
</body>
</html>