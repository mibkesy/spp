<?php 

$menu       = strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title><?php echo $title; ?> - Sistem Informasi Pembayaran SPP</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/smpci.png">
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <link href="assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <link href='assets/lib/main.css' rel='stylesheet' />
    <style>
        #calendar .fc-day-today{
            background-color: #1ceadd !important;
        }
    </style>
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="admin/dashboard">
                    <span class="brand">SMA LAZUARDI 
                    </span>
                    <span class="brand-mini">GCS</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="assets/img/<?php echo $me['admin_foto']; ?>" />
                            <span></span><?php echo $me['admin_nama']; ?><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="<?php if($menu == 'admin' AND $sub_menu3 == 'profil'){echo 'active';} ?> dropdown-item" href="admin/atur/profil"><i class="fa fa-user"></i>Profil</a>
                            <a class="<?php if($menu == 'admin' AND $sub_menu3 == 'ttd'){echo 'active';} ?> dropdown-item" href="admin/atur/ttd"><i class="fa fa-image"></i>TTD</a>
                            <a class="<?php if($menu == 'admin' AND $sub_menu3 == 'password'){echo 'active';} ?> dropdown-item" href="admin/atur/password"><i class="fa fa-lock"></i>Password</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="admin/logout"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="assets/img/logo-sma-lazuardi.png" width="150px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo $me['admin_nama']; ?></div><small>Admin</small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="<?php if($menu == 'admin' AND $sub_menu == 'dashboard'){echo 'active';} ?>" href="admin/dashboard"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a class="<?php if($menu == 'admin' AND $sub_menu == 'kelas'){echo 'active';} ?>" href="admin/kelas"><i class="sidebar-item-icon fa fa-cubes"></i>
                            <span class="nav-label">Kelas</span>
                        </a>
                    </li>
                    
                    <li>
                        <a class="<?php if($menu == 'admin' AND $sub_menu == 'siswa'){echo 'active';} ?>" href="admin/siswa"><i class="sidebar-item-icon fa fa-users"></i>
                            <span class="nav-label">Siswa</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-folder"></i>
                            <span class="nav-label">Master</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse <?php if($menu == 'admin' AND $sub_menu == 'master'){echo 'in';} ?>">
                            <li>
                                <a class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'biaya-spp'){echo 'active';} ?>" href="admin/master/biaya-spp">Biaya SPP</a>
                            </li>
                            <li>
                                <a class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'biaya-infaq'){echo 'active';} ?>" href="admin/master/biaya-infaq">Biaya Infaq</a>
                            </li>
                            <li>
                                <a class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'biaya-akademik'){echo 'active';} ?>" href="admin/master/biaya-akademik">Biaya Akademik</a>
                            </li>
                            <li>
                                <a class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'biaya-registrasi'){echo 'active';} ?>" href="admin/master/biaya-registrasi">Biaya Registrasi</a>
                            </li>
                            <li>
                                <a class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'biaya-lainnya'){echo 'active';} ?>" href="admin/master/biaya-lainnya">Biaya Lain</a>
                            </li>
                            <li>
                                <a class="<?php if($menu == 'admin' AND $sub_menu == 'master' AND $sub_menu3 == 'akses'){echo 'active';} ?>" href="admin/master/akses">Akses</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="<?php if($menu == 'admin' AND $sub_menu == 'transaksi'){echo 'active';} ?>" href="admin/transaksi"><i class="sidebar-item-icon fa fa-money"></i>
                            <span class="nav-label">Transaksi</span>
                        </a>
                    </li>

                    <li>
                        <a class="<?php if($menu == 'admin' AND $sub_menu == 'transaksi-lainnya'){echo 'active';} ?>" href="admin/transaksi-lainnya"><i class="sidebar-item-icon fa fa-shopping-cart"></i>
                            <span class="nav-label">Transaksi Lainnya</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-cogs"></i>
                            <span class="nav-label">Pengaturan</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse <?php if($menu == 'admin' AND $sub_menu == 'pengaturan'){echo 'in';} ?>">
                            <li>
                                <a class="<?php if($menu == 'admin' AND $sub_menu == 'pengaturan' AND $sub_menu3 == 'tahun-pelajaran'){echo 'active';} ?>" href="admin/pengaturan/tahun-pelajaran">Tahun Pelajaran</a>
                            </li>
                            <li>
                                <a class="<?php if($menu == 'admin' AND $sub_menu == 'pengaturan' AND $sub_menu3 == 'kepala-sekolah'){echo 'active';} ?>" href="admin/pengaturan/kepala-sekolah">Kepala Sekolah</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="<?php if($menu == 'admin' AND $sub_menu == 'agenda'){echo 'active';} ?>" href="admin/agenda"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Agenda</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-file"></i>
                            <span class="nav-label">Laporan</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse <?php if($menu == 'admin' AND $sub_menu == 'laporan'){echo 'in';} ?>">
                            <li>
                                <a class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'transaksi'){echo 'active';} ?>" href="admin/laporan/transaksi">Transaksi</a>
                            </li>
                            <li>
                                <a class="<?php if($menu == 'admin' AND $sub_menu == 'laporan' AND $sub_menu3 == 'transaksi-lainnya'){echo 'active';} ?>" href="admin/laporan/transaksi-lainnya">Transaksi Lainnya</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="<?php if($menu == 'admin' AND $sub_menu == 'manual-book'){echo 'active';} ?>" href="admin/manual-book"><i class="sidebar-item-icon fa fa-book"></i>
                            <span class="nav-label">Manual Book</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>