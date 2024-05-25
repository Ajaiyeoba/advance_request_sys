# advance_request_sys
zech 3:8


<!-- <!-- <?php
// include '../config.php';

// // Initialize the session
// session_start();

// // Check if the user is logged in, if not then redirect him to the login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: s_log.php");
//     exit;
// }
// $sql = "SELECT s.id, s.amount, s.request, s.date, s.status 
//         FROM staff_requests s
//         JOIN users u ON u.staff_id = u.staff_id
//         -- JOIN users st ON u.staff_id = st.id
//         WHERE u.id = ?";
// $stmt = mysqli_prepare($link, $sql);

// // Check if the prepare statement was successful
// if ($stmt) {
//     // Bind parameters to the prepared statement
//     mysqli_stmt_bind_param($stmt, "i", $_SESSION["id"]);

//     // Execute the prepared statement
//     mysqli_stmt_execute($stmt);

//     // Get the result set
//     $result = mysqli_stmt_get_result($stmt);

//     // Initialize an array to store staff requests
//     $staffs = [];

//     // Check if the query was successful
//     if ($result) {
//         // Process the result set
//         while ($row = mysqli_fetch_assoc($result)) {
//             // Add each row to the $staffs array
//             $staffs[] = $row;
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
// mysqli_close($link);
?> -->

<!-- <!DOCTYPE html>
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
        <img src="../logo.png" alt="Logo"  width="80" height="80" />
            <h2>CashAdvance</h2>
        </a>
        <ul class="navmenu">
            <li><a href="index.html">Home</a></li>            
            <li><a href="staff/staff_login.php">Staff</a></li>            
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
                                    <th>Amount</th>
                                    <th>Request</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php //foreach($staffs as $staff): ?>
                                <tr>
                                    <td class="column1"><?php //echo htmlspecialchars($staff['id']); ?></td>   
                                    <td class="column1"><?php //echo htmlspecialchars($staff['amount']); ?></td>
                                    <td class="column2"><?php //echo htmlspecialchars($staff['request']); ?></td>
                                    <td class="column3"><?php //echo htmlspecialchars($staff['date']); ?></td>
                                    <td class="column4"><?php  //echo htmlspecialchars($staff['status']); ?></td>
                                </tr>
                            <?php // endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="s_confirmed.php">
        <button class="formbold-btn">Confirmed</button>
    </a>

    <a href="s_logout.php">
        <button class="formbold-btn">Logout</button>
    </a>

    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                    <h2>CashAdvance        <img src="../logo.png" alt="Logo"  width="80" height="80" /></h2>
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
        </div>
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rights Reserved</p>
    </div>

    <script src="../app.js"> </script> 
</body>
</html> -->


<?php
// Initialize the session
session_start();

// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$department = $password = "";
$department_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["department"]))){
        $department_err = "Please select Department";
    } else{
        $department = trim($_POST["department"]);
    }

    // Check if password is empty   
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
// Validate credentials
if(empty($department_err) && empty($password_err)){
    // Prepare a select statement
    $sql = "SELECT id, department, hod_name, password FROM dept WHERE department = ? AND password = ?";
    
    if($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $param_department, $param_password  );
        
        // Set parameters
        $param_department = $department;
        $param_password = $password;
    
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Store result
            mysqli_stmt_store_result($stmt);
        
            if(mysqli_stmt_num_rows($stmt) == 1){                    
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $id, $department, $hod_name, $stored_password);
                
                if(mysqli_stmt_num_rows($stmt) == 1) {                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $department, $hod_name, $stored_password);
                // Fetch the result
                if(mysqli_stmt_fetch($stmt)) {
                    // Verify the password
                    if($password === $stored_password) {
                        // Password is correct, start a new session
                        session_start();
                        
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["hod_name"] = $hod_name; // Store username in session
                        
                        // Redirect user to dashboard
                        header("location: d_board.php");
                        exit;
                    } else {
                        // Password is incorrect
                        $login_err = "Invalid password.";
                    }
                }
            } else {
                // Department or password is incorrect
                $login_err = "Invalid department or password.";
            }
        } else {
            // Error executing the statement
            echo "Oops! Something went wrong. Please try again later.";
        }

        
    } else {
        // Error preparing the statement
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}
}
// Close connection
mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Dept Login</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
    <style>
