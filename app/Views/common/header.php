<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="noindex,nofollow">
    <title>Sonika Textiles BO</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png'); ?>">
    <link href="<?= base_url('assets/libs/flot/css/float-chart.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('dist/css/style.min.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js');?>"></script>
    <link href="<?= base_url('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css');?>" rel="stylesheet">
    <script src="<?= base_url('assets/libs/jquery/dist/jquery.validate.min.js');?>"></script>
    <script src="<?= base_url('assets/libs/jquery/dist/sweetalert2.all.min.js');?>"></script>
</head>
<style>
    .lang_setting{
        line-height: normal !important;
        height: auto !important;
        padding: 7px !important;
        margin-top: 14px !important;
        color : #000 !important;
    }
    .cicle_account{
        background: #ffffff;
        color: #05415e;
        padding: 5px 10px;
        border-radius: 41px;
        font-size: 25px;
    }
    .container-fluid::-webkit-scrollbar {
        width: 5px; 
    }

    .container-fluid::-webkit-scrollbar-thumb {
        background-color: #004566;
        border-radius: 5px;
    }
    label.error{
        position: absolute;
        font-size: 11px;
        color: #e30000;
    }
    .form-control.error{
        border: 1px solid #e30000;
    }
    .form-control:focus{
        border: #0070a7 1px solid;
    }
</style>
<script>            
    function successToaster(message){
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            showCloseButton:true,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        toastMixin.fire({
            animation: true,
            title: message
        });
    }          
    function errorToaster(message){
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'error',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            showCloseButton:true,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        toastMixin.fire({
            animation: true,
            title: message
        });
    }
</script>
<?php 
$session = session();
$locale = $session->get('locale') ?? 'en'; // Default to English if the language is not set
helper('language');
?>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon ps-2">
                            <img src="<?= base_url('assets/images/logo-icon.png'); ?>" alt="homepage" class="light-logo logo_icon" />

                        </b>
                        <span class="logo-text">ADMIN </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li>
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <?php
                                $session = session();
                                if ($session->has('userdata')) {
                                    $userdata = $session->get('userdata');
                                    echo "Welcome ".$userdata['username']."<br>";
                                }?>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <select class="nav-link lang_setting dropdown-toggle text-muted waves-effect waves-dark pro-pic"  data-bs-toggle="dropdown" name="language" id="language" onchange="change_language(this.value)">
                            <?php 
                                $locale = $session->get('locale') ?? 'en'; 
                                helper('language'); 
                                foreach(LANGUAGE as $key => $lang){ ?>
                                    <option value="<?= $key?>" <?= ($locale == $key) ? "selected" : "" ?>><?= $lang?></option>
                            <?php } ?>
                            </select>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                    <div class="ms-2">
                                                        <h5 class="mb-0">Event today</h5>
                                                        <span class="mail-desc">Just a reminder that event</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                    <div class="ms-2">
                                                        <h5 class="mb-0">Settings</h5>
                                                        <span class="mail-desc">You can customize this template</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                    <div class="ms-2">
                                                        <h5 class="mb-0">Pavan kumar</h5>
                                                        <span class="mail-desc">Just see the my admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                    <div class="ms-2">
                                                        <h5 class="mb-0">Luanch Admin</h5>
                                                        <span class="mail-desc">Just see the my new admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-account cicle_account"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user me-1 ms-1"></i>My Profile</a>
                                <a class="dropdown-item" href="<?= site_url('logout') ?>"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item <?php echo $set_active == 'dashboard' ? 'active' : ''; ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= site_url(); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"><?= lang("common.dashboard",[],$locale);?></span></a></li>
                        <?php
                        $userdata = $session->get('userdata');
                        if ( $userdata['is_admin'] == 1) {
                            ?>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu"><?= lang("common.customer",[],$locale);?> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item <?php echo $set_active == 'createAdmin' ? 'active' : ''; ?>"><a href="<?= base_url('createAdmin'); ?>" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> <?= lang("common.createCustomer",[],$locale);?>
                                        </span></a></li>
                                <li class="sidebar-item <?php echo $set_active == 'manageCustomer' ? 'active' : ''; ?>"><a href="<?= base_url('manageCustomer'); ?>" class="sidebar-link"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> <?= lang("common.manageCustomer",[],$locale);?>
                                        </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-check"></i><span class="hide-menu"><?= lang("common.category",[],$locale);?> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item <?php echo $set_active == 'createCategory' ? 'active' : ''; ?>"><a href="<?= base_url('createCategory'); ?>" class="sidebar-link"><i class="mdi mdi-playlist-plus"></i><span class="hide-menu"> <?= lang("common.createCategory",[],$locale);?>
                                        </span></a></li>
                                <li class="sidebar-item <?php echo $set_active == 'manageCategory' ? 'active' : ''; ?>"><a href="<?= base_url('manageCategory'); ?>" class="sidebar-link"><i class="mdi mdi-playlist-play"></i><span class="hide-menu"> <?= lang("common.manageCategory",[],$locale);?>
                                        </span></a></li>
                            </ul>
                        </li>
                        <?php 
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </aside>