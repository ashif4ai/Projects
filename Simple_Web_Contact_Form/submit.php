<?php

//Importing Configration File
require_once("config/config.php");

//Listen for POST Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Extracting Variables
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $issueType = $_POST["issueType"];
    $userComment = $_POST["userComment"];

    // Query to Insert data into table
    $sql = "INSERT INTO web_contact_form (userName, userEmail, issueType, userComment) VALUES ('$userName','$userEmail','$issueType','$userComment')";

    //Try to execute the query
    $result = mysqli_query($link,$sql);

    //Dispaly Confirmation Message
    if($result){
        header('Location: success.php');
        die();
    } else{
        echo mysqli_error($link);
        echo "Failed to Submit!";
    }

// Close the COnnection
mysqli_close($link);
}


?>