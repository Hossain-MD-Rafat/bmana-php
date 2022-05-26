<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMANA - 1981</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    session_start();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://icircles.app/api/medicalassociation/home/166');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $result = json_decode($response);
    curl_close($ch);
    $main_nav = $result->data->main_nav;
    $ms_info = $result->data->ms_info;
    $ms_id = $result->data->ms_id;
    $_SESSION['ms_id'] = $ms_id;
    ?>


    <!--        SubPage Header Part strat
     *****************************************-->
    <header>
        <div class="SubpageHeader d-none d-lg-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="SubpageHeader_wrapper">
                            <div class="sideBar_wrapper">
                                <div class="sideBar_contain">
                                    <div class="logo text-center">
                                        <img src="images/bmana.png" alt="">
                                    </div>
                                    <div class="nav_list">
                                        <ul>
                                            <li><a href="index.php"> <span><i class="fa-solid fa-house"></i></span> Home</a></li>

                                            <?php foreach ($main_nav as $key => $item) { ?>
                                                <li><a href="page.php?id=<?= $item->id ?>"> <span><i class="fa-solid fa-circle-info"></i></span> <?= $item->menu_name ?>
                                                        <?php if (count($item->sub_nav) > 0) { ?>
                                                            <span class="droppper"><i class="fa-solid fa-caret-down"></i></span>
                                                        <?php } ?>
                                                    </a>
                                                    <?php if (count($item->sub_nav) > 0) { ?>
                                                        <ul class="sub_down">
                                                            <?php
                                                            foreach ($item->sub_nav as $key => $sub_nav) {
                                                            ?>
                                                                <li><a href="page.php?id=<?= $sub_nav->id ?>"><?= $sub_nav->menu_name ?></a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>
                                                </li>
                                            <?php } ?>

                                            <li><a href="contact.php"> <span><i class="fa-solid fa-phone"></i></span> Contact Us</a></li>
                                        </ul>
                                    </div>
                                    <div class="login_btn text-center">
                                        <?php if (isset($_SESSION['username']) && $_SESSION['username']) { ?>
                                            <a href="profile.php"> <span><i class="fa-solid fa-user"></i></span><?= $_SESSION['username'] ?></a>
                                        <?php } else { ?>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"> <span><i class="fa-solid fa-user"></i></span> Member Login</a>
                                        <?php } ?>
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
    <!--         SubPage Header Part strat
     *****************************************-->
    <header>
        <div class="header">
            <div class="container">
                <div class="row d-block d-lg-none">
                    <div class="col-lg-12 text-end">
                        <a href="#" class="moble_navbar d-block d-lg-none nav_toggol" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight2"> <i class="fa-solid fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
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
                            <a href="index.php">Home</a>
                        </div>
                    </div>
                    <?php foreach ($main_nav as $key => $item) { ?>
                        <div class="nav_list">
                            <div class="dropdown">
                                <a href="#" class=<?= "js-link" . $key; ?>>
                                    <?= $item->menu_name ?>
                                    <?php if (count($item->sub_nav) > 0) { ?>
                                        <i class="fa fa-chevron-down"></i>
                                    <?php } ?>
                                </a>
                                <?php if (count($item->sub_nav) > 0) { ?>
                                    <ul class=<?= "js-dropdown-list" . $key; ?>>
                                        <?php foreach ($item->sub_nav as $key => $sub_nav) { ?>
                                            <li><a href=<?= "page.php?id=" . $sub_nav->id ?>><?= $sub_nav->menu_name ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="nav_list">
                        <div class="dropdown">
                            <a href="contact.php">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--         NAv Offcan Part Start
     *****************************************-->
    <!--          Phisiyan Search Part strat
     *****************************************-->
    <section>
        <div class="phySearch">
            <div class="container">
                <div class="phySearch_wrapper">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="phySearch_wrap">
                                <div class="phySearch_search" data-aos="fade-up-left" data-aos-easing="ease" data-aos-duration="5s">
                                    <h4 class="text-center">SEARCH FOR A BMANA PHYSICIAN</h4>
                                    <form action="#" onsubmit="searchMembers(<?= $ms_id; ?>)">
                                        <div class="member-search">
                                            <ul id="search-result" class="d-none">
                                            </ul>
                                            <input id="search_key" class="form_control" oninput="searchMembers(<?= $ms_id; ?>)" type="text" placeholder="SEARCH BMANA PHYSICIAN">
                                            <a onclick="searchMembers(<?= $ms_id; ?>)"> <i class="fa-solid fa-magnifying-glass"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--          Phisiyan Search Part End
     *****************************************-->
    <script>
        let data;
        const str = ".*";


        function searchMembers(ms_id) {
            if ($('#search_key').val().length < 2) {
                $('#search-result').empty();
                $('#search-result').removeClass('d-block');
                $('#search-result').addClass('d-none');
                return;
            }
            const targetTXT = new RegExp(str + $('#search_key').val() + str, "gi");
            event.preventDefault();
            if (!data) {
                $.ajax({
                    url: 'https://icircles.app/api/medicalassociation/membersearch/' + ms_id,
                    type: "GET",
                    success: function(res) {
                        let resData = JSON.parse(res);
                        data = resData.data;
                        let hs = ``;
                        data.map((item) => {
                            if ((item.firstname + " " + item.lastname).match(targetTXT)) {
                                hs += `<li><a href="member.php?id=${item.id}">${item.firstname}</a></li>`
                            }
                        })
                        if (hs.length > 5) {
                            $('#search-result').empty().append(hs);
                            $('#search-result').removeClass('d-none');
                            $('#search-result').addClass('d-block');
                        } else {
                            $('#search-result').empty();
                            $('#search-result').removeClass('d-block');
                            $('#search-result').addClass('d-none');
                        }
                    }
                });
            } else {
                let hs = ``;
                data.map((item) => {
                    if ((item.firstname + " " + item.lastname).match(targetTXT)) {
                        hs += `<li><a href="member.php?id=${item.id}">${item.firstname}</a></li>`
                    }
                })
                if (hs.length > 5) {
                    $('#search-result').empty().append(hs);
                    $('#search-result').removeClass('d-none');
                    $('#search-result').addClass('d-block');
                } else {
                    $('#search-result').empty();
                    $('#search-result').removeClass('d-block');
                    $('#search-result').addClass('d-none');
                }

            }
        }
    </script>