<?php
session_start();
require 'config/db.php';
function fetch_album(){
    $output = "";
    require('config/db.php');
    $query = "SELECT * FROM `album` ORDER BY Id";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
        $output .= '
                <div data-aos="fade-down" class="col-lg-3 col-md-6 col-sm-6 col-6 albums"> 
                    <a href="home/image.php?album='.$row["album_name"].'"><img src="home/images/Folder-icon.png" height="100px" width="auto"><br>'.$row["album_name"].'</a>
                </div>
            ';
        }  
    return $output;
}
function last_seen(){
    $output = "";
    require('config/db.php');
    $query = "SELECT * FROM `last_seen`";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
        $output .= '
                    <li>'.$row["name"].'---'.$row["time"].'</li>
            ';
        }  
    return $output;
}
$name = "";
$pass = "";
$error = array();
date_default_timezone_set('asia/kolkata');
$date = date('d-m-y H:i:s');

if (isset($_POST['login_btn'])) {
    $name = strtolower($_POST['username']);
    $pass = $_POST['password'];

    // empty and correct form validation
    if (empty($name)) {
        $errors['name'] = "Name Required";
    }
    if (empty($pass)) {
        $errors['pass'] = "Password Required";
    }

    $q = " select * from login where UserName = '$name' && Password = '$pass'";
    $result = mysqli_query($conn, $q);
    $num = mysqli_num_rows($result);
    
    if($num == 1){
        $_SESSION['login'] = $name;
        $_SESSION['pass'] = $pass;
        header('location:question.php');
    }
    else{
        $errors['login'] = "Invalid Credentials";
    }
}

if (isset($_POST['question_btn'])) {
    $name = $_SESSION['login'];
    $ans = $_POST['question'];
    if (empty($ans)) {
        $errors['ans'] = "Please Select Any option";
    }
    if ($ans == '30J') {
        $_SESSION['name'] = $name;
        $_SESSION['time'] = time();
        header('location:index.php');
    }else if ($ans == '16M') {
        $_SESSION['name'] = $name;
        $_SESSION['time'] = time();
        header('location:index.php');
    }else if ($ans == '12F') {
        $_SESSION['name'] = $name;
        $_SESSION['time'] = time();
        header('location:index.php');
    }else if ($ans == 'big') {
        $_SESSION['name'] = $name;
        $_SESSION['time'] = time();
        header('location:index.php');
    }else {
        $errors['ans'] = "Wrong Answer";
    }
}
