<!-- BEGIN PAGE CONTENT -->
<div class="container-fluid">

    <!-- PAGE HEADING -->
    <!-- <div class="row">
        <div class="col">
            <h4 class="mb-3 text-gray-800"><strong><?= $title ?></strong></h4>
            <hr class="sidebar-divider">
        </div>
    </div> -->

    <!-- NOTIFICATION -->
    <div class="row">
        <div class="col-lg">
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
    <div class="card shadow mb-4 border-left-primary col-lg">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"><?= $title; ?></h5>
            <!-- INPUT NILAI MITRA -->
        </div>
        <div class="card-body">
            <a href="" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#addMitraRecordModal"><i class="fas fa-folder-plus mr-2"></i> Tambah Data Track Record Mitra</a>
            <div class=" table-responsive">
                <table class="table table-hover table-sm dataTables" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kegiatan</th>
                            <th class="text-center">GEO</th>
                            <th class="text-center">IT</th>
                            <th class="text-center">PROB</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">ABC</th>
                            <th class="text-center">TIME</th>
                            <th class="text-center">Penilai</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mitraRecord as $key) : ?>
                            <tr id="<?= $key['track_record_id']; ?>">
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $key['name']; ?></td>
                                <td><?= $key['activity'] . ' ' . $key['year']; ?></td>
                                <td class="text-center"><?= $key['geo_score']; ?></td>
                                <td class="text-center"><?= $key['it_score']; ?></td>
                                <td class="text-center"><?= $key['prob_score']; ?></td>
                                <td class="text-center"><?= $key['qty_score']; ?></td>
                                <td class="text-center"><?= $key['abc_score']; ?></td>
                                <td class="text-center"><?= $key['time_score']; ?></td>
                                <td class="text-center"><?= $key['uname']; ?></td>
                                <td class="action text-center">
                                    <a href="" class="badge badge-pill badge-success" data-toggle="modal" data-target="#editRecordModal<?= $key['track_record_id']; ?>">Edit</a>
                                    <a href="<?= base_url('mitra_rating/track_record/deleteRecord/' . $key['track_record_id']); ?>" class="badge badge-pill badge-danger deleteRecord" data-toggle="modal" data-target="#deleteRecordModal<?= $key['track_record_id']; ?>">Hapus</a>
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



