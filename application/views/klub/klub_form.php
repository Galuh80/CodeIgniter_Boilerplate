<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> | Data Klub</title>
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Data Klub</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Klub</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php $this->view('messages'); ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?= ucfirst($page) ?> Klub</h3>
                        <div class="pull-right">
                            <a href="<?= base_url('klub') ?>" class="btn btn-info btn-flat">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <?= form_open_multipart('klub/process') ?>
                                <div class="form-group">
                                    <label for="">Nama Klub *</label>
                                    <input type="hidden" name="id_klub" value="<?= $row->id_klub ?>">
                                    <input type="text" name="nama_klub" class="form-control" value="<?= $row->nama_klub ?>" placeholder="Masukan Nama Klub" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="">Visi *</label>
                                    <input type="text" name="visi" class="form-control" value="<?= $row->visi ?>" placeholder="Masukan Visi Klub" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Misi *</label>
                                    <input type="text" name="misi" class="form-control" value="<?= $row->misi ?>" placeholder="Masukan Misi Klub" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat *</label>
                                    <input type="text" name="alamat" class="form-control" value="<?= $row->alamat ?>" placeholder="Masukan Alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Email *</label>
                                    <input type="email" name="email" class="form-control" value="<?= $row->email ?>" placeholder="Masukan Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kontak Person *</label>
                                    <input type="text" name="kontak" class="form-control" value="<?= $row->kontak ?>" placeholder="Masukan Kontak" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Logo Klub *</label><small> (Maksimal ukuran 500 x 500 piksel)</small>
                                    <?php if ($page == 'edit') {
                                        if ($row->logo != null) { ?>
                                            <div style="margin-bottom: 4px">
                                                <img src="<?= base_url('uploads/logo_klub/') . $row->logo ?>" width="50%">
                                            </div>
                                    <?php }
                                    } ?>
                                    <input type="file" name="logo" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <?php if ($page == 'edit') { ?>
                                        <input type="hidden" class="form-control" value="">
                                    <?php } else { ?>
                                        <label for="">Surat Pernyataan *</label><small> (Silahkan upload surat pernyataan)</small>
                                        <input type="file" id="surat_pernyataan" name="surat_pernyataan" class="form-control" value="">
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Save</button>
                                    <button type="reset" class="btn btn-warning btn-flat"><i class="fa fa-info"></i> Reset</button>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
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
    <script>
        var selDiv = ""
        document.addEventListener("DOMContentLoaded", init, false);

        function init() {
            document.querySelector('#surat_pernyataan');
            selDiv = document.querySelector('#selectedFile');
        }
    </script>
</body>

</html>