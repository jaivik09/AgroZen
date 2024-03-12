<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/my/in.css">
    <style>
    body {
    overflow: hidden;
}

/* Add this style for the modal or content that requires scrolling */
.modal-content {
    max-height: 50vh; /* Adjust the height as needed */
    overflow-y: auto;
}
</style>
</head>
<body>
<?php 
//    require_once('unsetheader.html');
  ?>

    <?php 
    $firstName = '';
    $email = '';
    $mobile = '';

function validatePassword($pass)
{
  $hasMinLength = strlen($pass) >= 8;
  $hasUppercase = preg_match('/[A-Z]/', $pass);
  $hasLowercase = preg_match('/[a-z]/', $pass);
  $hasNumber = preg_match('/[0-9]/', $pass);
  $hasSpecialChar = preg_match('/[!@#\$%\^&*\(\){}\>\<,\.\?\/\+\-\=\[\]\~\`\\\\|;:\'"]/', $pass);

  if ($hasMinLength && $hasUppercase && $hasLowercase && $hasNumber && $hasSpecialChar) {
    return true; // Password meets all criteria
  } else {
    return false; // Password does not meet all criteria
  }
}

function validateEmail($email)
{
  // Check if the email address is valid using PHP's built-in filter_var function
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}

function validateMobileNumber($mobile)
{
  $pattern = '/^[0-9]{10}+$/';

  if (preg_match($pattern, $mobile)) {
    return true;
  } else {
    return false;
  }
}


function checkStudentExistance($email,$mobile)
{
  $con1 = mysqli_connect('localhost','root','','agrozen');
  
  $sql1 = "SELECT Email,Phone FROM users WHERE Email='$email' OR Phone='$mobile' ";
  $re1 = mysqli_query($con1,$sql1);
  $count = mysqli_num_rows($re1);

  mysqli_close($con1);
  return $count == 0;
}

function register($firstName, $email, $mobile, $password, $profileImage, $role, $gender)
{
    $con = mysqli_connect('localhost', 'root', '', 'agrozen');

    $hashpass = password_hash($password, PASSWORD_DEFAULT);
    $targetDir = "res/profileImage/";

    // Get the original name of the uploaded file
    $imageName = basename($_FILES['profile_image']['name']);
    $targetFile = $targetDir . $imageName;

    // Move the uploaded file to the target location
    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile)) {
        // File uploaded successfully, now insert into the database
        $sql = "INSERT INTO users(Name, Email, Password, Phone, Role, ProfileImage, Gender) VALUES ('$firstName', '$email', '$hashpass', '$mobile', '$role', '$imageName', '$gender')";
        $re = mysqli_query($con, $sql);

      
    } else {
        // File upload failed
        echo "<script>alert('Error uploading image.')</script>";
    }

    mysqli_close($con);
}



if (isset($_POST['verify'])) {

  // Validate and sanitize user input
  $firstName = isset($_POST['name']) ? trim($_POST['name']) : '';
  $email = isset($_POST['email']) ? trim($_POST['email']) : '';
  $mobile = isset($_POST['phone']) ? trim($_POST['phone']) : '';
  $password = isset($_POST['pass']) ? $_POST['pass'] : '';
  $cPassword = isset($_POST['cpass']) ? $_POST['cpass'] : '';
  $role = isset($_POST['role']) ? $_POST['role'] : '';
  $profileImage = isset($_POST['profile_image']) ? $_POST['profile_image'] : '';
  $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

  // Ensure required fields are not empty
  if (empty($firstName) || empty($email) || empty($mobile) || empty($password) || empty($cPassword) || empty($gender) || empty($role)) {
    // Handle the case where required fields are missing
    echo "<script>alert('Please fill out all required fields.')</script>";
  } else if (!validateEmail($email)) {
    //validate email
    echo "<script>swal('Email is invalid');</script>";
  } else if (!validateMobileNumber($mobile)) {
    //validate mobile
    echo "<script>swal('Mobile no. is not valid.')</script>";
  } else if (!validatePassword($password)) {
    //validate password
    echo "<script>swal('Password criteria does not match ','It should contain atleast \\n1 Uppercase \\n1 Special Character \\nMinimum 8 characters ')</script>";
  } 
  else {
    //check password
    if (!(strcasecmp($password, $cPassword) == 0)) {
      echo "<script>swal({
        title: 'Password and confirm password not match.',
        icon: 'error',
        buttons: {
            confirm: {
                className: 'alert-button'
            }
        }
    });</script>";
    } else {
      if(!checkStudentExistance($email,$mobile))
      {
        echo "<script>swal('Error','Email or Mobile no. is already registered.','warning')</script>";
      }
      else 
      {
        if ($_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
          // Call the register function with the uploaded file information
          //$profileImage = $_FILES['profile_image']['name'];
          register($firstName, $email, $mobile, $password, $_FILES['profile_image'],$role,$gender);
          echo "<script>
                                    swal({
                                        title: 'Logged In',
                                        text: 'You are successfully logged in!!!!',
                                        icon: 'success'
                                    }).then((result) => {
                                        if (result) {
                                            window.location.href = 'Login.php';
                                        }
                                    });
                                </script>";
          exit();
       } else {
          // Handle the case where no file was uploaded
          echo "<script>alert('Image upload failed.')</script>";
       }       
      }
      
    }
  }
}

    ?>
