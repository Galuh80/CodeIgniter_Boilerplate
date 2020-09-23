<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shorcut icon" type="text/css" href="<?= base_url() . 'assets/images/ldl.png' ?>">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- NAVBAR -->
        <?php $this->load->view('v_navbar'); ?>

        <!-- SIDEBAR -->
        <?php $this->load->view('v_sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php
            $id_user = $this->session->userdata('id_user');
            $q = $this->db->query("SELECT * FROM tbl_user WHERE id_user='$id_user'");
            $c = $q->row_array();
            ?>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <?php if ($c['level'] == 1) { ?>
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <?php
                            $count_klub = $this->db->query("SELECT * FROM tbl_klub");
                            ?>
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?= $count_klub->num_rows(); ?></h3>
                                    <p>Data Profil Klub</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-football"></i>
                                </div>
                                <a href="<?= base_url('klub') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <?php
                            $count_pemain = $this->db->query("SELECT * FROM tbl_pemain");
                            ?>
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= $count_pemain->num_rows(); ?></h3>
                                    <p>Data Pemain</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="<?= base_url('pemain') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <?php
                            $count_official = $this->db->query("SELECT * FROM tbl_official");
                            ?>
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?= $count_official->num_rows(); ?></h3>
                                    <p>Data Official Klub</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-folder"></i>
                                </div>
                                <a href="<?= base_url('official') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <?php
                            $count_user = $this->db->query("SELECT * FROM tbl_user");
                            ?>
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?= $count_user->num_rows(); ?></h3>
                                    <p>User Aktif</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?= base_url('user') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </section>
            <?php } else { ?>
                <section class="content">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <center>
                                <h3 class="box-title-center">Selamat Datang!</h3>
                            </center>
                        </div>
                        <div class="box-body">
                            <center>
                                <h4>Selamat datang para peserta Lemahtamba Dream League! Outstanding!</h4>
                                <h4>Sebelumnya kami ucapkan terima kasih atas partisipasi para tim yang telah ikut andil dalam meramaikan Turnamen ini</h4>
                                <h4>Sebelum melakukan pengisian data, <b>WAJIB</b> untuk para tim mengisi surat pernyataan melalui tombol download dibawah ini.</h4><br>
                                <a href="<?= base_url('dashboard/download') ?>" class="btn btn-info btn-flat">
                                    <i class="fa fa-download"></i> Download
                                </a>
                            </center>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </section>
            <? } ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- FOOTER -->
        <?php $this->load->view('v_footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/template/') ?>components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/template/') ?>components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/template/') ?>components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?= base_url('assets/template/') ?>components/raphael/raphael.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('assets/template/') ?>components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?= base_url('assets/template/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('assets/template/') ?>components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('assets/template/') ?>components/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?= base_url('assets/template/') ?>components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?= base_url('assets/template/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?= base_url('assets/template/') ?>components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/template/') ?>components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/template/') ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('assets/template/') ?>dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/template/') ?>dist/js/demo.js"></script>
</body>

</html>