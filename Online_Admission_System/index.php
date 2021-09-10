<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

  header("location: user/dashboard.php");
  exit;
}
 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Online Registration System</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-image: url("images/bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        .landing-box .bg-image{
            display: block;
                width: 100%;
        }
        
        @media screen and (max-width: 480px) {
            body{
                background: none;
            }

            .landing-box{
                margin: 15px auto;
                text-align: center;
            }
          
            
          
           
            
        }
    </style>
</head>

<body>
    <div class="main landing-box">

        <img src="icons/admission.png" alt="MMDU" class="bg-image">
        <h1 class="header-primary">Take Your First Step Toward Your Dream Careear with MMDU</h1>

      
            <a href="user/register.php" class="btn btn-lg">Register Now!</a>
            <a href="user/index.php" class="btn">Registered? Login</a>
    </div>
</body>

</html>