<section>
  <div class="grid grid-cols-1 lg:grid-cols-2">
    <div class="relative flex items-end px-4 pb-10 pt-60 sm:px-6 sm:pb-16 md:justify-center lg:px-8 lg:pb-24">
      <div class="absolute inset-0">
        <img
          class="h-full w-full rounded-md object-cover object-top"
          src="https://images.unsplash.com/photo-1526948128573-703ee1aeb6fa?ixlib=rb-4.0.3&amp;ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8c2lnbnVwfGVufDB8fDB8fA%3D%3D&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=60"
          alt=""
        />
      </div>
      <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
      <div class="relative">
        <div class="w-full max-w-xl xl:mx-auto xl:w-full xl:max-w-xl xl:pr-24">
          <h3 class="text-4xl font-bold text-white">
            Now you dont have to rely on your designer to create a new page
          </h3>
          <ul class="mt-10 grid grid-cols-1 gap-x-8 gap-y-4 sm:grid-cols-2">
            <li class="flex items-center space-x-3">
              <div class="inline-flex h-5 w-5 flex-shrink-0 items-center justify-center rounded-full bg-blue-500">
                <svg
                  class="h-3.5 w-3.5 text-white"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </div>
              <span class="text-lg font-medium text-white">
                
                Commercial License
              </span>
            </li>
            <li class="flex items-center space-x-3">
              <div class="inline-flex h-5 w-5 flex-shrink-0 items-center justify-center rounded-full bg-blue-500">
                <svg
                  class="h-3.5 w-3.5 text-white"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </div>
              <span class="text-lg font-medium text-white">
                
                Unlimited Exports
              </span>
            </li>
            <li class="flex items-center space-x-3">
              <div class="inline-flex h-5 w-5 flex-shrink-0 items-center justify-center rounded-full bg-blue-500">
                <svg
                  class="h-3.5 w-3.5 text-white"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </div>
              <span class="text-lg font-medium text-white">
                
                120+ Coded Blocks
              </span>
            </li>
            <li class="flex items-center space-x-3">
              <div class="inline-flex h-5 w-5 flex-shrink-0 items-center justify-center rounded-full bg-blue-500">
                <svg
                  class="h-3.5 w-3.5 text-white"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </div>
              <span class="text-lg font-medium text-white">
                
                Design Files Included
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="flex items-center justify-center px-4 py-10 sm:px-6 sm:py-16 lg:px-8 lg:py-24">
      <div class="xl:mx-auto xl:w-full xl:max-w-sm 2xl:max-w-md">
        <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl">
          Sign up
        </h2>
        <p class="mt-2 text-base text-gray-600">
          Already have an account?
          <a
            href="#"
            title=""
            class="font-medium text-black transition-all duration-200 hover:underline"
          >
            Sign In
          </a>
        </p>
        <form action="" method="POST" enctype="multipart/form-data" class="mt-8">
          <div class="space-y-5">
            <div class="modal-content">
            <div>
              <label for="name" class="text-base font-medium text-gray-900">
                
                Full Name
              </label>
              <div class="mt-2">
                <input
                  class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                  type="text"
                  placeholder="Full Name"
                  id="name"
                  name="name"
                />
              </div>
            </div>
            <div>
              <label for="email" class="text-base font-medium text-gray-900">
                
                Email address
              </label>
              <div class="mt-2">
                <input
                  class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                  type="email"
                  placeholder="Email"
                  id="email"
                  name="email"
                />
              </div>
            </div>
            <div>
              <div class="flex items-center justify-between">
                <label
                  for="password"
                  class="text-base font-medium text-gray-900"
                >
                  Password
                </label>
              </div>
              <div class="mt-2">
                <input
                  class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                  type="password"
                  placeholder="Password"
                  id="password"
                  name="pass"
                />
              </div>
            </div>
            <div>
              <div class="flex items-center justify-between">
                <label
                  for="password"
                  class="text-base font-medium text-gray-900"
                >
                  Confirm Password
                </label>
              </div>
              <div class="mt-2">
                <input
                  class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                  type="password"
                  placeholder="Password"
                  id="password"
                  name="cpass"
                />
              </div>
            </div>
            <div>
              <label for="email" class="text-base font-medium text-gray-900">
                
                Mobile Number 
              </label>
              <div class="mt-2">
                <input
                  class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                  type="number"
                  placeholder="Mobile No."
                  id="email"
                  name="phone"
                />
              </div>
            </div>
            <div>
        <label for="role" class="text-base font-medium text-gray-900">
            Role
        </label>
        <div class="mt-2">
            <select
                id="role"
                name="role"
                class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
            >
                <option value="farmer">As a Farmer</option>
                <option value="consumer">As a Consumer</option>
            </select>
        </div>
    </div>

    <div>
        <label class="text-base font-medium text-gray-900">
            Gender
        </label>
        <div class="mt-2">
            <label class="inline-flex items-center">
                <input type="radio" name="gender" value="male" class="form-radio h-5 w-5 text-gray-600">
                <span class="ml-2">Male</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" name="gender" value="female" class="form-radio h-5 w-5 text-gray-600">
                <span class="ml-2">Female</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" name="gender" value="other" class="form-radio h-5 w-5 text-gray-600">
                <span class="ml-2">Other</span>
            </label>
        </div>
    </div>
    <div>
        <label for="profileImage" class="text-base font-medium text-gray-900">
            Profile Image
        </label>
        <div class="mt-2">
            <input
                type="file"
                name="profile_image"
                id="profileImage"
                accept="image/*"
                class="border-gray-300"
            />
        </div>
    </div>
          </div>
            <div>
              <button
                type="submit" name="verify"
                class="inline-flex w-full items-center justify-center rounded-md bg-black px-3.5 py-2.5 font-semibold leading-7 text-white hover:bg-black/80"
              >
                Create Account
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
            Sign up with Google
          </button>
         
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>