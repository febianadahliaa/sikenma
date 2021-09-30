<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page heading -->
    <div class="row">
        <div class="col-lg-6">
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
        <div class="col-lg-6">
            <div class="table-responsive">
                <table class="table table-hover dataTables-list" id="dataPerPeg" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Kegiatan Statistik</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($activityList as $key) : ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><?= $key['activity']; ?></td>
                                <td class="text-center">
                                    <a href="" class="badge badge-primary">Edit</a>
                                    <a href="" class="badge badge-danger">Hapus</a>
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