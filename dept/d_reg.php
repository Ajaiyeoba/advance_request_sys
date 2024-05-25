
<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
  $department =$hod_name = $password = $confirm_password = "";
  $department_err = $hod_name_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  

    if(empty(trim($_POST["hod_name"]))){
        $hod_name_err = "Please enter a hod_name.";
    } elseif(!preg_match('/^[a-zA-Z\s]+$/', trim($_POST["hod_name"]))){
        $hod_name_err = "hod_name can only contain letters and spaces.";
    } else{
        $hod_name = trim($_POST["hod_name"]);
    }
    
   // Check if the 'department' key exists in the $_POST array
if(isset($_POST['department'])) {
    // Sanitize the input to remove any potentially harmful characters
    $department = htmlspecialchars($_POST['department']);
    
    // Validate the input further, based on your application's requirements
    if(empty($department)) {
        // The department field is empty, handle the error (e.g., display a message to the user)
    } else {
        // The department field contains a value, you can proceed with further processing
    }
} else {
    // The department field was not submitted in the form, handle this scenario accordingly
}
    // Validate password
if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";     
} elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have at least 6 characters.";
} else {
    $password = trim($_POST["password"]);
}

// Validate confirm password
if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";     
} else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
        $confirm_password_err = "Password did not match.";
    }
}
    // Check input errors before inserting in database
    if( 
        empty($hod_name_err) && 
        empty($department_err) &&
        empty($password_err) &&
        empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO dept (hod_name, department,  password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss",  $param_hod_name, $param_department, $param_password);

            // Set parameters
           
            $param_hod_name = $hod_name;
            $param_department = $department;
            $param_password = $password; // Assign the password directly without hashing
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: d_log.php");
                exit();
            } else{
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
    <title>Department Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            <li><a href="d_log.php">Department</a></li>            
        </ul>

        <div class="nav-btn">
       
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

    <section>
        <div class="formbold-main-wrappper">
            <div class="formbold-form-wrapper">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="formbold-form-title">
              <h2 class="">Department Register</h2>
    </div>

    <div class="formbold-input-flex">
          
            <div>
                <label for="username" class="formbold-form-label">
                  HOD Name
                </label>
                <input
                    type="text"
                    name="hod_name"
                    id="name"
                    class="formbold-form-input  <?php echo (!empty($hod_name_err)) ? 'is-invalid' : ''; ?>"
                />
              </div>


    
    <div class="formbold-mb-3">
                <label for="department" class="formbold-form-label">Department</label>
                <select id="department" name="department" class="formbold-form-input <?php echo (!empty($department_err)) ? 'is-invalid' : ''; ?>">
                    <option value="">Select Department</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Animal Health">Animal Health</option>
                    <option value="SLT">SLT</option>
                    <option value="Fishries">Fishries</option>
                    <option value="VLT">VLT</option>
                </select>
                <span class="invalid-feedback"><?php echo $department_err; ?></span>
            </div>
    </div>
    
    <div class="formbold-input-flex">
            <div>
                <label for="password" class="formbold-form-label">
                  Password
                </label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="formbold-form-input  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>"
                />
              </div>
    
              <div class="">
                <label for="password" class="formbold-form-label">
                  Confirm Password
                </label>
                <input
                    type="password"
                    name="confirm_password"
                    id="password"
                    class="formbold-form-input   <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>"
                />
              </div>
    </div>

    <input type="submit" name="submit" class="formbold-btn" value="Register">

    <p>Already Have an Account! <a href="d_log.php">Login</a></p>     
</form>
            </div>
        </div>
    </section>
         
    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                <h2>CashAdvance <i class="fa-light fa-comment-plus"></i></h2>
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

    <script src="../app.js"></script>
</body>
</html>
