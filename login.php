<?php
require_once 'controllers/authController.php';
if(isset($_SESSION['name'])){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");

        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        }

        body {
        overflow: scroll;
        min_width: 450px;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: purple url("home/images/login_back.jpg") center/cover;
        background-repeat: no-repeat;
        overflow: hidden;
        }

        .card {
            overflow: hidden;
            max-width: 400px;
        background: linear-gradient(
            to bottom right,
            rgba(255, 255, 255, 0.2),
            rgba(255, 255, 255, 0.05)
        );
        margin-bottom: 5%;
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.5), -1px -1px 2px #aaa,
            1px 1px 2px #555;
        backdrop-filter: blur(0.8rem);
        padding: 1.5rem;
        border-radius: 1rem;
        animation: 1s cubic-bezier(0.16, 1, 0.3, 1) cardEnter;
        }

        .card__row {
        display: flex;
        justify-content: space-between;
        padding-bottom: 2rem;
        }

        .card__title {
        font-weight: 450;
        font-size: 2rem;
        color: #1d005f;
        margin: 1rem 0 1.5rem;
        text-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
        }

        .card__col {
        padding-right: 2rem;
        }

        .card__input {
        background: none;
        border: none;
        border-bottom: dashed 0.2rem rgba(255, 255, 255, 0.15);
        font-size: 1.2rem;
        color: #fff;
        text-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
        }
        .card__input--large {
        font-size: 1.7rem;
        }

        .card__input::placeholder {
        color: rgba(255, 255, 255, 0.5);
        text-shadow: none;
        }

        .card__input:focus {
        outline: none;
        border-color: rgba(255, 255, 255, 0.6);
        }

        .card__label {
        display: block;
        color: #fff;
        text-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
        font-weight: 400;
        }
        .btn{
            cursor: pointer;
            padding: 5px 20px;
            border-radius: 50px;
            color: #fff;
            font-size:  1.37rem;
            background: #696969;
            shadow: none;
            float: left;
            border-top: 2px solid red;
            border-left: 2px solid red;
            border-bottom: 2px solid blue;
            border-right: 2px solid blue;
        }
        .alert li{
            color: #fff;
            padding: 2px 15px;
        }
        .alert{
            border-radius: 25px;
            margin-bottom: 10px;
        }
        .alert-danger{
            background: #d9534f;
        }
        @keyframes cardEnter {
        from {
            transform: translateY(100vh);
            opacity: 0.1;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
        }
    </style>
</head>
<body>
    
    <div class="card">
        <form action="login.php" method="post">
          <h1 class="card__title" align="center">Login Securely</h1>
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
          <div class="card__row">
            <div class="card__col">
                <label for="username" class="card__label">Username: </label>
                <input type="text" name="username" placeholder="Enter your Username" class="card__input">
            </div>
          </div>
            <div class="card__col">
                <label for="password" class="card__label">Password: </label>
                <input type="password" placeholder="Enter your Password" name="password" class="card__input">
            </div><br>

            <div class="card__col">
                <input type="submit" class="btn" name="login_btn" value="Login">
            </div>

          </div>
        </form>
      </div>
</body>
</html>