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

    //Fetching the List of Courses
    $sql = "SELECT * FROM course";

    //Trying to execute the query
    $result = mysqli_query($link, $sql);
 
    //Reciving POST Data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Store data in session variables
        $_SESSION["qualification"] = $_POST["qualification"];
        $_SESSION["board-name"] = $_POST["board-name"];
        $_SESSION["percentage"] = $_POST["percentage"];
        $_SESSION["year"] = $_POST["year"];
        $_SESSION["course_id"] = $_POST["course_id"];
        $_SESSION["Specialization_id"] = $_POST["Specialization_id"];

            //Redirecting to Dashboard
            header("location: progress-3.php");

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

<body onload="getCourseDetail()">
    <div class="main">

        <div class="progress">Complete the Registration Form <strong>2 of 3</strong></div>

        <h1 class="header-primary">Qualification & Course</h1>


        <!-- Login Section -->
        <form action="progress-2.php" method="POST">
            <div class="label-text">
                Enter your Educational Details 
            </div>
            <!-- Educational Qualification -->
            <div class="input-group">
                <div class="upper">
                    <img src="../icons/higher-education.png" alt="" class="icon">
                    <select name="qualification" id="qualification">
                        <option value="">Choose your Higher Qualification</option>                       
                            <option value ="Less than high school">Less than high school</option>
                            <option value ="High school/GED">High school/GED</option>
                            <option value ="Some college">Some college</option>
                            <option value ="2 year college(Assoc.Degree)">2 year college(Assoc.Degree)</option>
                            <option value ="4 year college (BA/BS Degree)">4 year college (BA/BS Degree)</option>
                            <option value ="Masters. degree">Masters. degree</option>
                            <option value ="Doctorial degree">Doctorial degree</option>
                            <option value ="Professional degree (e.g., MD or JD)">Professional degree (e.g., MD or JD)</option>  
                    </select>
                </div>
                <hr class="hr-line">
            </div>

            <!-- Name of Examination Board -->
            <div class="input-group">
                <div class="upper">
                    <img src="../icons/higher-edu-name.png" alt="" class="icon">
                    <input type="text" name="board-name" id="board-name" placeholder="Name of Examination Board" required>
                </div>
                <hr class="hr-line">
            </div>

            <!-- Item In One Line -->
            <div class="inline">
                <div class="input-group">
                    <div class="upper">
                        <img src="../icons/percentage.png" alt="" class="icon">
                        <input type="text" name="percentage" id="percentagee" placeholder="Enter Percentage" class="token-1" required>
                    </div>
                    <hr class="hr-line">
                </div>

                <div class="input-group">
                    <div class="upper">
                        <img src="../icons/calendar.png" alt="" class="icon">
                        <select name="year" id="year" required>
                            <option>Choose Year</option><option>1980</option><option>1981</option><option>1982</option><option>1983</option><option>1984</option><option>1985</option><option>1986</option><option>1987</option><option>1988</option><option>1989</option><option>1990</option><option>1991</option><option>1992</option><option>1993</option><option>1994</option><option>1995</option><option>1996</option><option>1997</option><option>1998</option><option>1999</option><option>2000</option><option>2001</option><option>2002</option><option>2003</option><option>2004</option><option>2005</option><option>2006</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
                        </select>
                    </div>
                    <hr class="hr-line">
                </div>      
            </div>
    
            <br>
<!-- Course Detail -->
            <div class="label-text">
                Enter the Course Details
            </div>
<!-- Select Course -->
            <div class="input-group">
                <div class="upper">
                    <img src="../icons/higher-education.png" alt="" class="icon">
                    <select name="course_id" id="Course_id" required>
                        <option value="">Select Course</option>
                        <?php
                          //Extracting Variables
                            while ($res = mysqli_fetch_array($result)) {
                                echo '<option value="'.$res["courseId"].'">'.$res["courseName"].'</option>';
                            
                            }
                        ?>                       
                    </select>        
                </div>
                <hr class="hr-line">
            </div>

<!-- Select Specialization -->
            <div class="input-group">
                <div class="upper">
                    <img src="../icons/specialization.png" alt="" class="icon">
                    <select name="Specialization_id" id="Specialization_id" required>
                       
                            <!-- List Includes Using AJAX Requesr sent to responcepage.php -->
                    </select>
                </div>
                <hr class="hr-line">
            </div>

            <button type="submit" class="btn-primary" value="submit">Next »</button>
        </form>

    </div>
    
    <script src="../js/script.js"></script>
</body>

</html>