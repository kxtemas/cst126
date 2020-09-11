<?php 
require_once 'utility.php';
?>
<!DOCTYPE html>
<!-- 
Author: Katie Munoz
File: loginresponse.php
Date: 02/03/20
Description:
An php file for the user who succesfully log into the welcome page.
-->
<html>
<head>
<meta charset="UTF-8">
<title>Login Success</title>
<img src="camera.png" alt="LOGO">
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
.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("street.jpeg");
  min-height: 75%;
}
.title {
    text-align: center;
    color: white;
    }
 </style>
<body>
	
	

	<ul>
		<li style="display: inline"><a href="loginresponse.php">Home Page</a></li>
		<li style="display: inline"><a href="blogpost.html">Create a Blog Post</a></li>
		<li style="display: inline"><a href="founder.html">About the Creator</a></li>
		<li style="display: inline"><a href="makeBlogRequest.php">List Blogs</a></li>
		<li style="display: inline"><a href="searchblogs.html">Search a Blog Post</a></li>
		<li style="display: inline"><a href="index.html">Log Out</a></li>
	</ul>
	<header class="bgimg" id="home">
<div class="title" style="font-size:90px">Welcome<br>Page
  </div> 
</header>

    <h2> Welcome to Capture's Blog!</h2>
    <p><h3>Thank you for logging! Enjoy the use of the rest of the site and happy blogging.</h3></p>

</body>
</html>