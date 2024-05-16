<?php 
    session_start();
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="ownstyles.css" rel="stylesheet">
    <link href="css/my/product_view.css" rel="stylesheet">
    <link href="css/my/product_catalog.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/my/ownstyles1.css" rel="stylesheet">
    <link href="res/images/logo.png" rel="icon">
    

    <!-- <link href="product_view.css" rel="stylesheet"> -->
    <link rel="shortcut icon" href="res/imagesFarmtech.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script
      src="https://example.com/fontawesome/v6.5.1/js/all.js"
      data-auto-a11y="true"
    ></script>
    <title>AgroZen</title>
    <style>
         .large_img{
             width: 400px;  
             height: auto; 
        } 
    </style>
</head>

<body>

<!-- <header>
  <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700" style="background: #3CBC00; position:relative;">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="res/images/logo.png" class="h-8 border border-gray-200 " alt="AgroZen Logo" style=" box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.8); border-radius: 50px; border: 1.5px white solid;"/>
              <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white" style = "font-size: 30px; font-family: Inter; color: white; text-align:center">AgroZen</span>
          </a>
          <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
          </button>
          <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
          <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
              <li>
              <a href="#HOME" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style = "font-size: 22px; font-family: Inter;">HOME</a>
              </li>
              <li>
              <a href="#SERVICES" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style="font-size: 22px; font-family: Inter;">SERVICES</a>
              </li>
              <li>
              <a href="#USER" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style = "font-size: 22px; font-family: Inter;">USERS</a>
              </li>
              <li>
              <a href="#FOOTER" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style = "font-size: 22px; font-family: Inter;">ABOUT US</a>
              </li>
              <li>
              <a href="#" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style = "font-size: 22px; font-family: Inter;">SIGN IN</a>
              </li>
              <li>
              <a href="prod_cart.php" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style = "font-size: 22px; font-family: Inter;"><i class="fa-solid fa-cart-shopping "></i><span id="cart-item" class="badge badge-danger"></span></a>
              </li>
          </ul>
          </div>
      </div>
  </nav>
</header> -->
<?php     
    // echo "Session ID: " . $_SESSION['id']; 
        $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        if(isset($user_id))
        {
            require_once('setheader.php');
        } else {
            require_once('unsetheader.html');
        }
    ?>
    
    
<div class="sidebar">
    <div class="logo-details">
      
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>

      <li>
       <a href="crops.php">
       <i class="fa-regular fa-lemon"></i>
         <span class="links_name">crops</span>
       </a>
       <span class="tooltip">crops</span>
     </li> 
      
      <li>
       <a href="vegetables.php">
       <i class="fa-solid fa-carrot"></i>
         <span class="links_name">Vegetables</span>
       </a>
       <span class="tooltip">Vegetables</span>
     </li>
     <li>
       <a href="fruits.php">
       <i class="fa-solid fa-apple-whole"></i>
         <span class="links_name">Fruits</span>
       </a>
       <span class="tooltip">Fruits</span>
     </li>
     <li>
       <a href="cereals.php">
       <i class="fa-solid fa-pepper-hot"></i>
         <span class="links_name">Cereals</span>
       </a>
       <span class="tooltip">Cereals</span>
     </li>
     <li>
       <a href="pulses.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Pulses</span>
       </a>
       <span class="tooltip">Pulses</span>
     </li>
     <li>
       <a href="fertilizers.php">
       <i class="fa-solid fa-seedling"></i>
         <span class="links_name">Fertilizers</span>
       </a>
       <span class="tooltip">Fertilizers</span>
     </li>  
    </ul>
  </div>


<?php
include_once 'config.php';
$prod_id = isset($_GET['pid']) ? $_GET['pid'] : null;
// SQL query to fetch product data
$sql = "SELECT * FROM product_view WHERE prod_id='$prod_id'";
$result = $connection->query($sql);
$sql2="SELECT * FROM images WHERE id=$prod_id";
$multiple_img=$connection->query($sql2);
?>
<section class="home-section">
<?php while ($row = $result->fetch_assoc()): ?>
    <form action="" class="form-submit" method="POST">
    <div class = "product-div">
        <div class = "product-div-left ">
            <div class = "img-container flex items-center justify-center">
            <img src="uploads/<?php echo $row['main_img']; ?>" alt="" class="large_img">
            </div>
            <div class="flex items-center justify-center">
                <?php while ($row2 = $multiple_img->fetch_assoc()): ?>
                    <div class = "hover-container">
                        <div><img src = "uploads/<?php echo $row2['file_name']; ?>"></div>
                    </div>
                <?php endwhile; ?>
                </div>
        </div>
        <div class = "product-div-right">
            <span class = "product-name"><?php echo $row['prod_name']; ?></span>
            <span class = "product-price">₹ <?php echo $row['prod_price']; ?></span>
            <div class = "product-rating">
                <span><i class = "fas fa-star"></i></span>
                <span><i class = "fas fa-star"></i></span>  
                <span><i class = "fas fa-star"></i></span>
                <span><i class = "fas fa-star"></i></span>
                <span><i class = "fas fa-star-half-alt"></i></span>
                <span>(350 ratings)</span>
            </div>
            <p class = "product-description"><?php echo $row['prod_desc']; ?></p>
           <div>
            <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose quantity:(KG)</label>
