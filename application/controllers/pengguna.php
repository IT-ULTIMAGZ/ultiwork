<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Pengguna extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') != ""){
			$this->load->library('encryption');

			$data['judul']				= 'Home';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Pengguna';
			$data['link_sub_judul1']	= 'pengguna';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Pengguna';
			$data['judul_halaman']		= "Pengguna&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-xs tooltips' href='".base_url()."pengguna/tambah' data-placement='right' data-toggle='tooltip' data-original-title='Tambah Pengguna'><i class='fa fa-plus fa-lg'></i></a>";
			$data['content']			= "pengguna/view_pengguna";
			$data['active']				= "pengguna";
			$data['datatable']			= "yes";

			if($this->session->userdata('level')==7){
			$data['datapengguna']		= $this->db->query("SELECT
															pengguna.IdPengguna,
															pengguna.IdLevel,
															pengguna.`As`,
															pengguna.NamaLengkap,
															pengguna.NIM,
															pengguna.Telepon,
															pengguna.Email,
															pengguna.TmpLahir,
															pengguna.TglLahir,
															pengguna.LP,
															pengguna.Login,
															pengguna.Sandi,
															pengguna.Alamat,
															pengguna.InputOleh,
															pengguna.InputTgl,
															pengguna.UpdateOleh,
															pengguna.UpdateTgl,
															pengguna.del,
															`level`.NamaLevel
															FROM
															pengguna
															INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
															 WHERE pengguna.del=0");

			}else if($this->session->userdata('level')==6){
				$data['datapengguna']		= $this->db->query("SELECT
																pengguna.IdPengguna,
																pengguna.IdLevel,
																pengguna.`As`,
																pengguna.NamaLengkap,
																pengguna.NIM,
																pengguna.Telepon,
																pengguna.Email,
																pengguna.TmpLahir,
																pengguna.TglLahir,
																pengguna.LP,
																pengguna.Login,
																pengguna.Sandi,
																pengguna.Alamat,
																pengguna.InputOleh,
																pengguna.InputTgl,
																pengguna.UpdateOleh,
																pengguna.UpdateTgl,
																pengguna.del,
																`level`.NamaLevel
																FROM
																pengguna
																INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
																 WHERE pengguna.del=0 and pengguna.IdLevel!=7");
			}else{
				$data['datapengguna']		= $this->db->query("SELECT
															pengguna.IdPengguna,
															pengguna.IdLevel,
															pengguna.`As`,
															pengguna.NamaLengkap,
															pengguna.NIM,
															pengguna.Telepon,
															pengguna.Email,
															pengguna.TmpLahir,
															pengguna.TglLahir,
															pengguna.LP,
															pengguna.Login,
															pengguna.Sandi,
															pengguna.Alamat,
															pengguna.InputOleh,
															pengguna.InputTgl,
															pengguna.UpdateOleh,
															pengguna.UpdateTgl,
															pengguna.del,
															`level`.NamaLevel
															FROM
															pengguna
															INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
															 WHERE pengguna.del=0 and pengguna.IdLevel='".$this->session->userdata('level')."'");
			}


			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function index2()
	{
		//$this->model_security->getsecurity();
		if($this->uri->segment(3) != ""){
			if($this->uri->segment(3) == 7){ // untuk level
				$query		= $this->db->query("SELECT
															pengguna.IdPengguna,
															pengguna.IdLevel,
															pengguna.`As`,
															pengguna.NamaLengkap,
															pengguna.NIM,
															pengguna.Telepon,
															pengguna.Email,
															pengguna.TmpLahir,
															pengguna.TglLahir,
															pengguna.LP,
															pengguna.Login,
															pengguna.Alamat,
															pengguna.InputOleh,
															pengguna.InputTgl,
															pengguna.UpdateOleh,
															pengguna.UpdateTgl,
															pengguna.del,
															`level`.NamaLevel
															FROM
															pengguna
															INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
															 WHERE pengguna.del=0");
				$data['datapengguna'] = $query->result();
			}else if($this->uri->segment(3)==6){
				$query		= $this->db->query("SELECT
																pengguna.IdPengguna,
																pengguna.IdLevel,
																pengguna.`As`,
																pengguna.NamaLengkap,
																pengguna.NIM,
																pengguna.Telepon,
																pengguna.Email,
																pengguna.TmpLahir,
																pengguna.TglLahir,
																pengguna.LP,
																pengguna.Login,
																pengguna.Alamat,
																pengguna.InputOleh,
																pengguna.InputTgl,
																pengguna.UpdateOleh,
																pengguna.UpdateTgl,
																pengguna.del,
																`level`.NamaLevel
																FROM
																pengguna
																INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
																 WHERE pengguna.del=0 and pengguna.IdLevel!=7");
				$data['datapengguna'] = $query->result();
			}else{
				$query		= $this->db->query("SELECT
															pengguna.IdPengguna,
															pengguna.IdLevel,
															pengguna.`As`,
															pengguna.NamaLengkap,
															pengguna.NIM,
															pengguna.Telepon,
															pengguna.Email,
															pengguna.TmpLahir,
															pengguna.TglLahir,
															pengguna.LP,
															pengguna.Login,
															pengguna.Alamat,
															pengguna.InputOleh,
															pengguna.InputTgl,
															pengguna.UpdateOleh,
															pengguna.UpdateTgl,
															pengguna.del,
															`level`.NamaLevel
															FROM
															pengguna
															INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
															 WHERE pengguna.del=0 and pengguna.IdLevel='".$this->uri->segment(3)."'");
				$data['datapengguna'] = $query->result();
			}
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

		if($this->session->userdata('as') != "Anggota"){

			$data['judul']				= 'Home';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Pengguna';
			$data['link_sub_judul1']	= 'pengguna';
			$data['sub_judul2']			= 'Tambah';
			$data['link_sub_judul2']	= 'pengguna/tambah';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | pengguna';
			$data['judul_halaman']		= 'Form Input Pengguna';
			$data['content']			= "pengguna/input_pengguna";
			$data['active']				= "pengguna";
			$data['validation']			= "yes";
			$data['select2']			= "yes";
			$data['datalevel']			= $this->db->get("level");
			$data['datepicker']			= "yes";

			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function getpengguna()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('as') != 'Anggota'){

			$cek['IdPengguna']			= $this->input->post('id');
			$cek['IdLevel']				= $this->input->post('level');
			$cek['As']					= $this->input->post('status');
			$cek['NamaLengkap']			= $this->input->post('nama');

			$tampung['IdLevel']			= $this->input->post('level');
			$tampung['As']				= $this->input->post('status');
			$tampung['NamaLengkap']		= $this->input->post('nama');

			if($this->session->userdata('as') == 'Anggota' || $this->session->userdata('level') == 7){
			$tampung['NIM']				= $this->input->post('nim');
			$tampung['Telepon']			= $this->input->post('telepon');
			$tampung['Email']			= $this->input->post('email');
			$tampung['TmpLahir']		= $this->input->post('tmptlahir');
			$tampung['TglLahir']		= $this->input->post('tanggallahir');
			$tampung['LP']				= $this->input->post('gender');
			}
			$tampung['Login']			= $this->input->post('username');
			$tampung['Sandi']			= md5($this->input->post('password'));
			
			if($this->session->userdata('as') == 'Anggota' || $this->session->userdata('level') == 7){
			$tampung['Alamat']			= $this->input->post('alamat');
			}

			$tampung['InputOleh']		= $this->session->userdata('penggunaid');
			$tampung['InputTgl']		= date("Y-m-d h:i:s");
			$tampung['UpdateOleh']		= '';
			$tampung['UpdateTgl']		= '';
			$tampung['del']				= 0;

			$query_cek = $this->db->get_where('pengguna', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data Pengguna Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('pengguna',$tampung);
				$this->session->set_flashdata('sukses','Data Baru Pengguna Berhasil Di Input</strong>');
			}

			redirect('pengguna');
		}else{
			redirect('main/logout');
		}
	}

	public function getpengguna_m()
	{

		// as = 3
		// level = 4
		// pengguna = 5

		if($this->uri->segment(3) != 'Anggota'){

			$cek['IdPengguna']			= $this->input->post('id');
			$cek['IdLevel']				= $this->input->post('level');
			$cek['As']					= $this->input->post('status');
			$cek['NamaLengkap']			= $this->input->post('nama');

			$tampung['IdLevel']			= $this->input->post('level');
			$tampung['As']				= $this->input->post('status');
			$tampung['NamaLengkap']		= $this->input->post('nama');

			if($this->uri->segment(3) == 'Anggota' || $this->uri->segment(4) == 7){
			$tampung['NIM']				= $this->input->post('nim');
			$tampung['Telepon']			= $this->input->post('telepon');
			$tampung['Email']			= $this->input->post('email');
			$tampung['TmpLahir']		= $this->input->post('tmptlahir');
			$tampung['TglLahir']		= $this->input->post('tanggallahir');
			$tampung['LP']				= $this->input->post('gender');
			}
			$tampung['Login']			= $this->input->post('username');
			$tampung['Sandi']			= md5($this->input->post('password'));
			
			if($this->uri->segment(3) == 'Anggota' || $this->uri->segment(4) == 7){
			$tampung['Alamat']			= $this->input->post('alamat');
			}

			$tampung['InputOleh']		= $this->uri->segment(5);
			$tampung['InputTgl']		= date("Y-m-d h:i:s");
			$tampung['UpdateOleh']		= '';
			$tampung['UpdateTgl']		= '';
			$tampung['del']				= 0;

			$query_cek = $this->db->get_where('pengguna', $cek);

			if ($query_cek->num_rows > 0)
			{
				$response["value"] = 0;
				$response["message"] = "Data Pengguna Sudah Di Input Kan Sebelumnya";
			}
			else
			{
				$this->db->insert('pengguna',$tampung);
				$response["value"] = 1;
				$response["message"] = "Data Baru Pengguna Berhasil Di Input";
			}

		}else{
			$response["value"] = 0;
			$response["message"] = "Anda belum login";
		}
		echo json_encode($response);
	}
	
	public function updatepengguna()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('as') != 'Anggota'){

			$cek['IdPengguna']			= $this->input->post('id');

			$tampung['IdLevel']			= $this->input->post('level');
			$tampung['As']				= $this->input->post('status');
			$tampung['NamaLengkap']		= $this->input->post('nama');

			if($this->session->userdata('as') != 'Kadiv'){
			$tampung['NIM']				= $this->input->post('nim');
			$tampung['Telepon']			= $this->input->post('telepon');
			$tampung['Email']			= $this->input->post('email');
			$tampung['TmpLahir']		= $this->input->post('tmptlahir');
			$tampung['TglLahir']		= $this->input->post('tanggallahir');
			$tampung['LP']				= $this->input->post('gender');
			}
			$tampung['Login']			= $this->input->post('username');
			
			if($this->session->userdata('as') != 'Kadiv'){
			$tampung['Alamat']			= $this->input->post('alamat');
			}

			$tampung['UpdateOleh']		= $this->session->userdata('penggunaid');
			$tampung['UpdateTgl']		= date("Y-m-d h:i:s");

			$query_cek = $this->db->get_where('pengguna', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('pengguna',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data Pengguna Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('pengguna');
		}else{
			redirect('main/logout');
		}
	}
	
	public function updatePasswordpengguna()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){

			$logkategori 	 = "Update Password";
			$logketerangan 	 = "User melakukan update password";
			$this->model_security->log($logkategori,$logketerangan);

			$cek['IdPengguna']			= $this->input->post('id');
			$tampung['Sandi']			= md5($this->input->post('password'));
			$tampung['UpdateOleh']		= $this->session->userdata('penggunaid');
			$tampung['UpdateTgl']		= date("Y-m-d h:i:s");	

			$query_cek = $this->db->get_where('pengguna', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('pengguna',$tampung,$cek);
				$this->session->set_flashdata('sukses','Password Pengguna Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('pengguna');
		}else{
			redirect('main/logout');
		}
	}

	public function editpengguna()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');

			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Home';
			$tampilkan['link_judul']		= 'main/home';
			$tampilkan['sub_judul1']		= 'Pengguna';
			$tampilkan['link_sub_judul1']	= 'pengguna';
			$tampilkan['sub_judul2']		= 'Edit';
			$tampilkan['link_sub_judul2']	= 'pengguna/editpengguna/'.$data;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'ULTIWORK | Pengguna';
			$tampilkan['judul_halaman']		= 'Form Edit Pengguna';
			$tampilkan['content']			= "pengguna/edit_pengguna";
			$tampilkan['active']			= "pengguna";
			$tampilkan['validation']		= "yes";
			$tampilkan['select2']			= "yes";
			$tampilkan['datalevel']			= $this->db->get("pengguna_level");

			//$this->db->where('id', $data);
			$query = $this->db->query("SELECT
										pengguna.NamaLengkap,
										pengguna.`As`,
										pengguna.IdPengguna,
										pengguna.IdLevel,
										pengguna.NIM,
										pengguna.Telepon,
										pengguna.Email,
										pengguna.TmpLahir,
										pengguna.TglLahir,
										pengguna.LP,
										pengguna.Login,
										pengguna.Sandi,
										pengguna.Alamat,
										pengguna.InputOleh,
										pengguna.InputTgl,
										pengguna.UpdateOleh,
										pengguna.UpdateTgl,
										pengguna.del,
										`level`.NamaLevel
										FROM
										pengguna
										INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
										WHERE pengguna.IdPengguna = $data");
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']			= $this->encryption->encode($row->IdPengguna);
					$tampilkan['levelid']		= $row->IdLevel;
					$tampilkan['level']			= $row->NamaLevel;
					$tampilkan['status']		= $row->As;
					$tampilkan['nama']			= $row->NamaLengkap;
					$tampilkan['nim']			= $row->NIM;
					$tampilkan['telepon']		= $row->Telepon;
					$tampilkan['email']			= $row->Email;
					$tampilkan['tmptlahir']		= $row->TmpLahir;
					$tampilkan['tanggallahir']	= $row->TglLahir;
					$tampilkan['gender']		= $row->LP;
					$tampilkan['username']		= $row->Login;
					$tampilkan['password']		= $row->Sandi;
					$tampilkan['alamat']		= $row->Alamat;
					
				}
			}
			else
			{
					$tampilkan['id']			= '';
					$tampilkan['levelid']		= '';
					$tampilkan['level']			= '';
					$tampilkan['nama']			= '';
					$tampilkan['telepon']		= '';
					$tampilkan['email']			= '';

					$tampilkan['username']		= '';
					$tampilkan['password']		= '';
					$tampilkan['jabatan']		= '';
					$tampilkan['alamat']		= '';
					
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('main/logout');
		}
	}

	public function editPasswordpengguna()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');

			$logkategori 	 = "CRUD";
			$logketerangan 	 = "User melakukan edit data password pengguna";
			$this->model_security->log($logkategori,$logketerangan);

			$scdata = $this->model_security->showfnCaleg();
			$main_name  = $scdata['fnCaleg'];

			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Home';
			$tampilkan['link_judul']		= 'main/home';
			$tampilkan['sub_judul1']		= 'Pengguna';
			$tampilkan['link_sub_judul1']	= 'pengguna';
			$tampilkan['sub_judul2']		= 'Edit Password';
			$tampilkan['link_sub_judul2']	= 'pengguna/editPasswordpengguna/'.$data;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'ULTIWORK '.$main_name.' | Pengguna';
			$tampilkan['judul_halaman']		= 'pengguna';
			$tampilkan['content']			= "pengguna/edit_password";
			$tampilkan['active']			= "pengguna";
			$tampilkan['validation']		= "yes";



			$this->db->where('id', $data);
			$query = $this->db->get('pengguna');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']			= $row->id;
					$tampilkan['password']		= $row->sandi;
					$tampilkan['nama']			= $row->nama_lengkap;
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
			redirect('main/logout');
		}
	}

	public function deletepengguna()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');

			$logkategori 	 = "Hapus Pengguna";
			$logketerPngan 	 = "User melakukan hapus pengguna";
			$this->model_security->log($logkategori,$logketerangan);

			$get = $this->uri->segment(3);
			$cek['IdPengguna']		= $this->encryption->decode($get);
			$tampung['del']			= 0;
			$tampung['UpdateOleh']	= $this->session->userdata('penggunaid');
			$tampung['UpdateTgl']	= date("Y-m-d H:i:s");
			
			$query = $this->db->get_where('pengguna', $cek);
			if($query->num_rows() > 0){
				$this->db->update('pengguna',$tampung,$cek);
				//$this->db->query("update pengguna set del=1 where IdPengguna='$data'");
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('pengguna');
			}
			else
			{
				redirect('pengguna');
			}
		}else{
			redirect('main/logout');
		}
	}

}