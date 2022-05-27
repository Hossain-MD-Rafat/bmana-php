<?php
require_once("vendor/stripe/stripe-php/init.php");

$stripe = new \Stripe\StripeClient("sk_test_4eC39HqLyjWDarjtT1zdp7dc");

session_start();

$donate = $_SESSION['donate'];

$payment = $stripe->checkout->sessions->retrieve(
    $donate['id'],
    []
);

if (isset($payment->payment_status) && $payment->payment_status == 'paid') {
    $ch = curl_init();
    $query = array(
        'user_id' => isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '',
        'microsite_id' => isset($_SESSION['ms_id']) ? $_SESSION['ms_id'] : '',
        "email" => $donate['email'],
        "name" => $donate['name'],
        "amount" => ((float)$payment->amount_total) / 100,
        "status" => $payment->payment_status
    );
    curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/process_donation');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $result = json_decode($response);
    if ($result->status == 1) {
        unset($_SESSION['donate']);
        header('Location: thankYou.php');
    }
}


//print_r(date("Y-m-d H:i:s", $s->expires_at));
