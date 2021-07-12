<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_model { 

	public function getLoginPIy($user,$pass)
	{
		$pwd = md5($pass);

		//$this->db->where('pengguna.Login',$user);
		//$this->db->where('pengguna.Sandi',$pwd);
		//$this->db->where('pengguna.del', 0);

		$query = $this->db->query("SELECT
									pengguna.IdPengguna,
									pengguna.IdLevel,
									pengguna.`As`,
									pengguna.NamaLengkap,
									pengguna.NIM,
									pengguna.Email,
									pengguna.TmpLahir,
									pengguna.TglLahir,
									pengguna.LP,
									pengguna.Telepon,
									pengguna.Login,
									pengguna.Sandi,
									pengguna.del,
									`level`.NamaLevel
									FROM
									pengguna
									INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
									WHERE pengguna.Login='".$user."' AND pengguna.Sandi='".$pwd."' AND pengguna.del=0
									");	
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				//($row->IdLevel==7 && ($this->model_security->get_client_ip() == '125.161.139.249' || $this->model_security->get_client_ip() == '120.188.32.182' || $this->model_security->get_client_ip() == '::1'))|| 
				if($row->IdLevel<8){
					$sess = array('username' => $row->Login,
								  'password' => $row->Sandi,
								  'nama' => $row->NamaLengkap,
								  'telp' => $row->Telepon,
								  'jk' => $row->LP,
								  'level' => $row->IdLevel,
								  'penggunaid' => $row->IdPengguna,
								  'as' => $row->As,
								  'namalevel' => $row->NamaLevel
							);

					$this->session->set_userdata($sess);

					if($row->NamaLengkap == "" || $row->Telepon == "" || $row->LP == "" || $row->NIM == "" || $row->Email == "" || $row->TmpLahir == "" || $row->TglLahir == ""){
						
							$id=$row->ID;
							redirect('main/editprofil/'.$this->encryption->encode($id));
						
					}else{
						redirect('main/home');
					}
				}
			}
		}
		else
		{
			$this->session->set_flashdata('info','username atau password yang anda masukkan salah');
			redirect('main');
		}

	}

	public function getLoginPIy_m($user,$pass){
		$pwd = md5($pass);

		//$this->db->where('pengguna.Login',$user);
		//$this->db->where('pengguna.Sandi',$pwd);
		//$this->db->where('pengguna.del', 0);

		$query = $this->db->query("SELECT
									pengguna.IdPengguna,
									pengguna.IdLevel,
									pengguna.`As`,
									pengguna.NamaLengkap,
									pengguna.NIM,
									pengguna.Email,
									pengguna.TmpLahir,
									pengguna.TglLahir,
									pengguna.LP,
									pengguna.Telepon,
									pengguna.Login,
									pengguna.Sandi,
									pengguna.del,
									`level`.NamaLevel
									FROM
									pengguna
									INNER JOIN `level` ON pengguna.IdLevel = `level`.IdLevel
									WHERE pengguna.Login='".$user."' AND pengguna.Sandi='".$pwd."' AND pengguna.del=0
									");	
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				//($row->IdLevel==7 && ($this->model_security->get_client_ip() == '125.161.139.249' || $this->model_security->get_client_ip() == '120.188.32.182' || $this->model_security->get_client_ip() == '::1'))|| 
				if($row->IdLevel<8){
					
					// sukses login

					$response['success'] = 1;
					$response['sess_username'] = $row->Login;
					$response['sess_password'] = $row->Sandi;
					$response['sess_nama'] 		= $row->NamaLengkap;
					$response['sess_telp'] 		= $row->Telepon;
					$response['sess_jk'] 		= $row->LP;
					$response['sess_level'] 	= $row->IdLevel;
					$response['sess_pengguna'] 	= $row->IdPengguna;
					$response['sess_as'] 		= $row->As;
					$response['sess_namalevel'] = $row->NamaLevel;

					$response['message'] = "Berhasil Login";

					// echoing JSON response
					echo json_encode($response);
				}
			}
		}
		else
		{
			// gagal login
			$response['success'] = 0;
			$response['message'] = "username atau password yang anda masukkan salah";

			// echoing JSON response
			echo json_encode($response);
		}
	}

}