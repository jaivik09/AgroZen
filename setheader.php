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
                                <a href="#"
                                    class="nav-item"
                                    style="font-size: 22px; font-family: Inter;">PRODUCTS</a>
                            </li>
                            <li>
                                <a href="index.php#FOOTER"
                                    class="nav-item"
                                    style="font-size: 22px; font-family: Inter;">ABOUT US</a>
                            </li>
                            <li>
                                <a href="usercart.html">
                                    <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
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