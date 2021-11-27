<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page heading -->
    <div class="row">
        <div class="col-lg">
            <h3 class="mb-4 text-gray-800"><strong><?= $title ?></strong></h3>
            <hr class="sidebar-divider">
        </div>
    </div>


    <!-- Back Button -->
    <a href="<?= base_url('database_mitra/mitra_data'); ?>" role="button" class="btn btn-outline-primary btn-sm mt-2 mb-2"><i class="fas fa-arrow-left mr-2"></i>Kembali ke Halaman Data Mitra</a>


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
    <div class="row">
        <div class="col-lg">
            <form action="<?= base_url('database_mitra/mitra_data/addRecord'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row">
                        <!-- <div class="form-group col-lg"><strong>Informasi Mitra dan Kegiatan Statistik</strong></div> -->
                        <h5>Informasi Mitra dan Kegiatan Statistik</h5>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-5">
                            <select name="mitra_id" id="mitra_id" class="form-control">
                                <option value="">Pilih mitra yang akan dinilai</option>
                                <?php foreach ($mitra as $key) : ?>
                                    <option value="<?= $key['id']; ?>" <?= set_select('mitra_id', $key['id']); ?>><?= str_replace('_', ' ', $key['name']); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('mitra_id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-lg-5">
                            <select name="activity_id" id="activity_id" class="form-control">
                                <option value="">Pilih kegiatan statistik</option>
                                <?php foreach ($activity as $key) : ?>
                                    <option value="<?= $key['id']; ?>" <?= set_select('activity_id', $key['id']); ?>><?= str_replace('_', ' ', $key['activity']); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('activity_id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-lg-2">
                            <input type="text" class="form-control" id="year" name="year" placeholder="Tahun" value="<?= set_value('year'); ?>">
                            <?= form_error('year', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <h5 class="mt-2">Penilaian (Nilai yang diinputkan menggunakan skala 100)</h5>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" id="skor_geo" name="skor_geo" placeholder="Nilai penguasaan wilayah" value="<?= set_value('skor_geo'); ?>">
                            <?= form_error('skor_geo', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" id="skor_it" name="skor_it" placeholder="Nilai pemahaman teknologi" value="<?= set_value('skor_it'); ?>">
                            <?= form_error('skor_it', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" id="skor_probing" name="skor_probing" placeholder="Nilai kemampuan probing" value="<?= set_value('skor_probing'); ?>">
                            <?= form_error('skor_probing', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" id="skor_quality" name="skor_quality" placeholder="Nilai kualitas isian" value="<?= set_value('skor_quality'); ?>">
                            <?= form_error('skor_quality', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" id="skor_abc" name="skor_abc" placeholder="Nilai kerapihan tulisan" value="<?= set_value('skor_abc'); ?>">
                            <?= form_error('skor_abc', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" id="skor_time" name="skor_time" placeholder="Nilai ketepatan waktu" value="<?= set_value('skor_time'); ?>">
                            <?= form_error('skor_time', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">Pilih penilai</option>
                                <?php foreach ($reviewer as $key) : ?>
                                    <option value="<?= $key['nip']; ?>" <?= set_select('user_id', $key['nip']); ?>><?= str_replace('_', ' ', $key['uname']); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('user_id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Input Data</button>
                </div>
            </form>
        </div>
        <!-- Ending Col -->
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->