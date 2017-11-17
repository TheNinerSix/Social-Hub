<?php
/**
 * Created by PhpStorm.
 * User: ChunHei
 * Date: 11/2/2017
 * Time: 6:33 AM
 */
<<<<<<< HEAD
include("checkPermission.php");
=======
if(!isset($_SESSION)) {
    session_start();
}
include("checkPermission.php");
$uid = $_SESSION['uid'];
>>>>>>> V3
$sql = "SELECT * FROM user where userID = '$uid'";
$result = mysqli_query($db, $sql);
$user = @mysqli_fetch_assoc($result);
$sql = "SELECT * FROM aboutme where userID = '$uid'";
$result = mysqli_query($db, $sql);
$about = @mysqli_fetch_assoc($result);

$fullname = $user['firstName'] . ' ' . $user['lastName'];
?>
<<<<<<< HEAD
=======
<script>
    window.setInterval(function() {
        $("#feeds").load('feeds.php #feeds');
    }, 5000);
</script>
>>>>>>> V3
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/socialhub.css" />
<div class="container">
<div id="page_content" class="row">
<div class="col-sm-4" id="left_column">
    <div class="card">
            <ul class="nav flex-column">
                <li class="nav-item" ><a class="nav-link" href="profile.php">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#">News Feed</a></li>
                <li class="nav-item"><a class="nav-link" href="message.php">Messages</a></li>
            </ul>
    </div>
</div>

    <div class="col-sm-8" id="right_column">
        <!-- Profile Posts -->
        <div id="profile_card" class="card">
            <div class="card-body" style="padding: 15px 15px 10px 15px;">
                <?php include('post_form.php'); ?>
            </div>
        </div>
<<<<<<< HEAD
        <?php
        $sql = "Select * from post WHERE EXISTS (SELECT * FROM relationship WHERE userID1 ='$uid' OR userID2='$uid' AND relationship = 1) ORDER BY createdTime DESC";
=======
        <div id="feeds">
        <?php
        $sql = "SELECT * FROM post WHERE userID = '$uid ' UNION SELECT * FROM post WHERE userID = ANY (SELECT userID1 FROM relationship WHERE userID1='$uid' OR userID2 = '$uid' AND relation = 1 UNION SELECT userID2 FROM relationship WHERE userID1='$uid' OR userID2 = '$uid' AND relation = 1) ORDER BY createdTime DESC LIMIT 5 ";
>>>>>>> V3
        $result = mysqli_query($db, $sql);
        while ($post = @mysqli_fetch_assoc($result)) {
            $temp = $post['userID'];
            $dt = new DateTime("@" . $post['createdTime']);
           include('post.php');
        }
        ?>
<<<<<<< HEAD



    </div>
</div>
</div>
=======
        </div>
    </div>
</div>
</div>


>>>>>>> V3
