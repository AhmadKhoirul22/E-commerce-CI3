<?php 
class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('id_pelanggan') == NULL){
			redirect('auth');
	}
		$this->load->model('Checkout_model');
	}
	public function index(){
		$data['title'] = 'Dashboard of Page';
		// pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('pembeli/dashboard/index'); // URL dasar pagination
   		$config['total_rows'] = $this->db->count_all('produk'); // Total jumlah data
    	$config['per_page'] = 6; // Jumlah data per halaman
    	$config['uri_segment'] = 4; // Posisi segmen dalam URL

		$config['full_tag_open'] = '<div class="pagination d-flex justify-content-center mt-5">';
		$config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';

		$this->pagination->initialize($config);
    	$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['pagination'] = $this->pagination->create_links();
		// end pagination
		$this->db->from('produk a');
		$this->db->join('kategori b','b.id_kategori = a.id_kategori','left');
		$this->db->limit($config['per_page'], $page);
		$data['produk'] = $this->db->get()->result_array();

		$this->db->from('profile');
		$data['profile'] = $this->db->get()->row();

		$this->db->from('kategori');
		$data['kategori'] = $this->db->get()->result_array();
		$this->load->view("pembeli/dashboard",$data);
	}

	public function detail($id){
		$data["title"] = "Detail Produk";

		$this->db->from('profile');
		$data['profile'] = $this->db->get()->row();

		$this->db->from('kategori');
		$data['kategori'] = $this->db->get()->result_array();

		// $this->db->from('produk a')->where('a.id_produk',$id);
		// $this->db->join('kategori b','b.id_kategori = a.id_kategori','left');
		// $this->db->join('carousel c','c.id_produk=a.id_produk','left');
		$this->db->select('a.*,b.nama_kategori, GROUP_CONCAT(c.foto) as carousel');
   		$this->db->from('produk a');
    	$this->db->join('kategori b', 'b.id_kategori = a.id_kategori', 'left');
    	$this->db->join('carousel c', 'c.id_produk = a.id_produk', 'left');
    	$this->db->where('a.id_produk', $id);
    	$this->db->group_by('a.id_produk');

		// GROUP_CONCAT(c.foto) as carousel: Menggabungkan semua nilai dari kolom foto di tabel 
		// carousel yang sesuai dengan id_produk 
		// dan menyimpannya sebagai satu string yang dipisahkan oleh koma, dengan nama alias carousel.

		$detail = $this->db->get()->row();
		$data['detail'] = $detail;
		$this->load->view('pembeli/detail',$data);
	}

	public function kategori($id){
		$data['title'] = 'Kategori of Page';

		$this->db->from('profile');
		$data['profile'] = $this->db->get()->row();

		$this->db->from('produk a');
		$this->db->join('kategori b','b.id_kategori=a.id_kategori','left');
		$this->db->where('a.id_kategori',$id);
		$data['produk'] = $this->db->get()->result_array();

		$this->db->from('kategori');
		$data['kategori'] = $this->db->get()->result_array();

		$this->load->view('pembeli/kategori',$data);
	}

	public function search(){
		// $this->load->model('Checkout_model');
		$data['title'] = 'Dashboard of Page';

		$data['produk'] = [];
		$keyword = $this->input->get('keyword');
		if($keyword){
			$data['produk'] = $this->Checkout_model->search($keyword);
		}
		$this->db->from('profile');
		$data['profile'] = $this->db->get()->row();

		$this->db->from('kategori');
		$data['kategori'] = $this->db->get()->result_array();

		// $this->db->from('produk a');
        // $this->db->join('kategori b','a.id_kategori=b.id_kategori','left');

		$this->load->view('pembeli/search',$data);
	}

	public function pesan($id_pelanggan){
		$data['title'] = 'Pesanan';
		$this->db->from('profile');
		$data['profile'] = $this->db->get()->row();

		$this->db->from('kategori');
		$data['kategori'] = $this->db->get()->result_array();

		$this->db->from('pembelian a');
		$this->db->join('detail_pembelian b','b.kode_pembelian=a.kode_pembelian','left');
		$this->db->join('produk c','c.id_produk=b.id_produk','left');
		$this->db->where('a.id_pelanggan',$id_pelanggan);
		$data['pembelian'] = $this->db->get()->result_array();

		$this->load->view('pembeli/pesan',$data);
	}

	public function audio(){
		$data['title'] = 'Audio JavaNetbeans';
		$this->db->from('profile');
		$data['profile'] = $this->db->get()->row();

		$this->db->from('kategori');
		$data['kategori'] = $this->db->get()->result_array();
		$this->load->view('pembeli/audio',$data);
	}
}

?>
