<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">SIKENMA</h1>
                                </div>

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

                                <form class="user" method="post" action="<?= base_url(); ?>auth">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan email (nama@bps.go.id" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> -->
                                <div class="text-center">
                                    <a class="small" href="<?= base_url(); ?>auth/register">
                                        Buat Akun!
                                        <!-- Create an Account! -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>