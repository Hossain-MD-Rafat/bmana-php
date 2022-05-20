<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMANA - 1981</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <?php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/home/166');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $result = json_decode($response);
    curl_close($ch);
    $main_nav = $result->data->main_nav;
    ?>


    <!--          Header Part strat
     *****************************************-->
    <header>
        <div class="header">
            <div class="container">
                <div class="row d-lg-block d-none">
                    <div class="col-lg-12 text-end">
                        <div class="header_wrapper">
                            <div class="header_search">
                                <form action="#">
                                    <input class="form_control" type="text" placeholder="Search">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </form>
                            </div>
                            <div class="language">
                                <a href="#">ENG <span><i class="fa-solid fa-caret-down"></i></span></a>
                                <ul class="sub_dom">
                                    <li><a href="#">BAN</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-block d-lg-none">
                    <div class="col-lg-12 text-end">
                        <a href="#" class="moble_navbar d-block d-lg-none nav_toggol" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight2"> <i class="fa-solid fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--          Header Part End
     *****************************************-->
    <!--          Header Part Two Part strat
     *****************************************-->
    <header>
        <div class="headerPartTwo d-lg-block d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="headerPartTwo_wrapper">
                            <div class="sideBar_wrapper">
                                <div class="sideBar_contain">
                                    <div class="logo text-center">
                                        <img src="images/bmana.png" alt="">
                                    </div>

                                    <div class="nav_list">
                                        <ul>
                                            <li><a href="index.html"> <span><i class="fa-solid fa-house"></i></span> Home</a></li>
                                            <?php foreach ($main_nav as $key => $item) { ?>
                                                <li><a href="about.html"> <span><i class="fa-solid fa-circle-info"></i></span> <?= $item->menu_name ?>
                                                        <?php if (count($item->sub_nav) > 0) { ?>
                                                            <span class="droppper"><i class="fa-solid fa-caret-down"></i></span>
                                                        <?php } ?>
                                                    </a>
                                                    <?php if (count($item->sub_nav) > 0) { ?>
                                                        <ul class="sub_down">
                                                            <?php
                                                            foreach ($item->sub_nav as $key => $sub_nav) {
                                                            ?>
                                                                <li><a href="page/?id=<?= $sub_nav->id ?>"><?= $sub_nav->menu_name ?></a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>
                                                </li>
                                            <?php } ?>
                                            <li><a href="contact.html"> <span><i class="fa-solid fa-phone"></i></span> Contact Us</a></li>
                                        </ul>
                                    </div>
                                    <div class="login_btn text-center">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"> <span><i class="fa-solid fa-user"></i></span> Member Login</a>
                                    </div>
                                    <div class="header_search">
                                        <form action="#">
                                            <input class="form_control" type="text" placeholder="Search">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--          Header Part Two Part End
     *****************************************-->
    <!--         NAv Offcan Part Start
     *****************************************-->
    <section>
        <div class="navbar_toggoler">
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight2" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <img src="images/bmana.png" alt="">
                    <h5 id="offcanvasRightLabel">
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="nav_list">
                        <div class="dropdown">
                            <a href="#">Home</a>
                        </div>
                    </div>
                    <div class="nav_list">
                        <div class="dropdown">
                            <a href="#" class="js-link1">About Us<i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list1">
                                <li><a href="#">About BMANA</a></li>
                                <li><a href="#">Mission and Vision</a></li>
                                <li><a href="#">President’s Message</a></li>
                                <li><a href="#">Executive Committee</a></li>
                                <li><a href="#">Honorees</a></li>
                                <li><a href="#">BMANA Alliance</a></li>
                                <li><a href="#">BMANA Constitution</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav_list">
                        <div class="dropdown">
                            <a href="#" class="js-link2">Mambership<i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list2">
                                <li><a href="#">About BMANA</a></li>
                                <li><a href="#">Mission and Vision</a></li>
                                <li><a href="#">President’s Message</a></li>
                                <li><a href="#">Executive Committee</a></li>
                                <li><a href="#">Honorees</a></li>
                                <li><a href="#">BMANA Alliance</a></li>
                                <li><a href="#">BMANA Constitution</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav_list">
                        <div class="dropdown">
                            <a href="#" class="js-link3">Media <i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list3">
                                <li><a href="#">About BMANA</a></li>
                                <li><a href="#">Mission and Vision</a></li>
                                <li><a href="#">President’s Message</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav_list">
                        <div class="dropdown">
                            <a href="#" class="js-link4">Events<i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list4">
                                <li><a href="#">About BMANA</a></li>
                                <li><a href="#">Mission and Vision</a></li>
                                <li><a href="#">President’s Message</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav_list">
                        <div class="dropdown">
                            <a href="#" class="js-link5">Resources <i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list5">
                                <li><a href="#">About BMANA</a></li>
                                <li><a href="#">Mission and Vision</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav_list">
                        <div class="dropdown">
                            <a href="#" class="js-link6">Chapters <i class="fa fa-chevron-down"></i></a>
                            <ul class="js-dropdown-list6">
                                <li><a href="#">About BMANA</a></li>
                                <li><a href="#">Mission and Vision</a></li>
                                <li><a href="#">President’s Message</a></li>
                                <li><a href="#">Executive Committee</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav_list">
                        <div class="dropdown">
                            <a href="#">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--         NAv Offcan Part Start
     *****************************************-->