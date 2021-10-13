<!-- BEGIN PAGE CONTENT -->
<div class="container-fluid">

    <!-- PAGE HEADING -->
    <div class="row">
        <div class="col">
            <h3 class="mb-4 text-gray-800"><strong><?= $title ?></strong></h3>
            <hr class="sidebar-divider">
        </div>
    </div>

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
            <a href="" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#addMitraModal"><i class="fas fa-user-plus mr-2"></i> Tambah Data Mitra Baru</a>
            <div class=" table-responsive">
                <table class="table table-hover table-sm dataTables" id="dataMitra" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">No. HP</th>
                            <th class="text-center">Desa</th>
                            <th class="text-center">Kecamatan</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Status Perkawinan</th>
                            <th class="text-center">Pendidikan</th>
                            <th class="text-center">Pekerjaan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mitraList as $key) : ?>
                            <tr id="<?= $key['mitra_id']; ?>">
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $key['name']; ?></td>
                                <td class="text-center"><?= $key['phone']; ?></td>
                                <td class="text-center"><?= $key['village']; ?></td>
                                <td class="text-center"><?= $key['district']; ?></td>
                                <td class="text-center"><?= date_diff(date_create($key['date_of_birth']), date_create(date("Y-m-d")))->format('%y'); ?></td>
                                <td class="text-center"><?= $key['gender']; ?></td>
                                <td class="text-center"><?= $key['marriage_status']; ?></td>
                                <td class="text-center"><?= $key['education']; ?></td>
                                <td class="text-center"><?= $key['job'] ?></td>
                                <td class="action text-center">
                                    <a href="" class="badge badge-pill badge-success" data-toggle="modal" data-target="#editMitraModal<?= $key['mitra_id']; ?>">Edit</a>
                                    <a href="<?= base_url('manajemen/mitra_list/deleteMitra/' . $key['mitra_id']); ?>" class="badge badge-pill badge-danger deleteMitra" data-toggle="modal" data-target="#deleteMitraModal<?= $key['mitra_id']; ?>">Hapus</a>
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



