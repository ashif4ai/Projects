<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
} else {
    header("location: index.php");
    exit;
}

// Include config file
require_once "../config.php";

$specializationId = $_SESSION["Specialization_id"];
//Fetching Full Course Details
$sql = "SELECT
        course.courseName,
        specialization.specializationName,
        specialization.courseDuration,
        specialization.courseFee
        FROM
        course   
        INNER JOIN specialization ON course.courseId = specialization.courseId
        WHERE specialization.specializationId = '$specializationId';
        ;";

//Trying to execute the query
$result = mysqli_query($link, $sql);

//Extracting Variables
while ($res = mysqli_fetch_array($result)) {
    $courseName =  $res["courseName"];
    $specializationName =  $res["specializationName"];
    $courseDuration =  $res["courseDuration"];
    $courseFee =  $res["courseFee"];
}


//Final Submission of Data
//Reciving POST Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Store data in session variables
    $username = $_SESSION["username"];
    $fatherName = $_SESSION["fname"];
    $motherName = $_SESSION["mname"];
    $dateOfBirth = $_SESSION["dob"];
    $mobileNumber = $_SESSION["mobile"];

    $higherQualification = $_SESSION["qualification"];
    $examinationBoard = $_SESSION["board-name"];
    $passingPercentage = $_SESSION["percentage"];
    $passingYear = $_SESSION["year"];

    $course_id = $_SESSION["course_id"];
    $Specialization_id = $_SESSION["Specialization_id"];

    // Query to Store data in DB
    $sql = "UPDATE `student` SET
    `fatherName` = '$fatherName',
    `motherName` = '$motherName',
    `dateOfBirth` = '$dateOfBirth',
    `mobileNumber` = '$mobileNumber',
    `higherQualification` = '$higherQualification',
    `examinationBoard` = '$examinationBoard',
    `passingPercentage` = '$passingPercentage',
    `passingYear` = '$passingYear'
    WHERE `username` = '$username'";

    //Trying to execute the query
    $result = mysqli_query($link, $sql);

    //If data inserted successfully
    if ($result) {

        //Setting Time Zone
        date_default_timezone_set('Asia/Kolkata');
        $Date =  date("Y-m-d H:i:s", time()); 
// var_dump()
    if($_SESSION["Rejected_count"]>0){
        $sql = "UPDATE `admission` SET `specializationId` = '$specializationId', `appliedDate` = '$Date', `shortlisted`= 'Pending' WHERE `username` = '$username'";
    }
    else{
        $sql = "INSERT INTO `admission` (`username`,`specializationId`,`appliedDate`) VALUES ('$username','$Specialization_id','$Date')";
    }

        //Trying to execute the query
        $result = mysqli_query($link, $sql);
        if ($result) {
           
            //Redirecting
            header("location: success.php");
                
        } else {

            echo mysqli_error($link);              

            echo "  <script>
                alert('Failed to Submit');
                </script> 
                ";
        }
    } else {
        echo mysqli_error($link);

        echo "  <script>
                        alert('Failed to Submit');
                    </script> 
                ";
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

        <div class="progress">Complete the Registration Form <strong>3 of 3</strong></div>

        <h1 class="header-primary">Final Submission</h1>


        <!-- Login Section -->
        <form action="progress-3.php" method="POST">
            <div class="label-text">
                Review your details
            </div>

            <div class="display-group">
                <div class="label">Name</div>
                <div class="filled-data"><?php echo $_SESSION["studentName"]; ?></div>
            </div>

            <div class="display-group">
                <div class="label">Father's Name</div>
                <div class="filled-data"><?php echo $_SESSION["fname"]; ?></div>
            </div>
            <div class="display-group">
                <div class="label">Mother's Name</div>
                <div class="filled-data"><?php echo $_SESSION["mname"]; ?></div>
            </div>
            <div class="display-group">
                <div class="label">Date of Birth</div>
                <div class="filled-data"><?php echo $_SESSION["dob"]; ?></div>
            </div>

            <div class="label-text">
                Review Course details
            </div>

            <div class="display-group">
                <div class="label">Course</div>
                <div class="filled-data"><?php echo $courseName; ?></div>
            </div>
            <div class="display-group">
                <div class="label">Specialization</div>
                <div class="filled-data"><?php echo $specializationName; ?></div>
            </div>
            <div class="display-group">
                <div class="label">Duration</div>
                <div class="filled-data"><?php echo $courseDuration; ?> Years</div>
            </div>
            <div class="display-group">
                <div class="label">Course Fee</div>
                <div class="filled-data"><?php echo $courseFee; ?>Lakh</div>
            </div>


            <button type="submit" class="btn-primary" value="submit">Confirm & Submit</button>
        </form>

    </div>
</body>

</html>