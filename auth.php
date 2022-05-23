<?php
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
    }
    curl_close($ch);
    echo $response;
}
if (isset($_POST['registration'])) {
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

    if (isset($result->user_id) && $result->status) {
        $query1 = array(
            "email" => $_POST['email'],
            "firstname" => $_POST['firstname'],
            "lastname" => $_POST['lastname'],
            "password" => $_POST['password'],
            "password2" => $_POST['password2'],
            "username" => $_POST['username'],
        );

        curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/register');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $result = json_decode($response);
    }
}
