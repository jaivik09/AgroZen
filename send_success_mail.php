<?php 
    if (isset($_GET['rp_payment_id']))
    {
        $id = $_GET['rp_payment_id'];
        echo "hii $id";
        $con = mysqli_connect('localhost','root','','agrozen');

    
        //$email = isset($_POST['email']) ? trim($_POST['email']) : '';
        //$_SESSION['email'] = $email;
        $sql = "SELECT * FROM orders WHERE id = '$id' ";
        $re = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($re);
        $name = $row['billing_name'];
        $user_id = $row['user_id'];
        $quan = $row['quantity'];
        $sql1 = "SELECT * FROM users WHERE id= '$user_id'";
        $re1 = mysqli_query($con,$sql);
        $row1 = mysqli_fetch_assoc($re1);
        $email = $row1['Email'];
        
            
            $to = $email;
            $subject = "Reset your password";
            $headers = "From: hunterdogs21@gmail.com\r\n";
            $headers .= "Content-type: text/html\r\n";
            $msg = file_get_contents("for_email_template1.php");
            $msg = str_replace("[UserName]", $name, $msg);
            $msg = str_replace("[OTP]", $quan, $msg);
        
            mail($to, $subject, $msg, $headers);
            //header('location: pending.php?email=' . $email);
        }
?>