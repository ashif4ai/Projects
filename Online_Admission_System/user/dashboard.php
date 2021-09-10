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

//Declaring Variables to count no. of Application
$Pending_count = 0;
$Accepted_count = 0;
$Rejected_count = 0;

$username = $_SESSION["username"];

    //Query to get Student Details, Specialization Id, based on Shortlisted Status 
    $sql = "SELECT
    COUNT(
        IF(shortlisted = 'Pending', 1, NULL)
    ) 'Pending',
    COUNT(
        IF(shortlisted = 'Accepted', 1, NULL)
    ) 'Accepted',
    COUNT(
        IF(shortlisted = 'Rejected', 1, NULL)
    ) 'Rejected'
FROM
    admission
WHERE username = '$username';";

    //Trying to execute the query
    $result = mysqli_query($link, $sql);
    if($result){
        while ($res = mysqli_fetch_array($result)) {
            //Extracting Variables
            $_SESSION["Pending_count"] =  $res["Pending"];
            $_SESSION["Accepted_count"] =  $res["Accepted"];
            $_SESSION["Rejected_count"] =  $res["Rejected"];
        }
    }
    else{
        "Something  Went Wrong";
    }
    $can_apply = false;
    
    if($_SESSION["Pending_count"]==0 && $_SESSION["Accepted_count"]==0){
        $can_apply = true;
    }   
    
    // Close connection
    mysqli_close($link);

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

         <h1 class="header-primary">Welcome to MM(DU)</h1>
        <div class="container">
            <a href="<?php echo $can_apply? 'progress-1.php' : '#'?>" class="menu-item color-1"><strong>Apply Now</strong></a>
            <a href="stats.php" class="menu-item color-2"><strong>Check Stats</strong></a>
            <a href="account.php" class="menu-item color-3"><strong>My Account</strong></a>
            <a href="help.php" class="menu-item color-4"><strong>Help & Support</strong></a>
        </div>
        
        

    </div>
</body>

</html>