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
							<th></th>
							<th scope="col">Products</th>
							<th scope="col">Name</th>
							<th scope="col">Price</th>
							<th scope="col">Quantity</th>
							<th scope="col">Size</th>
							<th scope="col">Total</th>
							<th scope="col">Handle</th>
						</tr>
					</thead>
					<tbody>
						<?php $total=0; foreach($keranjang as $row){ ?>
						<tr>
							<form action="<?= base_url('pembeli/keranjang/checkout2')?>" method="post">
								<td>
									<input type="checkbox" id="checkbox" name="selected_items[]"
										class="form-check-input" value="<?= $row['id_keranjang']?>">
								</td>
								<th scope="row">
									<div class="d-flex align-items-center">
										<img src="<?= base_url('assets/upload/produk/'.$row['foto'])?>"
											class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
											alt="">
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
											value="<?= $row['jumlah']?>" readonly >
									</div>
								</td>
								<td>
								<div class="input-group quantity mt-4" style="width: 100px;">
									<input type="text" name="jumlah" id="jumlah" class="form-control form-control-sm text-center border-0"
										value="<?= $row['size']?>" readonly>
								</div>
								</td>
								<td>
									<p class="mb-5 mt-4" id="total">Rp
										<?= number_format($row['harga']*$row['jumlah']) ?> </p>
								</td>
								<td>
									<a onclick="return confirm('apakah yakin untuk menghapus keranjang')"
										class="btn btn-md rounded-circle bg-light border mt-4"
										href="<?= base_url('pembeli/keranjang/hapus_keranjang/'.$row['id_keranjang'])?>">
										<i class="fa fa-times text-danger"></i>
									</a>
									<button type="button" class="btn btn-md rounded-circle bg-light border mt-4"
										data-bs-toggle="modal" data-bs-target="#edit<?= $row['id_keranjang']?>">
										<i class="bi-pencil-square text-center"></i>
									</button>
								</td>
						</tr>
						<?php $total=$total+$row['harga']*$row['jumlah']; } ?>
						<tr>
							<td colspan="5">Total Harga</td>
							<td id="total-harga"><?= number_format($total)  ?></td>
						</tr>
					</tbody>
				</table>
			</div>
							<?php if($keranjang != null){ ?>
								<div class="row g-4 justify-content-end">
				<div class="col-8"></div>
				<div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
					<div class="bg-light rounded">
						<div class="p-4">
							<h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
							<p class="text-center"><?= $nota?></p>

							<div class="d-flex justify-content-between mb-4">
								<h5 class="mb-0 me-4">Nama Barang:</h5>
								<p class="mb-5" id="nama-barang"><?= $row['nama_produk']?></p>
							</div>
							<div class="d-flex justify-content-between">
								<h5 class="mb-0 me-4">Harga</h5>
								<div class="">
									<p class="mb-0" id="jumlah-cart">jumlah: <?= $row['jumlah'] ?></p>
								</div>
							</div>
							<p class="mb-0 text-end" id="harga">Rp <?= number_format($row['harga']) ?></p>

						</div>
						<div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
							<h5 class="mb-0 ps-4 me-4">Total</h5>
							<p class="mb-5 pe-4" id="total-semua">Rp <?= number_format($row['jumlah']*$row['harga'])  ?>
							</p>
						</div>
						<div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
							<h5 class="mb-0 ps-4 me-4">System Pembelian</h5>
							<p class="mb-5 pe-4" id="total-semua">COD (cash on delivery) only</p>
						</div>
						<button
							class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
							type="submit">Proceed Checkout</button>
						<input type="hidden" name="status" value="Pembungkusan">
						</form>
					</div>
				</div>
			</div>
			

			<!-- <div class="mt-5">
				<input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
				<button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply
					Coupon</button>
			</div> -->

		</div>
	</div>
	<!-- modal update -->
	<div class="modal fade" id="edit<?= $row['id_keranjang']?>" tabindex="-1" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update Keranjang</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="row g-3" method="post" action="<?= base_url('pembeli/keranjang/update')?>">
					<input type="hidden" name="id_keranjang" value="<?= $row['id_keranjang']?>" >
						<div class="col-12">
							<label for="inputNanme4" class="form-label">Quantity</label>
							<input type="text" name="jumlah" value="<?= $row['jumlah']?>" class="form-control" id="inputNanme4">
						</div>
						<div class="col-12">
							<label for="inputNanme4" class="form-label">Size</label>
										<select name="size" id="" class="form-control mb-3">
											<option value="S"<?php if($row['size']=='S'){echo "selected";}?> >S</option>
											<option value="M"<?php if($row['size']=='M'){echo "selected";}?> >M</option>
											<option value="L"<?php if($row['size']=='L'){echo "selected";}?> >L</option>
											<option value="XL"<?php if($row['size']=='XL'){echo "selected";}?> >XL</option>
										</select>
						</div>
						<!-- <div class="col-12">
							<label for="inputEmail4" class="form-label">Username</label>
							<input type="text" name="username" class="form-control" id="inputEmail4">
						</div>
						<div class="col-12">
							<label for="inputPassword4" class="form-label">Password</label>
							<input type="password" name="password" class="form-control" id="inputPassword4">
						</div> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- modal update -->
	<?php	} ?>

	<!-- Cart Page End -->
	<?php include('layout/_footer.php') ?>
	<!-- JavaScript Libraries -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<?php include('layout/_js.php') ?>
	<script>
		// total harga 
		document.addEventListener('DOMContentLoaded', function () {
			var checkboxes = document.querySelectorAll('input[type="checkbox"]');
			var totalHargaElement = document.getElementById('total-harga');

			checkboxes.forEach(function (checkbox) {
				checkbox.addEventListener('change', function () {
					var totalHarga = 0;
					checkboxes.forEach(function (cb) {
						if (cb.checked) {
							var row = cb.closest('tr');
							var harga = parseFloat(row.querySelector('#harga').innerText
								.replace('Rp ', '').replace(',', ''));
							var jumlah = parseInt(row.querySelector('#jumlah').value);
							var subTotal = harga * jumlah;
							totalHarga += subTotal;
						}
					});
					totalHargaElement.innerText = 'Rp ' + formatRupiah(totalHarga);
				});
			});


			function formatRupiah(angka) {
				var number_string = angka.toString();
				var split = number_string.split(',');
				var sisa = split[0].length % 3;
				var rupiah = split[0].substr(0, sisa);
				var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

				if (ribuan) {
					var separator = sisa ? '.' : '';
					rupiah += separator + ribuan.join('.');
				}

				rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
				return rupiah;
			}
		});
	</script>
	<script>
		//   total harga pada cart total
		document.addEventListener('DOMContentLoaded', function () {
			var checkboxes = document.querySelectorAll('input[type="checkbox"]');
			var totalHargaElement = document.getElementById('total-semua');

			checkboxes.forEach(function (checkbox) {
				checkbox.addEventListener('change', function () {
					var totalHarga = 0;
					checkboxes.forEach(function (cb) {
						if (cb.checked) {
							var row = cb.closest('tr');
							var harga = parseFloat(row.querySelector('#harga').innerText
								.replace('Rp ', '').replace(',', ''));
							var jumlah = parseInt(row.querySelector('#jumlah').value);
							var subTotal = harga * jumlah;
							totalHarga += subTotal;
						}
					});
					totalHargaElement.innerText = 'Rp ' + formatRupiah(totalHarga);
				});
			});


			function formatRupiah(angka) {
				var number_string = angka.toString();
				var split = number_string.split(',');
				var sisa = split[0].length % 3;
				var rupiah = split[0].substr(0, sisa);
				var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

				if (ribuan) {
					var separator = sisa ? '.' : '';
					rupiah += separator + ribuan.join('.');
				}

				rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
				return rupiah;
			}
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			// Ambil elemen checkbox
			const checkboxes = document.querySelectorAll('input[type="checkbox"]');
			checkboxes.forEach(checkbox => {
				checkbox.addEventListener('change', function () {
					// Cek apakah checkbox tersebut dicek
					if (this.checked) {
						// Ambil nilai dari elemen terkait dengan checkbox yang dicek
						const namaProduk = this.closest('tr').querySelector('.mb-0').textContent;
						const harga = this.closest('tr').querySelector('#harga').textContent;
						const jumlah = this.closest('tr').querySelector('#jumlah').value;

						// Update nilai pada "Cart Total"
						document.getElementById('nama-barang').textContent = namaProduk;
						document.getElementById('harga').textContent = `Harga: ${harga}`;
						document.getElementById('jumlah-cart').textContent = `jumlah: ${jumlah}`;
					} else {
						// Jika checkbox tidak dicek, kembalikan nilai default pada "Cart Total"
						document.getElementById('nama-barang').textContent = '';
						document.getElementById('harga').textContent = 'Harga';
						document.getElementById('jumlah-cart').textContent = 'jumlah: ';
					}
				});
			});
		});
	</script>



</body>

</html>
