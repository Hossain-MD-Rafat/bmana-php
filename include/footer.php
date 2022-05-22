<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/home/166');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$result = json_decode($response);
curl_close($ch);
$foot_nav = $result->data->foot_nav;
?>


<!--          Copyright Part Start
     *****************************************-->
<section>
    <div class="copyright">
        <div class="container">
            <div class="copyright_wrapper">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>@copyright 2022. All Rights Reserved by iCircles USA Bangladesh Ltd.</h4>
                    </div>
                    <div class="col-lg-5 d-flex justify-content-end align-items-center">
                        <h4>
                            <?php foreach ($foot_nav as $key => $item) { ?>
                                <a href=<?= "page/?id=" . $item->id ?>><?= $item->menu_name ?></a>
                            <?php } ?>
                        </h4>
                        <div class="icon">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--     Copyright Part End
     *****************************************-->

<!--      Login Registration  Part Start
     *****************************************-->
<section>
    <section id="modal_1">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="header_info">
                                    <img src="images/bmana.png" alt="">
                                    <h5>Bmana - Bangladesh Medical Association of North America</h5>
                                </div>
                                <!-- nab Tab -->
                                <ul class="nav nav-pills mb-3 text-center" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Sign In</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Sign Up</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="row">
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-8">
                                                <div class="signIn_body">
                                                    <div class="signin_form">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <form onsubmit="login()">
                                                                    <input type="text" class="form_control" id="email" placeholder="Email / Username">
                                                                    <input type="password" id="pass" class="form_control mt-3" placeholder="Password">
                                                                    <div class="continue_btn">
                                                                        <button type="submit"> <img src="images/logo.png" alt="">
                                                                            Log In</button>
                                                                    </div>
                                                                    <div class="forget_setion">
                                                                        <span><input type="checkbox" id="remember"> Remember Me</span>

                                                                        <a href="#" style="color:#0069cf;">Forgot Password</a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="signUp_body">
                                            <div class="signUp_form">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form onsubmit="registration()">
                                                            <input type="text" class="form_control" placeholder="First Name">
                                                            <input type="text" class="form_control" placeholder="Last Name">
                                                            <input type="text" class="form_control" placeholder="Home Address">
                                                            <input type="text" class="form_control" placeholder="Office Address">
                                                            <input type="text" class="form_control" placeholder="Faculty Affiliations & Speciations">
                                                            <input type="text" class="form_control" placeholder="Telephone">
                                                            <input type="text" class="form_control" placeholder="Call">
                                                            <input type="text" class="form_control" placeholder="E-mail">
                                                            <input type="text" class="form_control" placeholder="Medical School">
                                                            <input type="text" class="form_control" placeholder="State of Medical Licensure">
                                                            <input type="text" class="form_control" placeholder="License">
                                                            <input type="text" class="form_control" placeholder="Date">
                                                            <div class="statement">
                                                                <ul>
                                                                    <li><a href="#">
                                                                            <input type="checkbox">
                                                                            To The Best of my knowledge, the information is the correct status of my professional activity.

                                                                        </a></li>
                                                                    <li><a href="#">
                                                                            <input type="checkbox">
                                                                            I agree to disclose above information's for BMANA membership registry & publication.

                                                                        </a></li>
                                                                </ul>
                                                            </div>
                                                        </form>

                                                        <div class="continue_btn">
                                                            <a href="#"> <img src="images/logo.png" alt="">
                                                                Registration</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!--    Login Registration Part End
     *****************************************-->


<!--          BackToTop Part Start
     *****************************************-->
<a href="#" class="backtotop"></a>
<!--          BackToTop Part End
     *****************************************-->
<!--
         Javascript Script Linker Part
    [][][][][][[][][][][][[][][][][][][][][][][]-->
<script src="js/jquery-1.12.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>


</body>

</html>


<script>
    function login() {
        event.preventDefault();
        const data = new FormData();
        data.append('email', $('#email').val());
        data.append('pass', $('#pass').val());
        data.append('remember', $('#remember').is(':checked') ? 1 : 0);
        data.append('submit', 1);
        $.ajax({
            url: "auth.php",
            method: 'post',
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            success: function(res) {
                res = JSON.parse(res);
                console.log(res);
            },
            error: function() {

            }
        });
    }
</script>