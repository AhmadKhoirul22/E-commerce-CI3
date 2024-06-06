<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('layout/_css.php') ?>
	<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include('layout/_navbar.php') ?>
	<!-- Cart Page Start -->
	<div class="container-fluid py-5">
		<div class="container py-5">
			<div id="autohide">
				<?= $this->session->flashdata('notifikasi') ?>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="card-body">
					</div>
					<ul>
						<li>
							<img src="<?= base_url('assets/netbeans/tampilan.png')?>" class="">
						</li>
						<li class="nav-item">
							<p>Gambar diatas adalah tampilan/design dari Audio di JavaNetbeans</p>
						</li>
						<img src="<?= base_url('assets/netbeans/fungsii play.png')?>" class="">
						<li>
							<p>Selanjutnya adalah fungsi dari button play</p>
						</li>
						<img src="<?= base_url('assets/netbeans/fungsi stop.png')?>" class="">
						<li>
							<p>dan yang terakhir ini adalah fungsi dari button stop</p>
						</li>
					</ul>
					<a href="https://github.com/AhmadKhoirul22/Audio-JavaNetbeans" >
						<h4>Link Download Project</h4>
					</a>
				</div>
			</div>

		</div>
	</div>
	<!-- Cart Page End -->
	<?php include('layout/_footer.php') ?>
	<!-- JavaScript Libraries -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<?php include('layout/_js.php') ?>
</body>

</html>
