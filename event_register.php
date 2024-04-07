<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration</title>
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Your other head elements (stylesheets, etc.) go here -->
</head>
<?php 
    
    $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : null;
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
    $con = mysqli_connect('localhost','root','','agrozen');

    $event_row = mysqli_query($con,"SELECT * FROM events WHERE id='$event_id'");
    $event_result = mysqli_fetch_array($event_row);

    $user_row = mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'");
    $user_result = mysqli_fetch_array($user_row);

    $user_name = $user_result['Name'];
    $user_email = $user_result['Email'];
    $event_title = $event_result['Title'];

    $reg_check = mysqli_query($con,"SELECT * FROM events_reg WHERE Email = '$user_email' AND  Title ='$event_title'");
    $count = mysqli_num_rows($reg_check);

    if($count == 0)
    {
?>
    


<body>
<?php
    session_start();

    
    function generateUniqueID($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $randomString;
    }
    
    
    if($user_result)
    {
        $id = generateUniqueID(8);
        
        $event_title = $event_result['Title'];
        $event_date = $event_result['Date']; 
        $event_time= $event_result['Time'];
        $event_location = $event_result['Location'];

        $to = $user_result['Email'];
        $subject = "Successfully Registered in the Event";
        $headers = "From: hunterdogs21@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        // $msg = "Hii, ".$user_name."\n You are successfully registered in the ".$event_title."\n Your registeration no. is ".$id ;
        // $msg = wordwrap($msg,70);
        $msg = file_get_contents("email_template.php");
        $msg = str_replace("[EventTitle]", $event_title, $msg);
        $msg = str_replace("[UserName]", $user_name, $msg);
        $msg = str_replace("[RegistrationID]", $id, $msg);
        $msg = str_replace("[Date]", $event_date, $msg);
        $msg = str_replace("[Time]", $event_time, $msg);
        $msg = str_replace("[Location]",$event_location, $msg);        

        mail($to, $subject, $msg, $headers);

        $reg_insert = mysqli_query($con,"INSERT INTO events_reg(R_id, Title, Date, Time, Location, Email) VALUES('$id','$event_title','$event_date','$event_time','$event_location','$user_email')" );

        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            swal({
                title: 'Registered',
                text: 'You are successfully registered in the event!!!!',
                icon: 'success'
            }).then(() => {
                window.location.href = 'MainEvent.php';
            });
        });
    </script>";
    } else {
        echo "<script>swal('Error!!!!','Something Happened Try Again!!!!','error');</script>";;
    }
} else {
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        swal({
            title: 'Error',
            text: 'You are already registered in the event!!!!',
            icon: 'warning'
        }).then(() => {
            window.location.href = 'MainEvent.php';
        });
    });
</script>";
}
    
    //echo"<script>alert('$id')</script>";
    

?>
</body>
</html>
