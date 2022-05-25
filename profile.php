<?php include('./include/page_header.php'); ?>

<?php
$ms_id = $_SESSION['ms_id'];
$user_id = $_SESSION['user_id'];
$ch = curl_init();
$query = array(
    "user_id" => 288,
);
curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/membersearch/' . $ms_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
$response = curl_exec($ch);
$result = json_decode($response);
$result = $result->data[0];
curl_close($ch);

?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="offset-md-1 col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <img class="w-75" src=<?= "https://icircles.app/" . $result->thumb ?> alt="profile-image">
                    <br>
                    <a href="logout.php" class="btn btn-primary">Log Out</a>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li>Name: <?= $result->firstname . ' ' . $result->lastname ?></li>
                        <li>Designation: <?= $result->designation ?></li>
                        <li>speciality: <?= $result->speciality ?></li>
                        <li>Member Type: <?= $result->membertype ?></li>
                        <li>Email: <?= $result->email ?></li>
                        <li>Home Address: <?= $result->home_address ?></li>
                        <li>Office Address: <?= $result->office_address ?></li>
                        <li>Faculty Affiliation: <?= $result->faculty_affiliation ?></li>
                        <li>Phone: <?= $result->phone ?></li>
                        <li>Medical School: <?= $result->medical_school ?></li>
                        <li>State License: <?= $result->state_license ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>






<?php include('./include/footer.php'); ?>