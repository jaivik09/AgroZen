<?php
session_start();
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "agrozen";
$link = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if ($link == false) {
    die("Error : Couldn't Connect " . mysqli_connect_error());
}
$id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
if ($id) {
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
} else {
    // Handle the case where the user ID is not set
    exit("User ID not set.");
}

if (isset($_POST["changepassword"])) {
    $old_password = isset($_POST['old-password']) ? trim($_POST['old-password']) : '';
    $new_password = isset($_POST['new-password']) ? trim($_POST['new-password']) : '';
    $confirm_password = isset($_POST['confirm-new-password']) ? trim($_POST['confirm-new-password']) : '';

    // Verify if the old password matches the one in the database
    if (password_verify($old_password, $row['Password'])) {
        // Check if the new password and confirm password match
        if ($new_password === $confirm_password) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $edit = "UPDATE users SET Password='$hashed_password' WHERE id = $id";
            $update = mysqli_query($link, $edit);

            if ($update) {
                // Password updated successfully
                session_destroy();
                echo "<script>window.location.href = 'index.php';</script>";
                exit();
            } else {
                // Display an error message if the update query fails
                echo "Error updating record: " . mysqli_error($link);
            }
        } else {
            // Password and confirm password do not match
            echo "<script>alert('Password and confirm password do not match.')</script>";
        }
    } else {
        // Old password incorrect
        echo "<script>alert('Current password is incorrect.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <title>AgroZen™</title>
</head>

<body class="font-['Inter']">
    <?php   
        $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        if(isset($user_id))
        {
            require_once('setheader.php');
        } else {
            require_once('unsetheader.html');
        }
    ?>

    <form class="max-w-sm mx-auto mt-[50px]" method="POST">
        <div class="mb-5 justify-center">
            <label for="old-password" class="block mb-2 text-lg/[24px] font-medium text-gray-900 dark:text-white">Current Password</label>
            <div class="relative">
                <input type="password" id="old-password" name="old-password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-lg/[24px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <button type="button" onclick="togglePasswordVisibility('old-password')" class="absolute inset-y-0 right-0 m-3 cursor-pointer">
                    <i class="fas fa-eye" id="toggle-oldpassword"></i>
                </button>
            </div>
        </div>
        <div class="mb-5">
            <label for="new-password" class="block mb-2 text-lg/[24px] font-medium text-gray-900 dark:text-white">New Password</label>
            <div class="relative">
                <input type="password" id="new-password" name="new-password" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-lg/[24px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <button type="button" onclick="togglePasswordVisibility('new-password')" class="absolute inset-y-0 right-0 m-3 cursor-pointer">
                    <i class="fas fa-eye" id="toggle-newpassword"></i>
                </button>
            </div>
        </div>
        <div class="mb-5">
            <label for="confirm-new-password" class="block mb-2 text-lg/[24px] font-medium text-gray-900 dark:text-white">Confirm new password</label>
            <div class="relative">
                <input type="password" id="confirm-new-password" name="confirm-new-password" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-lg/[24px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <button type="button" onclick="togglePasswordVisibility('confirm-new-password')" class="absolute inset-y-0 right-0 m-3 cursor-pointer">
                    <i class="fas fa-eye" id="toggle-confirmnewpassword"></i>
                </button>
            </div>
        </div>
        <div class="flex justify-center">
            <button type="submit" name="changepassword" value="changepassword"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg/[24px] w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Change Password</button>
        </div>
    </form>


    <script>
        function togglePasswordVisibility(inputId) {
            var input = document.getElementById(inputId);
            var icon = document.getElementById("toggle-" + inputId.replace("-", ""));
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>

    <footer class="w-full fixed bottom-0 left-0" id="FOOTER">
        <div id="FOOTER">
            <div class="bg-[#3CBC00] text-white text-3xl font-medium py-2 px-2 flex justify-between">
                <p class="mr-2">LETS GET CONNECTED</p>
                <div class="footer-icon">
                    <a href="https://www.instagram.com/your_instagram_username"><i class="fab fa-instagram mr-2"></i></a>
                    <a href="https://www.linkedin.com/in/your_linkedin_profile"><i class="fab fa-linkedin mr-2"></i></a>
                    <a href="https://plus.google.com/your_google_plus_profile"><i class="fab fa-google-plus-square mr-2"></i></a>
                    <a href="https://www.facebook.com/your_facebook_profile"><i class="fab fa-facebook mr-2"></i></a>
                    <a href="https://twitter.com/your_twitter_profile"><i class="fab fa-twitter mr-2"></i></a>
                </div>
            </div>
            <div class="bg-gray-300 text-center">
                <p class="text-sm text-gray-900 sm:text-center dark:text-gray-900 my-0 leading-normal">
                    © 2024 <a href="indexal.html" class="hover:underline">AgroZen™</a>. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>

</body>

</html>
