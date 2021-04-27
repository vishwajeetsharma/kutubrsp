<?php

session_start();
$name = $_SESSION['name'];
$times = $_SESSION['time'];
$new_times = time();
$diff_times = ($new_times - $times);
if ($diff_times > 40) {
    header('location: /logout.php');
}
else{
    $_SESSION['time'] = $new_times;
}
date_default_timezone_set('Asia/Calcutta');
$name = $_SESSION['name'];
$time = date('d-m-y h:i A');
$con = "UPDATE `last_seen` SET time = '$time' WHERE name = '$name'";
mysqli_query($conn, $con);
?>