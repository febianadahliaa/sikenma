<!-- BEGIN PAGE CONTENT -->
<div class="container-fluid">

    <!-- PAGE HEADING -->
    <div class="row">
        <div class="col-lg">
            <h3 class="mb-4 text-gray-800"><?= $title ?></h3>
            <hr class="sidebar-divider">
        </div>
    </div>

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
    <div class="col">
        <!-- ROW 1 - ACTIVITIES -->
        <div class="col-xl col-lg">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">KEGIATAN BERJALAN</h6>
                </div>
                <div class="card-body">
                    <a href="" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#addActivitiesModal"><i class="fas fa-folder-plus mr-2"></i> Tambah Kegiatan</a>
                    <div class=" table-responsive">
                        <table class="table table-hover table-sm dataTables" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kegiatan</th>
                                    <th class="text-center">Tanggal Mulai</th>
                                    <th class="text-center">Tanggal Selesai</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($activitiesList as $key) : ?>
                                    <tr id="<?= $key['activities_id']; ?>">
                                        <td class="number text-center"><?= $i; ?></td>
                                        <td><?= $key['activity']; ?></td>
                                        <td><?= $key['start_date']; ?></td>
                                        <td><?= $key['finish_date']; ?></td>
                                        <td class="action text-center">
                                            <a href="" class="badge badge-pill badge-success" data-toggle="modal" data-target="#editActivitiesModal<?= $key['activities_id']; ?>">Edit</a>
                                            <a href="<?= base_url('manajemen/activity_list/deleteActivities/' . $key['activities_id']); ?>" class="badge badge-pill badge-danger deleteActivities" data-toggle="modal" data-target="#deleteActivitiesModal<?= $key['activities_id']; ?>">Hapus</a>
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

        <!-- ROW 2 - ACTIVITY -->
        <div class="col-xl col-lg">
            <div class="card shadow mb-4 border-bottom-warning">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">MASTER KEGIATAN STATISTIK</h6>
                </div>
                <div class="card-body">
                    <a href="" class="btn btn-warning btn-sm mb-4" data-toggle="modal" data-target="#addActivityModal"><i class="fas fa-folder-plus mr-2"></i> Tambah Kegiatan Baru</a>
                    <div class=" table-responsive">
                        <table class="table table-hover table-sm dataTables" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Kegiatan</th>
                                    <th class="text-center">GEO</th>
                                    <th class="text-center">IT</th>
                                    <th class="text-center">PROB</th>
                                    <th class="text-center">QTY</th>
                                    <th class="text-center">ABC</th>
                                    <th class="text-center">TIME</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($activityList as $key) : ?>
                                    <tr id="<?= $key['activity_id']; ?>">
                                        <td class="number text-center"><?= $i; ?></td>
                                        <td><?= $key['activity']; ?></td>
                                        <td><?= $key['geo_score']; ?></td>
                                        <td><?= $key['it_score']; ?></td>
                                        <td><?= $key['prob_score']; ?></td>
                                        <td><?= $key['qty_score']; ?></td>
                                        <td><?= $key['abc_score']; ?></td>
                                        <td><?= $key['time_score']; ?></td>
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
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- ADD ACTIVITY MODAL -->
<div class="modal fade" id="addActivityModal" tabindex="-1" role="dialog" aria-labelledby="addActivityModalLabel" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
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
                    <div class="form-row">
                        <div class="mt-2">Penilaian (60 - 95)</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 mt-2">
                            <input type="text" class="form-control" id="geo_score" name="geo_score" placeholder="Nilai penguasaan wilayah" required />
                        </div>
                        <div class="form-group col-lg-6 mt-2">
                            <input type="text" class="form-control" id="it_score" name="it_score" placeholder="Nilai penguasaan teknologi" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="prob_score" name="prob_score" placeholder="Nilai kemampuan probing" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="qty_score" name="qty_score" placeholder="Nilai kualitas isian" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="abc_score" name="abc_score" placeholder="Nilai kerapihan tulisan" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="time_score" name="time_score" placeholder="Nilai ketepatan waktu" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Tambah</button>
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
<!-- <?php foreach ($activityList as $key) : ?>
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
<?php endforeach; ?> -->


<!-- ADD ACTIVITIES MODAL -->
<div class="modal fade" id="addActivitiesModal" tabindex="-1" role="dialog" aria-labelledby="addActivitiesModalLabel" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h5 text-light" id="addActivitiesModalLabel">Menambahkan Data Kegiatan Statistik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <form action="<?= base_url('manajemen/activity_list/addActivities'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <label class="mt-2" for="activity">Nama Kegiatan</label>
                        <select name="activity_id" id="activity_id" class="form-control">
                            <option value="">--pilih kegiatan--</option>
                            <?php foreach ($activityList as $act) : ?>
                                <option value="<?= $act['activity_id']; ?>"><?= str_replace('_', ' ', $act['activity']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <label class="mt-2" for="start_date">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required />
                    </div>
                    <div class="form-row">
                        <label class="mt-2" for="finish_date">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="finish_date" name="finish_date" required />
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


<!-- EDIT ACTIVITIES MODAL -->
<?php foreach ($activitiesList as $key) : ?>
    <div class="modal fade" id="editActivitiesModal<?= $key['activities_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editActivitiesModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title h5 text-light" id="editActivitiesModalLabel">Edit Kegiatan Berjalan</h5>
                    <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <form action="<?= base_url('manajemen/activity_list/editActivities'); ?>" method="post">
                    <div class=" modal-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="mt-2">Kode : </label>
                            </div>
                            <div class="form-group col-lg-2">
                                <input type="text" class="form-control" id="activities_id" name="activities_id" placeholder="" value="<?= $key['activities_id']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <label class="mt-2" for="activity">Nama Kegiatan</label>
                            <select name="activity_id" id="activity_id" class="form-control">
                                <option value="">--pilih kegiatan--</option>
                                <?php foreach ($activityList as $act) : ?>
                                    <?php if ($key['activity_id'] == $act['activity_id']) : ?>
                                        <option value="<?= $act['activity_id']; ?>" selected><?= str_replace('_', ' ', $act['activity']); ?></option>
                                    <?php else : ?>
                                        <option value="<?= $act['activity_id']; ?>"><?= str_replace('_', ' ', $act['activity']); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <label class="mt-2" for="start_date">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= $key['start_date']; ?>" required />
                        </div>
                        <div class="form-row">
                            <label class="mt-2" for="finish_date">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="finish_date" name="finish_date" value="<?= $key['finish_date']; ?>" required />
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