<?php include('include/register_header.php') ?>


<!-- Form 1 -->

<?php if (isset($_SESSION['reg_user']) && $_SESSION['reg_status']) { ?>
  <section style="margin-top: 7.5rem!important;">
    <div class="form-1">
      <div class="container">
        <div class="form_main">
          <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <div class="form_top_info">
                <div class="logo">
                  <img src="images/bmana.png" alt="">
                </div>
                <h5>BANGLADESH MEDICAL ASSOCIATION
                  OF NORTH AMERICA</h5>
              </div>
              <div class="info">
                <h6>MEMBERSHIP FORM</h6>
                <p>Physicians or Dentists of Bangladeshi origin or descent graduated from any WHO recognized medical
                  or dental college, or any non- Bangladeshi citizen graduated from a WHO recognized medical or
                  Dental college of Bangladesh, residing in North America are eligible to become member.
                </p>
              </div>
              <form action="auth.php" method="POST">
                <div class="top_table">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="table_item">
                        <h5> <input name="membership_type" class="cheque" type="radio" value="2"> LIFE MEMBERSHIP</h5>
                        <h6> $400 until 12/31/2022, after that $500 (no renewal required)</h6>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="table_item">
                        <h5> <input name="membership_type" class="cheque" type="radio" checked value="3"> Active Membership</h5>
                        <h6> $50.00/year (renewable yearly)</h6>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="table_item">
                        <h5> <input name="membership_type" class="cheque" type="radio" value="4"> Associate Membership</h5>
                        <h6> $25.00/year (renewable yearly)</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form_body">
                  <div class="row">
                    <div class="col-md-6 col-lg-6 d-flex justify-content-between m_list">
                      <label for="input"> First Name :</label>
                      <input type="text" class="form_control m_w100" placeholder="First Name" readonly value="<?= isset($_SESSION['reg_firstname']) ? $_SESSION['reg_firstname'] : '' ?>">
                    </div>
                    <div class="col-md-6 col-lg-6 d-flex justify-content-between m_list">
                      <label for="input"> Last Name :</label>
                      <input type="text" class="form_control m_w100" placeholder="Last Name" readonly value="<?= isset($_SESSION['reg_lastname']) ? $_SESSION['reg_lastname'] : '' ?>">
                    </div>
                    <div class="col-md-6 col-lg-12 mt-3 d-flex justify-content-between">
                      <label for="input"> E-mail :</label>
                      <input type="text" class="form_control" placeholder="E-mail" readonly value="<?= isset($_SESSION['reg_email']) ? $_SESSION['reg_email'] : '' ?>">
                    </div>
                    <div class="col-lg-12 mt-3 d-flex justify-content-between m_list">
                      <label for="input"> Home Address :</label>
                      <input type="text" class="form_control m_w100" placeholder="Home Address" name="home_address">
                    </div>
                    <div class="col-lg-12 mt-3 d-flex justify-content-between m_list">
                      <label for="input"> Office Address :</label>
                      <input type="text" class="form_control m_w100" placeholder="Office  Address" name="office_address">
                    </div>
                    <div class="col-lg-12 mt-3 d-flex justify-content-between">
                      <label for="input"> Speciality :</label>
                      <input type="text" class="form_control " placeholder="Speciality" name="speciality">
                    </div>
                    <div class="col-lg-12 mt-3 d-flex justify-content-between">
                      <label for="input" style="font-weight:700;"> Telephone -:</label>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1 d-flex justify-content-between">
                      <label for="input"> Cell :</label>
                      <input type="text" class="form_control" placeholder="Cell" name="cell">
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1 d-flex justify-content-between">
                      <label for="input"> Home :</label>
                      <input type="text" class="form_control" placeholder="Home" name="home_phone">
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1 mt_top d-flex justify-content-between">
                      <label for="input"> Office :</label>
                      <input type="text" class="form_control" placeholder="Office" name="office_phone">
                    </div>
                    <div class="col-lg-7 mt-3 d-flex justify-content-between">
                      <label for="input"> Medical School:</label>
                      <input type="text" class="form_control" placeholder="Medical School" name="medical_school">
                    </div>
                    <div class="col-md-6 col-lg-5 mt-3 d-flex justify-content-between">
                      <label for="input">Graduation Year :</label>
                      <input type="number" class="form_control" placeholder="Graduation Year " name="graduation_year">
                    </div>
                    <div class="col-md-6 col-lg-4 mt-3 d-flex justify-content-between">
                      <label for="input"> State of Medical Licensure: </label>
                      <input type="text" class="form_control" placeholder="Medical Licensure" class="state_license" name="state_license">
                    </div>
                    <div class="col-md-6 col-lg-3 mt-3 d-flex justify-content-between">
                      <label for="input"> Lic #</label>
                      <input type="text" class="form_control" placeholder="Lic #" name="lic">
                    </div>
                    <div class="col-md-6 col-lg-5 mt-3 d-flex justify-content-between">
                      <label for="input"> Affiliation: </label>
                      <input type="text" class="form_control" placeholder=" Affiliation" name="faculty_affiliation">
                    </div>
                    <div class="col-md-12 col-lg-4 mt-3 d-flex justify-content-between">
                      <label for="input" style="font-size: 20px;"> Preferred Mailing Address : </label>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-3 m_top">
                      <input name="mailing_address" type="radio" class="cheque" value="1">
                      <label for="input"> Home Address </label>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-3 m_top">
                      <input name="mailing_address" type="radio" class="cheque" value="2">
                      <label for="input"> Office Address </label>
                    </div>
                    <div class="top_table">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="table_item">
                            <h5> <input name="payment_method" class="cheque" type="radio" value="1"> Online Payment</h5>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="table_item">
                            <h5> <input name="payment_method" class="cheque" type="radio" value="0"> Offline Payment</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                      <label for="input"> STATEMENT : </label>
                    </div>
                    <div class="col-lg-12 d-flex align-items-center">
                      <input type="checkbox" class="cheque" name="term1" value="1">
                      <label for="input" style="font-size: 16px; color: #222121; padding-left: 10px;"> To the best of my knowledge, the information is the correct status of my professional activity.</label>
                    </div>
                    <div class="col-lg-12 d-flex align-items-center">
                      <input type="checkbox" class="cheque" name="term2" value="1">
                      <label for="input" style="font-size: 16px; color: #222121; padding-left: 10px;"> I agree to disclose above information’s for BMANA membership registry & publication. </label>
                    </div>

                  </div>
                  <div class="save_btn">
                    <input type="submit" name="register_two">
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-1"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } else { ?>
  <h4 class="text-danger">Something was wrong.</h4>
  <a href="index.php">Go Back</a>
<?php } ?>


<?php include('include/footer.php') ?>