<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if no then redirect Login Page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && isset($_SESSION["user_admin"])) {
   
}
else{
    header("location:index.php");
    exit;
}

$registeredOn = $_SESSION["registeredOn"];
$adminName = $_SESSION["adminName"];

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
        <a href="logout.php" class="btn btn-sm" >Logout</a>
        <a href="dashboard.php" class="home-btn"><img src="../icons/home.png" alt="Home"></a>

        <h1 class="header-primary">My Account</h1>

        <div class="profile-logo">
            <?php echo substr($adminName,0,1); ?>
        </div> 
        <div class="header-secondary"><?php echo strtoupper($adminName);?></div>

        <div class="dis-group">
            <div class="label">Registered on</div>
            <div class="label-data"><?php echo $registeredOn;?></div>
        </div>
        <div class="dis-group">
            <div class="label">To Change Passwoord</div>
            <div class="label-data" > <a href="#" onclick="show('pass-box')" style="color:var(--color-primary); font-style:italic;">Click here</a></div>
        </div>
        
<br>
        <div id="pass-box" class="hide">
        <div class="input-group">
                <div class="upper">
                    <img src="../icons/password.png" alt="" class="icon">
                    <input type="password" name="pin" id="pin" placeholder="Enter New 4 Digit Pin*" required>
                    <a href="#" onclick="changePin()" class="btn btn-sm" style="width: 124px;">Change Pin</a>
                </div>
                <hr class="hr-line">
            </div>
        </div>
        

    </div>

    <script src="../js/script.js"></script>
</body>

</html>