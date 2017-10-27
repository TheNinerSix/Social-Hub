<?php
session_start();
include ("checkPermission.php");
include("config.php"); 
$uid = $_SESSION['uid']; 
include('navbar.php');
?>
   <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
<?php
$sql = "SELECT * FROM user where user_id = '$uid'";
$result = mysqli_query($db, $sql);
$row = @mysqli_fetch_assoc($result);
if(!is_null($row['user_pic'])) {
	echo '<img class="text-center" src=.\uploads\\' . $uid . '\\' .$row['user_pic'] . ' height="180" width="180">';
} else {
	echo '<img class="text-center" src=".\img\person-placeholder.jpg"height="180" width="180">';
}
?> </div>
        <div class="col-md-4"></div>
          </div>
          <div class="row">
             <div class="col-md-6">
              <form action="upload_action.php" method="post" enctype="multipart/form-data" class="text-center">
                <input class="form-control" type="file" name="file" id="file" aria-describedby="fileHelp">
				</div>
			<div class="col-md-3">
                <input class="form-control text-center" type="submit" name="submit" value="Upload"> </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <h3>Edit Profile</h3>
          <form id="form" name="form" method="post" action="">
            <div class="form-group"> 
			 <div class="form-row">
			   <div class="col-md-6">
				<label>Current Work: </label>
              <input class="form-control" type="text" name="curWork" placeholder="<?php $row['currentWork']?>">
			  </div>
			                <div class="col-md-6">
			  	<label>Previous Work: </label>
              <input class="form-control" type="text" name="prevWork" placeholder="<?php $row['prevWork']?>">
			  </div>
			  </div>
              <br> 
			  			 <div class="form-row">
			   <div class="col-md-6">
			  <label>Current Live At: </label>
              <input class="form-control" type="text" name="curAdd" placeholder="<?php $row['currentAddress']?>">
			  			  </div>
			                <div class="col-md-6">
			  <label>Previous Live At: </label>
              <input class="form-control" type="text" name="prevAdd" placeholder="<?php $row['prevAddress']?>">
			  			  </div>
			  </div>
              <br> <label>Phone Number: </label>
                <input class="form-control" type="text" name="phoneno" ><?php $row['phoneNum']?></input>
              <br> <label>About me: </label>
			  <textarea class="form-control" name="aboutme" form="form"><?php $row['bio']?></textarea>
              <br>
              <input class="btn btn-primary btn-block" type="submit" name="updateProfile" value="Submit"> </div>
          </form>
        </div>
      </div>
    </div>
        </div>

<?php
if(isset($_POST['updateProfile'])) {
    $uid = $_SESSION['uid'];
    $curAdd = $_POST['curAdd'];
    $curWork = $_POST['curWork'];
    $prevWork = $_POST['prevWork'];
    $prevAdd = $_POST['prevAdd'];
    $phoneno = $_POST['phoneno'];
    $about = $_POST['aboutme'];

    $sql = "UPDATE aboutme SET currentAddress = '$curAdd', prevAddress = '$prevAdd',currentWork = '$curWork', prevWork = '$prevWork', phoneNum = '$phoneno', bio = '$about' WHERE userID = '$uid'";
    if(mysqli_query($db, $sql)) {
        echo "OK";
    } else {
        echo "Fail!";
    }
}


?>