<!-- ADD MITRA RECORD DATA MODAL -->
<div class="modal fade" id="addMitraRecordModal" tabindex="-1" role="dialog" aria-labelledby="addMitraRecordModalLabel" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h5 text-light" id="addMitraRecordModalLabel">Menambahkan Data Track Record Mitra</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <form action="<?= base_url('mitra_rating/track_record/addRecord'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-lg">Informasi Mitra dan Kegiatan Statistik</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg">
                            <select name="mitra_id" id="mitra_id" class="form-control">
                                <option value="">--pilih mitra yang akan dinilai--</option>
                                <?php foreach ($mitra as $key) : ?>
                                    <option value="<?= $key['mitra_id']; ?>"><?= str_replace('_', ' ', $key['name']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <select name="activity_id" id="activity_id" class="form-control">
                                <option value="">--pilih kegiatan statistik--</option>
                                <?php foreach ($activity as $key) : ?>
                                    <option value="<?= $key['activity_id']; ?>"><?= str_replace('_', ' ', $key['activity']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <!-- <input type="text" class="form-control" id="year" name="year" placeholder="Tahun" required /> -->
                            <input type="text" class="form-control" id="yearpicker" name="yearpicker" placeholder="Tahun kegiatan" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg">Penilaian (60 - 95)</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="geo_score" name="geo_score" placeholder="Nilai penguasaan wilayah" required />
                        </div>
                        <div class="form-group col-lg-6">
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
                    <div class="form-group">
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">--pilih penilai--</option>
                            <?php foreach ($reviewer as $key) : ?>
                                <option value="<?= $key['nip']; ?>"><?= str_replace('_', ' ', $key['uname']); ?></option>
                            <?php endforeach; ?>
                        </select>
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


<!-- EDIT MITRA RECORD DATA MODAL-->
<?php foreach ($mitraRecord as $editKey) : ?>
    <div class="modal fade" id="editRecordModal<?= $editKey['track_record_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRecordModalLabel" data-backdrop="static" data-keyboard="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title h5 text-light" id="editRecordModalLabel">Edit Data Track Record Mitra</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <form action="<?= base_url('mitra_rating/track_record/editRecord'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="mt-2">Kode : </label>
                            </div>
                            <div class="form-group col-lg-1">
                                <input type="text" class="form-control" id="track_record_id" name="track_record_id" placeholder="" value="<?= $editKey['track_record_id']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg">Informasi Mitra dan Kegiatan Statistik</div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg">
                                <select name="mitra_id" id="mitra_id" class="form-control">
                                    <option value="">--pilih mitra yang akan dinilai--</option>
                                    <?php foreach ($mitra as $mit) : ?>
                                        <?php if ($editKey['mitra_id'] == $mit['mitra_id']) : ?>
                                            <option value="<?= $mit['mitra_id']; ?>" selected><?= str_replace('_', ' ', $mit['name']); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $mit['mitra_id']; ?>"><?= str_replace('_', ' ', $mit['name']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <select name="activity_id" id="activity_id" class="form-control">
                                    <option value="">--pilih kegiatan statistik-</option>
                                    <?php foreach ($activity as $act) : ?>
                                        <?php if ($editKey['activity_id'] == $act['activity_id']) : ?>
                                            <option value="<?= $act['activity_id']; ?>" selected><?= str_replace('_', ' ', $act['activity']); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $act['activity_id']; ?>"><?= str_replace('_', ' ', $act['activity']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" id="year" name="year" placeholder="Tahun" value="<?= $editKey['year']; ?>" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg">Penilaian (60 - 95)</div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" id="geo_score" name="geo_score" placeholder="Nilai penguasaan wilayah" value="<?= $editKey['geo_score']; ?>" required />
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" id="it_score" name="it_score" placeholder="Nilai pemahaman teknologi" value="<?= $editKey['it_score']; ?>" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" id="prob_score" name="prob_score" placeholder="Nilai kemampuan probing" value="<?= $editKey['prob_score']; ?>" required />
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" id="qty_score" name="qty_score" placeholder="Nilai kualitas isian" value="<?= $editKey['qty_score']; ?>" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" id="abc_score" name="abc_score" placeholder="Nilai kerapihan tulisan" value="<?= $editKey['abc_score']; ?>" required />
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control" id="time_score" name="time_score" placeholder="Nilai ketepatan waktu" value="<?= $editKey['time_score']; ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">--pilih penilai--</option>
                                <?php foreach ($reviewer as $rev) : ?>
                                    <?php if ($editKey['nip'] == $rev['nip']) : ?>
                                        <option value="<?= $rev['nip']; ?>" selected><?= str_replace('_', ' ', $rev['uname']); ?></option>
                                    <?php else : ?>
                                        <option value="<?= $rev['nip']; ?>"><?= str_replace('_', ' ', $rev['uname']); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- DELETE MITRA RECORD DATA MODAL-->
<?php foreach ($mitraRecord as $delKey) : ?>
    <div class="modal fade" id="deleteRecordModal<?= $delKey['track_record_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteRecordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title h5 text-light" id="deleteRecordModalLabel">Yakin ingin menghapus data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak dapat dikembalikan. Pilih <b>Hapus</b> jika ingin menghapus data track record <b><?= $delKey['name']; ?></b> pada kegiatan <?= $delKey['activity']; ?> <?= $delKey['year']; ?>.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('mitra_rating/track_record/deleteRecord/' . $delKey['track_record_id']); ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /> -->


<script type="text/javascript">
    $("#yearpicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
</script>