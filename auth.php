<?php
require_once("vendor/stripe/stripe-php/init.php");
\Stripe\Stripe::setApiKey("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");
session_start();
if (isset($_POST['submit'])) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/login');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $result = json_decode($response);
    if ($result->status) {
        $_SESSION['username'] = $_POST['email'];
        $_SESSION['remember'] = $_POST['remember'];
        $_SESSION['token'] = $result->token;
        $_SESSION['user_id'] = $result->user_id;
    }
    curl_close($ch);
    echo $response;
}
if (isset($_POST['register'])) {
    $ch = curl_init();
    $query = array(
        "email" => $_POST['email'],
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "password" => $_POST['password'],
        "password2" => $_POST['password2'],
        "username" => $_POST['username'],
    );
    curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/register');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $result = json_decode($response);
    curl_close($ch);

    if (isset($result->user_id) && $result->status) {
        $_SESSION['reg_user'] = $result->user_id;
        $_SESSION['reg_status'] = $result->status;
        $_SESSION['reg_email'] = $_POST['email'];
        $_SESSION['reg_firstname'] = $_POST['firstname'];
        $_SESSION['reg_lastname'] = $_POST['lastname'];
        header('Location: userRegister.php');
    } else {
        $_SESSION['reg_status'] = false;
        header('Location: userRegister.php');
    }
}


if (isset($_POST['register_two'])) {
    $ch = curl_init();
    $data = $_POST;
    $amount = 400;
    $name = "Life Membership";
    if ((int)$_POST['membership_type'] == 2) {
        $amount = 40000;
        $name = "Life Membership";
    } elseif ((int)$_POST['membership_type'] == 3) {
        $amount = 5000;
        $name = "Active Membership";
    } elseif ((int)$_POST['membership_type'] == 4) {
        $amount = 2500;
        $name = "Associate Membership";
    }
    $data['microsite_id'] = $_SESSION['ms_id'];
    $data['user_id'] =  $_SESSION['reg_user'];
    $data['amount'] =  $amount / 100;
    curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/register');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $res = json_decode($response);
    curl_close($ch);
    if ($res->status && $_POST['payment_method'] == 1) {

        $id = strtotime("now");
        try {
            $session = \Stripe\Checkout\Session::create([
                "client_reference_id" => $id,
                "payment_method_types" => ["card"],
                "customer_email" => $_SESSION['reg_email'],
                "line_items" => [[
                    "price_data" => [
                        "currency" => "usd",
                        "product_data" => [
                            "name" => $name,
                        ],
                        "unit_amount" => $amount,
                    ],
                    "quantity" => 1,
                ]],
                "mode" => "payment",
                "success_url" => "http://localhost/bmana/reg_success.php",
                "cancel_url" => "http://localhost/bmana/cancel.php",
            ]);
            $user_reg = array(
                "id" => $session->id,
                "ref_id" => $id,
                "user_id" => $_SESSION['reg_user'],
                "insert_id" => $res->insert_id
            );
            $_SESSION['user_reg'] = $user_reg;
            header('Location: ' . $session->url);
        } catch (\Throwable $th) {
            header('Location: cancel.php?msg=' . $th->getMessage());
        }
    }
}
