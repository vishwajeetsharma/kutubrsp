<?php
session_start();
require_once '../config/db.php';
$errors = array();
function  fetch_msg(){
    $output = "";
    require '../config/db.php';
    $time = time();
    $query = "SELECT * FROM `msg` ORDER BY id";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
            if ($_SESSION['name'] == 'master') {
                
                    
                if($row['msg_from'] == 'master'){
                    $output .= '
                    <div class="chat master">
                            <div class="details">
                                <p> '.$row['msg'].' </p>
                            </div>
                        </div>
                    ';
                }
                else{
                    $output .= '
                    <div class="chat incoming">
                        <div class="details">
                            <p> '.$row['msg'].'<br> <b>'.$row['msg_from'].'</b> - </p>
                        </div>
                    </div>
                ';
                }
            }  
            else{
                if ($row['msg_from'] == 'master'){
                        $output .= '
                        <div class="chat master">
                            <div class="details">
                                <p> '.$row['msg'].' </p>
                            </div>
                        </div>
                    ';
                }
                else if($row['msg_from'] == $_SESSION['name']){
                    $output .= '
                    <div class="chat outgoing">
                            <div class="details">
                                <p> '.$row['msg'].' </p>
                            </div>
                        </div>
                    ';
                }
                else{
                    $output .= '
                    <div class="chat incoming">
                            <div class="details">
                                <p> '.$row['msg'].' </p>
                            </div>
                        </div>
                    ';
                }
            }
        }
    return $output;
}
    if($_SESSION['name'] == 'kutubuddin'){
        $status_name = 'reetasaini';
        $real_name = 'Reeta';
    }
    else if($_SESSION['name'] == 'reetasaini'){
        $status_name = 'kutubuddin';
        $real_name = 'Kutub';
    }
    else if($_SESSION['name'] == 'master'){
        $status_name = 'Chats';
        $real_name = 'Chats';
    }

    $_SESSION['status_name'] = $real_name;
    $sql = " select * from `last_seen` where name = '$status_name'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if (count($errors) === 0) {
        if($num == 1){
            // getting user details
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['status'] = $row['time'];
            }
        }
    }

    if (isset($_POST['msg_btn'])) {
        $msg = $_POST['msg'];
        $time = time();
        $msg_from = $_SESSION['name'];
        $con = " INSERT INTO msg (msg, msg_from, time) values ('$msg', '$msg_from', '$time') ";
        mysqli_query($conn, $con);
    }

?>
