<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
} else {
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
        <img src="../icons/success.png" alt="Success" class="success-img">

        <h1 class="header-primary"> Your Application has been Submited Successfully! Thank You.</h1>

        <a href="dashboard.php" class="btn-primary">Go to Dashboard</a>

    </div>





    </div>
</body>

</html>