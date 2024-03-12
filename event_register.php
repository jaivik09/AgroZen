<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration</title>
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Your other head elements (stylesheets, etc.) go here -->
</head>
<body>
<?php
    
    function generateUniqueID($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $randomString;
    }
    
    $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : null;
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
    $con = mysqli_connect('localhost','root','','agrozen');

    $event_row = mysqli_query($con,"SELECT * FROM events WHERE id='$event_id'");
    $event_result = mysqli_fetch_array($event_row);

    $user_row = mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'");
    $user_result = mysqli_fetch_array($user_row);
    
    if($user_result)
    {
        $id = generateUniqueID(8);

        $event_title = $event_result['Title'];
        $user_name = $user_result['Name'];

        $to = $user_result['Email'];
        $subject = "Successfully Registered in the Event";
        $headers = "From: hunterdogs21@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        $msg = "Hii, ".$user_name."\n You are successfully registered in the ".$event_title."\n Your registeration no. is ".$id ;
        $msg = wordwrap($msg,70);
        mail($to, $subject, $msg, $headers);
        echo "<script>
                                    swal({
                                        title: 'Regisetered',
                                        text: 'You are successfully registered in the event!!!!',
                                        icon: 'success'
                                    }).then((result) => {
                                        if (result) {
                                            window.location.href = 'MainEvent.php';
                                        }
                                    });
                                </script>";
    } else {
        echo "<script>swal('Error!!!!','Something Happened Try Again!!!!','error');</script>";;
    }
    
    //echo"<script>alert('$id')</script>";
    

?>
</body>
</html>
