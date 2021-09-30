<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page heading -->
    <div class="row">
        <div class="col-lg-6">
            <h3 class="mb-4 text-gray-800"><strong><?= $title ?></strong></h3>
        </div>
    </div>

    <!-- Page Content -->
    <div class="card mb-3" style="max-width: 720px;">
        <div class="row no-gutters">
            <div class="col-md-4" style="margin: 1em;">
                <img class="rounded mx-auto d-block" src="<?php if ($this->session->userdata('gender') == 'Perempuan') echo base_url('assets/img/undraw_profile_1.svg');
                                                            else echo base_url('assets/img/undraw_profile_2.svg'); ?>">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <div class="text-center">
                        <p class="card-title h3"><?= $user['uname']; ?></p>
                    </div>
                    <p class="card-text h5"><i class="far fa-fw fa-id-badge"></i> <?= $user['nip']; ?></p>
                    <p class="card-text h5"><i class="far fa-fw fa-envelope"></i> <?= $user['email']; ?></p>
                    <p class="card-text h5"><i class="fas fa-fw fa-rocket"></i> <?= $user['position']; ?></p>
                    <p class="card-text h5"><i class="fas fa-fw fa-phone-square"></i> <?= $user['phone']; ?></p>
                    <p class="card-text h5"><i class="fas fa-fw fa-map-marker-alt"></i> <?= $user['district']; ?></p>

                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->