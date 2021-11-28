<!-- BEGIN PAGE CONTENT -->
<div class="container-fluid">

    <!-- PAGE HEADING -->
    <!-- <div class="row">
        <div class="col-lg-8">
            <h4 class="mb-3 text-gray-800"><strong><?= $title ?></strong></h4>
            <hr class="sidebar-divider">
        </div>
    </div> -->

    <!-- NOTIFICATION -->
    <div class="row">
        <div class="col-lg-8">
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
    <div class="card shadow mb-4 border-left-primary col-lg-8">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"><?= $title; ?></h5>
            <!-- NILAI MITRA SECARA UMUM -->
        </div>
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table table-hover table-sm dataTables" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Wilayah</th>
                            <th class="text-center">Overall Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mitraRecord as $key) : ?>
                            <tr <?= $key['mitra_id']; ?>>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $key['name']; ?></td>
                                <td><?= $key['district']; ?></td>
                                <td class="text-center">
                                    <?= round(($key['geo'] * 0.15 + $key['it'] * 0.1 + $key['prob'] * 0.25 + $key['qty'] * 0.2 + $key['abc'] * 0.1 + $key['time'] * 0.2), 2, PHP_ROUND_HALF_UP); ?>
                                    <!-- <?= $mitra_score = ($key['geo'] * 0.15 + $key['it'] * 0.1 + $key['prob'] * 0.25 + $key['qty'] * 0.2 + $key['abc'] * 0.1 + $key['time'] * 0.2); ?>
                                    <?= number_format((float)$mitra_score, 2, '.', ''); ?> -->
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