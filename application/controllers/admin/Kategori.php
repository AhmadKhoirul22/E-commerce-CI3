<?php 
class Kategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('admin/auth');
	}
	$this->load->model('Checkout_model');

}
	public function index(){
		$data["title"] = 'Kategori';
		$this->db->from('profile');
		$data['profile']= $this->db->get()->row();
		$this->db->from('kategori');
		$data['kategori'] = $this->db->get()->result_array();
		$this->load->view('admin/kategori',$data);
	}

	public function tambah(){
		$this->db->from('kategori')->where('nama_kategori',$this->input->post('nama_kategori'));
		$cek = $this->db->get()->result_array();

		if($cek<> null){
		$this->session->set_flashdata('notifikasi','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Nama Kategori Sudah di pakai
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      	</div>');
		redirect('admin/kategori');
		}

		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
		$this->db->insert('kategori',$data);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Menambahkan Kategori
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      	</div>');
		redirect('admin/kategori');
	}
	
	public function delete($id){
		$data = array(
			'id_kategori' => $id,
		);
		$this->db->delete('kategori',$data);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Menghapus Kategori
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      	</div>');
		redirect('admin/kategori');
	}
	public function update(){
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
		$where = array(
			'id_kategori'=> $this->input->post('id_kategori'),
		);
		$this->db->update('kategori',$data,$where);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Update Kategori
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      	</div>');
		redirect('admin/kategori');
	}
}
?>
