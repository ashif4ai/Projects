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

 //Reciving POST Data
 if ($_SERVER["REQUEST_METHOD"] == "GET") {
     $username = $_GET["id"];

    //Query to get Student Details, Specialization Id, and Shortlisted Status
    $sql = "SELECT
    student.studentName,
    student.fatherName,
    student.motherName,
    student.dateOfBirth,
    student.mobileNumber,
    student.emailId,
    student.higherQualification,
    student.examinationBoard,
    student.passingPercentage,
    student.passingYear,

    admission.admission_id,
    admission.specializationId,
    admission.shortlisted,
    admission.appliedDate
FROM
    student
INNER JOIN admission ON student.username = admission.username
WHERE
    student.username = '$username'";

    //Trying to execute the query
    $result = mysqli_query($link, $sql);
    if($result){
        //Extracting Variables
        while ($res = mysqli_fetch_array($result)) {
            $studentName =  $res["studentName"];
            $fatherName =  $res["fatherName"];
            $motherName =  $res["motherName"];
            $dateOfBirth =  $res["dateOfBirth"];
            $mobileNumber =  $res["mobileNumber"];
            $emailId =  $res["emailId"];
            $higherQualification =  $res["higherQualification"];
            $examinationBoard =  $res["examinationBoard"];
            $passingPercentage =  $res["passingPercentage"];
            $passingYear =  $res["passingYear"];

            $admission_id =  $res["admission_id"];
            $specializationId =  $res["specializationId"];
            $shortlisted =  $res["shortlisted"];
            $appliedDate =  $res["appliedDate"];
        }

        //
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

        if($result){

            //Extracting Variables
            while ($res = mysqli_fetch_array($result)) {
                $courseName =  $res["courseName"];
                $specializationName =  $res["specializationName"];
                $courseDuration =  $res["courseDuration"];
                $courseFee =  $res["courseFee"];
            }
        }
        else{
            echo"Something went wrong. 2";
        }
    }
    else{
        echo"Something went wrong. 1";
                    echo mysqli_error($link);              

    }

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
    <link rel="stylesheet" href="../css/admin-style.css">
    <style>
        .application-min-card{
            cursor: default;
        }
        .application-min-card .reg-id {
            background-color: black;
        }
        .card {
            margin-bottom: 55px;       
        }
        .display-group .filled-data {
            font-size: 16px;
        }
        .application-min-card .reg-name {
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="main bg-effect" id="bg-effect">
        <div class="confirmation-card">
            <form action="responce-03.php" method="POST">

                <div class="btn-group">
                    <div class="custom-btn">
                        <input type="radio" name="shortlisted" id="accepted" value="Accepted" required>
                        <label for="accepted" class="checked"><img src="../icons/accept.png" alt=""><span>Accept</span></label>
                    </div>
                    <div class="custom-btn">
                        <input type="radio" name="shortlisted" id="rejected" value="Rejected" required>
                        <label for="rejected" class="checked"><img src="../icons/reject.png" alt=""><span>Rejected</span></label>
                    </div>

                </div>
                <div class="remark">Remark (Optional)</div>
                <textarea name="remark" id="remark" cols="30" rows="8"></textarea>

                <input type="hidden" name="username" value="<?php echo $username; ?>">

                <button type="submit" class="btn-primary" value="submit">Submit</button>
                    
            </form>
        </div>
    </div>
    <div class="main">
        <a href="logout.php" class="btn btn-sm">Logout</a>
        <a href="dashboard.php" class="home-btn"><img src="../icons/home.png" alt="Home"></a>

        <h1 class="header-primary">Take Action</h1>
        <div class="application-min-card">
            <div class="left">
                <div class="reg-id">Registration ID: # <?php echo $admission_id; ?></div>
                <div class="reg-date"> <?php echo $appliedDate; ?></div>
                
            </div>
            <div class="right">
                <div class="reg-name"> <?php echo $studentName; ?></div>
                <hr>
            </div>
        </div>

        <div class="application-min-card card">

            <div class="label-text">
                Personal Details
            </div>

            <div class="display-group">
                <div class="label">Father's Name</div>
                <div class="filled-data">
                    <?php echo $fatherName; ?>
                </div>
            </div>
            <div class="display-group">
                <div class="label">Mother's Name</div>
                <div class="filled-data">
                    <?php echo $motherName; ?>
                </div>
            </div>
            <div class="display-group">
                <div class="label">Date of Birth</div>
                <div class="filled-data">
                    <?php echo $dateOfBirth; ?>
                </div>
            </div>
            <br>
            <div class="display-group">
                <div class="label">Contact No.</div>
                <div class="filled-data">
                    <?php echo $mobileNumber; ?>
                </div>
            </div>
            <div class="display-group">
                <div class="label">Email ID</div>
                <div class="filled-data">
                    <?php echo $emailId; ?>
                </div>
            </div>

            <div class="label-text">
                Educational Details
            </div>

            <div class="display-group">
                <div class="label">Higher Qualification</div>
                <div class="filled-data">
                    <?php echo $higherQualification; ?>
                </div>
            </div>
            <div class="display-group">
                <div class="label">Examination Board</div>
                <div class="filled-data">
                    <?php echo $examinationBoard;?>
                </div>
            </div>
            <div class="display-group">
                <div class="label">Marks in %</div>
                <div class="filled-data">
                    <?php echo $passingPercentage; ?> %
                </div>
            </div>
            <div class="display-group">
                <div class="label">Passing Year</div>
                <div class="filled-data">
                    <?php echo $passingYear; ?>Lakh
                </div>
            </div>

            <div class="label-text">
                Course Details
            </div>

            <div class="display-group">
                <div class="label">Course</div>
                <div class="filled-data">
                    <?php echo $courseName; ?>
                </div>
            </div>
            <div class="display-group">
                <div class="label">Specialization</div>
                <div class="filled-data">
                    <?php echo $specializationName; ?>
                </div>
            </div>
            <div class="display-group">
                <div class="label">Duration</div>
                <div class="filled-data">
                    <?php echo $courseDuration; ?> Years
                </div>
            </div>
            <div class="display-group">
                <div class="label">Course Fee</div>
                <div class="filled-data">
                    <?php echo $courseFee; ?>Lakh
                </div>
            </div>


        </div>

        <button type="submit" class="btn-primary" value="submit" onclick="show('bg-effect')">Take Action</button>

    </div>

    <script src="../js/script.js"></script>
</body>

</html>