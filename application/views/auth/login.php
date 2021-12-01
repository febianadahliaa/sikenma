<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <!-- <div class="col-lg-7"> -->
        <div class="col-xl-9 col-lg-10 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-6 my-auto">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"> -->
                            <img class="mx-auto d-block" src="<?= base_url('assets/img/kenma.svg'); ?>">
                        </div>

                        <div class="col-lg-6 py-5">
                            <div class="p-5">
                                <div class="text-center">
                                    <!-- <h1 class="h4 mb-4"><i class="rotate-n-15 fas fa-file-alt fa-lg mr-4"></i></h1> -->
                                    <h1 class="h4 text-gray-800 mb-4"><strong>Masuk ke Web Manajemen Mitra <br> BPS Kabupaten Wakatobi</strong></h1>
                                </div>
                                <br>

                                <!-- NOTIFICATIONS -->
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

                                <div class="login-form">
                                    <form class="user" action="<?= base_url('auth'); ?>" method="post">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <span class="fa fa-user"></span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                            <?= form_error('email', '<small class="text-danger pl-5">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            </div>
                                            <?= form_error('password', '<small class="text-danger pl-5">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Log in</button>
                                        </div>
                                        <!-- <div class="bottom-action clearfix">
                                            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                                            <a href="#" class="float-right">Forgot Password?</a>
                                        </div> -->
                                    </form>

                                    <!-- <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email (nama@bps.go.id)" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form> -->
                                    <!-- <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/register'); ?>">
                                        Buat Akun!
                                    </a>
                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>