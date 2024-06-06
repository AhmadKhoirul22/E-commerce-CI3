<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('layout/_css.php') ?>
	<style>
		.fruite-img {
			position: relative;
			width: 100%;
			height: 0;
			padding-bottom: 75%;
			/* Ubah nilai ini sesuai dengan rasio aspek gambar */
			overflow: hidden;
		}

		.fruite-img img {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			object-fit: cover;
			/* Mengubah gambar agar sesuai dengan kontainer */
		}
	</style>
</head>

<body>
	<?php include('layout/_navbar.php') ?>
	<!-- Fruits Shop Start-->
	<div class="container-fluid fruite py-5">
		<div class="container py-5">
			<h1 class="mb-4"><?= $profile->nama_toko?> <?= $profile->bidang?></h1>
			<div class="row g-4">
				<div class="col-lg-12">
					<div class="row g-4">
						<div class="col-xl-3 mb-3">
							<form action="<?= base_url('pembeli/dashboard/search') ?>" method="get" id="searchForm" class="searchForm">
								<div class="input-group w-100 mx-auto d-flex">
									<input type="search" class="form-control p-3" name="keyword" id="searchInput"
										placeholder="keywords" aria-describedby="search-icon-1">
									
									<button type="submit" class="form-control" id="searchButton" >
									<span id="search-icon-1" class="input-group-text p-3"><i
											class="fa fa-search"></i></span>
									</button>
								</div>
							</form>
							<script>
								document.addEventListener("DOMContentLoaded", function () {
									var searchInput = document.getElementById("searchInput");
									var searchButton = document.getElementById("searchButton");

									searchInput.addEventListener("keyup", function (event) {
										if (event.key === "Enter") {
											// Tombol "Enter" ditekan, kirimkan formulir
											document.getElementById("searchForm").submit();
										}
									});

									searchButton.addEventListener("click", function () {
										// Klik tombol "cari", kirimkan formulir
										document.getElementById("searchForm").submit();
									});
								});
							</script>
						</div>
						<div class="col-6"></div>
						<div class="col-xl-3">
							<!-- <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                    <label for="fruits">Default Sorting:</label>
                                    <select id="fruits" name="kategori" class="border-0 form-select-sm bg-light me-3" form="fruitform">
										<?php foreach($kategori as $row) {?>
                                        <option value="<?= $row['id_kategori']?>"><?= $row['nama_kategori']?></option>
                                        <?php } ?>
                                    </select>
                                </div> -->
						</div>
					</div>
					<div class="row g-4">
						<div class="col-lg-12">
							<div class="row g-4 justify-content-center">
								<?php foreach($produk as $row){ ?>
								<div class="col-md-6 col-lg-6 col-xl-4">
									<div class="rounded position-relative fruite-item">
										<div class="fruite-img">
											<img src="<?= base_url('assets/upload/produk/'.$row['foto'])?>"
												class="img-fluid w-100 rounded-top" alt="">
										</div>
										<!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> -->
										<div class="p-4 border border-secondary border-top-0 rounded-bottom">
											<h4><a
													href="<?= base_url('pembeli/dashboard/detail/'.$row['id_produk'])?>"><?= $row['nama_produk']?></a>
											</h4>
											<p>Stok : <?= $row['stok']?></p>
											<p>Category : <?= $row['nama_kategori']?></p>
											<div class="d-flex justify-content-between flex-lg-wrap">
												<p class="text-dark fs-5 fw-bold mb-0">Rp
													<?= number_format($row['harga'])?></p>
												<a href="<?= base_url('pembeli/dashboard/detail/'.$row['id_produk'])?>"
													class="btn border border-secondary rounded-pill px-3 text-primary"><i
														class="fa fa-shopping-bag me-2 text-primary"></i>Detail</a>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
								<!-- <?php include('layout/_pagination.php') ?> -->
								<div>
									<?= $pagination ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Fruits Shop End-->
	<?php include('layout/_footer.php') ?>
	<!-- JavaScript Libraries -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<?php include('layout/_js.php')?>
</body>

</html>
