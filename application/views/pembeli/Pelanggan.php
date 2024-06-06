<!DOCTYPE html>
<html lang="en">

    <head>
	<?php include('layout/_css.php') ?>
    </head>

    <body>
	<?php include('layout/_navbar.php') ?>
        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            
                            <form action="<?= base_url('pembeli/pelanggan/update')?>" method="post" >
							<input type="hidden" name="id_pelanggan" value="<?= $pelanggan->id_pelanggan ?>" >
                                <h4 class="mb-5 fw-bold">Detail Pelanggan</h4>
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
										<label for="fruits" class="text-center" >Nama</label>
                                            <input type="text" class="form-control border-0 me-4" name="nama" value="<?= $pelanggan->nama ?>" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
										<label for="fruits" class="text-center" >Username</label>
                                            <input type="text"  class="form-control border-0" name="username" readonly value="<?= $pelanggan->username?>" >
                                        </div>
                                    </div>
									<div class="col-lg-6">
                                        <div class="border-bottom rounded">
										<label for="fruits" class="text-center" >Password</label>
                                            <input type="password"  class="form-control border-0" name="password" readonly value="<?= $pelanggan->password?>" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
										<label for="fruits" class="text-center" >Alamat</label>
                                            <input type="text" class="form-control border-0 me-4" name="alamat" value="<?= $pelanggan->alamat ?>" >
                                        </div>
                                    </div>
									<div class="col-lg-6">
                                        <div class="border-bottom rounded">
										<label for="fruits" class="text-center" >Whatsapp</label>
                                            <input type="text" class="form-control border-0 me-4" name="whatsapp" value="<?= $pelanggan->whatsapp ?>" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">
                                            <button type="submit" class="btn border border-secondary text-primary rounded-pill px-4 py-3">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->
    

        <!-- Footer Start -->
		<?php include('layout/_footer.php') ?>
        <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<?php include('layout/_js.php') ?>
    </body>

</html>
