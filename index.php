<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/my/style.css" rel="stylesheet">
    <link href="css/my/ownstyles1.css" rel="stylesheet">
    <link href="css/my/font.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    
    <link href="res/images/logo.png" rel="icon">
    <title>AgroZen™</title>
</head>

<body>

    <div class="front-container" id="HOME">

        <?php 
        session_start();    
        // echo "Session ID: " . $_SESSION['id']; 
            $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
            if(isset($user_id))
            {
                require_once('setheader.php');
            } else {
                require_once('unsetheader.html');
            }
        ?>

        <div class="fronthome">
            <img class="h-auto max-w-xl mx-auto border-gray-900 image-cover" src="res/images/Back.jpg"
                alt="Background Image" />
        </div>
        <div class="front-text text-white">
            <h1 class="frt1 animate__animated animate__fadeInDown">
                <pre>From Farm to Table,Directly to you
- Empowering Farmers,
Nourishing Lives.</pre>
            </h1>
            <h4 class="frt2 animate__animated animate__fadeInUp">
                <p>Harvesting Prosperity: Connecting Farmers and Consumers, One Crop at a Time.</p>
            </h4>
        </div>
    </div>

    <div class="ser-container" id="SERVICES">

        <p class="sert1">COMPREHENSIVE SERVICES</p>
        <p class="sert2">These are some of the services provided by us so you and we can grow together.</p>

        <div class="ser-card-container">

            <div class="max-w-sm bg-white rounded-lg shadow dark:bg-gray-900 ser-card py-3" data-aos="zoom-in">
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white cH-text">
                            Commerce</h5>
                    </a>
                    <a href="#">
                        <img class="rounded-t-lg border border-gray-900 rounded-lg shadow dark:bg-gray-900 dark:border-gray-900"
                            style="border-radius: 200px; height: 200px; width: 275px" src="res/images/commerce.jpg"
                            alt="Commerce" />
                    </a>
                    <p class="mb-3 font-normal text-gray-900 dark:text-gray-100" style="text-align: center;">No need to
                        worry about were to sell and what to buy. Here you can get all.</p>
                </div>
            </div>

            <div class="max-w-sm bg-white rounded-lg shadow dark:bg-gray-900 ser-card" data-aos="zoom-in">
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white cH-text">
                            Consumer</h5>
                    </a>
                    <a href="#">
                        <img class="rounded-t-lg border border-gray-900 rounded-lg shadow dark:bg-gray-900 dark:border-gray-900"
                            style="border-radius: 200px; height: 200px; width: 275px" src="res/images/consumer.jpg"
                            alt="Consumer" />
                    </a>
                    <p class="mb-3 font-normal text-gray-900 dark:text-gray-100" style="text-align: center;">Why visit
                        store?? When you can buy product and get it on your door steps.</p>
                </div>
            </div>

            <div class="max-w-sm bg-white rounded-lg shadow dark:bg-gray-900 ser-card" data-aos="zoom-in">
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white cH-text">Farmer
                        </h5>
                    </a>
                    <a href="#">
                        <img class="rounded-t-lg border border-gray-900 rounded-lg shadow dark:bg-gray-900 dark:border-gray-900"
                            style="border-radius: 200px; height: 200px; width: 275px" src="res/images/farmer.jpg"
                            alt="Farmer" />
                    </a>
                    <p class="mb-3 font-normal text-gray-900 dark:text-gray-100" style="text-align: center;">Why to sell
                        products at less rates to the broker?? Sell it directly to the consumer and get the rigtht
                        rates.</p>
                </div>
            </div>

            <div class="max-w-sm bg-white rounded-lg shadow dark:bg-gray-900 ser-card" data-aos="zoom-in">
                <div class="p-5">
                    <a href="weather.php">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white cH-text">Weather
                            Forecast</h5>
                    </a>
                    <a href="weather.php">
                        <img class="rounded-t-lg border border-gray-900 rounded-lg shadow dark:bg-gray-900 dark:border-gray-900"
                            style="border-radius: 200px; height: 200px; width: 275px" src="res/images/weather.jpg"
                            alt="Weather Forecast" />
                    </a>
                    <p class="mb-3 font-normal text-gray-900 dark:text-gray-100" style="text-align: center;">While we've
                        consulted our weather-savvy scarecrow, predictions are still subject to Mother Nature's whims.
                    </p>
                </div>
            </div>

            <div class="max-w-sm bg-white rounded-lg shadow dark:bg-gray-900 ser-card" data-aos="zoom-in">
                <div class="p-5">
                    <a href="MainEvent.php">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white cH-text">Events
                        </h5>
                    </a>
                    <a href="MainEvent.php">
                        <img class="rounded-t-lg border border-gray-900 rounded-lg shadow dark:bg-gray-900 dark:border-gray-900"
                            style="border-radius: 200px; height: 200px; width: 275px;" src="res/images/events.jpg"
                            alt="Events" />
                    </a>
                    <p class="mb-3 font-normal text-gray-900 dark:text-gray-100" style="text-align: center;">Empowering
                        Farmers: Cultivating Success through Agricultural Events.</p>
                </div>
            </div>

            <div class="max-w-sm bg-white rounded-lg shadow dark:bg-gray-900 ser-card" data-aos="zoom-in">
                <div class="p-5">
                    <a href="PriceAnalysis.php">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white cH-text">Price
                            Analysis</h5>
                    </a>
                    <a href="PriceAnalysis.php">
                        <img class="rounded-t-lg border border-gray-900 rounded-lg shadow dark:bg-gray-900 dark:border-gray-900"
                            style="border-radius: 200px; height: 200px; width: 275px" src="res/images/price.png"
                            alt="Price Prediction" />
                    </a>
                    <p class="mb-3 font-normal text-gray-900 dark:text-gray-100" style="text-align: center;">Our crop
                        counselors are fluent in 'plantish' and ready to decode the language of your fields.</p>
                </div>
            </div>

        </div>

    </div>

    <div class="user-container" id=USER>

        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 user-card wrap-content"
            data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                    style="text-align: center; margin-top: 10px; font-size: 28px;">Farmer</h5>
            </a>
            <p class="mb-3 font-normal text-gray-900 dark:text-gray-900"
                style="text-align: center; margin-top: 10px; width: 100%; color: white;">As a farmer, this platform is your's one-stop destination for all farming needs. 
                Buy and sell farming products hassle-free.</p>
            <a href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  rounded-lg btn-color focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                style="margin-top:10px; margin-left: 130px; align-content: center; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.55)">
                Read more
            </a>
        </div>

        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 user-card"
            data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                    style="text-align: center; margin-top: 10px; font-size: 28px;">Supplier</h5>
            </a>
            <p class="mb-3 font-normal text-gray-900 dark:text-gray-900"
                style="text-align: center; margin-top: 10px; width: 100%; color: white;">Sell your wide variety of
                products related to farming, through our platform. We have millions of farmers connect from all parts of
                country.</p>
            <a href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg  focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 btn-color"
                style="margin-top:10px; margin-left: 130px; align-content: center; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.55)">
                Read more
            </a>
        </div>

        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 user-card"
            data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                    style="text-align: center; margin-top: 10px; font-size: 28px;">Customer</h5>
            </a>
            <p class="mb-3 font-normal text-gray-900 dark:text-gray-900"
                style="text-align: center; margin-top: 10px; width: 100%; color: white;">No need to visit field to get
                grains!!! Just order here and get all kinds of grains delivered at your doorsteps.Why to wait? Go and
                order.</p>
            <a href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white  rounded-lg btn-color focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                style="margin-top:10px; margin-left: 130px; align-content: center; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.55)">
                Read more
            </a>
        </div>

    </div>

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
            <div class="footer-body">
                <div class="about-us">
                    <p class="footer-body-textH">ABOUT US<br /></p>
                    <p class="footer-body-textD">Welcome to Agro, where the essence of farm-fresh goodness meets the
                        convenience of your doorstep. We are more than just a marketplace; we are a platform that
                        bridges the gap between hardworking farmers and discerning consumers like you.</p>
                </div>
                <div class="contact-us">
                    <p class="footer-body-textH">CONTACT US<br /></p>
                    <p class="footer-body-textD">V.V.Nagar,Anand<br />info@example.com<br />+01 234 567 8910<br />+01
                        234 567 8910</p>
                </div>
                <div class="get-in-touch">
                    <p class="footer-body-textH">GET IN TOUCH<br /></p>
                    <form class="max-w-sm mx-auto">
                        <div class="mb-5">
                            <label for="email"
                                class="block mb-2 text-white font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="  name@email.com" required>
                        </div>
                        <div class="mb-5">
                            <label for="comment"
                                class="block mb-2 text-sm font-medium text-white dark:text-white">Comment</label>
                            <input type="text" id="comment"
                                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="comment" required>
                        </div>
                        <button type="submit" id="un"
                            class="text-white  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center me"
                            style="margin-top: 10px; background-Color:#FF401C; #un:hover{background-Color:#FF401C;} ; width: 80px; height: 30px; box-shadow: 0px 4px 4px rgba(255, 255, 255, 0.35);">Submit</button>
                    </form>
                </div>
            </div>
            <div class="footer-tail">
                <div
                    class="fixed bottom-0 left-0 z-20 w-full p-2 bg-white border-t border-gr:hover{back}ay-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
                    <p class="text-sm text-gray-900 sm:text-center dark:text-gray-900">© 2024 <a href="index.html"
                            class="hover:underline">AgroZen™</a>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        AOS.init();
    </script>
</body>

</html>