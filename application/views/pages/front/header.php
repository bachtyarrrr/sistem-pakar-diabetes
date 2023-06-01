<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Pakar Diagnosa Penyakit Diabetes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- set the apple mobile web app capable -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- set the HandheldFriendly -->
    <meta name="HandheldFriendly" content="True">
    <!-- set the apple mobile web app status bar style -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">


    <link
        href="<?php echo base_url(); ?>assets/medbloc/fonts.googleapis.com/css2f55.css?family=Montserrat:300,400,500,600,700"
        rel="stylesheet">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/medbloc/css/bootstrap.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/medbloc/css/font-awesome.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/medbloc/css/plugins.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/medbloc/style.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/medbloc/css/responsive.css">
    <style type="text/css">
    .modal-header {
        padding: 0;
    }

    .modal-header .close {
        padding: 10px 15px;
    }

    .modal-header ul {
        border: none;
    }

    .modal-header ul li {
        margin: 0;
    }

    .modal-header ul li a {
        border: none;
        border-radius: 0;
    }

    .modal-header ul li.active a {
        color: #1c80df;
    }

    .modal-header ul li a:hover {
        border: none;
    }

    .modal-header ul li a span {
        margin-left: 10px;
    }

    .modal-body .form-group {
        margin-bottom: 10px;
    }

    .modal-open {
        overflow: hidden
    }

    .modal {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1040;
        display: none;
        overflow: hidden;
        -webkit-overflow-scrolling: touch;
        outline: 0
    }

    .modal.fade .modal-dialog {
        -webkit-transition: -webkit-transform .3s ease-out;
        -o-transition: -o-transform .3s ease-out;
        transition: transform .3s ease-out;
        -webkit-transform: translate(0, -25%);
        -ms-transform: translate(0, -25%);
        -o-transform: translate(0, -25%);
        transform: translate(0, -25%)
    }

    .modal.in .modal-dialog {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0)
    }

    .modal-open .modal {
        overflow-x: hidden;
        overflow-y: auto
    }

    .modal-dialog {
        position: relative;
        width: auto;
        margin: 10px
    }

    .modal-content {
        position: relative;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 6px;
        outline: 0;
        -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
        box-shadow: 0 3px 9px rgba(0, 0, 0, .5)
    }

    .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: #000
    }

    .modal-backdrop.fade {
        opacity: 0
    }

    .modal-backdrop.in {
        opacity: .5
    }

    .modal-header {
        min-height: 16.43px;
        padding: 15px;
        border-bottom: 1px solid #e5e5e5
    }

    .modal-header .close {
        margin-top: -2px
    }

    .modal-title {
        margin: 0;
        line-height: 1.42857143
    }

    .modal-body {
        position: relative;
        padding: 15px
    }

    .modal-footer {
        padding: 15px;
        text-align: right;
        border-top: 1px solid #e5e5e5
    }

    .modal-footer .btn+.btn {
        margin-bottom: 0;
        margin-left: 5px
    }

    .modal-footer .btn-group .btn+.btn {
        margin-left: -1px
    }

    .modal-footer .btn-block+.btn-block {
        margin-left: 0
    }

    .modal-scrollbar-measure {
        position: absolute;
        top: -9999px;
        width: 50px;
        height: 50px;
        overflow: scroll
    }

    @media (min-width:768px) {
        .modal-dialog {
            width: 600px;
            margin: 30px auto
        }

        .modal-content {
            -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5)
        }

        .modal-sm {
            width: 300px
        }
    }

    @media (min-width:992px) {
        .modal-lg {
            width: 900px
        }
    }

    @media print {
        .noPrint {
            display: none;
        }
    }

    .Print {
        display: block;
    }
    }



    }

    .Print {
        display: none;
    }

    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */
    }
    </style>


</head>

