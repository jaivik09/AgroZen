<?php
	session_start();
	require 'config.php';




    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['pid'], $_POST['pname'], $_POST['pprice'], $_POST['pqty'], $_POST['pimage'])) {
            // Sanitize and store the POST data
            $pid = $_POST['pid'];
            $pname = $_POST['pname'];
            $pprice = $_POST['pprice'];
            $pqty = $_POST['pqty'];
            $pimage = $_POST['pimage'];
            $total_price = $pprice * $pqty;


			$stmt = $connection->prepare('SELECT id FROM cart WHERE id=?');
			$stmt->bind_param('s', $pid);
			$stmt->execute();
			$res = $stmt->get_result();
			$code = $res->num_rows; 

                if($code==0)
                {
                    // Prepare SQL statement to insert data into the cart table
            $stmt = $connection->prepare("INSERT INTO cart (id, product_name, product_price, product_image, qty, total_price) VALUES (?, ?, ?, ?, ?, ?)");
            // Bind parameters
            $stmt->bind_param("isdsdd", $pid, $pname, $pprice, $pimage, $pqty, $total_price);
            // Execute the statement
            if ($stmt->execute()) {
                echo "Product added to cart successfully.";
            } else {
                echo "Error adding product to cart.";
            }
            // Close the statement
            $stmt->close();
        }  else {
			echo '<div class="alert alert-danger alert-dismissible mt-2">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Item already added to your cart!</strong>
		</div>';
              }
        }
            
    } else {
        echo "";
    }


    
    
	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $connection->prepare('SELECT * FROM cart');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $connection->prepare('DELETE FROM cart WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:prod_cart.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $connection->prepare('DELETE FROM cart');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:prod_cart.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $connection->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  $pmode = $_POST['pmode'];

	  $data = '';

	  $stmt = $connection->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssss',$name,$email,$phone,$address,$pmode,$products,$grand_total);
	  $stmt->execute();
	  $stmt2 = $connection->prepare('DELETE FROM cart');
	  $stmt2->execute();
	  $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
						  </div>';
	  echo $data;
	}
?>