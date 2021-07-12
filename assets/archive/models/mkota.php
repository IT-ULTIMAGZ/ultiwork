<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkota extends CI_model { 

    var $tabel = 'pembelian';   //variabel tabelnya
 
    function __construct() {
        parent::__construct();
    }
 
    //fungsi untuk menampilkan semua data dari tabel database
    function get_allitem() {
        $this->db->from($this->tabel);
        $query = $this->db->get();
 
        //cek apakah ada data
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
