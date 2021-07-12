<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class V1 extends CI_Controller {

	public function index()
	{
		$this->load->view('login_administrator');
	}
	public function tes(){
		$this->load->view('pembelian/v');
	}

	public function dashboard(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
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

			$data['this_tittle']		= 'Inventory | Dashboard';
			$data['judul_halaman']		= 'Dashboard';
			$data['content']			= "home";
			$data['active']				= "dashboard";
			$data['homey']				= "yes";
			//$data['moris']				= "yes";
			//$data['sweetalert']			= "yes";
			//$data['datatable']			= "yes";
			$data['datepicker']			= "yes";

			$dari 	= date('Y-m-d') . " 00:00:00";
			$sampai	= date('Y-m-d') . " 23:59:59";

			/*$data['getpenjualan']		= $this->db->query("select count(penjualanid) as penjualan from penjualan");
			$data['getpembelian']		= $this->db->query("select count(kodepembelian) as pembelian from pembelian");
			$data['getuser']			= $this->db->query("select count(petugasid) as users from petugas");
			$data['getitem']			= $this->db->query("select count(itemid) as items from item");*/
			$data['sumdaymasuk']		= $this->db->query("SELECT SUM(jmlditerima) AS hitung FROM detailkonfirmasipo WHERE ( detailkonfirmasipo.datetime BETWEEN '".$dari."' AND '".$sampai."' )");
			$data['sumdaykeluar']		= $this->db->query("SELECT SUM(jumlah) AS hitung FROM penjualan WHERE ( penjualan.datetime BETWEEN '".$dari."' AND '".$sampai."' )");
			$data['sumprofit']		 	= $this->db->query("SELECT
															SUM(penjualan.hargajual - (item.hargabeli*penjualan.jumlah)) AS hitung
															FROM
															detailpenjualan
															INNER JOIN item ON detailpenjualan.itemid = item.itemid
															INNER JOIN penjualan ON detailpenjualan.penjualanid = penjualan.penjualanid
															WHERE ( penjualan.datetime BETWEEN '".$dari."' AND '".$sampai."' )
															");
			$data['summonthmasuk']		= $this->db->query("SELECT SUM(jmlditerima) AS hitung FROM detailkonfirmasipo WHERE detailkonfirmasipo.datetime LIKE '%".date('Y-m')."%'");
			$data['summonthkeluar']		= $this->db->query("SELECT SUM(jumlah) AS hitung FROM penjualan WHERE penjualan.datetime LIKE '%".date('Y-m')."%'");
			$data['sumprofitmonth']	 	= $this->db->query("SELECT
															SUM(penjualan.hargajual - (item.hargabeli*penjualan.jumlah)) AS hitung
															FROM
															detailpenjualan
															INNER JOIN item ON detailpenjualan.itemid = item.itemid
															INNER JOIN penjualan ON detailpenjualan.penjualanid = penjualan.penjualanid
															WHERE penjualan.datetime LIKE '%".date('Y-m')."%'
															");

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/login');
		}
	}

	public function profil(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Profil';
			$data['link_sub_judul1']	= 'v1/profil';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Profil';
			$data['judul_halaman']		= 'Profil';
			$data['content']			= "view_profil";
			$data['active']				= "";

			$id = $this->session->userdata('petugasid');
			$this->db->where('petugasid', $id);
			$query = $this->db->get('petugas');
			foreach ($query->result() as $row) {
				$data['id']		 		= $row->petugasid;
				$data['nama']		 	= $row->nmpetugas;
				$data['jk']		 		= $row->jk;
				$data['alamat']		 	= $row->almtpetugas;
				$data['telp']		 	= $row->telppetugas;
				$data['username']	 	= $row->username;
				$data['password']	 	= $row->password;
				$data['lastlogin']		= $row->lastlogin;	
			}

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/login');
		}
	}

	public function editprofil()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data	= $this->session->userdata('petugasid');

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Profil';
			$tampilkan['link_sub_judul1']	= 'v1/profil';
			$tampilkan['sub_judul2']		= 'Edit';
			$tampilkan['link_sub_judul2']	= 'v1/editprofil/'.$data;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | Profil';
			$tampilkan['judul_halaman']		= 'Form Edit Profil';
			$tampilkan['content']			= "edit_profil";
			$tampilkan['active']			= "";
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
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	public function editpassword()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data	= $this->session->userdata('petugasid');

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Profil';
			$tampilkan['link_sub_judul1']	= 'v1/profil';
			$tampilkan['sub_judul2']		= 'Edit Password';
			$tampilkan['link_sub_judul2']	= 'v1/editpassword/'.$data;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | Profil';
			$tampilkan['content']			= "edit_password";
			$tampilkan['active']			= "";
			$tampilkan['validation']		= "yes";



			$this->db->where('petugasid', $data);
			$query = $this->db->get('petugas');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['judul_halaman']		= 'Form Edit Password ('.$row->nmpetugas.')';
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

	public function updateprofil()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$cek['petugasid']			= $this->input->post('id');
			$tampung['nmpetugas']		= $this->input->post('nama');
			$tampung['jk']				= $this->input->post('jk');
			$tampung['almtpetugas']		= $this->input->post('alamat');
			$tampung['telppetugas']		= $this->input->post('notelp');
			$tampung['username']		= $this->input->post('username');

			$query_cek = $this->db->get_where('petugas', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('petugas',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data Profil Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('v1/profil');
		}else{
			redirect('v1/logout');
		}
	}
	public function updatepassword()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$cek['petugasid']			= $this->input->post('id');
			$tampung['password']		= md5($this->input->post('password'));

			$query_cek = $this->db->get_where('petugas', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('petugas',$tampung,$cek);
				$this->session->set_flashdata('sukses','Password Profil Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('v1/profil');
		}else{
			redirect('v1/logout');
		}
	}

	public function rekap()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Rekap';
			$data['link_sub_judul1']	= 'v1/rekap';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Penjualan';
			$data['judul_halaman']		= 'Penjualan';
			$data['content']			= "Penjualan/rekap_penjualan";
			$data['active']				= "Penjualan";
			$data['datepicker']			= "yes";

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function getrekap()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Penjualan';
			$data['link_sub_judul1']	= 'penjualan';
			$data['sub_judul2']			= 'Rekap';
			$data['link_sub_judul2']	= 'penjualan/rekap';
			$data['sub_judul3']			= 'Hasil Rekap';
			$data['link_sub_judul3']	= 'penjualan/getrekap?start='.$this->input->get('start').'&end='.$this->input->get('end');
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Penjualan';
			$data['judul_halaman']		= 'Penjualan';
			$data['content']			= "penjualan/rekap_penjualan";
			$data['active']				= "penjualan";
			$data['datatable']			= "yes";
			$data['getrekap']			= "yes";

			$dari 	= $this->input->get('start') . " 00:00:00";
			$sampai	= $this->input->get('end')  . " 23:59:59";
			$data['datapenjualan']		= $this->db->query("SELECT
															penjualan.penjualanid,
															penjualan.hargajual,
															pembelian.kodepembelian,
															item.itemid,
															item.category,
															item.size,
															penjualan.jumlah,
															pembelian.harga,
															penjualan.datetime,
															petugas.nmpetugas
															FROM
															penjualan
															INNER JOIN pembelian ON penjualan.kodepembelian = pembelian.kodepembelian
															INNER JOIN item ON pembelian.itemid = item.itemid
															INNER JOIN petugas ON penjualan.petugasid = petugas.petugasid
															WHERE ( penjualan.datetime BETWEEN '".$dari."' AND '".$sampai."' )
															");

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	private function _gen_pdff($html,$paper='A4-L')
	{
		//ob_end_clean();
		$this->load->library('MPDF56/mpdf');
		$mpdf=new mPDF('utf-8', $paper );
		$mpdf->debug = true;
		
		$mpdf->setHTMLFooter('<div><span style="float:left;font-size:12px;">&copy; 2016 Dinanda Frame</span></div>');
		$mpdf->WriteHTML($html);

		$tanggal = date('m-Y');

		$mpdf->Output("[Rekap Bulanan]_[$tanggal].pdf",'I');
	}

	public function getrekapmonth($pdf=true)
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			
			$data['getrekap']			= "yes";
			$data['dari']				= $this->input->get('start');
			$data['sampai']				= $this->input->get('end');

			$dari 	= $this->input->get('start') . " 00:00:00";
			$sampai	= $this->input->get('end')  . " 23:59:59";
			$data['datapenjualan']		= $this->db->query("SELECT
															penjualan.penjualanid,
															penjualan.jumlah,
															penjualan.hargajual,
															penjualan.diskon,
															penjualan.customerid,
															penjualan.tgltransaksi,
															customer.namacustomer,
															customer.pic
															FROM
															penjualan
															INNER JOIN customer ON penjualan.customerid = customer.customerid
															WHERE ( penjualan.datetime BETWEEN '".$dari."' AND '".$sampai."' )
															");

			$data['datapembelian']		= $this->db->query("SELECT
															po.fakturpo,
															po.tglorder,
															po.tglkirim,
															po.ok,
															po.bayar,
															po.tgljatuhtempo,
															SUM(detailkonfirmasipo.jmlditerima) AS jmlditerima,
															SUM(detailkonfirmasipo.total) AS total
															FROM
															po
															INNER JOIN detailkonfirmasipo ON po.fakturpo = detailkonfirmasipo.fakturpo
															WHERE ( po.datetime BETWEEN '".$dari."' AND '".$sampai."' )
															AND po.ok = '4' AND po.bayar = '1'
															");
			//	COUNT
			$sumitemmonth		= $this->db->query("SELECT SUM(totalitem) AS menghitung FROM item WHERE ( item.datetime BETWEEN '".$dari."' AND '".$sampai."' )");
			$summonthmasuk		= $this->db->query("SELECT SUM(detailkonfirmasipo.jmlditerima) AS menghitung FROM
													konfirmasipo
													INNER JOIN detailkonfirmasipo ON konfirmasipo.fakturpo = detailkonfirmasipo.fakturpo
													WHERE ( konfirmasipo.datetime BETWEEN '".$dari."' AND '".$sampai."' )");
			$summonthmasuk2		= $this->db->query("SELECT COUNT(konfirmasipo.fakturpo) AS hitung FROM
													konfirmasipo
													WHERE ( konfirmasipo.datetime BETWEEN '".$dari."' AND '".$sampai."' )");

			$summonthkeluar		= $this->db->query("SELECT COUNT(jumlah) AS hitung, SUM(jumlah) AS menghitung FROM penjualan WHERE ( penjualan.datetime BETWEEN '".$dari."' AND '".$sampai."' )");
			$sumprofitmonth	 	= $this->db->query("SELECT
													SUM(penjualan.hargajual - (item.hargabeli*penjualan.jumlah)) AS hitung
													FROM
													detailpenjualan
													INNER JOIN item ON detailpenjualan.itemid = item.itemid
													INNER JOIN penjualan ON detailpenjualan.penjualanid = penjualan.penjualanid
													WHERE ( penjualan.datetime BETWEEN '".$dari."' AND '".$sampai."' )
													");

			foreach ($sumitemmonth->result() as $row) { $data['jumlahitem'] = $row->menghitung; }
			foreach ($summonthmasuk->result() as $row) { $data['barangmasuk'] = $row->menghitung; }
			foreach ($summonthmasuk2->result() as $row) { $data['jumlahpembelian'] = $row->hitung; }
			foreach ($summonthkeluar->result() as $row) { $data['jumlahpenjualan'] = $row->hitung;$data['barangkeluar'] = $row->menghitung; }
			foreach ($sumprofitmonth->result() as $row) { $data['jumlahprofit'] = $row->hitung; }

			$output = $this->load->view('rekap_month', $data, true);
							
			return $this->_gen_pdff($output);
		}else{
				redirect('v1/logout');
		}
	}

	public function getLogin()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$this->load->model('model_login');
		$this->model_login->getLoginPIy($user,$pass);
	} 

	public function logout()
	{
		if($this->session->userdata('level') == "1"){
			$this->db->query("UPDATE petugas SET status='0' ");
			$this->session->sess_destroy();
			redirect('v1');
		}elseif($this->session->userdata('level') == "2"){
			$this->db->query("UPDATE petugas SET status='0' ");
			$this->session->sess_destroy();
			redirect('v1');
		}elseif($this->session->userdata('level') == "3"){
			$this->db->query("UPDATE petugas SET status='0' ");
			$this->session->sess_destroy();
			redirect('v1');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */