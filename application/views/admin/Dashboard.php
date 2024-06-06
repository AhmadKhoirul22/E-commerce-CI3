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
		</div>
			<section class="section dashboard">
			<div class="row">
			<h1 class="header-body" ><?= $title?></h1>	
						<div class="col-lg-12">
							<div class="row">
								<div id="autohide">
									<?= $this->session->flashdata('notifikasi') ?>
								</div>
								<!-- checkout Today -->
								<div class="col-xxl-4 col-md-6">
									<div class="card info-card sales-card">

										<div class="card-body">
											<h5 class="card-title">Checkout <span>| Today</span></h5>

											<div class="d-flex align-items-center">
												<div
													class="card-icon rounded-circle d-flex align-items-center justify-content-center">
													<i class="bi bi-cart"></i>
												</div>
												<div class="ps-3">
													<h6>Rp <?= number_format($this->Checkout_model->checkout_today()) ?>
													</h6>
													<!-- <span class="text-success small pt-1 fw-bold">12%</span> <span
														class="text-muted small pt-2 ps-1">increase</span> -->

												</div>
											</div>
										</div>

									</div>
								</div>
								<!-- checkout Month -->
								<div class="col-xxl-4 col-md-6">
									<div class="card info-card sales-card">

										<div class="card-body">
											<h5 class="card-title">Checkout <span>| This Month</span></h5>

											<div class="d-flex align-items-center">
												<div
													class="card-icon rounded-circle d-flex align-items-center justify-content-center">
													<i class="bi bi-currency-dollar"></i>
												</div>
												<div class="ps-3">
													<h6>Rp <?= number_format($this->Checkout_model->checkout_month()) ?>
													</h6>
													<!-- <span class="text-success small pt-1 fw-bold">12%</span> <span
														class="text-muted small pt-2 ps-1">increase</span> -->

												</div>
											</div>
										</div>

									</div>
								</div>
								<!-- top selling -->
								<div class="col-12">
									<div class="card top-selling overflow-auto">
										<div class="card-body pb-0">
											<h5 class="card-title">Top Selling <span>| All time</span></h5>

											<table class="table table-borderless">
												<thead>
													<tr>
														<th scope="col">Preview</th>
														<th scope="col">Product</th>
														<th scope="col">Price</th>
														<th scope="col">Sold</th>
														<th scope="col">Revenue</th>
													</tr>
												</thead>
												<tbody>
													<?php  foreach($pembelian as $top){ ?>
													<tr>
														<td><img src="<?= base_url('assets/upload/produk/'.$top['foto']) ?>"
																alt="" class="img-rounded" width="100px"></td>
														<td><a href="#"
																class="text-primary fw-bold"><?= $top['nama_produk'] ?></a>
														</td>
														<td>Rp <?= number_format($top['harga'])  ?></td>
														<td class="fw-bold"><?= $top['total_pembelian'] ?></td>
														<td>Rp
															<?= number_format($top['harga']*$top['total_pembelian']) ?>
														</td>
													</tr>
													<?php } ?>
												</tbody>
											</table>

										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
						
						</div>
				
			</div>
			</section>
	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<?php require_once('layout/_footer.php') ?>
	<!-- End Footer -->
	<!-- Vendor JS Files -->
	<?php require_once('layout/_js.php') ?>

</body>

</html>
