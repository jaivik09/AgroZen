<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration</title>
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Your other head elements (stylesheets, etc.) go here -->
</head>
<?php 
session_start();

// Check if all necessary parameters are set
if(isset($_GET['id'])) {
    // Retrieve data from GET request
    $productId = $_GET['id'];
    
    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'agrozen');

    // Retrieve the filename of the image associated with the product
    $sql_select_image = "SELECT main_img FROM farmer_add_prod WHERE prod_id = '$productId'";
    $result_select_image = mysqli_query($con, $sql_select_image);
    $row = mysqli_fetch_assoc($result_select_image);
    $imageFilename = $row['main_img'];

    // Delete the product from the database
    $sql_delete_product = "DELETE FROM farmer_add_prod WHERE prod_id = '$productId' ";
    $result_delete_product = mysqli_query($con, $sql_delete_product);

    // Check if the deletion was successful
    if($result_delete_product) {
        // Delete the image file from the folder
        $imagePath = '../uploads/farmer upload/' . $imageFilename;
        if(file_exists($imagePath)) {
            unlink($imagePath);
        }
       
        // Display success message using SweetAlert
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal({
                        title: 'Success',
                        text: 'Product deleted successfully!',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = 'farmer_product.php'; // Redirect to farmer_product.php
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
