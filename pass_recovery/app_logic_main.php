<html>
<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php 
    session_start();
    $con = mysqli_connect('localhost','root','','agrozen');

    if(isset($_POST['reset-password']))
    {
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $_SESSION['email'] = $email;
        $sql = "SELECT Email FROM users WHERE Email = '$email' ";
        $re = mysqli_query($con,$sql);
        $row = mysqli_num_rows($re);
        if($row)
        {
            $otp = sprintf('%06d', mt_rand(100000, 999999));
            $re_query = mysqli_query($con,"INSERT INTO password_reset(email,token) values ('$email','$otp')");

            $to = $email;
            $subject = "Reset your password on examplesite.com";
            $headers = "From: hunterdogs21@gmail.com\r\n";
            $headers .= "Content-type: text/html\r\n";
            $msg = "Your One-Time Password is".$otp." for reset your password";
            $msg = wordwrap($msg,70);
            mail($to, $subject, $msg, $headers);
            header('location: pending.php?email=' . $email);
        } else {
            echo "<script>swal('Error!!!!','Email is not registered!!!!','error');</script>";
        }
    }

    if(isset($_POST['new_password']))
    {
        $new_pass = isset($_POST['new_pass']) ? trim($_POST['new_pass']) : '';
        $new_pass_c = isset($_POST['new_pass_c']) ? trim($_POST['new_pass_c']) : '';
        $otp = isset($_POST['otp']) ? trim($_POST['otp']) : '';

        $s_email = $_SESSION['email'];
        //echo "Email".$s_email;
        $sql2 = mysqli_query($con,"SELECT token FROM password_reset WHERE email = '$s_email'");
        $re = mysqli_fetch_assoc($sql2);

        if($otp == $re['token'])
        {
            if($new_pass == $new_pass_c)
            {
                // $sql1 = mysqli_query($con,"SELECT email FROM password_reset WHERE token = '$token'");
                // $re = mysqli_fetch_array($sql1);
                // $email = $re['Email'];
                
                // if($re)
                // {
                    $hashpass = password_hash($new_pass, PASSWORD_DEFAULT);
                    $sql2 = mysqli_query($con,"UPDATE users SET Password='$hashpass' WHERE Email = '$s_email'");
                    $sql3 = mysqli_query($con,"DELETE FROM password_reset WHERE email='$s_email'");
                    echo "<script>
                    swal({
                        title: 'Updated',
                        text: 'Your Password is successfully updated!!!!',
                        icon: 'success'
                    }).then((result) => {
                        if (result) {
                            window.location.href = '/AgroZen/login.php';
                        }
                    });
                </script>";
                // }
                
            }else {
                echo "<script>swal('Error!!!!','Passwords do not match!!!!','error');</script>";
            }
        } else {
            echo "<script>swal('Error!!!!','OTP is incorrect!!!!','error');</script>";
        }
    }
?>
</body>
</html>