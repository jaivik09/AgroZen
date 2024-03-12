<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Weather Forecast</title>
    <link href="css/my/style.css" rel="stylesheet">
    <link href="css/my/ownstyles.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="PriceAnalysisScript.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
  </head>
  <body>
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
    
    
    
  </body>
</html>