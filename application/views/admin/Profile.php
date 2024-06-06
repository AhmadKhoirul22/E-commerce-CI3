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
					<form class="row g-3" method="post" action="<?= base_url('admin/profile/update')?>"
						enctype="multipart/form-data">
						<input type="hidden" name="id_profile" value="<?= $profile->id_profile?>">
						<div class="col-12">
							<label for="inputNanme4" class="form-label">Nama Toko</label>
							<input type="text" name="nama_toko" class="form-control" value="<?= $profile->nama_toko?>" id="inputNanme4">
						</div>
						<div class="col-12">
							<label for="inputPassword4" class="form-label">Bidang</label>
							<input type="text" name="bidang" class="form-control" value="<?= $profile->bidang?>" id="inputPassword4">
						</div>
						<div class="col-12">
							<label for="inputPassword4" class="form-label">Detail </label>
							<textarea name="detail_toko" class="form-control" ><?= $profile->detail_toko?></textarea>
						</div>
						<div class="col-12">
							<label for="inputPassword4" class="form-label">Alamat</label>
							<input type="text" name="alamat" class="form-control" value="<?= $profile->alamat?>" id="inputPassword4">
						</div>
						<div class="col-12">
							<label for="inputPassword4" class="form-label">Instagram</label>
							<input type="text" name="instagram" class="form-control" value="<?= $profile->instagram?>" id="inputPassword4">
						</div>
						<div class="col-12">
							<label for="inputPassword4" class="form-label">Email</label>
							<input type="text" name="email" class="form-control" value="<?= $profile->email?>" id="inputPassword4">
						</div>
						<div class="col-12">
							<label for="inputPassword4" class="form-label">WhatsApp</label>
							<input type="text" name="wa" class="form-control" value="<?= $profile->wa?>" id="inputPassword4">
						</div>
						
						<!-- <div class="col-12">
							<label for="inputPassword4" class="form-label">Foto</label>
							<input type="file" name="foto" class="form-control" id="inputPassword4">
						</div> -->
						<div class="footer">
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
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
