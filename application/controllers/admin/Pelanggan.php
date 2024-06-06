<?php 
class Pelanggan extends CI_Controller {
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
		$data['title'] = 'Pelanggan';
		$this->db->from('pelanggan');
		
		$data['pelanggan'] = $this->db->get()->result_array();
		$this->load->view("admin/pelanggan", $data);
	}

	public function tambah(){
		$this->db->from('pelanggan');
        $this->db->where('username',$this->input->post('username'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('notifikasi','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            Username Sudah Digunakan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
      	redirect('admin/pelanggan');
        }

		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('username')),
		); 
		$this->db->insert('pelanggan',$data);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Berhasil Menambahkan Data User
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
		redirect('admin/pelanggan');
	}

	public function delete($id){
		$data = array(
			'id_pelanggan' => $id
		);
		$this->db->delete('pelanggan',$data);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Berhasil Menghapus Data user
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      	</div>');
		redirect('admin/pelanggan');
	}
	
	public function update(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);
		$where = array(
			'id_pelanggan' => $this->input->post('id_pelanggan')
		);
		$this->db->update('pelanggan',$data,$where);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        Berhasil Mengupdate Data User
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
		redirect('admin/pelanggan');
	}
}

?>
