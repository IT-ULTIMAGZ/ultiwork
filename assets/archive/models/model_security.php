<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_security extends CI_model {

	public function getsecurity()
	{
		$username = $this->session->userdata('username');
		if(empty($username))
		{
			$this->session->sess_destroy();
			redirect('v1');
		}
	}

	public function showdatasum1($data){
		$sql = $this->db->query("SELECT
								SUM(detailkonfirmasipo.jmlditerima) AS jmlditerima
								FROM
								detailkonfirmasipo
								WHERE fakturpo = '$data'");
		return $sql;
	}

	public function showdatasum2($data){
		$sql = $this->db->query("SELECT
								SUM(detailkonfirmasipo.total) AS total
								FROM
								detailkonfirmasipo
								WHERE fakturpo = '$data'");
		return $sql;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */