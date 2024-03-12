<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .container .title{
        text-align: center;
        margin-bottom: 30px;

    }

    .title {
      display: block;
      align-self: center;
    }

    .content {
      min-width: 800px; /* Adjust the width as needed */
    }

    .box{
        border: 2px solid black;
    }

    /* Style for the file input */
    .file-input {
      position: relative;
      overflow: hidden;
    }

    .file-input input {
      font-size: 100px;
      position: absolute;
      top: 0;
      right: 0;
      opacity: 0;
    }

    .file-input button {
      background-color: #008cff;
      color: #ffffff;
      padding: 8px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    /* Style for the selected file name display */
    .selected-file {
      margin-top: 8px;
      font-size: 14px;
      color: #555;
    }
  </style>
</head>

<body style="background-color: #f2f2f2;">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  <?php
    if(isset($_POST['verify']))
    {
      $title = isset($_POST['title']) ? trim($_POST['title']) : '';
      $description = isset($_POST['description']) ? trim($_POST['description']) : ''; 
      
      $con = mysqli_connect('localhost','root','','agrozen');

      if($_FILES['profile_image']['error'] == UPLOAD_ERR_OK)
      {
        $targetDir = "res/eventImage/";

        // Get the original name of the uploaded file
        $imageName = basename($_FILES['profile_image']['name']);
        $targetFile = $targetDir . $imageName;

        if(file_exists($targetFile))
        {
          echo "<script>alert('File is already exits')</script>";
        } else {
          if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile))
          {
            $sql = "INSERT INTO events(Title,Description,Image) VALUES ('$title','$description','$imageName')";

            if(mysqli_query($con,$sql))
            {
              echo "<script>alert('Event added successfully!!!!')</script>";
            } else {
              echo "<script>alert('Error while uploading the Event')</script>";
            }
          } else {
            echo "<script>alert('Error while uploading the Event')</script>";
          }
        }
      } else {
        echo "<script>alert('No file uploaded')</script>";
      }      
    }
  ?>
  
  <div class="container">
    <div class="title">SIGN UP</div>
    <div class="content ">
      <form class="max-w-sm mx-auto" method="post" action="" enctype="multipart/form-data">
      <div class="mb-5">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
          <input type="text" id="name" name="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  required />
        </div>
        <div class="mb-5">
            <label for="message" name="description" class="block text-sm font-semibold leading-6 text-gray-900">Description</label>
            <div class="mt-2.5">
              <textarea name="description" id="message" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
        </div>
        <div class="mb-5 file-input">
            <label for="profile-image"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Image</label>
            <input type="file" id="profile-image" name="profile_image" accept="image/*" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
            <button type="button">Choose File</button>
            <div class="selected-file" id="selected-file">No file selected</div>
          </div>
        
        <div class="flex items-start mb-5">
        <button type="submit" name="verify" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload </button>
    </form>
    </div>
  </div>
  <script>
    // Add script to display selected file name
    document.getElementById('profile-image').addEventListener('change', function () {
      var fileName = this.files[0].name;
      document.getElementById('selected-file').innerText = 'Selected File: ' + fileName;
    });
  </script>
</body>
</html>

