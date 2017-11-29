<?php
session_start();
include("config.php");
if(!isset($_POST['email'])) {
header('Location: ./index.php');
	die;
	} else {
$email = $_POST['email'];
$password1 = $_POST['password1'];	
//Search From Database
$sql = "SELECT * FROM user where email = '$email'";
$result = mysqli_query($db, $sql);
$row = @mysqli_fetch_row($result);

//Check null
if($email != null && $password1 != null && $row[1] == $email && $row[2] == sha1($email . $password1))
{
		$uid = $row[0];
        $_SESSION['uid'] = $uid;
      $sql = "Select * from admin where userID = '$uid'";
        $result = mysqli_query($db,$sql);
        if(@mysqli_num_rows($result) > 0) {
            $_SESSION['admin'] = TRUE;
        }
		echo '
<body>
<div><img src="img/loading.gif" style="position: absolute;
   top: 50%;
   left: 50%;
   width: 500px;
   height: 500px;
   margin-top: -250px; 
   margin-left: -250px;"></div>
<meta http-equiv=REFRESH CONTENT=1;url=index.php>
</body>
';
}
else
{
        echo '<div style="position: absolute;
   top: 50%;
   width: 100%;
   height: 500px;
   margin-top: -250px; 
"><div class="alert alert-danger text-center" role="alert">Wrong password or user does not exits!</div></div>';
       echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
}

?>
