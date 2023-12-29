<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4><?= $title ?></h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
					</div>
				</div>
			</div>
			
		</div>
		<!-- Input Validation End -->

		<!-- Simple Datatable start -->
		<div class="card-box mb-30">
			<div class="pd-20">
				<h4 class="text-blue h4">Data Semua Transaksi</h4>
				<!-- <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p> -->
			</div>
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">No</th>
							<th>Barcode</th>
							<th>No Transaksi</th>
							<th>Tanggal Transaksi</th>
							<th>Nama Barang</th>
							<th>Harga Barang</th>
							<th>Qty</th>
							<th>Total Harga </th>
						</tr>
					</thead>
					<tbody>
					<?php
					// Gantilah ini dengan informasi koneksi database Anda
$host = "localhost";
$username = "root";
$password = "";
$database = "frozen-food";

// Buat koneksi ke database
$mysqli = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
                            require_once 'vendor/autoload.php';

                            use Endroid\QrCode\QrCode;
                            use Endroid\QrCode\Writer\PngWriter;

                            $j = 1;
                            foreach ($transaksi as $key => $minst) {
                                // Generate QR code dari no_transaksi
								$barcode = generateBarcode($minst->no_transaksi, $mysqli);
								?>
                                <tr>
                                    <td class="table-plus"><?= $j++ ?></td>
									<td>            <img src="/frozen-food/QR/<?= $minst->qr ?>" alt="QR Code" class="img-fluid">

									<br>
									<a href="/frozen-food/QR/<?= $minst->qr ?>" download class="btn btn-outline-primary btn-sm">Download QR</a>
		</td>

                                    <td><?= $minst->no_transaksi ?></td>
                                    <td><?= $minst->tgl_transaksi ?></td>
                                    <td><?= $minst->nama_barang ?></td>
                                    <td>Rp. <?= number_format($minst->harga, 0) ?></td>
                                    <td><?= $minst->qty ?></td>
                                    <td>Rp. <?= number_format($minst->total_harga, 0) ?></td>
                                </tr>
								
                            <?php

                            }

							function generateBarcode($no_transaksi, $mysqli)
							{
								// Buat instance baru dari QR code
								$qrCode = new QrCode($no_transaksi);
							
								try {
									// Simpan gambar ke file (sesuaikan bagian ini sesuai kebutuhan Anda)
									$filename = 'QR/QR_' . $no_transaksi . '.png';
							
									// Gunakan writer PNG untuk menyimpan QR Code ke file
									$qrCode->writeFile($filename);
							
									// Simpan nama file ke database (tanpa menyertakan direktori QR/)
$filenameWithoutDirectory = 'QR_' . $no_transaksi . '.png';
$sql = "UPDATE transaksi SET qr = '$filenameWithoutDirectory' WHERE no_transaksi = '$no_transaksi'";
									$result = $mysqli->query($sql);
							
								
							
									return $filename;
								} catch (\Exception $e) {
									// Tangani kesalahan
									echo 'Error generating QR code: ' . $e->getMessage() . '<br>';
									return null;
								}
							}
							
							
							
                            ?>

					</tbody>
				</table>
			</div>
		</div>
		<!-- Simple Datatable End -->