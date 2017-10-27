<?php
session_start(); 
include("config.php");
$uid = $_SESSION['uid']; 
$curtown = $_POST['curtown'];
$curWork = $_POST['curWork'];
$prevWork = $_POST['prevWork'];
$hometown = $_POST['hometown'];
$gender = $_POST['gender'];
$phoneno = $_POST['phoneno'];
$about = $_POST['aboutme'];

if(isset($_POST['gender'])) {
	
$sql = "UPDATE user SET user_currentLivingTown = '$curtown', user_currentWork = '$curWork', user_prevWork = '$prevWork', user_hometown = '$hometown', user_gender = '$gender', user_phoneNum = '$phoneno', user_about = '$about' WHERE user_id = '$uid'";
if(mysqli_query($db, $sql)) {
	echo "OK";
} else {
	echo "Fail!";
}
}

/*
$path = "uploads/". $uid;
if( !is_dir($path)) {
	mkdir($path);
}


$imageFileType = explode(".", $_FILES["file"]["name"]);
$filename = sha1($uid . uniqid() . "img") . "." . end($imageFileType);
if( move_uploaded_file($_FILES["file"]["tmp_name"], $path . "/" . $filename)) {
	$sql = "UPDATE user SET user_pic = '$filename' WHERE user_id = '$uid'";
	if(mysqli_query($db, $sql)) {
		
	}
	} else {
		//fail msg bah bah bah 
	}
	*/

	?>