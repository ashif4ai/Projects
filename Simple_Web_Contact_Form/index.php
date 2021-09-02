<?php
$userName = '';
$userEmail = '';
$issueType = '';
$userComment = '';

//Listen for POST Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $issueType = $_POST["issueType"];
    $userComment = $_POST["userComment"];
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
        <p class="disc">Fill the form for Query, Feedback, Complaint and Others</p>

        <!-- Form to collect data -->
        <form action="confirm.php" method="POST" class="form">
            <div class="container">

                <!-- Input Username -->
                <div class="input-group">
                    <label for="userName" class="label">Enter Name</label>
                    <input type="text" name="userName" id="userName" class="input" required placeholder="Enter Name" value="<?php echo $userName ?>">
                </div>
                <!-- Input Email -->
                <div class="input-group">
                    <label for="userEmail" class="label">Enter Emaiil Id</label>
                    <input type="email" name="userEmail" id="userEmail" class="input" required placeholder="Enter Email Id" value="<?php echo $userEmail ?>">
                </div>
                <!-- Input Issue Type -->
                <div class="input-group">
                    <label for="issueType" class="label">Select Option</label>
                    <select name="issueType" id="issueType" required class="input">
                        <option value="">Select</option>
                        <option value="Query" <?php echo $issueType== 'Query' ? 'selected' : ''?>>Query</option>
                        <option value="Feedback" <?php echo $issueType== 'Feedback' ? 'selected' : ''?>>Feedback</option>
                        <option value="Complaint" <?php echo $issueType== 'Complaint' ? 'selected' : ''?>>Complaint</option>
                        <option value="Other" <?php echo $issueType== 'Other' ? 'selected' : ''?>>Other</option>
                    </select>
                </div>
                <!-- Input Text area -->
                <div class="input-group">
                    <label for="userComment" class="label">Please Describe</label>
                    <textarea name="userComment" id="userComment" cols="30" rows="10" required class="input" placeholder="Please Describe"><?php echo $userComment ?></textarea>
                </div>

                <!-- Next Button -->
                <div class="btn-group">
                    <button type="submit" class="btn">Next</button>
                </div>

            </div>
        </form>
    </section>

</body>

</html>