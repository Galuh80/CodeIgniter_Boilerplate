<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> | Data Pemain</title>
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
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/template/') ?>components/datatables/css/dataTables.bootstrap.css">

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
                <h1>Data Pemain</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Pemain</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php $this->view('messages'); ?>
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <a href="<?= base_url('pemain/add') ?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i> Create Data
                            </a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Photo</th>
                                    <th>Nama Pemain</th>
                                    <th>Kelas Usia</th>
                                    <th>Nomor Punggung</th>
                                    <th>Posisi</th>
                                    <th>Kewarganegaraan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($row->result() as $key => $data) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><img width="40" height="40" class="img-circle" src="<?= base_url('uploads/photo/') . $data->photo; ?>"></td>
                                        <td><?= $data->nama_pemain ?></td>
                                        <td><?= $data->kelas_usia ?></td>
                                        <td><?= $data->nomor_punggung ?></td>
                                        <td><?= $data->posisi ?></td>
                                        <td><?= $data->kewarganegaraan ?></td>
                                        <td>
                                            <a href="<?= base_url('pemain/edit/' . $data->id_pemain) ?>" class="btn btn-info btn-xs">
                                                <i class="fa fa-pencil"></i>Update
                                            </a>
                                            <a href="<?= base_url('pemain/delete/' . $data->id_pemain) ?>" onclick="return confirm('Apakah anda yakin hapus data ini?')" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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
    <!-- Sparkline -->
    <script src="<?= base_url('assets/template/') ?>components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
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
    <!-- DataTables -->
    <script src="<?= base_url('assets/template/') ?>components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>components/datatables/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable()
        })
    </script>
</body>

</html>