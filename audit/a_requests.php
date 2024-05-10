<?php
include '../config.php';

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to the login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: a_log.php");
    exit;
}

// Check if the form is submitted
if(isset($_POST['update_status'])) {
    // Get the status and request ID from the form
    $status = $_POST['status'];
    $request_id = $_POST['request_id'];

    // Update the status in the database
    $update_query = "UPDATE staff_requests SET status = '$status' WHERE id = '$request_id'";
    $update_result = mysqli_query($link, $update_query);

    if($update_result) {
        // Status updated successfully
        echo "Status updated successfully.";
    } else {
        // Error updating status
        echo "Error updating status.";
    }
}

// Fetch data from the database
$query = "SELECT sr.*, sr.request, u.department FROM staff_requests sr INNER JOIN users u ON sr.staff_id = u.staff_id";
$result = mysqli_query($link, $query);

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
        <a href="" class="logo">
            <h2>FundWatch</h2>  <i class="fa-solid fa-comment-plus"></i>
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
        <h1 class="my-5">Hi! <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b> Welcome Back.</h1>
    </section>

    <section>
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th>Id</th>
                                    <th>Staff Id</th>
                                    <th>Department</th>
                                    <th>Amount</th>
                                    <th>Request</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td class="column1"><?php echo htmlspecialchars($row['id']); ?></td>  
                                        <td class="column1"><?php echo htmlspecialchars($row['staff_id']); ?></td>
                                        <td class="column1"><?php echo htmlspecialchars($row['department']); ?></td> 
                                        <td class="column1"><?php echo htmlspecialchars($row['amount']); ?></td>
                                        <td class="column2"><?php echo htmlspecialchars($row['request']); ?></td>
                                        <td class="column3"><?php echo htmlspecialchars($row['date']); ?></td>
                                        <td class="column4"><?php echo htmlspecialchars($row['status']); ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                                                <select name="status">
                                                    <option value="confirmed">Confirmed</option>
                                                    <option value="rejected">Rejected</option>
                                                </select>
                                                <button type="submit" class="" name="update_status">Update Status</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <a href="s_confirmed.php">
        <button class="formbold-btn">Confirmed</button>
    </a> -->

    <a href="a_logout.php">
        <button class="formbold-btn">Logout</button>
    </a>

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
        </div>
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rights Reserved</p>
    </div>

    <script src="../app.js"> </script> 
</body>
</html>
