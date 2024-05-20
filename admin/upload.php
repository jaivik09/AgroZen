<?php
// Include the database configuration file
include_once 'config.php';

if(isset($_POST['pid']) && isset($_POST['pname']) && isset($_POST['pdes']) && isset($_POST['pprice']) && isset($_POST['pcategory']) && isset($_POST['pquant']) && isset($_POST['submit'])){ 
    // File upload configuration 
    $targetDir = "../uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 

    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pdes = $_POST['pdes'];
    $pprice = $_POST['pprice'];
    $pcategory = $_POST['pcategory'];
    $pquant = $_POST['pquant'];

    // Upload main image
    if(!empty($_FILES['main_image']['name'])) {
        $mainImageName = basename($_FILES['main_image']['name']);
        $mainImageTargetPath = $targetDir . $mainImageName;
        $mainImageFileType = pathinfo($mainImageTargetPath, PATHINFO_EXTENSION);

        if(in_array($mainImageFileType, $allowTypes)){
            if(move_uploaded_file($_FILES['main_image']['tmp_name'], $mainImageTargetPath)){
                // Insert main image file name into database
                $insertProductSQL = "INSERT INTO product_view (prod_id, prod_name, prod_price, prod_desc, prod_quant, prod_cat,main_img) VALUES ('$pid', '$pname', '$pprice', '$pdes', '$pquant', '$pcategory', '$mainImageName')";
                $resultProduct = mysqli_query($connection, $insertProductSQL);
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
?>
<!-- 
<script>
    window.localhref
</script> -->