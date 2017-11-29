
<?php
include("checkPermission.php");
echo '
<div class="card" style="margin: 10px;">
    <div class="card-body">
        <div class="small text-muted" style=""><a class="nounderline" href="profile.php?uid='.$temp.'"><img src = ".\uploads\\' . $temp . '\\' . mysqli_fetch_row(mysqli_query($db, "SELECT profilepic FROM aboutme where userID = '$temp'"))[0] . '" height="50" width="50"> <span class="card-title"><font size="4">'. mysqli_fetch_row(mysqli_query($db, "SELECT CONCAT_WS(\" \", firstName, lastName) AS fullName FROM user where userID = '$temp'"))[0] .'</font></span></a>

            <div class="dropdown float-right">
                <a onclick="stopRefresh();" class="float-right" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="fa fa-ellipsis-h fa-lg" aria-hidden="true"></div>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item open-reportDialog" data-toggle="modal" data-target="#reportModal" data-id="' . $post['postID']. '">Report</a>';
        if(isset($_SESSION['admin']) && $_SESSION['admin']) {
            echo '<a class="dropdown-item open-deleteDialog" data-toggle="modal" data-target="#deleteModal" data-id="'. $post['postID'].'">Delete</a>';
        }
               echo' </div>
            </div>

        </div>
        <div id="post_content">
            <div class="small text-muted"><p style="text-align: left;">'. $dt->format('Y-m-d H:i:s') . '</p></div>
            <div id="post_content"><p>' . $post['content'] . '</p></div>
            <hr>
            <div class="card-text">
             <div class="row col-md-4">                ';
$pid = $post['postID'];
$s = "SELECT * FROM likeonpost WHERE postID = '$pid'";
$r = mysqli_query($db, $s);
$lnum = mysqli_num_rows($r);
                echo '<div>
                <form id="likeOnPostForm" method="post" action="likeOnPost.php" style="padding-top: 2px;padding-left: 10px"><input type="hidden" name="likeOnPost" value="' . $post['postID'].'"/><button class="astext" style="color: #6495ED"><i class="fa fa-thumbs-up" aria-hidden="true"></i> '.$lnum.'</button></form>
                </div>
            </div>
            </div>
            <form action="comment_post.php" method="post">
            <input type="hidden" name="pid" value="'.$post['postID'].'">
            <input name="comment" type="text" class="form-control" autocomplete="off" placeholder="Add a comment..."id="post" onclick="stopRefresh()" required>
            <input type="submit" style="display:none;" />
            </form>  
            ';
$pid = $post['postID'];
$commentSql = "SELECT * FROM comment WHERE relatedID = '$pid' ORDER BY createdTime";
$commentResult = mysqli_query($db, $commentSql);
while ($comment = mysqli_fetch_assoc($commentResult)) {
    $temp = $comment['userID'];
    $dt = new DateTime("@" . $comment['createdTime']);
    echo'
            <div class="card-footer text-muted">
                <!-- Post Comments -->
                <div>
                <a class="nounderline" href="profile.php?uid='.$temp.'"><img onerror="this.src=\'Default.jpg\'" src = ".\uploads\\' . $temp . '\\' . mysqli_fetch_row(mysqli_query($db, "SELECT profilepic FROM aboutme where userID = '$temp'"))[0] . '" height="35" width="35"> <span class="card-title"><font size="4">'. mysqli_fetch_row(mysqli_query($db, "SELECT CONCAT_WS(\" \", firstName, lastName) AS fullName FROM user where userID = '$temp'"))[0] .'</font></span></a><span style="font-size: 16px">:  '.$comment['content'].'</span>
                </div>
            </div>
';
}
 echo '
        </div>
    </div>
</div>
';
include('inc/report.php');
include ('inc/deletePost.php');

        ?>