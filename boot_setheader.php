<?php 
    $id = $_SESSION['id'];
    $con = mysqli_connect('localhost','root','','agrozen');
    $re = mysqli_query($con,"SELECT ProfileImage FROM users WHERE id=$id");
    $count = mysqli_fetch_array($re);
    $imageName = $count['ProfileImage'];
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border border-gray-200 dark:border-gray-700" style="background: #4CAF50; position:relative;">
        <div class="container-fluid max-w-screen-xl">
            <a href="index.php" class="navbar-brand flex items-center space-x-3 rtl:space-x-reverse">
                <img src="res/images/logo.png" class="h-8 border border-gray-200 rounded-circle" alt="AgroZen Logo" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.8);" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                    style="font-size: 30px; font-family: Inter; color: white;">AgroZen</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-solid-bg"
                aria-controls="navbar-solid-bg" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-solid-bg">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link" style="font-size: 22px; font-family: Inter;">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php#SERVICES" class="nav-link" style="font-size: 22px; font-family: Inter;">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a href="sample_Prod_cat.php" class="nav-link" style="font-size: 22px; font-family: Inter;">PRODUCTS</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php#FOOTER" class="nav-link" style="font-size: 22px; font-family: Inter;">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a href="prod_cart.php" class="nav-link" style="font-size: 22px; font-family: Inter;"><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger"></span></a>
                    </li>
                    <li class="nav-item">
                        <a href="userRole.php" class="nav-link">
                            <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="<?php echo "res/profileImage/".$imageName; ?>" alt="Bordered avatar" style="border-radius: 50px;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
        
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    // Send product details to the server
    $(".addItemBtn").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit"); // Corrected to find the closest form
        var productId = $form.find(".pid").val();
        var productName = $form.find(".pname").val();
        var productPrice = $form.find(".pprice").val();
        var productImage = $form.find(".pimage").val();
        var productQuantity = $form.find("#quantity-input").val(); // Corrected to get quantity input value

        $.ajax({
            url: 'cart_action.php',
            method: 'post',
            data: {
                pid: productId,            // Key: Different variable name, Value: Value of the productId variable
                pname: productName,        // Key: Different variable name, Value: Value of the productName variable
                pprice: productPrice,      // Key: Different variable name, Value: Value of the productPrice variable
                pqty: productQuantity,     // Key: Different variable name, Value: Value of the productQuantity variable
                pimage: productImage 
            },
            success: function(response) {
                $("#message").html(response);
                console.log("Success")
                window.scrollTo(0, 0);
                load_cart_item_number();
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });

    // Load total number of items added to the cart
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

  </script>
