<?php 
session_start();    
// echo "Session ID: " . $_SESSION['id']; 
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
    if(isset($user_id))
     {
    require_once('setheader.php');

    $event_id = isset($_GET['event_id']) ? $_GET['event_id'] : null;
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
    $con = mysqli_connect('localhost','root','','agrozen');

    $event_row = mysqli_query($con,"SELECT * FROM events WHERE id='$event_id'");
    $event_result = mysqli_fetch_array($event_row);
    $imageName = $event_result['Image'];
 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <link href="css/my/style.css" rel="stylesheet">
    <link href="css/my/ownstyles1.css" rel="stylesheet">
    <link href="res/images/logo.png" rel="icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
    <title>Event Details</title>
    <style>
        .main-body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            height: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 8px;
            background-color: #fff;
        }
        .image-side {
            flex: 1;
            overflow: hidden;
        }
        .image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .content-side {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            border-radius: 100px;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        th:first-child, td:first-child {
            border-left: none;
        }
        th:last-child, td:last-child {
            border-right: none;
        }
 
        .btn1 {
            display: flex;
            background-color: #FF5722;
            border-radius: 15px;
            color: white;
            height: 45px;
            width: 20vh;
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
        }
        .btn1:hover {
            background-color: #FF401C;
        }
        .btn1-container {
            justify-content: center; /* Center horizontally */
            display: flex;
            height: 100%; /* Ensure the container takes full height of the cell */
}
    </style>
</head>
<body>
    <div class="main-body">
        
    <div class="container">
        <div class="image-side">
            <img class="image" src="<?php echo "res/eventImage/".$imageName; ?>" alt="Placeholder Image">
        </div>
        <div class="content-side">
            <table>
                <tr>
                    <th colspan="2">Event Details</th>
                </tr>
                <tr>
                    <td>Name </td>
                    <td><?php echo $event_result['Title']; ?></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><?php echo $event_result['Description']; ?></td>
                </tr>
                <tr>
                    <td>Date </td>
                    <td><?php echo $event_result['Date']; ?></td>
                </tr>
                <tr>
                    <td>Time </td>
                    <td><?php echo $event_result['Time']; ?></td>
                </tr>
                <tr>
                    <td>Location </td>
                    <td><?php echo $event_result['Location']; ?></td>
                </tr>
                
                <tr>
                <td colspan="2">
                    <div class="btn1-container">
                        <button class="btn1" onclick="showConfirmation()">Register</button>
                    </div>
                </td>
                </tr>
            </table>

        </div>
    </div>    
    </div>

    <script>
    function showConfirmation() {
        Swal.fire({
            title: "Are you sure?",
            text: "You want to Registered!!!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'event_register.php?event_id=<?php echo $event_id; ?>&user_id=<?php echo $user_id; ?>'
            }
        });
    }
</script>
<?php 
    }
    else {
        echo "<script>alert('Please Login first.')</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
?>
</body>
</html>
