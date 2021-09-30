<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page heading -->
    <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-4 text-gray-800"><strong><?= $title ?></strong></h3>
            <hr class="sidebar-divider">
        </div>
    </div>

    <!-- Notification -->
    <div class="row">
        <div class="col-lg-6">
            <?php
            if ($this->session->flashdata('error') != '') {
                echo '<div class="alert alert-danger" role="alert">';
                echo $this->session->flashdata('error');
                echo '</div>';
            }
            ?>
            <?php
            if ($this->session->flashdata('message') != '') {
                echo '<div class="alert alert-success" role="alert">';
                echo $this->session->flashdata('message');
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('auth/changePassword'); ?>" method="post">
                <div class="form-group">
                    <label for="currentPassword">Password Lama</label>
                    <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                    <?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <!-- <hr class="sidebar-divider mb-4"> -->
                <div class="form-group">
                    <label for="newPassword1">Password Baru</label>
                    <input type="password" class="form-control" id="newPassword1" name="newPassword1">
                    <?= form_error('newPassword1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="newPassword2">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="newPassword2" name="newPassword2">
                    <?= form_error('newPassword2', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Ubah password</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->