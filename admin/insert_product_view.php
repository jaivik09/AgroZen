<?php
// Include the database configuration file
include_once 'config.php';

// Initialize error message variable
$errorUpload = '';

if(isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_description']) && isset($_POST['product_quantity']) && isset($_POST['product_category']) && isset($_POST['main_image_name']) && isset($_POST['extra_image_names'])){ 
    // Extract data from POST variables
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productDescription = $_POST['product_description'];
    $productPrice = $_POST['product_price'];
    $productCategory = $_POST['product_category'];
    $productQuantity = $_POST['product_quantity'];
    $mainImageName = $_POST['main_image_name'];
    $extraImageNames = explode(',', $_POST['extra_image_names']); // Convert string to array

    // Insert main product details into the database
    $insertProductSQL = "INSERT INTO product_view (prod_id, prod_name, prod_price, prod_desc, prod_quant, prod_cat, main_img) VALUES ('$productId', '$productName', '$productPrice', '$productDescription', '$productQuantity', '$productCategory', '$mainImageName')";
    $resultProduct = mysqli_query($connection, $insertProductSQL);

    if($resultProduct) {
        // Insert extra images into the database
        foreach($extraImageNames as $extraImageName) {
            $insertExtraImageSQL = "INSERT INTO images (id, file_name, uploaded_on) VALUES ('$productId', '$extraImageName', NOW())";
            $resultExtraImage = mysqli_query($connection, $insertExtraImageSQL);
            if(!$resultExtraImage) {
                $errorUpload .= $extraImageName . ' | ';
            }
        }
    } else {
        // Handle error if main product insertion fails
        $errorUpload .= 'Error inserting main product details: ' . mysqli_error($connection);
    }
}

// Output any errors
echo $errorUpload;
?>