/* New Form Styles */
.formbold-main-wrapper{
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 48px;
}
.formbold-form-wrapper {
          margin: 0 auto;
          max-width: 570px;
          width: 100%;
          background: white;
          padding: 40px;
        }
        .formbold-form-title {
          margin-bottom: 30px;
        }
        .formbold-form-title h2 {
          font-weight: 600;
          font-size: 28px;
          line-height: 34px;
          color: #07074d;
        }
        .formbold-input-flex {
          display: flex;
          gap: 20px;
          margin-bottom: 15px;
        }
        .formbold-input-flex > div {
          width: 50%;
        }
        .formbold-form-input {
          text-align: center;
          width: 100%;
          padding: 13px 22px;
          border-radius: 5px;
          border: 1px solid #dde3ec;
          background: #ffffff;
          font-weight: 500;
          font-size: 16px;
          color: #536387;
          outline: none;
          resize: none;
        }
        .formbold-form-input:focus {
          border-color: #6a64f1;
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }
        .formbold-form-label {
          color: #536387;
          font-size: 14px;
          line-height: 24px;
          display: block;
          margin-bottom: 10px;
        }
        .formbold-btn {
          font-size: 16px;
          border-radius: 5px;
          padding: 14px 25px;
          border: none;
          font-weight: 500;
          background-color: #6a64f1;
          color: white;
          cursor: pointer;
          margin-top: 25px;
        }
        .formbold-btn:hover {
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }
        .formbold-mb-3 {
          margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <header>
        <a href="" class="logo">
            <h2>CashAdvance <i class="fa-light fa-comment-plus"></i></h2>
        </a>

        <ul class="navmenu">
            <li><a href="../index.html">Home</a></li>            
            <!-- <li><a href="">Dept</a></li> -->
            <li><a href="staff/s_log.php">Staff</a></li>            
            <!-- <li><a href="">Bursary</a></li> -->
        </ul>
        <div class="nav-btn">
        <!-- <a href="login.php" class="" id="log-btn">Login</a>
                <a href="register.php" class="main-btn" id="reg-btn">Register</a> -->
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>


    <!-- <section class=""> -->
        <!-- <div class="container"> -->

        <!-- <div class="header">
        <h2>Staff Login </h2>
        </div>
        <p>Please fill in your credentials to login.</p> -->


    

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

    
    <section>
        <div class="formbold-main-wrappper">
            <div class="formbold-form-wrapper">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="formbold-form-title">
              <h2 class="">Dept Login</h2>
    </div>

    <div class="formbold-mb-3">
            <!-- <label for="department" class="formbold-form-label">Department</label>
            <select id="department" name="department">
                <option value="Computer Science">Computer Science</option>
                <option value="Animal Health">Animal Health</option>
                <option value="SLT">SLT</option>
                <option value="Fishries">Fishries</option>
                <option value="VLT">VLT</option>
            </select>
            <span class="invalid-feedback" style="display: ;"><?php // echo $department_err; ?></span>
        </div> -->

         <div>
                <label for="department" class="formbold-form-label">
                  department
                </label>
                <input
                    type="text"
                    name="department"
                    id="department"
                    class="formbold-form-input  <?php echo $department_err ; ?>"
                />
              </div>
    </div>
    <div class="formbold-mb-3">
            <div>
                <label for="password" class="formbold-form-label">
                  Password
                </label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="formbold-form-input  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                />
              </div>
    </div>

    <input type="submit" name="submit" class="formbold-btn" value="Login">
    <p>Don't have an account? <a href="d_reg.php">Sign up now</a>.</p>     
</form>
            </div>
        </div>
    </section>

    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                    <h2>CashAdvance</h2>
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

           
        </div>
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>
    <script src="../app.js"></script>
</body>
</html>



<?php

// This page to view staff requests.

include '../config.php';

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: d_log.php");
    exit;
}

// Assuming you have a database connection already established in config.php

// Retrieve the department information of the logged-in user from the database
$user_id = $_SESSION["id"];
$sql = "SELECT department FROM users WHERE id = ?";
$stmt = $link->prepare($sql);
$stmt->execute([$user_id]);
$result = $stmt->fetch();

if (!$result) {
    // Handle the case where user's department is not found
    // For example, redirect the user to a page with an error message
    header("location: error.php");
    exit;
}

$department = $result['department'];

// Prepare and execute the SQL statement to fetch staff requests for the user's department
$sql = "SELECT * FROM staff_requests WHERE department = ?";
$stmt = $link->prepare($sql);
$stmt->execute([$department]);
$requests = $stmt->fetchAll();

?>
?>

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
            <li><a href="dept/dept_reg.php">Dept</a></li>
        </ul>

        <div class="nav-btn">

           <div  class="fa-solid fa-bars" id="menu-icon">   </div>
        </div>
    </header>
    <section>
        <h2> Kindly View the Following Requests</h2>

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
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Request</th>
                                    <th>Date</th>
                                    <th>Department</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($requests as $staff): ?>
                                <tr>
                                    <!-- <td class="column1"><?php echo htmlspecialchars($staff['id']); ?></td>    -->
                                    <td class="column1"><?php echo htmlspecialchars($staff['name']); ?></td>   
                                    <td class="column1"><?php echo htmlspecialchars($staff['amount']); ?></td>
                                    <td class="column2"><?php echo htmlspecialchars($staff['request']); ?></td>
                                    <td class="column3"><?php echo htmlspecialchars($staff['date']); ?></td>
                                    <td class="column3"><?php echo htmlspecialchars($staff['department']); ?></td>
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
            <button class="formbold-btn">View Board</button>
        </a>
    </section>
    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                               <h2>CashAdvance </h2>
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