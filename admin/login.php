<?php 
    session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./dist/styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    .login {
      background: url('./dist/images/login-new-img.jpg');
      background-size: cover;
    }
  </style>
</head>

<body class="h-screen font-sans login bg-cover">

<?php 
  if(isset($_POST['login']))
  {
      $email = isset($_POST['email']) ? trim($_POST['email']) : '';
      $pass = isset($_POST['password']) ? trim($_POST['password']) : '';

      $con = mysqli_connect('localhost','root','','agrozen');

      $sql = "SELECT admin_id,admin_email,admin_password FROM admin WHERE admin_email='$email' ";
      
      $re = mysqli_query($con,$sql);

      $count = mysqli_fetch_array($re);

      if($count)
      {
          if($pass == $count['admin_password'])
          {
              $_SESSION['admin_id'] = $count['admin_id'];
              echo "<script>
                      swal({
                          title: 'Hurray!!!!',
                          text: 'You are successfully logged in',
                          icon: 'success'
                      }).then((result) => {
                          if (result) {
                              window.location.href = 'index.php';
                          }
                      });
                  </script>";
          }
          else
          {
              echo "<script>swal('Error!!!!','Password is incorrect!!!!','error');</script>";
          }
      }
      else
      {
          echo "<script>swal('Error!!!!','Email is not registered!!!!','error');</script>";
      } 
  }
?>

<div class="container mx-auto h-full flex flex-1 justify-center items-center">
  <div class="w-full max-w-lg">
    <div class="leading-loose">
      <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="">
        <p class="text-gray-800 font-medium text-center text-lg font-bold">Login</p>
        <div class="">
          <label class="block text-sm text-gray-00" for="email">Email</label>
          <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" required="" placeholder="Email" aria-label="email">
        </div>
        <div class="mt-2">
          <label class="block text-sm text-gray-600" for="password">Password</label>
          <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="*******" aria-label="password">
        </div>
        <div class="mt-4 items-center justify-between">
          <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit" name="login">Login</button>
          <!--<a class="inline-block right-0 align-baseline  font-bold text-sm text-500 hover:text-blue-800" href="#">
            Forgot Password?
          </a>-->
        </div>
      </form>

    </div>
  </div>
</div>
</body>

</html>
