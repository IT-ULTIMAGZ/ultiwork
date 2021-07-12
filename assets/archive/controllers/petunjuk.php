<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Petunjuk extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');

			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Petunjuk';
			$data['link_sub_judul1']	= 'petunjuk';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Petunjuk';
			$data['judul_halaman']		= "Petunjuk&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-xs tooltips' href='".base_url()."petunjuk/tambah' data-placement='right' data-toggle='tooltip' data-original-title='Tambah Petunjuk'><i class='fa fa-plus fa-lg'></i></a>";
			$data['content']			= "petunjuk/view_petunjuk";
			$data['active']				= "petunjuk";
			$data['datatable']			= "yes";
			$data['datapetunjuk']		= $this->db->get("petunjuk");
			
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
			$data['sub_judul1']			= 'Petunjuk';
			$data['link_sub_judul1']	= 'petunjuk';
			$data['sub_judul2']			= 'Tambah';
			$data['link_sub_judul2']	= 'petunjuk/tambah';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Petunjuk';
			$data['judul_halaman']		= 'Form Input Petunjuk';
			$data['content']			= "petunjuk/input_petunjuk";
			$data['active']				= "petunjuk";
			$data['validation']			= "yes";

			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function getpetunjuk()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['petunjukid']				= $this->input->post('id');
			$tampung['petunjukid']			= $this->input->post('id');
			$tampung['judulpetunjuk']		= $this->input->post('judul');
			$tampung['nmpetunjuk']			= $this->input->post('nama');

			$query_cek = $this->db->get_where('petunjuk', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data Petunjuk Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('petunjuk',$tampung);
				$this->session->set_flashdata('sukses','Data Baru Petunjuk Berhasil Di Input</strong>');
			}

			redirect('petunjuk');
		}else{
			redirect('v1/logout');
		}
	}
	public function updatepetunjuk()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['petunjukid']				= $this->input->post('id');
			$tampung['petunjukid']			= $this->input->post('id');
			$tampung['judulpetunjuk']		= $this->input->post('judul');
			$tampung['nmpetunjuk']			= $this->input->post('nama');

			$query_cek = $this->db->get_where('petunjuk', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('petunjuk',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data Petunjuk Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('petunjuk');
		}else{
			redirect('v1/logout');
		}
	}
	
	public function editpetunjuk()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Petunjuk';
			$tampilkan['link_sub_judul1']	= 'petunjuk';
			$tampilkan['sub_judul2']		= 'Edit';
			$tampilkan['link_sub_judul2']	= 'petunjuk/editpetunjuk/'.$get;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | Petunjuk';
			$tampilkan['judul_halaman']		= 'Form Edit Petunjuk';
			$tampilkan['content']			= "petunjuk/edit_petunjuk";
			$tampilkan['active']			= "petunjuk";
			$tampilkan['datatable']			= "yes";
			$tampilkan['tambahitem']		= "yes";

			$this->db->where('petunjukid', $data);
			$query = $this->db->get('petunjuk');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']		= $row->petunjukid;
					$tampilkan['judul']		= $row->judulpetunjuk;
					$tampilkan['nama']		= $row->nmpetunjuk;
				}
			}
			else
			{
				$tampilkan['id']		= '';
				$tampilkan['judul']		= '';
				$tampilkan['nama']		= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	public function deletecustomer()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$this->db->where('petunjukid', $data);
			$query = $this->db->get('petunjuk');
			if($query->num_rows() > 0){

				$this->db->where('petunjukid',$data);
				$this->db->delete('petunjuk');
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('petunjuk');
			}
			else
			{
				redirect('petunjuk');
			}
		}else{
			redirect('v1/logout');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */