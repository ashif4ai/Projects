<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
 
}
else{
    header("location: index.php");
    exit;
}

// Include config file
require_once "../config.php";

//Check if User try to submit multipple form
$username = $_SESSION["username"];
    
//Reciving POST Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Store data in session variables
    $_SESSION["fname"] = $_POST["fname"];
    $_SESSION["mname"] = $_POST["mname"];
    $_SESSION["dob"] = $_POST["dob"];
    $_SESSION["mobile"] = $_POST["mobile"];

        //Redirecting to Dashboard
        header("location: progress-2.php");

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

        <div class="progress">Complete the Registration Form <strong>1 of 3</strong></div>

        <h1 class="header-primary">Basic Details</h1>


        <!-- Login Section -->
        <form action="progress-1.php" method="POST" name="registration">
            <div class="label-text">
                Enter Your Personal details
            </div>
            <div class="input-group">
                <div class="upper">
                    <img src="../icons/user.png" alt="" class="icon">
                    <input type="name" name="name" id="name" placeholder="Enter Full Name*" value="<?php echo $_SESSION["studentName"]?>" disabled>
                </div>
                <hr class="hr-line">
            </div>

            <div class="input-group">
                <div class="upper">
                    <img src="../icons/user.png" alt="" class="icon">
                    <input type="text" name="fname" id="fname" placeholder="Enter Father's Name*" >
                </div>
                <hr class="hr-line">
            </div>

            <div class="input-group">
                <div class="upper">
                    <img src="../icons/user.png" alt="" class="icon">
                    <input type="text" name="mname" id="mname" placeholder="Enter Mother's Name*" >
                </div>
                <hr class="hr-line">
            </div>

            <div class="input-group">
                <div class="upper">
                    <img src="../icons/calendar.png" alt="" class="icon">
                    <input type="date" name="dob" id="dob" placeholder="Choose Date of Birth*" value="" required>
                </div>
                <hr class="hr-line">
            </div>

            <br>

            <div class="label-text">
                Enter your Contact details
            </div>

            <div class="input-group">
                <div class="upper">
                    <img src="../icons/mobile.png" alt="" class="icon">
                    <input type="number" name="mobile" id="mobile" placeholder="Enter Mobile Number" required>
                </div>
                <hr class="hr-line">
            </div>

            <div class="input-group">
                <div class="upper">
                    <img src="../icons/email.png" alt="" class="icon">
                    <input type="email" name="email" id="email" placeholder="Enter Email Address" value="<?php echo $_SESSION["username"]?>" required disabled>
                </div>
                <hr class="hr-line">
            </div>

            <button type="submit" class="btn-primary" value="submit">Next »</button>
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