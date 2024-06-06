<?php
class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('admin/auth');
	}
	$this->load->model('Checkout_model');

}
	public function index(){
		$data['title'] =  'Dashboard-Admin';
		$this->db->from('profile');
		$data['profile']= $this->db->get()->row();
		
		$this->db->from('produk a');
		$this->db->join('detail_pembelian b','b.id_produk = a.id_produk','left');
		// $this->db->select('a.kode_produk, a.nama_produk, SUM(b.jumlah) as total_pembelian');
		// $this->db->order_by('total_pembelian','DESC');
		// $this->db->group_by('b.id_produk');
		$this->db->select('a.*,SUM(b.jumlah) as total_pembelian');
		$this->db->group_by('a.id_produk');
		$this->db->order_by('total_pembelian','DESC');
		$data['pembelian'] = $this->db->get()->result_array();

		$this->load->view("admin/Dashboard", $data);
	}
	}
?>
