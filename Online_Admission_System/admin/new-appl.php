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
// Include config file
require_once "../config.php";

    //Query to get Student Details, Specialization Id, based on Shortlisted Status 
    $sql = "SELECT
    student.username,
    student.studentName,

    admission.admission_id,
    admission.specializationId,
    admission.appliedDate
FROM
    student
INNER JOIN admission ON student.username = admission.username
WHERE
    admission.shortlisted ='Pending'";

    //Trying to execute the query
    $result = mysqli_query($link, $sql);
               
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
    <style>
        .application-min-card .reg-id {
            background-color: #0061D2;
        }
    </style>
</head>

<body>
    <div class="main">
        <a href="logout.php" class="btn btn-sm">Logout</a>
        <a href="dashboard.php" class="home-btn"><img src="../icons/home.png" alt="Home"></a>

        <h1 class="header-primary">All New Applications</h1>

        <div class="application-list">


            <?php
                if($result){
                    while ($res = mysqli_fetch_array($result)) {
                    //Extracting Variables
                        $username =  $res["username"];
                        $studentName =  $res["studentName"];
                        $admission_id =  $res["admission_id"];
                        $specializationId =  $res["specializationId"];
                        $appliedDate =  $res["appliedDate"];

                        //Query to get Full Course Details
                    $sql = "SELECT
                    course.courseName,
                    specialization.specializationName
                    FROM
                    course   
                    INNER JOIN specialization ON course.courseId = specialization.courseId
                    WHERE specialization.specializationId = '$specializationId'";

                    //Trying to execute the query
                    $result_second = mysqli_query($link, $sql);

                    if($result_second){

                        //Extracting Variables
                        while ($res = mysqli_fetch_array($result_second)) {
                            $courseName =  $res["courseName"];
                            $specializationName =  $res["specializationName"];
                        }
                        // Output
                        echo'
                        <a href="app-details.php?id='.$username.'">
                        <div class="application-min-card">
                            <div class="left">
                                <div class="reg-id">Registration ID:  #'.$admission_id.'</div>
                                <div class="reg-date">'.$appliedDate.'</div>
                            </div>
                            <div class="right">
                                <div class="reg-name">'.$studentName.'</div>
                                <hr>
                                <div class="reg-course">'.$courseName.'('.$specializationName.')</div>
                            </div>
                        </div>
                    </a>                       
                        ';
                    }
                    else{
                        echo"Something went wrong. 2";
                        echo mysqli_error($link);              

                    }

                    }       
                }
                else{
                    echo"Something went wrong. 1";
                                echo mysqli_error($link);              

                }
            ?>
        </div>
    </div>
</body>

</html>