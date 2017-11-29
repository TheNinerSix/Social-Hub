<?php
session_start();
include("config.php");
$uid = $_SESSION['uid'];
$valid_formats = array("jpg", "png", "gif", "bmp");
$max_file_size = 3000000;
$path = "uploads/". $uid . "/";
if( !is_dir($path)) {
    mkdir($path);
}
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
    // Loop $_FILES to exeicute all files
    foreach ($_FILES['files']['name'] as $f => $name) {
        $imageFileType = explode(".", $name);
        $name = sha1($uid . uniqid() . "img") . "." . end($imageFileType);
        if ($_FILES['files']['error'][$f] == 4) {
            continue; // Skip file if any error found
        }
        if ($_FILES['files']['error'][$f] == 0) {
            if ($_FILES['files']['size'][$f] > $max_file_size) {
                $message[] = "$name is too large!.";
                continue;
            }
            elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                $message[] = "$name is not a valid format";
                continue; // Skip invalid file formats
            }
            else{
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name)){
                    $time = time();
                    $pid = sha1(uniqid() . time());
                    $sql = "insert into photo (photoID,creatorID,location, createdTime) VALUE ( '$pid','$uid','$name','$time')";
                    if(mysqli_query($db, $sql)) {
                        echo "<body>
<div><img src=\"img/loading.gif\" style=\"position: absolute;
   top: 50%;
   left: 50%;
   width: 500px;
   height: 500px;
   margin-top: -250px; 
   margin-left: -250px;\"></div>
   <div class='alert alert-success text-center' role='alert'> Upload Success!</div>
</body>";
                        echo '<script>function goBack() {
    window.history.back();
} 
goBack();</script>';
                    } else {
                        echo "Fail!";
                    }
                    $count++;
                }
            }
        }
    }
}
?>
