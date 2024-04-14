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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from POST request
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productDescription = $_POST['product_description'];
    $productQuantity = $_POST['product_quantity'];
    $productCategory = $_POST['product_category'];
    $mainImageName = $_POST['main_image_name'];
    
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

mysqli_close($link);
?>
