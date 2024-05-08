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
//  $sql = "SELECT s.id, s.amount, s.request, s.date, s.status 
//          FROM s_requests s
//          JOIN users u ON u.name = u.name
//          WHERE u.name = ?";

// $sql = "SELECT amount, date, request, s.status, u.name, u.staff_id
// FROM s_requests s  WHERE status= 'pending' " ;
//  global $row;
// $query = mysqli_query($link,"SELECT * FROM s_requests WHERE status='Pending'");
//  $stmt = mysqli_prepare($link, $sql);
// $stmt = mysqli_prepare($link, $sql);
// Check if the prepare statement was successful
// if ($stmt) {

//     // Execute the prepared statement
//     mysqli_stmt_execute($stmt);

// //     // Get the result set
//     $result = mysqli_stmt_get_result($stmt);

//     // Initialize an array to store staff requests
//     $requests = [];

//     // Check if the query was successful
//     if ($result) {
//         // Process the result set
//         while ($row = mysqli_fetch_assoc($result)) {
//             // Add each row to the $requests array
//             $requests[] = $row;
//         }
//         // Free the result set
//         mysqli_free_result($result);
//     } else {
//         // Handle the case where the query failed
//         echo "Error: " . mysqli_error($link);
//     }

//     // Close the prepared statement
//     mysqli_stmt_close($stmt);
// } else {
//     // Handle the case where the prepared statement failed
//     echo "Error: " . mysqli_error($link);
// }

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
            <li><a href="audit/a_log.php">Audit</a></li>
        </ul>

        <div class="nav-btn">
                <!-- <a href="login.php" class="" id="log-btn">Login</a>
                <a href="register.php" class="main-btn" id="reg-btn">Register</a> -->
            <a href="" class="main-btn"><i class="fa-solid fa-magnifying-glass"></i>Login</a>
            <a href="" class="main-btn"><i class="fa-solid fa-magnifying-glass"></i>Register</a> 
           
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>
    <section>


        <h2> Kindly View the Following Requests</h2>

    </section>

    <!-- <section>
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                 <th>Id</th> 
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Request</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <!-- <?php //foreach($requests as $staff): ?> -->
                                <tr>
                                    <td class="column1"><?php// echo htmlspecialchars($staff['id']); ?></td>   
                                    <td class="column1"><?php //echo htmlspecialchars($staff['name']); ?></td>   
                                    <td class="column2 "><?php// echo htmlspecialchars($staff['amount']); ?></td>
                                    <td class="column3"><?php //echo htmlspecialchars($staff['request']); ?></td>
                                    <td class="column4"><?php //echo htmlspecialchars($staff['date']); ?></td>
                                    <!-- <td>
                                        <a href="a_update.php?eid={$row['name']}&descr={$row['request']}\"><button class='btn-success btn-sm' >Accept</button></a>
                                        <a href="a_reject.php?eid={$row['name']}&descr={$row['request']}\"><button class='btn-danger btn-sm' >Reject</button></a>
                                    </td> -->
                                </tr>
                            <!-- <?php// endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section> - -->

<section>
    <a href="">
        <button class="formbold-btn">View Staffs</button>
    </a>

    <a href="a_requests.php">
        <button class="formbold-btn">Requests</button>
    </a>

        <a href="a_board.php">
            <button class="formbold-btn">View Board</button>
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
</html> -->