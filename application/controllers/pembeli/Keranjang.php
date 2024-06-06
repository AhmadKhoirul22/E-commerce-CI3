<?php 
class Keranjang extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('id_pelanggan') == NULL){
			redirect('auth');
	}
		$this->load->model('Checkout_model');
	}
	public function dasar($id_pelanggan){
		date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m');

        $this->db->from('pembelian')->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
        $jumlah = $this->db->count_all_results();
        
        $nota  = date('ymd').$jumlah+1;
        $data['nota'] = $nota;

		$this->db->from('profile');
		$data['profile'] = $this->db->get()->row();

		$this->db->from('kategori');
		$data['kategori'] = $this->db->get()->result_array();

		$this->db->from('keranjang a');
		$this->db->join('produk b','b.id_produk=a.id_produk','left');
		$this->db->where('a.id_pelanggan',$id_pelanggan);
		$data['keranjang'] = $this->db->get()->result_array();

		$this->db->from('keranjang');
		$this->db->get()->result_array();

		$data['title'] = 'Keranjang';
		$this->load->view('pembeli/keranjang',$data);
	}

	public function tambah_keranjang(){
		$this->db->from('produk');
		$stok = $this->db->get()->row()->stok;

		if($this->input->post('jumlah') == NULL){
			$this->session->set_flashdata('notifikasi','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<i class="bi bi-exclamation-octagon me-1"></i>
			Jumlah minimal 1
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			// $this->session->set_flashdata('notifikasi','Jumlah Melebihi Stok');
			redirect('pembeli/dashboard/detail/'.$this->input->post('id_produk'));
		} else if($stok < $this->input->post('jumlah')){
			$this->session->set_flashdata('notifikasi','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<i class="bi bi-exclamation-octagon me-1"></i>
		Jumlah melebihi stok
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
		// $this->session->set_flashdata('notifikasi','Jumlah Melebihi Stok');
		redirect('pembeli/dashboard/detail/'.$this->input->post('id_produk'));
		}
		
		$data = array(
			'id_produk' => $this->input->post('id_produk'),
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'jumlah' => $this->input->post('jumlah'),
			'size' => $this->input->post('size'),
			
		);
		$this->db->insert('keranjang',$data);
		redirect('pembeli/dashboard/detail/'.$this->input->post('id_produk'));
	}

	public function hapus_keranjang($id_keranjang){
		$data = array(
			'id_keranjang' => $id_keranjang
		);
		$this->db->delete('keranjang',$data);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function checkout(){
		// checkbox inputan
		$selected_items = $this->input->post('selected_items');
		if(empty($selected_items)) {
			$this->session->set_flashdata('notifikasi','tidak ada barang yang dipilih');
			redirect($_SERVER['HTTP_REFERER']);
		}
		foreach($selected_items as $detail){
			$detail = $this->db->get_where('keranjang',['id_keranjang' => $detail ])->row_array();
		}
		// 
		$this->db->from('keranjang a');
		$this->db->join('produk b','b.id_produk=a.id_produk');
		$this->db->where('a.id_pelanggan',$this->session->userdata('id_pelanggan'));
		$keranjang = $this->db->get()->result_array();
		$total = 0;
		foreach($keranjang as $ker){
		if($ker['stok'] < $ker['jumlah'] ){
			$this->session->set_flashdata('notifikasi','stok tidak mencukupi');
			redirect($_SERVER['HTTP_REFERER']);
		}	
		$total=$total+$ker['harga']*$ker['jumlah'];
		$data  = array(
			'kode_pembelian' => $this->input->post('kode_pembelian'),
			'sub_total' => $ker['jumlah']*$ker['harga'],
			'jumlah' => $ker['jumlah'],
			'id_produk' => $ker['id_produk']
		);
			$this->db->insert('detail_pembelian',$data);

			// update produk
			$data2 = array('stok' => $ker['stok']-$ker['jumlah'] );
			$where = array('id_produk' => $ker['id_produk']);
			$this->db->update('produk',$data2,$where);

			// deleted table keranjang
			$pp = array(
				'id_keranjang' => $ker['id_keranjang']
			);
			$this->db->delete('keranjang',$pp);

		} //end foreach
		// tambah pembelian
		$data4 = array(
			'kode_pembelian' => $this->input->post('kode_pembelian'),
			'total_harga' => $total,
			'tanggal' => date('Y-m-d') ,
			'id_pelanggan' => $ker['id_pelanggan'],
			'status' => $this->input->post('status'),
		);
		$this->db->insert('pembelian',$data4);
		$this->session->set_flashdata('notifikasi','barang sedang dalam pengiriman');
		redirect('pembeli/dashboard');
	}

	public function checkout2(){
		date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m');

        $this->db->from('pembelian')->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
        $jumlah = $this->db->count_all_results();
        
        $nota  = date('ymd').$jumlah+1;
        $data['nota'] = $nota;

		$selectedItems = $this->input->post('selected_items');
		if (empty($selectedItems)) {
			$this->session->set_flashdata('notifikasi', 'Tidak ada barang yang dipilih.');
			redirect($_SERVER['HTTP_REFERER']);
		}
	
		$total = 0;
		foreach($selectedItems as $itemId){
			// Retrieve the item details from the database based on $itemId
			$this->db->from('keranjang a');
			$this->db->join('produk b','b.id_produk=a.id_produk','left');
			$this->db->where('a.id_keranjang',$itemId);
			$itemDetails = $this->db->get()->row_array();
			// row_array = digunakan untuk mengambil baris pertama dari hasil kueri
			// $itemDetails = $this->db->get_where('keranjang', ['id_keranjang' => $itemId])->row_array();
			
			if($itemDetails['stok'] < $itemDetails['jumlah'] ){
				$this->session->set_flashdata('notifikasi','Stok tidak mencukupi untuk barang dengan ID '.$itemId);
			redirect($_SERVER['HTTP_REFERER']);
			}
	
			$total += $itemDetails['harga'] * $itemDetails['jumlah'];
			
			// Insert into detail_pembelian table
			$data  = array(
				'kode_pembelian' => $nota,
				'sub_total' => $itemDetails['jumlah'] * $itemDetails['harga'],
				'jumlah' => $itemDetails['jumlah'],
				'id_produk' => $itemDetails['id_produk'],
				'size' => $itemDetails['size']
			);
			$this->db->insert('detail_pembelian', $data);
	
			// Update product stock
			$updatedStock = $itemDetails['stok'] - $itemDetails['jumlah'];
			$this->db->where('id_produk', $itemDetails['id_produk']);
			$this->db->update('produk', ['stok' => $updatedStock]);
	
			// Delete from keranjang table
			$this->db->delete('keranjang', ['id_keranjang' => $itemId]);
		}
	
		// Insert into pembelian table
		$data4 = array(
			'kode_pembelian' => $nota,
			'total_harga' => $total,
			'tanggal' => date('Y-m-d'),
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
		);
		$this->db->insert('pembelian', $data4);
	
		$this->session->set_flashdata('notifikasi','Barang sedang dalam pengiriman');
		redirect('pembeli/dashboard');
	}

	public function update(){
		$data = array(
			'jumlah' => $this->input->post('jumlah'),
			'size' => $this->input->post('size')
		);
		$where = array(
			'id_keranjang' => $this->input->post('id_keranjang')
		);
		// var_dump($data,$where);
		// die();
		$this->db->update('keranjang',$data,$where);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Berhasil Mengupdate Keranjang
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      	</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}
}

?>
