<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Levelpengguna extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$this->load->library('encryption');

			$logkategori 	 = "Akses Menu";
			$logketerangan 	 = "User melakukan akses menu level pengguna";
			$this->model_security->log($logkategori,$logketerangan);

			$scdata = $this->model_security->showfnCaleg();
			$main_name  = $scdata['fnCaleg'];

			$data['judul']				= 'Home';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Level Pengguna';
			$data['link_sub_judul1']	= 'levelpengguna';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Gerilya '.$main_name.' | Level Pengguna';
			/*$data['judul_halaman']		= "Level Pengguna&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-xs tooltips' href='".base_url()."levelpengguna/tambah' data-placement='right' data-toggle='tooltip' data-original-title='Tambah Level Pengguna'><i class='fa fa-plus fa-lg'></i></a>";*/
			$data['judul_halaman']		= "Level Pengguna";
			$data['content']			= "level_pengguna/view_levelpengguna";
			$data['active']				= "level_pengguna";
			$data['datatable']			= "yes";
			$data['datalevelpengguna']		= $this->db->get("level");
			
			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/logout');
		}
	}

	public function index2()
	{
		if($this->uri->segment(3) == 1){
			$query		= $this->db->get("level");
			$data['datalevelpengguna'] = $query->result();
			
			$data["value"] = 0;
			$data["message"] = "berhasil";
			// echoing JSON response
			echo json_encode($data);
		}else{
			// failed
			$response["value"] = 0;
			$response["message"] = "Anda belum login";
			// echoing JSON response
			echo json_encode($response);
		}
	}

	public function tambah()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			
			/*$logkategori 	 = "Input Form Level Pengguna";
			$logketerangan 	 = "User melakukan pengisian data level pengguna";
			$this->model_security->log($logkategori,$logketerangan);

			$scdata = $this->model_security->showfnCaleg();
			$main_name  = $scdata['fnCaleg'];

			$data['judul']				= 'Home';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Level Pengguna';
			$data['link_sub_judul1']	= 'levelpengguna';
			$data['sub_judul2']			= 'Tambah';
			$data['link_sub_judul2']	= 'levelpengguna/tambah';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Gerilya '.$main_name.' | Level Pengguna';
			$data['judul_halaman']		= 'Form Input Level Pengguna';
			$data['content']			= "level_pengguna/input_levelpengguna";
			$data['active']				= "level_pengguna";
			$data['validation']			= "yes";
			$data['tambahlevelpengguna']			= "yes";

			$this->load->view('theme_sentral', $data);*/
			redirect('levelpengguna');
		}else{
			redirect('main/logout');
		}
	}

	public function getlevelpengguna()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){

			$logkategori 	 = "CRUD";
			$logketerangan 	 = "User melakukan input data level pengguna";
			$this->model_security->log($logkategori,$logketerangan);
			
			$cek['level_pengguna']	= $this->input->post('nama');
			$tampung['level_pengguna']	= $this->input->post('nama');
			$tampung['menu_akses']		= $this->input->post('menu');

			$query_cek = $this->db->get_where('pengguna_level', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data Level Pengguna Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('pengguna_level',$tampung);
				$this->session->set_flashdata('sukses','Data Baru Level Pengguna Berhasil Di Input</strong>');
			}

			redirect('levelpengguna');
		}else{
			redirect('main/logout');
		}
	}
	public function updatelevelpengguna()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){

			$logkategori 	 = "CRUD";
			$logketerangan 	 = "User melakukan update data level pengguna";
			$this->model_security->log($logkategori,$logketerangan);

			$cek['id']					= $this->input->post('id');
			$tampung['level_pengguna']	= $this->input->post('nama');
			$tampung['menu_akses']		= $this->input->post('menu');

			$query_cek = $this->db->get_where('pengguna_level', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('pengguna_level',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data Level Pengguna Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('levelpengguna');
		}else{
			redirect('main/logout');
		}
	}
	
	public function editlevelpengguna()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){

			$logkategori 	 = "CRUD";
			$logketerangan 	 = "User melakukan edit data level pengguna";
			$this->model_security->log($logkategori,$logketerangan);

			$scdata = $this->model_security->showfnCaleg();
			$main_name  = $scdata['fnCaleg'];

			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Home';
			$tampilkan['link_judul']		= 'main/home';
			$tampilkan['sub_judul1']		= 'Level Pengguna';
			$tampilkan['link_sub_judul1']	= 'levelpengguna';
			$tampilkan['sub_judul2']		= 'Edit';
			$tampilkan['link_sub_judul2']	= 'levelpengguna/editlevelpengguna/'.$get;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Gerilya '.$main_name.' | Level Pengguna';
			$tampilkan['judul_halaman']		= 'Form Edit Level Pengguna';
			$tampilkan['content']			= "level_pengguna/edit_levelpengguna";
			$tampilkan['active']			= "level_pengguna";

			$this->db->where('id', $data);
			$query = $this->db->get('pengguna_level');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']	= $row->id;
					$tampilkan['nama']	= $row->level_pengguna;
					$tampilkan['menu']	= $row->menu_akses;
				}
			}
			else
			{
					$tampilkan['id']			= '';
					$tampilkan['nama']			= '';
					$tampilkan['menu']			= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('main/logout');
		}
	}

	

	/*public function deletelevelpengguna()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){

			$logkategori 	 = "CRUD";
			$logketerangan 	 = "User melakukan hapus data level pengguna";
			$this->model_security->log($logkategori,$logketerangan);

			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$this->db->where('id', $data);
			$query = $this->db->get('pengguna_level');
			if($query->num_rows() > 0){

				$this->db->where('id',$data);
				$this->db->delete('pengguna_level');
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('levelpengguna');
			}
			else
			{
				redirect('levelpengguna');
			}
		}else{
			redirect('main/logout');
		}
	}*/
}