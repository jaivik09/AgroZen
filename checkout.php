<?php 
    session_start();
?>
<?php
	require 'config.php';
  $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
  if(isset($user_id))
  {
      require_once('setheader.php');
  } else {
      require_once('unsetheader.html');
  }

	$grand_total = 0;
	$allItems = '';
	$items = [];

  $productId = isset($_GET['pid']) ? $_GET['pid'] : null;
  $productName = isset($_GET['pname']) ? $_GET['pname'] : null;
  $productPrice = isset($_GET['pprice']) ? $_GET['pprice'] : null;
  $productQuantity = isset($_GET['pqty']) ? $_GET['pqty'] : null;
  $productImage = isset($_GET['pimage']) ? $_GET['pimage'] : null;

  // Check if product details are provided in URL parameters
  if ($productId && $productName && $productPrice && $productQuantity && $productImage) {
      // Append the details of the clicked product to the list of items
      $allItems .= $productName . ' (' . $productQuantity . ')';
      $grand_total += $productQuantity*$productPrice;
  }
  else{

    $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart WHERE user_id=$user_id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $grand_total += $row['total_price'];
      $items[] = $row['ItemQty'];
    }
    $allItems = implode(', ', $items);

  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@latest/dist/flowbite.min.css" rel="stylesheet">

  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@flowbite/css/dist/flowbite.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <link href="css/my/product_view.css" rel="stylesheet">
    <link href="css/my/product_catalog.css" rel="stylesheet">
    <!-- <link href="css/my/style.css" rel="stylesheet"> -->
    <link href="css/my/ownstyles1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body>
 
<div class="min-h-screen flex items-center justify-center bg-white-100 ">
  <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg py-10 ">
    <h4 class="text-center text-blue-500">Complete your order!</h4>
    <div class="rounded-lg bg-white-100 p-4 text-center">
      <h6 class="text-lg font-semibold mb-2">Product(s) : <?= $allItems; ?></h6>
      <h6 class="text-lg font-semibold mb-2">Delivery Charge : Free</h6>
      <h5 class="text-xl font-bold">Total Amount Payable : <?= number_format($grand_total, 2) ?>/-</h5>
    </div>
    <form method="post" id="placeOrder" class="mt-4">
      <input type="hidden" class="products" name="products" value="<?= $allItems; ?>">
      <input type="hidden" class="tot_amount" name="grand_total" id="grand_total" value="<?= $grand_total; ?>">
      <div class="mb-4">
        <input type="text" name="name" id="name" class="form-input block w-full" placeholder="Enter Name" required>
      </div>
      <div class="mb-4">
        <input type="email" name="email" id="email" class="form-input block w-full" placeholder="Enter E-Mail" required>
      </div>
      <div class="mb-4">
        <input type="tel" name="phone" id="phone" class="form-input block w-full" placeholder="Enter Phone" required>
      </div>
      <div class="mb-4">
        <textarea name="address" id="address" class="form-textarea block w-full" rows="3" placeholder="Enter Delivery Address Here..." required></textarea>
      </div>
      <div class="mb-4 flex justify-center">
      <button id="PayNow" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" type="button">Pay Now</button>
      </div>
    </form>
  </div>
</div>



