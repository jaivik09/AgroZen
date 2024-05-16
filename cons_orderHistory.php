<?php
session_start();
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "agrozen";
$link = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if ($link === false) {
    die("Error: Couldn't connect. " . mysqli_connect_error());
}

$id = $_SESSION['id'] ?? null;
if ($id === null) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$imagename = $user['ProfileImage'];
$stmt->close();

// Fetch orders
$sql = "SELECT * FROM orders WHERE ordered_by = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("s", $user['Name']);
$stmt->execute();
$orders = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/my/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link rel="stylesheet" href="css/my/ownstyles1.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./admin/dist/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="res/images/logo.png" rel="icon">
    <title>AgroZen™</title>
</head>
<body class="font-['Inter']">
    <?php
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
    if ($user_id) {
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
                    <a href="cons_orderHistory.php">
                        <li class="mt-3 text-xl text-white bg-[#4CAF50] text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                            Order History
                        </li>
                    </a>
                    <!-- <a href="wishlist.html">
                        <li class="mt-3 text-xl text-white bg-[#4CAF50] text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                            Wishlist
                        </li>
                    </a> -->
                    <a href="sample_Prod_cat.php">
                        <li class="mt-3 text-xl text-white bg-[#4CAF50] text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                            Buy Product
                        </li>
                    </a>
                    <a href="con_display_reg_events.php">
                        <li class="mt-3 text-xl text-white bg-[#4CAF50] text-center py-3 rounded-[10px] hover:bg-[#2e7d32]">
                            Regisetered Events
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
    <div class="w-[70%]">
        <div class="col-lg-8 mt-8 mr-8">
            <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                <!-- Orders List -->
                <div class="w-full bg-white shadow-sm rounded-md border border-gray-300">
                    <div class="border-b border-gray-900 px-4 py-3">
                        <h3 class="font-medium text-3xl"><i class="far fa-clone pr-1"></i> Order History</h3>
                    </div>
                    <div class="px-6 py-4">
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Product Name</th>
                                    <th class="px-4 py-2">Quantity</th>
                                    <th class="px-4 py-2">Address</th>
                                    <th class="px-4 py-2">Phone No.</th>
                                    <th class="px-4 py-2">Payment ID</th>
                                    <th class="px-4 py-2">Billing Name</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($orders->num_rows > 0): ?>
                                <?php while ($order = $orders->fetch_assoc()): ?>
                                    <tr>
                                        <td class="border px-4 py-2"><?php echo htmlspecialchars($order['product_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="border px-4 py-2"><?php echo htmlspecialchars($order['quantity'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="border px-4 py-2"><?php echo htmlspecialchars($order['address'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="border px-4 py-2"><?php echo htmlspecialchars($order['phone_no'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="border px-4 py-2"><?php echo htmlspecialchars($order['rpay_order_id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="border px-4 py-2"><?php echo htmlspecialchars($order['billing_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="border px-4 py-2 text-center">No Products Bought</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

<footer class="w-full fixed bottom-0 left-0" id="FOOTER">
    <div id="FOOTER">
        <div class="bg-[#4CAF50] text-white text-3xl font-medium py-2 px-2">
            <p>LET'S GET CONNECTED</p>
        </div>
        <div class="bg-gray-300 text-center">
            <p class="text-sm text-gray-900 sm:text-center dark:text-gray-900 my-0 leading-normal">
                © 2024 <a href="indexal.html" class="hover:underline">AgroZen™</a>. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
