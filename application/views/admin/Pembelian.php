<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?= $title?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">
	<!-- css -->
	<?php require_once('layout/_css.php') ?>
	<!-- /css  -->
</head>

<body>
	<!-- ======= Header ======= -->
	<?php require_once('layout/_header.php') ?>
	<!-- End Header -->
	<!-- ======= Sidebar ======= -->
	<?php require_once('layout/_sidebar.php') ?>
	<!-- End Sidebar-->
	<!-- main -->
	<main id="main" class="main">
		<div class="pagetitle">
			<div class="card">
				<h1 class="card-header"><?= $title?></h1>
				<div class="card-body">
					<div id="autohide">
						<?= $this->session->flashdata('notifikasi') ?>
					</div>
					<table class="table datatable col-12">
						<thead>
							<th>No</th>
							<th>Kode Pembelian</th>
							<th>Tanggal</th>
							<th>Produk</th>
							<th>Jumlah</th>
							<th>Size</th>
							<th>Harga</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Status</th>
							<th>Aksi</th>
						</thead>
						<tbody>
							<?php $no=1; foreach($pembelian as $beli){ ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $beli['kode_pembelian'] ?></td>
								<td><?= $beli['tanggal']?></td>
								<td><?= $beli['nama_produk'] ?></td>
								<td><?= $beli['jumlah'] ?></td>
								<td><?= $beli['size']?></td>
								<td>Rp <?= number_format($beli['harga'])  ?></td>
								<td><?= $beli['nama'] ?></td>
								<td><?= $beli['alamat'] ?></td>
								<td><?= $beli['status'] ?></td>
								<td>
									<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
										data-bs-target="#edit<?= $beli['id_pembelian']?>">
										<i class="bi-pencil-square"></i>
									</button>
									<a onClick="return confirm('apakah yakin untuk hapus data user')"
										class="btn btn-danger"
										href="<?= base_url('admin/pembelian/delete/'.$beli['kode_pembelian']) ?>"><i
										class="ri-delete-bin-6-fill"></i>
								</a>
								</td>
							</tr>
							<div class="modal fade" id="edit<?= $beli['id_pembelian']?>" tabindex="-1" aria-hidden="true"
								style="display: none;">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Update Status</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form class="row g-3" method="post"
												action="<?= base_url('admin/pembelian/update')?>">
												<input type="hidden" value="<?= $beli['id_pembelian']?>" name="id_pembelian">
												<div class="col-12">
													<label for="inputNanme4" class="form-label">Status</label>
													<select name="status" id="" class="form-control">
														<option value="Pembungkusan">Pembungkusan</option>
														<option value="Pengiriman">Pengiriman</option>
														<option value="Terima">Terima</option>

													</select>
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary"
												data-bs-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save changes</button>
										</div>
										</form>
									</div>
								</div>
							</div>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<?php require_once('layout/_footer.php') ?>
	<!-- End Footer -->
	<!-- Vendor JS Files -->
	<?php require_once('layout/_js.php') ?>

</body>

</html>
