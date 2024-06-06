<?php 
class Auth extends CI_Controller{
	public function index(){
		$this->load->view("login");
	}

	public function login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$this->db->from('pelanggan')->where('username',$username);
		$cek = $this->db->get()->row();
		// var_dump($cek);
		// die();
		if($cek==NULL){
			$this->session->set_flashdata('notifikasi','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            username tidak terdaftar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
			redirect('auth');
		} else if($cek->password == $password){
			$data = array(
				'username'=> $cek->username,
				'password'=> $cek->password,
				'nama' => $cek->nama,
				'id_pelanggan'=> $cek->id_pelanggan,
			);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="bi bi-check-circle me-1"></i>
			Berhasil Login
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
			redirect('pembeli/dashboard');
	} else{
		$this->session->set_flashdata('notifikasi','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            Password Salah
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
			redirect('auth');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function registrasi(){
		$this->load->view('register');
	}

	public function tambah_pelanggan(){
		$this->db->from('pelanggan')->where('username',$this->input->post('username'));
		$cek = $this->db->get()->row();
		if($cek != null){
			$this->session->set_flashdata('notifikasi','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            username sudah terdaftar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
			redirect('auth/registrasi');
		}
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'alamat' => 'default',
			'whatsapp' => 'default',
		);
		$this->db->insert('pelanggan',$data);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            Selamat Akun anda sudah terdaftar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
			redirect('auth');
	}

	
}
?>
