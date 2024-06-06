<?php
class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('admin/auth');
	}
	$this->load->model('Checkout_model');

}
	public function index(){
		$this->db->from('profile');
		$data['profile']= $this->db->get()->row();
		$this->db->from("user");
		$data['user'] = $this->db->get()->result_array();
		$data['title'] = 'Admin';
		$this->load->view("admin/user", $data);
	}

	public function tambah(){
		$this->db->from('user');
        $this->db->where('username',$this->input->post('username'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('notifikasi','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            Username Sudah Digunakan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
      	redirect('admin/user');
        }

		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('username')),
		); 
		$this->db->insert('user',$data);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Berhasil Menambahkan Data User
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
		redirect('admin/user');
	}

	public function delete($id){
		$data = array(
			'id_user' => $id
		);
		$this->db->delete('user',$data);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Berhasil Menghapus Data user
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      	</div>');
		redirect('admin/user');
	}
	
	public function update(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);
		$where = array(
			'id_user' => $this->input->post('id_user')
		);
		$this->db->update('user',$data,$where);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Berhasil Mengupdate Data User
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
		redirect('admin/user');
	}
}
?>
