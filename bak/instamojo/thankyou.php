<?php include('header.php'); ?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<h3 style="color:#6da552">Thank You, Payment succus!!</h3>


<?php
include 'src/Instamojo.php';
//$api = new Instamojo\Instamojo('YOU_PRIVATE_API_KEY', 'YOUR_PRIVATE_AUTH_TOKEN','https://test.instamojo.com/api/1.1/');
$api = new Instamojo\Instamojo($api_key, $secret_key,'https://test.instamojo.com/api/1.1/');


$payid = $_GET["payment_request_id"];
try {
    $response = $api->paymentRequestStatus($payid);
	echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
    echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
    echo "<h4>Payment Email: " . $response['payments'][0]['email'] . "</h4>" ;
echo "<pre>";
   print_r($response);
echo "</pre>";
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
?>


<?php include('footer.php'); ?>