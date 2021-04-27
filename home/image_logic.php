<?php
session_start();
require '../config/db.php';
function fetch_images(){
    $output = "";
    $album = $_REQUEST['album'];
    require('../config/db.php');
    $query = "SELECT * FROM `image` WHERE album = '$album'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
        $output .= '
                <div class="col-lg-4 col-md-4 col-sm-6 col-12"> 
                    <a href="photos/image_api.php?id='.$row["id"].'" target="_blank">
                    <img style="margin-bottom:20px;" src="photos/image_api.php?id='.$row["id"].'" class="img-fluid">
                    </a>
                </div>
            ';
        }
    return $output;
}
?>