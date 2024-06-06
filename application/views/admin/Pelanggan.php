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
						Tambah Pelanggan
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
									<h5 class="modal-title">Tambah Pelanggan</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="row g-3" method="post" action="<?= base_url('admin/pelanggan/tambah')?>">
										<div class="col-12">
											<label for="inputNanme4" class="form-label">Your Name</label>
											<input type="text" name="nama" class="form-control" id="inputNanme4">
										</div>
										<div class="col-12">
											<label for="inputEmail4" class="form-label">Username</label>
											<input type="text" name="username" class="form-control" id="inputEmail4">
										</div>
										<div class="col-12">
											<label for="inputPassword4" class="form-label">Password</label>
											<input type="password" name="password" class="form-control" id="inputPassword4">
										</div>
										<div class="col-12">
											<label for="inputEmail4" class="form-label">Alamat</label>
											<input type="text" name="alamat" class="form-control" id="inputEmail4">
										</div>
										<div class="col-12">
											<label for="inputEmail4" class="form-label">Whatsapp</label>
											<input type="text" name="whatsapp" class="form-control" id="inputEmail4">
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
								<th>Nama</th>
								<th>Username</th>
								<th>Alamat</th>
								<th>Whatsapp</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach($pelanggan as $user){ ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $user['nama']?></td>
								<td><?= $user['username']?></td>
								<td><?= $user['alamat']?></td>
								<td><?= $user['whatsapp']?></td>
								<td>
								<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
										data-bs-target="#edit<?= $user['id_pelanggan']?>">
										edit <i class="bi-pencil-square"></i>
									</button>
								<a onClick="return confirm('apakah yakin untuk hapus data user')"
										class="btn btn-danger"
										href="<?= base_url('admin/pelanggan/delete/'.$user['id_pelanggan']) ?>"><i
										class="ri-delete-bin-6-fill"></i> delete
								</a>
								</td>
							</tr>
							<div class="modal fade" id="edit<?= $user['id_pelanggan']?>" tabindex="-1" aria-hidden="true"
						style="display: none;">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Update User</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="row g-3" method="post" action="<?= base_url('admin/pelanggan/update')?>">
									<input type="hidden" value="<?= $user['id_pelanggan']?>" name="id_pelanggan">
										<div class="col-12">
											<label for="inputNanme4" class="form-label">Your Name</label>
											<input type="text" name="nama" value="<?= $user['nama']?>" class="form-control" id="inputNanme4">
										</div>
										<div class="col-12">
											<label for="inputEmail4" class="form-label">Username</label>
											<input type="text" name="username" value="<?= $user['username']?>" class="form-control" id="inputEmail4">
										</div>
										<div class="col-12">
											<label for="inputPassword4" class="form-label">Password</label>
											<input type="password" name="password" value="<?= $user['password']?>" class="form-control" id="inputPassword4">
										</div>
										<div class="col-12">
											<label for="inputEmail4" class="form-label">Alamat</label>
											<input type="text" name="alamat" value="<?= $user['alamat']?>" class="form-control" id="inputEmail4">
										</div>
										<div class="col-12">
											<label for="inputEmail4" class="form-label">Whatsapp</label>
											<input type="text" name="whatsapp" value="<?= $user['whatsapp']?>" class="form-control" id="inputEmail4">
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
					<!-- table -->
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
