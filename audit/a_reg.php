
<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$name  =$email = $password = $confirm_password = "";
$name_err = $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate staff ID
   

    // Validate username
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } elseif(!preg_match('/^[a-zA-Z\s]+$/', trim($_POST["name"]))){
        $name_err = "Name can only contain letters and spaces.";
    } else{
        $name = trim($_POST["name"]);
    }
    

    // Validate email address
    if(empty($_POST["email"])){
        $email_err = "Please enter your email address.";     
    } else {
        $email = ($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_err = "Please enter a valid email address.";
        }
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
        empty($name_err) && 
        empty($email_err) && 
        empty($password_err) &&
        empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO audit ( name, email, password) VALUES (?, ?, ? )";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss",  $param_name, $param_email, $param_password);

            // Set parameters
            
            $param_name = $name;
            $param_email = $email;
            $param_password = $password; // Assign the password directly without hashing

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: a_log.php");
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
    <title>Audit Registration</title>
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
    <img src="../logo.png" alt="Logo"  width="80" height="80" />
        <a href="" class="logo">
        <h2>CashAdvance <i class="fa-light fa-comment-plus"></i></h2>
        </a>

        <ul class="navmenu">
            <li><a href="../index.html">Home</a></li>            
            <li><a href="a_log.php">Audit</a></li>            
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
              <h2 class="">Staff Register</h2>
    </div>

    <div class="formbold-input-flex">

            <div>
                <label for="username" class="formbold-form-label">
                  Name
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="formbold-form-input  <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                />
              </div>
  
            <div>
                <label for="password" class="formbold-form-label">
                  Email
                </label>
                <input
                    type="email"
                    name="email"
                    id="password"
                    class="formbold-form-input<?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>"
                />
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

              <div>
                <label for="password" class="formbold-form-label">
                  Confirm Paasword
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

    <p>Already Have an Account! <a href="a_log.php">Login</a></p>     
</form>
            </div>
        </div>
    </section>
         
    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
            <img src="../logo.png" alt="Logo"  width="80" height="80" />
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

          
        </div>
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>

    <script src="../app.js"></script>
</body>
</html>
