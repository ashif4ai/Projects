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
        <a href="../logout.php" class="btn btn-sm" >Logout</a>
        <a href="dashboard.php" class="home-btn"><img src="../icons/home.png" alt="Home"></a>

        <h1 class="header-primary">Help & Support</h1>

    
        <div class="help-group">
            <div class="left">
                <img src="../icons/mobile.png" alt="">
            </div>
            <div class="right">
                <div class="help-title">Contact Number</div>
                <div class="help-data">Toll-free No. 1800-2740-240</div>
            </div>
        </div>
        <hr>
        <div class="help-group">
            <div class="left">
                <img src="../icons/email.png" alt="">
            </div>
            <div class="right">
                <div class="help-title">E-Mail Address</div>
                <div class="help-data">admission@mmumullana.org</div>
            </div>
        </div>
        <hr>
        <div class="help-group">
            <div class="left">
                <img src="../icons/fax.png" alt="">
            </div>
            <div class="right">
                <div class="help-title">FAX. No.</div>
                <div class="help-data">+91-1731-274495</div>
            </div>
        </div>
        


        
        

    </div>
</body>

</html>