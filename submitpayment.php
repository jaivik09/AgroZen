
<?php
require 'config.php';
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
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
     
    if(isset($orderRes->id)){
     
    $rpay_order_id=$orderRes->id;

    if (isset($_POST['products'])) {
      // Extract products from the form
      $products = $_POST['products'];

      // Split products string into an array
      $productList = explode(', ', $products);

      // Insert each product into the database
      foreach ($productList as $product) {
        // Extract product name and quantity from the product string
        preg_match('/^(.*?)\s*\((\d+)\)$/', $product, $matches);
        $productName = $matches[1];
        $productQuantity = $matches[2];
    
        // Assuming you have a table named 'orders' with columns 'user_id', 'product_name', 'quantity', 'billing_name', 'billing_mobile', 'billing_email', 'payment_option', 'amount_paid'
        $stmt = $connection->prepare("INSERT INTO orders (user_id, product_name, quantity, billing_name, billing_mobile, billing_email, payment_option, amount_paid, rpay_order_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Assuming you have a user_id stored in $_SESSION['id']
        $stmt->bind_param("ississsdi", $_SESSION['id'], $productName, $productQuantity, $billing_name, $billing_mobile, $billing_email, $paymentOption, $payAmount, $rpay_order_id);
        
        $stmt->execute();
        $stmt->close();
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
