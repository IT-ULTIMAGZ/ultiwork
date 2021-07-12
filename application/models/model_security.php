<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_security extends CI_model {

	public function getsecurity()
	{
		$username = $this->session->userdata('username');
		if(empty($username))
		{
			$this->session->sess_destroy();
			redirect('main');
		}
	}

  public function log($a,$b){
      $data['Kategori']     = $a;
      $data['Keterangan']   = $b;
      $data['InputOleh']    = $this->session->userdata('penggunaid');
      $data['InputTgl']     = date("Y-m-d h:i:s");
      $data['UpdateOleh']   = '';
      $data['UpdateTgl']    = '';  
      $data['del']          = 0;

      $this->db->insert('log',$data);
  }

  public function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


}