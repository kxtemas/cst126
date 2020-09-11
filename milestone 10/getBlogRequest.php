<!DOCTYPE html>
<!-- 
Author: Katie Munoz
File: getblogrequest.php
Date: 04/03/20
Description:
An php file to get the blog information from database table.
-->
<html>
<head>
<meta charset="UTF-8">
<title> Blog App</title>
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

input {
	text-align: center;
	background-color: #ffffff;
	border: 2px solid transparent;
	border-radius: 3px;
	font-size: 16px;
	font-weight: 200;
	padding: 10px 0;
	width: 375px;
	transition: border .5s;
}
input [type=submit] {
	align: center
}
.pasta {
	text-align: center;
	background-color: #ffffff;
	border: 2px solid transparent;
	border-radius: 3px;
	font-size: 16px;
	font-weight: 200;
	padding: 10px 0;
	width: 375px;
	transition: border .5s;
}
</style>
<body>
	<header>
		<!---insert image from files--->
	
			<!---insert image from files--->
			<img src="camera.png " alt="LOGO">
			<div class="header">
				<h2>Blog Entry</h2>
			</div>
		
	</header>
	<ul>
		<li style="display: inline"><a href="loginresponse.php">Home Page</a></li>
		<li style="display: inline"><a href="blogpost.html">Create a Blog Post</a></li>
		<li style="display: inline"><a href="founder.html">About the Creator</a></li>
		<li style="display: inline"><a href="makeBlogRequest.php">List Blogs</a></li>
		<li style="display: inline"><a href="searchblogs.html">Search a Blog Post</a></li>
		<li style="display: inline"><a href="index.html">Log Out</a></li>
		</ul>
	<hr>
<!-- 	<table> -->
<!-- 	<tr> -->
<!-- 	<th>Blog Title 1</th> -->
<!-- 	<td><a href= "getblogrequest.php?id=1&mode=0">View</a></td> -->
<!-- 	</tr> -->
<!-- 	<tr> -->
<!-- 	<th>Blog Title 2</th> -->
<!-- 	<td><a href= "getblogrequest.php?id=1&mode=0">View</a></td> -->
<!-- 	</tr> -->
<!-- 	</table> -->
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
	$tableName = "Users";

	$userID = getUserID();
	// $user = getUser($dbName, $tableName, $userID);
	$title = $_GET['Title'];
	$content = $_GET['Content'];
	$userID_PostsBy= $_GET['userID_PostsBy'];
	$postid = $_GET['postid'];
	// 	echo "<em>ID:</em> $id<br>";
// 	echo "<em>Mode:</em> $mode<br>";
	?>
	<form action= "updatehandler.php" method="post">		
		<p>
			<label>Title</label><br> <input type="text" 
			name="title" maxlength="50" size="50" 
			readonly value="<?php 
			echo $title;
			?>">
		</p>
		<p>
			<label>Author</label><br> <input type="text" name="author" 
				maxlength="50" size="50" readonly
				value = "<?php 
				echo getUser($dbName, $tableName, $userID_PostsBy);
				?>">
		</p>
		<p>
			<label>Content</label><br>
			<textarea name="Content" rows="10" cols="50">
			<?php echo $content; ?></textarea>
		</p> 
		<p>
		<input type="text" name= "postid"
		maxlength="ll" size="11" hidden value="<?php echo $postid; ?>">
		<input type="submit" name="submit" value="Update"></p>
		<p>
		<button> <div class= "pasta">
			<a href= "deletehandler.php?postid=
			<?php echo $postid;?>"
			>Delete</a></div>
		</button>
		</p>
	</form>
</body>
</html>