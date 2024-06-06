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
			<div class="table-responsive">
			<div id="autohide">
					<?= $this->session->flashdata('notifikasi') ?>
					</div>
				<table class="table">
					<thead>
						<tr>
							
							<th scope="col">Products</th>
							<th scope="col">Name</th>
							<th scope="col">Price</th>
							<th scope="col">Quantity</th>
							<th scope="col">Size</th>
							<th scope="col">Total</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
							<?php $total=0; foreach($pembelian as $row){ ?>
							<tr>
								<th scope="row">
									<div class="d-flex align-items-center">
										<img src="<?= base_url('assets/upload/produk/'.$row['foto'])?>"
											class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
									</div>
								</th>
								<td>
									<p class="mb-0 mt-4"><?= $row['nama_produk']?></p>
								</td>
								<td>
									<p class="mb-5 mt-4" id="harga">Rp <?= number_format($row['harga'])?></p>
								</td>
								<td>
									<div class="input-group quantity mt-4" style="width: 100px;">
										
										<input type="text" name="jumlah" id="jumlah"
											class="form-control form-control-sm text-center border-0"
											value="<?= $row['jumlah']?>">
									</div>
								</td>
								<td><p class="mb-5 mt-4"><?= $row['size'] ?></p></td>
								<td>
									<p class="mb-5 mt-4" id="total">Rp <?= number_format($row['harga']*$row['jumlah']) ?> </p>
								</td>
								<td>
									<p class="mb-5 mt-4"><?= $row['tanggal']?></p>
								</td>
								<td>
									<p class="mb-5 mt-4"><?=  $row['status'] ?></p>
								</td>
							</tr>
							<?php $total=$total+$row['harga']*$row['jumlah']; } ?>
							<tr>
								<td colspan="6" >Total Harga</td>
								<td id="total-harga" >Rp <?= number_format($total)  ?></td>
							</tr>	
					</tbody>
				</table>
			</div>
			
			<!-- <div class="row g-4 justify-content-end">
				<div class="col-8"></div>
				<div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
					<div class="bg-light rounded">
						<div class="p-4">
							<h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
							<p class="text-center" ><?= $nota?></p>
							
							<div class="d-flex justify-content-between mb-4">
								<h5 class="mb-0 me-4">Nama Barang:</h5>
								<p class="mb-5" id="nama-barang" ><?= $row['nama_produk']?></p>
							</div>
							<div class="d-flex justify-content-between">
								<h5 class="mb-0 me-4" >Harga</h5>
								<div class="">
									<p class="mb-0" id="jumlah-cart" >jumlah: <?= $row['jumlah'] ?></p>
								</div>
							</div>
							<p class="mb-0 text-end" id="harga" >Rp <?= number_format($row['harga']) ?></p>
							
						</div>
						<div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
							<h5 class="mb-0 ps-4 me-4">Total</h5>
							<p class="mb-5 pe-4" id="total-semua" >Rp <?= number_format($row['jumlah']*$row['harga'])  ?></p>
						</div>
						<div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
							<h5 class="mb-0 ps-4 me-4">System Pembelian</h5>
							<p class="mb-5 pe-4" id="total-semua" >COD (cash on delivery) only</p>
						</div>
						<button
							class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
							type="submit">Proceed Checkout</button>
							
							</form>
					</div>
				</div>
			</div>

			<div class="mt-5">
				<input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
				<button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply
					Coupon</button>
			</div> -->

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
