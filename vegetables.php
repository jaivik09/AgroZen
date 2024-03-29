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
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/my/product_catalog.css" rel="stylesheet">
    <link rel="shortcut icon" href="res/imagesFarmtech.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/my/ownstyles1.css" rel="stylesheet">
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
       <<i class="fa-solid fa-seedling"></i>
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
$sql = "SELECT * FROM product_view WHERE prod_cat='vegetables' ";
$result = $connection->query($sql);
?>
<?php while ($row = $result->fetch_assoc()): ?>    
<div class=" card w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
    <a href="sample_prod_view.php?prod_id=<?php echo $row['prod_id']; ?>">
        <img class="p-8 rounded-t-lg" src="uploads/<?php echo $row['main_img']; ?>" alt="" />
    </a>
    <div class="px-5 pb-5">
        <a href="sample_prod_view.php?prod_id=<?php echo $row['prod_id']; ?>">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php echo $row['prod_name']; ?></h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
            </div>
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo $row['prod_price']; ?></span>
            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to cart</a>
        </div>
    </div>
</div>
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


<footer>
        <div class="footer-container" id="FOOTER" data-aos="fade-up">
            <div class="footer-head">
                <p>LETS GET CONNECTED</p>
                <div class="footer-icon">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-square-google-plus"></i>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>
            <div class="footer-tail">
                <div class="fixed bottom-0 left-0 z-20 w-full p-2 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
                    <p class="text-sm text-gray-900 sm:text-center dark:text-gray-900">© 2024 <a href="index.html" class="hover:underline">AgroZen™</a>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>