<?php 
    session_start();
?>
<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="style.css" rel="stylesheet">
    <link href="ownstyles.css" rel="stylesheet">
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/my/upload_product.css" />
    <link rel="shortcut icon" href="res/imagesFarmtech.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="css/my/ownstyles1.css" rel="stylesheet">
    <link href="res/images/logo.png" rel="icon">
    <style>
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            color: white;
            z-index: 1000; /* Ensure the header stays on top */
        }
        .container {
        width: 700px !important; /* Adjusted width with !important */
        margin-top: 50px !important;
        padding: 20px !important;
        position: relative;
    }
        .add{
            
            font-size:30px;
        }
        body{
            display: flex;
            flex-direction: column;
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
            $db_server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $db_name = "agrozen";
            $link = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
            if($link == false)
            {
                die("Error : Couldn't Connect ". mysqli_connect_error());
            }
            // $id = $_SESSION['id'];
            $sql = "SELECT * FROM users WHERE id = $user_id";
        
            $result =mysqli_query($link,$sql);
            $row = mysqli_fetch_array($result);

            require_once('setheader.php');
        } else {
            require_once('unsetheader.html');
        }
    ?>
    <!-- <div class="container">
      <div class="add" align="center">Add Product</div>
      <form action="upload.php" method="post" enctype="multipart/form-data" class="form">

      <div class="input-box">
          <label class="block mb-2 text-sm font-medium text-#3CBC00-900 dark:text-white">Product ID</label>
          <input type="text" name="pid" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter product id" required />
        </div>

        <div class="input-box">
          <label class="block mb-2 text-sm font-medium text-#3CBC00-900 dark:text-white">Product Name</label>
          <input type="text" name="pname" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter product name" required />
        </div>

        <div class="input-box">
          <label for="message" class="  block mb-2 text-sm font-medium text-#3CBC00-900 dark:text-white">Product Description</label>
           <textarea id="message" name="pdes" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
        </div>

          <div class="input-box">
          <label for="price" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
          <input type="text" name="pprice" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter Price" required />
          </div>

          <div class="input-box">
          <label for="quant" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product quantity</label>
          <input type="text" name="pquant" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter quantity" required />
          </div>

          <div class="input-box">
          <label for="categories" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Category</label>
  <select name="pcategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Choose a category</option>
    <option value="crops">crops</option>
    <option value="vegetables">vegetables</option>
    <option value="fruits">fruits</option>
    <option value="cereals">cereals</option>
    <option value="Pulses">Pulses</option>
    <option value="fertilizers">fertilizers</option>
    <option value="pesticides">pesticides</option>
    
  </select>
          </div>

          <div class="input-box">
          <label class=" label block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Main Image</label>
            <input type="file" name="main_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" required>
            </div>

            <div class="input-box">
          <label class=" label block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">More Images</label>
            <input type="file" name="extra_images[]"  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help"   multiple>
            </div>
            <input type="hidden" name="farmer" class="farmer_name" value="<?php //echo $row['Name']; ?>">
            
            <div class="sub_but">
            <input type="submit" name="submit" value="submit" class="sub">
            </div>   
      </form>
</div>
  </body>
</html> -->

  <div class="mt-[50px] align-middle">
    <div class="md:grid md:grid-cols-2 md:gap-6">
    
      <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first_name" class="block text-sm font-medium text-gray-700">Product Id</label>
                  <input type="text" name="pid" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="last_name" class="block text-sm font-medium text-gray-700">Product name</label>
                  <input type="text" name="pname" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6">
                  <!-- <label for="email_address" class="block text-sm font-medium text-gray-700">Product Description</label>
                  <input type="text" name="pdes" id="email_address" autocomplete="email" class="mt-1 p-6 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> -->
                  
                  <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                  <textarea id="message" rows="4" name="pdes" class="block p-2 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" ></textarea>

                </div>

                <div class="col-span-6 sm:col-span-3 ">
                  <label for="state" class="block text-sm font-medium text-gray-700">Product Price</label>
                  <input type="text" name="pprice" id="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="postal_code" class="block text-sm font-medium text-gray-700">Product Quality</label>
                  <input type="text" name="pquant" id="postal_code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <!-- <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                  <input type="text" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div> -->

                <div class="col-span-6 sm:col-span-3">
                  <label for="country" class="block text-sm font-medium text-gray-700">Select Category</label>
                  <select id="country" name="pcategory" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option selected>Choose a category</option>
                  <option value="crops">crops</option>
                  <option value="vegetables">vegetables</option>
                  <option value="fruits">fruits</option>
                  <option value="cereals">cereals</option>
                  <option value="Pulses">Pulses</option>
                  <option value="fertilizers">fertilizers</option>
                  <option value="pesticides">pesticides</option>
                  </select>
                </div>

                <div class="col-span-6">
                <label class=" label block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Main Image</label>
              <input type="file" name="main_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" required>
              </div>

                
              </div>
            </div>
            <input type="hidden" name="farmer" class="farmer_name" value="<?php echo $row['Name']; ?>">
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" name="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Add
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  </body>
</html>