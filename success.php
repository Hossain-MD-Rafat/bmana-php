<?php
require_once("vendor/stripe/stripe-php/init.php");

$stripe = new \Stripe\StripeClient("sk_test_4eC39HqLyjWDarjtT1zdp7dc");

session_start();


$id = $_SESSION['stripe_payment_id'];

$s = $stripe->checkout->sessions->retrieve(
    $id,
    []
);

print_r($s->amount_total);
echo "</br>";
print_r($s->payment_status);

//print_r(date("Y-m-d H:i:s", $s->expires_at));
