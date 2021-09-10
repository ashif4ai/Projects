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

require_once "../config.php";

//Declaring Variables to count no. of Application
$Pending_count = 0;
$Accepted_count = 0;
$Rejected_count = 0;

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
    admission;";

    //Trying to execute the query
    $result = mysqli_query($link, $sql);
    if($result){
        while ($res = mysqli_fetch_array($result)) {
            //Extracting Variables
            $Pending_count =  $res["Pending"];
            $Accepted_count =  $res["Accepted"];
            $Rejected_count =  $res["Rejected"];
        }
    }
    else{
        "Blank";
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
    <link rel="stylesheet" href="../css/admin-style.css">
</head>

<body>
    <div class="main">
        <a href="logout.php" class="btn btn-sm" >Logout</a>

         <h1 class="header-primary">Welcome, Admin</h1>
        <div class="container">
            
            <a href="new-appl.php" class="menu-item color-1"><div class="number-label">#<?php echo $Pending_count ?></div><div>New</div><div>Applications</div></a>
            <a href="shortlisted-appl.php" class="menu-item color-2"><div class="number-label">#<?php echo $Accepted_count ?></div><div>Shortlisted</div><div>Students</div></a>
            <a href="rejected-appl.php" class="menu-item color-3"><div class="number-label">#<?php echo $Rejected_count ?></div><div>Rejected</div><div>Applications</div></a>
            <a href="account.php" class="menu-item color-4"><div></div><div>My</div><div>Account</div></a>
        </div>
        
        

    </div>
</body>

</html>