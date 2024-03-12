<?php

    session_start();
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "agrozen";
    $link = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    if($link == false)
    {
        die("Error : Couldn't Connect ". mysqli_connect_error());
    }
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id = $id";

    $result =mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result);

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

    <form class="max-w-sm mx-auto mt-10" method="POST">
        <div class="mb-5">
            <label for="name" class="block mb-2 text-lg/[24px] font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-lg/[24px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
        <div class="mb-5">
            <label for="phone" class="block mb-2 text-lg/[24px] font-medium text-gray-900 dark:text-white">Phone
                No.</label>
            <input type="phone" id="phone" name="phone" value="<?php echo $row['Phone']; ?>"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-lg/[24px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
        <div class="mb-5">
            <label for="gender"
                class="block mb-2 text-lg/[24px] font-medium text-gray-900 dark:text-white">Gender</label>
            <select id="gender" name="gender"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-lg/[24px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <?php 
                $genders = ['male', 'female', 'other'];
                foreach ($genders as $gender) {
                    $selected = ($gender == $row['Gender']) ? 'selected' : '';
                    echo "<option value=\"$gender\" $selected>".ucfirst($gender)."</option>";
                }
            ?>
            </select>
        </div>

        <div class="mb-5">
            <label for="email"
                class="block mb-2 text-lg/[24px] font-medium text-gray-900 dark:text-white">E-mail</label>
            <input type="email" id="email" name="email" value="<?php echo $row['Email']; ?>"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-lg/[24px] rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                disabled />
        </div>
        <div class="mb-5 flex flex-col sm:flex-row items-center justify-between">
            <label for="password"
                class="block mb-2 text-lg/[24px] font-medium text-gray-900 dark:text-white">Password</label>
            <a href="changepass.php"
                class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Change
                Password</a>
        </div>

        <div class="flex justify-center w-full">
            <button type="submit" name="edit" value="edit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg/[24px] w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
        </div>
    </form>

    <?php
        if(isset($_POST["edit"]))
        {
            $name = $_POST["name"];
            $mobno = $_POST["phone"];
            $gender = $_POST["gender"];
            
            // Use single quotes to properly enclose string values in the SQL query
            $edit = "UPDATE users SET Name='$name', Phone='$mobno', Gender='$gender' WHERE id = $id";
            
            $update = mysqli_query($link, $edit);
            
            if($update) {
                // Redirect to another page after successful update
                echo "<script>window.location.href = 'userRole.php';</script>";
                exit(); // Important to stop further execution
            } else {
                // Display an error message if the update query fails
                echo "Error updating record: " . mysqli_error($link);
            }
        }
    ?>



    <footer class="w-full fixed bottom-0 left-0" id="FOOTER">
        <div id="FOOTER">
            <div class="bg-[#3CBC00] text-white text-3xl font-medium py-2 px-2">
                <p>LETS GET CONNECTED</p>
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