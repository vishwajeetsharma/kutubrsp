<?php

require '../config/db.php';
require '../controllers/auto_logout.php';
include 'image_logic.php';
if(!isset($_SESSION['name'])){
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> KutubRSP GALLERY </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />

</head>
<body>



<div class="container">
 <div class="py-5">
  <h1 class="text-center display-3"><b><?php echo $_REQUEST['album']; ?></b> </h1>
  <hr class="text-center w-25 border-dark">
</div>
<div class="row no-gutters gallerys">
    <?php echo fetch_images(); ?>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

  <script>
   $(document).ready(function(){
    $('.gallerys').magnificPopup({
     type: 'image',
     delegate: 'a',
     gallery: {
      enabled : true
     }
    });
   });
  </script>

</body>
</html>