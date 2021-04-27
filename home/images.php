<?php
session_start();
require '../config/db.php';
require '../controllers/auto_logout.php';
if(!isset($_SESSION['name'])){
    header('location:login.php');
}
function fetch_datas(){
    $output = "";
    require '../config/db.php';
    if (isset($_POST['filter_btn'])) {
        if ($_POST['album'] == 'all') {
            $query = "SELECT * FROM `image` ORDER BY Id";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
                $output .= '
                    <tr>
                        <td><img src="photos/image_api.php?id='.$row["id"].'" class="img-fluid" height="70px" width="70px"></td>
                        <td>'.$row["img_name"].'</td>
                        <td><a href="home/image.php?album='.$row["album"].'">'.$row["album"].'</a></td>
                        <td><form method="post" action="images.php"><input type="hidden" name="id" value="'.$row["id"].'"><input type="submit" name="delete_btn" value="Delete" class="btn btn-danger"></form></td>
                    </tr>
                    ';
            } 
        }else{
            $selected_album = $_POST['album'];
            $query = "SELECT * FROM `image` WHERE album = '$selected_album' ORDER BY Id";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
                $output .= '
                    <tr>
                        <td><img src="photos/image_api.php?id='.$row["id"].'" class="img-fluid" height="70px" width="70px"></td>
                        <td>'.$row["img_name"].'</td>
                        <td><a href="home/image.php?album='.$row["album"].'">'.$row["album"].'</a></td>
                        <td><form method="post" action="images.php"><input type="hidden" name="id" value="'.$row["id"].'"><input type="submit" name="delete_btn" value="Delete" class="btn btn-danger"></form></td>
                    </tr>
                    ';
            }
        }
    }else{
        $query = "SELECT * FROM `image` ORDER BY Id";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $output .= '
                <tr>
                    <td><img src="photos/image_api.php?id='.$row["id"].'" class="img-fluid" height="70px" width="70px"></td>
                    <td>'.$row["img_name"].'</td>
                    <td><a href="home/image.php?album='.$row["album"].'">'.$row["album"].'</a></td>
                    <td><form method="post" action="images.php"><input type="hidden" name="id" value="'.$row["id"].'"><input type="submit" name="delete_btn" value="Delete" class="btn btn-danger"></form></td>
                </tr>
                ';
        } 
    }
    return $output;
}
function fetch_albums(){
    $output = "";
    require('../config/db.php');
    $query = "SELECT * FROM album ORDER BY Id";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
        $output .= '
                <option value='.$row["album_name"].'>'.$row["album_name"].'</option>
            ';
        }
    return $output;
}
if (isset($_POST['delete_btn'])) {
    require '../config/db.php';
    $delete_id = $_POST['id'];
    $sql = "DELETE FROM `image` WHERE id='$delete_id'";
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Images </title>

    <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="shortcut icon" href="logos.png" type="image/png">
   </head>
   <body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">KutubRSP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/home/images.php" class="active nav-link">
      Images
    </a>
        </li>
        <li class="nav-item">
          <a href="/home/albums.php" class="nav-link">
      Albums
    </a>
        </li>
        <li class="nav-item">
          <a href="/chats/" class="nav-link"> Chats </a>
        </li>
        <li class="nav-item">
          <a href="/logout.php" class="nav-link"> Logout </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<div class="container" style="width: 800px;">
    <h3 align="center"> Records you have added </h3>
    <a href="../index.php" class="btn btn-danger"> Go Back </a>
    <a href="new_image.php" class="btn btn-success"> New Image </a><br><br>
    <div>
        <form action="images.php" method="post">
Filter by Album: <select name="album" class="form-control form-control-lg">
                <option value="" selected disabled>---Album---</option>
                <option value="all"> All Albums </option>
                <?php echo fetch_albums(); ?>
            </select><br>
            <input type="submit" value="Filter" name="filter_btn" class="btn btn-primary btn-lg">
    
        </form>
    </div>
    <br><br>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive">
            <tr>
                <th width=""> preview </th>
                <th width=""> Name </th>
                <th width=""> Album </th>
                <th width=""> Delete </th>
            <tr>
            <?php
                echo fetch_datas();
            ?>
        <table>
        <br>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>