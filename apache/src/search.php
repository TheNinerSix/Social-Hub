<?php
/**
 * Created by PhpStorm.
 * User: ChunHei
 * Date: 10/25/2017
 * Time: 3:05 AM
 */
session_start();
include("config.php");
include('navbar.php');


if(isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
<<<<<<< HEAD
    $result = mysqli_query($db,"SELECT * FROM user where (firstName like '$keyword' OR lastName like '$keyword')");
    echo '
<div class="card" style="margin: 10px 0px;">
<div class="card-header">
<h1>Search Result</h1>
</div>
<div class="card-body">
<h4>User</h4>
';

while ($obj = @mysqli_fetch_assoc($result)) {
    $fullname = $obj['firstName'] . $obj['lastName'];
    echo '<a href="profile.php?uid='.$obj['userID'].'"<strong>'.$fullname.'</strong></a>';
=======
    $result = mysqli_query($db,"SELECT * FROM user where (LOWER(firstName) like LOWER('%$keyword%') OR LOWER(lastName) like LOWER('%$keyword%'))");
    echo '
<div class="" style="margin: 10px 0px;">
<h1>Search Result</h1>
</div>
<div class="">
<h4>User</h4>
<div class="row">
';

while ($obj = @mysqli_fetch_assoc($result)) {
    $fullname = $obj['firstName'] . " " .$obj['lastName'];
    $xid = $obj['userID'];
    echo '<div class="card col-lg-2"><p><a href="profile.php?uid='.$obj['userID'].'"><img src = ".\uploads\\' . $xid . '\\' . mysqli_fetch_row(mysqli_query($db, "SELECT profilepic FROM aboutme where userID = '$xid'"))[0] . '" height="50" width="50"> <strong>'.$fullname.'</strong></a></p></div>';
>>>>>>> V3
}

} else {

}
<<<<<<< HEAD
echo '</div></div>';
=======
echo '</div></div></div>';
>>>>>>> V3

?>



