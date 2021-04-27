<?php
session_start();
require '../config/db.php';
require '../controllers/auto_logout.php';
if(!isset($_SESSION['name'])){
    header('location:../login.php');
}
require '../config/db.php';
function fetch_data(){
    $output = "";
    require '../config/db.php';
    $query = "SELECT * FROM album ORDER BY Id desc";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    $num = mysqli_num_rows($result);
    $_SESSION['num'] = $num;
        while($row = mysqli_fetch_array($result)){
        $output .= '
            <tr>
                <td><a href="image.php?album='.$row["album_name"].'">'.$row["album_name"].'</a></td>
                <td><form method="post" action="albums.php"><input type="hidden" name="id" value="'.$row["id"].'"><input type="submit" name="delete_btn" value="Delete" class="btn btn-danger"></form></td>
            </tr>
            ';
        }
        
    
    return $output;
}
if (isset($_POST['delete_btn'])) {
    $delete_id = $_POST['id'];
    $query = "SELECT * FROM album WHERE id = '$delete_id' ORDER BY Id";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
      if($num == 1){
        while ($row = mysqli_fetch_assoc($result)) {
                $album_name = $row['album_name'];
            }
      }
    $sqls = "DELETE FROM `image` WHERE album = '$album_name'";
    $results  = mysqli_query($conn, $sqls);
    $sql = "DELETE FROM album WHERE id='$delete_id'";
    $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
          <a href="/home/images.php" class="nav-link">
      Images
    </a>
        </li>
        <li class="nav-item">
          <a href="/home/albums.php" class="active nav-link">
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
<div class="container" style="width: 450px;">
    <h3 align="center"> Records you have added </h3>
    <a href="/" class="btn btn-danger"> Go Back </a>
    <a href="new_album.php" class="btn btn-success"> New Album </a><br><br>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive">
            <tr>
                <th width="35%"> Album </th>
                <th width="35%"> Delete </th>
            <tr>
            <?php
                echo fetch_data();
            ?>
        <table>
        <br>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>