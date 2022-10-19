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
            <div class="page-header-actions">
            </div>
        </div>

        <div class="page-content">

            <!-- Panel Table Individual column searching -->
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title"><?= $judul; ?></h3>
                </header>

                <div class="panel-body">
                	<form method="POST" action="<?= base_url('Admin/LaporanPeserta/data_cetak') ?>" style="padding-bottom: 20px;">
                		<div class="row">
                			<div class="col-md-4">
                				<div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="tanggal" name="tanggal">
                                </div>
                			</div>

                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                    </div>
                                    <select name="input_status" class="form-control float-right" id="input_status" onchange="ganti(this.value)">
                                        <option value="null" selected="">Pilih Status</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-sm btn-success"><span class="fa fa-print"></span> Cetak</button>
                            </div>
                		</div>
                	</form>
                    <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch table">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama Peserta</th>
                                <th style="text-align: center;">Alamat Peserta</th>
                                <th style="text-align: center;">Jurusan</th>
                                <th style="text-align: center;">Asal sekolah</th>
                                <th style="text-align: center;">Mulai Magang</th>
                                <th style="text-align: center;">Selesai Magang</th>
                                <th style="text-align: center;">Status Magang</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- End Panel Table Individual column searching -->

        </div>
    </div>
    <!-- End Page -->


    <!-- Footer -->
    <?= $this->include("Admin/layout/footer") ?>

    <?= $this->include("Admin/layout/js_tabel") ?>

    <script>
    	$('#tanggal').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY'
            }
        });

        function ganti(status) {
            $('.table').DataTable().ajax.url('<?= base_url() ?>/Admin/LaporanPeserta/data/' + $('#tanggal').val() + '/' + status).load();
        };

        $(function() {            
            /* Isi Table */
            $('.table').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "ajax": {
                    "url": "<?= base_url() ?>/Admin/LaporanPeserta/data/" + $('#tanggal').val() + '/' + $('#input_status').val(),
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "nama_siswa"
                    },
                    {
                        "data": "alamat_siswa"
                    },
                    {
                        "data": "jurusan"
                    },
                    {
                        "data": "nama_sekolah"
                    },
                    {
                        "data": "waktu_mulai"
                    },
                    {
                        "data": "waktu_selesai"
                    },
                    {
                        "data": "status"
                    }
                ]
            });
            /* Isi Table */
        });

        $('#tanggal').on('apply.daterangepicker', function(ev, picker) {
            var tanggal = picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY');
            $('.table').DataTable().ajax.url('<?= base_url() ?>/Admin/LaporanPeserta/data/' + tanggal + '/' + $('#input_status').val()).load();
        });
    </script>

</body>

</html>
