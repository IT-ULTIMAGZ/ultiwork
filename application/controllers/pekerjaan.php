<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

/*
	status:
	0=selesai
	1=pending
	2=dikerjakan
	3=asistensi
	4=revisi
	5=ticket
	6=rebutan


	Lihat Progress Pekerjaan
    Lihat Pekerjaan
    Buat Pekerjaan (form tambah -> kalau udh kelar tambah, redirect ke tunjuk anggota)
    Tunjuk Anggota 
    History Pekerjaan

*/


class Pekerjaan extends CI_Controller {

	// lihat pekerjaan (yang belum kelar)
	public function index(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') != ""){

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Pekerjaan';
			$data['link_sub_judul1']	= 'pekerjaan';
			$data['sub_judul2']			= 'Lihat Pekerjaan (pending)';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Lihat Pekerjaan (pending)';
			$data['judul_halaman']		= 'Lihat Pekerjaan (pending)';
			$data['content']			= "pekerjaan/lihat_pekerjaan";
			$data['active']				= "pekerjaan";
			
			$data['datatable']			= "yes";

			
				// ini buat nampilin job dia personal
			$data['dataPekerjaan']		= $this->db->query("SELECT
															pengguna.NamaLengkap,
															`level`.NamaLevel,
															pengguna.`As`,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
															INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
															where pekerjaan.IdLevel='".$this->session->userdata('level')."' 
															and pekerjaan.IdPengguna='".$this->session->userdata('penggunaid')."' 
															and pekerjaan.Status=1 and pekerjaan.del=0");
			if($this->session->userdata('as') != "Anggota"){
			// ini buat nampilin job dari divisi nya (anak2nya)
			$data['dataDivisi']		= $this->db->query("SELECT
														pengguna.NamaLengkap,
														`level`.NamaLevel,
														pengguna.`As`,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
														WHERE pekerjaan.IdLevel='".$this->session->userdata('level')."' 
														AND pekerjaan.IdPengguna != '".$this->session->userdata('penggunaid')."' 
														AND pekerjaan.Status=1 and pekerjaan.del=0");
			}

			$data['dataRebutan']	= $this->db->query("SELECT
														`level`.NamaLevel,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
														WHERE pekerjaan.IdLevel='".$this->session->userdata('level')."' 
														AND pekerjaan.IdPengguna=0
														AND pekerjaan.Status=6 and pekerjaan.del=0");
			

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/login');
		}
	}

	// lihat pekerjaan (yang belum kelar)
	public function index2(){
		
		// 3 = level
		// 4 = as
		// 5 = penggunaid

		if($this->uri->segment(3) != ""){

			// ini buat nampilin job dia personal
			$query		= $this->db->query("SELECT
											pengguna.NamaLengkap,
											`level`.NamaLevel,
											pengguna.`As`,
											pekerjaan.IdPekerjaan,
											pekerjaan.NamaPekerjaan,
											pekerjaan.Deskripsi,
											pekerjaan.TglMulai,
											pekerjaan.TglDeadline,
											pekerjaan.LinkDrive,
											pekerjaan.IdPengguna,
											pekerjaan.`Status`,
											pekerjaan.PekerjaanDari,
											pekerjaan.IdLevel,
											pekerjaan.InputOleh,
											pekerjaan.InputTgl,
											pekerjaan.UpdateOleh,
											pekerjaan.UpdateTgl,
											pekerjaan.del
											FROM
											pekerjaan
											INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
											INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
											where pekerjaan.IdLevel='".$this->uri->segment(3)."' 
											and pekerjaan.IdPengguna='".$this->uri->segment(5)."' 
											and pekerjaan.Status=1 and pekerjaan.del=0");
			if($query->num_rows() > 0){
				$data['dataPekerjaan']		= $query->result();
			}else{
				$data['dataPekerjaan']		= 0;
			}

			if($this->uri->segment(4) != "Anggota"){
				// ini buat nampilin job dari divisi nya (anak2nya)
				$query		= $this->db->query("SELECT
														pengguna.NamaLengkap,
														`level`.NamaLevel,
														pengguna.`As`,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
														WHERE pekerjaan.IdLevel='".$this->uri->segment(3)."' 
														AND pekerjaan.IdPengguna != '".$this->uri->segment(5)."' 
														AND pekerjaan.Status=1 and pekerjaan.del=0");
				if($query->num_rows() > 0){
					$data['dataDivisi']		= $query->result();
				}else{
					$data['dataDivisi']		= 0;
				}
			}

			$query	= $this->db->query("SELECT
										`level`.NamaLevel,
										pekerjaan.IdPekerjaan,
										pekerjaan.NamaPekerjaan,
										pekerjaan.Deskripsi,
										pekerjaan.TglMulai,
										pekerjaan.TglDeadline,
										pekerjaan.LinkDrive,
										pekerjaan.IdPengguna,
										pekerjaan.`Status`,
										pekerjaan.PekerjaanDari,
										pekerjaan.IdLevel,
										pekerjaan.InputOleh,
										pekerjaan.InputTgl,
										pekerjaan.UpdateOleh,
										pekerjaan.UpdateTgl,
										pekerjaan.del
										FROM
										pekerjaan
										INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
										WHERE pekerjaan.IdLevel='".$this->uri->segment(3)."' 
										AND pekerjaan.IdPengguna=0
										AND pekerjaan.Status=6 and pekerjaan.del=0");

			if($query->num_rows() > 0){
				$data['dataRebutan']		= $query->result();
			}else{
				$data['dataRebutan']		= 0;
			}
			
			$data["value"] = 1;
			$data["message"] = "Data berhasil di ambil";
		}else{
			$response["value"] = 0;
			$response["message"] = "Anda belum login";
		}
		echo json_encode($data);
	}

	public function lihat_pekerjaan_pr(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') > 4){

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Pekerjaan';
			$data['link_sub_judul1']	= 'pekerjaan';
			$data['sub_judul2']			= 'Lihat Pekerjaan PR';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Lihat Pekerjaan PR';
			$data['judul_halaman']		= 'Lihat Pekerjaan (pending)';
			$data['content']			= "pekerjaan/lihat_pekerjaan_pr";
			$data['active']				= "pekerjaan";
			
			$data['datatable']			= "yes";

			
				// ini buat nampilin job dia personal
			$data['dataPekerjaan']		= $this->db->query("SELECT
															pengguna.NamaLengkap,
															`level`.NamaLevel,
															pengguna.`As`,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
															INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
															where pekerjaan.IdLevel='".$this->session->userdata('level')."'
															and pekerjaan.Status=7 and pekerjaan.del=0");
				

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/login');
		}
	}

	public function lihat_pekerjaan_pr_m(){
		
		// level 	= 3

		if($this->uri->segment(3) > 4){
			
				// ini buat nampilin job dia personal
			$query		= $this->db->query("SELECT
															pengguna.NamaLengkap,
															`level`.NamaLevel,
															pengguna.`As`,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
															INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
															where pekerjaan.IdLevel='".$this->uri->segment(3)."'
															and pekerjaan.Status=7 and pekerjaan.del=0");
			if($query->num_rows() > 0){
				$data['dataPekerjaan']		= $query->result();
			}else{
				$data['dataPekerjaan']		= 0;
			}

			$data["value"] = 1;
			$data["message"] = "Data berhasil di ambil";
		}else{
			$data["value"] = 0;
			$data["message"] = "Anda belum login";
		}
		echo json_encode($data);
	}

	public function lihat_ticket(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') != ""){

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Ticket Pekerjaan';
			$data['link_sub_judul1']	= 'pekerjaan/lihat';
			$data['sub_judul2']			= 'Lihat Ticket';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Lihat Ticket';
			$data['judul_halaman']		= 'Lihat Ticket';
			$data['content']			= "pekerjaan/lihat_ticket";
			$data['active']				= "ticket";
			
			$data['datatable']			= "yes";

			
				// ini buat nampilin job dia personal
			$data['dataTicketBelum']		= $this->db->query("SELECT
															pengguna.NamaLengkap,
															`level`.NamaLevel,
															pengguna.`As`,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
															INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
															where (pekerjaan.IdLevel='".$this->session->userdata('level')."' or pekerjaan.PekerjaanDari='".$this->session->userdata('level')."') 
															and pekerjaan.Status=5 and pekerjaan.del=0");
			$data['dataTicketSudah']		= $this->db->query("SELECT
															pengguna.NamaLengkap,
															`level`.NamaLevel,
															pengguna.`As`,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
															INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
															where (pekerjaan.IdLevel='".$this->session->userdata('level')."' or pekerjaan.PekerjaanDari='".$this->session->userdata('level')."') 
															and (pekerjaan.Status=8 || pekerjaan.Status=9) and pekerjaan.del=0");			

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/login');
		}
	}

	public function lihat_ticket_m(){
		$level = $this->uri->segment(3);

		if($level != ""){

			
			
				// ini buat nampilin job dia personal
			$query		= $this->db->query("SELECT
											pengguna.NamaLengkap,
											`level`.NamaLevel,
											pengguna.`As`,
											pekerjaan.IdPekerjaan,
											pekerjaan.NamaPekerjaan,
											pekerjaan.Deskripsi,
											pekerjaan.TglMulai,
											pekerjaan.TglDeadline,
											pekerjaan.LinkDrive,
											pekerjaan.IdPengguna,
											pekerjaan.`Status`,
											pekerjaan.PekerjaanDari,
											pekerjaan.IdLevel,
											pekerjaan.InputOleh,
											pekerjaan.InputTgl,
											pekerjaan.UpdateOleh,
											pekerjaan.UpdateTgl,
											pekerjaan.del
											FROM
											pekerjaan
											INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
											INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
											where (pekerjaan.IdLevel='".$level."' or pekerjaan.PekerjaanDari='".$level."') 
											and pekerjaan.Status=5 and pekerjaan.del=0");
			if($query->num_rows() > 0){
				$data['dataTicketBelum']		= $query->result();
			}else{
				$data['dataTicketBelum']		= 0;
			}

			$query		= $this->db->query("SELECT
											pengguna.NamaLengkap,
											`level`.NamaLevel,
											pengguna.`As`,
											pekerjaan.IdPekerjaan,
											pekerjaan.NamaPekerjaan,
											pekerjaan.Deskripsi,
											pekerjaan.TglMulai,
											pekerjaan.TglDeadline,
											pekerjaan.LinkDrive,
											pekerjaan.IdPengguna,
											pekerjaan.`Status`,
											pekerjaan.PekerjaanDari,
											pengguna.NamaLengkap,
											pekerjaan.IdLevel,
											pekerjaan.InputOleh,
											pekerjaan.InputTgl,
											pekerjaan.UpdateOleh,
											pekerjaan.UpdateTgl,
											pekerjaan.del
											FROM
											pekerjaan
											INNER JOIN pengguna ON pekerjaan.PekerjaanDari = pengguna.IdPengguna
											INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
											where (pekerjaan.IdLevel='".$level."' or pekerjaan.PekerjaanDari='".$level."') 
											and (pekerjaan.Status=8 || pekerjaan.Status=9) and pekerjaan.del=0");	
			if($query->num_rows() > 0){
				$data['dataTicketSudah']		= $query->result();
			}else{
				$data['dataTicketSudah']		= 0;
			}

			$data["value"] = 1;
			$data["message"] = "Data berhasil di ambil";
		}else{
			$data["value"] = 0;
			$data["message"] = "Anda belum login";
		}
		echo json_encode($data);
	}
	
	// lihat progress pekerjaan
	public function progress() 
	{
		/*
			status pekerjaan [normal] :
			1. diajukan
			2. sedang dikerjakan
			3. sudah selesai

		
		status pekerjaan visual:			
			lagi dikerjain

		------
			asistensi -> ngasih data yg dikerjain (progres) -> dia kasih link nya dan masukkin ke dalam form -> terus di kasih ke pierre -> pierre kasih note mengenai perubahan tanpa desain.
		------
			revisi -> pierre ngerubah status pekerjaan.
			selesai -> anggota ngerubah status pekerjaan.

		RnB: [normal]
		PR: pnormal]


		*/

		$this->model_security->getsecurity();

		if($this->session->userdata('level') != "" ){

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Pekerjaan';
			$data['link_sub_judul1']	= 'pekerjaan';
			$data['sub_judul2']			= 'Lihat Progress Pekerjaan';
			$data['link_sub_judul2']	= 'pekerjaan/progress';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Lihat Progress Pekerjaan';
			$data['judul_halaman']		= 'Lihat Progress Pekerjaan';
			$data['content']			= "pekerjaan/lihat_progres_pekerjaan";
			$data['active']				= "pekerjaan";
			
			$data['datatable']			= "yes";

			// ini buat nampilin job dia personal
			$data['dataPekerjaan']		= $this->db->query("SELECT
															pengguna.NamaLengkap,
															`level`.NamaLevel,
															pengguna.`As`,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
															INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
															where pekerjaan.IdLevel='".$this->session->userdata('level')."' 
															and pekerjaan.IdPengguna='".$this->session->userdata('penggunaid')."' 
															and (pekerjaan.Status=2 or pekerjaan.Status=3 or pekerjaan.Status=4)");

			if($this->session->userdata('as') != "Anggota"){
			// ini buat nampilin job dari divisi nya (anak2nya)
			$data['dataDivisi']		= $this->db->query("SELECT
														pengguna.NamaLengkap,
														`level`.NamaLevel,
														pengguna.`As`,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel
														where pekerjaan.IdLevel='".$this->session->userdata('level')."'
														and pekerjaan.IdPengguna != '".$this->session->userdata('penggunaid')."' 
														and pekerjaan.Status=2");
			}
			

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/login');
		}
	}

	// lihat progress pekerjaan
	public function progress_m() 
	{
		/*
			status pekerjaan [normal] :
			1. diajukan
			2. sedang dikerjakan
			3. sudah selesai

		
		status pekerjaan visual:			
			lagi dikerjain

		------
			asistensi -> ngasih data yg dikerjain (progres) -> dia kasih link nya dan masukkin ke dalam form -> terus di kasih ke pierre -> pierre kasih note mengenai perubahan tanpa desain.
		------
			revisi -> pierre ngerubah status pekerjaan.
			selesai -> anggota ngerubah status pekerjaan.

		RnB: [normal]
		PR: pnormal]


		*/
		// 3 = level
		// 4 = as
		// 5 = penggunaid
		if($this->uri->segment(3) != "" ){
			// ini buat nampilin job dia personal
			$query = $this->db->query("SELECT
															pengguna.NamaLengkap,
															`level`.NamaLevel,
															pengguna.`As`,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
															INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
															where pekerjaan.IdLevel='".$this->uri->segment(3)."' 
															and pekerjaan.IdPengguna='".$this->uri->segment(5)."' 
															and (pekerjaan.Status=2 or pekerjaan.Status=3 or pekerjaan.Status=4)");
			if($query->num_rows() > 0){
				$data['dataPekerjaan']		= $query->result();
			}else{
				$data['dataPekerjaan']		= 0;
			}
			$data['dataDivisi'] = 0;
			if($this->uri->segment(4) != "Anggota"){
				// ini buat nampilin job dari divisi nya (anak2nya)
				$query = $this->db->query("SELECT
															pengguna.NamaLengkap,
															`level`.NamaLevel,
															pengguna.`As`,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
															INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel
															where pekerjaan.IdLevel='".$this->uri->segment(3)."'
															and pekerjaan.IdPengguna != '".$this->uri->segment(5)."' 
															and pekerjaan.Status=2");

				if($query->num_rows() > 0){
					$data['dataDivisi']		= $query->result();
				}else{
					$data['dataDivisi']		= 0;
				}
				
			}
			
			$data["value"] = 1;
			$data["message"] = "Data berhasil di ambil";
			echo json_encode($data);
		}else{
			$response["value"] = 0;
			$response["message"] = "Anda belum login";
			echo json_encode($response);
		}
	}

	public function buat_pekerjaan(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') != "" and $this->session->userdata('as') != 'Anggota'){

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			if($this->uri->segment(3)=='TICKET'){
			$data['sub_judul1']			= 'Ticket Pekerjaan';
			$data['link_sub_judul1']	= '';
			$data['sub_judul2']			= 'Buat Ticket Baru';
			$data['link_sub_judul2']	= 'pekerjaan/buat_pekerjaan';
			}else{
			$data['sub_judul1']			= 'Pekerjaan';
			$data['link_sub_judul1']	= 'pekerjaan';
			$data['sub_judul2']			= 'Buat Pekerjaan';
			$data['link_sub_judul2']	= 'pekerjaan/buat_pekerjaan';
			}
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			if($this->uri->segment(3)=='TICKET'){
			$data['this_tittle']		= 'ULTIWORK | Buat Ticket baru';
			$data['judul_halaman']		= 'Buat Ticket Baru';
			$data['content']			= "pekerjaan/buat_pekerjaan";
			$data['active']				= "ticket";
			}else{
			$data['this_tittle']		= 'ULTIWORK | Buat Pekerjaan';
			$data['judul_halaman']		= 'Buat Pekerjaan';
			$data['content']			= "pekerjaan/buat_pekerjaan";
			$data['active']				= "pekerjaan";
			}
			$data['datepicker']			= "yes";

			if($this->uri->segment(3)=='TICKET'){
				$data['select2'] 		= "yes";
				$data['dataPemimpin'] 	= $this->db->query("SELECT
															pengguna.IdPengguna,
															pengguna.NamaLengkap,
															pengguna.`As`,
															`level`.NamaLevel
															FROM
															pengguna
															INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
															WHERE pengguna.`As` != 'Anggota'
															");
			}
			

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/login');
		}
	}

	public function getPekerjaan(){
		$this->model_security->getsecurity();

		if($this->session->userdata('as') != "Anggota"){
			$tipe = $this->input->post('tipe');
			if($this->session->userdata('level') != 1 || ($this->session->userdata('level') == 1 && $this->session->userdata('as')=='Redpel')){
				$cek['NamaPekerjaan']	= $this->input->post('nama');
				$cek['Deskripsi']		= $this->input->post('username');
				$cek['TglMulai']		= $this->input->post('sejak');
				$cek['TglDeadline']		= $this->input->post('sampai');
				$cek['LinkDrive']		= $this->input->post('link');
			}

			$tampung['NamaPekerjaan']	= $this->input->post('nama');
			$tampung['Deskripsi']		= $this->input->post('deskripsi');
			$tampung['TglMulai']		= $this->input->post('sejak');
			$tampung['TglDeadline']		= $this->input->post('sampai');
			$tampung['LinkDrive']		= $this->input->post('link');
			if ($tipe=='PR') {
			$tampung['IdPengguna']		= $this->session->userdata('penggunaid');
			}else if($tipe=='TICKET'){
			$tampung['IdPengguna']		= $this->input->post('tunjuk');
			}else{
			$tampung['IdPengguna']		= 0;
			}
			
			if ($tipe=='REDPEL'||$tipe=='redpel') {
			$tampung['Status']			= 6;
			}else if($tipe=='PR'){
			$tampung['Status']			= 7;
			}else if($tipe=='TICKET'){
			$tampung['Status']			= 5;
			}else{
			$tampung['Status']			= 1;
			}
			$tampung['PekerjaanDari']	= $this->session->userdata('penggunaid');
			if($tipe=='TICKET'){
				$qcekLevel = $this->db->query("select IdLevel from pengguna where IdPengguna='".$this->input->post('tunjuk')."'");
				foreach ($qcekLevel->result() as $row) {
					$tampung['IdLevel']			= $row->IdLevel;		
				}
			}else{
					$tampung['IdLevel']			= $this->session->userdata('level');
			}
			$tampung['InputOleh']		= $this->session->userdata('penggunaid');
			$tampung['InputTgl']		= date("Y-m-d H:i:s");
			$tampung['del']				= 0;

			if($this->session->userdata('level') == 1 && $this->session->userdata('as')=='Kadiv'){$query_cek=0;
			}else{ $query_cek = $this->db->get_where('pekerjaan', $cek); }

			if ($query_cek->num_rows() > 0)
			{
				if($tipe=='TICKET'){
				$this->session->set_flashdata('gagal','Data Ticket Sudah Di Input Kan Sebelumnya</strong>');
				}else{
				$this->session->set_flashdata('gagal','Data Pekerjaan Sudah Di Input Kan Sebelumnya</strong>');
				}
			}
			else
			{
				//bukan redaksi tapi Kadiv
				//redaksi tapi redpel
				if(($this->session->userdata('level') != 1 && ($this->session->userdata('as') == 'Kadiv' || ($this->session->userdata('as') == 'Wakil'))) || ($this->session->userdata('level')==1 && $this->session->userdata('as') == 'Redpel')){
					$this->db->insert('pekerjaan',$tampung);
				}else{
					$qRedaksi = $this->db->query("select * from pengguna where IdLevel=1 and `As`='Anggota' and del=0");
					foreach ($qRedaksi->result() as $row) {
						$tampung['Status']		= 2;
						$tampung['IdPengguna']	= $row->IdPengguna;
						for($i=0;$i<3;$i++){
							$this->db->insert('pekerjaan',$tampung);
						}
					}
					$this->session->set_flashdata('sukses','Data Baru Pekerjaan Berhasil Di Input</strong>');
					redirect('pekerjaan/progress');
				}
				if($tipe=='TICKET'){
				$this->session->set_flashdata('sukses','Ticket Berhasil Di Buat</strong>');
				}else{
				$this->session->set_flashdata('sukses','Data Baru Pekerjaan Berhasil Di Input</strong>');
				}
			}

			if($tipe=='REDPEL'||$tipe=='redpel'){
			redirect('pekerjaan');
			}else if($tipe=='TICKET'){
			redirect('pekerjaan/lihat_ticket');
			}else{
			redirect('pekerjaan/tunjuk_anggota');	
			}
		}else{
			redirect('main/logout');
		}
	}

	public function getPekerjaan_m(){
		
		$as 		= $this->input->post('as');
		$level 		= $this->input->post('level');
		$pengguna 	= $this->input->post('pengguna');

		if($as != "Anggota" && !empty($this->input->post('nama'))){
			
			$tipe = $this->input->post('tipe');
			if($level != 1 || ($level == 1 && $as =='Redpel')){
				$cek['NamaPekerjaan']	= $this->input->post('nama');
				$cek['Deskripsi']		= $this->input->post('username');
				$cek['TglMulai']		= $this->input->post('sejak');
				$cek['TglDeadline']		= $this->input->post('sampai');
				$cek['LinkDrive']		= $this->input->post('link');
			}

			$tampung['NamaPekerjaan']	= $this->input->post('nama');
			$tampung['Deskripsi']		= $this->input->post('deskripsi');
			$tampung['TglMulai']		= $this->input->post('sejak');
			$tampung['TglDeadline']		= $this->input->post('sampai');
			$tampung['LinkDrive']		= $this->input->post('link');
			
			if ($tipe=='PR') {
			$tampung['IdPengguna']		= $pengguna;
			}else if($tipe=='TICKET'){
			$tampung['IdPengguna']		= $this->input->post('tunjuk');
			}else{
			$tampung['IdPengguna']		= 0;
			}
			 
			if ($tipe=='REDPEL'|| $tipe=='redpel') {
				$tampung['Status']			= 6;
			}else if($tipe=='PR'){
				$tampung['Status']			= 7;
			}else if($tipe=='TICKET'){
				$tampung['Status']			= 5;
			}else{
				$tampung['Status']			= 1;
			}
			$tampung['PekerjaanDari']	= $pengguna;
			if($tipe=='TICKET'){
				$qcekLevel = $this->db->query("select IdLevel from pengguna where IdPengguna='".$this->input->post('tunjuk')."'");
				foreach ($qcekLevel->result() as $row) {
					$tampung['IdLevel']			= $row->IdLevel;		
				}
			}else{
				$tampung['IdLevel']			= $level;
			}
			$tampung['InputOleh']		= $pengguna;
			$tampung['InputTgl']		= date("Y-m-d H:i:s");
			$tampung['del']				= 0;

			if($level == 1 && $as =='Kadiv'){$query_cek=0;
			}else{ $query_cek = $this->db->get_where('pekerjaan', $cek); }

			if ($query_cek->num_rows() > 0)
			{
				if($tipe=='TICKET'){
					// failed
					$response["value"] = 0;
					$response["message"] = "Data Ticket Sudah Di Input Kan Sebelumnya";
				}else{
					// failed
					$response["value"] = 0;
					$response["message"] = "Data Pekerjaan Sudah Di Input Kan Sebelumnya";
				}
			}
			else
			{
				//bukan redaksi tapi Kadiv
				//redaksi tapi redpel
				if(($level != 1 && ($as == 'Kadiv' || ($as == 'Wakil') ) ) || ($level==1 && $as=='Redpel')){
					$this->db->insert('pekerjaan',$tampung);

					// sukses input pekerjaan
					$response["value"] = 1;
					$response["message"] = "Data Baru Pekerjaan Berhasil Di Input";
				}else{
					// pekerjaan redaksi
					$qRedaksi = $this->db->query("select * from pengguna where IdLevel=1 and `As`='Anggota' and del=0");
					foreach ($qRedaksi->result() as $row) {
						$tampung['Status']		= 2;
						$tampung['IdPengguna']	= $row->IdPengguna;
						for($i=0;$i<3;$i++){
							$this->db->insert('pekerjaan',$tampung);
						}
					}
					// sukses input pekerjaan
					$response["value"] = 1;
					$response["message"] = "Data Baru Pekerjaan REDAKSI Berhasil Di Input";
				}

				if($tipe=='TICKET'){
					// sukses input ticket
					$response["value"]= 1;
					$response["message"] = "Ticket Berhasil Di Buat";
				}
			}
			// echoing JSON response
			echo json_encode($response);
			
			// if($tipe=='REDPEL'||$tipe=='redpel'){
			// 	redirect('pekerjaan');
			// }else if($tipe=='TICKET'){
			// 	redirect('pekerjaan/lihat_ticket');
			// }else{
			// 	redirect('pekerjaan/tunjuk_anggota');	
			// }
		}else{
			// failed
			$response["value"] = 0;
			$response["message"] = "Data Baru Pekerjaan Gagal Di Input, Diinput dari luar aplikasi";
			// echoing JSON response
			echo json_encode($response);
		}
	}

	public function updatePekerjaan(){
		$this->model_security->getsecurity();

		if($this->session->userdata('as') != "Anggota"){
			$tipe = $this->input->post('tipe');

			$cek['IdPekerjaan']			= $this->encryption->decode($this->input->post('id'));
			$tampung['IdPekerjaan']		= $this->encryption->decode($this->input->post('id'));

			$tampung['NamaPekerjaan']	= $this->input->post('nama');
			$tampung['Deskripsi']		= $this->input->post('deskripsi');
			$tampung['TglMulai']		= $this->input->post('sejak');
			$tampung['TglDeadline']		= $this->input->post('sampai');
			$tampung['LinkDrive']		= $this->input->post('link');

			$tampung['UpdateOleh']		= $this->session->userdata('penggunaid');
			$tampung['UpdateTgl']		= date("Y-m-d H:i:s");

			if($tipe=='Lihat_Ticket'){
			$tampung['IdPengguna']		= $this->input->post('tunjuk');
			}

			$query_cek = $this->db->get_where('pekerjaan', $cek);

			if ($query_cek->num_rows() > 0)
			{
				$this->db->update('pekerjaan',$tampung,$cek);
				if($tipe=='Lihat_Ticket'){
				$this->session->set_flashdata('sukses','Data Ticket Berhasil Di Update</strong>');
				}else{
				$this->session->set_flashdata('sukses','Data Pekerjaan Berhasil Di Update</strong>');
				}
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Pekerjaan Gagal Di Update</strong>');
			}

			if($tipe=='Lihat_Pekerjaan'){
			redirect('pekerjaan');
			}else if($tipe=='Tunjuk_Anggota'){
			redirect('pekerjaan/tunjuk_anggota');
			}else if($tipe=='Lihat_Ticket'){
			redirect('pekerjaan/lihat_ticket');
			}
		}else{
			redirect('main/logout');
		}
	}

	public function edit_pekerjaan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('as') != "Anggota"){
			$this->load->library('encryption');

			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Beranda';
			$tampilkan['link_judul']		= 'main/home';
			if($this->uri->segment(4)=='Lihat_Ticket'){
			$tampilkan['sub_judul1']		= 'Ticket';
			$tampilkan['link_sub_judul1']	= '';
			}else{
			$tampilkan['sub_judul1']		= 'Pekerjaan';
			$tampilkan['link_sub_judul1']	= 'pekerjaan';
			}
			if($this->uri->segment(4)=='Tunjuk_Anggota'){
			$tampilkan['sub_judul2']		= 'Tunjuk Anggota';
			$tampilkan['link_sub_judul2']	= 'pekerjaan/tunjuk_anggota';
			$tampilkan['sub_judul3']		= 'Edit Pekerjaan';
			$tampilkan['link_sub_judul3']	= 'pekerjaan/edit_pekerjaan/'.$data;
			}else if($this->uri->segment(4)=='Lihat_Pekerjaan'){
			$tampilkan['sub_judul2']		= 'Lihat Pekerjaan';
			$tampilkan['link_sub_judul2']	= 'pekerjaan/lihat_pekerjaan';
			$tampilkan['sub_judul3']		= 'Edit Pekerjaan';
			$tampilkan['link_sub_judul3']	= 'pekerjaan/edit_pekerjaan/'.$data;
			}else if($this->uri->segment(4)=='Lihat_Ticket'){
			$tampilkan['sub_judul2']		= 'Lihat Ticket';
			$tampilkan['link_sub_judul2']	= 'pekerjaan/lihat_ticket';
			$tampilkan['sub_judul3']		= 'Edit Ticket';
			$tampilkan['link_sub_judul3']	= 'pekerjaan/edit_pekerjaan/'.$get.'Lihat_Ticket';
			}
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'ULTIWORK | Edit Pekerjaan';
			$tampilkan['judul_halaman']		= 'Form Edit Pekerjaan';
			$tampilkan['content']			= "pekerjaan/edit_pekerjaan";
			$tampilkan['active']			= "pekerjaan";
			$tampilkan['validation']		= "yes";
			$tampilkan['select2']			= "yes";
			$tampilkan['datepicker']		= "yes";

			
			if($this->uri->segment(4)=='Lihat_Ticket'){
			//$this->db->where('id', $data);
			$query = $this->db->query("SELECT
										pengguna.NamaLengkap,
										pekerjaan.IdPekerjaan,
										pekerjaan.NamaPekerjaan,
										pekerjaan.Deskripsi,
										pekerjaan.TglMulai,
										pekerjaan.TglDeadline,
										pekerjaan.LinkDrive,
										pekerjaan.IdPengguna,
										pengguna.`As`,
										`level`.NamaLevel,
										pengguna.IdLevel
										FROM
										pekerjaan
										INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
										INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
										WHERE pekerjaan.IdPekerjaan = $data");

			$tampilkan['dataPemimpin'] 	= $this->db->query("SELECT
															pengguna.IdPengguna,
															pengguna.NamaLengkap,
															pengguna.`As`,
															`level`.NamaLevel
															FROM
															pengguna
															INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
															WHERE pengguna.`As` != 'Anggota'
															");

			}else{
			//$this->db->where('id', $data);
			$query = $this->db->query("SELECT
										pekerjaan.IdPekerjaan,
										pekerjaan.NamaPekerjaan,
										pekerjaan.Deskripsi,
										pekerjaan.TglMulai,
										pekerjaan.TglDeadline,
										pekerjaan.LinkDrive
										FROM
										pekerjaan
										WHERE pekerjaan.IdPekerjaan = $data");
			}

			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']		= $this->encryption->encode($row->IdPekerjaan);
					$tampilkan['nama']		= $row->NamaPekerjaan;
					$tampilkan['deskripsi']	= $row->Deskripsi;
					$tampilkan['sejak']		= $row->TglMulai;
					$tampilkan['sampai']	= $row->TglDeadline;
					$tampilkan['link']		= $row->LinkDrive;
					if($this->uri->segment(4)=='Lihat_Ticket'){
					$tampilkan['namalengkap']			= $row->NamaLengkap;
					$tampilkan['dataidpengguna']		= $row->IdPengguna;
						
						if($row->As=='Kadiv'&&$row->IdLevel==6){
                            $as='Pemimpin Umum';
                        }else if($row->As=='Wakil'&&$row->NamaLevel==6){
                            $as='Wakil PU';
                        }else if($row->As=='Sekretaris'&&$row->NamaLevel==6){
                            $as='Sekretaris';
                        }else if($row->As=='Bendahara'&&$row->NamaLevel==6){
                            $as='Bendahara';
                        }else if($row->As=='Redpel'&&$row->NamaLevel==1){
                            $as='Redaktur Pelaksana Redaksi';
                        }else{
                            $as='Pemimpin '.$row->NamaLevel;
                        }
					
					$tampilkan['as'] = $as;
					}
					
				}
			}
			else
			{
					$tampilkan['id']		= '';
					$tampilkan['nama']		= '';
					$tampilkan['deskripsi']	= '';
					$tampilkan['sejak']		= '';
					$tampilkan['sampai']	= '';
					$tampilkan['link']		= '';


					if($this->uri->segment(4)=='Lihat_Ticket'){
					$tampilkan['namalengkap']			= '';
					$tampilkan['dataidpengguna']		= '';
					
					$tampilkan['as'] = '';
					}
					
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('main/logout');
		}
	}

	public function tunjuk_anggota(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') != "" and $this->session->userdata('as') != 'Anggota'){

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Pekerjaan';
			$data['link_sub_judul1']	= 'pekerjaan';
			$data['sub_judul2']			= 'Tunjuk Anggota';
			$data['link_sub_judul2']	= 'pekerjaan/tunjuk_anggota';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Tunjuk Anggota';
			$data['judul_halaman']		= 'Tunjuk Anggota';
			$data['content']			= "pekerjaan/tunjuk_anggota";
			$data['active']				= "pekerjaan";
			
			$data['datatable']			= "yes";

			$data['dataPekerjaan']		= $this->db->query("SELECT
															`level`.NamaLevel,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel where pekerjaan.IdLevel='".$this->session->userdata('level')."' and pekerjaan.IdPengguna='0' and pekerjaan.Status=1 and pekerjaan.del=0");
			$data['dataDivisi']			= $this->db->query("SELECT * FROM pengguna WHERE IdLevel='".$this->session->userdata('level')."' and del=0;");
			

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/login');
		}
	}

	public function tunjuk_anggota_m(){
		// 3 = level
		// 4 = as

		if($this->uri->segment(3) != "" and $this->uri->segment(4) != 'Anggota'){
			$query = $this->db->query("SELECT
															`level`.NamaLevel,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel where pekerjaan.IdLevel='".$this->uri->segment(3)."' and pekerjaan.IdPengguna='0' and pekerjaan.Status=1 and pekerjaan.del=0");
			if($query->num_rows() > 0){
				$data['dataPekerjaan']		= $query->result();
			}else{
				$data['dataPekerjaan']		= 0;
			}
			$query = $this->db->query("SELECT * FROM pengguna WHERE IdLevel='".$this->uri->segment(3)."' and del=0;");
			
			if($query->num_rows() > 0){
				$data['dataDivisi']			=  $query->result();
			}else{
				$data['dataDivisi']			=  0;
			}

			echo json_encode($data);
		}else{
			$response["value"] = 0;
			$response["message"] = "Anda belum login";
			echo json_encode($response);
		}
	}

	public function getTunjuk()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('as')!='Anggota'){

			$cek['IdPekerjaan']			= $this->encryption->decode($this->input->post('id'));

			$tampung['IdPengguna']		= $this->input->post('nama');

			$query_cek = $this->db->get_where('pekerjaan', $cek);

			if ($query_cek->num_rows() > 0)
			{
				$this->db->update('pekerjaan',$tampung,$cek);
				$this->session->set_flashdata('sukses','Berhasil Menunjuk Anggota</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Gagal Menunjuk Anggota</strong>');
			}

			redirect('pekerjaan');
		}else{
			redirect('main/logout');
		}
	}

	public function ambil()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level')!=''){
			$stat = $this->encryption->decode($this->uri->segment(4));
			$cek['IdPekerjaan']			= $this->encryption->decode($this->uri->segment(3));
			//jika pekerjaan nya ini rebutan
			if($stat==6){
			$cek['IdPengguna']			= 0;
			$cek['Status']				= 6;
			$tampung['Status']		= 1;
			$tampung['IdPengguna']	= $this->session->userdata('penggunaid');
			//jika ini ticket
			}else if($stat==5){
			$cek['IdPengguna']			= $this->session->userdata('penggunaid');
			$cek['Status']				= 5;
			$tampung['Status']			= 8;
			}else{
			$cek['IdPengguna']			= $this->session->userdata('penggunaid');
			$cek['Status']				= 1;
			$tampung['Status']		= 2;
			}

			$query_cek = $this->db->get_where('pekerjaan', $cek);

			if ($query_cek->num_rows() > 0)
			{
				$this->db->update('pekerjaan',$tampung,$cek);
				$this->session->set_flashdata('sukses','Berhasil Ubah Status menjadi Dikerjakan</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Gagal Ubah Status menjadi Dikerjakan</strong>');
			}

			if($stat==6){
				redirect('pekerjaan');
			}else if($stat==5){
				redirect('pekerjaan/lihat_ticket');
			}else{
				redirect('pekerjaan/progress');	
			}
		}else{
			redirect('main/logout');
		}
	}

	public function updatestatus()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level')!=''){

			$cek['IdPekerjaan']	= $this->encryption->decode($this->input->post('id'));
			$cek['Status']		= $this->input->post('status');
			$cek['Judul']		= $this->input->post('judul');
			$cek['Deskripsi']	= $this->input->post('deskripsi');
			$cek['InputOleh']	= $this->session->userdata('level');
			$cek['InputTgl']	= date("Y-m-d");

			$tampung['IdPekerjaan']	= $this->encryption->decode($this->input->post('id'));
			$tampung['Status']		= $this->input->post('status');
			$tampung['Judul']		= $this->input->post('judul');
			$tampung['Deskripsi']	= $this->input->post('deskripsi');
			$tampung['InputOleh']	= $this->session->userdata('penggunaid');
			$tampung['InputTgl']	= date("Y-m-d H:i:s");
			$tampung['del']			= 0;

			$cek1['IdPekerjaan']	= $this->encryption->decode($this->input->post('id'));
			if($this->input->post('status')==0){
				$tampung1['Status']		= 4;
			}else{
				$tampung1['Status']		= $this->input->post('status');
			}

			$query_cek = $this->db->get_where('detailpekerjaan', $cek);

			if ($query_cek->num_rows==0)
			{
				$this->db->insert('detailpekerjaan',$tampung);

				$query_cek1 = $this->db->get_where('pekerjaan', $cek1);
				if ($query_cek1->num_rows() > 0){ $this->db->update('pekerjaan',$tampung1,$cek1);}

				if($this->input->post('status')==0){
				$this->session->set_flashdata('sukses','Berhasil Ubah Status menjadi Selesai</strong>');
				}else if($this->input->post('status')==4){
				$this->session->set_flashdata('sukses','Berhasil Ubah Status menjadi Revisi</strong>');	
				}else if($this->input->post('status')==3){
				$this->session->set_flashdata('sukses','Berhasil Ubah Status menjadi Asistensi</strong>');	
				}else{
				$this->session->set_flashdata('sukses','Berhasil Ubah Status menjadi Dikerjakan</strong>');	
				}
			}
			else
			{
				if($this->input->post('status')==0){
				$this->session->set_flashdata('gagal','Gagal Ubah Status menjadi Selesai</strong>');
				}else if($this->input->post('status')==4){
				$this->session->set_flashdata('gagal','Gagal Ubah Status menjadi Revisi</strong>');
				}else if($this->input->post('status')==3){
				$this->session->set_flashdata('gagal','Gagal Ubah Status menjadi Asistensi</strong>');
				}else{
				$this->session->set_flashdata('gagal','Gagal Ubah Status menjadi Dikerjakan</strong>');
				}
				
			}

			redirect('pekerjaan/detail_pekerjaan/'.$this->input->post('id'));
		}else{
			redirect('main/logout');
		}
	}

	public function selesai()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level')!=''){
			$stat = $this->encryption->decode($this->uri->segment(4));

			$cek['IdPekerjaan']		= $this->encryption->decode($this->uri->segment(3));
			$cek['IdPengguna']		= $this->session->userdata('penggunaid');
			if($stat==8){
			$cek['Status']			= 8;
			$tampung['Status']		= 9;
			}else{
			$tampung['Status']		= 0;
			}

			$query_cek = $this->db->get_where('pekerjaan', $cek);

			if ($query_cek->num_rows() > 0)
			{
				$this->db->update('pekerjaan',$tampung,$cek);
				$this->session->set_flashdata('sukses','Berhasil Ubah Status menjadi Selesai</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Gagal Ubah Status menjadi Selesai</strong>');
			}

			if($stat==8){
			redirect('pekerjaan/lihat_ticket');
			}else{
			redirect('pekerjaan/progress');
			}
		}else{
			redirect('main/logout');
		}
	}



	public function detail_pekerjaan(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "3" || $this->session->userdata('level') == "7" || ($this->session->userdata('level') == 6 && ($this->session->userdata('as')=='Kadiv')||$this->session->userdata('as')=='Wakil')){

			$idx=$this->uri->segment('3');
			$id=$this->encryption->decode($idx);

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Pekerjaan';
			$data['link_sub_judul1']	= 'pekerjaan';
			if($this->uri->segment('4')=='Histori'){
			$data['sub_judul2']			= 'Histori Pekerjaan';
			$data['link_sub_judul2']	= 'pekerjaan/histori_pekerjaan';
			$data['sub_judul3']			= 'Detail Pekerjaan';
			$data['link_sub_judul3']	= 'pekerjaan/detail_pekerjaan/'.$idx.'/Histori';
			}else if($this->uri->segment('4')=='Histori_Pekerjaan_Divisi'){
			$data['sub_judul2']			= 'Histori Pekerjaan Divisi';
			$data['link_sub_judul2']	= 'pekerjaan/histori_pekerjaan_divisi';
			$data['sub_judul3']			= 'Detail Pekerjaan';
			$data['link_sub_judul3']	= 'pekerjaan/detail_pekerjaan/'.$idx.'/Histori_Pekerjaan_Divisi';
			}else{
			$data['sub_judul2']			= 'Progress';
			$data['link_sub_judul2']	= 'pekerjaan/progress';
			$data['sub_judul3']			= 'Detail Pekerjaan';
			$data['link_sub_judul3']	= 'pekerjaan/detail_pekerjaan/'.$idx;
			}
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Detail Pekerjaan';
			$data['judul_halaman']		= 'Detail Pekerjaan';
			$data['content']			= "pekerjaan/detail_pekerjaan";
			$data['active']				= "pekerjaan";
			
			$data['datatable']			= "yes";

			$countDet = $this->db->query("select count(IdPekerjaan) as c from detailpekerjaan where IdPekerjaan='".$id."'");
			foreach ($countDet->result() as $row) {
				$data['hasilCount'] = $row->c;
			}
			$data['dataPekerjaan']		= $this->db->query("SELECT
															detailpekerjaan.IdDetPekerjaan,
															detailpekerjaan.IdPekerjaan,
															detailpekerjaan.Judul,
															detailpekerjaan.Deskripsi,
															detailpekerjaan.Status,
															detailpekerjaan.InputOleh,
															detailpekerjaan.InputTgl,
															detailpekerjaan.UpdateOleh,
															detailpekerjaan.UpdateTgl,
															detailpekerjaan.del,
															pekerjaan.NamaPekerjaan,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdPengguna,
															pekerjaan.Status as pStatus,
															pengguna.NamaLengkap,
															pengguna.`As`
															FROM
															detailpekerjaan
															INNER JOIN pekerjaan ON detailpekerjaan.IdPekerjaan = pekerjaan.IdPekerjaan
															INNER JOIN pengguna ON detailpekerjaan.InputOleh = pengguna.IdPengguna
															WHERE detailpekerjaan.IdPekerjaan='".$id."'
															ORDER BY detailpekerjaan.InputTgl DESC, detailpekerjaan.IdDetPekerjaan DESC
															");
			

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/logout');
		}
	}

	public function histori_pekerjaan_divisi(){
		$this->model_security->getsecurity();

		if(($this->session->userdata('level') == 6 && ($this->session->userdata('as')=='Kadiv')||$this->session->userdata('as')=='Wakil') || $this->session->userdata('level') == 7){

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Pekerjaan';
			$data['link_sub_judul1']	= 'pekerjaan';
			$data['sub_judul2']			= 'Histori Pekerjaan Divisi';
			$data['link_sub_judul2']	= 'pekerjaan/histori_pekerjaan_divisi';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Histori Pekerjaan Divisi';
			$data['judul_halaman']		= 'Histori Pekerjaan Divisi';
			$data['content']			= "pekerjaan/histori_pekerjaan_divisi";
			$data['active']				= "pekerjaan";
			
			$data['datatable']			= "yes";

			// PEKERJAAN DIVISI REDAKSI
			$data['dataRedaksi']		= $this->db->query("SELECT
														pengguna.NamaLengkap,
														`level`.NamaLevel,
														pengguna.`As`,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel
														where pekerjaan.IdLevel=1 and pekerjaan.del=0");

			// PEKERJAAN DIVISI FOTOGRAFER
			$data['dataFotografer']		= $this->db->query("SELECT
														pengguna.NamaLengkap,
														`level`.NamaLevel,
														pengguna.`As`,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel
														where pekerjaan.IdLevel=2 and pekerjaan.del=0");

			// PEKERJAAN DIVISI VISUAL
			$data['dataVisual']			= $this->db->query("SELECT
														pengguna.NamaLengkap,
														`level`.NamaLevel,
														pengguna.`As`,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel
														where pekerjaan.IdLevel=3 and pekerjaan.del=0");

			// PEKERJAAN DIVISI IT
			$data['dataIT']				= $this->db->query("SELECT
														pengguna.NamaLengkap,
														`level`.NamaLevel,
														pengguna.`As`,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel
														where pekerjaan.IdLevel=4 and pekerjaan.del=0");

			// PEKERJAAN DIVISI PERUSAHAAN
			$data['dataPerusahaan']		= $this->db->query("SELECT
														pengguna.NamaLengkap,
														`level`.NamaLevel,
														pengguna.`As`,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel
														where pekerjaan.IdLevel=5 and pekerjaan.del=0");

			// PEKERJAAN DIVISI BPH
			$data['dataBPH']			= $this->db->query("SELECT
														pengguna.NamaLengkap,
														`level`.NamaLevel,
														pengguna.`As`,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel
														where pekerjaan.IdLevel=6 and pekerjaan.del=0");

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/logout');
		}
	}

	public function histori_pekerjaan(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') != ""){

			$data['judul']				= 'Beranda';
			$data['link_judul']			= 'main/home';
			$data['sub_judul1']			= 'Pekerjaan';
			$data['link_sub_judul1']	= 'pekerjaan';
			$data['sub_judul2']			= 'Histori Pekerjaan';
			$data['link_sub_judul2']	= 'pekerjaan/histori_pekerjaan';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'ULTIWORK | Histori Pekerjaan';
			$data['judul_halaman']		= 'Histori Pekerjaan';
			$data['content']			= "pekerjaan/histori_pekerjaaan";
			$data['active']				= "pekerjaan";
			
			$data['datatable']			= "yes";

			// ini buat nampilin job dia personal
			$data['dataPekerjaan']		= $this->db->query("SELECT
															pengguna.NamaLengkap,
															`level`.NamaLevel,
															pengguna.`As`,
															pekerjaan.IdPekerjaan,
															pekerjaan.NamaPekerjaan,
															pekerjaan.Deskripsi,
															pekerjaan.TglMulai,
															pekerjaan.TglDeadline,
															pekerjaan.LinkDrive,
															pekerjaan.IdPengguna,
															pekerjaan.`Status`,
															pekerjaan.PekerjaanDari,
															pekerjaan.IdLevel,
															pekerjaan.InputOleh,
															pekerjaan.InputTgl,
															pekerjaan.UpdateOleh,
															pekerjaan.UpdateTgl,
															pekerjaan.del
															FROM
															pekerjaan
															INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
															INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
															where pekerjaan.IdLevel='".$this->session->userdata('level')."' 
															and pekerjaan.IdPengguna='".$this->session->userdata('penggunaid')."' 
															and pekerjaan.Status=0");

			if($this->session->userdata('as') != "Anggota"){
			// ini buat nampilin job dari divisi nya (anak2nya)
			$data['dataDivisi']		= $this->db->query("SELECT
														pengguna.NamaLengkap,
														`level`.NamaLevel,
														pengguna.`As`,
														pekerjaan.IdPekerjaan,
														pekerjaan.NamaPekerjaan,
														pekerjaan.Deskripsi,
														pekerjaan.TglMulai,
														pekerjaan.TglDeadline,
														pekerjaan.LinkDrive,
														pekerjaan.IdPengguna,
														pekerjaan.`Status`,
														pekerjaan.PekerjaanDari,
														pekerjaan.IdLevel,
														pekerjaan.InputOleh,
														pekerjaan.InputTgl,
														pekerjaan.UpdateOleh,
														pekerjaan.UpdateTgl,
														pekerjaan.del
														FROM
														pekerjaan
														INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
														INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel
														where pekerjaan.IdLevel='".$this->session->userdata('level')."'
														and pekerjaan.IdPengguna != '".$this->session->userdata('penggunaid')."' 
														and pekerjaan.Status=0");
			}
			

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('main/logout');
		}
	}

	public function histori_pekerjaan_m(){

		// 3 = level
		// 4 = as
		// 5 = penggunaid


		if($this->uri->segment(3) != ""){

			// ini buat nampilin job dia personal
			$query		= $this->db->query("SELECT
											pengguna.NamaLengkap,
											`level`.NamaLevel,
											pengguna.`As`,
											pekerjaan.IdPekerjaan,
											pekerjaan.NamaPekerjaan,
											pekerjaan.Deskripsi,
											pekerjaan.TglMulai,
											pekerjaan.TglDeadline,
											pekerjaan.LinkDrive,
											pekerjaan.IdPengguna,
											pekerjaan.`Status`,
											pekerjaan.PekerjaanDari,
											pekerjaan.IdLevel,
											pekerjaan.InputOleh,
											pekerjaan.InputTgl,
											pekerjaan.UpdateOleh,
											pekerjaan.UpdateTgl,
											pekerjaan.del
											FROM
											pekerjaan
											INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
											INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel 
											where pekerjaan.IdLevel='".$this->uri->segment(3)."' 
											and pekerjaan.IdPengguna='".$this->uri->segment(5)."' 
											and pekerjaan.Status=0");

			if($query->num_rows() > 0){
				$data['dataPekerjaan']		= $query->result();
			}else{
				$data['dataPekerjaan']		= 0;
			}

			if($this->uri->segment(4) != "Anggota"){
			// ini buat nampilin job dari divisi nya (anak2nya)
				$query		= $this->db->query("SELECT
												pengguna.NamaLengkap,
												`level`.NamaLevel,
												pengguna.`As`,
												pekerjaan.IdPekerjaan,
												pekerjaan.NamaPekerjaan,
												pekerjaan.Deskripsi,
												pekerjaan.TglMulai,
												pekerjaan.TglDeadline,
												pekerjaan.LinkDrive,
												pekerjaan.IdPengguna,
												pekerjaan.`Status`,
												pekerjaan.PekerjaanDari,
												pekerjaan.IdLevel,
												pekerjaan.InputOleh,
												pekerjaan.InputTgl,
												pekerjaan.UpdateOleh,
												pekerjaan.UpdateTgl,
												pekerjaan.del
												FROM
												pekerjaan
												INNER JOIN pengguna ON pekerjaan.IdPengguna = pengguna.IdPengguna
												INNER JOIN `level` ON pekerjaan.IdLevel = `level`.IdLevel
												where pekerjaan.IdLevel='".$this->uri->segment(3)."'
												and pekerjaan.IdPengguna != '".$this->uri->segment(5)."' 
												and pekerjaan.Status=0");
				if($query->num_rows() > 0){
					$data['dataDivisi']		= $query->result();
				}else{
					$data['dataDivisi']		= 0;
				}
			}
			$data["value"] = 1;
			$data["message"] = "Data berhasil di ambil";
		}else{
			$response["value"] = 0;
			$response["message"] = "Anda belum login";
		}
		echo json_encode($data);
	}

	public function hapus_pekerjaan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('as') != "Anggota"){
			$this->load->library('encryption');

			$logkategori 	 = "Hapus Pekerjaan";
			$logketerPngan 	 = "User melakukan hapus pekerjaan";
			$this->model_security->log($logkategori,$logketerangan);

			$get = $this->uri->segment(3);
			$cek['IdPekerjaan']		= $this->encryption->decode($get);
			$tampung['del']			= 0;
			$tampung['UpdateOleh']	= $this->session->userdata('penggunaid');
			$tampung['UpdateTgl']	= date("Y-m-d H:i:s");
			
			//$this->db->where('IdPekerjaan', $data);
			$query = $this->db->get_where('pekerjaan', $cek);
			if($query->num_rows() > 0){
				
				$this->db->update('pekerjaan',$tampung,$cek);
				//$this->db->query("update pekerjaan set del=1 where IdPekerjaan='$data'");
				$this->session->set_flashdata('sukses','Hapus Data Pekerjaan Sukses</strong>');
				if($this->uri->segment(4)=='Tunjuk_Anggota'){
					redirect('pekerjaan/tunjuk_anggota');
				}else{
					redirect('pekerjaan');
				}
			}
			else
			{
				$this->session->set_flashdata('gagal','Hapus Data Pekerjaan Gagal</strong>');
				if($this->uri->segment(4)=='Tunjuk_Anggota'){
					redirect('pekerjaan/tunjuk_anggota');
				}else if($this->uri->segment(4)=='PR'){
					redirect('pekerjaan/lihat_pekerjaan_pr');
				}else if($this->uri->segment(4)=='Lihat_Ticket'){
					redirect('pekerjaan/lihat_ticket');
				}else{
					redirect('pekerjaan');
				}
			}
		}else{
			redirect('main/logout');
		}
	}

}