<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$this->load->library('encryption');

			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Petugas';
			$data['link_sub_judul1']	= 'petugas';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Petugas';
			$data['judul_halaman']		= 'Petugas';
			$data['content']			= "petugas/view_petugas";
			$data['active']				= "petugas";
			$data['datatable']			= "yes";

			$data['datapetugas']		= $this->db->get('petugas');
			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function tambah()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Petugas';
			$data['link_sub_judul1']	= 'petugas';
			$data['sub_judul2']			= 'Tambah';
			$data['link_sub_judul2']	= 'petugas/tambah';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Petugas';
			$data['judul_halaman']		= 'Form Input Petugas';
			$data['content']			= "petugas/input_petugas";
			$data['active']				= "petugas";
			$data['validation']			= "yes";

			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function getpetugas()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$cek['username']			= $this->input->post('username');
			$tampung['nmpetugas']		= $this->input->post('nama');
			$tampung['jk']				= $this->input->post('jk');
			$tampung['almtpetugas']		= $this->input->post('alamat');
			$tampung['telppetugas']		= $this->input->post('notelp');
			$tampung['username']		= $this->input->post('username');
			$tampung['password']		= md5($this->input->post('password'));
			$tampung['level']			= $this->input->post('level');
			$tampung['lastlogin']		= "0000-00-00 00:00:00";
			$tampung['status']			= 0;

			$query_cek = $this->db->get_where('petugas', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data Petugas Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('petugas',$tampung);
				$this->session->set_flashdata('sukses','Data Baru Petugas Berhasil Di Input</strong>');
			}

			redirect('petugas');
		}else{
			redirect('v1/logout');
		}
	}
	
	public function updatepetugas()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$cek['petugasid']			= $this->input->post('id');
			$tampung['nmpetugas']		= $this->input->post('nama');
			$tampung['jk']				= $this->input->post('jk');
			$tampung['almtpetugas']		= $this->input->post('alamat');
			$tampung['telppetugas']		= $this->input->post('notelp');
			$tampung['username']		= $this->input->post('username');
			$tampung['level']			= $this->input->post('level');

			$query_cek = $this->db->get_where('petugas', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('petugas',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data petugas Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('petugas');
		}else{
			redirect('v1/logout');
		}
	}
	public function updatePasswordpetugas()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$cek['petugasid']			= $this->input->post('id');
			$tampung['password']		= md5($this->input->post('password'));

			$query_cek = $this->db->get_where('petugas', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('petugas',$tampung,$cek);
				$this->session->set_flashdata('sukses','Password petugas Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('petugas');
		}else{
			redirect('v1/logout');
		}
	}

	public function editpetugas()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Petugas';
			$tampilkan['link_sub_judul1']	= 'petugas';
			$tampilkan['sub_judul2']		= 'Edit';
			$tampilkan['link_sub_judul2']	= 'petugas/editpetugas/'.$data;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | Petugas';
			$tampilkan['judul_halaman']		= 'Form Edit Petugas';
			$tampilkan['content']			= "petugas/edit_petugas";
			$tampilkan['active']			= "petugas";
			$tampilkan['validation']		= "yes";

			$this->db->where('petugasid', $data);
			$query = $this->db->get('petugas');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']			= $row->petugasid;
					$tampilkan['nama']			= $row->nmpetugas;
					$tampilkan['jk']			= $row->jk;
					$tampilkan['alamat']		= $row->almtpetugas;
					$tampilkan['notelp']		= $row->telppetugas;
					$tampilkan['username']		= $row->username;
					$tampilkan['level']			= $row->level;
				}
			}
			else
			{
				$tampilkan['id']			= '';
				$tampilkan['nama']			= '';
				$tampilkan['jk']			= '';
				$tampilkan['alamat']		= '';
				$tampilkan['notelp']		= '';
				$tampilkan['username']		= '';
				$tampilkan['level']			= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	public function editPasswordpetugas()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Petugas';
			$tampilkan['link_sub_judul1']	= 'petugas';
			$tampilkan['sub_judul2']		= 'Edit Password';
			$tampilkan['link_sub_judul2']	= 'petugas/editPasswordpetugas/'.$data;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | Petugas';
			$tampilkan['judul_halaman']		= 'Petugas';
			$tampilkan['content']			= "petugas/edit_password";
			$tampilkan['active']			= "petugas";
			$tampilkan['validation']		= "yes";



			$this->db->where('petugasid', $data);
			$query = $this->db->get('petugas');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']			= $row->petugasid;
					$tampilkan['password']		= $row->password;
					$tampilkan['nama']			= $row->nmpetugas;
				}
			}
			else
			{
				$tampilkan['id']		= '';
				$tampilkan['password']	= '';
				$tampilkan['nama']		= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	public function deletepetugas()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);
			
			$this->db->where('petugasid', $data);
			$query = $this->db->get('petugas');
			if($query->num_rows() > 0){

				$this->db->where('petugasid',$data);
				$this->db->delete('petugas');
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('petugas');
			}
			else
			{
				redirect('petugas');
			}
		}else{
			redirect('v1/logout');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */