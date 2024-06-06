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
					<button type="button" class="btn btn-warning mb-4" data-bs-toggle="modal"
						data-bs-target="#verticalycentered">
						Tambah Produk
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
									<h5 class="modal-title">Tambah Produk</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="row g-3" method="post"
										action="<?= base_url('admin/produk/add_produk')?>"
										enctype="multipart/form-data">
										<div class="col-12">
											<label for="inputNanme4" class="form-label">Nama Produk</label>
											<input type="text" name="nama_produk" class="form-control" id="inputNanme4">
										</div>
										<div class="col-12">
											<label for="inputNanme4" class="form-label">Nama Kategori</label>
											<select name="id_kategori" class="form-control">
												<?php foreach($kategori as $aa){ ?>
												<option value="<?= $aa['id_kategori']?>"><?= $aa['nama_kategori']?>
												</option>
												<?php } ?>
											</select>
										</div>
										<div class="col-12">
											<label for="inputPassword4" class="form-label">Harga</label>
											<input type="text" name="harga" class="form-control" id="inputPassword4">
										</div>
										<div class="col-12">
											<label for="inputPassword4" class="form-label">Stok</label>
											<input type="text" name="stok" class="form-control" id="inputPassword4">
										</div>
										<div class="col-12">
											<label for="inputPassword4" class="form-label">Deskripsi</label>
											<textarea name="deskripsi" id="" class="tinymce form-control"></textarea>
										</div>
										<div class="col-12">
											<label for="inputPassword4" class="form-label">Foto</label>
											<input type="file" name="foto" class="form-control" id="inputPassword4">
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
					<table class="table datatable">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Produk</th>
								<th>Nama Kategori</th>
								<th>Kode Produk</th>
								<th>Stok</th>
								<th>Harga</th>
								<th>Gambar</th>
								<th>Deskripsi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach($produk as $row){ ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $row['nama_produk']?></td>
								<td><?= $row['nama_kategori']?></td>
								<td><?= $row['kode_produk']?></td>
								<td><?= $row['stok']?></td>
								<td>Rp <?= number_format($row['harga'])?></td>
								<td> <img src="<?= base_url('assets/upload/produk/'.$row['foto'])?>" width="50px"></td>
								<td>
									<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
										data-bs-target="#deskripsi<?= $row['id_produk'] ?>">
										Deskripsi
									</button>
									<!-- modal deskripsi -->
									<div class="modal fade" id="deskripsi<?= $row['id_produk'] ?>" tabindex="-1"
										aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Deskripsi Produk</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
														aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<div class="col-12">
														<label for="inputNanme4" class="form-label">Deskripsi
														</label>
														<textarea name="deskripsi" id="" class="tinymce form-control"
															readonly><?= $row['deskripsi'] ?></textarea>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!-- modal deskripsi -->
								</td>
								<td>
									<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
										data-bs-target="#edit<?= $row['id_produk']?>">
										<i class="bi-pencil-square"></i>
									</button>
									<a onClick="return confirm('apakah yakin untuk hapus data produk?')"
										class="btn btn-danger mb-2"
										href="<?= base_url('admin/produk/delete_foto/'.$row['foto']) ?>"><i
											class="ri-delete-bin-6-fill"></i>
									</a>
									<button type="button" class="btn btn-dark" data-bs-toggle="modal"
										data-bs-target="#tambah<?= $row['id_produk']?>">
										<i class="bx bxs-cog"></i>
									</button>
								</td>
								<!-- modal edit -->
								<div class="modal fade" id="edit<?= $row['id_produk']?>" tabindex="-1"
									aria-hidden="true" style="display: none;">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Update Produk</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<form class="row g-3" method="post"
													action="<?= base_url('admin/produk/update')?>"
													enctype="multipart/form-data">
													<input type="hidden" name="id_produk"
														value="<?= $row['id_produk']?>">
													<input type="hidden" name="kode_produk"
														value="<?= $row['kode_produk']?>">
													<input type="hidden" name="nama_foto" value="<?= $row['foto']?>">
													<div class="col-12">
														<label for="inputNanme4" class="form-label">Nama Produk</label>
														<input type="text" name="nama_produk"
															value="<?= $row['nama_produk']?>" class="form-control"
															id="inputNanme4">
													</div>
													<div class="col-12">
														<label for="inputNanme4" class="form-label">Nama
															Kategori</label>
														<select name="id_kategori" class="form-control">
															<?php foreach($kategori as $aa){ ?>
															<option
																<?php if($aa['id_kategori'] == $row['id_kategori']){echo "selected";}?>
																value="<?= $aa['id_kategori']?>">
																<?= $aa['nama_kategori']?></option>
															<?php } ?>
														</select>
													</div>
													<div class="col-12">
														<label for="inputPassword4" class="form-label">Harga</label>
														<input type="text" name="harga" value="<?= $row['harga']?>"
															class="form-control" id="inputPassword4">
													</div>
													<div class="col-12">
														<label for="inputPassword4" class="form-label">Stok</label>
														<input type="text" name="stok" value="<?= $row['stok']?>"
															class="form-control" id="inputPassword4">
													</div>
													<div class="col-12">
														<label for="inputPassword4" class="form-label">Deskripsi</label>
														<textarea name="deskripsi" id=""
															class="tinymce form-control"><?= $row['deskripsi'] ?></textarea>
													</div>
													<div class="col-12">
														<label for="inputPassword4" class="form-label">Foto
															Produk</label> <br>
														<!-- <img src="<?= base_url('assets/upload/produk/'.$row['foto'])?>"
															class="rounded-circle" width="50px"> -->
														<input type="file" name="foto" class="form-control"
															id="inputPassword4">
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
								<!-- modal edit -->
								<!-- modal tambah foto -->
								<div class="modal fade" id="tambah<?= $row['id_produk']?>" tabindex="-1"
									aria-hidden="true" style="display: none;">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Tambah Foto Produk</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<form class="row g-3" method="post"
													action="<?= base_url('admin/produk/carousel')?>"
													enctype="multipart/form-data">
													<input type="hidden" name="id_produk"
														value="<?= $row['id_produk']?>">
													<div class="col-12">
														<label for="inputNanme4" class="form-label">Foto
															Tambahan</label>
														<input type="file" name="foto" class="form-control" id="">
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
								<!-- modal tambah foto -->
							</tr>
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
