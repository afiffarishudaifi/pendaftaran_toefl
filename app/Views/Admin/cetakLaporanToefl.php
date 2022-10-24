<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/docs/themeforest/base/assets/images/favicon.ico">
	<style type="text/css">
		table {
			font-family: "Times New Roman", serif;
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}
	</style>
</head>
<body>
	<center>
		<table width="625">
			<tr>
				<td><img src="<?= base_url() ?>/docs/img/img_logo/logokab.gif" width="90" height="90"></td>
				<td>
				<center>
					<font size="4"><b>Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi</b></font><br>
					<font size="3"><b>UNIVERSITAS PGRI MADIUN</b></font><br>
					<font size="2">Jl. Setia Budi No.85, Kanigoro, Kec. Kartoharjo, Kota Madiun, Jawa Timur 63118</font><br>
					<font size="2"><i>Website : http://unipma.ac.id Email : rektorat@unipma.ac.id</i></font><br>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><b><hr></b></td>
			</tr>
		</table>
		<center>
			<h3>
				<?= $judul; ?>
			</h3>
		</center>
		<table width="625" border="1">
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Nama Jadwal</th>
                <th style="text-align: center;">Nama Pendaftar</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Waktu Mulai</th>
                <th style="text-align: center;">Waktu Selesai</th>
            </tr>
        	<?php
            $no = 1;
            foreach ($laporan as $item) {
            ?>
            <tr>
                <td width="1%" style="text-align: center;"><?= $no++; ?></td>
                <td style="text-align: center;"><?= $item['nama_jadwal']; ?></td>
                <td style="text-align: center;"><?= $item['nama_pendaftar']; ?></td>
                <td style="text-align: center;"><?= $item['email']; ?></td>
                <td style="text-align: center;"><?= $item['tanggal_mulai_pelaksanaan']; ?></td>
                <td style="text-align: center;"><?= $item['tanggal_selesai_pelaksanaan']; ?></td>
            </tr>
            <?php } ?>
		</table>
		<br>
		<table width="625">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala Pendaftar Toefl<br><br><br><br>Rangga Mukti S.Pd, M.Pd</td>
			</tr>
	     </table>
	</center>
</body>
	<script>
		// window.print();
	</script>
</html>
