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
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $shortlisted = $_POST["shortlisted"];
    $remark = $_POST["remark"];
  
    $sql ="UPDATE `admission` SET `shortlisted` = '$shortlisted', `remark` = '$remark' WHERE `username` = '$username'";

       //Trying to execute the query
       $result = mysqli_query($link, $sql);
       if($result){
           $message = "Application $shortlisted Successfully";
        echo"<script>
        alert('$message');
        window.location.href='dashboard.php';
         </script>";
       }
       else{
        echo"Something went wrong.";
    }
}
 
?>