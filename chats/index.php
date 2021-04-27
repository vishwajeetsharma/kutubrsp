<?php
require_once '../controllers/chatController.php';
require '../controllers/auto_logout.php';
if(!isset($_SESSION['name'])){
    header('location:../login.php');
}
$name = $_SESSION['name'];
$time = date('d-m-y H:i');
$con = "UPDATE `last_seen` SET time = '$time' WHERE name = '$name'";
mysqli_query($conn, $con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../home/css/styles.css">
    <title>Chat</title>
</head>
<body>


    <div class="wrapper">
        <section class="chat-area">
            <header>
                <a href="/" class="back-icon"><</a>
                <img src="../home/images/img.jpg" alt="">
                <div class="details">
                    <span><?php echo $_SESSION['status_name']; ?></span>
                    <p><?php echo $_SESSION['status']; ?></p>
                </div>
            </header>
            <div class="chat-box">
                <div class="msgs">
                    <?php echo fetch_msg(); ?>
                </div>
            </div>
        </section>
        <form action="index.php" method="post" class="typing-area">
            <input type="text" name="msg" placeholder="type a message here...">
            <button type="submit" name="msg_btn">Send</button>
        </form>
    </div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>