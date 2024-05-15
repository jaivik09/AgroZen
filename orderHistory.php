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

$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$imagename = $row['ProfileImage'];
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

    <div class="container mx-auto mt-6">
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

            <!-- Card -->
            <div class="mt-4 rounded overflow-hidden shadow bg-white mx-2 w-full">
                <div class="px-6 py-2 border-b border-light-grey">
                    <div class="font-bold text-xl text-center">Order History</div>
                </div>
                <div class="table-responsive">
                    <table class="table text-grey-darkest w-full">
                        <thead class="bg-grey-dark text-white text-normal">
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Fetch orders
                        $sql = "SELECT * FROM orders WHERE billing_name = ?";
                        $stmt = $link->prepare($sql);
                        $stmt->bind_param("s", $row['Name']);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($order = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($order['product_name'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "<td>" . htmlspecialchars($order['quantity'], ENT_QUOTES, 'UTF-8') . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>No Products Bought</td></tr>";
                        }

                        $stmt->close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Card -->

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