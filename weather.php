<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Weather Forecast</title>
    <link rel="stylesheet" href="css/my/weatherstyle2.css">
    <link href="css/my/style.css" rel="stylesheet">
    <link href="css/my/ownstyles1.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="weatherjavascript.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <link href="res/images/logo.png" rel="icon">
    <title> Weather </title>
    
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
  <div class="container">
    <div class="weather-input">
      <h3>Enter a City Name</h3>
      <input class="city-input" type="text" placeholder="E.g., Anand, Vapi, Daman">
      <button class="search-btn">Search</button>
    </div>
    <div class="weather-data">
      <div class="current-weather">
      </div>
      <div class="days-forecast">
        <h2>FORECAST</h2>
        <ul class="weather-cards">
        </ul>
      </div>
    </div>
  </div>
    
  </body>
</html>