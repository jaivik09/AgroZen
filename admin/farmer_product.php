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

    $result = mysqli_query($link,$sql);
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
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_id'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_name'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_price'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_desc'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_quant'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['prod_cat'] . "</td>";
                                            echo "<td class='border px-4 py-2'>" . $row1['farmer_name'] . "</td>";
                                            echo "<td class='border px-4 py-2'>";
                                            echo "<a class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white' target='_blank' href='../uploads/farmer upload/" . $row1['main_img'] . "'>";
                                            echo "<i class='fas fa-eye'></i>";
                                            echo "</a>";
                                            echo "<a class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white' id='openPopupBtn'>";
                                            echo "<i class='fas fa-comment'></i>";
                                            echo "</a>";
                                            echo "</td>";
                                            echo "<td class='border px-4 py-2'>";
                                            echo "<button class='bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white fas fa-check' onclick='showConfirmation(" . $row1['prod_id'] . ", \"" . $row1['prod_name'] . "\", " . $row1['prod_price'] . ", \"" . $row1['prod_desc'] . "\", " . $row1['prod_quant'] . ", \"" . $row1['prod_cat'] . "\", \"" . $row1['main_img'] . "\", \"" . $row1['farmer_name'] . "\")'></button>";
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
    </div>
</div>

<?php
    // Fetch the product details again
    $sql_prod_det = "SELECT * FROM farmer_add_prod";
    $result_prod_det = mysqli_query($link, $sql_prod_det);
    $prod_det = mysqli_fetch_array($result_prod_det);

    if (isset($_POST['send'])) {
        // Get feedback from the form
        $feedback = $_POST['feedback'];
        $farmer_name = $_POST['farmer_name'];

        // Insert the feedback into the feedback_table using prepared statement
        $sql_insert = "INSERT INTO feedback_table (feedback, farmer_name) VALUES (?, ?)";
        $stmt = mysqli_prepare($link, $sql_insert);
        mysqli_stmt_bind_param($stmt, "ss", $feedback, $farmer_name);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Feedback submitted successfully');</script>";
            exit(); 
        } else {
            echo "Error: " . mysqli_error($link);
        }
    } 
?>

<div id="popupForm" class="hidden fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-blue-50 shadow-md rounded-lg z-50 w-96">
  <button onclick="closePopup()" class="absolute top-4 right-4 text-red-500 hover:text-red-700 focus:outline-none">
    <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M2.293 2.293a1 1 0 011.414 0L10 8.586l6.293-6.293a1 1 0 111.414 1.414L11.414 10l6.293 6.293a1 1 0 01-1.414 1.414L10 11.414l-6.293 6.293a1 1 0 01-1.414-1.414L8.586 10 2.293 3.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
    </svg>
  </button>
  <h1 class="text-center text-xl font-bold mt-8 mb-4">Send Notification</h1>
  <form class="px-8 pb-6" method="post" action="">
    <!-- Add a hidden input field to store the product ID -->
    <input type="hidden" id="farmer_name" name="farmer_name" value="<?php echo $prod_det['farmer_name']; ?>">
    <!-- Feedback textarea -->
    <label for="feedback" class="block mb-2 text-gray-700">Feedback:</label>
    <textarea id="feedback" name="feedback" rows="4" class="w-full p-2 border border-gray-300 rounded mb-4 focus:outline-none focus:ring focus:border-blue-500" required></textarea>
    <!-- Send button -->
    <button class="bg-blue-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500" name="send" value="send" type="send">Send</button>
  </form>
</div>

<script src="./main.js"></script>

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


  </script>

</body>

</html>

<?php
}
else {
    echo "<script>window.location.href = 'login.php';</script>";
}
?>
