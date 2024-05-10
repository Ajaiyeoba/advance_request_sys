<?php

// this page is to display the staff confirmed requests 

include '../config.php';

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: s_log.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <a href="" class="logo">
            <h2>FundWatch</h2>  <i class="fa-solid fa-comment-plus"></i>
        </a>

        <ul class="navmenu">
            <li><a href="index.html">Home</a></li>            
            <li><a href="s_log.php">Staff</a></li>        

        </ul>

        <div class="nav-btn">
            <!-- <a href="" class="main-btn"><i class="fa-solid fa-magnifying-glass"></i>Login</a>
            <a href="" class="main-btn"><i class="fa-solid fa-magnifying-glass"></i>Register</a> -->

           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>
    <section>
    <h1 class="my-5">Hi! <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b> Welcome Back.  </h1>

    </section>

    <section>
    <a href="s_request.php" >
            <button class="formbold-btn">New Requests </button>
        </a>

        <a href="s_logout.php" >
            <button class="formbold-btn">Logout</button>
        </a>
    </section>



    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                <h2>FundWatch <i class="fa-light fa-comment-plus"></i></h2>
                </a>
                <p>Oyo State Nigeria</p>
                <p>08052148610</p>
                <p>ajaiyeobajibola@gmail.com</p>
                <div class="social-icon">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-tiktok"></i></a>
                    <a href=""></a>
                </div>
            </div>

            <div class="second-info">
                <h4>Support</h4>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
            </div>

            <div class="third-info">
                <h4>Cart</h4>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
            </div>
        </div>
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>
    <script src="../app.js"> </script> 
</body>
</html>