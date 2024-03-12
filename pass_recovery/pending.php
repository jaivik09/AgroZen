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
        <form class="login-form" action="new_pass.php" method="post" style="text-align: center;">
                <p>
                        We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account. 
                </p>
            <p>Please login into your email account and click on the link we sent to reset your password</p>
            <button type="submit" >OK</button>
        </form>
        </div>
                
</body>
</html>