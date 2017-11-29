<?php
/**
 * Created by PhpStorm.
 * User: ChunHei
 * Date: 11/3/2017
 * Time: 8:25 AM
 */
if(!isset($_SESSION)){
   session_start();
}
include("checkPermission.php");
if(isset($_POST['likeOnPost'])) {
    $pid = $_POST['likeOnPost'];
    $uid = $_SESSION['uid'];
    $sql = "Select * From likeonpost Where likeby='$uid' And postID = '$pid'";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) < 1){
        $time = time();
        $sql = "insert into likeonpost (likeBy, postID, epochTime) values ('$uid', '$pid' ,'$time')";
        if(mysqli_query($db, $sql)) {
        }
    }
    echo '<script>function goBack() {
    window.history.back();
} 
goBack();</script>';
}
?>