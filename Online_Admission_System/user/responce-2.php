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

$newPin = $_REQUEST["newPin"];
    
if(isset($_SESSION["user_admin"])){
        $admin_username = $_SESSION["admin_username"];
        //Query to Update Pin
        $sql = "UPDATE `admin` SET `admin_pin` = '$newPin' WHERE `admin`.`admin_username` = '$admin_username';";  
}

else{
    $username = $_SESSION["username"];
    //Query to Update Pin
    $sql = "UPDATE `student` SET `pin` = '$newPin' WHERE `student`.`username` = '$username';";
}
    
    //Trying to execute the query
    $result = mysqli_query($link, $sql);
    
    if($result){
        echo"Pin Changed Successfully";
    }
    else{
        echo"Request Failed";
    }