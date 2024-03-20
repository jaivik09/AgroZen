<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Price Analysis</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/my/style.css" rel="stylesheet">
  <link href="css/my/ownstyles1.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="PriceAnanlysisScript.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <link href="res/images/logo.png" rel="icon">
</head>

<body class="bg-[#E3F2FD]">
  <?php 
    session_start();    
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
    if(isset($user_id)) {
        require_once('setheader.php');
    } else {
        require_once('unsetheader.html');
    }
  ?>
  <div class="flex flex-col md:flex-row justify-between gap-[30px] p-[30px]">
    <div class="w-full md:w-[550px] md:order-1">
      <h3 class="text-xl">Select State</h3>
      <div class="flex justify-between mt-2">
        <select id="state-dropdown"
                class="state-dropdown h-10 w-full outline-none text-lg px-4 border border-gray-300 rounded"></select>
      </div>
      <h3 class="text-xl mt-8">Enter Date</h3>
      <input id="Date-input" class="Date-input h-10 w-full outline-none text-lg px-4 my-4 border border-gray-300 rounded"
             type="date">
      <button type="button"
              class="search-btn px-5 py-3 text-base font-medium text-center text-white bg-[#4CAF50] rounded-lg hover:bg-[#2e7d32] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">Submit
      </button>
    </div>
    <div class="table-head w-full md:w-full md:order-2">
      <div class="overflow-x-auto">
        <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 text-center">
          <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">Image</th>
              <th scope="col" class="px-6 py-3">Vegetable</th>
              <th scope="col" class="px-6 py-3">Wholesale Price(₹)</th>
              <th scope="col" class="px-6 py-3">Retail Price(₹)</th>
              <th scope="col" class="px-6 py-3">Shopping Mall(₹)</th>
            </tr>
          </thead>
          <tbody class="table-body">
            <!-- js -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>
