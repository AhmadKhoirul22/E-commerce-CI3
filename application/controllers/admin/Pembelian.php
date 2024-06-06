<?php
class Pembelian extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('admin/auth');
	}
	$this->load->model('Checkout_model');

}
	public function index(){
		$data['title'] = 'Pembelian';
		$this->db->from('profile');
		$data['profile']= $this->db->get()->row();
		$this->db->from('detail_pembelian a');
		$this->db->join('pembelian b','b.kode_pembelian=a.kode_pembelian','left');
		$this->db->join('produk c','c.id_produk=a.id_produk','left');
		$this->db->join('pelanggan d','d.id_pelanggan=b.id_pelanggan','left');
		$this->db->order_by('tanggal','DESC');
		$data['pembelian'] = $this->db->get()->result_array();

		$this->db->from('produk');
		$data['produk'] = $this->db->get()->result_array();
		$this->load->view('admin/pembelian',$data);
	}

	public function update(){
		$data = array(
			'status' => $this->input->post('status'),
		);
		$where = array(
			'id_pembelian' => $this->input->post('id_pembelian')
		);
		$this->db->update('pembelian',$data,$where);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Berhasil Mengupdate
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
		redirect('admin/pembelian');
	}

	public function delete($kode_pembelian){
		$this->db->where('kode_pembelian',$kode_pembelian);
		$this->db->delete('pembelian');

		$this->db->where('kode_pembelian',$kode_pembelian);
		$this->db->delete('detail_pembelian');

		$this->session->set_flashdata('notifikasi','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Berhasil Menghapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
		redirect('admin/pembelian');
	}
}

?>
