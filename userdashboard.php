<?php
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
    <link rel="stylesheet" href="css/my/ownstyles1.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
    
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
                    <img class="rounded-[100%]" src="<?php echo "res/profileImage/".$imageName; ?>" alt="User Avatar">
                    <ul>
                        <a href="prod_cart.php">
                            <li class="mt-3 text-xl text-white bg-[#4CAF50] text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                                View cart
                            </li>
                        </a>
                        <a href="orderhistory.html">
                            <li class="mt-3 text-xl text-white bg-[#4CAF50] text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                                Order History
                            </li>
                        </a>
                        <a href="wishlist.html">
                            <li class="mt-3 text-xl text-white bg-[#4CAF50] text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                                Wishlist
                            </li>
                        </a>
                        <a href="sample_Prod_cat.php">
                            <li class="mt-3 text-xl text-white bg-[#4CAF50] text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                                Buy Product
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-[70%]">
            <form>
                <div class="col-lg-8 mt-8 mr-8">
                    <div class="bg-white shadow-sm rounded-md border border-gray-300">
                        <div class="border-b border-gray-900 px-4 py-3">
                            <h3 class="font-medium text-3xl"><i class="far fa-clone pr-1"></i>General Information</h3>
                        </div>
                        <div class="px-6 py-4">
                            <table class="table-auto w-full border-collapse">
                                <tbody>
                                <tr>
                                    <td class='py-3 pr-3 text-lg text-right border-b border-gray-300 w-1/3'>Name</td>
                                    <td class='py-3 px-3 text-lg border-b border-gray-300'>::</td>
                                    <td class='py-3 pl-3 text-lg border-b border-gray-300'><?php echo $row['Name']; ?></td>
                                </tr>
                                <tr>
                                    <td class='py-3 pr-3 text-lg text-right border-b border-gray-300 w-1/3'>E-mail</td>
                                    <td class='py-3 px-3 text-lg border-b border-gray-300'>::</td>
                                    <td class='py-3 pl-3 text-lg border-b border-gray-300'><?php echo $row['Email']; ?></td>
                                </tr>
                                <tr>
                                    <td class='py-3 pr-3 text-lg text-right border-b border-gray-300 w-1/3'>Contact</td>
                                    <td class='py-3 px-3 text-lg border-b border-gray-300'>::</td>
                                    <td class='py-3 pl-3 text-lg border-b border-gray-300'><?php echo $row['Phone']; ?></td>
                                </tr>
                                <tr>
                                    <td class='py-3 pr-3 text-lg text-right border-b border-gray-300 w-1/3'>Gender</td>
                                    <td class='py-3 px-3 text-lg border-b border-gray-300'>::</td>
                                    <td class='py-3 pl-3 text-lg border-b border-gray-300'><?php echo $row['Gender']; ?></td>
                                </tr>
                                <tr>
                                    <td class='py-3 pr-3 text-lg text-right border-b border-gray-300 w-1/3'>Role</td>
                                    <td class='py-3 px-3 text-lg border-b border-gray-300'>::</td>
                                    <td class='py-3 pl-3 text-lg border-b border-gray-300'><?php echo $row['Role']; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-full flex justify-between">
                        <div class="wrapper mt-10 mr-10">
                            <a href="editProfile.php">
                                <button type="button"
                                    class="px-6 py-3.5 text-base font-medium text-white bg-[#FF5722] hover:bg-[#FF401C] focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Edit Details
                                </button>
                            </a>
                        </div>
                        <div class="wrapper mt-10 ml-10">
                            <a href="logout.php">
                                <button type="button"
                                    class="px-6 py-3.5 text-base font-medium text-white bg-[#FF5722] hover:bg-[#FF401C] focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Logout
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
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