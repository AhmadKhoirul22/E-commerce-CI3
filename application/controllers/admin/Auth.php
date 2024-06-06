<?php 
class Auth extends CI_Controller{
	public function index(){
		$this->load->view("admin/auth");
	}

	public function login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$this->db->from('user')->where('username',$username);
		$cek = $this->db->get()->row();
		// var_dump($cek);
		// die();
		if($cek==NULL){
			$this->session->set_flashdata('notifikasi','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            username tidak terdaftar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
			redirect('admin/auth');
		} else if($cek->password == $password){
			$data = array(
				'username'=> $cek->username,
				'password'=> $cek->password,
				'nama' => $cek->nama,
				'id_user'=> $cek->id_user,
			);
			$this->session->set_userdata($data);
			$this->session->set_userdata('logged_in', true);
			$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="bi bi-check-circle me-1"></i>
			Berhasil Login
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
			redirect('admin/dashboard');
	} else{
		$this->session->set_flashdata('notifikasi','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            password salah
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
			redirect('admin/auth');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}
}
?>
