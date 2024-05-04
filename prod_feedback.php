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
    $imagename = $row['ProfileImage'];
    $name = $row['Name'];

    $feedbacks_sql = mysqli_query($link,"SELECT * FROM feedback_table WHERE farmer_name = '$name'");
    $feedbacks = mysqli_fetch_all($feedbacks_sql, MYSQLI_ASSOC);
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
    <link href="css/my/ownstyles1.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    
    <link href="res/images/logo.png" rel="icon">
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

    <div class="flex">
        <div class="w-[30%]">
            <div class="left-0 flex justify-center">
                <div class="w-[250px] h-[250px] rounded-full py-3">
                    <img  class="rounded-[100%]" src="<?php echo "res/profileImage/".$imageName; ?>" alt="User Avatar">
                    <ul>
                        <a href="prod_cart.php">
                            <li class="mt-3 text-xl bg-[#4CAF50] text-white text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                                View cart
                            </li>
                        </a>
                        <!-- <a href="orderhistory.html">
                            <li class="mt-3 text-xl bg-[#4CAF50] text-white text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                                Machineries
                            </li>
                        </a> -->
                         <a href="wishlist.html">
                            <li class="mt-3 text-xl bg-[#4CAF50] text-white text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                                Order List
                            </li>
                        </a>
                        <a href="upload_product.php">
                            <li class="mt-3 text-xl bg-[#4CAF50] text-white text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                                Add Product
                            </li>
                        </a>
                        <a href="far_display_reg_events.php">
                            <li class="mt-3 text-xl bg-[#4CAF50] text-white text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                                Regisetered Events
                            </li>
                        </a>
                        <a href="prod_feedback.php">
                            <li class="mt-3 text-xl bg-[#4CAF50] text-white text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                                Product Feedback
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-[70%] mt-4 mr-16 relative">
            <h2 class="text-center text-2xl font-bold text-gray-900 dark:text-white mb-4">Notifications</h2>
            <?php foreach ($feedbacks as $feedback): ?>
                <!-- card -->
                <div class="mb-4">
                    <div class="block max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 transform hover:scale-105 hover:shadow-lg hover:border-gray-300 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $feedback['fb_id']; ?></h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400"><?php echo $feedback['feedback']; ?></p>
                        <button type="button" class="absolute bottom-3 right-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Okay</button>
                    </div>
                </div>
                <!-- /card -->
            <?php endforeach; ?>
        </div>
    </div>

    <footer class="w-full fixed bottom-0 left-0" id="FOOTER">
        <div id="FOOTER">
            <div class="bg-[#4CAF50] text-white text-3xl font-medium py-2 px-2">
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