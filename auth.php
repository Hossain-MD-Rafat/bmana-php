<?php
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

    if (isset($result->user_id) && $result->status) {
        $_SESSION['reg_user'] = $result->user_id;
        $_SESSION['reg_status'] = $result->status;
        header('Location: userRegister.php');
    } else {
        $_SESSION['reg_status'] = false;
        header('Location: userRegister.php');
    }
}


if (isset($_POST['register_two'])) {

    print_r($_POST);

    // $_SESSION['user_id'] = $result->user_id;
    // $query1 = array(
    //     "microsite_id" => $_SESSION['ms_id'],
    //     "user_id" => $result->user_id,
    //     "speciality" => $_POST['speciality'],
    //     "about_member" => $_POST['about_member'],
    //     "comments" => $_POST['comments'],
    //     "home_address" => $_POST['home_address'],
    //     "office_address" => $_POST['office_address'],
    //     "faculty_affiliation" => $_POST['faculty_affiliation'],
    //     "phone" => $_POST['phone'],
    //     "medical_school" => $_POST['medical_school'],
    //     "state_license" => $_POST['state_license'],
    // );

    // curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/register');
    // curl_setopt($ch, CURLOPT_POST, true);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query1));
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $response = curl_exec($ch);
    // $res = json_decode($response);
    // echo $response;
    // return;
}
