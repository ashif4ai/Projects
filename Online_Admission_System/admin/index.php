<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && isset($_SESSION["user_admin"])) {
    header("location: dashboard.php");
    exit;
}

// Include config file
require_once "../config.php";

//Reciving POST Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $admin_username = $_POST["username"];
    $admin_pin = $_POST["pin"];

    $sql = "SELECT * FROM admin WHERE admin_username ='$admin_username' and admin_pin = '$admin_pin'";

    //Trying to execute the query
    $result = mysqli_query($link, $sql);

    if($result){
        $num_rows = mysqli_num_rows($result);
        
        //If Record Found in Database
        if ($num_rows > 0) {
            
            // echo "Login Success";

            //Extracting Variables
            while ($res = mysqli_fetch_array($result)) {
                $admin_id = $res['admin_id'];
                $admin_username = $res['admin_username'];
                $userType = $res['userType'];
                $adminName = $res['adminName'];
                $admin_emailId = $res['admin_emailId'];
                $registeredOn = $res['registeredOn'];
            }
            //Start a new session
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["admin_id"] = $admin_id;
            $_SESSION["admin_username"] = $admin_username;
            if($userType=="admin"){

                $_SESSION["user_admin"] = true;
            }
            $_SESSION["adminName"] = $adminName;
            $_SESSION["admin_emailId"] = $admin_emailId;
            $_SESSION["registeredOn"] = $registeredOn;

            //Redirecting to Dashboard
            header("location: dashboard.php");
        }
        //If Record Not Found in Database
        else {
            echo "   <script>
                alert('Failed to Login');
            </script> 
            ";   
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Online Registration System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="main">
        <!-- Navigation Bar -->
        <nav>
            <a href="register.php" class="nav-item">Register</a>
            <a href="#" class="nav-item active">Login</a>
        </nav>

        <h1 class="header-primary">Admin Login</h1>
        <div class="disc">Enter your Registration id and Pin to Login </div>

        <!-- Login Section -->
        <form action="index.php" method="POST" name="registration">
            <div class="login-section">

                <div class="input-group">
                    <div class="upper">
                        <img src="../icons/email.png" alt="" class="icon">
                        <input type="email" name="username" id="username" placeholder="Enter Registered Email*">
                    </div>
                    <hr class="hr-line">
                </div>

                <div class="input-group">
                    <div class="upper">
                        <img src="../icons/password.png" alt="" class="icon">
                        <input type="password" name="pin" id="pin" placeholder="Enter 4 digit Pin">
                    </div>
                    <hr class="hr-line">
                </div>

            </div>
            <button type="submit" class="btn-primary" value="submit">Login</button>
        </form>

    </div>

    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- JQuery Form ValidationCDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <!-- Custiom From Validation Script -->
    <script src="../js/form-validation.js"></script>
</body>

</html>