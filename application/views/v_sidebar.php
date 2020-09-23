<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                <a href="<?= base_url('dashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li <?= $this->uri->segment(1) == 'klub' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                <a href="<?= base_url('klub') ?>">
                    <i class="fa fa-futbol-o"></i> <span>Data Profil Klub</span>
                </a>
            </li>
            <li <?= $this->uri->segment(1) == 'pemain' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                <a href="<?= base_url('pemain') ?>">
                    <i class="fa fa-users"></i> <span>Data Pemain</span>
                </a>
            </li>
            <li <?= $this->uri->segment(1) == 'official' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                <a href="<?= base_url('official') ?>">
                    <i class="fa fa-clone"></i> <span>Data Official Klub</span>
                </a>
            </li>
            <?php if ($this->fungsi->user_login()->level == 1) { ?>
                <li class="header">MANAGEMENT USER</li>
                <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>>
                    <a href="<?= base_url('user') ?>">
                        <i class="fa fa-gear"></i> <span>Settings</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>