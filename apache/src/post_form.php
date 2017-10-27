<h1>Test POST</h1>
<form id="form" name="form" method="post" action="">
    <textarea class="form-control" name="content" placeholder="Enter Here"></textarea>
    <input class="btn btn-primary btn-block" type="submit" name="submit" value="Submit"> </div>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: ChunHei
 * Date: 10/27/2017
 * Time: 11:34 AM
 */
if(isset($_POST['submit'])) {
    $content = $_POST['content'];
    $uid = $_SESSION['uid'];
    $pid = sha1(uniqid() . time());
    $sql = "insert into post (postID, userID, content, numOfLikes) values ('$pid' , '$uid', '$content', 0 )";
    if(mysqli_query($db, $sql)) {
        echo 'done!';
    } else {
        echo 'fail!';
    }
}

?>