<!-- ADD MITRA MODAL -->
<div class="modal fade" id="addMitraModal" tabindex="-1" role="dialog" aria-labelledby="addMitraModalLabel" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h5 text-light" id="addMitraModalLabel">Menambahkan Data Mitra Baru</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <form action="<?= base_url('manajemen/mitra_list/addMitra'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="name">Nama Mitra</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tuliskan nama lengkap mitra" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="village_id">Desa Asal</label>
                            <select name="village_id" id="village_id" class="form-control">
                                <option value="">--pilih desa asal mitra--</option>
                                <?php foreach ($village as $key) : ?>
                                    <option value="<?= $key['village_id']; ?>"><?= str_replace('_', ' ', $key['village']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="birthdate">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">--pilih jenis kelamin--</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="phone">Nomor HP</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="marriage">Status Perkawinan</label>
                            <select name="marriage" id="marriage" class="form-control">
                                <option value="">--pilih status perkawinan--</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Sudah Menikah">Sudah Menikah</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="education">Pendidikan Terakhir yang Ditamatkan</label>
                            <select name="education" id="education" class="form-control">
                                <option value="">--pilih pendidikan terakhir--</option>
                                <option value="SD/MI">SD/MI</option>
                                <option value="SMP/MTs">SMP/MTs</option>
                                <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                <option value="DI">DI</option>
                                <option value="DII">DII</option>
                                <option value="DIII">DIII</option>
                                <option value="DIV">DIV</option>
                                <option value="S1">S1</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="job">Pekerjaan</label>
                            <input type="text" class="form-control" id="job" name="job" placeholder="" required />
                        </div>
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


<!-- EDIT MITRA MODAL-->
<?php foreach ($mitraList as $key) : ?>
    <div class="modal fade" id="editMitraModal<?= $key['mitra_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMitraModalLabel" data-backdrop="static" data-keyboard="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title h5 text-light" id="editMitraModalLabel">Edit Data Mitra</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <form action="<?= base_url('manajemen/mitra_list/editMitra'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="mt-2">Kode : </label>
                            </div>
                            <div class="form-group col-lg-1">
                                <input type="text" class="form-control" id="mitra_id" name="mitra_id" placeholder="" value="<?= $key['mitra_id']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="name">Nama Mitra</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Tuliskan nama lengkap mitra" value="<?= $key['name']; ?>" required />
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="village_id">Desa Asal</label>
                                <select name="village_id" id="village_id" class="form-control">
                                    <option value="">--pilih desa asal mitra--</option>
                                    <?php foreach ($village as $vil) : ?>
                                        <?php if ($key['village_id'] == $vil['village_id']) : ?>
                                            <option value="<?= $vil['village_id']; ?>" selected><?= str_replace('_', ' ', $vil['village']); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $vil['village_id']; ?>"><?= str_replace('_', ' ', $vil['village']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="birthdate">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $key['date_of_birth']; ?>" required />
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">--pilih jenis kelamin--</option>
                                    <?php if ($key['gender'] == "Perempuan") : ?>
                                        <option value="Perempuan" selected>Perempuan</option>
                                        <option value="Laki-laki">Perempuan</option>
                                    <?php else : ?>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki-laki" selected>Laki-laki</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="phone">Nomor HP</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?= $key['phone']; ?>" required />
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="marriage">Status Pernikahan</label>
                                <select name="marriage" id="marriage" class="form-control">
                                    <option value="">--pilih status pernikahan--</option>
                                    <?php if ($key['marriage_status'] == "Belum Menikah") : ?>
                                        <option value="Belum Menikah" selected>Belum Menikah</option>
                                        <option value="Sudah Menikah">Sudah Menikah</option>
                                    <?php else : ?>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Sudah Menikah" selected>Sudah Menikah</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="marriage">Pendidikan Terakhir yang Ditamatkan</label>
                                <select name="education" id="education" class="form-control">
                                    <?php if ($key['education'] == "SD/MI") : ?>
                                        <option value="">--pilih pendidikan terakhir--</option>
                                        <option value="SD/MI" selected>SD/MI</option>
                                        <option value="SMP/MTs">SMP/MTs</option>
                                        <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                        <option value="DI">DI</option>
                                        <option value="DII">DII</option>
                                        <option value="DIII">DIII</option>
                                        <option value="DIV">DIV</option>
                                        <option value="S1">S1</option>
                                    <?php elseif ($key['education'] == "SMP/MTs") : ?>
                                        <option value="">--pilih pendidikan terakhir--</option>
                                        <option value="SD/MI">SD/MI</option>
                                        <option value="SMP/MTs" selected>SMP/MTs</option>
                                        <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                        <option value="DI">DI</option>
                                        <option value="DII">DII</option>
                                        <option value="DIII">DIII</option>
                                        <option value="DIV">DIV</option>
                                        <option value="S1">S1</option>
                                    <?php elseif ($key['education'] == "SMA/MA/SMK") : ?>
                                        <option value="">--pilih pendidikan terakhir--</option>
                                        <option value="SD/MI">SD/MI</option>
                                        <option value="SMP/MTs">SMP/MTs</option>
                                        <option value="SMA/MA/SMK" selected>SMA/MA/SMK</option>
                                        <option value="DI">DI</option>
                                        <option value="DII">DII</option>
                                        <option value="DIII">DIII</option>
                                        <option value="DIV">DIV</option>
                                        <option value="S1">S1</option>
                                    <?php elseif ($key['education'] == "DI") : ?>
                                        <option value="">--pilih pendidikan terakhir--</option>
                                        <option value="SD/MI">SD/MI</option>
                                        <option value="SMP/MTs">SMP/MTs</option>
                                        <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                        <option value="DI" selected>DI</option>
                                        <option value="DII">DII</option>
                                        <option value="DIII">DIII</option>
                                        <option value="DIV">DIV</option>
                                        <option value="S1">S1</option>
                                    <?php elseif ($key['education'] == "DII") : ?>
                                        <option value="">--pilih pendidikan terakhir--</option>
                                        <option value="SD/MI">SD/MI</option>
                                        <option value="SMP/MTs">SMP/MTs</option>
                                        <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                        <option value="DI">DI</option>
                                        <option value="DII" selected>DII</option>
                                        <option value="DIII">DIII</option>
                                        <option value="DIV">DIV</option>
                                        <option value="S1">S1</option>
                                    <?php elseif ($key['education'] == "DIII") : ?>
                                        <option value="">--pilih pendidikan terakhir--</option>
                                        <option value="SD/MI">SD/MI</option>
                                        <option value="SMP/MTs">SMP/MTs</option>
                                        <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                        <option value="DI">DI</option>
                                        <option value="DII">DII</option>
                                        <option value="DIII" selected>DIII</option>
                                        <option value="DIV">DIV</option>
                                        <option value="S1">S1</option>
                                    <?php elseif ($key['education'] == "DIV") : ?>
                                        <option value="">--pilih pendidikan terakhir--</option>
                                        <option value="SD/MI">SD/MI</option>
                                        <option value="SMP/MTs">SMP/MTs</option>
                                        <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                        <option value="DI">DI</option>
                                        <option value="DII">DII</option>
                                        <option value="DIII">DIII</option>
                                        <option value="DIV" selected>DIV</option>
                                        <option value="S1">S1</option>
                                    <?php else : ?>
                                        <option value="">--pilih pendidikan terakhir--</option>
                                        <option value="SD/MI">SD/MI</option>
                                        <option value="SMP/MTs">SMP/MTs</option>
                                        <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                        <option value="DI">DI</option>
                                        <option value="DII">DII</option>
                                        <option value="DIII">DIII</option>
                                        <option value="DIV">DIV</option>
                                        <option value="S1" selected>S1</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="job">Pekerjaan</label>
                                <input type="text" class="form-control" id="job" name="job" placeholder="" value="<?= $key['job']; ?>" required />
                            </div>
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


<!-- DELETE MITRA MODAL-->
<?php foreach ($mitraList as $key) : ?>
    <div class="modal fade" id="deleteMitraModal<?= $key['mitra_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteMitraModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title h5 text-light" id="deleteMitraModalLabel">Apakah yakin ingin menghapus data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak dapat dikembalikan. Pilih <b>Hapus</b> jika ingin menghapus data <b><?= $key['name']; ?></b>.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('manajemen/mitra_list/deleteMitra/' . $key['mitra_id']); ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>