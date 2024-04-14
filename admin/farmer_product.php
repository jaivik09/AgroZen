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
    $row2 = mysqli_fetch_assoc($result1);
    $name = $row2["prod_name"];
    $price = $row2["prod_price"];
    $description = $row2["prod_desc"];
    $cat = $row2["prod_cat"];
    $quan = $row2["prod_quant"];
    $image = $row2["main_img"];
    $fname = $row2["farmer_name"];
    $result2 =mysqli_query($link,$sql1);
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Farmer Product</title>

    <script>
       
    </script>
</head>

<style>
  /* Styles for popup form */
  .popup-form {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f9f9f9;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    z-index: 1000;
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
                                        <th class="border w-1/6 px-4 py-2">Category</th>
                                        <th class="border w-1/6 px-4 py-2">Farmer</th>
                                        <th class="border w-1/6 px-4 py-2">Action</th>
                                        <th class="border w-1/6 px-4 py-2">Accept</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($row1 = mysqli_fetch_assoc($result2)) {
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
                                            echo "<a class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white' id='openPopupBtn'>";
                                            echo "<i class='fas fa-comment'></i>";
                                            echo "</a>";
                                            echo "<a class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500' href=''>";
                                            echo "<i class='fas fa-trash'></i>";
                                            echo "</a>";
                                            echo "</td>";
                                            echo "<td class='border px-4 py-2'>";
                                            // echo "<button class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white fas fa-check' onclick='insertProductView(" . $row1['prod_id'] . ", \"" . $row1['prod_name'] . "\", " . $row1['prod_price'] . ", \"" . $row1['prod_desc'] . "\", " . $row1['prod_quant'] . ", \"" . $row1['prod_cat'] . "\", \"" . $row1['main_img'].")'></button>";
                                            // echo "<button class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white fas fa-check' onclick='insertProductView()'></button>";
                                            ?>
                                            <!-- <button class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white fas fa-check' onclick="insertProductView()"></button>"; -->
                                            <button class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white fas fa-check" onclick="showConfirmation()"></button>
                                            <?php

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
    </div>
</div>

<script>
    // function insertProductView(productId, productName, productPrice, productDescription, productQuantity, productCategory, mainImageName) {
    //     // Prepare the data to send
    //     var data = "product_id=" + productId +
    //                "&product_name=" + encodeURIComponent(productName) +
    //                "&product_price=" + productPrice +
    //                "&product_description=" + encodeURIComponent(productDescription) +
    //                "&product_quantity=" + productQuantity +
    //                "&product_category=" + encodeURIComponent(productCategory) +
    //                "&main_image_name=" + encodeURIComponent(mainImageName);

    //     // Send AJAX request to PHP script
    //     var xhr = new XMLHttpRequest();
    //     xhr.open("POST", "insert_product_view.php", true);
    //     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //     xhr.onreadystatechange = function() {
    //         if (xhr.readyState === XMLHttpRequest.DONE) {
    //             if (xhr.status === 200) {
    //                 // Handle successful response
    //                 console.log(xhr.responseText);
    //             } else {
    //                 // Handle error
    //                 console.error('Error:', xhr.status);
    //             }
    //         }
    //     };
    //     xhr.send(data);
    // }
    
</script>

<script src="./main.js"></script>

<div id="popupForm" class="popup-form">
  <h2>Popup Form</h2>
  <form>
    <!-- Your form fields go here -->
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <button type="submit">Submit</button>
  </form>
</div>

<script>
  // Function to open the popup form
  function openPopup() {
    document.getElementById("popupForm").style.display = "block";
  }

  // Function to close the popup form
  function closePopup() {
    document.getElementById("popupForm").style.display = "none";
  }

  // Event listener for the button click to open the popup form
  document.getElementById("openPopupBtn").addEventListener("click", openPopup);

  // Close the popup form when clicking outside of it
  window.onclick = function(event) {
    var popup = document.getElementById("popupForm");
    if (event.target == popup) {
      popup.style.display = "none";
    }
  }

  function showConfirmation() {
        Swal.fire({
            title: "Are you sure?",
            text: "You want to verified this product!!!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'insert_product_view.php?name=<?php echo $name; ?>&price=<?php echo $price; ?>&description=<?php echo $description; ?>&quan=<?php echo $quan; ?>&cat=<?php echo $cat; ?>&fname=<?php echo $fname; ?>&image=<?php echo $image; ?>'
            }
        });
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
