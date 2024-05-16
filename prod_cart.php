<?php
  session_start();
//   if (isset($_SESSION['productDetails'])) {
//     $productDetails = $_SESSION['productDetails'];
//     // You can access $productDetails['productId'], $productDetails['productName'], etc.

//     // Here, you can use the $productDetails array to display the product information
//     $productId = $productDetails['productId'];
//     $productName = $productDetails['productName'];
//     $productPrice = $productDetails['productPrice'];
//     $productImage = $productDetails['productImage'];
//     $productQuantity = $productDetails['productQuantity'];

//     // Display the product information
//     echo "<div>";
//     echo "<h2>Product Details</h2>";
//     echo "<p>Product ID: $productId</p>";
//     echo "<p>Product Name: $productName</p>";
//     echo "<p>Price: $productPrice</p>";
//     echo "<p>Quantity: $productQuantity</p>";
//     echo "<img src='$productImage' alt='Product Image'>";
//     echo "</div>";

//     // Optionally, you can remove the stored product details from the session after displaying them
//     // unset($_SESSION['productDetails']);
// } else {
//     echo "<p>No product details available.</p>";
//     // Proceed with your usual database fetching mechanism or display an error message
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Sahil Kumar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' /> -->
    <link href="css/my/style.css" rel="stylesheet">
    <link href="css/my/product_view.css" rel="stylesheet">
    <link href="css/my/product_catalog.css" rel="stylesheet">
    <link rel="shortcut icon" href="res/imagesFarmtech.jpg" type="image/x-icon">
    <link href="css/my/ownstyles1.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
     -->
    <link href="res/images/logo.png" rel="icon">
    <script
      src="https://example.com/fontawesome/v6.5.1/js/all.js"
      data-auto-a11y="true"
    ></script>
</head>

<body>
  
<?php     
    // echo "Session ID: " . $_SESSION['id']; 
        $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        if(isset($user_id))
        {
            require_once('boot_setheader.php');
        } else {
            require_once('unsetheader.html');
        }
    ?>
    
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
          echo $_SESSION['showAlert'];
        } else {
          echo 'none';
        } unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong><?php if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
        } unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-info m-0">Products in your cart!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a href="cart_action.php?clear=all" class="badge-danger badge p-1" onclick="return confirmClearCart();"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'config.php';
                $stmt = $connection->prepare('SELECT * FROM cart WHERE user_id = ?');
                $stmt->bind_param('i', $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="uploads/<?php echo $row['product_image']; ?>" width="50"></td>
                <td><?= $row['product_name'] ?></td>
                <td>
                  <i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;">
                </td>
                <td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
                <td>
                  <!-- <a href="cart_action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirmRemoveItem();"><i class="fas fa-trash-alt"></i></a> -->
                  <a href="#" class="text-danger lead" onclick="return confirmRemoveItem(<?= $row['id'] ?>);"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="sample_Prod_cat.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
// Close the statement
$stmt->close();
?>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'cart_action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'cart_action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });

  function confirmClearCart() {
    Swal.fire({
        title: "Are you sure?",
        text: "You want to remove all the items!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with clearing the cart
            window.location.href = 'cart_action.php?clear=all';
        }
    });
    // Prevent default link behavior
    return false;
}

function confirmRemoveItem(itemId) {
    Swal.fire({
        title: "Are you sure?",
        text: "You want to remove this item!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with removing the item
            window.location.href = 'cart_action.php?remove=' + itemId;
        }
    });

    // Prevent default link behavior until user confirms
    return false;
}

  </script>

<script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");
  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });
  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });
  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
</body>

</html>