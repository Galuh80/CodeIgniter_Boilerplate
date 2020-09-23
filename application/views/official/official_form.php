<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> | Data Official</title>
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
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
                <h1>Data Official</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Official</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php $this->view('messages'); ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?= ucfirst($page) ?> Data Official</h3>
                        <div class="pull-right">
                            <a href="<?= base_url('official') ?>" class="btn btn-info btn-flat">
                                <i class="fa fa-undo"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <?= form_open_multipart('official/process') ?>
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label for="">Nama *</label>
                                    <input type="hidden" name="id_official" value="<?= $row->id_official ?>">
                                    <input type="text" name="nama" class="form-control" value="<?= $row->nama ?>" placeholder="Masukan Nama" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin *</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki" <?= $row->jenis_kelamin == 'Laki-laki' ? "selected" : null ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= $row->jenis_kelamin == 'Perempuan' ? "selected" : null ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir *</label>
                                    <input type="text" name="tanggal_lahir" class="form-control" value="<?= $row->tanggal_lahir ?>" id="datepicker" placeholder="Masukan Tanggal Lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kota Lahir *</label>
                                    <input type="text" name="kota_lahir" class="form-control" value="<?= $row->kota_lahir ?>" placeholder="Masukan Kota Lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kewarganegaraan *</label>
                                    <select name="kewarganegaraan" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="WNI" <?= $row->kewarganegaraan == 'WNI' ? "selected" : null ?>>WNI</option>
                                        <option value="WNA" <?= $row->kewarganegaraan == 'WNA' ? "selected" : null ?>>WNA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <div class="form-group">
                                    <label for="">Alamat *</label>
                                    <input type="text" name="alamat" class="form-control" value="<?= $row->alamat ?>" placeholder="Masukan Alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Posisi *</label>
                                    <input type="text" name="posisi" class="form-control" value="<?= $row->posisi ?>" placeholder="Masukan Posisi" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Klub * </label>
                                    <input type="text" name="klub" class="form-control" value="<?= $row->klub ?>" placeholder="Masukan Nama Klub" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Photo * </label><small>(jpg,jpeg,png)</small>
                                    <?php if ($page == 'edit') {
                                        if ($row->photo != null) { ?>
                                            <div style="margin-bottom: 4px">
                                                <img src="<?= base_url('uploads/photo_official/') . $row->photo ?>" width="50%">
                                            </div>
                                    <?php }
                                    } ?>
                                    <input type="file" name="photo" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <?php if ($page == 'edit') { ?>
                                        <input type="hidden" class="form-control" value="">
                                    <?php } else { ?>
                                        <label for="">KTP *</label><small>(jpg,jpeg,png)</small>
                                        <input type="file" name="ktp" class="form-control" value="">
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-check"></i> Save</button>
                                    <button type="reset" class="btn btn-warning btn-flat"><i class="fa fa-info"></i> Reset</button>
                                </div>
                            </div>
                            <?= form_close() ?>
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
        $(function() {
            $('#datepicker').datepicker({
                autoclose: true
            })
        })
    </script>
</body>

</html>