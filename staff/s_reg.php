<?php
// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$staff_id = $name = $department = $email = $password = $confirm_password = "";
$staff_id_err = $name_err = $department_err = $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate staff ID
    if (empty(trim($_POST["staff_id"]))) {
        $staff_id_err = "Please enter your staff ID.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["staff_id"]))) {
        $staff_id_err = "Staff ID should only contain letters and numbers.";
    } else {
        $staff_id = trim($_POST["staff_id"]);
    }

    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter a name.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', trim($_POST["name"]))) {
        $name_err = "Name can only contain letters and spaces.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email address
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please enter a valid email address.";
        }
    }

    // Validate department
    if (isset($_POST['department'])) {
        $department = htmlspecialchars(trim($_POST['department']));
        if (empty($department)) {
            $department_err = "Please select a department.";
        }
    } else {
        $department_err = "Please select a department.";
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
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Passwords did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($staff_id_err) && empty($name_err) && empty($department_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (staff_id, name, department, email, password) VALUES (?, ?, ?, ?, ?)";

if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sssss", $param_staff_id, $param_name, $param_department, $param_email, $param_password);

    // Set parameters
    $param_staff_id = $staff_id;
    $param_name = $name;
    $param_department = $department;
    $param_email = $email;
    $param_password = $password; // Hash the password

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: s_log.php");
        exit();
    } else {
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
<title>Staff Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
<style>
/* New Form Styles */
.formbold-main-wrapper {
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
    <li><a href="staff_login.php">Staff</a></li>
</ul>
<div class="nav-btn">
</div>
</header>

<section>
<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="formbold-form-title">
                <h2 class="">Staff Register</h2>
            </div>
            <div class="formbold-input-flex">
                <div>
                    <label for="staff_id" class="formbold-form-label">Staff ID</label>
                    <input type="text" name="staff_id" id="staff_id" class="formbold-form-input <?php echo (!empty($staff_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $staff_id; ?>" />
                    <span class="invalid-feedback"><?php echo $staff_id_err; ?></span>
                </div>
                <div>
                    <label for="name" class="formbold-form-label">Name</label>
                    <input type="text" name="name" id="name" class="formbold-form-input <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" />
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                </div>
            </div>
            <div class="formbold-mb-3">
                <label for="email" class="formbold-form-label">Email</label>
                <input type="email" name="email" id="email" class="formbold-form-input <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" />
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
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
            <div class="formbold-input-flex">
                <div>
                    <label for="password" class="formbold-form-label">Password</label>
                    <input type="password" name="password" id="password" class="formbold-form-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" />
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div>
                    <label for="confirm_password" class="formbold-form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="formbold-form-input <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" />
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
            </div>
            <input type="submit" name="submit" class="formbold-btn" value="Register">
            <p>Already Have an Account! <a href="s_log.php">Login</a></p>
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
        
        <div class="social-icon">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-tiktok"></i></a>
        </div>
    </div>
    <div class="second-info">
        <h4>Support</h4>
