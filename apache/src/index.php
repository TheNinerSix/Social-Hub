<html>
<head>
</head>
<body>
<?php
session_start(); 
include("config.php");
include('navbar.php');

if(!isset($_SESSION['uid'])) {
	include('register.php'); 
} else {
<<<<<<< HEAD

	$uid = $_SESSION['uid']; 
	include('feeds.php');
}
		 
?>
=======
	include('feeds.php');
}
		 
?>
</body>
</html>
>>>>>>> V3
