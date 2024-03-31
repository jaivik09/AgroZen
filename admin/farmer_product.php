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
        
        $sql1 = "SELECT * FROM farmer_add_prod";
        
        $result1 =mysqli_query($link,$sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>AgroZen Admin Dashboard</title>
</head>

<style>
    /* Overlay style */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Modal style */
    .modal {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    /* Close button style */
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
</style>

<body>
<!--Container -->
<div class="mx-auto bg-grey-400">
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
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
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
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
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
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                            Farmer Product Table
                        </div>
                        <div class="p-3">
                            <table class="table-responsive w-full rounded">
                                <thead>
                                    <tr>
                                    <th class="border w-1/5 px-4 py-2">Product Name</th>
                                    <th class="border w-1/7 px-4 py-2">Price</th>
                                    <th class="border w-1/6 px-4 py-2">Description</th>
                                    <th class="border w-1/6 px-4 py-2">Quantity(in Kg)</th>
                                    <th class="border w-1/6 px-4 py-2">Catogary</th>
                                    <th class="border w-1/6 px-4 py-2">Farmer</th>
                                    <th class="border w-1/6 px-4 py-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            echo "<tr>";
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_name'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_price'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_desc'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_quant'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_cat'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['farmer_name'] . "</td>";
                                            echo "<td class='border px-4 py-2'>";
                                            echo "<a class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white' href='../uploads/farmer upload/" . $row1['main_img'] . "'>";
                                            echo "<i class='fas fa-eye'></i>";
                                            echo "</a>";
                                            echo "<a class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white' onclick='openTextBox()'>
                                                    <i class='fas fa-comment'></i>
                                                  </a>";
                                            echo "<a class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500' href=''>";
                                            echo "<i class='fas fa-trash'></i>";
                                            echo "</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </main>
            <!--/Main-->
        </div>
        <!--Footer
        <footer class="bg-[#4CAF50] text-white p-2 ">
            <div class="bg-gray-300 text-center">
                <p class="text-sm text-gray-900 sm:text-center dark:text-gray-900 my-0 leading-normal">
                    © 2024 <a href="index.php" class="hover:underline">AgroZen™</a>. All Rights Reserved.
                </p>
            </div>
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

<!-- Hovering text box -->
<div id="hovering-text-box" class="overlay" style="display: none;">
    <div class="modal">
        <div class="close-btn" onclick="closeTextBox()">X</div>
        <input type="text" id="messageInput" placeholder="Enter your message">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

<script>
    function openTextBox() {
        document.getElementById('hovering-text-box').style.display = 'flex';
    }

    function closeTextBox() {
        document.getElementById('hovering-text-box').style.display = 'none';
    }

    function sendMessage() {
        // Get the message input value
        var message = document.getElementById('messageInput').value;

        // Add your code to send the message here
        // For testing purposes, let's just log the message to the console
        console.log("Message sent:", message);

        // Close the text box after sending the message
        closeTextBox();
    }
</script>

</body>

</html>

<?php 
    }
    else {
        echo "<script>window.location.href = 'login.php';</script>";
    }
?>