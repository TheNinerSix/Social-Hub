
<?php
session_start(); 
include("config.php");
include('navbar.php');
$uid = $_SESSION['uid'];
if(isset($_GET['mid'])) {
    $mid = $_GET['mid'];
		$sql = "SELECT * FROM message where msgID = '$mid' ORDER BY time";
		$result = mysqli_query($db, $sql);
	echo '  

  <div class="container">
    <div class="card mx-auto mt-5" style="max-width: 900px;">
        <div class="card-header text-center" style="background-color:  #333333; color: white;">Conversation</div>
        <div id="main">
        <div id="con" class="card-body" style="overflow-y: scroll; height:65%;">
    ';
		while($row = mysqli_fetch_assoc($result)) {

            $temp = $row['creatorID'];
            if ($temp !== $uid) {
                echo '
			 <div class="card" style="max-width: 400px; margin: 5px auto 5px 0px;">
                <!-- Message Content -->
                <div class="card-body" style="padding: 12px;">
                    <div class="text-left">' . $row['content'] . '</div>
                </div>
                <!-- Message Date -->
                <div class="card-footer text-muted text-left" style="padding: 5px 12px; font-size: 12.5px;">' . $row['time'] . '</div>     
            </div>
			    ';
            } else {
                echo '
			    <div class="card" style="max-width: 400px; margin: 5px 0px 5px auto;">
                <!-- Message Content -->
                <div class="card-body" style="background-color: #CCCCCC; padding: 12px;">
                    <div class="text-right">' . $row['content'] . '</div>
                </div> 
                <!-- Message Date -->
                <div class="card-footer text-muted text-right" style="padding: 5px 12px; font-size: 12.5px;">' . $row['time'] . '</div>               
            </div>
			    ';
            }
		}
		
		
		echo '</div></div><form id="form" name="form" method="post" action=""> <textarea class="form-control" name="message" form="form"> </textarea>  <br>
              <input class="btn btn-primary btn-block" type="submit" name="submit" value="Submit"> </div></form>';
		  
		echo  '</div></div>';

} else {

    echo '
  <body class="container" style="padding-top: 30px">
    <div class="card mx-auto" style="max-width: 850px;">
        <div class="card-header text-center" style="background-color:  #333333; color: white;">Conversations</div>
        
        <!-- Begin conversations - each conversation is encompassed in its own card -->
        <div class="card-body">
            
            <!-- First conversation here -->
            <div class="card" style="margin: 0px 0px 15px 0px;">
                <div style="max-width: 900px; display: flex; justify-content: space-between; align-items: center;">
                    <!-- Profile Picture, Name, and Link to click to view conversation -->
                    <div><a href="#"><img src="img/placeholder_person.png" height="100" width="100" alt="Profile Picture"> <font size="6" class="align-middle" style="margin-left: 10px">John Doe</font></a></div>
                    <div></div>
                    <div style="margin-right: 15px;">
                        <!-- Date and Time of Conversation -->
                        <div class="text-muted" style="font-size: 12.5px; text-align: right">11/26/17 02:40pm</div>
                        <!-- Last conversation message -->
                        <div style="text-overflow: ellipsis; white-space: nowrap; width: 25em; overflow: hidden">Last conversation message here. The text automatically stops at a certain width.</div>
                    </div>
                </div>
            </div>
        </div> <!-- End conversations -->


    </div>
</body>  

    ';



}
	

if(isset($_POST['submit'])){ //check if form was submitted
  $message = $_POST['message']; //get input text

$sql = "insert into message (msgID, content, creatorID, relatedID) values ('$mid', '$message', '$uid', '$temp')";
if(mysqli_query($db, $sql)) {
	
}
}    


?>


