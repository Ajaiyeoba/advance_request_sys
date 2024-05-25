<?php
// Start the session
session_start();

// Check if the provost's is already logged in, if yes then redirect them to the dashboard
if(isset($_SESSION["pro-loggedin"]) && $_SESSION["pro-loggedin"] === true){
    header("location: p_board.php.");
    exit;
}
// Check if the provost's has submitted the login form
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check provost's credentials
    if($_POST["username"] === "provost" && $_POST["password"] === "qwerty419"){
        // Set provost's session variables
        $_SESSION["pro-loggedin"] = true;
        // Redirect to the provost's dashboard
        header("location: p_board.php");
        exit;
    } else {
        // Invalid username or password
        $login_err = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provost Login</title>
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
   

    <header>          <img src="../logo.png" alt="Logo"  width="80" height="80" />
        <a href="" class="logo">
            <h2>CashAdvance</h2>  <i class="fa-solid fa-comment-plus"></i>
        </a>

        <ul class="navmenu">
            <li><a href="../index.html">Home</a></li>            
            <li><a href="bursary/bursary_login.php">Provost</a></li>

        </ul>

        <div class="nav-btn">

           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

    <section>
    <section>
        <div class="formbold-main-wrappper">
            <div class="formbold-form-wrapper">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="formbold-form-title">
              <h2 class="">Provost  Login</h2>
    </div>

    <div class="formbold-mb-3">
            <div>
                <label for="password" class="formbold-form-label">
                  Provost Username
                </label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    class="formbold-form-input "
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
        </div>
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>
    <script src="../app.js"> </script> 
</body>
</html>