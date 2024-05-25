<!--  views staffs requests and their lists -->

<?php
     // Start the session
session_start();

// Check if the admin is logged in, if not then redirect them to the login page
if(!isset($_SESSION["pro-loggedin"]) || $_SESSION["pro-loggedin"] !== true){
    header("location: p_log.php");
    exit;
};

// Include config file
require_once "../config.php";
// Define an array to store Staffs and their bios
$users = [];

// Retrieve users and their bios from the database
$sql = "SELECT  id, staff_id, name, email, department FROM  users";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        // Fetch associative array
        while($row = mysqli_fetch_assoc($result)){
            // Add each user and their bio to the $users array
            $users[] = $row;
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No users found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provost Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>                   <img src="../logo.png" alt="Logo"  width="80" height="80" />
        <a href="" class="logo">
            <h2>CashAdvance</h2>  <i class="fa-solid fa-comment-plus"></i>
        </a>

        <ul class="navmenu">
            <li><a href="../index.html">Home</a></li>            
            <li><a href="p_log.php">Provost</a></li>
          

        </ul>

        <div class="nav-btn">



           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>
    <section>

        <h2>Welcome to Your Dashboard</h2>

        <a href="p_staff.php">
            <button class="formbold-btn">View Staffs</button>
        </a>
        <a href="p_requests.php">
            <button class="formbold-btn"> Staff Request</button>
        </a>
        <a href="p_confirm.php">
            <button class="formbold-btn"> Confirmed Request</button>
        </a>

<a href="p_logout.php">
    <button class="formbold-btn"> Logout</button>
</a>
    </section>



    <section class="contact">
        <div class="contact-info">
            <div class="first-info">                    <img src="../logo.png" alt="Logo"  width="80" height="80" />
                <a href="" class="logo">
                               <h2>CashAdvance </h2>
                </a>
                <p>Oyo State Nigeria</p>
                <p>09038503511</p>
                <p>college@fcahptib.edu.ng</p>
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
            <div class="fourth-info">
                <h4 href="register.php"> <a href="register.php">Company</a> </h4>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
            </div>

            <div class="five-info">
                <h4>Support</h4>
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