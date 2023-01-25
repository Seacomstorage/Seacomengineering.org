<?php 
include('../config.php'); 

$api_key=$siteDetails['api_key'];
$secret_key=$siteDetails['secret_key'];

$purpose = "Payment";
$amount = $_POST["amount"]=100;
$name = $_POST["name"]='Amit';
$phone = $_POST["phone"]='9987899900';
$email = $_POST["email"]='a@g.in';
include 'src/Instamojo.php';
//$api = new Instamojo\Instamojo('29b34070bf5867b7d36bf2586c4f4855', '40d161c14f252cc781066e0c685f5f4d','https://www.instamojo.com/api/1.1/');
$api = new Instamojo\Instamojo($api_key, $secret_key,'https://www.instamojo.com/api/1.1/');
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $amount,
        "buyer_name" => $name,
        "phone" => $phone,
		"email" => $email,
        "send_email" => true,
        "send_sms" => true,
        'allow_repeated_payments' => false,
        "redirect_url" => $menu_url."instamojo/thankyou.php",
        "webhook" => $menu_url."instamojo/webhook.php"
        ));
   $pay_ulr = $response['longurl'];
    header("Location: $pay_ulr");
    exit();
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
 ?>