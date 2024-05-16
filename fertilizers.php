<?php 
    session_start();
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/my/style.css" rel="stylesheet">
    <link href="css/my/ownstyles.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/my/product_catalog.css" rel="stylesheet">
    <link rel="shortcut icon" href="res/imagesFarmtech.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/my/ownstyles1.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="res/images/logo.png" rel="icon">
    <title>AgroZen</title>
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
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->

      <li>
       <a href="sample_prod_cat.php">
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

  <section class="home-section">
     <div class="card_comp">

     <?php
include_once 'config.php';

// SQL query to fetch product data
$sql = "SELECT * FROM product_view WHERE prod_cat='fertilizers' ";
$result = $connection->query($sql);
?>
<?php while ($row = $result->fetch_assoc()): ?>
            <form class="form-submit">
                <div class="card w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="sample_prod_view.php?pid=<?php echo $row['prod_id']; ?>&pname=<?php echo $row['prod_name']; ?>&pprice=<?php echo $row['prod_price']; ?>&pqty=undefined&pimage=<?php echo $row['main_img']; ?>">
                        <img class="p-8 rounded-t-lg" src="uploads/<?php echo $row['main_img']; ?>" alt="" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="sample_prod_view.php?pid=<?php echo $row['prod_id']; ?>&pname=<?php echo $row['prod_name']; ?>&pprice=<?php echo $row['prod_price']; ?>&pqty=undefined&pimage=<?php echo $row['main_img']; ?>">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php echo $row['prod_name']; ?></h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <!-- Star ratings -->
                            <!-- Your star rating SVGs -->
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo $row['prod_price']; ?></span>
                            <!-- Hidden inputs for product details -->
                            <input type="hidden" class="pid" value="<?php echo $row['prod_id']; ?>">
                            <input type="hidden" class="pname" value="<?php echo $row['prod_name']; ?>">
                            <input type="hidden" class="pprice" value="<?php echo $row['prod_price']; ?>">
                            <input type="hidden" class="pimage" value="<?php echo $row['main_img']; ?>">
                            <input type="hidden" class="userid" value="<?php echo $user_id; ?>">
                            <!-- Quantity input -->
                            <!-- <input type="number" id="quantity-input" class="quantity" value="1"> -->
                            <!-- Add to cart button -->
                            <button class="addItemBtn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php endwhile; ?>
    
    
     </div> 
  </section>
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

  <script type="text/javascript">
 $(document).ready(function() {
    // Redirect to sample_prod_view.php with prod_id
    $(".addItemBtn").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var productId = $form.find(".pid").val();
        var productName = $form.find(".pname").val();
        var productPrice = $form.find(".pprice").val();
        var productImage = $form.find(".pimage").val();
        var productQuantity = $form.find("#quantity-input").val();

        // Construct the URL with details of the clicked product and prod_id
        var url = 'sample_prod_view.php?pid=' + encodeURIComponent(productId) +
                  '&pname=' + encodeURIComponent(productName) +
                  '&pprice=' + encodeURIComponent(productPrice) +
                  '&pqty=' + encodeURIComponent(productQuantity) +
                  '&pimage=' + encodeURIComponent(productImage);

        // Redirect to the sample_prod_view.php
        window.location.href = url;
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