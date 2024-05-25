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
$sql = " SELECT  id, amount, request, date,  status from staff_requests where status = 'confirmed' ";
$stmt = mysqli_prepare($link, $sql);
// Check if the prepare statement was successful
if ($stmt) {
    // Bind parameters to the prepared statement
    // mysqli_stmt_bind_param($stmt, "i", $_SESSION["id"]);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    // Initialize an array to store staff requests
    $staffs = [];

    // Check if the query was successful
    if ($result) {
        // Process the result set
        while ($row = mysqli_fetch_assoc($result)) {
            // Add each row to the $staffs array
            $staffs[] = $row;
        }
        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle the case where the query failed
        echo "Error: " . mysqli_error($link);
    }
      // Close the prepared statement
      mysqli_stmt_close($stmt);
    } else {
        // Handle the case where the prepared statement failed
        echo "Error: " . mysqli_error($link);
    }
    mysqli_close($link);
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
            <h2>CashAdvance</h2> 
        </a>

        <ul class="navmenu">
            <li><a href="index.html">Home</a></li>            
            <li><a href="s_log.php">Staff</a></li>        

        </ul>

        <div class="nav-btn">
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>
    <section>
    <h1 class="my-5">Hi! <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b> Welcome Back.  </h1>

    </section>
    <section>
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <!-- <th>Id</th> -->
                                    <th>Amount</th>
                                    <th>Request</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($staffs as $staff): ?>
                                <tr>
                                    <!-- <td class="column1"><?php echo htmlspecialchars($staff['id']); ?></td>    -->
                                    <td class="column1"><?php echo htmlspecialchars($staff['amount']); ?></td>
                                    <td class="column2"><?php echo htmlspecialchars($staff['request']); ?></td>
                                    <td class="column3"><?php echo htmlspecialchars($staff['date']); ?></td>
                                    <td class="column4"><?php echo htmlspecialchars($staff['status']); ?></td>
                                    <td class="column5">

                                        <a href="s_feedback.php">
                                            <button >Feedback</button>
                                        </a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
                <h2>CashAdvance <i class="fa-light fa-comment-plus"></i></h2>
                </a>
                <p>Oyo State Nigeria</p>
                <p>09038503511</p>
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