<body>


    <!-- main container of all the page elements -->
    <div id="wrapper">
        <!-- header of the page -->
        <header id="header" class="noPrint">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- logo of the page -->
                        <div class="logo pull-left">
                            <a href="<?php echo base_url(); ?>"
                                style="color:#fff; font-weight: bold; font-size:15px">Sistem Pakar Diabetes</a>


                        </div>
                        <!-- menu holder of the page -->
                        <div class="menu-holder">
                            <a href="#" class="nav-opener"><i class="fa fa-bars"></i></a>
                            <!-- nav of the page -->
                            <nav id="nav">
                                <ul class="list-unstyled text-capitalize fwSemi-bold">
                                    <?php if (empty($this->session->userdata('username'))) {  ?>
                                    <li><a href="#" class="smooth"
                                            onclick="return confirm('Maaf Anda Harus Login Untuk Cek gula Darah!')"
                                            style="color:#fff">Cek Gula Darah</a></li>
                                    <li><a href="#" class="smooth"
                                            onclick="return confirm('Maaf Anda Harus Login Untuk konsultasi!')"
                                            style="color:#fff">Konsultasi Sekarang</a></li>
                                    <?php } else { ?>
                                    <?php

                    $email = $this->session->userdata('email');
                    $cek = $this->db->query("SELECT count(log_gula.id_log) as cek FROM log_gula join peserta on peserta.id_peserta=log_gula.id_peserta where peserta.email='$email' order by log_gula.id_log desc")->row()->cek;

                    if ($cek < 1) {  ?>

                                    <li><a href="<?php echo base_url('Halaman/cekgula'); ?>" class="smooth"
                                            style="color:#fff">Cek Gula Darah</a></li>
                                    <?php   } else {

                      $email = $this->session->userdata('email');
                      $awal = $this->db->query("SELECT tanggal FROM log_gula join peserta on peserta.id_peserta=log_gula.id_peserta where peserta.email='$email' order by log_gula.id_log desc")->row()->tanggal;

                      $tgl1 = new DateTime($awal);
                      $tgl2 = new DateTime(date('Y-m-d'));
                      $d = $tgl2->diff($tgl1)->days + 1;


                      if ($d <= '30') {
                      ?>
                                    <li><a href="#" class="smooth" style="color:#fff"
                                            onclick="return confirm('Maaf Sudah Pernah Mengikuti Cek Mohon tunggu 6 bulan lagi')">Cek
                                            Gula Darah</a></li>
                                    <?php } else { ?>

                                    <li><a href="<?php echo base_url('Halaman/cekgula'); ?>" class="smooth"
                                            style="color:#fff">Cek Gula Darah</a></li>
                                    <?php }
                    } ?>



                                    <li><a href="<?php echo base_url('Halaman/uji'); ?>" class="smooth"
                                            style="color:#fff">Konsultasi Sekarang</a></li>
                                    <?php } ?>
                                    <?php if ($this->session->userdata('username')) {  ?>
                                    <li class="visible-xs visible-sm hidden"><a
                                            href="<?php echo base_url('Halaman/dashboard'); ?>"><span
                                                class="fa fa-user"></span>
                                            <?php echo $this->session->userdata('username'); ?> </a></li>

                                    <li class="visible-xs visible-sm hidden"><a
                                            href="<?php echo base_url('Halaman/logout'); ?>"><span
                                                class="fa fa-sign-out-alt"></span> Logout</a></li>

                                    <?php } else { ?>

                                    <li class="visible-xs visible-sm hidden"><a href="#" data-toggle="modal"
                                            data-target=".login-register-form"><span class="fa fa-user"></span> Sign
                                            in</a></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                            <div class="btn-holder">
                                <?php if ($this->session->userdata('username')) {  ?>

                                <a href="<?php echo base_url('Halaman/dashboard'); ?>"
                                    class="btn-primary bdr-skyblue text-capitalize md-round hidden-xs"> <span
                                        class="fa fa-user"></span> <?php echo $this->session->userdata('username'); ?>
                                </a>


                                <a href="<?php echo base_url('Halaman/logout'); ?>"
                                    class="btn-primary bdr-skyblue text-capitalize md-round hidden-xs"> <span
                                        class="fa fa-sign-out-alt"></span> Logout </a>


                                <?php } else { ?>
                                <a href="#" data-toggle="modal" data-target=".login-register-form"
                                    class="btn-primary bdr-skyblue text-capitalize md-round hidden-xs"> <span
                                        class="fa fa-user"></span> Login/Register</a>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>




        <!-- Login / Register Modal-->
        <div class="modal fade login-register-form" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#login-form"> Login <span
                                        class="fa fa-user"></span></a></li>
                            <li><a data-toggle="tab" href="#registration-form"> Register <span
                                        class="fa fa-edit"></span></a></li>
                        </ul>
                    </div>
                    <div class="modal-body" style="font-size:12px">
                        <div class="tab-content">
                            <div id="login-form" class="tab-pane fade in active">
                                <?php echo validation_errors(); ?>
                                <?php echo form_open('Login/login_validation'); ?>
                                <div class="form-group">
                                    <label for="username">Email:</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter Email"
                                        name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter password" name="password" required>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-medium btn-info"> <i class="fa fa-sign-in-alt"></i>
                                    Login</button>
                                <button type="button" class="btn btn-medium btn-warning" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Close</button>
                                <?php echo form_close(); ?>
                            </div>
                            <div id="registration-form" class="tab-pane fade">
                                <?php echo validation_errors(); ?>
                                <?php echo form_open('Login/register'); ?>
                                <div class="form-group">
                                    <label for="name">Nama:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name"
                                        name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Usia:</label>
                                    <input type="text" class="form-control" id="usia" placeholder="Usia" name="usia"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="newemail">Email:</label>
                                    <input type="email" class="form-control" id="newemail" placeholder="Enter new email"
                                        name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="newpwd">Password:</label>
                                    <input type="password" class="form-control" id="newpwd" placeholder="New password"
                                        name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="newpwd">RePassword:</label>
                                    <input type="password" class="form-control" id="newpwd" placeholder="Re password"
                                        name="re_password" required>
                                </div>
                                <button type="submit" class="btn btn-medium btn-info"><i class="fa fa-sign-in-alt"></i>
                                    Register</button>
                                <button type="button" class="btn btn-medium btn-warning" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Close</button>
                                <?php echo form_close(); ?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>