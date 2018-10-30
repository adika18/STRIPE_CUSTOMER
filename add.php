<?php
include ('Stripegateway.php');
$myStripe = new Stripegateway();
if(isset($_POST['btnsubmit'])){
	$data = array('email' => $_POST['email'],
		'description' => $_POST['description']);
	$result = $myStripe->customer($data);
	echo "<pre>"; print_r($result);
}