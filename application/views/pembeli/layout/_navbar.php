<?php 
	$id_pelanggan = $this->session->userdata('id_pelanggan');
	$this->db->where('id_pelanggan',$id_pelanggan);
	$jumlah = $this->db->count_all_results('keranjang');


	$this->db->from('detail_pembelian a');
	$this->db->join('pembelian b','b.kode_pembelian=a.kode_pembelian','left');
	$this->db->where('b.id_pelanggan',$this->session->userdata('id_pelanggan'));
	$this->db->join('produk c','c.id_produk=a.id_produk','left');
	$barang = $this->db->get()->result_array();

	// $this->db->from('pembelian');
	$this->db->where('id_pelanggan',$this->session->userdata('id_pelanggan'));
	$jumlah_pesan = $this->db->count_all_results('pembelian')
?>
<!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="<?= base_url('pembeli/dashboard')?>" class="navbar-brand"><h1 class="text-primary display-6"><?= $profile->nama_toko?></h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <!-- <a href="index.html" class="nav-item nav-link">Home</a> -->
                            <a href="<?= base_url('pembeli/dashboard')?>" class="nav-item nav-link active">Shop</a>
                            <!-- <a href="shop-detail.html" class="nav-item nav-link">Shop Detail</a> -->
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kategori</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
									<?php foreach($kategori as $row){?>
                                    <a href="<?= base_url('pembeli/dashboard/kategori/'.$row['id_kategori'])?>" class="dropdown-item"><?= $row['nama_kategori']?></a>
									<?php } ?>
                                </div>
                            </div>
                            <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                        </div>
                        <div class="d-flex m-3 me-0">
						<a class="position-relative me-4 my-auto" href="<?= base_url('pembeli/dashboard/pesan/'.$this->session->userdata('id_pelanggan')) ?>">
            					<i class="bi bi-chat-left-text"></i>
            					<span class="badge bg-success badge-number"><?= $jumlah_pesan ?></span>
          					</a>
                            <!-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button> -->
                            <a href="<?= base_url('pembeli/keranjang/dasar/'.$this->session->userdata('id_pelanggan'))?>" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?= $jumlah?></span>
                            </a>
                            <a href="<?= base_url('pembeli/pelanggan/detail_user/'.$this->session->userdata('id_pelanggan')) ?>" class="my-auto me-4">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
							<a href="<?= base_url('auth/logout')?>" class="btn btn-danger my-auto" onclick="return confirm('apakah yakin untuk logout')" >logout</a>
							<a href="<?= base_url('pembeli/dashboard/audio') ?>" class="btn btn-success me-4 m-3 my-auto" >Audio</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <!-- <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <!-- <div class="container py-5">
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div> -->
        <!-- Single Page Header End -->
