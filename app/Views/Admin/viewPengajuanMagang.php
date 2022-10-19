<?php $session = session(); ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<?= $this->include("Admin/layout/head_tabel"); ?>

<body class="animsition">

    <?= $this->include("Admin/layout/nav") ?>

    <?= $this->include("Admin/layout/sidebar") ?>

    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title"><?= $judul; ?></h1>
        </div>

        <div class="page-content">
            <!-- Panel Table Individual column searching -->
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title"><?= $judul; ?></h3>
                </header>
                <div class="panel-body">
                    <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Pengantar</th>
                                <th>Proposal</th>
                                <th>Status</th>
                                <th>Konfirmasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Pengantar</th>
                                <th>Proposal</th>
                                <th>Status</th>
                                <th>Konfirmasi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pengajuan as $item) {
                            ?>
                                <tr>
                                    <td width="1%"><?= $no++; ?></td>
                                    <td><?= $item['nama_siswa']; ?></td>
                                    <td><?= $item['waktu_mulai']; ?></td>
                                    <td><?= $item['waktu_selesai']; ?></td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#pengantarModal" data-whatever="<?= $item['pengantar']; ?>" name="btn-detail">
                                            Lihat
                                        </a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="<?= $item['proposal']; ?>" name="btn-detail">
                                            Lihat
                                        </a>
                                    </td>
                                    <td><?= $item['status_pengajuan']; ?></td>
                                    <td>
                                        <center>
                                            <a href="" data-toggle="modal" data-toggle="modal" data-target="#tolakModal" name="btn-tolak" onclick="detail_edit(<?= $item['id_pengajuan']; ?>)" class="btn btn-sm btn-icon btn-edit btn-warning"><i class="icon md-close" aria-hidden="true"></i></a>
                                            <a href="" data-toggle="modal" data-toggle="modal" data-target="#terimaModal" name="btn-terima" onclick="validasi(<?= $item['id_pengajuan']; ?>,<?= $item['id_siswa']; ?>)" class="btn btn-sm btn-icon btn-edit btn-success"><i class="icon md-check" aria-hidden="true"></i></a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="" class="btn btn-sm btn-delete btn-danger" onclick="Hapus(<?= $item['id_pengajuan']; ?>)" data-toggle="modal" data-target="#deleteModal" data-id="<?= $item['id_pengajuan']; ?>">Hapus</a>
                                        </center>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Panel Table Individual column searching -->

        </div>
    </div>
    <!-- End Page -->

    <!-- Modal Tolak Class-->
    <form action="<?php echo base_url('Admin/PengajuanMagang/konfirmasi_pengajuan'); ?>" method="post" id="form_edit" data-parsley-validate="true" autocomplete="off">
        <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog modal-warning" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Pengajuan Magang</h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Tolak Pengajuan Magang Peserta?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" style="display: none;"  name="id_pengajuan" id="id_pengajuan">
                        <input type="hidden" style="display: none;"  name="status_pengajuan" id="status_pengajuan" value="Ditolak">
                        <button type="reset" class="btn btn-secondary" id="batal_up" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tolak" class="btn btn-warning">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Tolak Class-->

    <!-- Modal Terima Class-->
    <form action="<?= base_url('Admin/PengajuanMagang/konfirmasi_pengajuan'); ?>" method="post" id="form_edit" data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="terimaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog modal-success" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Pengajuan Magang</h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Terima Pengajuan Magang Peserta?</h4><br>
                        <h5>Upload Surat Balasan</h5><br>
                        <input type="file" name="file" id="file" class="file" required="" accept=
                            "application/msword,application/pdf">

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" style="display: none;"  name="id_pengajuan" id="id_pengajuan" class="id_pengajuan">
                        <input type="hidden" style="display: none;"  name="id_siswa" id="id_siswa" class="id_siswa">
                        <input type="hidden" style="display: none;"  name="status_pengajuan" id="status_pengajuan" value="Diterima">
                        <button type="reset" class="btn btn-secondary" id="batal_up" data-dismiss="modal">Batal</button>
                        <button type="submit" name="terima" class="btn btn-success">Terima</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Terima Class-->


    <!-- Start Modal Delete Class -->
    <form action="<?= base_url('Admin/PengajuanMagang/delete_pengajuan'); ?>" method="post">
        <div class="modal fade" id="deleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Apakah Ingin menghapus pengajuan ini?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="text" name="id" class="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Delete Class -->

    <!-- Modal Proposal-->
    <div class="modal fade example-modal-lg" aria-hidden="true" id="exampleModal" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="exampleOptionalLarge">Proposal Pengajuan Magang</h4>
                </div>
                <div class="modal-body">
                    <iframe class="pdf" src="" width="100%" height="400"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal Pengantar-->
    <div class="modal fade example-modal-lg" aria-hidden="true" id="pengantarModal" aria-labelledby="exampleOptionalLarge" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="exampleOptionalLarge">Surat Pengantar Pengajuan Magang</h4>
                </div>
                <div class="modal-body">
                    <iframe class="pdf" src="" width="100%" height="400"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Footer -->
    <?= $this->include("Admin/layout/footer") ?>
    <?= $this->include("Admin/layout/js_tabel") ?>

    <script>
        function Hapus(id) {
            $('.id').val(id);
            $('#deleteModal').modal('show');
        };

        function validasi(id_pengajuan, id_siswa) {
            $('.id_pengajuan').val(id_pengajuan);
            $('.id_siswa').val(id_siswa);
            $('#terimaModal').modal('show');
        };

        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body input').val(recipient)
            modal.find('.pdf').attr('src', '<?= base_url() ?>' + '/' + recipient)
        })

        $('#pengantarModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body input').val(recipient)
            modal.find('.pdf').attr('src', '<?= base_url() ?>' + '/' + recipient)
        })

        function detail_edit(isi) {
            $.getJSON('<?php echo base_url('Admin/PengajuanMagang/data_edit'); ?>' + '/' + isi, {},
                function(json) {
                    $('#id_pengajuan').val(json.id_pengajuan);
                });
        }
    </script>


</body>

</html>
