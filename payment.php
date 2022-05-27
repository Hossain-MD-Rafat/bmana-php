<?php

session_start();
require_once("vendor/stripe/stripe-php/init.php");


\Stripe\Stripe::setApiKey("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");

if (isset($_POST['donate']) && !is_null($_POST['name']) && !is_null($_POST['email'])) {
    try {
        if (is_numeric($_POST['amount'])) {
            $nums = explode(".", $_POST['amount']);
            $int_val = (int)$nums[0];
            if (count($nums) > 1) {
                $decimal = (int)$nums[1];
            } else {
                $decimal = 0;
            }
            $amount = ($int_val * 100) + ($decimal);
        }
        $session = \Stripe\Checkout\Session::create([
            "client_reference_id" => $_POST['name'],
            "payment_method_types" => ["card"],
            "customer_email" => $_POST['email'],
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
        $donate = array(
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "id" => $session->id
        );
        $_SESSION['donate'] = $donate;
        header('Location: ' . $session->url);
    } catch (\Throwable $th) {
        header('Location: cancel.php?msg=' . $th->getMessage());
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
