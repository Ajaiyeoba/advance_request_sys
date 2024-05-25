<?php

include '../config.php';

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to the login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: a_log.php");
    exit;
}

// Fetch data from the database
$query = "SELECT sr.staff_id, sr.amount, sr.request, sr.bank, sr.number, sr.status, u.department, sr.name  
          FROM staff_requests sr 
          INNER JOIN users u ON sr.staff_id = u.staff_id
          WHERE sr.status = 'Approved'";
$result = mysqli_query($link, $query);

// Check for query error
if (!$result) {
    die("Query Failed: " . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
    <img src="../logo.png" alt="Logo"  width="80" height="80" />
        <a href="" class="logo">
            <h2>CashAdvance</h2>
        </a>
        <ul class="navmenu">
            <li><a href="../index.html">Home</a></li>            
            <li><a href="a_log.php">Audit</a></li>
        </ul>
        <div class="nav-btn">
        <a href="a_feedback.php">
        <button class="formbold-btn">Staff Feedbacks </button>
    </a>

            <div class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

    <section>
        <h1 class="my-5">Hi! <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b> Welcome Back.</h1>
        <h2>Kindly Disburse the Following Confirmed Requests</h2>
    </section>

    <section>
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                             
                                    <th>Staff Id</th>
                                    <th>Department</th>
                                    <th>Amount</th>
                                    <th>Request</th>
                                    <th>Bank</th>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td class="column1"><?php echo htmlspecialchars($row['staff_id']); ?></td>
                                        <td class="column2"><?php echo htmlspecialchars($row['department']); ?></td> 
                                        <td class="column3"><?php echo htmlspecialchars($row['amount']); ?></td>
                                        <td class="column4"><?php echo htmlspecialchars($row['request']); ?></td>
                                        <td class="column5"><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td class="column6"><?php echo htmlspecialchars($row['bank']); ?></td>
                                        <td class="column7"><?php echo htmlspecialchars($row['number']); ?></td>
                                        <td class="column8"><?php echo htmlspecialchars($row['status']); ?></td>

                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <a href="a_logout.php">
        <button class="formbold-btn">Logout</button>
    </a>

    <section class="contact">
        <div class="contact-info">
            <div class="first-info">             <img src="../logo.png" alt="Logo"  width="80" height="80" />
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

            <div class="second-info">
                <h4>Support</h4>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
            </div>
        </div>
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rights Reserved</p>
    </div>

    <script src="../app.js"> </script> 
</body>
</html>
