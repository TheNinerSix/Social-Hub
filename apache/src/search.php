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
}

} else {

}
echo '</div></div>';

?>



