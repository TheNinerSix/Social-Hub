<?php
session_start();
include('config.php');
include('navbar.php');
include("checkPermission.php");

$gid = $_SESSION['uid'];
if(isset($_GET['uid'])) {
        $uid = $_GET['uid'];
    }

$sql = "SELECT * FROM user where userID = '$uid'";
$result = mysqli_query($db, $sql);
if(mysqli_num_rows($result) > 0) {
    $user = @mysqli_fetch_assoc($result);
} else {
    header('Loaction:index.php');
    exit();
}


$sql = "SELECT * FROM aboutme where userID = '$uid'";
$result = mysqli_query($db, $sql);
$about = @mysqli_fetch_assoc($result);

$fullname = $user['firstName'] . ' ' . $user['lastName'];

?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Page Title</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/socialhub.css"/>
<<<<<<< HEAD
=======

>>>>>>> V3
    </head>

    <body class="container">
    <a class="pull-right" href="#">Add Friend</a>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Photos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Friends</a>
        </li>
    </ul>



    <div id="page_content" class="row">
        <!-- Left pane that contains multiple cards with profile information -->
        <div class="col-sm-4" id="left_column">
            <!-- Profile summary section -->
            <div id="profile_card" class="card">
                <!-- Profile Picture -->
                <?php
                if (!is_null($about['profilepic'])) {
                    if($gid == $uid){
                        echo '<a data-toggle="modal" data-target="#uploadProfilePicModal"><img class="text-center" src=.\uploads\\' . $uid . '\\' . $about['profilepic'] . ' alt="Card image" height="300px" width="300px"></a>';
                    } else {
                        echo '<img class="text-center" src=.\uploads\\' . $uid . '\\' . $about['profilepic'] . ' alt="Card image" height="300px" width="300px">';
                    }
                } else {
                    if($gid == $uid){
                        echo '<a data-toggle="modal" data-target="#uploadProfilePicModal"><img class="card-img-top" src="img/placeholder_person.png" alt="Card image" ></a>';
                    } else {
                        echo '<img class="card-img-top" src="img/placeholder_person.png" alt="Card image" >';
                    }

                }
                ?>

                <div class="card-body">
                    <!-- Name -->
                    <h4 class="card-title text-center"><?php echo $fullname; ?></h4>
                    <!-- Bio -->
                    <p class="card-text small">Bio: <?php echo $about['bio']; ?></p>
                </div>
            </div>

            <!-- About section -->
            <div id="about_card" class="card">
                <div class="card-body">
                    <!-- Card Title -->
                    <h5 id="about_header" class="card-title text-center">About</h5>
                    <?php
                    if($gid === $uid){
                        echo '<a class="pull-right" data-toggle="modal" data-target="#editProfileModal">Edit</a>';
                    }
                   ?>

                    <!-- Location -->
                    <p class="card-text small about_details"> Lives in: <i><?php echo $about['currentAddress'] ?></i>
                    </p>
                    <!-- Hometown -->
                    <p class="card-text small about_details"> Hometown: <i>Location</i></p>
                    <!-- Work -->
                    <p class="card-text small about_details"> Work: <i><?php echo $about['currentWork'] ?></i></p>
                    <!-- Education -->
                    <p class="card-text small about_details"> Education: <i>College Name</i></p>
                    <!-- Relationship Status -->
                    <p class="card-text small about_details"> Relationship:
                        <i><?php echo $about['relationshipStatus'] ?></i></p>
                </div>
            </div>
        </div> <!-- end left column -->

        <div class="col-sm-8" id="right_column">
            <!-- Profile Posts -->
            <div id="profile_card" class="card">
                <div class="card-body" style="padding: 15px 15px 10px 15px;">
                    <?php include('post_form.php'); ?>
                </div>
            </div>
            <!-- Posts by user -->
            <?php
            $sql = "Select * from post WHERE userID = '$uid' ORDER BY createdTime DESC";
            $result = mysqli_query($db, $sql);
            while ($post = @mysqli_fetch_assoc($result)) {
                $temp = $post['userID'];
                $dt = new DateTime("@" . $post['createdTime']);
                include ('post.php');
            }
            ?>
<<<<<<< HEAD


        </div>

    </div>

=======
        </div>
    </div>
>>>>>>> V3
    </body>
    </html>
    <div class="modal fade" id="uploadProfilePicModal" tabindex="-1" role="dialog"
         aria-labelledby="uploadProfilePicModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadProfilePicModalLabel">Upload Your Profile Picture!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="upload_action.php" method="post" enctype="multipart/form-data" class="text-center">
                        <output id="filesInfo"></output>
                        <input class="form-control" type="file" name="file" id="file" aria-describedby="fileHelp"
                               accept="image/*">
                </div>
                <div class="modal-footer">
                    <input class="form-control" type="submit" name="submit" value="Upload">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form" name="form" method="post" action="">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Current Work: </label>
                                    <input class="form-control" type="text" name="curWork"
                                           placeholder="<?php $row['currentWork'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Previous Work: </label>
                                    <input class="form-control" type="text" name="prevWork"
                                           placeholder="<?php $row['prevWork'] ?>">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Current Live At: </label>
                                    <input class="form-control" type="text" name="curAdd"
                                           placeholder="<?php $row['currentAddress'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Previous Live At: </label>
                                    <input class="form-control" type="text" name="prevAdd"
                                           placeholder="<?php $row['prevAddress'] ?>">
                                </div>
                            </div>
                            <br> <label>Phone Number: </label>
                            <input class="form-control" type="text" name="phoneno"><?php $row['phoneNum'] ?></input>
                            <br> <label>About me: </label>
                            <textarea class="form-control" name="aboutme" form="form"><?php $row['bio'] ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btn-primary btn-block" type="submit" name="updateProfile" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
if (isset($_POST['updateProfile'])) {
    $uid = $_SESSION['uid'];
    $curAdd = $_POST['curAdd'];
    $curWork = $_POST['curWork'];
    $prevWork = $_POST['prevWork'];
    $prevAdd = $_POST['prevAdd'];
    $phoneno = $_POST['phoneno'];
    $about = $_POST['aboutme'];

    $sql = "UPDATE aboutme SET currentAddress = '$curAdd', prevAddress = '$prevAdd',currentWork = '$curWork', prevWork = '$prevWork', phoneNum = '$phoneno', bio = '$about' WHERE userID = '$uid'";
    if (mysqli_query($db, $sql)) {
        echo "OK";
    } else {
        echo "Fail!";
    }
}
?>