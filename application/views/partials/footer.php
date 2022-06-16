<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SIKENMA <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Apakah yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih <B>Logout</B> jika ingin mengakhiri sesi ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- DataTables (Comment this code)-->
<!-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script> -->

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<!-- CUSTOM JS (Comment this code)-->
<!-- <script src="<?= base_url('assets/'); ?>js/myscript.js"></script> -->

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<!-- DataTables -->
<script type="text/javascript">
    $(document).ready(function() {
        $('table.dataTables').DataTable();
    });
</script>


<!-- Auto Close Alert -->
<script type="text/javascript">
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    });
</script>


<!-- Modal Edit (BELOM JADI) -->
<script type="text/javascript">
    $(document).ready(function() {
        var activity_id = $(this).data('id');

        if (activity_id) {

        }
    })
</script>


<!-- Delete Activity Data with Sweet Alert -->
<script type="text/javascript">
    $(".deleteActivity").click(function() {
        var id = $(this).parents("tr").attr("id");

        Swal.fire({
            title: 'Apakah yakin ingin menghapus data master kegiatan?',
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
                            title: 'Data kegiatan statistik berhasil dihapus.',
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


<!-- Delete Activities Data with Sweet Alert -->
<script type="text/javascript">
    $(".deleteActivities").click(function() {
        var id = $(this).parents("tr").attr("id");

        Swal.fire({
            title: 'Apakah yakin ingin menghapus data kegiatan berjalan?',
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
                    url: '<?= base_url('manajemen/activity_list/deleteActivities/') ?>' + id,
                    type: 'DELETE',
                    error: function() {
                        Swal.fire('Something is wrong', '', "error");
                    },
                    success: function(data) {
                        $("#" + id).remove();
                        Swal.fire({
                            icon: 'success',
                            title: 'Data kegiatan berjalan berhasil dihapus.',
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


</body>

</html>