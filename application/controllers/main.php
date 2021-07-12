<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");


class Main extends CI_Controller {

	/*
		level 1 = Redaksi
		level 2 = Fotografer
		level 3 = Visual (Layouter n Illustrator)
		level 4 = IT
		level 5 = Perusahaan (RnB n PR)
		level 6 = BPH
		level 7 = Administrator
	*/

	public function index()
	{
		$this->load->view('login_administrator');
	}

	public function home(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') != ""){

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= '';
			$data['link_sub_judul1']	= '';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Beranda';
			$data['judul_halaman']		= 'Beranda';
			$data['content']			= "home";
			$data['active']				= "home";
			
			$data['datatable']			= "yes";

			$q1	= $this->db->query("select count(IdPekerjaan) as c from pekerjaan where IdLevel='".$this->session->userdata('level')."' and IdPengguna='".$this->session->userdata('penggunaid')."' and Status=1");
			$q2	= $this->db->query("select count(IdPekerjaan) as c from pekerjaan where IdLevel='".$this->session->userdata('level')."' and IdPengguna='".$this->session->userdata('penggunaid')."' and (Status>1 and (Status=5 or Status=8 or Status=9))");

			$q3	= $this->db->query("select count(IdPekerjaan) as c from pekerjaan where IdLevel='".$this->session->userdata('level')."' and IdPengguna='".$this->session->userdata('penggunaid')."' and Status=5");

			$q4	= $this->db->query("select count(IdPekerjaan) as c from pekerjaan where IdLevel='".$this->session->userdata('level')."' and IdPengguna='".$this->session->userdata('penggunaid')."' and Status=8");

			foreach ($q1->result() as $row) {
				$data['pending'] = $row->c;	
			}

			foreach ($q2->result() as $row) {
				$data['ongoing'] = $row->c;	
			}

			foreach ($q3->result() as $row) {
				$data['ticketpending'] = $row->c;	
			}

			foreach ($q4->result() as $row) {
				$data['ticketongoing'] = $row->c;	
			}
			

			$qRedaksi = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=1");
			foreach ($qRedaksi->result() as $row) {
				$data['dataRedaksi']		= $row->cPekerjaan;
			}
			$qFotografer = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=2");
			foreach ($qFotografer->result() as $row) {
				$data['dataFotografer']		= $row->cPekerjaan;
			}
			$qVisual = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=3");
			foreach ($qVisual->result() as $row) {
				$data['dataVisual']			= $row->cPekerjaan;
			}
			$qIT = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=4");
			foreach ($qIT->result() as $row) {
				$data['dataIT']				= $row->cPekerjaan;
			}
			$qPerusahaan = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=5");
			foreach ($qPerusahaan->result() as $row) {
				$data['dataPerusahaan']		= $row->cPekerjaan;
			}
			$qBPH = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=6");
			foreach ($qBPH->result() as $row) {
				$data['dataBPH']			= $row->cPekerjaan;
			}

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/login');
		}
	}

	public function home2(){
		// 4 = penggunaid
		// 3 = level
		if($this->uri->segment(3) != ""){
			$q1	= $this->db->query("select count(IdPekerjaan) as c from pekerjaan where IdLevel='".$this->uri->segment(3)."' and IdPengguna='".$this->uri->segment(4)."' and Status=1");
			$q2	= $this->db->query("select count(IdPekerjaan) as c from pekerjaan where IdLevel='".$this->uri->segment(3)."' and IdPengguna='".$this->uri->segment(4)."' and (Status>1 and (Status=5 or Status=8 or Status=9))");

			$q3	= $this->db->query("select count(IdPekerjaan) as c from pekerjaan where IdLevel='".$this->uri->segment(3)."' and IdPengguna='".$this->uri->segment(4)."' and Status=5");

			$q4	= $this->db->query("select count(IdPekerjaan) as c from pekerjaan where IdLevel='".$this->uri->segment(3)."' and IdPengguna='".$this->uri->segment(4)."' and Status=8");

			foreach ($q1->result() as $row) {
				$data['pending'] = $row->c;	
			}

			foreach ($q2->result() as $row) {
				$data['ongoing'] = $row->c;	
			}

			foreach ($q3->result() as $row) {
				$data['ticketpending'] = $row->c;	
			}

			foreach ($q4->result() as $row) {
				$data['ticketongoing'] = $row->c;	
			}
			

			$qRedaksi = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=1");
			foreach ($qRedaksi->result() as $row) {
				$data['dataRedaksi']		= $row->cPekerjaan;
			}
			$qFotografer = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=2");
			foreach ($qFotografer->result() as $row) {
				$data['dataFotografer']		= $row->cPekerjaan;
			}
			$qVisual = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=3");
			foreach ($qVisual->result() as $row) {
				$data['dataVisual']			= $row->cPekerjaan;
			}
			$qIT = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=4");
			foreach ($qIT->result() as $row) {
				$data['dataIT']				= $row->cPekerjaan;
			}
			$qPerusahaan = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=5");
			foreach ($qPerusahaan->result() as $row) {
				$data['dataPerusahaan']		= $row->cPekerjaan;
			}
			$qBPH = $this->db->query("select count(IdPekerjaan) as cPekerjaan from pekerjaan where IdLevel=6");
			foreach ($qBPH->result() as $row) {
				$data['dataBPH']			= $row->cPekerjaan;
			}

			$data["value"] = 1;
			$data["message"] = "Berhasil ambil data";
			echo json_encode($data);
		}else{
			// failed
			$response["value"] = 0;
			$response["message"] = "Anda belum login";
			// echoing JSON response
			echo json_encode($response);
		}
	}

	public function profil(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') != ""){

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Profil';
			$data['link_sub_judul1']	= 'main/profil';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Profil';
			$data['judul_halaman']		= 'Profil';
			$data['content']			= "view_profil"; // nama file
			$data['active']				= "";

			$id = $this->session->userdata('penggunaid');
			
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
										INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel WHERE pengguna.IdPengguna = $id ");

			foreach ($query->result() as $row) {
				$data['id']		 		= $row->IdPengguna;
				$data['levelid']		= $row->IdLevel;
				$data['level']			= $row->NamaLevel;
				$data['as']				= $row->As;
				$data['nama']		 	= $row->NamaLengkap;
				$data['nim']		 	= $row->NIM;
				$data['telepon']		= $row->Telepon;
				$data['email']			= $row->Email;
				$data['tmptlahir']		= $row->TmpLahir;
				$data['tanggallahir']	= $row->TglLahir;
				$data['gender']			= $row->LP;
				$data['username']		= $row->Login;
				$data['alamat']			= $row->Alamat;

			}

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/login');
		}
	}

	public function editprofil()
	{
		$this->model_security->getsecurity();

		if(($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3" || $this->session->userdata('level') == "4" || $this->session->userdata('level') == "5" || $this->session->userdata('level') == "6" || $this->session->userdata('level') == "7") && ($this->session->userdata('lock') == "" || $this->session->userdata('lock') == "0")){
			$data	= $this->session->userdata('penggunaid');

			$tampilkan['judul']				= 'Beranda';
			$tampilkan['link_judul']		= 'main/home';
			$tampilkan['sub_judul1']		= 'Profil';
			$tampilkan['link_sub_judul1']	= 'main/profil';
			$tampilkan['sub_judul2']		= 'Edit';
			$tampilkan['link_sub_judul2']	= 'main/editprofil/'.$data;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'ULTIWORK | Profil';
			$tampilkan['judul_halaman']		= 'Form Edit Profil';
			$tampilkan['content']			= "edit_profil";
			$tampilkan['active']			= "";
			$tampilkan['validation']		= "yes";
			$tampilkan['select2']			= "yes";
			$tampilkan['datepicker']		= "yes";

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
										INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel WHERE pengguna.IdPengguna = $data AND pengguna.del='0'");
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']		 	= $row->IdPengguna;
					$tampilkan['nama']		 	= $row->NamaLengkap;
					$tampilkan['nim']		 	= $row->NIM;
					$tampilkan['nohp']			= $row->Telepon;
					$tampilkan['email']		 	= $row->Email;
					$tampilkan['tmptlahir']	 	= $row->TmpLahir;
					$tampilkan['tanggallahir']	= $row->TglLahir;
					$tampilkan['gender']		= $row->LP;
					$tampilkan['alamat']		= $row->Alamat;
					$tampilkan['username']		= $row->Login;
					$tampilkan['updateoleh']	= $row->UpdateOleh;	
					$tampilkan['updatewaktu']	= $row->UpdateTgl;
				}
			}
			else
			{
				$tampilkan['id']		 	= '';
				$tampilkan['nama']		 	= '';
				$tampilkan['nim']		 	= '';
				$tampilkan['nohp']			= '';
				$tampilkan['email']		 	= '';
				$tampilkan['tmptlahir']	 	= '';
				$tampilkan['tanggallahir']	= '';
				$tampilkan['gender']		= '';
				$tampilkan['alamat']		= '';
				$tampilkan['username']		= '';
				$tampilkan['updateoleh']	= '';
				$tampilkan['updatewaktu']	= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		    }else if(($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3" || $this->session->userdata('level') == "4" || $this->session->userdata('level') == "5" || $this->session->userdata('level') == "6" || $this->session->userdata('level') == "7") && $this->session->userdata('lock') == "1"){
		        $this->session->set_flashdata('alert','Data sudah terisi, untuk update profil silahkan menghubungi call center');
		        redirect('main/profil');
		    }else{
		        redirect('main/logout');
		    }
	}
	
	public function unlock(){
	    $this->model_security->getsecurity();
	    if($this->session->userdata('level') == "7"){
	        $get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);
	        
	        $cek['ID']					= $data;
			$tampung['UpdateOleh']	= $this->session->userdata('penggunaid');
			$tampung['UpdateTgl']	= date("Y-m-d h:i:s");	
			$tampung['lock']        = "";

			$query_cek = $this->db->get_where('pengguna', $cek);
	        
	        if ($query_cek->num_rows > 0)
			{
				$this->db->update('pengguna',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data Profil Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}
			
			redirect('main/home');
	    }else{
	        redirect('main/logout');
	    }
	}

	public function editpassword()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') != ""){
			$data = $this->session->userdata('penggunaid');

			$tampilkan['judul']				= 'Beranda';
			$tampilkan['link_judul']		= 'main/home';
			$tampilkan['sub_judul1']		= 'Profil';
			$tampilkan['link_sub_judul1']	= 'home/profil';
			$tampilkan['sub_judul2']		= 'Edit Password';
			$tampilkan['link_sub_judul2']	= 'home/editpassword';
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'ULTIWORK | Profil';
			$tampilkan['judul_halaman']		= 'Form Edit Password';
			$tampilkan['content']			= "edit_password";
			$tampilkan['active']			= "";
			$tampilkan['validation']		= "yes";



			$this->db->where('IdPengguna', $data);
			$query = $this->db->get('pengguna');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']			= $row->IdPengguna;
					$tampilkan['password']		= $row->Sandi;
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

	public function updateprofil()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3" || $this->session->userdata('level') == "4" || $this->session->userdata('level') == "5" || $this->session->userdata('level') == "6" || $this->session->userdata('level') == "7"){

			$cek['IdPengguna']			= $this->input->post('id');

			$tampung['NamaLengkap']		= $this->input->post('nama');

			$tampung['NIM']				= $this->input->post('nim');
			$tampung['Telepon']			= $this->input->post('nohp');
			$tampung['Email']			= $this->input->post('email');
			$tampung['TmpLahir']		= $this->input->post('tmptlahir');
			$tampung['TglLahir']		= $this->input->post('tanggallahir');
			$tampung['LP']				= $this->input->post('gender');
			$tampung['Login']			= $this->input->post('username');
			$tampung['Alamat']			= $this->input->post('alamat');

			$tampung['UpdateOleh']		= $this->session->userdata('penggunaid');
			$tampung['UpdateTgl']		= date("Y-m-d h:i:s");

			$query_cek = $this->db->get_where('pengguna', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('pengguna',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data Profil Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('main/profil');
		}else{
			redirect('main/logout');
		}
	}

	public function updateprofil_m()
	{
		// 3 = level
		// 4 = penggunaid

		if($this->uri->segment(3) == "1" || $this->uri->segment(3) == "2" || $this->uri->segment(3) == "3" || $this->uri->segment(3) == "4" || $this->uri->segment(3) == "5" || $this->uri->segment(3) == "6" || $this->uri->segment(3) == "7"){

			$cek['IdPengguna']			= $this->input->post('id');

			$tampung['NamaLengkap']		= $this->input->post('nama');

			$tampung['NIM']				= $this->input->post('nim');
			$tampung['Telepon']			= $this->input->post('nohp');
			$tampung['Email']			= $this->input->post('email');
			$tampung['TmpLahir']		= $this->input->post('tmptlahir');
			$tampung['TglLahir']		= $this->input->post('tanggallahir');
			$tampung['LP']				= $this->input->post('gender');
			$tampung['Login']			= $this->input->post('username');
			$tampung['Alamat']			= $this->input->post('alamat');

			$tampung['UpdateOleh']		= $this->uri->segment(4);
			$tampung['UpdateTgl']		= date("Y-m-d h:i:s");

			$query_cek = $this->db->get_where('pengguna', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('pengguna',$tampung,$cek);
				
				$response["value"] = 1;
				$response["message"] = "Data Profil Berhasil di Update";
			}
			else
			{
				$response["value"] = 0;
				$response["message"] = "Data Tidak Tersedia Untuk di Update";
			}
		}else{
			$response["value"] = 0;
			$response["message"] = "Anda belum login";
		}
		echo json_encode($response);
	}

	public function updatepassword()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') != ''){

			$logkategori 	 = "Update Password";
			$logketerangan 	 = "User melakukan update password";
			$this->model_security->log($logkategori,$logketerangan);

			$cek['IdPengguna']			= $this->session->userdata('penggunaid');
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

			redirect('main/profil');
		}else{
			redirect('main/logout');
		}
	}

	public function updatepassword_m()
	{
		// 3 = level
		// 4 = penggunaid

		if($this->uri->segment(3) != ''){

			$cek['IdPengguna']			= $this->uri->segment(4);
			$tampung['Sandi']			= md5($this->input->post('password'));
			$tampung['UpdateOleh']		= $this->uri->segment(4);
			$tampung['UpdateTgl']		= date("Y-m-d h:i:s");	

			$query_cek = $this->db->get_where('pengguna', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('pengguna',$tampung,$cek);
				$response["value"] = 1;
				$response["message"] = "Password Pengguna Berhasil di Update";
			}
			else
			{
				$response["value"] = 0;
				$response["message"] = "Data Tidak Tersedia Untuk di Update";
			}
		}else{
			$response["value"] = 0;
			$response["message"] = "Anda belum login";
		}
		echo json_encode($response);
	}

	public function getLogin()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$this->load->model('model_login');
		$this->model_login->getLoginPIy($user,$pass);
	} 

	public function getLogin_m()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$this->load->model('model_login');
		$this->model_login->getLoginPIy_m($user,$pass);
	} 

	public function logout(){

		$this->session->sess_destroy();
		redirect('main');
	}

}