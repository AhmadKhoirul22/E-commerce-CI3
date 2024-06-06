<?php 
class Pelanggan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('id_pelanggan') == NULL){
			redirect('auth');
	}
		$this->load->model('Checkout_model');
	}
	public function detail_user($id_pelanggan){
		$data['title'] = 'Detail User';
		$this->db->from('pelanggan')->where('id_pelanggan',$id_pelanggan);
		$data['pelanggan'] = $this->db->get()->row();

		$this->db->from('profile');
		$data['profile'] = $this->db->get()->row();

		$this->db->from('kategori');
		$data['kategori'] = $this->db->get()->result_array();

		$this->load->view('pembeli/pelanggan',$data);
	}

	public function update(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'alamat' => $this->input->post('alamat'),
			'whatsapp' => $this->input->post('whatsapp'),
		);
		$where = array(
			'id_pelanggan' => $this->input->post('id_pelanggan')
		);
		$this->db->update('pelanggan',$data,$where);
		redirect('pembeli/pelanggan/detail_user/'.$this->input->post('id_pelanggan'));
	}


}


?>
