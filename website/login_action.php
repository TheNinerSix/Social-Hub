<?php 
session_start(); 
include("config.php");
$email = $_POST['email'];
$password1 = $_POST['password1'];
//Search From Database
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($db, $sql);
$row = @mysqli_fetch_row($result);

//Check null
if($email != null && $password1 != null && $row[1] == $email && $row[2] == sha1($email . $password1))
{
		$uid = $row[2];
        $_SESSION['uid'] = $uid;
        echo 'Welcome back!';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
else
{
        echo 'Wrong password or user does not exits!';
       echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}

?>
