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
        <div class="col-lg-6">
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
        <div class="col-lg">
            <a href="" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#newMitraModal"><i class="fas fa-user-plus mr-2"></i> Tambahkan Data Pegawai Baru</a>
            <div class=" table-responsive">
                <table class="table table-hover table-sm dataTables" id="dataMitra" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Nomor HP</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Wilayah</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($employeeList as $key) : ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td class="text-center"><?= $key['nip']; ?></td>
                                <td><?= $key['uname']; ?></td>
                                <td class="text-center"><?= $key['email']; ?></td>
                                <td class="text-center"><?= $key['phone']; ?></td>
                                <td class="text-center"><?= $key['role']; ?></td>
                                <td class="text-center"><?= $key['gender']; ?></td>
                                <td class="text-center"><?= $key['position']; ?></td>
                                <td class="text-center"><?= $key['district']; ?></td>
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



<!-- New Employee Data Modal -->
<div class="modal fade" id="newMitraModal" tabindex="-1" role="dialog" aria-labelledby="newMitraModalLabel" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h5 text-light" id="newMitraModalLabel">Tambah Data Mitra</h5>
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
                                    <option value="<?= $key['id']; ?>"><?= str_replace('_', ' ', $key['village']); ?></option>
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
                            <label class="mt-2" for="marriage">Status Pernikahan</label>
                            <select name="marriage" id="marriage" class="form-control">
                                <option value="">--pilih status pernikahan--</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Sudah Menikah">Sudah Menikah</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="marriage">Pendidikan Terakhir yang Ditamatkan</label>
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