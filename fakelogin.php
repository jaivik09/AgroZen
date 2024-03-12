<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <style> 
    </style>

  </head>
  <body>
    
    <?php 
        if(isset($_POST['login']))
        {
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';

            $con = mysqli_connect('localhost','root','','agrozen');

            $sql = "SELECT id,Email,Password FROM users WHERE Email='$email' ";
            $re = mysqli_query($con,$sql);

            $count = mysqli_fetch_array($re);

            if($count)
            {
                if(password_verify($pass,$count['Password']))
                {
                    $_SESSION['id'] = $count['id'];
                    echo "<script>
                                    swal({
                                        title: 'Regisetered',
                                        text: 'You are successfully registered!!!!',
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
    <section>
        <div class="grid grid-cols-1 lg:grid-cols-2">
          <div class="flex items-center justify-center px-4 py-10 sm:px-6 sm:py-16 lg:px-8 lg:py-24">
            <div class="xl:mx-auto xl:w-full xl:max-w-sm 2xl:max-w-md">
              <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl">
                Sign in
              </h2>
              <p class="mt-2 text-sm text-gray-600">
                Don&#x27;t have an account?
                <a
                  href="fakeregister.php"
                  title=""
                  class="font-semibold text-black transition-all duration-200 hover:underline"
                >
                  Create a free account
                </a>
              </p>
              <form action="" method="POST" class="mt-8">
    <div class="space-y-5">
        <div>
            <label for="email" class="text-base font-medium text-gray-900">
                Email address
            </label>
            <div class="mt-2">
                <input
                    id="email"
                    name="email"
                    class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                    type="email"
                    placeholder="Email"
                />
            </div>
        </div>
        <div>
            <div class="flex items-center justify-between">
                <label for="pass" class="text-base font-medium text-gray-900">
                    Password
                </label>
                <a
                    href="pass_recovery/enter_email.php"
                    title=""
                    class="text-sm font-semibold text-black hover:underline"
                >
                    Forgot password?
                </a>
            </div>
            <div class="mt-2">
                <input
                    id="pass"
                    name="pass"
                    class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                    type="password"
                    placeholder="Password"
                />
            </div>
        </div>
        <div>
        <button
                            type="submit" name="login"
                            class="btn-color inline-flex w-full items-center justify-center rounded-md  px-3.5 py-2.5 font-semibold leading-7 text-white bg-black"
                        >
                            Get started
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="ml-2"
                            >
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
        </div>
    </div>
</form>
              <div class="mt-3 space-y-3">
              
                
              </div>
            </div>
          </div>
          <div class="h-full w-full">
            <img
              class="mx-auto h-full w-full rounded-md object-cover"
              src="res/images/5721859_59940.jpg"
              alt=""
            />
          </div>
        </div>
      </section>
    
      
</body>
</html>