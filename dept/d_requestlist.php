<?php
// Initialize the session
session_start();

// Include config file
require_once '../config.php';

// Check if the user is logged in, if not then redirect him to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: d_log.php");
    exit;
}

// Retrieve the department information from the session
$department = $_SESSION["department"];

// Prepare and execute the SQL statement to fetch staff requests for the user's department
$sql = "SELECT * FROM staff_requests WHERE department = ?";
if ($stmt = $link->prepare($sql)) {
    $stmt->bind_param("s", $param_department);
    $param_department = $department;

    $stmt->execute();
    $result = $stmt->get_result();
    $requests = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
} else {
    // Handle error
    echo "Oops! Something went wrong. Please try again later.";
}

// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Requests</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a href="" class="logo">  <img src="../logo.png" alt="Logo"  width="80" height="80" />
            <h2>CashAdvance</h2>
        </a>
        <ul class="navmenu">
            <li><a href="../index.html">Home</a></li>
            <li><a href="../staff/s_log.php">Staff</a></li>
        </ul>
        <div class="nav-btn">
            <div class="fa-solid fa-bars" id="menu-icon">
            <h4><?php echo htmlspecialchars($_SESSION["department"]); ?></h2>
            </div>
        </div>
    </header>
    <section>
        <h2>Kindly View the Following Requests</h2>
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
                                    <th>Amount</th>
                                    <th>Request</th>
                                    <th>Date</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($requests as $staff): ?>
                                <tr>
                                    <td class="column1"><?php echo htmlspecialchars($staff['staff_id']); ?></td>
                                    <td class="column1"><?php echo htmlspecialchars($staff['amount']); ?></td>
                                    <td class="column2"><?php echo htmlspecialchars($staff['request']); ?></td>
                                    <td class="column3"><?php echo htmlspecialchars($staff['date']); ?></td>
                                    <td class="column3"><?php echo htmlspecialchars($staff['department']); ?></td>
                                    <td class="column3"><?php echo htmlspecialchars($staff['status']); ?></td>
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
        <a href="d_board.php">
            <button class="formbold-btn"> Dashboard</button>
        </a>
    </section>
    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                <img src="../logo.png" alt="Logo"  width="80" height="80" />
                    <h2>CashAdvance</h2>
                </a>
                <div class="social-icon">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-tiktok"></i></a>
                    <a href=""></a>
                </div>
            </div>
        
            </div>
        </div>
    </section>
    <div class="end-text">
        <p>Copyright @2024. All Rights Reserved</p>
    </div>
    <script src="../app.js"></script>
</body>
</html>
