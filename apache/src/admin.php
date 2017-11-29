<?php
/**
 * Created by PhpStorm.
 * User: ChunHei
 * Date: 11/28/2017
 * Time: 6:37 PM
 */
session_start();
include ('config.php');
include('inc/deletePost.php');
if(isset($_SESSION['admin']) && $_SESSION['admin']) {
    $sql = "Select * from report";
    $result = mysqli_query($db, $sql);
    echo '<body class="container">
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-feedback.html">Feedback</a>
                </li>
            </ul>
        </div>
              <div class="card-body">';

while($report = mysqli_fetch_assoc($result)) {
    $dt = new DateTime("@" . $report['reportTime']);
    echo '
            <!-- This is an example report card -->
            <div class="card small-margin">
                <div class="card-header">
                    <div class="float-left inline"><b>Reported By: </b><div id="reportBy" class="inline">'. $report['reportBy'].'</div></div>
                    <div id="reportDate" class="float-right">'. $dt->format('Y-m-d H:i:s') . '</div>
                </div>
                <div class="card-body">
                    <div class="card-text text-left">
                        <p class="inline"><b>Post ID: </b><div class="inline" id="postID">'. $report['postID'].'</div></p>
                        <p class="inline"><b>Content: </b><div class="inline" id="reportContent">'. $report['content'].'</div></p>      
                    </div>
                </div>
                <div class="card-footer">
                <a class="dropdown-item open-deleteDialog" data-toggle="modal" data-target="#deleteModal" data-id="'. $report['postID'].'">Delete</a>
</div>
            </div>';
}

echo '
        </div>
    </div>

</body>

<style>
    .inline {
        display: inline;
    }

    .small-margin {
        margin-bottom: 20px;
    }
</style>';
}
?>