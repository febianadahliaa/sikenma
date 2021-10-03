<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page heading -->
    <div class="row">
        <div class="col-lg-8">
            <h3 class="mb-4 text-gray-800"><strong><?= $title ?></strong></h3>
            <hr class="sidebar-divider">
        </div>
    </div>

    <!-- Notification -->
    <div class="row">
        <div class="col-lg-8">
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
        <div class="col-lg-8">
            <div class=" table-responsive">
                <table class="table table-hover table-sm dataTables" width="100%" cellspacing="0">

                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Wilayah</th>
                            <th class="text-center">Overall Rating</th>
                            <!-- <th class="text-center">Action</th> -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mitraRecord as $key) : ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $key['name']; ?></td>
                                <td><?= $key['district']; ?></td>
                                <td class="text-center">
                                    <?= ($key['skor_geo'] * 0.15 + $key['skor_it'] * 0.1 + $key['skor_prob'] * 0.25 + $key['skor_qty'] * 0.2 + $key['skor_abc'] * 0.1 + $key['skor_time'] * 0.2); ?>
                                </td>
                                <!-- <td class="text-center">
                                    <a href="" class="badge badge-primary">Edit</a>
                                    <a href="" class="badge badge-danger">Hapus</a>
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