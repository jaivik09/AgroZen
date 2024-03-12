<?php
// Initialize $errors as an empty array
$errors = [];

// Include your app_logic.php or logic for processing form submission here
// Ensure that you populate $errors array with relevant error messages if needed

?>
<?php include('app_logic_main.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Password Reset PHP</title>
        <link rel="stylesheet" href="main1.css">
</head>
<body>
        <div class="form-center">
        <form class="login-form" action="enter_email.php" method="post">
                <h2 class="form-title">Reset password</h2>
                
                <div class="form-group">
                        <label>Your email address</label>
                        <input type="email" name="email">
                </div>
                <div class="form-group">
                        <button type="submit" name="reset-password" class="login-btn">Submit</button>
                </div>
        </form>
        </div>
</body>
</html>