<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page heading -->
    <div class="row">
        <div class="col">
            <h3 class="mb-4 text-gray-800"><strong><?= $title ?></strong></h3>
            <hr class="sidebar-divider">
        </div>
    </div>


    <!-- Notification -->
    <div class="row">
        <div class="col-lg">
            <?php if ($this->session->flashdata('error') != '') : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('message') != '') : ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <!-- Page Content -->
    <div class="row">
        <div class="col">
            <a href="" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#newMitraRecordModal"><i class="fas fa-user-plus mr-2"></i> Tambah Data Track Record Mitra</a>
            <div class=" table-responsive">
                <table class="table table-hover table-sm dataTables" id="dataMitraRecord" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kegiatan</th>
                            <th class="text-center">GEO</th>
                            <th class="text-center">IT</th>
                            <th class="text-center">Probing</th>
                            <th class="text-center">Quality</th>
                            <th class="text-center">ABC</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">Penilai</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mitraRecord as $key) : ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $key['name']; ?></td>
                                <td><?= $key['activity'] . ' ' . $key['year']; ?></td>
                                <td class="text-center"><?= $key['skor_geo']; ?></td>
                                <td class="text-center"><?= $key['skor_it']; ?></td>
                                <td class="text-center"><?= $key['skor_prob']; ?></td>
                                <td class="text-center"><?= $key['skor_qty']; ?></td>
                                <td class="text-center"><?= $key['skor_abc']; ?></td>
                                <td class="text-center"><?= $key['skor_time']; ?></td>
                                <td class="text-center"><?= $key['uname']; ?></td>
                                <td class="text-center">
                                    <a href="" class="badge badge-pill badge-primary">Edit</a>
                                    <a href="" class="badge badge-pill badge-danger">Hapus</a>
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



<!-- New Mitra Track Record Modal -->
<div class="modal fade" id="newMitraRecordModal" tabindex="-1" role="dialog" aria-labelledby="newMitraRecordModalLabel" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h5 text-light" id="newMitraRecordModalLabel">Menambahkan Data Track Record Mitra</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>

            <form action="<?= base_url('database_mitra/mitra_data/addRecord'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-lg">Informasi Mitra dan Kegiatan Statistik</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg">
                            <select name="mitra_id" id="mitra_id" class="form-control">
                                <option value="">Pilih mitra yang akan dinilai</option>
                                <?php foreach ($mitra as $key) : ?>
                                    <option value="<?= $key['id']; ?>"><?= str_replace('_', ' ', $key['name']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <select name="activity_id" id="activity_id" class="form-control">
                                <option value="">Pilih kegiatan statistik</option>
                                <?php foreach ($activity as $key) : ?>
                                    <option value="<?= $key['id']; ?>"><?= str_replace('_', ' ', $key['activity']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="year" name="year" placeholder="Tahun" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg">Penilaian (skala 1-100)</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="skor_geo" name="skor_geo" placeholder="Nilai penguasaan wilayah" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="skor_it" name="skor_it" placeholder="Nilai pemahaman teknologi" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="skor_probing" name="skor_probing" placeholder="Nilai kemampuan probing" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="skor_quality" name="skor_quality" placeholder="Nilai kualitas isian" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="skor_abc" name="skor_abc" placeholder="Nilai kerapihan tulisan" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" id="skor_time" name="skor_time" placeholder="Nilai ketepatan waktu" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">Pilih penilai</option>
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