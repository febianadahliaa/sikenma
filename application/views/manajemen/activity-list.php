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
        <div class="col-lg-6">
            <a href="" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#newActivityModal"><i class="fas fa-user-plus mr-2"></i> Tambahkan Kegiatan Baru</a>
            <div class=" table-responsive">
                <table class="table table-hover table-sm dataTables" id="dataActivityList" width="100%" cellspacing="0">
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
                            <tr id="<?= $key['id']; ?>">
                                <td class="text-center"><?= $i; ?></td>
                                <td><?= $key['activity']; ?></td>
                                <td class="text-center">
                                    <a href="" class="badge badge-pill badge-primary mr-1 openEditDialog" data-id="<?= $key['id']; ?>" data-toggle="modal" data-target="#editActivityModal">Edit</a>
                                    <a href="<?= base_url('manajemen/activity_list/deleteActivity/' . $key['id']); ?>" class="badge badge-pill badge-danger deleteActivity" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                                    <!-- onclick="return confirm('yakin?');" -->
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



<!-- New Activity Modal -->
<div class="modal fade" id="newActivityModal" tabindex="-1" role="dialog" aria-labelledby="newActivityModalLabel" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h5 text-light" id="newActivityModalLabel">Tambah Kegiatan Statistik Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <form action="<?= base_url('manajemen/activity_list/addActivity'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-row">
                        <label class="mt-2" for="activity">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="activity" name="activity" placeholder="Tuliskan nama kegiatan dengan lengkap" required />
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


<!-- Edit Activity modal -->
<div class="modal fade" id="editActivityModal" tabindex="-1" role="dialog" aria-labelledby="editActivityModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h5 text-light" id="editActivityModalLabel">Edit Kegiatan Statistik</h5>
                <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= base_url('manajemen/activity_list/editActivity'); ?>" method="post">
                <div class=" modal-body">
                    <div class="form-row">
                        <!-- <div class="form-group"> -->
                        <label class="mt-2" for="menu">Nama Kegiatan</label>
                        <input class="form-control" type="text" id="menu" name="menu" required />
                        <!-- </div> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Delete Activity Data with Sweet Alert -->
<script type="text/javascript">
    $(".deleteActivity").click(function() {
        var id = $(this).parents("tr").attr("id");

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak akan bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Hapus",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batalkan",
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('manajemen/activity_list/deleteActivity/') ?>' + id,
                    type: 'DELETE',
                    error: function() {
                        Swal.fire('Something is wrong', '', "error");
                    },
                    success: function(data) {
                        $("#" + id).remove();
                        Swal.fire({
                            icon: 'success',
                            title: 'Data pegawai berhasil dihapus!',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 1400);
                    }
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Data Anda aman ✧◝(⁰▿⁰)◜✧',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1500
                })
            }
        })
    });
</script>