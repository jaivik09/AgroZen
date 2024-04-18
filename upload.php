<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <!-- Your HTML content goes here -->
</body>
</html>

<?php
// Include the database configuration file
include_once 'config.php';

if(isset($_POST['pid']) && isset($_POST['pname']) && isset($_POST['pdes']) && isset($_POST['pprice']) && isset($_POST['pcategory']) && isset($_POST['pquant']) && isset($_POST['submit']) && isset($_POST['farmer'])){ 
    // File upload configuration 
    $targetDir = "uploads/farmer upload/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 

    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pdes = $_POST['pdes'];
    $pprice = $_POST['pprice'];
    $pcategory = $_POST['pcategory'];
    $pquant = $_POST['pquant'];
    $farmer_name = $_POST['farmer'];


    $checkProductSQL = "SELECT * FROM farmer_add_prod WHERE prod_id = '$pid' AND farmer_name = '$farmer_name'";
    $resultCheckProduct = mysqli_query($connection, $checkProductSQL);
    if(mysqli_num_rows($resultCheckProduct) > 0) {
        echo "<script>
                swal({
                    title: 'Warning!',
                    text: 'Product ID already exists. Please choose a different Product ID.',
                    icon: 'warning',
                    button: 'OK'
                }).then((result) => {
                    if (result) {
                        window.location.href = 'upload_product.php';
                    }
                });
              </script>";
    } else {

         // Upload main image
    if(!empty($_FILES['main_image']['name'])) {
        $mainImageName = basename($_FILES['main_image']['name']);
        $mainImageTargetPath = $targetDir . $mainImageName;
        $mainImageFileType = pathinfo($mainImageTargetPath, PATHINFO_EXTENSION);

        if(in_array($mainImageFileType, $allowTypes)){
            if(move_uploaded_file($_FILES['main_image']['tmp_name'], $mainImageTargetPath)){
                // Insert main image file name into database
                $insertProductSQL = "INSERT INTO farmer_add_prod (prod_id, prod_name, prod_price, prod_desc, prod_quant, prod_cat,main_img,farmer_name) VALUES ('$pid', '$pname', '$pprice', '$pdes', '$pquant', '$pcategory', '$mainImageName','$farmer_name')";
                $resultProduct = mysqli_query($connection, $insertProductSQL);
                if($resultProduct) {
                    echo "<script>
                            swal({
                                title: 'success!',
                                text: 'Product added successfully',
                                icon: 'success',
                                button: 'OK'
                            }).then((result) => {
                                if (result) {
                                    window.location.href = 'userRole.php';
                                }
                            });
                          </script>";
                }
            }
        }
    }

    // Upload extra images
    $errorUpload = $errorUploadType = '';
    if(!empty($_FILES['extra_images']['name'])){
        foreach($_FILES['extra_images']['name'] as $key => $extraImageName){
            $extraImageTargetPath = $targetDir . basename($extraImageName);
            $extraImageFileType = pathinfo($extraImageTargetPath, PATHINFO_EXTENSION);

            if(in_array($extraImageFileType, $allowTypes)){
                if(move_uploaded_file($_FILES['extra_images']['tmp_name'][$key], $extraImageTargetPath)){
                    // Insert extra image file name into database
                    $insertExtraImageSQL = "INSERT INTO images (id,file_name, uploaded_on) VALUES ($pid,'$extraImageName', NOW())";
                    $resultExtraImage = mysqli_query($connection, $insertExtraImageSQL);
                  
                } else {
                    $errorUpload .= $extraImageName . ' | ';
                }
            } else {
                $errorUploadType .= $extraImageName . ' | ';
            }
        }
    }
       
    }

   

    // Insert product details into product_view table
   
//     // Handle errors
//     if($resultProduct && $resultMainImage && $resultExtraImage){
//         $statusMsg = "Product details and images uploaded successfully.";
//     } else {
//         $statusMsg = "Sorry, there was an error uploading product details or images.";
//     }
// } else {
//     $statusMsg = 'Please fill all the fields.';
// }

// Display status message
}
else{
    echo 'error in adding.....';
}
?>