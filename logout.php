<?php
session_start();

?>
<html>
    <head>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
</html>
<?php
// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the sign-in page
echo "<script>
                                    swal({
                                        title: 'Log Out',
                                        text: 'You are successfully logged out',
                                        icon: 'success'
                                    }).then((result) => {
                                        if (result) {
                                            window.location.href = 'index.php';
                                        }
                                    });
                                </script>";
exit;
?>
