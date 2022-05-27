<?php
require_once("vendor/stripe/stripe-php/init.php");

$stripe = new \Stripe\StripeClient("pk_live_51Kypt7JwWzF6rR1yOC6jCQ6Qi9XPCCKOdv908r5fZ2JuhvWkBcdUHLoDNbVfRFPbF5ZOPoiXNIPOCnIc1eagaWkb002XNiczM3");

session_start();

$user_reg = $_SESSION['user_reg'];

$payment = $stripe->checkout->sessions->retrieve(
    $user_reg['id'],
    []
);


if (isset($payment->payment_status) && $payment->payment_status == 'paid' && $payment->client_reference_id == $user_reg['ref_id']) {
    $ch = curl_init();
    $query = array(
        "payment_status" => $payment->payment_status == 'paid' ? 1 : 0
    );

    curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/update_payment/' . $user_reg['insert_id']);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($response);
    if ($result->status == 1) {
        unset($_SESSION['user_reg']);
        header('Location: index.php');
    }
}
