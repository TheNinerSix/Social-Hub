<?php
/**
 * Created by PhpStorm.
 * User: ChunHei
 * Date: 11/26/2017
 * Time: 1:29 PM
 */
session_start();
include("config.php");
if(isset($_POST['comment'])) {
    $content = $_POST['comment'];
    $pid = $_POST['pid'];
    $uid = $_SESSION['uid'];
    $cid = sha1(uniqid() . time());
    $ctime = time();

    $sql = "insert into comment (commentID, userID, content, createdTime, relatedID) values ('$cid' , '$uid', '$content', '$ctime', '$pid')";
    if(mysqli_query($db, $sql)) {
        echo '<script>function goBack() {
    window.history.back();
} 
goBack();</script>';
    } else {

    }

}
?>