<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Progress extends CI_Controller {

	public function provinsi()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "6" || $this->session->userdata('level') == "7"){
			$this->load->library('encryption');

			$data['judul']				= 'Home';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Progress';
			$data['link_sub_judul1']	= '';
			$data['sub_judul2']			= 'Provinsi';
			$data['link_sub_judul2']	= 'progress/provinsi';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Registrasi Pengawas | Progress Provinsi';
			$data['judul_halaman']		= "Progress Provinsi";
			$data['content']			= "progress/view_provinsi";
			$data['active']				= "progress";
			$data['datatable']			= "yes";

			$data['dataprovDone']		= $this->db->query("select pengguna.ID, pengguna.NamaLengkap, pengguna.Telepon, pengguna.LP, pengguna.Login, provinsi.provinsi from pengguna INNER JOIN provinsi ON pengguna.Provinsi = provinsi.id where (NamaLengkap is not null AND Telepon is not null AND LP is not null) and pengguna.Provinsi is not null and KabKota is null and Kecamatan is null and Kelurahan is null and Tps is null");

			$data['dataprovNot']		= $this->db->query("select pengguna.ID, pengguna.NamaLengkap, pengguna.Telepon, pengguna.LP, pengguna.Login, provinsi.provinsi from pengguna INNER JOIN provinsi ON pengguna.Provinsi = provinsi.id where (NamaLengkap is null or Telepon is null or LP is null) and pengguna.Provinsi is not null and KabKota is null and Kecamatan is null and Kelurahan is null and Tps is null");


			$this->load->view('theme_sentral', $data);
		}else if($this->session->userdata('level') == "" || $this->session->userdata('level') == "null" || $this->session->userdata('level') == NULL){
			redirect('main/logout');
		}else{
			redirect('main/home');
		}
	}

	public function kabupaten()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "5" || $this->session->userdata('level') == "6" || $this->session->userdata('level') == "7"){
			$this->load->library('encryption');

			$data['judul']				= 'Home';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Progress';
			$data['link_sub_judul1']	= '';
			$data['sub_judul2']			= 'Kabupaten/Kota';
			$data['link_sub_judul2']	= 'progress/kabupaten';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Registrasi Pengawas | Progress Kabupaten/Kota';
			$data['judul_halaman']		= "Progress Kabupaten/Kota";
			$data['content']			= "progress/view_kabupaten";
			$data['active']				= "progress";
			$data['datatable']			= "yes";

			if($this->session->userdata('level') > 0 && $this->session->userdata('level') < 6){
				$idprov = $this->session->userdata('dataprov');
				$data['datakabDone']		= $this->db->query("select pengguna.ID, pengguna.NamaLengkap, pengguna.Telepon, pengguna.LP, pengguna.Login, kabupaten.kabupaten from pengguna INNER JOIN kabupaten ON pengguna.Provinsi = kabupaten.provinsi_id AND pengguna.KabKota = kabupaten.id where (NamaLengkap is not null AND Telepon is not null AND LP is not null) and pengguna.Provinsi='".$idprov."' and pengguna.KabKota is not null and pengguna.Kecamatan is null and pengguna.Kelurahan is null and pengguna.Tps is null");

				$data['datakabNot']			= $this->db->query("select pengguna.ID, pengguna.NamaLengkap, pengguna.Telepon, pengguna.LP, pengguna.Login, kabupaten.kabupaten from pengguna INNER JOIN kabupaten ON pengguna.Provinsi = kabupaten.provinsi_id AND pengguna.KabKota = kabupaten.id where (NamaLengkap is null OR Telepon is null OR LP is null) and pengguna.Provinsi='".$idprov."' and pengguna.KabKota is not null and pengguna.Kecamatan is null and pengguna.Kelurahan is null and pengguna.Tps is null");
			}else if($this->session->userdata('level') > 5 && $this->session->userdata('level') < 8){
				$data['datakabDone']		= $this->db->query("select pengguna.ID, pengguna.NamaLengkap, pengguna.Telepon, pengguna.LP, pengguna.Login, kabupaten.kabupaten from pengguna INNER JOIN kabupaten ON pengguna.Provinsi = kabupaten.provinsi_id AND pengguna.KabKota = kabupaten.id where (NamaLengkap is not null AND Telepon is not null AND LP is not null) and pengguna.Provinsi is not null and pengguna.KabKota is not null and pengguna.Kecamatan is null and pengguna.Kelurahan is null and pengguna.Tps is null");

				$data['datakabNot']			= $this->db->query("select pengguna.ID, pengguna.NamaLengkap, pengguna.Telepon, pengguna.LP, pengguna.Login, kabupaten.kabupaten from pengguna INNER JOIN kabupaten ON pengguna.Provinsi = kabupaten.provinsi_id AND pengguna.KabKota = kabupaten.id where (NamaLengkap is null OR Telepon is null OR LP is null) and pengguna.Provinsi is not null and pengguna.KabKota is not null and pengguna.Kecamatan is null and pengguna.Kelurahan is null and pengguna.Tps is null");
			}


			$this->load->view('theme_sentral', $data);
		}else if($this->session->userdata('level') == "" || $this->session->userdata('level') == "null" || $this->session->userdata('level') == NULL){
			redirect('main/logout');
		}else{
			redirect('main/home');
		}
	}
