<?php 
    session_start();
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
    if(isset($user_id))
    {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> 
    <link href="css/my/ownstyles1.css" rel="stylesheet">
    <link rel="stylesheet" href="css/my/font.css"/>    
    <link href="css/my/style.css" rel="stylesheet">
    <link href="res/images/logo.png" rel="icon">
    <title> Events </title>

    <style>
        body,
    html {
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    .bx {
      margin-left: 14%;
      margin-top: 4.8%;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .card {
        height: 75vh;
        width: 65vh;
    }
    .card-image {
        height: 35vh;
        width: 70vh;
    }
    .description {
    max-height: 20vh; /* Set the maximum height for the description */
    overflow-y: auto; /* Enable vertical scrolling when content exceeds the height */
    }
    .myfont {
        
    }
    .card-button {
        background-color: #FF5722;
        width: 35%;
    }
    .card-button:hover {
    background-color:   #FF7043;
    
    transform: scale(1.1);
    transition: all 0.3s ease-in-out;
    }
    .btn {
      background-color: #3CBC00;
      margin-top : 18%;
    }

    .icon {
      color: #eee;
    }

    .btn:hover {
      background-color: aliceblue;
      border: 2px solid #3CBC00;

      .icon {
        color: #3CBC00;
        width: 100px;
        height: 100px;
      }
    }

    /* Add a specific class to handle mobile view styles */
    @media (max-width: 768px) {
    .bx {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .w-full {
        width: 100% !important;
    }

    .card {
        width: calc(50% - 20px);
        margin: 10px;
    }
}

    </style>
</head>
<body>
 <?php 
 require_once('setheader.php');
        // session_start();    
        // // echo "Session ID: " . $_SESSION['id']; 
        //     $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        //     if(isset($user_id))
        //     {
        //         require_once('setheader.php');
        //     } else {
        //         require_once('unsetheader.html');
        //     }
        ?> 

<?php 
    $con = mysqli_connect('localhost','root','','agrozen');

    // Check if a page parameter is set in the URL, default to 1 if not set
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Calculate the offset based on the current page
    $offset = ($page - 1) * 2; // Each page shows 2 events

    // Fetch events from the database with pagination
    $query = "SELECT * FROM events LIMIT 2 OFFSET $offset";
    $re = mysqli_query($con,$query);
    $events = mysqli_fetch_all($re, MYSQLI_ASSOC);

    $result = mysqli_query($con, "SELECT COUNT(*) AS total_rows FROM events");
    $row = mysqli_fetch_assoc($result);    
    // Get the total number of rows from the fetched result
    $total_rows = $row['total_rows'];
    $total_page = $total_rows/2;

    if($page == 1) 
    {
        $prev_page = $total_page;
    } else {
        $prev_page = $page - 1;
    }

    if($page == $total_page) 
    {
        $next_page = 1;
    } else {
        $next_page = $page + 1;
    }

    
?>

<!-- Slider -->
<div id="indicators-carousel" class="relative w-full slider1" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-4/5 rounded-lg md:h-4/5 shadow-lg">
        <div class="hidden  ease-in-out bx content-between transition-all duration-700 hover:scale-110  " data-carousel-item="active">
            <div class="flex space-x-4 ">
                <?php foreach ($events as $event): ?>
                    <div class="w-1/2 w-50 h-8 ">
                        <div class=" card max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg ">
                            <a href="#">
                                <img class="card-image rounded-t-lg" src="<?php echo "res/eventImage/".$event['Image']; ?>" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><?php echo $event['Title']; ?></h5>
                                </a>
                                <p class=" description mb-3 font-normal text-gray-700 "><?php echo $event['Description']; ?></p>
                                <a href="event_details.php?event_id=<?php echo $event['id']; ?>&user_id=<?php echo $user_id; ?>" name="event-register" class="card-button inline-flex items-center px-3 py-2 text-md font-medium text-center text-white rounded-lg">
    Register
    
</a>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Slider controls -->
        <a href="?page=<?php echo $prev_page; ?>" class="absolute inline-flex items-center justify-center w-10 h-10 px-4 cursor-pointer btn group focus:outline-none  rounded-full" style="left: 10px; top: 80%;">
            <svg class="w-5 h-5  hover:w-5 hover:h-5 text-white icon rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>    
        </a>

    <a href="?page=<?php echo $next_page; ?>" class="absolute top-0 end-0 z-30 flex items-center justify-center w-10 h-10 px-4 cursor-pointer btn group focus:outline-none rounded-full" style="right: 10px; top: 79%;">
            <svg class="w-5 h-5 text-white icon  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
    // Initialize the carousel
    document.addEventListener('DOMContentLoaded', function () {
        new Flowbite.Carousel('#indicators-carousel', {
            slidesToScroll: 2, // Number of cards to scroll
            slidesToShow: 2,   // Number of cards to display
            duration: 500,
            infinite: true
        });
    });
</script>

</body>

</html>

<?php 
    }
    else {
        echo "<script>alert('Please Login first.')</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
?>