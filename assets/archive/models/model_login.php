<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_model { 

	public function getLoginPIy($user,$pass)
	{
		$pwd = md5($pass);

		$this->db->where('username',$user);
		$this->db->where('password',$pwd);

		$query = $this->db->get('petugas');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row)
			{
				$date = date('Y-m-d H:i:s');
				$this->db->query("UPDATE petugas SET lastlogin='".$date."', status='1' WHERE petugasid='".$row->petugasid."'");
				$sess = array('username' => $row->username,
							  'password' => $row->password,
							  'nama' => $row->nmpetugas,
							  'level' => $row->level,
							  'petugasid' => $row->petugasid
						);

				$this->session->set_userdata($sess);
				redirect('v1/dashboard');
			}
		}
		else
		{
			$this->session->set_flashdata('info','maaf username atau password salah');
			redirect('v1');
		}

	}

	public function inertterimabarang($data,$count) {
	    for($i=1;$i<=$count;$i++) {
	       $this->db->insert('detailkonfirmasipo', $data[$i]);
	    }
	    return $this->db->insert_id();
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */