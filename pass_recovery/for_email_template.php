<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Email</title>
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

<body>
    <div class="container">
        <div class="header">
            <h1>Password Reset</h1>
        </div>
        <div class="body">
            <p>Dear [UserName],</p>
            <p>You have requested a password reset for your AgroZen account. Please use the following OTP (One-Time Password) to reset your password:</p>
            <p><strong>OTP: [OTP]</strong></p>
            <p>If you did not request this password reset, you can ignore this email.</p>
        </div>
        <div class="footer">
            <p>Best Regards,<br> AgroZen Team</p>
        </div>
    </div>
</body>

</html>
