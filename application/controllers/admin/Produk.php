<?php 
class Produk extends CI_Controller {
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
		$this->db->from('produk a');
		$this->db->join('kategori b','b.id_kategori = a.id_kategori','left');
		$data['produk'] = $this->db->get()->result_array();
		$data['title'] = 'Produk';

		$this->db->from('kategori');
		$data['kategori'] = $this->db->get()->result_array();

		$this->load->view("admin/Produk", $data);
	}

	public function add_produk(){
		        // foto
				$namafoto = date('YmdHis').'.jpg';
				$config['upload_path']          = 'assets/upload/produk/';
				$config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
				$config['allowed_types']        = '*';
				$config['file_name']            = $namafoto;
				$this->load->library('upload', $config);
				if($_FILES['foto']['size'] >= 500 * 1024){
					$this->session->set_flashdata('notifikasi', '
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<i class="bi bi-exclamation-triangle me-1"></i>
					ukuran file lebih dari 500kb ulangi upload dengan ukuran foto kurang dari 500kb
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>
							');
					redirect('admin/produk');  
				}  elseif( ! $this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
				}else{
					$data = array('upload_data' => $this->upload->data());
				} 
				// foto
				$this->db->from('produk')->where('nama_produk',$this->input->post('nama_produk'));
				$cek = $this->db->get()->row();
				if($cek !== null){
					$this->session->set_flashdata('notifikasi','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<i class="bi bi-check-circle me-1"></i>
					Nama Produk Sudah di gunakan
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					  </div>');
					redirect('admin/produk');
				}
				// var_dump($namafoto);
				// die;
				$data = array(
					'nama_produk' => $this->input->post('nama_produk'),
					'kode_produk'=> date('YmdHis'),
					'harga'=> $this->input->post('harga'),
					'stok'=> $this->input->post('stok'),
					'id_kategori'=> $this->input->post('id_kategori'),
					'deskripsi'=> $this->input->post('deskripsi'),
					'foto'=> $namafoto,
				);
				$this->db->insert('produk',$data);
				$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<i class="bi bi-check-circle me-1"></i>
				Berhasil Menambahkan Produk
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>');
				redirect('admin/produk');	
	}

	public function update(){
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path']          = 'assets/upload/produk/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']            = $namafoto;
        $config['overwrite']            = true;
        $config['allowed_types']        = '*';  
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            ukuran file lebih dari 500kb ulangi upload dengan ukuran foto kurang dari 500kb
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                    ');
        } elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        } 
        $data = array(
            'nama_produk' => $this->input->post('nama_produk'),
            'id_produk' => $this->input->post('id_produk'),
            'harga' => $this->input->post('harga'),
			'stok'=> $this->input->post('stok'),
			'id_kategori'=> $this->input->post('id_kategori'),
			'deskripsi'=> $this->input->post('deskripsi'),
			'kode_produk'=> $this->input->post('kode_produk'),
        );
        $where = array(
            'foto' => $this->input->post('nama_foto')
        );
        $this->db->update('produk',$data, $where);
		$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="bi bi-check-circle me-1"></i>
		Berhasil mengupdate Produk
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
		redirect('admin/produk');	
    }

	public function delete_foto($id){
		$filename=FCPATH.'/assets/upload/produk/'.$id;
        if(file_exists($filename)){
            unlink("./assets/upload/produk/".$id);
        }
        $where = array(
                'foto' => $id
                );
            $this->db->delete('produk', $where);
            $this->session->set_flashdata('notifikasi','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<i class="bi bi-check-circle me-1"></i>
		Berhasil menghapus Produk
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
		redirect('admin/produk');	
	}

	public function carousel(){
				        // foto
						$namafoto = date('YmdHis').'.jpg';
						$config['upload_path']          = 'assets/upload/carousel/';
						$config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
						$config['allowed_types']        = '*';
						$config['file_name']            = $namafoto;
						$this->load->library('upload', $config);
						if($_FILES['foto']['size'] >= 500 * 1024){
							$this->session->set_flashdata('notifikasi', '
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<i class="bi bi-exclamation-triangle me-1"></i>
							ukuran file lebih dari 500kb ulangi upload dengan ukuran foto kurang dari 500kb
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						  </div>
									');
							redirect('admin/produk');  
						}  elseif( ! $this->upload->do_upload('foto')){
							$error = array('error' => $this->upload->display_errors());
						}else{
							$data = array('upload_data' => $this->upload->data());
						} 
						// foto
						$data = array(
							'id_produk' => $this->input->post('id_produk'),
							'foto'=> $namafoto,
						);
						$this->db->insert('carousel',$data);
						$this->session->set_flashdata('notifikasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="bi bi-check-circle me-1"></i>
						Berhasil Menambahkan foto
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						  </div>');
						redirect('admin/produk');	
	}
}
?>
