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
            <h2>FundWatch <i class="fa-light fa-comment-plus"></i></h2>
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
                <option value="Computer Science">Computer Scence</option>
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
                    <h2>FundWatch</h2>
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
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>
    <script src="../app.js"></script>
</body>
</html>