/*
	public function kecamatan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "4" || $this->session->userdata('level') == "5" || $this->session->userdata('level') == "6" || $this->session->userdata('level') == "7"){
			$this->load->library('encryption');

			$data['judul']				= 'Home';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Progress';
			$data['link_sub_judul1']	= '';
			$data['sub_judul2']			= 'Kecamatan';
			$data['link_sub_judul2']	= 'progress/kecamatan';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Registrasi Pengawas | Progress Kecamatan';
			$data['judul_halaman']		= "Progress Kecamatan";
			$data['content']			= "progress/view_kecamatan";
			$data['active']				= "progress";
			$data['datatable']			= "yes";

			$idprov = $this->session->userdata('dataprov');
			$idkab = $this->session->userdata('datakab');

			$data['datakecDone']		= $this->db->query("select * from pengguna where NamaLengkap!='' and Telepon!='' and LP!='' and Provinsi='".$idprov."' and KabKota='".$idkab."' and Kecamatan='' and Kelurahan='' and Tps=''");

			$data['datakecNot']			= $this->db->query("select * from pengguna where NamaLengkap='' and Telepon='' and LP='' and Provinsi='".$idprov."' and KabKota='".$idkab."' and Kecamatan='' and Kelurahan='' and Tps=''");


			$this->load->view('theme_sentral', $data);
		}else if($this->session->userdata('level') == "" || $this->session->userdata('level') == "null" || $this->session->userdata('level') == NULL){
			redirect('main/logout');
		}else{
			redirect('main/home');
		}
	}

	public function kelurahan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "3" || $this->session->userdata('level') == "4" || $this->session->userdata('level') == "5" || $this->session->userdata('level') == "6" || $this->session->userdata('level') == "7"){
			$this->load->library('encryption');

			$data['judul']				= 'Home';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Progress';
			$data['link_sub_judul1']	= '';
			$data['sub_judul2']			= 'Kelurahan';
			$data['link_sub_judul2']	= 'progress/kelurahan';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Registrasi Pengawas | Progress Kelurahan';
			$data['judul_halaman']		= "Progress Kelurahan";
			$data['content']			= "progress/view_kelurahan";
			$data['active']				= "progress";
			$data['datatable']			= "yes";

			$idprov = $this->session->userdata('dataprov');
			$idkab = $this->session->userdata('datakab');
			$idkec = $this->session->userdata('datakec');

			$data['datakecDone']		= $this->db->query("select * from pengguna where NamaLengkap!='' and Telepon!='' and LP!='' and Provinsi='".$idprov."' and KabKota='".$idkab."' and Kecamatan='".$idkec."' and Kelurahan='' and Tps=''");

			$data['datakecNot']			= $this->db->query("select * from pengguna where NamaLengkap='' and Telepon='' and LP='' and Provinsi='".$idprov."' and KabKota='".$idkab."' and Kecamatan='".$idkec."' and Kelurahan='' and Tps=''");


			$this->load->view('theme_sentral', $data);
		}else if($this->session->userdata('level') == "" || $this->session->userdata('level') == "null" || $this->session->userdata('level') == NULL){
			redirect('main/logout');
		}else{
			redirect('main/home');
		}
	}

	public function tps()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "2" || $this->session->userdata('level') == "3" || $this->session->userdata('level') == "4" || $this->session->userdata('level') == "5" || $this->session->userdata('level') == "6" || $this->session->userdata('level') == "7"){
			$this->load->library('encryption');

			$data['judul']				= 'Home';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Progress';
			$data['link_sub_judul1']	= '';
			$data['sub_judul2']			= 'TPS';
			$data['link_sub_judul2']	= 'progress/tps';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Registrasi Pengawas | Progress TPS';
			$data['judul_halaman']		= "Progress TPS";
			$data['content']			= "progress/view_tps";
			$data['active']				= "progress";
			$data['datatable']			= "yes";

			$idprov = $this->session->userdata('dataprov');
			$idkab = $this->session->userdata('datakab');
			$idkec = $this->session->userdata('datakec');
			$idtps = $this->session->userdata('datatps');

			$data['datakecDone']		= $this->db->query("select * from pengguna where NamaLengkap!='' and Telepon!='' and LP!='' and Provinsi='".$idprov."' and KabKota='".$idkab."' and Kecamatan='".$idkec."' and Kelurahan='".$idtps."' and Tps=''");

			$data['datakecNot']			= $this->db->query("select * from pengguna where NamaLengkap='' and Telepon='' and LP='' and Provinsi='".$idprov."' and KabKota='".$idkab."' and Kecamatan='".$idkec."' and Kelurahan='".$idtps."' and Tps=''");


			$this->load->view('theme_sentral', $data);
		}else if($this->session->userdata('level') == "" || $this->session->userdata('level') == "null" || $this->session->userdata('level') == NULL){
			redirect('main/logout');
		}else{
			redirect('main/home');
		}
	}
*/
}