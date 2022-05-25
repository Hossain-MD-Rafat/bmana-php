<?php
require_once("vendor/stripe/stripe-php/init.php");


\Stripe\Stripe::setApiKey("sk_test_4eC39HqLyjWDarjtT1zdp7dc");

$session = \Stripe\Checkout\Session::create([
    "payment_method_types" => ["card"],
    "line_items" => [[
        "price_data" => [
            "currency" => "usd",
            "product_data" => [
                "name" => "abc",
            ],
            "unit_amount" => 10000,
        ],
        "quantity" => 1,
    ]],
    "mode" => "payment",
    "success_url" => "https://example.com/success",
    "cancel_url" => "https://example.com/cancel",
]);

print_r($session->url);
