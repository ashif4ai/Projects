<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

  header("location: dashboard.php");
  exit;
}
 
    require_once "../config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = $_POST['email'];
        $name = $_POST['name'];
        $pin = $_POST['pin'];
        //Setting Time Zone
        date_default_timezone_set('Asia/Kolkata');
        $Date =  date("Y-m-d H:i:s", time()); 

        // $sql = "INSERT INTO post_data (name,rollno, course) VALUES ( $name, $rollno, $course)";
        $sql = "INSERT INTO `student` ( `username`, `studentName`, `emailId`,`pin`,`registeredOn`) VALUES ('$email','$name','$email','$pin','$Date')";

        //Trying to execute the query
        $result = mysqli_query($link,$sql);
        if($result){
                  
            echo"<script>
                alert('Account Created Successfully, Login to your account using Email and Pin');
                window.location.href='index.php';
                 </script>
            ";
            
        }
        else{
             echo"  <script>
                        alert('Failed to Create Account');
                    </script> 
                ";
                    // echo mysqli_error($link);              
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
            <a href="#" class="nav-item active">Register</a>
            <a href="index.php" class="nav-item">Login</a>
        </nav>

        <h1 class="header-primary">ADMISSION 2021</h1>
        <div class="disc">Join the, India's Leading and Most Vibrant Campus</div>

        <!-- Register Section -->
        <form action="register.php" method="POST" name="registration">
        <div class="register-section">
    
            <div class="input-group">
                <div class="upper">
                    <img src="../icons/user.png" alt="" class="icon">
                    <input type="text" name="name" id="name" placeholder="Enter Full Name*" >
                </div>
                <hr class="hr-line">
            </div>

            <div class="input-group">
                <div class="upper">
                    <img src="../icons/email.png" alt="" class="icon">
                    <input type="email" name="email" id="email" placeholder="Enter Email Adddress*" >
                </div>
                <hr class="hr-line">
            </div>

            <div class="input-group">
                <div class="upper">
                    <img src="../icons/password.png" alt="" class="icon">
                    <input type="password" name="pin" id="pin" placeholder="Choose 4 Digit Pin*" >
                </div>
                <hr class="hr-line">
            </div>

        </div>

    <button type="submit" class="btn-primary" value="submit">Register Now!</button>
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