<!-- 
<script>
    //Pay Amount
    jQuery(document).ready(function($){

jQuery('#PayNow').click(function(e){
  console.log('payNow clicked......');

	var paymentOption='';
let billing_name = $('#name').val();
	let billing_mobile = $('#phone').val();
	let billing_email = $('#email').val();
var paymentOption= "netbanking";
var payAmount = $('#grand_total').val();
			
var request_url="submitpayment.php";
		var formData = {
			billing_name:billing_name,
			billing_mobile:billing_mobile,
			billing_email:billing_email,
			paymentOption:paymentOption,
			payAmount:payAmount,
			action:'payOrder'
		}
		
		$.ajax({
			type: 'POST',
			url:request_url,
			data:formData,
			dataType: 'json',
			encode:true,
		}).done(function(data){
		
		if(data.res=='success'){
				var orderID=data.order_number;
				var orderNumber=data.order_number;
				var options = {
    "key": data.razorpay_key, // Enter the Key ID generated from the Dashboard
    "amount": data.userData.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Agrozen", //your business name
    "description": data.userData.description,
    "image": "https://www.tutorialswebsite.com/wp-content/uploads/2022/02/cropped-logo-tw.png",
    "order_id": data.userData.rpay_order_id, //This is a sample Order ID. Pass 
    "handler": function (response){

    window.location.replace("payment-success.php?oid="+orderID+"&rp_payment_id="+response.razorpay_payment_id+"&rp_signature="+response.razorpay_signature);

    },
    "modal": {
    "ondismiss": function(){
         window.location.replace("payment-success.php?oid="+orderID);
     }
},
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
        "name": data.userData.name, //your customer's name
        "email": data.userData.email,
        "contact": data.userData.mobile //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Agrozen"
    },
    "config": {
    "display": {
      "blocks": {
        "banks": {
          "name": 'Pay using '+paymentOption,
          "instruments": [
           
            {
                "method": paymentOption
            },
            ],
        },
      },
      "sequence": ['block.banks'],
      "preferences": {
        "show_default_blocks": true,
      },
    },
  },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){

    window.location.replace("payment-failed.php?oid="+orderID+"&reason="+response.error.description+"&paymentid="+response.error.metadata.payment_id);

         });
      rzp1.open();
     e.preventDefault(); 
}
 
});
 });
    });
</script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    //Pay Amount
    $(document).ready(function() {
      $('#PayNow').click(function() {
        var paymentOption = 'netbanking';
        let billing_name = $('#name').val();
        let billing_mobile = $('#phone').val();
        let billing_email = $('#email').val();
        var payAmount = $('#grand_total').val();
        var request_url = "submitpayment.php";
        var formData = {
          billing_name: billing_name,
          billing_mobile: billing_mobile,
          billing_email: billing_email,
          paymentOption: paymentOption,
          payAmount: payAmount,
          action: 'payOrder'
        };

        $.ajax({
          type: 'POST',
          url: request_url,
          data: formData,
          dataType: 'json',
          encode: true,
          success: function(data) {
            if (data.res == 'success') {
              var orderID = data.order_number;
              var options = {
                "key": data.razorpay_key,
                "amount": data.userData.amount,
                "currency": "INR",
                "name": "Agrozen",
                "description": data.userData.description,
                "image": "https://www.tutorialswebsite.com/wp-content/uploads/2022/02/cropped-logo-tw.png",
                "order_id": data.userData.rpay_order_id,
                "handler": function(response) {
                  window.location.replace("payment-success.php?oid=" + orderID + "&rp_payment_id=" + response.razorpay_payment_id + "&rp_signature=" + response.razorpay_signature);
                },
                "modal": {
                  "ondismiss": function() {
                    window.location.replace("payment-success.php?oid=" + orderID);
                  }
                },
                "prefill": {
                  "name": data.userData.name,
                  "email": data.userData.email,
                  "contact": data.userData.mobile
                },
                "notes": {
                  "address": "Agrozen"
                },
                "config": {
                  "display": {
                    "blocks": {
                      "banks": {
                        "name": 'Pay using ' + paymentOption,
                        "instruments": [{
                          "method": paymentOption
                        }],
                      },
                    },
                    "sequence": ['block.banks'],
                    "preferences": {
                      "show_default_blocks": true,
                    },
                  },
                },
                "theme": {
                  "color": "#3399cc"
                }
              };
              var rzp1 = new Razorpay(options);
              rzp1.on('payment.failed', function(response) {
                window.location.replace("payment-failed.php?oid=" + orderID + "&reason=" + response.error.description + "&paymentid=" + response.error.metadata.payment_id);
              });
              rzp1.open();
            }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      });
    });
  </script>

</body>

</html>