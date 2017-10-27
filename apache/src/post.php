<?php
/**
 * Created by PhpStorm.
 * User: ChunHei
 * Date: 10/27/2017
 * Time: 12:39 PM
 */

$sql = "Select * from post WHERE EXISTS(SELECT * FROM relationship WHERE userID1 = '$uid' OR userID2 = '$uid') ";
$result = mysqli_query($db, $sql);

while($row = @mysqli_fetch_assoc($result)) {
    $temp = $row['userID'];
    echo '  <div class="container"><div class="card mx-auto mt-5">';
    echo '<strong href="profile.php?=">'. mysqli_fetch_row(mysqli_query($db, "SELECT CONCAT_WS(\" \", firstName, lastName) AS fullName FROM user where userID = '$temp'"))[0] .'</strong>';
    echo $row['content'];
    echo  '</div></div>';

    echo '<div><i class="fa fa-thumbs-up" aria-hidden="true" ></i>' . $row['numOfLikes']. '</div>';

}

if(isset($_POST['like'])) {
    $sql = "";

}
?>