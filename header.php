<!DOCTYPE html>
<?php
require_once './validator.php';
include './DB.php';
$db = new DB();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.png">

    <title> File Tracking System </title>

    <?php include './stylesheet.php'; ?>

    <style>
        .form-group {
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            gap: 5px;
            justify-content: flex-start;
            margin: 0 10px;
        }
    </style>

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        <!--            <div id="loader"></div>-->

        <header class="main-header">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <!-- Logo -->
                <a href="home.php" class="logo">
                    <!-- logo-->

                    <div class="logo-lg">
                        <span class="light-logo"><img src="images/fpb_logo.png" style="width: 70px; height: 70px;" alt="logo"></span>
                        <span class="dark-logo"><img src="images/fpb_logo.png" style="width: 70px; height: 70px;" alt="logo"></span>
                    </div>
                </a>
            </div>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div class="app-menu">
                    <ul class="header-megamenu nav">
                        <li class="btn-group nav-item">
                            <a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
                                <i data-feather="menu"></i>
                            </a>
                        </li>
                        <li class="btn-group d-lg-inline-flex d-none">
                            <div class="app-menu">
                                <div class="search-bx mx-5">
                                    <form>
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon3"><i class="icon-Search"><span class="path1"></span><span class="path2"></span></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <li class="btn-group d-md-inline-flex d-none">

                            <label class="switch">

                                <span class="waves-effect skin-toggle waves-light">

                                    <input type="checkbox" data-mainsidebarskin="toggle" id="toggle_left_sidebar_skin">

                                    <span class="switch-on"><i data-feather="moon"></i></span>

                                    <span class="switch-off"><i data-feather="sun"></i></span>

                                </span>

                            </label>

                        </li>
                        <li class="dropdown notifications-menu btn-group ">
                            <a href="#" class="waves-effect waves-light btn-primary-light svg-bt-icon" data-bs-toggle="dropdown" title="Notifications">
                                <i data-feather="bell"></i>
                                <div class="pulse-wave"></div>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">
                                <li class="header">
                                    <div class="p-20">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">Notifications</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu sm-scrol">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-info"></i> No Notification
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all</a>
                                </li>
                            </ul>
                        </li>

                        <li class="btn-group nav-item d-xl-inline-flex d-none">
                            <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="Full Screen">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>

                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent p-0 no-shadow" title="User" data-bs-toggle="modal" data-bs-target="#quick_user_toggle">
                                <img src="images/avatar/avatar-13.png" class="avatar rounded-circle bg-primary-light h-40 w-40" alt="" />
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar position-relative">
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 97%;">
                        <!-- sidebar menu-->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li>
                                <a href="home.php">
                                    <i data-feather="home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <?php if ((int)$_SESSION['role'] == 6) { ?>
                                <li>
                                    <a href="users.php">
                                        <i data-feather="file-plus"></i>
                                        <span>Manage Staff</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="manage_role.php">
                                        <i data-feather="file-plus"></i>
                                        <span>Staff Role</span>
                                    </a>
                                </li>
                                <!-- <li class="treeview">
                                    <a href="#">
                                        <i data-feather="file-plus"></i>
                                        <span>Report</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Project Report</a></li>
                                        <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>All Reports</a></li>
                                        <li><a href="applications.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View trail</a></li>
                                    </ul>
                                </li> -->
                            <?php } ?>
                            <?php if ((int)$_SESSION['role'] == 1) { ?>
                                <li>
                                    <a href="apply.php">
                                        <i data-feather="file-plus"></i>
                                        <span>Apply</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ((int)$_SESSION['role'] <= 5) { ?>
                                <li>
                                    <a href="application.php">
                                        <i data-feather="file"></i>
                                        <?php if ((int)$_SESSION['role'] == 1) { ?>
                                            <span>Applications</span>
                                        <?php } ?>
                                        <?php if ((int)$_SESSION['role'] > 1) { ?>
                                            <span>Request</span>
                                        <?php } ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="treeview">
                                <a href="#">
                                    <i data-feather="headphones"></i>
                                    <span>Support</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Support Ticket</a></li>
                                    <li><a href="contact_app_chat.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chat</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </aside>