<div class="relative flex items-center max-w-[8rem]">
<button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
    </svg>
</button>
<input type="text" name="prod_quantity" id="quantity-input" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="1" required />
<button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
    </svg>
</button>
            </div>
                <input type="hidden" class="pid" value="<?php echo $row['prod_id']; ?>">
                <input type="hidden" class="pname" value="<?php echo $row['prod_name']; ?>">
                <input type="hidden" class="pprice" value="<?php echo $row['prod_price']; ?>">
                <input type="hidden" class="pimage" value="<?php echo $row['main_img']; ?>">
                <input type="hidden" class="pdesc" value="<?php echo $row['prod_desc']; ?>">
                <input type="hidden" class="userid" value="<?php echo $user_id; ?>">
            <div class = "btn-groups">
            <button class=" addItemBtn text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">Add to cart</button>
            <button class=" buyNowBtn text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buy Now</button>
            </div>
           </form>
        </div>
    </div>
</div>

<?php endwhile; ?>

</section>

    <script>
        
const allHoverImages = document.querySelectorAll('.hover-container div img');
const imgContainer = document.querySelector('.img-container');

window.addEventListener('DOMContentLoaded', () => {
    allHoverImages[0].parentElement.classList.add('active');
});

allHoverImages.forEach((image) => {
    image.addEventListener('mouseover', () =>{
        imgContainer.querySelector('img').src = image.src;
        resetActiveImg();
        image.parentElement.classList.add('active');
    });
});

function resetActiveImg(){
    allHoverImages.forEach((img) => {
        img.parentElement.classList.remove('active');
    });
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


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    // Send product details to the server
    $(".addItemBtn").click(function(e) {
        e.preventDefault();
        var addButton = $(this);
        var $form = $(this).closest(".form-submit"); // Corrected to find the closest form
        var productId = $form.find(".pid").val();
        var productName = $form.find(".pname").val();
        var productPrice = $form.find(".pprice").val();
        var productImage = $form.find(".pimage").val();
        var userid = $form.find(".userid").val();
        var productQuantity = $form.find("#quantity-input").val(); // Corrected to get quantity input value
        addButton.prop('disabled', true);

        $.ajax({
            url: 'cart_action.php',
            method: 'post',
            data: {
                checkLogin: true,
                pid: productId,            // Key: Different variable name, Value: Value of the productId variable
                pname: productName,        // Key: Different variable name, Value: Value of the productName variable
                pprice: productPrice,      // Key: Different variable name, Value: Value of the productPrice variable
                pqty: productQuantity,     // Key: Different variable name, Value: Value of the productQuantity variable
                pimage: productImage,
                uid:userid
            },
            success: function(response) {
                if(response === 'loggedIn')
                {
                $("#message").html(response);
                console.log("Success")
                window.scrollTo(0, 0);
                addButton.prop('disabled', false);
                
                // Display alert message based on response
                if (response.trim() === 'Product added to cart successfully.') {
                    // alert('Product added to cart successfully.');
                    Swal.fire("Product added to cart successfully.");
                } else {
                    // alert('Item already added to your cart!');
                    Swal.fire("Item already added to your cart!.");
                }
                
                // Reload the page or perform any other action as needed

                load_cart_item_number();
            }else {
                    // User is not logged in, show popup and redirect to login page
                    // alert('Please login to add products to cart.');
                    // window.location.href = 'login.php';
                    Swal.fire({
                title: 'Not Loged in!!!',
                text: 'Please Login first to add product',
                icon: 'warning'
            }).then(() => {
                window.location.href = 'login.php';
            });

                }
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

<script type="text/javascript">
  $(document).ready(function() {
    // Redirect to checkout page with details of the clicked product
    $(".buyNowBtn").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var productId = $form.find(".pid").val();
        var productName = $form.find(".pname").val();
        var productPrice = $form.find(".pprice").val();
        var productImage = $form.find(".pimage").val();
        var productQuantity = $form.find("#quantity-input").val();

        var userid = $form.find(".userid").val();
        if (!userid) {
            // User is not logged in, show popup and redirect to login page
            Swal.fire({
                title: 'Not Logged in!!!',
                text: 'Please login first to buy the product',
                icon: 'warning'
            }).then(() => {
                window.location.href = 'login.php';
            });
        }
        else {

            // Construct the URL with details of the clicked product
            var url = 'checkout.php?pid=' + encodeURIComponent(productId) +
            '&pname=' + encodeURIComponent(productName) +
            '&pprice=' + encodeURIComponent(productPrice) +
            '&pqty=' + encodeURIComponent(productQuantity) +
            '&pimage=' + encodeURIComponent(productImage);
            
            // Redirect to the checkout page
            window.location.href = url;
        }
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


</body>
</html>