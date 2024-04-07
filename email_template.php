<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        /* Reset styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
        }

        /* Container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        .header {
            text-align: center;
            padding-bottom: 20px;
        }

        /* Body */
        .body {
            padding-bottom: 20px;
        }

        /* Footer */
        .footer {
            text-align: center;
            color: #999999;
            font-size: 12px;
        }

        /* Button */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .container {
                max-width: 100%;
            }
        }
    </style>
</head>
<?php
    session_start(); // Start the session
    
    $user_id = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : null;
    $event_id = isset($_SESSION['e_id']) ? $_SESSION['e_id'] : null;
    $id = isset($_SESSION['r_id']) ? $_SESSION['r_id'] : null;

    $con = mysqli_connect('localhost','root','','agrozen');

    $event_row = mysqli_query($con,"SELECT * FROM events WHERE id='$event_id'");
    $event_result = mysqli_fetch_array($event_row);

    $user_row = mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'");
    $user_result = mysqli_fetch_array($user_row);

    $event_title = $event_result['Title'];
    $user_name = $user_result['Name'];
?>
<body>
    <div class="container">
        <div class="header">
            <h1>Event Register Details</h1>
        </div>
        <div class="body">
            <p>Dear [UserName],</p>
            <p>We are thrilled to inform you that you have successfully registered for our upcoming event. Here are the details:</p>
            <ul>
                <li><strong>Registration Id : </strong> [RegistrationID]</li>
                <li><strong>Event Name:</strong> [EventTitle]</li>
                <li><strong>Date:</strong> [Date]</li>
                <li><strong>Time:</strong> [Time]</li>
                <li><strong>Location:</strong>[Location]</li>
                
            </ul>
            <p>We look forward to seeing you at the event!</p>
        </div>
        <div class="footer">
            <p>Best Regards,<br> AgroZen</p>
        </div>
    </div>
</body>

</html>
