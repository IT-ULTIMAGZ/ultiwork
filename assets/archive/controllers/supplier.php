<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');

			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Supplier';
			$data['link_sub_judul1']	= 'supplier';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Supplier';
			$data['judul_halaman']		= "Supplier&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-xs tooltips' href='".base_url()."supplier/tambah' data-placement='right' data-toggle='tooltip' data-original-title='Tambah Supplier'><i class='fa fa-plus fa-lg'></i></a>";
			$data['content']			= "supplier/view_supplier";
			$data['active']				= "supplier";
			$data['datasupplier']		= $this->db->get('supplier');
			
			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function tambah()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Supplier';
			$data['link_sub_judul1']	= 'supplier';
			$data['sub_judul2']			= 'Tambah';
			$data['link_sub_judul2']	= 'supplier/tambah';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Supplier';
			$data['judul_halaman']		= 'Supplier';
			$data['content']			= "supplier/input_supplier";
			$data['active']				= "supplier";
			$data['validation']			= "yes";

			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function getsupplier()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['supplierid']				= $this->input->post('id');
			$tampung['namaper']				= $this->input->post('nama');
			$tampung['alamatper']			= $this->input->post('alamat');
			$tampung['kontakper']			= $this->input->post('kontak');
			$tampung['produkpenjualan']		= $this->input->post('produk');
			$tampung['keterangan']			= $this->session->userdata('keterangan');

			$query_cek = $this->db->get_where('supplier', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data Supplier Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('supplier',$tampung);
				$this->session->set_flashdata('sukses','Data Baru Supplier Berhasil Di Input</strong>');
			}

			redirect('supplier');
		}else{
			redirect('v1/logout');
		}
	}
	public function updatesupplier()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['supplierid']				= $this->input->post('id');
			$tampung['namaper']				= $this->input->post('nama');
			$tampung['alamatper']			= $this->input->post('alamat');
			$tampung['kontakper']			= $this->input->post('kontak');
			$tampung['produkpenjualan']		= $this->input->post('produk');
			$tampung['keterangan']			= $this->input->post('keterangan');

			$query_cek = $this->db->get_where('supplier', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('supplier',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data Supplier Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('supplier');
		}else{
			redirect('v1/logout');
		}
	}
	
	public function editsupplier()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Supplier';
			$tampilkan['link_sub_judul1']	= 'supplier';
			$tampilkan['sub_judul2']		= 'Edit';
			$tampilkan['link_sub_judul2']	= 'supplier/editsupplier/'.$get;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | Supplier';
			$tampilkan['judul_halaman']		= 'Supplier';
			$tampilkan['content']			= "supplier/edit_supplier";
			$tampilkan['active']			= "supplier";

			$this->db->where('supplierid', $data);
			$query = $this->db->get('supplier');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']			= $row->supplierid;
					$tampilkan['nama']			= $row->namaper;
					$tampilkan['alamat']		= $row->alamatper;
					$tampilkan['kontak']		= $row->kontakper;
					$tampilkan['produk']		= $row->produkpenjualan;
					$tampilkan['keterangan']	= $row->keterangan;
				}
			}
			else
			{
				$tampilkan['id']			= '';
				$tampilkan['nama']			= '';
				$tampilkan['alamat']		= '';
				$tampilkan['kontak']		= '';
				$tampilkan['produk']		= '';
				$tampilkan['keterangan']	= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	

	public function deletesupplier()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$this->db->where('supplierid', $data);
			$query = $this->db->get('supplier');
			if($query->num_rows() > 0){

				$this->db->where('supplierid',$data);
				$this->db->delete('supplier');
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('supplier');
			}
			else
			{
				redirect('supplier');
			}
		}else{
			redirect('v1/logout');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */