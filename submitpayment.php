
<?php
session_start();

$hostName = "localhost"; // host name
$username = "root";  // database username
$password = ""; // database password
$databaseName = "agrozen"; // database name

$connection = new mysqli($hostName,$username,$password,$databaseName);
if (!$connection) {
    die("Error in database connection". $connection->connect_error);
}
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
if ($user_id) {
  $user_query = "SELECT Name FROM users WHERE id = '$user_id'";
  $user_result = $connection->query($user_query);
  if ($user_result && $user_result->num_rows > 0) {
      $user_data = $user_result->fetch_assoc();
      $user_name = $user_data['Name'];
  }
}

if ($user_id) {
  $user_query = "SELECT Phone FROM users WHERE id = '$user_id'";
  $user_result = $connection->query($user_query);
  if ($user_result && $user_result->num_rows > 0) {
      $user_data = $user_result->fetch_assoc();
      $phone_no = $user_data['Phone'];
  }
}
//$user_name = isset($_SESSION['Name']) ? $_SESSION['Name'] : null;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET,PUT,PATCH,DELETE');
header("Content-Type: application/json");
header("Accept: application/json");
header('Access-Control-Allow-Headers:Access-Control-Allow-Origin,Access-Control-Allow-Methods,Content-Type');


  if(isset($_POST['action']) && $_POST['action']='payOrder'){

    $razorpay_mode='test';
    
    $razorpay_test_key='rzp_test_R3LMpv8JDHOKYe'; //Your Test Key
    $razorpay_test_secret_key='NdkjD2kvU5oUmqdcks7R7C7s'; //Your Test Secret Key
    
    $razorpay_live_key= 'Your_Live_Key';
    $razorpay_live_secret_key='Your_Live_Secret_Key';
    
    if($razorpay_mode=='test'){
        
        $razorpay_key=$razorpay_test_key;
        
    $authAPIkey="Basic ".base64_encode($razorpay_test_key.":".$razorpay_test_secret_key);
    
    }else{
        
      $authAPIkey="Basic ".base64_encode($razorpay_live_key.":".$razorpay_live_secret_key);
      $razorpay_key=$razorpay_live_key;
    
    }
    
    // Set transaction details
    $order_id = uniqid(); 
    
    $billing_name=$_POST['billing_name'];
    $billing_mobile=$_POST['billing_mobile'];
    $billing_email=$_POST['billing_email'];
    // $shipping_name=$_POST['shipping_name'];
    // $shipping_mobile=$_POST['shipping_mobile'];
    // $shipping_email=$_POST['shipping_email'];
    $paymentOption=$_POST['paymentOption'];
    $payAmount=$_POST['payAmount'];
    $address=$_POST['address'];
    
    $note="Payment of amount Rs. ".$payAmount;
    
    $postdata=array(
    "amount"=>$payAmount*100,
    "currency"=> "INR",
    "receipt"=> $note,
    "notes" =>array(
                "notes_key_1"=> $note,
                "notes_key_2"=> ""
                  )
    );
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.razorpay.com/v1/orders',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>json_encode($postdata),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: '.$authAPIkey
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    $orderRes= json_decode($response);
    
     
  //   if(isset($orderRes->id)){
     
  //   $rpay_order_id=$orderRes->id;

  //   if (isset($_POST['products'])) {
  //     // Extract products from the form
  //     $products = $_POST['products'];

  //     // Split products string into an array
  //     $productList = explode(', ', $products);

  //     // Insert each product into the database
  //     foreach ($productList as $product) {
  //       // Extract product name and quantity from the product string
  //       preg_match('/^(.*?)\s*\((\d+)\)$/', $product, $matches);
  //       $productName = $matches[1];
  //       $productQuantity = $matches[2];
    
  //       // Assuming you have a table named 'orders' with columns 'user_id', 'product_name', 'quantity', 'billing_name', 'billing_mobile', 'billing_email', 'payment_option', 'amount_paid'
  //       $stmt = $connection->prepare("INSERT INTO orders (user_id, product_name, quantity, billing_name, billing_mobile, billing_email, payment_option, amount_paid, rpay_order_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
  //       // Assuming you have a user_id stored in $_SESSION['id']
  //       $stmt->bind_param("ississsdi", $_SESSION['id'], $productName, $productQuantity, $billing_name, $billing_mobile, $billing_email, $paymentOption, $payAmount, $rpay_order_id);
        
  //       $stmt->execute();
  //       $stmt->close();
  //   }
    
  // }


  if (isset($orderRes->id)) {
    $rpay_order_id = $orderRes->id;

    // Insert order details into the database
    if ($user_id && isset($_POST['products'])) {
        // Extract products from the form
        if (isset($_POST['products']) && isset($_POST['quantities'])) {
          // Extract products and quantities from the form
          $products = $_POST['products'];
          $quantities = $_POST['quantities'];
          
          // Split products and quantities strings into arrays
          $productList = explode(', ', $products);
          $quantityList = explode(',', $quantities);
      
          // Insert each product into the database
          for ($i = 0; $i < count($productList); $i++) {
              $productName = trim(explode('(', $productList[$i])[0]);
              $productQuantity = (int) trim(explode('(', $productList[$i])[1], ')');
              // Get the corresponding quantity
              $quantity = (int) $quantityList[$i];
      
              // Insert this product into the database
              $stmt = $connection->prepare("INSERT INTO orders (user_id, product_name, quantity, billing_name, payment_option, amount_paid, rpay_order_id,ordered_by,address,phone_no) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?)");
              $stmt->bind_param("issssdssss", $user_id, $productName, $quantity, $billing_name, $paymentOption, $payAmount, $rpay_order_id,$user_name,$address,$phone_no);
              $stmt->execute();
              $stmt->close();
          }

          // $stmt = $connection->prepare("DELETE FROM cart WHERE user_id = ?");
          // $stmt->bind_param("i", $user_id);
          // $stmt->execute();
          // $stmt->close();
      
          // Close the database connection
          $connection->close();
      }
      
    }
     
    $dataArr=array(
      'amount'=>$payAmount,
      'description'=>"Pay bill of Rs. ".$payAmount,
      'rpay_order_id'=>$rpay_order_id,
      'name'=>$billing_name,
      'email'=>$billing_email,
      'mobile'=>$billing_mobile
    );
    echo json_encode(['res'=>'success','order_number'=>$order_id,'userData'=>$dataArr,'razorpay_key'=>$razorpay_key]); exit;
    }else{
      echo json_encode(['res'=>'error','order_id'=>$order_id,'info'=>'Error with payment']); exit;
    }
    }
    else{
        echo json_encode(['res'=>'error']); exit;
    }


       ?>   
