<!-- BEGIN PAGE CONTENT -->
<div class="container-fluid">

    <!-- PAGE HEADING -->
    <!-- <div class="row">
        <div class="col-lg-6">
            <h4 class="mb-3 text-gray-800"><strong><?= $title ?></strong></h4>
            <hr class="sidebar-divider">
        </div>
    </div> -->

    <!-- NOTIFICATION -->
    <div class="row">
        <div class="col-lg-8">
            <?php if ($this->session->flashdata('error') != '') : ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('message') != '') : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <!-- PAGE CONTENT -->
    <div class="card shadow mb-4 border-left-primary col-lg-8">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"><?= $title; ?></h5>
        </div>
        <div class="card-body">
            <a href="" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#addActivityModal"><i class="fas fa-folder-plus mr-2"></i> Tambah Data Kegiatan Baru</a>
            <div class=" table-responsive">
                <table class="table table-hover table-sm dataTables" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Kegiatan Statistik</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($activityList as $key) : ?>
                            <tr id="<?= $key['activity_id']; ?>">
                                <td class="number text-center"><?= $i; ?></td>
                                <td><?= $key['activity']; ?></td>
                                <td class="action text-center">
                                    <!-- <a href="" class="badge badge-pill badge-primary mr-1 openEditDialog" data-id="<?= $key['activity_id']; ?>" data-toggle="modal" data-target="#editActivityModal">Edit</a> -->
                                    <a href="" class="badge badge-pill badge-success" data-toggle="modal" data-target="#editActivityModal<?= $key['activity_id']; ?>">Edit</a>
                                    <a href="<?= base_url('manajemen/activity_list/deleteActivity/' . $key['activity_id']); ?>" class="badge badge-pill badge-danger deleteActivity" data-toggle="modal" data-target="#deleteActivityModal<?= $key['activity_id']; ?>">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Ending table-responsive -->
        </div>
        <!-- Ending Col -->
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- ADD ACTIVITY MODAL -->
<div class="modal fade" id="addActivityModal" tabindex="-1" role="dialog" aria-labelledby="addActivityModalLabel" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h5 text-light" id="addActivityModalLabel">Menambahkan Data Kegiatan Statistik Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <form action="<?= base_url('manajemen/activity_list/addActivity'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <label class="mt-2" for="activity">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="activity" name="activity" placeholder="Tuliskan nama kegiatan dengan lengkap" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- EDIT ACTIVITY MODAL -->
<?php foreach ($activityList as $key) : ?>
    <div class="modal fade" id="editActivityModal<?= $key['activity_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editActivityModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title h5 text-light" id="editActivityModalLabel">Edit Kegiatan Statistik</h5>
                    <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <form action="<?= base_url('manajemen/activity_list/editActivity'); ?>" method="post">
                    <div class=" modal-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="mt-2">Kode : </label>
                            </div>
                            <div class="form-group col-lg-2">
                                <input type="text" class="form-control" id="activity_id" name="activity_id" placeholder="" value="<?= $key['activity_id']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="mt-2" for="activity">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="activity" name="activity" placeholder="Tuliskan nama lengkap mitra" value="<?= $key['activity']; ?>" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                        <button class="btn btn-success" type="submit">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- DELETE ACTIVITY MODAL-->
<?php foreach ($activityList as $key) : ?>
    <div class="modal fade" id="deleteActivityModal<?= $key['activity_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteActivityModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title h5 text-light" id="deleteActivityModalLabel">Yakin ingin menghapus data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak dapat dikembalikan. Pilih <b>Hapus</b> jika ingin menghapus data kegiatan <b><?= $key['activity']; ?></b>.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('manajemen/activity_list/deleteActivity/' . $key['activity_id']); ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>