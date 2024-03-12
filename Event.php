<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
   
    
    <link href="style.css" rel="stylesheet">
    <?php
        $con = mysqli_connect('localhost','root','','agrozen');
        $sql = "SELECT * FROM events";
        $re = mysqli_query($con,$sql);  
        $numRows = mysqli_num_rows($re);      
       
    ?>

    <style>
        *{
    margin : 0;
    padding : 0;
    box-sizing : border-box;
}

body{
    height: 100vh;
    width : 100%;
    display: flex;
    flex-direction: column;
    place-items: center;
    overflow: hidden;
}

header {
    width: 100%;
}

main{
    position : relative;
    width: 100%;
    height : 100%;
    box-shadow: 0 3px 10px rgba(0,0,0,0.3);
}

.item{
    width: calc(100% / <?php echo mysqli_num_rows($re) + 1; ?>);
    height : 300px;
    list-style-type: none;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1;
    background-position: center;
    background-size: cover;
    border-radius: 20px;
    box-shadow: 0 20px 30px rgba(255,255,255,0.3) inset;
    transition: transform 0.1s, left 0.75s, top 0.75s, width 0.75s, height 0.75s;
    
    &:nth-child(1), &:nth-child(2) {
        left : 0;
        top : 0;
        width: 100%;
        height : 100%;
        transform: none;
        border-radius : 0;
        box-shadow : none;
        opacity : 1;
       
    }
    
    <?php
        $left = 0;
        for ($i = 3; $i <= $numRows + 2; $i++) {
            //$leftPosition = ($i - 2) * 100 / ($numRows + 1);
            if($i >= 6)
            {
                echo "&:nth-child({$i}) { left : calc(50% + $left); opacity : 0;} \n";
            }
            echo "&:nth-child({$i}) { left: calc(50% + {$left}px); }\n";
            $left = $left + 220;
        }
    ?>
    
}

.content {
    width: min(50vh,400px);
    position: absolute;
    top: 50%;
    left : 3rem;
    transform: translateY(-50%);
    color : #000;
    opacity: 0;
    display: none;

    & .title{
        font-family: 'Times New Roman' ;
        font-size : xx-large;
        text-transform: uppercase;
        font-weight:bolder;
    }

    & .description{
        color : #000;
        font-family: 'Times New Roman';
        line-height: 1.7;
        margin : 1rem 0 1.5rem;
        font-size: 1.2rem;
    }

    & button{
        width: fit-content;
        color: white;
        border: 1px solid lightgrey;
        border-radius: 25px;
        padding : 0.75rem;
        cursor: pointer;
        background: linear-gradient(135deg, #4281ff, #42ffa0);
        transition: all 0.3s ease;
        
        &:hover{
           background: linear-gradient(-135deg, #4281ff, #42ffa0);
         }
    }

}

.item:nth-of-type(2) .content {
    display: block;
    animation : show 0.75s ease-in-out 0.3s forwards;
}

@keyframes show {
    0% {
        filter : blur(5px);
        transform : translateY(calc(-50% + 75px));
    }
    100%{
        opacity: 1;
        filter : blur(0);
    }
}

.nav{
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 5;
    user-select: none;

    & .btn{
        background-color: #3f826D;
        color : rgba(0,0,0,0.7);
        border : 2px solid rgba(0,0,0,0.6);
        margin : 0 0.25rem;
        padding : 0.75rem;
        border-radius: 50%;
        cursor : pointer;

        
    }
}

p{
    font-weight: bold;
    color: #f5fefd;
}

@media (width > 650px) and (width < 900px) {
    body {
        display: flex;
        flex-direction: column;
        place-items: center;
        overflow: hidden;
    }

    main {
    flex-grow: 1;
    width: 100%;
    max-width: 100%;
    overflow-y: auto;
    }
    .content {
        width: 30%;
      & .title        { font-size: 0.5rem; }
      & .description  { font-size: 0.25rem; }
      & button        { font-size: 0.7rem; }
    }
    .item {
      width: 160px;
      height: 270px;
  
      &:nth-child(3) { left: 50%; }
      &:nth-child(4) { left: calc(50% + 170px); }
      &:nth-child(5) { left: calc(50% + 340px); }
      &:nth-child(6) { left: calc(50% + 510px); opacity: 0; }
    }
  }
  
  @media (width < 650px) {
    body {
        display: flex;
        flex-direction: column;
        place-items: center;
        overflow: hidden;
    }

    main {
    flex-grow: 1;
    width: 100%;
    max-width: 100%;
    overflow-y: auto;
    }

    .content {
        width : 30%;
      & .title        { font-size: 0.5rem; }
      & .description  { font-size: 0.25rem; }
      & button        { font-size: 0.7rem; }
    }
    .item {
      width: 130px;
      height: 220px;
  
      &:nth-child(3) { left: 50%; }
      &:nth-child(4) { left: calc(50% + 140px); }
      &:nth-child(5) { left: calc(50% + 280px); }
      &:nth-child(6) { left: calc(50% + 420px); opacity: 0; }
    }
  }
    </style>
</head>
<body>
    <header>
        <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700" style="background: #3CBC00; position:relative;">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="index.html" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="res/images/logo.png" class="h-8 border border-gray-200 " alt="AgroZen Logo" style=" box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.8); border-radius: 50px; border: 1.5px white solid;"/>
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white" style = "font-size: 30px; font-family: Inter; color: white;">AgroZen</span>
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
                    <a href="index.html" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style = "font-size: 22px; font-family: Inter;">HOME</a>
                    </li>
                    <li>
                    <a href="index.html#SERVICES" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style="font-size: 22px; font-family: Inter;">SERVICES</a>
                    </li>
                    <li>
                    <a href="index.html#USER" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style = "font-size: 22px; font-family: Inter;">USERS</a>
                    </li>
                    <li>
                    <a href="index.html#FOOTER" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style = "font-size: 22px; font-family: Inter;">ABOUT US</a>
                    </li>
                    <li>
                    <a href="Login.php" class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" style = "font-size: 22px; font-family: Inter;">SIGN IN</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>

   
    <main>
        <ul class="slider">
            <?php
                 while($val = mysqli_fetch_array($re))
                 {
                     $title = $val['Title'];
                     $description = $val['Description'];
                     $image = $val['Image'];
            ?>
                     <li class="item" style="background-image: url(<?php echo $image; ?> );">
                     <div class="content">
                     <h2 class="title"><?php echo $title; ?></h2>
                     <p class="description"><?php echo "$description"; ?></p>
                     <button>Registerx</button>
                     </div>
                     </li>
            <?php
                    } 
            ?>
            
        </ul>

        <nav class="nav">
            <ion-icon class="btn prev" name="arrow-back-outline"></ion-icon>
            <ion-icon class="btn next" name="arrow-forward-outline"></ion-icon>
        </nav>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="eventscript.js"></script>
</body>
</html>