<?php

include("./vendor/autoload.php");

class Stripegateway{
	public function __construct(){
		$stripe = array(


			"secret_key" => "sk_test_N0G71Kbwv6MmSV9Rk3bO24LY",
			"public_key" => "pk_test_eNqWYyyNXBYayJ3HAzsFNwUz");

		\Stripe\Stripe::setApiKey($stripe["secret_key"]);
	}

	public function checkout($data){
		$message = "";
		try{
			$mycard = array('number' => $data['number'],
				'exp_month' => $data['exp_month'],
				'exp_year' => $data['exp_year']);
			$charge = \Stripe\Charge::create(array('card' => $mycard,
				'amount' => $data['amount'],
				'curency' => 'usd'));

			$message = $charge->status;
		}catch(Exception $e){
			$message = $e->getMessage();
		}
		return $message;
	}

	public function customer($data){
		$message = "";
		try{
			$customer = \Stripe\Customer::create(array('email' => $data['email'],
				'description' => $data['description']));

		}catch(Exception $e){
			$message = $e-getMessage();
		}
		return $message;
	}
}