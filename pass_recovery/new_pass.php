<?php
// Initialize $errors as an empty array
$errors = [];

// Include your app_logic.php or logic for processing form submission here
// Ensure that you populate $errors array with relevant error messages if needed

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Reset PHP</title>
    <link rel="stylesheet" href="main1.css">
</head>

<body>
    <div class="form-center">
    <form class="login-form" action="app_logic_main.php" method="post">
        <h2 class="form-title">New password</h2>
        <!-- form validation messages -->
        <div class="form-group">
            <label>Enter OTP</label>
            <input type="text" name="otp">
        </div>
        <div class="form-group">
            <label>New password</label>
            <input type="password" name="new_pass">
        </div>
        <div class="form-group">
            <label>Confirm new password</label>
            <input type="password" name="new_pass_c">
        </div>
        <div class="form-group">
            <button type="submit" name="new_password" class="login-btn">Submit</button>
        </div>
    </form>
    </div>
</body>

</html>
