<?php
session_start();
include("config.php");
$uid = $_SESSION['uid'];
$path = "uploads/". $uid;
if( !is_dir($path)) {
	mkdir($path);
}

$imageFileType = explode(".", $_FILES["file"]["name"]);
$filename = sha1($uid . uniqid() . "img") . "." . end($imageFileType);
if( move_uploaded_file($_FILES["file"]["tmp_name"], $path . "/" . $filename)) {
	$sql = "UPDATE aboutme SET profilepic = '$filename' WHERE userID = '$uid'";
	if(mysqli_query($db, $sql)) {
		echo "<body>
<div><img src=\"img/loading.gif\" style=\"position: absolute;
   top: 50%;
   left: 50%;
   width: 500px;
   height: 500px;
   margin-top: -250px; 
   margin-left: -250px;\"></div>
   <div class='alert alert-success text-center' role='alert'> Upload Success!</div>
</body>";
        echo '<script>function goBack() {
    window.history.back();
} 
goBack();</script>';
		} else {
			echo "Fail!";
		}
	} else {
    	$sql = "UPDATE aboutme SET profilepic = NULL WHERE userID = '$uid'";
    if(mysqli_query($db, $sql)) {
        echo "Profile picture removed!";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    } else {
        echo "Fail!";
    }
	}
?>
