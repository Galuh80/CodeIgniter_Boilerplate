<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('dashboard') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>LDL</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>LDL</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php
                $id_user = $this->session->userdata('id_user');
                $q = $this->db->query("SELECT * FROM tbl_user WHERE id_user='$id_user'");
                $c = $q->row_array();
                ?>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url() . 'uploads/foto_user/' . $c['foto']; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $this->fungsi->user_login()->username; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url() . 'uploads/foto_user/' . $c['foto']; ?>" class="img-circle" alt="User Image">
                            <p>
                                <?= $this->fungsi->user_login()->username; ?>
                                <small><?= date('d-m-y')?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->