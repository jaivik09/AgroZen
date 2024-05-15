<?php
session_start();

// Database connection
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "agrozen";

$link = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if ($link == false) {
    die("Error: Couldn't Connect " . mysqli_connect_error());
}

// Check if admin is logged in
$admin_id = $_SESSION['admin_id'] ?? null;

if ($admin_id) {
    // Fetch admin details
    $id = $_SESSION['admin_id'];
    $sql = "SELECT * FROM admin WHERE admin_id = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    // Fetch farmer products
    $sql1 = "SELECT * FROM farmer_add_prod";
    $result1 = mysqli_query($link, $sql1);

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
    </head>

    <body>
    <!--Container -->
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            <?php include_once 'header.php'; ?>
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->
                <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                    <ul class="list-reset flex flex-col">
                        <li class="w-full h-full py-3 px-2 border-b border-light-border">
                            <a href="index.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                                Dashboard
                                <span><i class="fas fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border">
                            <a href="addevent.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fab fa-wpforms float-left mx-2"></i>
                                Add Event
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border">
                            <a href="upload_product.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fab fa-wpforms float-left mx-2"></i>
                                Add Product
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                            <a href="farmer_product.php" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
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
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Farmer Product Table
                            </div>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                    <tr>
                                        <th class="border w-1/6 px-4 py-2">Product Id</th>
                                        <th class="border w-1/6 px-4 py-2">Product Name</th>
                                        <th class="border w-1/7 px-4 py-2">Price(₹)</th>
                                        <th class="border w-1/6 px-4 py-2">Description</th>
                                        <th class="border w-1/6 px-4 py-2">Quantity(in Kg)</th>
                                        <th class="border w-1/7 px-4 py-2">Category</th>
                                        <th class="border w-1/7 px-4 py-2">Farmer</th>
                                        <th class="border w-1/6 px-4 py-2">Preview</th>
                                        <th class="border w-1/6 px-4 py-2">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        echo "<tr>";
                                        echo "<input type='hidden' id='farmer_name_$row1[prod_id]' value='" . htmlspecialchars($row1['farmer_name'], ENT_QUOTES, 'UTF-8') . "'>";
                                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row1['prod_id'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row1['prod_name'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row1['prod_price'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row1['prod_desc'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row1['prod_quant'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row1['prod_cat'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row1['farmer_name'], ENT_QUOTES, 'UTF-8') . "</td>";
                                        echo "<td class='border px-4 py-2'>";
                                        echo "<a class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white' target='_blank' href='../uploads/farmer upload/" . htmlspecialchars($row1['main_img'], ENT_QUOTES, 'UTF-8') . "'><i class='fas fa-eye'></i></a>";
                                        echo "<a class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white' onclick='openPopup(" . htmlspecialchars($row1['prod_id'], ENT_QUOTES, 'UTF-8') . ")'><i class='fas fa-comment'></i></a>";
                                        echo "</td>";
                                        echo "<td class='border px-4 py-2'>";
                                        echo "<button class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white fas fa-check' onclick='showConfirmation(" . htmlspecialchars($row1['prod_id'], ENT_QUOTES, 'UTF-8') . ", \"" . htmlspecialchars($row1['prod_name'], ENT_QUOTES, 'UTF-8') . "\", " . htmlspecialchars($row1['prod_price'], ENT_QUOTES, 'UTF-8') . ", \"" . htmlspecialchars($row1['prod_desc'], ENT_QUOTES, 'UTF-8') . "\", " . htmlspecialchars($row1['prod_quant'], ENT_QUOTES, 'UTF-8') . ", \"" . htmlspecialchars($row1['prod_cat'], ENT_QUOTES, 'UTF-8') . "\", \"" . htmlspecialchars($row1['main_img'], ENT_QUOTES, 'UTF-8') . "\", \"" . htmlspecialchars($row1['farmer_name'], ENT_QUOTES, 'UTF-8') . "\")'></button>";
                                        echo "<button class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500' onclick='showDelete(" . htmlspecialchars($row1['prod_id'], ENT_QUOTES, 'UTF-8') . ")'> <i class='fas fa-trash'></i> </button>";
                                        echo "</td>";
                                        echo "</tr>";
                                        // Pop-up form
                                        echo "<div id='popupForm_$row1[prod_id]' class='hidden fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-blue-50 shadow-md rounded-lg z-50 w-96'>";
                                        echo "<button onclick='closePopup($row1[prod_id])' class='absolute top-4 right-4 text-red-500 hover:text-red-700 focus:outline-none'>";
                                        echo "<svg class='h-6 w-6 fill-current' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>";
                                        echo "<path fill-rule='evenodd' d='M2.293 2.293a1 1 0 011.414 0L10 8.586l6.293-6.293a1 1 0 111.414 1.414L11.414 10l6.293 6.293a1 1 0 01-1.414 1.414L10 11.414l-6.293 6.293a1 1 0 01-1.414-1.414L8.586 10 2.293 3.707a1 1 0 010-1.414z' clip-rule='evenodd'/>";
                                        echo "</svg>";
                                        echo "</button>";
                                        echo "<h1 class='text-center text-xl font-bold mt-8 mb-4'>Send Notification</h1>";
                                        echo "<center><form class='px-8 pb-6' method='post' action=''>";
                                        echo "<input type='hidden' id='farmer_name' name='farmer_name' value='" . htmlspecialchars($row1['farmer_name'], ENT_QUOTES, 'UTF-8') . "'>";
                                        echo "<input type='hidden' id='prod_name' name='prod_name' value='" . htmlspecialchars($row1['prod_name'], ENT_QUOTES, 'UTF-8') . "'>";
                                        echo "<label for='feedback' class='block text-gray-700'>Feedback:</label>";
                                        echo "<textarea id='feedback' name='feedback' rows='4' class='w-[90%] p-2 border border-gray-300 rounded mb-4 focus:outline-none focus:ring focus:border-blue-500' required></textarea><br>";
                                        echo "<button class='mb-2 bg-blue-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500' name='send' value='send' type='send'>Send</button>";
                                        echo "</form></center>";
                                        echo "</div>";
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

    <?php
    if (isset($_POST['send'])) {
        // Get feedback from the form
        $feedback = $_POST['feedback'];
        $farmer_name = $_POST['farmer_name'] ?? '';
        $prod_name = $_POST['prod_name'] ?? '';

        // Insert the feedback into the feedback_table using prepared statement
        $sql_insert = "INSERT INTO feedback_table (feedback, farmer_name, prod_name) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql_insert);
        mysqli_stmt_bind_param($stmt, "sss", $feedback, $farmer_name, $prod_name);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Feedback submitted successfully');</script>";
            echo "<script>window.location.href = 'farmer_product.php';</script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($link);
        }
    }
    ?>

    <script>
        // Function to open the feedback popup form
        function openPopup(productId) {
            document.getElementById("popupForm_" + productId).style.display = "block";
            var farmerName = document.getElementById('farmer_name_' + productId).value;
            document.getElementById("farmer_name").value = farmerName;
        }

        // Function to close the feedback popup form
        function closePopup(productId) {
            document.getElementById("popupForm_" + productId).style.display = "none";
        }

        function showConfirmation(id, name, price, description, quantity, category, image, farmerName) {
            Swal.fire({
                title: "Are you sure?",
                text: "You want to verify this product!!!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to insert_product_view.php with all the values as parameters
                    window.location.href = 'insert_product_view.php?id=' + id + '&name=' + encodeURIComponent(name) + '&price=' + price + '&description=' + encodeURIComponent(description) + '&quan=' + quantity + '&cat=' + encodeURIComponent(category) + '&fname=' + encodeURIComponent(farmerName) + '&image=' + encodeURIComponent(image);
                }
            });
        }

        function showDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You want to delete this product!!!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to insert_product_view.php with all the values as parameters
                    window.location.href = 'delete_product_view.php?id=' + id;
                }
            });
        }
    </script>

    </body>

    </html>

    <?php
} else {
    echo "<script>window.location.href = 'login.php';</script>";
}
?>
