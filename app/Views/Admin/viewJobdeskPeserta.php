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
                    <form method="POST" action="" style="padding-bottom: 20px;">
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
                            <!-- <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                <select name="tanggal" class="form-control float-right" id="tanggal" onchange="ganti(this.value)">
                                    <option value="null" selected="">Pilih Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div> -->
                        </div>
                    </form>

                    <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch table">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama Peserta</th>
                                <th style="text-align: center;">Nama Jobdesk</th>
                                <th style="text-align: center;">Deskripsi</th>
                                <th style="text-align: center;">Waktu Mulai</th>
                                <th style="text-align: center;">Waktu Selesai</th>
                                <th style="text-align: center;">Status Jobdesk</th>
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

        $(function() {
            /* Isi Table */
            $('.table').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "ajax": {
                    "url": "<?= base_url() ?>/Admin/JobdeskPeserta/data/" + $('#tanggal').val(),
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "nama_siswa"
                    },
                    {
                        "data": "nama_jobdesk"
                    },
                    {
                        "data": "deskripsi"
                    },
                    {
                        "data": "waktu_mulai"
                    },
                    {
                        "data": "waktu_selesai"
                    },
                    {
                        "data": "status_jobdesk"
                    }
                ]
            });
            /* Isi Table */
        });

        $('#tanggal').on('apply.daterangepicker', function(ev, picker) {
            var tanggal = picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY');
            $('.table').DataTable().ajax.url('<?= base_url() ?>/Admin/JobdeskPeserta/data/' + tanggal).load();
        });
    </script>


</body>

</html>