<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/my/loginstyle1.css">
    <link href="css/my/style.css" rel="stylesheet">
    <link href="css/my/ownstyles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/my/in.css">

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
                class="inline-flex w-full items-center justify-center rounded-md bg-black px-3.5 py-2.5 font-semibold leading-7 text-white hover:bg-black/80"
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
                <button
                  type="button"
                  class="relative inline-flex w-full items-center justify-center rounded-md border border-gray-400 bg-white px-3.5 py-2.5 font-semibold text-gray-700 transition-all duration-200 hover:bg-gray-100 hover:text-black focus:bg-gray-100 focus:text-black focus:outline-none"
                >
                  <span class="mr-2 inline-block">
                    <svg
                      class="h-6 w-6 text-rose-500"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                    >
                      <path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"></path>
                    </svg>
                  </span>
                  Sign in with Google
                </button>
                
              </div>
            </div>
          </div>
          <div class="h-full w-full">
            <img
              class="mx-auto h-full w-full rounded-md object-cover" style="margin-top: 20px; height:90vh;"
              src="res/images/5721859_59940.jpg"
              alt=""
            />
          </div>
        </div>
      </section>
    
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
            <div class="footer-tail">
                <div class="fixed bottom-0 left-0 z-20 w-full p-2 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800 dark:border-gray-600">
                    <p class="text-sm text-gray-900 sm:text-center dark:text-gray-900">© 2024 <a href="index.html" class="hover:underline">AgroZen™</a>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>