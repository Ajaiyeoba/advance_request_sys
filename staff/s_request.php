<!-- This page is to allow staff make requests -->
<?php
include '../config.php';

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: s_log.php");
    exit;
}

if (isset($_POST['submit'])) {
    // Check if staff_id is set and no;t empty
    if (isset($_POST['staff_id']) && !empty($_POST['staff_id'])) {
        $staff_id = $_POST['staff_id'];
        $bank = $_POST['bank'];
        $name = $_POST['name'];
        $department = $_POST['department'];
        $number = $_POST['number'];
        $amount = $_POST['amount'];
        $request = $_POST['request'];
        $date = $_POST['date'];

        // Prepare and execute the SQL query
        $sql = "INSERT INTO `staff_requests` (amount, department, staff_id, request, date, name, bank, number,  status) VALUES (?, ?,?, ?, ?,?,?,? , 'Pending')";
        $stmt = $link->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssssssi",  $amount,  $department, $staff_id, $request,  $date, $bank, $name,  $number);
            if ($stmt->execute()) {
                // Redirect to staff_display.php after successful insertion
                header('location: s_display.php');
                exit(); // Terminate script after redirection
            } else {
                die("Error: Unable to execute query. " . mysqli_error($link));
            }
        } else {
            die("Error: Unable to prepare statement. " . mysqli_error($link));
        }
    } else {
        // Handle case when staff_id is not set or empty
        echo "Error: Staff ID is required.";
    }
}
?>


 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Request Dash</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
    <style>
     section{
        
        }
             .container{
    justify-content: center;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    width: 400px;
    margin-top: 20px;
}
.container h2{
    text-align: center;
}
.container p{
    
    text-align: center
}

.header{
    border-bottom: 1px solid #f0f0f0;
    background-color: #fff;
    padding: 20px 40px;
}
form{
    padding: 30px 40px;
    display: block;
}
.form-group{
    margin-bottom: 10px;
    padding-bottom: 20px;
    position: relative;

}
.form-group label{
    display: inline-block;
    margin-bottom: 5px;
    font-family: cursive;
}
.form-group input{
    border: 2px solid #f0f0f0;
     border-radius: 4px;
    display: block;
    font-size: 14px;
    padding: 10px;
    width: 100%; 
}
.form-group input:focus{
    outline: 0;
    border-color: #777;
}
.btn{
    background: #551a8b;
    border: 2px solid #8e44ad;
    border-radius: 4px;
    color: #fff;
    display: block;
    font-family: cursive;
    font-size: 16px;
    padding: 10px;
    margin-top: 20px;
    width: 100%;
}
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
        .formbold-form-title p {
          font-size: 16px;
          line-height: 24px;
          color: #536387;
          margin-top: 12px;
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
        <img src="../logo.png" alt="Logo"  width="80" height="80" />
            <h2>CashAdvance </h2>
        </a>
        <ul class="navmenu">
            <li><a href="../index.html">Home</a></li>            
            <li><a href="staff/staff_login.php">Staff</a></li>            
        </ul>
        <div class="nav-btn">
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

        <section>
        <h1 class="my-5">Hi! <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b> Welcome Back.  </h1>
        <div class="formbold-main-wrapper">

       
        <div class="formbold-form-wrapper">
            <form action=" "  method="POST">
            <div class="formbold-form-title">
              <h2 class="">Request now</h2>
             
            </div>


            <div class="formbold-input-flex">
            <div>
                <label for="staff_id" class="formbold-form-label">
                  Staff Id
                </label>
                <input
                    type="text"
                    name="staff_id"
                    id="Staff_id"
                    class="formbold-form-input"
                />
              </div>
          
              <div>
                <label for="amount" class="formbold-form-label">
                  Amount
                </label>
                <input
                    type="number"
                    name="amount"
                    id="amount"
                    class="formbold-form-input"
                />
              </div>
            </div>
            <div class="formbold-input-flex">
            <div>
                <label for="bank" class="formbold-form-label">
                  Bank
                </label>
                <input
                    type="text"
                    name="bank"
                    id="bank"
                    class="formbold-form-input"
                />
              </div>
          
              <div>
                <label for="number" class="formbold-form-label">
                  Account number
                </label>
                <input
                    type="number"
                    name="number"
                    id="number"
                    class="formbold-form-input"
                />
              </div>
            </div>

            <div class="formbold-input-flex">
            <div>
                <label for="firstname" class="formbold-form-label">
                 Account Name
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="formbold-form-input"
                />
              </div>
     <div>
                <label for="firstname" class="formbold-form-label">
                  Request
                </label>
                <input
                    type="text"
                    name="request"
                    id="name"
                    class="formbold-form-input"
                />
              </div>
              
            </div>
    
            <div class="formbold-input-flex">
           <div>
                <label for="date" class="formbold-form-label">
                  Date
                </label>
                <input
                    type="date"
                    name="date"
                    id="date"
                    class="formbold-form-input"
                />
              </div>
             
             <div class="formbold-mb-3">
             <label for="department" class="formbold-form-label">Department</label>
             <select id="department" name="department" class="formbold-form-input ?>">
                <option value="">Select Department</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Animal Health">Animal Health</option>
                <option value="SLT">SLT</option>
                <option value="Fishries">Fishries</option>
                <option value="VLT">VLT</option>
            </select>
            <span class="invalid-feedback" style="display: none;"><?php echo $department_err; ?></span>
        </div>


    
    
    

            </div>
        
            <input type="submit" name="submit" class="formbold-btn" value="Make Request">
          </div>
            </form>
        </div>
        </div>

        <!-- <a href="s_confirmed.php" >
            <button class="formbold-btn">Confirmed </button>
        </a> -->
        
        <a href="s_display.php" >
            <button class="formbold-btn">Requests </button>
        </a>

        <a href="s_logout.php" >
            <button class="formbold-btn">Logout</button>
        </a>
    </section>

    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
            <img src="../logo.png" alt="Logo"  width="80" height="80" />
                <a href="" class="logo">
                    <h2>Cash Advance</h2>
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

         
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>
    <script src="../app.js"></script>
</body>
</html>
