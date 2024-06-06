<?php
class Checkout_model extends CI_Model{
	public function checkout_today(){
		date_default_timezone_set("Asia/Jakarta");
        // today checkout
        $tanggal = date('Y-m-d');
        $this->db->select('sum(total_harga) as total');
        $this->db->from('pembelian');
        $this->db->where('tanggal', $tanggal);
        return $this->db->get()->row()->total;
	}

	public function checkout_month(){
		date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m');
        $this->db->select('sum(total_harga) as total');
        $this->db->from('pembelian');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
        return $this->db->get()->row()->total;
	}

	public function search($keyword){
		$this->db->like('nama_produk',$keyword);
		$this->db->or_like('harga',$keyword);
		return $this->db->get('produk')->result();
	}
}
