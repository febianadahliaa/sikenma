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
            <?php
            if ($this->session->flashdata('error') != '') {
                echo '<div class="alert alert-danger" role="alert">';
                echo $this->session->flashdata('error');
                echo '</div>';
            }
            ?>
            <?php
            if ($this->session->flashdata('message') != '') {
                echo '<div class="alert alert-success" role="alert">';
                echo $this->session->flashdata('message');
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Page Content -->
    <div class="row">
        <div class="col-lg">
            <div class="table-responsive">
                <table class="table table-hover dataTables-list" id="dataPerPeg" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">No. HP</th>
                            <th class="text-center">Kecamatan</th>
                            <th class="text-center">Desa</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Status Pernikahan</th>
                            <th class="text-center">Pendidikan</th>
                            <th class="text-center">Pekerjaan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mitraList as $key) : ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $key['name']; ?></td>
                                <td><?= $key['phone']; ?></td>
                                <td><?= $key['district']; ?></td>
                                <td><?= $key['village']; ?></td>
                                <td><?= $key['date_of_birth']; ?></td>
                                <td><?= $key['gender']; ?></td>
                                <td><?= $key['marriage_status']; ?></td>
                                <td><?= $key['education']; ?></td>
                                <td><?= $key['job'] ?></td>
                                <td class="text-center">
                                    <a href="" class="badge badge-primary">Edit</a>
                                    <a href="" class="badge badge-danger">Hapus</a>
                                </td>


                                <!-- <td class="action text-center" width="250">
                                    <a href="" class="badge badge-pill badge-primary mr-1 open-edit-dialog" data-id="<?= $nilai->perjadin_id ?>" data-toggle="modal" data-target="#editModal">Edit</a>
                                    <a href="<?= base_url('perjadin_pegawai/list_perjadin/delete/' . $nilai->perjadin_id) ?>" class="badge badge-pill badge-danger delete" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                                </td>

                                <td class="action text-center" width="250">
                                    <a class="btn btn-sm open-edit-dialog" data-id="<?= $nilai->perjadin_id ?>" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url('perjadin_pegawai/list_perjadin/delete/' . $nilai->perjadin_id) ?>" class="btn btn-sm text-danger delete" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i> Hapus</a>
                                </td> -->

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