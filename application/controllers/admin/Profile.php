<?php 
class Profile extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('admin/auth');
	}
	$this->load->model('Checkout_model');

}
	public function index(){
		$data['title'] = 'Profile';
		$this->db->from('profile');
		$data['profile'] = $this->db->get()->row();
		$this->load->view("admin/profile", $data);
	}

	public function update(){
		$data = array(
			'nama_toko' => $this->input->post('nama_toko'),
			'alamat' => $this->input->post('alamat'),
			'instagram' => $this->input->post('instagram'),
			'email' => $this->input->post('email'),
			'wa' => $this->input->post('wa'),
			'bidang' => $this->input->post('bidang'),
			'detail_toko' => $this->input->post('detail_toko'),
		);
		$where = array(
			'id_profile' => '1',
		);
		$this->db->update('profile', $data, $where);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="bi bi-check-circle me-1"></i>
				Berhasil Mengupdate Profile
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>');
				redirect('admin/profile');	
	}
}

?>
