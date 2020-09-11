<!DOCTYPE html>
<!-- 
Author: Katie Munoz
File: loginfailed.php
Date: 03/03/20
Description:
An php file for users who fail to log in or do not have an account.
-->
<html>
<head>
<meta charset="UTF-8">
<title>Login Failede</title>
</head>
<style type="text/css">
Body {
	font-family: Arial, Bold;
	background-color: #CCCAEE;
	color: #000000;
}

img {
	height: 75px;
	width: 10%;
}

.header {
	font-size: 25px;
	text-align: center;
	display: inline-block;
	position: absolute;
	left: 40%;
}
</style>
<body>

	<h2>
	<?php echo $message ?></h2>
	<h4>Account invalid, please create an account.</h4>
	<li style="display: inline"><a href="register.html">Registration</a></li>
</body>
</html>