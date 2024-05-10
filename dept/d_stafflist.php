<?php 
// this page to view staffs
  // Include config file
require_once "../config.php";

  // Start the session
session_start();
    
    // Check if the admin is logged in, if not then redirect them to the login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: d_log.php");
    exit;
}

// Define an array to store Staffs and their bios
$users = [];

// Retrieve users and their bios from the database
$sql = "SELECT  id, staff_id, name, email, department FROM  users";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        // Fetch associative array
        while($row = mysqli_fetch_assoc($result)){
            // Add each user and their bio to the $users array
            $users[] = $row;
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No users found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
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
<style>
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

.crud-button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
}

.crud-button:hover {
  background-color: #45a049; /* Darker Green */
}

.crud-button.delete {
  background-color: #f44336; /* Red */
}

.crud-button.delete:hover {
  background-color: #da190b; /* Darker Red */
}
.flex-btn{
    display:flex;
}
</style>
<body>
   

    <header>
        <a href="" class="logo">
            <h2>FundWatch</h2>  <i class="fa-solid fa-comment-plus"></i>
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

        <div class="limter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th>Id</th>
                                    <th>staff_id </th>
                                    <th>Name </th>
                                    <th>Email</th>
                                    <th>Department</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                <td class="column1"> <?php echo htmlspecialchars($user['id']); ?></td>   
                                <td class="column1"> <?php echo htmlspecialchars($user['staff_id']); ?></td>
                                <td class="column2"> <?php echo htmlspecialchars($user['name']); ?></td>
                                <td class="column3"> <?php echo htmlspecialchars($user['email']); ?></td>
                                <td class="column4"> <?php echo htmlspecialchars($user['department']); ?></td>
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
        <a href="staff_request.php">
            <button class="formbold-btn">
                Make Request
            </button>
                            </a>

                            <a href="d_board.php">
            <button class="formbold-btn">
                Check Board
            </button>
                            </a>
    </section>

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