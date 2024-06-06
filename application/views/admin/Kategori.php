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
					<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
						data-bs-target="#verticalycentered">
						Tambah Kategori
					</button>
					<div id="autohide">
						<?= $this->session->flashdata('notifikasi') ?>
					</div>
					<!-- modal tambah -->
					<div class="modal fade" id="verticalycentered" tabindex="-1" aria-hidden="true"
						style="display: none;">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Tambah Kategori</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="row g-3" method="post"
										action="<?= base_url('admin/kategori/tambah')?>">
										<div class="col-12">
											<label for="inputNanme4" class="form-label">Nama Kategori</label>
											<input type="text" name="nama_kategori" class="form-control"
												id="inputNanme4">
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
					<!-- modal tambah -->
					<!-- table -->
					<table class="table datatable">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Kategori</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach($kategori as $user){ ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $user['nama_kategori']?></td>
								<td>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal"
										data-bs-target="#edit<?= $user['id_kategori']?>">
										edit <i class="bi-pencil-square"></i>
									</button>
									<a onClick="return confirm('apakah yakin untuk hapus data ??')"
										class="btn btn-danger"
										href="<?= base_url('admin/kategori/delete/'.$user['id_kategori']) ?>"><i
											class="ri-delete-bin-6-fill"></i> delete
									</a>
								</td>
							</tr>
							<div class="modal fade" id="edit<?= $user['id_kategori']?>" tabindex="-1" aria-hidden="true"
								style="display: none;">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Update Kategori</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form class="row g-3" method="post"
												action="<?= base_url('admin/kategori/update')?>">
												<input type="hidden" value="<?= $user['id_kategori']?>" name="id_kategori">
												<div class="col-12">
													<label for="inputNanme4" class="form-label">Nama Kategori</label>
													<input type="text" name="nama_kategori" class="form-control"
														id="inputNanme4" value="<?= $user['nama_kategori']?>">
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
