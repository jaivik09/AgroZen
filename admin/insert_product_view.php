<?php      
/*session_start();

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "agrozen";
$link = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
if($link == false)
{
    die("Error : Couldn't Connect ". mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from POST request
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productDescription = $_POST['product_description'];
    $productQuantity = $_POST['product_quantity'];
    $productCategory = $_POST['product_category'];
    $mainImageName = $_POST['main_image_name'];

    $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : null;
    
    // Insert data into product_view table
    $sql = "INSERT INTO product_view (prod_id, prod_name, prod_price, prod_desc, prod_quant, prod_cat, main_img) 
            VALUES ('$productId', '$productName', '$productPrice', '$productDescription', '$productQuantity', '$productCategory', '$mainImageName')";
    
    if (mysqli_query($link, $sql)) {
        echo "Product accepted and added to view!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($link); */

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration</title>
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Your other head elements (stylesheets, etc.) go here -->
</head>
<?php 
  /*  session_start();
    
    $productName = isset($_GET['name']) ? $_GET['name'] : null;
    $productPrice = isset($_GET['price']) ? $_GET['price'] : null;
    $productDescription = isset($_GET['description']) ? $_GET['description'] : null;
    $productQuantity = isset($_GET['quan']) ? $_GET['quan'] : null;
    $productCategory = isset($_GET['cat']) ? $_GET['cat'] : null;
    $fname = isset($_GET['fname']) ? $_GET['fname'] : null;
    $mainImageName = isset($_GET['image']) ? $_GET['image'] : null;
    $con = mysqli_connect('localhost','root','','agrozen');

    $sql = "INSERT INTO product_view (prod_name, prod_price, prod_desc, prod_quant, prod_cat, main_img) 
            VALUES ('$productName', '$productPrice', '$productDescription', '$productQuantity', '$productCategory', '$mainImageName')";
   
   $result = mysqli_query($con,$sql);
   if($sql)
   {

       echo "<script>
       document.addEventListener('DOMContentLoaded', function() {
           swal({
               title: 'Success',
               text: 'Product Added successfully!!!!',
               icon: 'success'
            }).then(() => {
                window.location.href = 'farmer_product.php';
            });
        });
        </script>";

        
    }
    else {

    }
// } else {
//    echo "<script>swal('Error!!!!','Something Happened Try Again!!!!','error');</script>";;
// } */

     
session_start();

// Check if all necessary parameters are set
if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['price']) && isset($_GET['description']) && isset($_GET['quan']) && isset($_GET['cat']) && isset($_GET['fname']) && isset($_GET['image'])) {
    // Retrieve data from GET request
    $productId = $_GET['id'];
    $productName = $_GET['name'];
    $productPrice = $_GET['price'];
    $productDescription = $_GET['description'];
    $productQuantity = $_GET['quan'];
    $productCategory = $_GET['cat'];
    $farmerName = $_GET['fname'];
    $mainImageName = $_GET['image'];

    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'agrozen');

    // Insert data into product_view table
    $sql = "INSERT INTO product_view (prod_name, prod_price, prod_desc, prod_quant, prod_cat, main_img) 
            VALUES ('$productName', '$productPrice', '$productDescription', '$productQuantity', '$productCategory', '$mainImageName')";
   
    $result = mysqli_query($con, $sql);

    // Check if the insertion was successful
    if($result) {
        $delete = "DELETE FROM farmer_add_prod WHERE prod_id = '$productId'";
        $result2 = mysqli_query($con,$delete);
        // Display success message using SweetAlert and redirect back to the farmer_product.php page
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Success',
                        text: 'Product added successfully!',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = 'farmer_product.php';
                    });
                });
            </script>";
    } else {
        // Display error message using SweetAlert
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Error',
                        text: 'Something went wrong. Please try again!',
                        icon: 'error'
                    });
                });
            </script>";
    }
} else {
    // If any necessary parameter is missing, display an error message
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Error',
                    text: 'Missing parameters!',
                    icon: 'error'
                });
            });
        </script>";
}


?>
    

