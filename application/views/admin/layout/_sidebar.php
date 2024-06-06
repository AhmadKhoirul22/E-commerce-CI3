<?php $menu = $this->uri->segment(2); ?>
<aside id="sidebar" class="sidebar">



    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item<?php if($menu=='dashboard'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/dashboard')?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
			<li class="nav-item<?php if($menu=='pelanggan'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/pelanggan')?>">
          <i class="ri-map-pin-user-line"></i>
          <span>Pelanggan</span>
        </a>
      </li>
			<li class="nav-item<?php if($menu=='pembelian'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/pembelian')?>">
          <i class="ri-map-pin-user-line"></i>
          <span>Pembelian</span>
        </a>
      </li>
      <li class="nav-item<?php if($menu=='produk'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/produk')?>">
          <i class="bi bi-menu-button-wide"></i><span>Produk</span>
        </a>
			</li>
			<li class="nav-item<?php if($menu=='kategori'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/kategori')?>">
          <i class="bi bi-menu-button-wide"></i><span>Kategori</span>
        </a>
      </li>
      <li class="nav-item<?php if($menu=='profile'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/profile')?>">
          <i class="bi bi-journal-text"></i><span>Profile</span>
        </a>
      </li><!-- End Forms Nav -->
      <li class="nav-item<?php if($menu=='user'){ echo 'active'; }?>">
        <a class="nav-link collapsed" href="<?= base_url('admin/user') ?>">
          <i class="ri-map-pin-user-line"></i><span>Admin</span>
        </a>
      </li><!-- End Charts Nav -->
      
    </ul>
	
  </aside>
