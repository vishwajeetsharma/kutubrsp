<?php
session_start();
require '../config/db.php';

$name = $_SESSION['name'];
$pass = "";
$album = "";
$errors = array();
$msgs = array();

if (isset($_POST['change_btn'])) {
    $name = $_SESSION['name'];
    $old = $_POST['old_pass'];
    $pass = $_POST['password'];
    if (empty($old)) {
        $errors['old_pass'] = " Old Password Required";
    }
    else if($old != $_SESSION['pass']){
        $errors['old_pass'] = "Old password is wrong";
    }
    if (empty($pass)) {
        $errors['pass'] = " New Password Required";
    }
    if(count($errors) === 0){
        $q = " select * from login where UserName = '$name'";
        $result = mysqli_query($conn, $q);
        $num = mysqli_num_rows($result);
        if($num == 1){
            // mysql_query("UPDATE login (Password) VALUES ('$pass') WHERE UserName = '$name'");
            $con = "UPDATE `login` SET Password = '$pass' WHERE UserName = '$name'";
            mysqli_query($conn, $con);
            $_SESSION['pass'] = $pass;
            $msgs['changed'] = "Password Successfully Changed ";
        }
        else{
            $errors['login'] = "Internal server error";
        }
    }
}

// If user clicks on new album button 
if (isset($_POST['add_album_btn'])){
    $album = $_POST['album'];
    if (empty($album)) {
        $errors['album'] = "Please Enter any value to continue";
    }
    if(count($errors) === 0){
        $con = " INSERT INTO album (album_name) values ('$album') ";
        mysqli_query($conn, $con);
        $msgs['album'] = "Successfully added new album";
    }
        
}


// // If user clicks on add image button
 if (isset($_POST['add_btn'])) {
         $album = $_POST['album'];
    $files = array_filter($_FILES['image']['name']); 
    $total_count = count($_FILES['image']['name']);
    for( $i=0 ; $i < $total_count ; $i++ ) {
        $tmpFilePath = $_FILES['image']['tmp_name'][$i];
        $image = $_FILES['image']['name'][$i];
        $image_db = time().basename($image);
        $newFilePath = "photos/".time().basename($image);
        // iserint into database 
        $date = date("d-m-y");
        $con = " INSERT INTO `image` (img_name, album, date) values ('$image_db', '$album', '$date') ";
            mysqli_query($conn, $con);
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            $msgs['images_upload'] = $total_count." Images uploaded Successfully";
            // echo "Your Image uploaded successfully";
        }else{
            echo  "Not Insert Image";
        }
    }
   }
?>