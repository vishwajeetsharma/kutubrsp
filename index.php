<?php
require 'config/db.php';
require 'controllers/auto_logout.php';
require_once 'controllers/authController.php';
if(!isset($_SESSION['name'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home - KutubRSP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- my CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Animation Link -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
body{
	min-height: 100vh;
	line-height: 1.5;
	font-family: 'Poppins', sans-serif;
}
*{
	margin:0;
	padding:0;
	box-sizing: border-box;
}
.container{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color: #24262b;
    padding: 70px 0;
    position: sticky;
    top: 100%;
    margin-top: 170px;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}
.title{
    text-align: center;
    width: 100%;
    height: 70px;
    left: 0px;
    top: 0px;
}
.bg-pink{
    background: #F4CCCC;
}
.title h1{
    line-height: 70px;
    letter-spacing: 0.45rem;
}
/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}
/* start section home-body  */
.bg-img{
    background-image: linear-gradient(rgba(0, 0, 0, 0.281), rgba(0, 0, 0, 0.5)),
    url(home/images/12bg.jpeg);
    height: 82.75vh;
    background-size: cover;
    background-position: center;
    color: #fff;
    background-repeat: none;
}
.welcome{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.burger{
     position: absolute;
     cursor: pointer;
     right: 5%;
     top: 22px;
     display: none;
}
.line{
    width: 23px;
    background-color: #00ffff;
    height: 4px;
    margin: 3px 3px;
}
/* end section home-body */
.nav-head{
    background: #BAF1F9;
    height: 45px;
    width: 100%;
}
.nav-head ul{
    list-style-type: none;
    position: absolute;
    left: 50%;
    transform: translate(-50%);
    width: 100%;
    transition: 0.6s ease;
}
.active{
    font-weight: bold;
    color: red;
}
.nav-head ul .lists{
    text-align: center;
}
.nav-head ul .lists li{
    display: inline-block;
    margin-right: 25px;
    margin-left: 25px;
}
.nav-head ul li a{
    padding: 5px 10px;
    line-height: 45px;
    text-align: center;
    text-decoration: none;
    color: black;
    text-align: center;
    transition: 0.6s ease;
}
.nav-head ul li a:hover{
    color: red;
}
/* start section albums */
#albums{
    width: 100%;
    padding-bottom: 465px;
}
.albums{
    text-align:center;
    margin-bottom: 25px;
}
.albums a{
    text-decoration:none;
    color: #000;
}
.albume{
    margin-top: 5px;
    max-width: 100%;
    padding-bottom: 80px;
    height: 500px;
    overflow-y: scroll;
    overflow-x: hidden;
}

.albume::-webkit-scrollbar {
  width: 3px;               /* width of the entire scrollbar */
}
.albume::-webkit-scrollbar-track {
  background: #fff;        /* color of the tracking area */
}
.albume::-webkit-scrollbar-thumb {
  background-color: #fff;    /* color of the scroll thumb */
  border-radius: 20px;       /* roundness of the scroll thumb */
  border: 3px solid #fff;  /* creates padding around scroll thumb */
}
body::-webkit-scrollbar-thumb {
  border-radius: 20px;
}
/* end section */

/* start section footer */
.nav-bottom{
    background: #BAF1F9;
    height: auto;
    width: 100%;
    position: sticky;
    top: 100%;
}
.nav-bottom ul{
    list-style-type: none;
    width: 100%;
    transition: 0.6s ease;
}
.nav-bottom ul .lists-bottom{
    text-align: center;
}
.nav-bottom ul .lists-bottom li{
    display: inline-block;
    margin-right: 25px;
    margin-left: 25px;
}
.nav-bottom ul li a{
    padding: 5px 10px;
    line-height: 45px;
    text-align: center;
    text-decoration: none;
    color: black;
    text-align: center;
    transition: 0.6s ease;
}
.nav-bottom ul li a:hover{
    color: red;
}


/* fired media query */
@media only screen and (max-width: 765px){
    .nav{
        transition: 0.6s ease;
    }
    .nav-head{
        transition: 0.6s ease;
        height: 265px;
    }
    .nav-head ul .lists li{
        flex-direction: column;
        display: block;
    }
    .titile{
        position: relative;
        width: 100%;
    }
    .burger{
        display: block;
    }
    .welcome{
        transition: 0.6s ease;
        width: 100%;
    }
    .hide{
        height: 0;
        display: none;
    }
    .mt_4{
        margin-top: 75px;
    }
}

    </style>
</head>
<body>


    <section id="header">
        <div class="title bg-pink">
            <h1> KutubRSP </h1>
        </div>
        <div class="nav nav-head hide">
            <ul>
                <div class="lists hide">
                    <li><b>Links:</b></li>
                    <li><a class="active" href="#">Home</a></li>
                    <li><a href="home/images.php">Images</a></li>
                    <li><a href="#albums">Albums</a></li>
                    <li><a href="/chats/">Chats</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </div>
            </ul>
        </div>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>



    <section id="home-body">
        <div class="bg-img" align="center">
        <div data-aos="fade-down">
            <h1 class="welcome">
                Welcome to KutubRSP<br>
                Image Gallery
            </h1>
        </div>
        </div>
    </section>

    <section id="albums">
        <div class="title" align="center">
            <div align="center" class="heading mx-2 py-5">
                <h1>Albums</h1>
                <hr class="text-center w-25 border-dark">
            </div>
            <div class="row no-gutters albume">
                <?php echo fetch_album(); ?>
            </div>
        </div>
    </section>




  <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>Links:</h4>
  	 			<ul>
  	 				<li><a href="home/images.php">images</a></li>
  	 				<li><a href="home/new_image.php">new image</a></li>
  	 				<li><a href="home/albums.php">Albums</a></li>
  	 				<li><a href="home/new_album.php">new album</a></li>
  	 				<li><a href="/chats/">chats</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>profile</h4>
  	 			<ul>
  	 				<li><a href="logout.php">logout</a></li>
  	 				<li><a href="home/change_pass.php">cahnge password</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>last seen</h4>
  	 			<ul style="color: #bbbbbb;">
                   <?php echo last_seen(); ?>
  	 			</ul>
  	 		</div>
  	 	</div>
        <div class="copyright" align="center" style="margin-top:25px; color: white;">
            All rights reserved © Developed and managed by <a href="https://instagram.com/vishwajeet4398" target="_blank">Vishwajeet Sharma</a> 
        </div>
  	 </div>
  </footer>
    <!-- responsive js -->
    <script>
        burger = document.querySelector('.burger');
        lists = document.querySelector('.lists');
        nav =  document.querySelector('.nav');
        welcome =  document.querySelector('.welcome');
        
        burger.addEventListener('click', () => {
            nav.classList.toggle('hide');
            lists.classList.toggle('hide');
            welcome.classList.toggle('mt_4');
        })
        </script>
<!-- Animation js -->
<!-- our aos data -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        offset: 100,
        duration: 500,
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>