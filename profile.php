<?php include('./include/header.php'); ?>

<?php
$ms_id = $_SESSION['ms_id'];
$ch = curl_init();
$query = array(
    "email" => $_POST['email'],
    "firstname" => $_POST['firstname'],
    "lastname" => $_POST['lastname'],
    "password" => $_POST['password'],
    "password2" => $_POST['password2'],
    "username" => $_POST['username'],
);
curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/membersearch/' . $ms_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$result = json_decode($response);
curl_close($ch);

$ms_id = $result->data->ms_id;
$front_section = $result->data->front_sections;
$sponsors = $result->data->sponsors;
$main_nav = $result->data->main_nav;
$no_position = $result->data->no_position;
$ms_info = $result->data->ms_info;
$sliders = $result->data->sliders;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/membersearch/' . $ms_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response1 = curl_exec($ch);
$members = json_decode($response1);
$members = $members->data;
curl_close($ch);



?>