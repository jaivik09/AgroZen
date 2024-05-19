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

    $admin_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : null;
    if(isset($admin_id))
    {
        $id = $_SESSION['admin_id'];
        $sql = "SELECT * FROM admin WHERE admin_id = $id";

        $result =mysqli_query($link,$sql);
        $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <title>Add Event</title>

    <style>
        body {
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        }

        .container .title{
            text-align: center;
            margin-bottom: 30px;

        }

        .title {
        display: block;
        align-self: center;
        }

        .content {
        min-width: 800px; /* Adjust the width as needed */
        }

        .box{
            border: 2px solid black;
        }

        /* Style for the file input */
        .file-input {
        position: relative;
        overflow: hidden;
        }

        .file-input input {
        font-size: 100px;
        position: absolute;
        top: 0;
        right: 0;
        opacity: 0;
        }

        .file-input button {
        background-color: #008cff;
        color: #ffffff;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        /* Style for the selected file name display */
        .selected-file {
        margin-top: 8px;
        font-size: 14px;
        color: #555;
        }

        .input-field {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .file-input {
            position: relative;
            overflow: hidden;
        }

        .file-input input {
            font-size: 100px;
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0;
        }

        .file-btn {
            background-color: #008cff;
            color: #ffffff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .selected-file {
            margin-top: 8px;
            font-size: 14px;
            color: #555;
        }

        .submit-btn {
            background-color: #008cff;
            color: #ffffff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

    </style>

</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <?php
            include_once 'header.php';
        ?>
        <!--/Header-->
        
        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="index.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border  bg-white">
                        <a href="addevent.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                                Add Event
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="upload_product.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                                Add Product
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="farmer_product.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                                Farmer Product
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <!--
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="forms.html"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            Forms
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="buttons.html"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-grip-horizontal float-left mx-2"></i>
                            Buttons
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="tables.html"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tables
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="ui.html"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-uikit float-left mx-2"></i>
                            Ui components
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-300-border">
                        <a href="modals.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-square-full float-left mx-2"></i>
                            Modals
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2">
                        <a href="#"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="far fa-file float-left mx-2"></i>
                            Pages
                            <span><i class="fa fa-angle-down float-right"></i></span>
                        </a>
                        <ul class="list-reset -mx-2 bg-white-medium-dark">
                            <li class="border-t mt-2 border-light-border w-full h-full px-2 py-3">
                                <a href="login.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Login Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="border-t border-light-border w-full h-full px-2 py-3">
                                <a href="register.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Register Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="border-t border-light-border w-full h-full px-2 py-3">
                                <a href="404.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    404 Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    -->
                </ul>

            </aside>
            <!--/Sidebar-->
            <!--Main-->
            <div class="mr-20 ml-20" >
            <?php
    if(isset($_POST['verify']))
    {
      $title = isset($_POST['title']) ? trim($_POST['title']) : '';
      $description = isset($_POST['description']) ? trim($_POST['description']) : '';
      $time = isset($_POST['time']) ? trim($_POST['time']) : '';
      $location = isset($_POST['location']) ? trim($_POST['location']) : '';
      $date = isset($_POST['date']) ? trim($_POST['date']) : ''; 
      
      $con = mysqli_connect('localhost','root','','agrozen');

      if($_FILES['profile_image']['error'] == UPLOAD_ERR_OK)
      {
        $targetDir = "../res/eventImage/";

        // Get the original name of the uploaded file
        $imageName = basename($_FILES['profile_image']['name']);
        $targetFile = $targetDir . $imageName;

        if(file_exists($targetFile))
        {
          echo "<script>alert('File is already exits')</script>";
        } else {
          if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile))
          {
            $sql = "INSERT INTO events(Title,Description,Time,Date,Location,Image) VALUES ('$title','$description','$time','$date','$location','$imageName')";

            if(mysqli_query($con,$sql))
            {
              echo "<script>alert('Event added successfully!!!!')</script>";
            } else {
              echo "<script>alert('Error while uploading the Event')</script>";
            }
          } else {
            echo "<script>alert('Error while uploading the Event')</script>";
          }
        }
      } else {
        echo "<script>alert('No file uploaded')</script>";
      }      
    }
  ?>
  
  <div class="container">
    <div class="title">EVENT DETAILS</div>
    <div class="content ">
      <form class="max-w-sm mx-auto" method="post" action="" enctype="multipart/form-data">
      <div class="mb-5">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
          <input type="text" id="name" name="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required />
        </div>
        <div class="mb-5">
            <label for="message" name="description" class="block text-sm font-semibold leading-6 text-gray-900">Description</label>
            <div class="mt-2.5">
              <textarea name="description" id="message" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
        </div>
        <div class="mb-5">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
          <input type="text" id="name" name="time" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required />
        </div>
        <div class="mb-5">
    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
    <input type="date" id="date" name="date" class="datepicker shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Select date" required />
</div>

<div class="mb-5">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
          <input type="text" id="name" name="location" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required />
        </div>
        <div class="mb-5 file-input">
            <label for="profile-image"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Image</label>
            <input type="file" id="profile-image" name="profile_image" accept="image/*" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
            <button type="button">Choose File</button>
            <div class="selected-file" id="selected-file">No file selected</div>
          </div>
        
        <div class="flex items-start mb-5">
        <button type="submit" name="verify" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload </button>
    </form>
    </div>
  </div>

            </div>
            <!--/Main-->
        </div>
        <!--Footer
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
        </footer>
        /footer-->

    </div>

</div>
<!--
<footer class="w-full fixed bottom-0 left-0" id="FOOTER">
    <div id="FOOTER">
        <div class="bg-[#4CAF50] text-white text-3xl font-medium py-2 px-2 flex justify-between">
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
-->

<script src="./main.js"></script>

<script>
    // Add script to display selected file name
    document.getElementById('profile-image').addEventListener('change', function () {
    var fileName = this.files[0].name;
    document.getElementById('selected-file').innerText = 'Selected File: ' + fileName;
    });
</script>

</body>

</html>

<?php 
    }
    else {
        echo "<script>window.location.href = 'login.php';</script>";
    }
?>