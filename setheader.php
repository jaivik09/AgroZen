<?php 
    $id = $_SESSION['id'];
    $con = mysqli_connect('localhost','root','','agrozen');
    $re = mysqli_query($con,"SELECT ProfileImage FROM users WHERE id=$id");
    $count = mysqli_fetch_array($re);
    $imageName = $count['ProfileImage'];
?>
<header>
            <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                style="background: #4CAF50; position:relative;">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="res/images/logo.png" class="h-8 border border-gray-200 " alt="AgroZen Logo"
                            style=" box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.8); border-radius: 50px; border: 1.5px white solid;" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                            style="font-size: 30px; font-family: Inter; color: white;">AgroZen</span>
                    </a>
                    <button data-collapse-toggle="navbar-solid-bg" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-solid-bg" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                        <ul
                            class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                            <li>
                                <a href="index.php"
                                    class="nav-item"
                                    style="font-size: 22px; font-family: Inter;">HOME</a>
                            </li>
                            <li>
                                <a href="index.php#SERVICES"
                                    class="nav-item"
                                    style="font-size: 22px; font-family: Inter;">SERVICES</a>
                            </li>
                            <li>
                                <a href="sample_Prod_cat.php"
                                    class="nav-item"
                                    style="font-size: 22px; font-family: Inter;">PRODUCTS</a>
                            </li>
                            <li>
                                <a href="index.php#FOOTER"
                                    class="nav-item"
                                    style="font-size: 22px; font-family: Inter;">ABOUT US</a>
                            </li>
                            <li>
                                <a href="prod_cart.php">
                                <a href="prod_cart.php" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style = "font-size: 22px; font-family: Inter;"><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger"></span></a>
                                </a>
                            </li>
                            <li>
                                <a href="userRole.php">
                                    <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                                    src="<?php echo "res/profileImage/".$imageName; ?>" alt="Bordered avatar" style="border-radius: 50px;">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

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