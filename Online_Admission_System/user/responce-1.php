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

// get the q parameter from URL
$courseId = $_REQUEST["courseId"];

    //Fetching the List of Courses
    $sql = "SELECT * FROM specialization WHERE courseId='$courseId'";
    
    //Trying to execute the query
    $result = mysqli_query($link, $sql);
        while ($res = mysqli_fetch_array($result)) {
        echo '<option value="'.$res["specializationId"].'">'.$res["specializationName"].'</option>';
    
        }
