<?php if ($this->session->has_userdata('success')) : ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i> <?= $this->session->flashdata('success'); ?>
    </div>
<?php elseif ($this->session->has_userdata('update')) : ?>
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i> <?= $this->session->flashdata('update'); ?>
    </div>
<?php elseif ($this->session->has_userdata('delete')) : ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i> <?= $this->session->flashdata('delete'); ?>
    </div>
<?php elseif ($this->session->has_userdata('warning')) : ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-info"></i> <?= $this->session->flashdata('warning'); ?>
    </div>
<?php else : ?>

<?php endif; ?>
