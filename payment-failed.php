

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/dollar.png" type="image/png" sizes="16x16">
    <title>Payment Failed</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@latest/dist/flowbite.min.css" rel="stylesheet">
    <script>
        function goToHomePage() {
            window.location.href = 'index.php';  // Adjust this URL to your actual home page URL
        }
    </script>
</head>
<style>
       body {
        background: #dcf0fa;
    }

    .container {
        max-width: 380px;
        margin: 50px auto;
        overflow: hidden;
    }

    .printer-top {
        z-index: 1;
        border: 6px solid #666666;
        height: 6px;
        border-bottom: 0;
        border-radius: 6px 6px 0 0;
        background: #333333;
    }

    .printer-bottom {
        z-index: 0;
        border: 6px solid #666666;
        height: 6px;
        border-top: 0;
        border-radius: 0 0 6px 6px;
        background: #333333;
    }

    .paper-container {
        position: relative;
        overflow: hidden;
        height: 467px;
    }

    .paper {
        background: #ffffff;
        font-family: 'Poppins', sans-serif;
        height: 447px;
        position: absolute;
        z-index: 2;
        margin: 0 12px;
        margin-top: -12px;
        animation: print 5s cubic-bezier(0.68, -0.55, 0.265, 0.9) forwards;
    }

    .main-contents {
        margin: 0 12px;
        padding: 24px;
    }

    /* Paper Jagged Edge */
    .jagged-edge {
        position: relative;
        height: 20px;
        width: 100%;
        margin-top: -1px;
    }

    .jagged-edge:after {
        content: "";
        display: block;
        position: absolute;
        left: 0;
        right: 0;
        height: 20px;
        background: linear-gradient(45deg,
            transparent 33.333%,
            #ffffff 33.333%,
            #ffffff 66.667%,
            transparent 66.667%),
            linear-gradient(-45deg,
            transparent 33.333%,
            #ffffff 33.333%,
            #ffffff 66.667%,
            transparent 66.667%);
        background-size: 16px 40px;
        background-position: 0 -20px;
    }

    .success-icon {
        text-align: center;
        font-size: 48px;
        height: 72px;
        background: #359d00;
        border-radius: 50%;
        width: 72px;
        height: 72px;
        margin: 16px auto;
        color: #fff;
    }

    .success-title {
        font-size: 22px;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        color: #666;
        font-weight: bold;
        margin-bottom: 16px;
    }

    .success-description {
        font-size: 15px;
        font-family: 'Poppins', sans-serif;
        line-height: 21px;
        color: #999;
        text-align: center;
        margin-bottom: 24px;
    }

    .order-details {
        text-align: center;
        color: #333;
        font-weight: bold;
    }

    .order-number-label {
        font-size: 18px;
        margin-bottom: 8px;
    }

    .order-number {
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        line-height: 48px;
        font-size: 48px;
        padding: 8px 0;
        margin-bottom: 24px;
    }

    .complement {
        font-size: 18px;
        margin-bottom: 8px;
        color: #32a852;
    }
    
</style>

<body>
    <div class="container">
        <div class="printer-top"></div>

        <div class="paper-container">
            <div class="printer-bottom"></div>

            <div class="paper">
                <div class="main-contents">
                    <!-- <div class="success-icon">&#10004;</div> -->
                    <div class="success-title">
                        Payment Failed
                    </div>
                    <?php 
if(isset($_GET)){
    
    echo "<br/>";
    print_r($_GET);
    echo "</p>";
}
?>
                </div>
                <div class="jagged-edge"></div>
            </div>
        </div>
        <div class="mb-4 flex justify-center">
      <button id="PayNow" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" type="button" onclick="goToHomePage()" >Home</button>
      </div>
    </div>
</body>
</html>