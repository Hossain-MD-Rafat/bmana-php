<?php include('include/page_header.php') ?>

<?php
$ms_id = $_SESSION['ms_id'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/contacts/' . $ms_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$locations = json_decode($response);
curl_close($ch);
?>

<!--          Contact  Part  Start
     *****************************************-->
<section>
     <div class="contact" id="contact" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000">
          <div class="container">
               <div class="contact_wrapper">
                    <div class="row">
                         <div class="col-lg-12 p-0">
                              <div class="contect_info">
                                   <h4>Contact Information</h4>
                                   <p>Content here, content here', making it look like readable English. Many desktop publishing packages. Looking for help? Fill the form and start a new adventure.</p>
                                   <div class="row">
                                        <div class="col-lg-6">
                                             <?php foreach ($locations as $key => $item) { ?>
                                                  <div class="contact-details mb-5">
                                                       <div class="row w-100">
                                                            <div class="col-md-4">
                                                                 <h3><?= $item->header_text ?></h3>
                                                                 <span><?= $item->address ?></span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                 <div id="<?= $item->id ?>" style="height: 180px;"></div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             <?php } ?>
                                             <ul>
                                                  <li><a href="#"><span><i class="fa-brands fa-whatsapp"></i></span> <?= $ms_info->entity_phone ? $ms_info->entity_phone : "N/A" ?></a></li>
                                                  <li><a href="#"><span><i class="fa-solid fa-envelope"></i></span> <?= $ms_info->entity_email ? $ms_info->entity_email : "N/A" ?></a></li>
                                                  <li><a href="#"><span><i class="fa-solid fa-link"></i></span><?= $ms_info->website ? $ms_info->website : "N/A" ?></a></li>
                                                  <li><a href="#"><span><i class="fa-solid fa-location-dot"></i></span> <?= $ms_info->location ? $ms_info->location : "N/A" ?></a></li>
                                             </ul>
                                        </div>
                                        <div class="col-lg-6">
                                             <div class="row">
                                                  <div class="d-none" id="contact-info"></div>
                                                  <form method="POST" onsubmit="submitContact()">
                                                       <div class="col-lg-12">
                                                            <div class="form_wrapper">
                                                                 <input class="form_control" type="text" placeholder="Title" id="title">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12">
                                                            <div class="form_wrapper">
                                                                 <input class="form_control" type="text" placeholder="Full Name" id="name">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12">
                                                            <div class="form_wrapper">
                                                                 <input class="form_control" type="text" placeholder="E-mail Address" id="email">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12">
                                                            <div class="form_wrapper">
                                                                 <input class="form_control" type="text" placeholder="Phone Number" id="phone">
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12">
                                                            <div class="form_wrapper">
                                                                 <textarea class="form_control massage" type="text" placeholder="Massage" id="message"></textarea>
                                                            </div>
                                                       </div>
                                                       <div class="col-lg-12 mt-5">
                                                            <div class="contact_btn text-end">
                                                                 <button type="submit">Contact</button>
                                                            </div>
                                                       </div>
                                                  </form>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="icons_linker">
                                        <ul>
                                             <?php if ($ms_info->fb_url) { ?>
                                                  <li>
                                                       <a href=<?= $ms_info->fb_url ?>><i class="fa-brands fa-facebook"></i></a>
                                                  </li>
                                             <?php } ?>
                                             <?php if ($ms_info->twiter_url) { ?>
                                                  <li>
                                                       <a href=<?= $ms_info->twiter_url ?>><i class="fa-brands fa-twitter"></i></a>
                                                  </li>
                                             <?php } ?>
                                             <?php if ($ms_info->linkedin_url) { ?>
                                                  <li>
                                                       <a href=<?= $ms_info->linkedin_url ?>><i class="fa-brands fa-linkedin-in"></i></a>
                                                  </li>
                                             <?php } ?>
                                             <?php if ($ms_info->icircles_page) { ?>
                                                  <li>
                                                       <a href=<?= $ms_info->icircles_page ?>><img style="width: 45px;margin-bottom: 10px;" src="https://icircles.app/uploads/images/medium/logo.png" alt=""></a>
                                                  </li>
                                             <?php } ?>
                                        </ul>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>
<!--          Contact Part  End
     *****************************************-->
<?php include("include/footer.php") ?>

<script script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4mdf6nDkpbLo6ToEFm3Tx3aAIjEWwjIQ&libraries=places">
</script>
<script>
     $(document).ready(() => {
          fetch('http://localhost/rafat/user/micrositeprofile/contacts/' + "<?= $ms_id ?>")
               .then(response => response.json())
               .then(data => {
                    data.map((item) => {
                         let id = item.id;
                         let location = item.map_location.split(",");
                         let loc = {
                              lat: parseFloat(location[0]),
                              lng: parseFloat(location[1])
                         };
                         const map = new google.maps.Map(document.getElementById(`${item.id}`), {
                              zoom: 10,
                              center: loc,
                         });
                         const marker = new google.maps.Marker({
                              position: loc,
                              map: map,
                         });
                    })
               });
     });

     function submitContact() {
          event.preventDefault();
          const data = new FormData();
          data.append('name', $('#name').val());
          data.append('email', $('#email').val());
          data.append('phone', $('#phone').val());
          data.append('title', $('#title').val());
          data.append('message', $('#message').val());
          $.ajax({
               url: "https://icircles.app/api/medicalassociation/contact/" + <?= $ms_id ?>,
               method: 'post',
               processData: false,
               contentType: false,
               cache: false,
               data: data,
               success: function(res) {
                    res = JSON.parse(res);
                    if (res.status) {
                         $('#contact-info').html('<span class="text-center text-success">Your message has been sent successfully</span>')
                         $('#contact-info').removeClass('d-none');
                         $(":input").val('');
                    } else {
                         $('#contact-info').html('<span class="text-center text-danger">Message sent failed</span>')
                         $('#contact-info').addClass('d-none');
                         $(":input").val('');
                    }
               },
               error: function() {
                    $('#contact-info').html('<span class="text-center text-danger">Message sent failed</span>')
                    $('#contact-info').addClass('d-none');
                    $(":input").val('');
               }
          });
     }
</script>