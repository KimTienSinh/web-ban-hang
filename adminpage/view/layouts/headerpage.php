<?php
// session_start();

?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Focus - Bootstrap Admin Dashboard </title>
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
<link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
<link href="../view/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
<link href="../view/css/style.css" rel="stylesheet">
<link href="../view/css/lbs.css" rel="stylesheet">


<link href="../view/css/style1.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>


<div class="nav-header">
    <a href="index.php" class="brand-logo">
        <img class="logo-abbr" src="../view/images/logo.png" alt="">
        <img class="logo-compact" src="../view/images/logo-text.png" alt="">
        <img class="brand-title" src="../view/images/logo-text.png" alt="">
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>

<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                        <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                        <div class="dropdown-menu p-0 m-0">
                            <form>
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown notification_dropdown">

                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php
                            if (isset($_SESSION["email"])) {
                                echo'   <a href="./app-profile.html" class="dropdown-item">';
                                echo'   <i class="icon-user"></i> ';
                                echo'   <span class="ml-2"> '.$_SESSION["email"].' </span>';
                                echo'   </a>';

                                echo'   <a href="./email-inbox.html" class="dropdown-item">';
                                echo'   <i class="icon-envelope-open"></i>';
                                echo'   <span class="ml-2">Inbox </span>';
                                echo'   </a>';

                                echo'   <a href="../controller/UserController.php?action=logout" class="dropdown-item">';
                                echo'   <i class="icon-key"></i>';
                                echo'   <span class="ml-2">Logout </span>';
                                echo'   </a>';
                            } else {
                                echo'   <a href="../../userpage/view/login.php" class="dropdown-item">';
                                echo'   <i class="icon-user"></i> ';
                                echo'   <span class="ml-2">Login </span>';
                                echo'   </a>';
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

