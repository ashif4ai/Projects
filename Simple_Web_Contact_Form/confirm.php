<?php

//Listen for POST Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $issueType = $_POST["issueType"];
    $userComment = $_POST["userComment"];
} else{
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Contact Us</title>
</head>

<body>

    <section class="main">

        <!-- Header -->
        <h1 class="header">
            Contact Us
        </h1>
        <p class="disc">Confirm your <?php echo $issueType ?> and Submit! <br>you can also Edit</p>

        <!-- Form to collect data -->
        <form name='f1' action="#" method="POST" class="form">
            <div class="container confirmation-page">

                <!-- Input Username -->
                <div class="input-group">
                    <label for="userName" class="label">Name</label>
                    <div class="input"><?php echo $userName ?></div>
                </div>
                <!-- Input Email -->
                <div class="input-group">
                    <label for="userEmail" class="label">Enter Emaiil Id</label>
                    <div class="input"><?php echo $userEmail ?></div>
                </div>
                <!-- Input Issue Type -->
                <div class="input-group">
                    <label for="issueType" class="label">Select Option</label>
                    <div class="input"><?php echo $issueType ?></div>
                </div>
                <!-- Input Text area -->
                <div class="input-group">
                    <label for="userComment" class="label">Please Describe</label>
                    <div class="input"><?php echo $userComment ?></div>
                </div>

                <!-- Hidden Fields to submit data to database or previous page -->
                <input type="hidden" name="userName" required  value="<?php echo $userName ?>">
                <input type="hidden" name="userEmail" required  value="<?php echo $userEmail ?>">
                <input type="hidden" name="issueType" required  value="<?php echo $issueType ?>">
                <input type="hidden" name="userComment" required  value="<?php echo $userComment ?>">

                <!-- Next Button -->
                <div class="btn-group">

                    <input type='submit' class="btn" value='Edit' onclick="f1.action='index.php';  return true;">
                    <input type='submit' class="btn" value='Submit' onclick="f1.action='submit.php';  return true;">

                </div>
                <div>
        </form>
    </section>
</body>

</html>