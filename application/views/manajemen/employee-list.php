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
            <a href="" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#addEmployeeModal"><i class="fas fa-user-plus mr-2"></i> Tambahkan Data Pegawai Baru</a>
            <div class=" table-responsive">
                <table class="table table-hover table-sm dataTables" id="dataEmployee" width="100%" cellspacing="0">
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
                            <tr id="<?= $key['nip']; ?>">
                                <td class="number text-center"><?= $i ?></td>
                                <td class="text-center"><?= $key['nip']; ?></td>
                                <td><?= $key['uname']; ?></td>
                                <td class="text-center"><?= $key['district']; ?></td>
                                <td class="text-center"><?= $key['position']; ?></td>
                                <td class="text-center"><?= $key['email']; ?></td>
                                <td class="text-center"><?= $key['phone']; ?></td>
                                <td class="text-center"><?= $key['gender']; ?></td>
                                <td class="text-center"><?= $key['role']; ?></td>
                                <td class="action text-center">
                                    <a href="" class="badge badge-pill badge-success" data-toggle="modal" data-target="#editEmployeeModal<?= $key['nip']; ?>">Edit</a>
                                    <a href="<?= base_url('manajemen/employee_list/deleteEmployee/' . $key['nip']); ?>" class="badge badge-pill badge-danger deleteEmployee" data-toggle="modal" data-target="#deleteEmployeeModal<?= $key['nip']; ?>">Hapus</a>
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



<!-- ADD EMPLOYEE MODAL -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalLabel" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h5 text-light" id="addEmployeeModalLabel">Menambahkan Data Pegawai Baru</h5>
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
                                <?php foreach ($district as $dis) : ?>
                                    <option value="<?= $dis['district_id']; ?>"><?= str_replace('_', ' ', $dis['district']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="mt-2" for="position_id">Jabatan</label>
                            <select name="position_id" id="position_id" class="form-control">
                                <option value="">--pilih jabatan--</option>
                                <?php foreach ($position as $pos) : ?>
                                    <option value="<?= $pos['position_id']; ?>"><?= str_replace('_', ' ', $pos['position']); ?></option>
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
                                <?php foreach ($role as $rol) : ?>
                                    <option value="<?= $rol['role_id']; ?>"><?= str_replace('_', ' ', $rol['role']); ?></option>
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


<!-- EDIT EMPLOYEE MODAL -->
<?php foreach ($employeeList as $editKey) : ?>
    <div class="modal fade" id="editEmployeeModal<?= $editKey['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" data-backdrop="static" data-keyboard="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title h5 text-light" id="editEmployeeModalLabel">Edit Data Pegawai Baru</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <form action="<?= base_url('manajemen/employee_list/editEmployee'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="nip">NIP Pegawai</label>
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="Tulisan NIP lama (9 digit)" value="<?= $editKey['nip']; ?>" required />
                                <!-- readonly -->
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="name">Nama Pegawai</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Tuliskan nama lengkap pegawai" value="<?= $editKey['uname']; ?>" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="district_id">Wilayah</label>
                                <select name="district_id" id="district_id" class="form-control">
                                    <option value="">--pilih kecamatan--</option>
                                    <?php foreach ($district as $dis) : ?>
                                        <?php if ($editKey['district_id'] == $dis['district_id']) : ?>
                                            <option value="<?= $dis['district_id']; ?>" selected><?= str_replace('_', ' ', $dis['district']); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $dis['district_id']; ?>"><?= str_replace('_', ' ', $dis['district']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="position_id">Jabatan</label>
                                <select name="position_id" id="position_id" class="form-control">
                                    <option value="">--pilih jabatan--</option>
                                    <?php foreach ($position as $pos) : ?>
                                        <?php if ($editKey['position_id'] == $pos['position_id']) : ?>
                                            <option value="<?= $pos['position_id']; ?>" selected><?= str_replace('_', ' ', $pos['position']); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $pos['position_id']; ?>"><?= str_replace('_', ' ', $pos['position']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?= $editKey['email']; ?>" required />
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="phone">Nomor HP</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?= $editKey['phone']; ?>" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">--pilih jenis kelamin--</option>
                                    <?php if ($editKey['gender'] == "Perempuan") : ?>
                                        <option value="Perempuan" selected>Perempuan</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                    <?php else : ?>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Laki-laki" selected>Laki-laki</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mt-2" for="role_id">Role</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">--pilih role--</option>
                                    <?php foreach ($role as $rol) : ?>
                                        <?php if ($editKey['role_id'] == $rol['role_id']) : ?>
                                            <option value="<?= $rol['role_id']; ?>" selected><?= str_replace('_', ' ', $rol['role']); ?></option>
                                        <?php else : ?>
                                            <option value="<?= $rol['role_id']; ?>"><?= str_replace('_', ' ', $rol['role']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
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


<!-- DELETE EMPLOYEE MODAL-->
<?php foreach ($employeeList as $key) : ?>
    <div class="modal fade" id="deleteEmployeeModal<?= $key['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title h5 text-light" id="deleteEmployeeModalLabel">Yakin ingin menghapus data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak dapat dikembalikan. Pilih <b>Hapus</b> jika ingin menghapus data <b><?= $key['uname']; ?></b>.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?= base_url('manajemen/employee_list/deleteEmployee/' . $key['nip']); ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>