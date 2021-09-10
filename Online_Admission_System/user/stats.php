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

    $username = $_SESSION["username"];

    //Query to get Student Name, Specialization Id, and Shortlisted Status
        $sql = "SELECT
        student.studentName,
        admission.specializationId,
        admission.shortlisted,
        admission.remark,
        admission.appliedDate
    FROM
        student
    INNER JOIN admission ON student.username = admission.username
    WHERE
        student.username = '$username'";

    //Trying to execute the query
    $result = mysqli_query($link, $sql);

    $num_rows = mysqli_num_rows($result);

    //If Record Found in Database
    if ($num_rows > 0) {

    //Extracting Variables
    while ($res = mysqli_fetch_array($result)) {
        $studentName =  $res["studentName"];
        $specializationId =  $res["specializationId"];
        $shortlisted =  $res["shortlisted"];
        $remark =  $res["remark"];
        $appliedDate =  $res["appliedDate"];
    }

    //Query to get Full Course Details
    $sql = "SELECT
            course.courseName,
            specialization.specializationName,
            specialization.courseDuration,
            specialization.courseFee
        FROM
            course   
        INNER JOIN specialization ON course.courseId = specialization.courseId
        WHERE specialization.specializationId = '$specializationId'";

    //Trying to execute the query
    $result = mysqli_query($link, $sql);

    //Extracting Variables
    while ($res = mysqli_fetch_array($result)) {
        $courseName =  $res["courseName"];
        $specializationName =  $res["specializationName"];
        $courseDuration =  $res["courseDuration"];
        $courseFee =  $res["courseFee"];
    }

    //

    if($shortlisted =='Pending'){
        $className = 'color-pending';
    }
    else if ($shortlisted == 'Accepted'){
        $className = 'color-accepted';
    }   
    else{
        $className = 'color-rejected';
    }
}
    else{
        echo"<script>
            alert('Application Not found!');
            window.location.href = 'dashboard.php';
        </script>
    ";
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
        <a href="../logout.php" class="btn btn-sm">Logout</a>
        <a href="dashboard.php" class="home-btn"><img src="../icons/home.png" alt="Home"></a>

        <h1 class="header-primary">Check Status</h1>

        <div class="label-text">
            Current Status
        </div>

        <div class="container custom-1">

            <div class="dis-group">
                <div class="label">Name</div>
                <div class="label-data">
                    <?php echo $studentName ?>
                </div>
            </div>
            <div class="dis-group">
                <div class="label">Course</div>
                <div class="label-data">
                    <?php echo $courseName ?> [
                    <?php echo $specializationName ?>]
                </div>
            </div>
            <div class="dis-group">
                <div class="label">Fee & Duration</div>
                <div class="label-data">
                    <?php echo $courseFee ?> Lakh [
                    <?php echo $courseDuration ?> Year]
                </div>
            </div>
            <div class="dis-group">
                <div class="label">Date and Time</div>
                <div class="label-data">
                    <?php echo $appliedDate ?>
                </div>
            </div>
            <div class="dis-group">
                <div class="label">Status</div>
                <div class="label-data <?php echo $className ?>">
                    <?php echo $shortlisted ?>
                </div>
            </div>
            <div class="dis-group">
                <div class="label">Remark</div>
                <div class="label-data <?php echo $className ?>">
                    <?php echo $remark ?>
                </div>
            </div>
        </div>
    </div>



    </div>
</body>

</html>