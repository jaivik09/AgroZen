<?php
    session_start();

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "agrozen";
    $link = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    if($link == false)
    {
        die("Error : Couldn't Connect ". mysqli_connect_error());
    }
    if(isset($_SESSION['id'])){

        $id = $_SESSION['id'];
        
        $sql = "SELECT * FROM users WHERE id = $id";
    
        $result =mysqli_query($link,$sql);
        $row = mysqli_fetch_array($result);
    
        if($row['Role'] === "farmer")
        {
            require_once('farmerdashboard.php');
        } else {
            require_once('userdashboard.php');
        }
    }
    else{
        echo "<script>alert('Your session has been expired !!'); window.location.href='index.php'</script>";
        
    }

?>