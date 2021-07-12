<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');

			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Pembelian';
			$data['link_sub_judul1']	= 'pembelian';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Pembelian';
			$data['judul_halaman']		= "Data Pembelian";//&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-xs tooltips' href='".base_url()."pembelian/tambah' data-placement='right' data-toggle='tooltip' data-original-title='Tambah Pembelian'><i class='fa fa-plus fa-lg'></i></a>
			$data['content']			= "pembelian/view_pembelian";
			$data['active']				= "pembelian";
			$data['datatable']			= "yes";

			$data['datapembelian']		= $this->db->query("SELECT DISTINCT
															po.fakturpo,
															po.tglorder,
															po.tglkirim,
															po.ok,
															po.bayar,
															po.tgljatuhtempo
															FROM
															po
															INNER JOIN detailkonfirmasipo ON po.fakturpo = detailkonfirmasipo.fakturpo
															WHERE po.ok = '4' AND po.bayar = '1'");

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function cekpembelian()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');

			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Pembelian';
			$data['link_sub_judul1']	= 'pembelian';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Pembelian';
			$data['judul_halaman']		= "Cek Pembelian";//&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-xs tooltips' href='".base_url()."pembelian/tambah' data-placement='right' data-toggle='tooltip' data-original-title='Tambah Pembelian'><i class='fa fa-plus fa-lg'></i></a>
			$data['content']			= "pembelian/cek_pembelian";
			$data['active']				= "pembelian";
			$data['datatable']			= "yes";

			$data['datacekpembelian']		= $this->db->query("SELECT
															po.fakturpo,
															po.tglorder,
															po.tglkirim,
															po.bayar,
															po.tgljatuhtempo
															FROM
															po
															WHERE po.ok = '4' AND po.bayar = '0'");

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function updatepembayaran()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Pembelian';
			$tampilkan['link_sub_judul1']	= 'pembelian';
			$tampilkan['sub_judul2']		= 'Update Pembayaran Tagihan Pembelian';
			$tampilkan['link_sub_judul2']	= 'pembelian/updatepembayaran/'.$data;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | Pembelian';
			$tampilkan['judul_halaman']		= 'Pembelian';
			$tampilkan['content']			= "pembelian/edit_pembelian";
			$tampilkan['active']			= "pembelian";
			$tampilkan['validation']		= "yes";

			$query = $this->db->query("SELECT
										po.fakturpo,
										po.tglkirim,
										po.tgljatuhtempo
										FROM
										po
										WHERE po.fakturpo ='".$data."'
										");
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']			= $row->fakturpo;
					$tampilkan['tgldatang']		= $row->tglkirim;
					$tampilkan['jatuhtempo']	= $row->tgljatuhtempo;
				}
			}
			else
			{
				$tampilkan['id']			= '';
				$tampilkan['tgldatang']		= '';
				$tampilkan['jatuhtempo']	= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	public function getupdatepembayaran()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$config = array(
						'upload_path' 	=> 'assets/lampiranpembayaranpembelian/',
						'allowed_types' => 'jpg|jpeg|png|gif|pdf|txt',
						'max_size'		=> '5000'
						);

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('buktipembayaran'))
			{
				$this->session->set_flashdata('gagal','<strong>Update</strong> Pembayaran Tagihan <strong>Gagal</strong>');
			}
			else
			{
				$upload_data = $this->upload->data();

				$cek['fakturpo']				= $this->input->post('pembelian');
				$tampung['buktipembayaran']		= $_FILES['buktipembayaran']['name'];
				$tampung['bayar']				= 1;

				$query_cek = $this->db->get_where('po', $cek);

				if ($query_cek->num_rows > 0)
				{
					$this->db->update('po',$tampung,$cek);
					$this->session->set_flashdata('sukses','Update Pembayaran Tagihan Berhasil</strong>');
				}
				else
				{
					$this->session->set_flashdata('gagal','Pembayaran Tagihan Sudah Di Konfirmasi Sebelumnya</strong>');
				}

				redirect('pembelian');
			}
		}else{
			redirect('v1/logout');
		}
	}

	public function deletepembelian()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			/*$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$this->db->where('kodepembelian', $data);
			$query = $this->db->get('pembelian');
			if($query->num_rows() > 0){
				$this->db->where('kodepembelian',$data);
				$this->db->delete('pembelian');
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('pembelian');
			}
			else
			{
				redirect('pembelian');
			}*/
		}else{
			redirect('v1/logout');
		}
	}

	/*public function tampil_data_size(){
		$size_id = $_GET['size_id'];
		$query = $this->db->query("SELECT * FROM item WHERE itemid ='{$size_id}' ");

		$size_tampil = array();
		
			if($query){
				foreach ($query->result() as $row) {
					$data = array(
						'sizes' => $row->size
					);
					array_push($size_tampil, $data);
				}
			}else {
				$size_tampil = array('gagal' => 'cannot find size '.$seri_id);
			}
		
		echo json_encode($size_tampil);
	}*/

	public function rekap()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Pembelian';
			$data['link_sub_judul1']	= 'pembelian';
			$data['sub_judul2']			= 'Rekap';
			$data['link_sub_judul2']	= 'pembelian/rekap';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Pembelian';
			$data['judul_halaman']		= 'Rekap Pembelian';
			$data['content']			= "pembelian/rekap_pem";
			$data['active']				= "pembelian";
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
			$data['sub_judul1']			= 'Pembelian';
			$data['link_sub_judul1']	= 'pembelian';
			$data['sub_judul2']			= 'Rekap';
			$data['link_sub_judul2']	= 'pembelian/rekap';
			$data['sub_judul3']			= 'Hasil Rekap';
			$data['link_sub_judul3']	= 'pembelian/getrekap?start='.$this->input->get('start').'&end='.$this->input->get('end');
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Pembelian';
			$data['judul_halaman']		= 'Rekap Pembelian';
			$data['content']			= "pembelian/rekap_pem";
			$data['active']				= "pembelian";
			$data['datatable']			= "yes";
			$data['getrekap']			= "yes";

			$dari 	= $this->input->get('start');
			$sampai	= $this->input->get('end');
			$data['datapembelian']		= $this->db->query("SELECT DISTINCT
															po.fakturpo,
															po.tglorder,
															po.tglkirim,
															po.ok,
															po.bayar,
															po.tgljatuhtempo,
															po.buktipembayaran,
															konfirmasipo.lampiran
															FROM
															po
															INNER JOIN detailkonfirmasipo ON po.fakturpo = detailkonfirmasipo.fakturpo
															INNER JOIN konfirmasipo ON po.fakturpo = konfirmasipo.fakturpo
															WHERE ( po.tglorder BETWEEN '".$dari."' AND '".$sampai."' )
															");

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function rekapday()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['this_tittle']		= 'Inventory | Pembelian';
			$data['getrekap']			= 'Yes';
			$data['rekapperday']		= 'Yes';
			$dari 	= date('Y-m-d') . " 00:00:00";
			$sampai	= date('Y-m-d') . " 23:59:59";
			$data['datapembelian']		= $this->db->query("SELECT
															pembelian.kodepembelian,
															item.category,
															pembelian.size,
															pembelian.jumlah,
															pembelian.totalpembelian,
															pembelian.totalharga,
															pembelian.harga,
															pembelian.datetime,
															petugas.nmpetugas
															FROM
															pembelian
															INNER JOIN item on pembelian.itemid = item.itemid
															INNER JOIN petugas on pembelian.petugasid = petugas.petugasid
															WHERE ( pembelian.datetime BETWEEN '".$dari."' AND '".$sampai."' )
															");

			$this->load->view('pembelian/rekap_pembelian', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function rekapmonth()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['this_tittle']		= 'Inventory | Pembelian';
			$data['getrekap']			= 'Yes';
			$data['rekappermonth']		= 'Yes';

			$data['datapembelian']		= $this->db->query("SELECT
															pembelian.kodepembelian,
															item.category,
															pembelian.size,
															pembelian.jumlah,
															pembelian.totalpembelian,
															pembelian.totalharga,
															pembelian.harga,
															pembelian.datetime,
															petugas.nmpetugas
															FROM
															pembelian
															INNER JOIN item on pembelian.itemid = item.itemid
															INNER JOIN petugas on pembelian.petugasid = petugas.petugasid
															WHERE pembelian.datetime LIKE '%".date('Y-m')."%'
															");

			$this->load->view('pembelian/rekap_pembelian', $data);
		}else{
				redirect('v1/logout');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */