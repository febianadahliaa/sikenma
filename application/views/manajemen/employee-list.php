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
            <a href="" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#newEmployeeModal"><i class="fas fa-user-plus mr-2"></i> Tambahkan Data Pegawai Baru</a>
            <div class=" table-responsive">
                <table class="table table-hover table-sm dataTables" id="dataMitra" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Wilayah</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Nomor HP</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Role</th>
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
                                <td class="text-center"><?= $key['district']; ?></td>
                                <td class="text-center"><?= $key['position']; ?></td>
                                <td class="text-center"><?= $key['email']; ?></td>
                                <td class="text-center"><?= $key['phone']; ?></td>
                                <td class="text-center"><?= $key['gender']; ?></td>
                                <td class="text-center"><?= $key['role']; ?></td>
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
<div class="modal fade" id="newEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="newEmployeeModalLabel" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h5 text-light" id="newEmployeeModalLabel">Menambahkan Data Pegawai Baru</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <form action="<?= base_url('manajemen/employee_list/addEmployee'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="nip">NIP Pegawai</label>
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Tulisan NIP lama (9 digit)" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="name">Nama Pegawai</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tuliskan nama lengkap pegawai" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="district_id">Wilayah</label>
                            <select name="district_id" id="district_id" class="form-control">
                                <option value="">--pilih kecamatan--</option>
                                <?php foreach ($district as $key) : ?>
                                    <option value="<?= $key['id']; ?>"><?= str_replace('_', ' ', $key['district']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="position_id">Jabatan</label>
                            <select name="position_id" id="position_id" class="form-control">
                                <option value="">--pilih jabatan--</option>
                                <?php foreach ($position as $key) : ?>
                                    <option value="<?= $key['id']; ?>"><?= str_replace('_', ' ', $key['position']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="phone">Nomor HP</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">--pilih jenis kelamin--</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="role_id">Role</label>
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">--pilih role--</option>
                                <?php foreach ($role as $key) : ?>
                                    <option value="<?= $key['id']; ?>"><?= str_replace('_', ' ', $key['role']); ?></option>
                                <?php endforeach; ?>
                            </select>
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