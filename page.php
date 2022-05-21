<?php include('include/page_header.php') ?>
<?php
$page_id = $_GET['id'];
$ms_id = $_SESSION['ms_id'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/page/' . $ms_id . '/' . $page_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$result = json_decode($response);
//print_r($result);
curl_close($ch);
?>

<div style="margin: 140px 0px 50px; text-align:center">

     <!--          ABOUT MAIN Part Start
     *****************************************-->
     <section>
          <div class="aboutMain">
               <div class="container">
                    <div class="row">
                         <div class="col-lg-12">
                              <div class="section_header">
                                   <h4><?= $result->data[0]->page_title ?></h4>
                              </div>
                         </div>
                    </div>
                    <div class="aboutMain_wrapper">
                         <div class="row">
                              <div class="col-lg-12">
                                   <div class="about_img">
                                        <?php if (isset($result->data[0]->featured_image)) { ?>
                                             <img src="<?= "https://icircles.app/uploads/content/" . $ms_id . "/" . $result->data[0]->featured_image ?>" alt="">
                                        <?php } ?>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <?php echo $result->data[0]->body_content; ?>
</div>

<?php include('include/footer.php') ?>