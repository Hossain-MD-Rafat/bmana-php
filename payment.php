<?php

session_start();
require_once("vendor/stripe/stripe-php/init.php");


\Stripe\Stripe::setApiKey("sk_test_4eC39HqLyjWDarjtT1zdp7dc");

print_r($_POST);

if (isset($_POST['donate']) && !is_null($_POST['name']) && !is_null($_POST['email'])) {
    if (is_numeric($_POST['amount'])) {
        $nums = explode(".", $_POST['amount']);
        $int_val = (int)$nums[0];
        $decimal = (int)$nums[1];
        $amount = ($int_val * 100) + ($decimal);
        $customer_name = $_POST['name'];
        $customer_email = $_POST['email'];

        try {
            $session = \Stripe\Checkout\Session::create([
                "client_reference_id" => $customer_name,
                "payment_method_types" => ["card"],
                "customer_email" => $customer_email,
                "line_items" => [[
                    "price_data" => [
                        "currency" => "usd",
                        "product_data" => [
                            "name" => "premium subscription",
                        ],
                        "unit_amount" => $amount,
                    ],
                    "quantity" => 1,
                ]],
                "mode" => "payment",
                "success_url" => "http://localhost/bmana/success.php",
                "cancel_url" => "http://localhost/bmana/cancel.php",
            ]);
            $_SESSION['stripe_payment_id'] = $session->id;
            header('Location: ' . $session->url);
        } catch (\Throwable $th) {
            header('Location: cancel.php');
        }
    }
}




//$stripe = new \Stripe\StripeClient("sk_test_4eC39HqLyjWDarjtT1zdp7dc");
// $stripe->checkout->sessions->expire(
//     'cs_test_a1NwVwXEI7oCglOfv0bxtIX44bwEHltJzWlDe4vLCApYaZHP1srIp5oSlK',
//     []
// );

// $stripe->checkout->sessions->retrieve(
//     'cs_test_a1NwVwXEI7oCglOfv0bxtIX44bwEHltJzWlDe4vLCApYaZHP1srIp5oSlK',
//     []
// );

// $stripe->checkout->sessions->all(['limit' => 3]);

// $line_items = $stripe->checkout->sessions->allLineItems('cs_test_a1NwVwXEI7oCglOfv0bxtIX44bwEHltJzWlDe4vLCApYaZHP1srIp5oSlK', ['limit' => 5]);
