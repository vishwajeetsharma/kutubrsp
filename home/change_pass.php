<?php
require '../config/db.php';
require_once '../controllers/homeAuth.php';
if (!isset($_SESSION['name'])) {
    header('location:login.php');
}
$_SESSION['time'] = time() + 300;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Login</title>
    <style>
        .form-div{
            margin: 50px auto 50px;
            padding: 25px 15px 10px 15px;
            border: 1px solid #80ced7;
            border-radius: 5px;
            font-size: 1.1em;
        }
        .form-control:focus{
            box-shadow: none;
        }
        form p{
            font-size: 0.89em;
        }
        .form-div.login{
            margin-top: 100px;
        }
        .logout{
            color: red;
        }
    </style>
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
  
  <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">


                <form action="change_pass.php" method="post">
                    <h3 class="text-center">Login</h3>

                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <?php if(count($msgs) > 0): ?>
                    <div class="alert alert-success">
                        <?php foreach($msgs as $msg): ?>
                            <li><?php echo $msg; ?></li>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="old_pass">Old Password: </label>
                        <input type="password" name="old_pass" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password: </label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div><br>
                    <div class="form-group d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block btn-lg" name="change_btn">Change</button>
                    </div>
                

                </form>


            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>