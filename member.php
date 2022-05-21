<?php include('include/page_header.php'); ?>

<?php


$ms_id = $_SESSION['ms_id'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/membersearch/' . $ms_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$result = json_decode($response);
//print_r($result);
curl_close($ch);

$members = [];

if (isset($_GET['id'])) {
     foreach ($result->data as $key => $member) {
          if ($member->id === $_GET['id']) {
               $members[$key] = $member;
               break;
          }
     }
} else {
     $members = $result->data;
}

?>

<section>
     <div class="mambershipSub">
          <div class="container">
               <div class="mambershipSub_wrapper">
                    <div class="mamber_wrapper">
                         <div class="row">
                              <?php foreach ($members as $key => $member) { ?>
                                   <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up-right" data-aos-easing="ease" data-aos-duration="5s">
                                        <div class="mamber_wrap">
                                             <div class="profile_img text-center">
                                                  <div class="p_img">
                                                       <img src=<?= "https://icircles.app/" . $member->thumb ?> alt="">
                                                  </div>
                                                  <h4><?= $member->designation ?></h4>
                                             </div>
                                             <div class="profile_info text-center">
                                                  <h5><?= $member->firstname . ' ' . $member->lastname ?></h5>
                                                  <h6 style="font-style: italic"><?= $member->speciality ?></h6>
                                             </div>
                                        </div>
                                   </div>
                              <?php } ?>
                         </div>
                    </div>
               </div>
          </div>
</section>

<?php
include('include/footer.php');
?>