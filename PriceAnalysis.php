<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Price Analysis</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/my/style.css" rel="stylesheet">
  <link href="css/my/ownstyles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
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
  <div class="flex justify-between items-start w-full gap-8 mt-16 mx-auto max-w-screen-lg">
    <div class="w-2/5">
        <h3 class="text-xl">Select State</h3>
        <div class="flex justify-between mt-2">
            <select id="state-dropdown"
                    class="state-dropdown h-10 w-full outline-none text-lg px-4 border border-gray-300 rounded"></select>
        </div>
        <h3 class="text-xl mt-8">Enter Date</h3>
        <input id="Date-input" class="Date-input h-10 w-full outline-none text-lg px-4 my-4 border border-gray-300 rounded"
               type="date" value="2024-03-12">
        <button type="button"
                class="search-btn px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">Submit
        </button>
    </div>
    <div class="w-3/5">
      <div class="overflow-x-auto">
        <table class="w-full table-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">Product name</th>
              <th scope="col" class="px-6 py-3">Color</th>
              <th scope="col" class="px-6 py-3">Category</th>
              <th scope="col" class="px-6 py-3">Price</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Apple MacBook Pro 17"
              </td>
              <td class="px-6 py-4">Silver</td>
              <td class="px-6 py-4">Laptop</td>
              <td class="px-6 py-4">$2999</td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Microsoft Surface Pro
              </td>
              <td class="px-6 py-4">White</td>
              <td class="px-6 py-4">Laptop PC</td>
              <td class="px-6 py-4">$1999</td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
              <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Magic Mouse 2</td>
              <td class="px-6 py-4">Black</td>
              <td class="px-6 py-4">Accessories</td>
              <td class="px-6 py-4">$99</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <script src="PriceAnalysisScript.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>