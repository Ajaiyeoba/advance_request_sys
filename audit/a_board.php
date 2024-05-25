<?php
// This page to view staff requests. 
 include '../config.php';

// // Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: a_log.php");
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
        <img src="../logo.png" alt="Logo"  width="80" height="80" />
            <h2>CashAdvance</h2>  <i class="fa-solid fa-comment-plus"></i>
        </a>

        <ul class="navmenu">
            <li><a href="index.html">Home</a></li>            
            <li><a href="a_log.php">Audit</a></li>
        </ul>

        <div class="nav-btn">

           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>
    <section>


        <h2> Kindly View the Following Requests</h2>

    </section>


<section>


    <a href="a_disburse.php">
        <button class="formbold-btn">Requests</button>
    </a>

        <a href="a_feedback.php">
        <button class="formbold-btn">Staff Feedbacks </button>
    </a>
    <a href="a_logout.php">
        <button class="formbold-btn">Logout </button>
    </a>

    </section>
    <section class="contact">
        <div class="contact-info">
            <div class="first-info">            <img src="../logo.png" alt="Logo"  width="80" height="80" />
                <a href="" class="logo">
                               <h2>CashAdvance <i class="fa-light fa-comment-plus"></i></h2>
                </a>
             
                <div class="social-icon">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-tiktok"></i></a>
                    <a href=""></a>
                </div>
            </div>

      
        <
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>
    <script src="../app.js"> </script> 
</body>
</html> 