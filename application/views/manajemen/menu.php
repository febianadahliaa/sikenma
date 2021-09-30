<!-- Begin Page Content -->
<div class="container-fluid px-md-4">

    <!-- Page heading -->
    <div class="row">
        <div class="col-lg">
            <h3 class="text-gray-800"><strong><?= $title ?></strong></h3>
            <hr class="sidebar-divider">
        </div>
    </div>

    <!-- Notification -->
    <div class="row">
        <div class="col">
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
    <div class="row mb-4">
        <!-- Menu Table -->
        <div class="col-lg-3">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambahkan Menu Baru</a>
            <div class=" table-responsive">
                <table class="table table-striped dataTables" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Menu</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--id="dataPerSaya"-->
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $key) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= str_replace('_', ' ', $key['menu']); ?></td>
                                <td class="text-center">
                                    <a href="" class="badge badge-primary">Edit</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Submenu Table -->
        <div class="col-lg-9">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambahkan Submenu Baru</a>
            <div class=" table-responsive">
                <table class="table table-striped dataTables" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Submenu</th>
                            <th class="text-center">Menu</th>
                            <th class="text-center">Url</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Aktif</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--id="dataPerSaya"-->
                        <?php $i = 1; ?>
                        <?php foreach ($subMenu as $key) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= str_replace('_', ' ', $key['sub_menu_name']); ?></td>
                                <td><?= str_replace('_', ' ', $key['menu']); ?></td>
                                <td><?= $key['url']; ?></td>
                                <td><?= $key['icon']; ?></td>
                                <td><?= $key['is_active']; ?></td>
                                <td class="text-center">
                                    <a href="" class="badge badge-primary">Edit</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- New Menu Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambahkan Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/addMenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama menu">
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


<!-- New Sub Menu Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambahkan Submenu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/addSubMenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="sub_menu_name" name="sub_menu_name" placeholder="Nama submenu">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Pilih menu dari submenu</option>
                            <?php foreach ($menu as $key) : ?>
                                <option value="<?= $key['id']; ?>"><?= str_replace('_', ' ', $key['menu']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url submenu">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Gambar submenu">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">Apakah submenu akan diaktifkan?</label>
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