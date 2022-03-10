<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $Title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('/public/assets/vendor'); ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('/public/assets/css'); ?>/sb-admin-2.min.css" rel="stylesheet">
    <style>
        #student {
            transform: translate(50%, 50%);
        }

        @media screen and (max-width: 768px) {
            #student {
                transform: translate(0%, 0%) scale(.8);
            }
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Classroom/index'); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-chalkboard"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Classroom Management System</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('Classroom/index'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tables
            </div>

            <!-- Nav Item - Student -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Classroom/student'); ?>">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Students</span></a>
            </li>

            <!-- Nav Item - Teacher -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Classroom/teacher'); ?>">
                    <i class="fas fa-fw fa-chalkboard-teacher"></i>
                    <span>Teachers</span></a>
            </li>

            <!-- Nav Item - Course -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Classroom/course'); ?>">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Courses</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMINISTRATOR</span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('/public/assets/img'); ?>/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
