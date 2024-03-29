<?php 
    $id = $_SESSION['admin_id'];
    $con = mysqli_connect('localhost','root','','agrozen');
    $result =mysqli_query($link,"SELECT * FROM admin WHERE admin_id = $id");
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>AgroZen Admin Dashboard</title>
</head>

<body>

<!--Header Section Starts Here-->
<header class="bg-nav">
    <div class="flex justify-between">
        <div class="p-1 mx-3 inline-flex items-center">
            <img onclick="sidebarToggle()" src="../res/images/logo.png" class="h-8 border border-gray-200 " alt="AgroZen Logo" style=" box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.8); border-radius: 50px; border: 1.5px white solid;"/>
            <a href="index.php"><h1 class="text-white p-2">AgroZen Admin</h1></a>
        </div>
        <div class="p-1 flex flex-row items-center">
            <!--<a href="https://github.com/tailwindadmin/admin" class="text-white p-2 mr-2 no-underline hidden md:block lg:block">Github</a>-->

            <!--<img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="../res/images/logo.png" alt="Admin Image">-->
            <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block"><?php echo $row['admin_name']; ?></a>
            <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                <ul class="list-reset">
                    <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My account</a></li>
                    <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                    <li><hr class="border-t mx-2 border-grey-ligght"></li>
                    <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!--/Header-->

</body>
</html>