<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Diagnosa Penyakit Diabetes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->

    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/template/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/template/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/template/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/template/bower_components/fullcalendar/dist/fullcalendar.print.min.css"
        media="print">


    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Anton|Do+Hyeon|Merriweather|Roboto|Roboto+Condensed|Roboto+Slab"
        rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url(); ?>home" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Sis</b>Kar</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Sistem </b>Pakar</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- User Account: style can be found in dropdown.less -->

                        <li class="dropdown user user-menu">
                            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"> -->


                            <a href="#" class="dropdown-toggle" data-toggle="<?php  if ($this->session->userdata('username')) {
                    echo 'dropdown';
              }else {
                echo 'modal';
              } ?>" data-target="<?php  if ($this->session->userdata('username')) {
                    echo '';
              }else {
                echo '#exampleModal';
              } ?>">
                                <img src="<?php echo base_url(); ?>assets/template/dist/img/user2-160x160.jpg"
                                    class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php  if($this->session->userdata('username')){
                echo $this->session->userdata('username');
              }else {
                echo "LOGIN ";
              } ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url(); ?>assets/template/dist/img/user2-160x160.jpg"
                                        class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo($this->session->userdata('username')); ?> - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url(); ?>profile"
                                            class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url(); ?>signOut" class="btn btn-default btn-flat">Sign
                                            out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url(); ?>assets/template/dist/img/user2-160x160.jpg"
                            class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo($this->session->userdata('username')); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url(); ?>home">
                            <i class="fa fa-home"></i> <span>Home</span>
                        </a>

                    </li>
                    <!--  <li >
          <a href="<?php echo base_url(); ?>konsultasi">
            <i class="fa fa-files-o"></i>
            <span>Konsultasi</span>

          </a>

        </li> -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Forms</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>tabelpertanyaan"><i class="fa fa-circle-o"></i>Tabel
                                    Pertanyaan</a></li>
                            <!-- <li><a href="<?php echo base_url(); ?>tabelrule"><i class="fa fa-circle-o"></i>Tabel Rule</a></li>-->
                            <li><a href="<?php echo base_url(); ?>tabelminat"><i class="fa fa-circle-o"></i>Tabel
                                    Penyakit</a></li>
                            <li><a href="<?php echo base_url(); ?>tabelartikel"><i class="fa fa-circle-o"></i>Tabel
                                    Artikel</a></li>
                            <!-- <li><a href="<?php echo base_url(); ?>TabelPekerjaan"><i class="fa fa-circle-o"></i>Tabel Hobi</a></li> -->
                        </ul>



                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Pengaturan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>tabelpeserta"><i class="fa fa-circle-o"></i>Data
                                    Peserta</a></li>

                        </ul>



                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <center>
                            <h2 class="modal-title" id="exampleModalLabel">LOGIN</h2>
                        </center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php echo validation_errors();?>
                    <?php echo form_open('Login/login_validation'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="recipient-name" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="message-text" name="password"
                                required></input>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">SignUp</button>
                        <button type="submit" class="btn btn-primary">SignIn</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>