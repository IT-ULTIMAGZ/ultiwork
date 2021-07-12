<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Po extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');

			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'PO';
			$data['link_sub_judul1']	= 'po';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | PO';
			$data['judul_halaman']		= "PO&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-xs tooltips' href='".base_url()."po/tambah' data-placement='right' data-toggle='tooltip' data-original-title='Tambah PO | Lihat PO Tahap'><i class='fa fa-plus fa-lg'></i> | <i class='fa fa-eye fa-lg'></i></a>";
			$data['content']			= "porder/view_po";
			$data['active']				= "po";
			$data['datatable']			= "yes";
			$data['datapo1']			= $this->db->get("po");
			$data['datapo2']			= $this->db->query("SELECT * FROM po WHERE ok = '0'");
			$data['datapo3']			= $this->db->query("SELECT * FROM po WHERE ok = '1'");
			$data['datapo4']			= $this->db->query("SELECT * FROM po WHERE ok = '2'");
			$data['datapo5']			= $this->db->query("SELECT * FROM po WHERE ok = '3'");
			
			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function detail()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'PO';
			$data['link_sub_judul1']	= 'po';
			$data['sub_judul2']			= 'Detail';
			$data['link_sub_judul2']	= 'po/detail/'.$get;
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | PO';
			$data['judul_halaman']		= "PO&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-xs tooltips' href='".base_url()."po/tambah' data-placement='right' data-toggle='tooltip' data-original-title='Buat PO Hari Ini'><i class='fa fa-plus fa-lg'></i></a>";
			$data['content']			= "porder/view_po";
			$data['active']				= "po";
			$data['datadetail']			= $this->db->query("SELECT
															po.poid, po.faktur, po.tanggal, po.petugasid, po.datetime,
															item.namaitem, item.ukuran,
															detail_po.itemid, detail_po.putih, detail_po.hitam, detail_po.coklat,
															detail_po.hijau, detail_po.biru, detail_po.pink, detail_po.ungu,
															detail_po.merah, detail_po.silver, detail_po.oak, detail_po.walnut,
															detail_po.gold, detail_po.cfbeen, detail_po.honay, detail_po.kuning
															FROM
															po
															INNER JOIN detail_po ON po.poid = detail_po.poid
															INNER JOIN item ON detail_po.itemid = item.itemid
															WHERE po.poid = '".$data."'
															");
			
			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function tambah()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'PO';
			$data['link_sub_judul1']	= 'po';
			$data['sub_judul2']			= 'Tambah';
			$data['link_sub_judul2']	= 'po/tambah';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | PO';
			$data['judul_halaman']		= 'Form Input PO';
			$data['content']			= "porder/input_po";
			$data['active']				= "po";
			$data['validation']			= "yes";
			$data['datepicker']			= "yes";
			$data['datatable']			= "yes";
			$data['datapo']				= $this->db->query("SELECT * FROM po WHERE ok = '0'");

			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function getpo()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['fakturpo']				= $this->input->post('kode');
			$tampung['fakturpo']			= $this->input->post('kode');
			$tampung['tglorder']			= $this->input->post('tanggalorder');
			$tampung['tglkirim']			= $this->input->post('tanggalkirim');
			$tampung['tgljatuhtempo']		= $this->input->post('jatuhtempo');
			$tampung['kirajamsampai']		= $this->input->post('jamsampai');
			$tampung['ok']					= "0";
			$tampung['bayar']				= "0";
			$tampung['buktipembayaran']		= "";
			$tampung['keterangan']			= "";
			$tampung['petugasid']			= $this->session->userdata('petugasid');

			$query_cek = $this->db->get_where('po', $cek);


			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data Pesan Order Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('po',$tampung);

				$this->session->set_flashdata('sukses','Data Baru Pesan Order Berhasil Di Input</strong>');
			}

			redirect('po/tambah');
		}else{
			redirect('v1/logout');
		}
	}

	public function tambahitempo()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'PO';
			$data['link_sub_judul1']	= 'po';
			$data['sub_judul2']			= 'Tambah';
			$data['link_sub_judul2']	= 'po/tambah';
			$data['sub_judul3']			= 'Tambah Item PO';
			$data['link_sub_judul3']	= 'po/tambahitempo';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | PO';
			$data['judul_halaman']		= 'Form Input Item PO';
			$data['content']			= "porder/input_itempo";
			$data['active']				= "po";
			$data['validation']			= "yes";
			$data['select2']			= "yes";
			//$data['datatable']			= "yes";

			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data['faktur']				= $this->encryption->decode($get);

			$data['dataitempo']			= $this->db->query("SELECT
															detail_po.detailpoid,
															detail_po.itemid,
															detail_po.fakturpo,
															detail_po.putih, detail_po.hitam, detail_po.coklat,
															detail_po.hijau, detail_po.biru, detail_po.pink,
															detail_po.ungu, detail_po.merah, detail_po.silver,
															detail_po.oak, detail_po.walnut, detail_po.gold,
															detail_po.cfbeen, detail_po.honay, detail_po.kuning,
															item.namaitem,
															item.ukuran
															FROM
															detail_po
															INNER JOIN item ON detail_po.itemid = item.itemid
															WHERE detail_po.fakturpo = '".$this->encryption->decode($get)."'");

			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function getitempo()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['itemid']			= $this->input->post('item');
			$cek['fakturpo']		= $this->input->post('kode');

			$tampung['detailpoid']	= $this->input->post('id');
			$tampung['itemid']		= $this->input->post('item');
			$tampung['fakturpo']	= $this->input->post('kode');

			$tampung['putih']		= $this->input->post('putih');
			$tampung['hitam']		= $this->input->post('hitam');
			$tampung['coklat']		= $this->input->post('coklat');
			$tampung['hijau']		= $this->input->post('hijau');
			$tampung['biru']		= $this->input->post('biru');

			$tampung['pink']		= $this->input->post('pink');
			$tampung['ungu']		= $this->input->post('ungu');
			$tampung['merah']		= $this->input->post('merah');
			$tampung['silver']		= $this->input->post('silver');
			$tampung['oak']			= $this->input->post('oak');

			$tampung['walnut']		= $this->input->post('walnut');
			$tampung['gold']		= $this->input->post('gold');
			$tampung['cfbeen']		= $this->input->post('cfbeen');
			$tampung['honay']		= $this->input->post('honay');
			$tampung['kuning']		= $this->input->post('kuning');

			$query_cek = $this->db->get_where('detail_po', $cek);


			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data Item Ke PO Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('detail_po',$tampung);

				$this->session->set_flashdata('sukses','Data Baru Item Ke PO Berhasil Di Input</strong>');
			}
			
			$this->load->library('encryption');
			$id = $this->input->post('kode');
			$data	= $this->encryption->encode($id);

			redirect('po/tambahitempo/'.$data);
		}else{
			redirect('v1/logout');
		}
	}

	public function updateitempo()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "4"){
			$cek['itemid']			= $this->input->post('item');
			$cek['fakturpo']		= $this->input->post('kode');

			$tampung['detailpoid']	= $this->input->post('id');
			$tampung['itemid']		= $this->input->post('item');
			$tampung['fakturpo']	= $this->input->post('kode');

			$tampung['putih']		= $this->input->post('putih');
			$tampung['hitam']		= $this->input->post('hitam');
			$tampung['coklat']		= $this->input->post('coklat');
			$tampung['hijau']		= $this->input->post('hijau');
			$tampung['biru']		= $this->input->post('biru');

			$tampung['pink']		= $this->input->post('pink');
			$tampung['ungu']		= $this->input->post('ungu');
			$tampung['merah']		= $this->input->post('merah');
			$tampung['silver']		= $this->input->post('silver');
			$tampung['oak']			= $this->input->post('oak');

			$tampung['walnut']		= $this->input->post('walnut');
			$tampung['gold']		= $this->input->post('gold');
			$tampung['cfbeen']		= $this->input->post('cfbeen');
			$tampung['honay']		= $this->input->post('honay');
			$tampung['kuning']		= $this->input->post('kuning');

			$query_cek = $this->db->get_where('item', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('item',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data item Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('item');
		}else{
			redirect('v1/logout');
		}
	}
	
	public function editpo()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "4"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'PO';
			$tampilkan['link_sub_judul1']	= 'po';
			$tampilkan['sub_judul2']		= 'Edit PO';
			$tampilkan['link_sub_judul2']	= 'po/editpo/'.$get;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | PO';
			$tampilkan['judul_halaman']		= 'Form Edit PO';
			$tampilkan['content']			= "porder/edit_po";
			$tampilkan['active']			= "po";
			$tampilkan['validation']		= "yes";
			$tampilkan['datepicker']		= "yes";

			$this->db->where('fakturpo', $data);
			$query = $this->db->get('po');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['faktur']			= $row->fakturpo;
					$tampilkan['tanggalorder']		= $row->tglorder;
					$tampilkan['tanggalkirim']		= $row->tglkirim;
					$tampilkan['jamsampai']			= $row->kirajamsampai;
				}
			}
			else
			{
				$tampilkan['faktur']		= '';
				$tampilkan['tanggalorder']	= '';
				$tampilkan['tanggalkirim']	= '';
				$tampilkan['jamsampai']		= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	public function updatepo()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "4"){
			$cek['fakturpo']				= $this->input->post('kode');
			$tampung['fakturpo']			= $this->input->post('kode');
			$tampung['tglorder']			= $this->input->post('tanggalorder');
			$tampung['tglkirim']			= $this->input->post('tanggalkirim');
			$tampung['kirajamsampai']		= $this->input->post('jamsampai');

			$query_cek = $this->db->get_where('po', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('po',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data PO Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('po');
		}else{
			redirect('v1/logout');
		}
	}

	public function tundapo()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "4"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'PO';
			$tampilkan['link_sub_judul1']	= 'po';
			$tampilkan['sub_judul2']		= 'Penundaan PO';
			$tampilkan['link_sub_judul2']	= 'po/tundapo/'.$get;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | PO';
			$tampilkan['judul_halaman']		= 'Form Penundaan PO';
			$tampilkan['content']			= "porder/tunda_po";
			$tampilkan['active']			= "po";
			$tampilkan['validation']		= "yes";
			$tampilkan['datepicker']		= "yes";

			$this->db->where('fakturpo', $data);
			$query = $this->db->get('po');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['faktur']			= $row->fakturpo;
					$tampilkan['tanggalorder']		= $row->tglorder;
					$tampilkan['tanggalkirim']		= $row->tglkirim;
					$tampilkan['jamsampai']			= $row->kirajamsampai;
				}
			}
			else
			{
				$tampilkan['faktur']		= '';
				$tampilkan['tanggalorder']	= '';
				$tampilkan['tanggalkirim']	= '';
				$tampilkan['jamsampai']		= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}
	
	public function updatetundapo()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "4"){
			$cek['fakturpo']				= $this->input->post('kode');
			$tampung['fakturpo']			= $this->input->post('kode');
			$tampung['tglorder']			= $this->input->post('tanggalorder');
			$tampung['tglkirim']			= $this->input->post('tanggalkirim');
			$tampung['kirajamsampai']		= $this->input->post('jamsampai');
			$tampung['keterangan']			= $this->input->post('keterangan');

			$query_cek = $this->db->get_where('po', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('po',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data PO Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('po');
		}else{
			redirect('v1/logout');
		}
	}

	public function deletepo()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$this->db->where('fakturpo', $data);
			$query = $this->db->get('po');
			if($query->num_rows() > 0){

				$this->db->where('fakturpo',$data);
				$this->db->delete('po');
				$this->db->where('fakturpo',$data);
				$this->db->delete('detail_po');
				$this->db->where('fakturpo',$data);
				$this->db->delete('konfirmasipo');
				$this->db->where('fakturpo',$data);
				$this->db->delete('detailkonfirmasipo');
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('po');
			}
			else
			{
				redirect('po');
			}
		}else{
			redirect('v1/logout');
		}
	}

	public function selesaiitempo(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);

			$cek['fakturpo']	= $this->encryption->decode($get);
			$tampung['ok']		= "1";

			$this->db->update('po',$tampung,$cek);
			
			$this->session->set_flashdata('sukses','Data Pesan Order Telah Selesai Dibuat</strong>');
			redirect('po');	
		}else{
			redirect('v1/logout');
		}
	}

	public function urungkanpo(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);

			$cek['fakturpo']	= $this->encryption->decode($get);
			$tampung['ok']		= "0";

			$this->db->update('po',$tampung,$cek);
			
			$this->session->set_flashdata('sukses','Data Pesan Order Berhasil Diurungkan</strong>');
			redirect('po/tambahitempo/'.$get);
		}else{
			redirect('v1/logout');
		}
	}

	public function sudahditerima(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);

			$cek['fakturpo']	= $this->encryption->decode($get);
			$tampung['ok']		= "3";

			$this->db->update('po',$tampung,$cek);
			
			$this->session->set_flashdata('sukses','Data Pesan Order Sudah Diterima</strong>');
			redirect('po');
		}else{
			redirect('v1/logout');
		}
	}

	public function ditunda(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);

			$cek['fakturpo']	= $this->encryption->decode($get);
			$tampung['ok']		= "2";

			$this->db->update('po',$tampung,$cek);
			
			$this->session->set_flashdata('sukses','Data Pesan Order Ditunda</strong>');
			redirect('po');
		}else{
			redirect('v1/logout');
		}
	}

	public function terimabarang()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "4"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'PO';
			$tampilkan['link_sub_judul1']	= 'po';
			$tampilkan['sub_judul2']		= 'Form Penerimaan Barang PO';
			$tampilkan['link_sub_judul2']	= 'po/terimabarang/'.$get;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | PO';
			$tampilkan['judul_halaman']		= 'Form Penerimaan Barang PO';
			$tampilkan['content']			= "porder/input_terimabarang";
			$tampilkan['active']			= "po";
			$tampilkan['validation']		= "yes";
			$tampilkan['datepicker']		= "yes";
			$tampilkan['sumtotal']			= "yes";

			$tampilkan['faktur']			= $data;
			$tampilkan['dataterima']		= $this->db->query("SELECT
																item.itemid,
																item.namaitem,
																item.ukuran,
																item.hargabeli,
																detail_po.putih,
																detail_po.hitam,
																detail_po.coklat,
																detail_po.hijau,
																detail_po.biru,
																detail_po.pink,
																detail_po.ungu,
																detail_po.merah,
																detail_po.silver,
																detail_po.oak,
																detail_po.walnut,
																detail_po.gold,
																detail_po.cfbeen,
																detail_po.honay,
																detail_po.kuning
																FROM
																detail_po
																INNER JOIN item ON detail_po.itemid = item.itemid
																WHERE detail_po.fakturpo = '".$data."'
																");
			$query = $this->db->query("select count(fakturpo) as count from detail_po where fakturpo='".$data."'");
			foreach ($query->result() as $row) {
				$tampilkan['count']				= $row->count;
			}

			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	public function getterimabarang()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$config = array(
						'upload_path' 	=> 'assets/lampiranpo/',
						'allowed_types' => 'jpg|jpeg|png|gif|pdf',
						'max_size'		=> '5000'
						);

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('lampiran'))
			{
				$this->session->set_flashdata('gagal','<strong>Tambah</strong> Pesan Order Gagal Di Konfirmasi <strong>Gagal</strong>');
			}
			else
			{
				$upload_data = $this->upload->data();

				$cek['konfirmasipoid']			= $this->input->post('id');
				$tampung['konfirmasipoid']		= $this->input->post('id');
				$tampung['fakturpo']			= $this->input->post('faktur');
				$tampung['lampiran']			= $_FILES['lampiran']['name'];
				$tampung['diserahkan']			= $this->input->post('diserahkan');
				$tampung['diterima']			= $this->input->post('diterima');
				$tampung['petugasid']			= $this->session->userdata('petugasid');

				$query_cek = $this->db->get_where('konfirmasipo', $cek);

				$count = $this->input->post('count');
			    for($i=1;$i<=$count;$i++) {
			    	$key['detailkonfirmasipoid']	= $this->input->post('id'.$i);
				    $data[$i] = array(
				     					'detailkonfirmasipoid' => $this->input->post('id'.$i),
				     					'itemid' => $this->input->post('item'.$i),
				     					'fakturpo' => $this->input->post('faktur'),
				     					'jmlorder' => $this->input->post('jmlorder'.$i),
				     					'jmlditerima' => $this->input->post('jmlkirim'.$i),
				     					'hargajual' => $this->input->post('hargajual'.$i),
				     					'total' => $this->input->post('total'.$i),
				     					'keterangan' => $this->input->post('keterangan'.$i),
				     					'petugasid' => $this->session->userdata('petugasid')
				     				);
				};

				$query = $this->db->get_where('detailkonfirmasipo',$key);

			    for($w=1;$w<=$count;$w++) {
			    	$keydata['itemid']	= $this->input->post('item'.$i);
			    	$datakey[$w] = $this->input->post('item'.$w);
				    $update[$w] = $this->input->post('jmlkirim'.$w);
				};

				$queryupdate = $this->db->get_where('item',$keydata);

				if ($query_cek->num_rows > 0 || $query->num_rows > 0)
				{
					$this->session->set_flashdata('gagal','Data Pesan Order Sudah Di Input Kan Sebelumnya</strong>');
				}
				else
				{
					$this->db->insert('konfirmasipo',$tampung);

					$this->load->model('model_login');
					$this->model_login->inertterimabarang($data,$count);

					for($i=1;$i<=$count;$i++) {
				       $this->db->query("update item set totalitem=(totalitem+".$update[$i].") where itemid='".$datakey[$i]."'");
				    }

				    $this->db->query("update po set ok = 4 where fakturpo = '".$this->input->post('faktur')."'");

					$this->session->set_flashdata('sukses','Pesan Order Berhasil Di Konfirmasi</strong>');
				}

				redirect('po');
			}
		}else{
			redirect('v1/logout');
		}
	}

	private function _gen_pdfakhirpo($html,$paper='A4')
	{
		//ob_end_clean();
		$this->load->library('MPDF56/mpdf');
		$mpdf=new mPDF('utf-8', $paper, '11px','Times New Roman');
		$mpdf->debug = true;
		
		//$mpdf->setHTMLFooter('<div><b>ENGLISH PROGRAM</b></div><div><span style="float:left;font-size:12px;">Jl. Condet Raya No 5 Kramat Jati, Jakarta Timur 13520 - Indonesia <b>Telp.</b> 021-8088-7647 <b>Fax.</b> 021-8088 7467</span></div>');
		$mpdf->WriteHTML($html);

		$tanggal = date('d-m-Y');

		$mpdf->Output("[Tanda Terima Barang]_[$tanggal].pdf",'I');
	}

	public function cetakpo($pdf=true)
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get 			= $this->uri->segment(3);
			$faktur			= $this->encryption->decode($get);
			$data['faktur'] = $faktur;
			$data['datapo']	= $this->db->query("SELECT
												konfirmasipo.fakturpo,
												konfirmasipo.lampiran,
												detailkonfirmasipo.itemid,
												detailkonfirmasipo.jmlorder,
												detailkonfirmasipo.jmlditerima,
												detailkonfirmasipo.hargajual,
												detailkonfirmasipo.total,
												detailkonfirmasipo.keterangan,
												item.namaitem,
												item.ukuran
												FROM
												konfirmasipo ,
												detailkonfirmasipo
												INNER JOIN item ON detailkonfirmasipo.itemid = item.itemid
												WHERE detailkonfirmasipo.fakturpo = '".$faktur."' AND konfirmasipo.fakturpo = '".$faktur."'
												");

			$data['detailpo'] 	= $this->db->query("select * from konfirmasipo where fakturpo='".$faktur."'");
			

			$output = $this->load->view('porder/cetak_akhirpo', $data, true);
								
			return $this->_gen_pdfakhirpo($output);
		}else{
			redirect('v1/logout');
		}
	}

	private function _gen_pdfawalpo($html,$paper='A4-L')
	{
		//ob_end_clean();
		$this->load->library('MPDF56/mpdf');
		$mpdf=new mPDF('utf-8', $paper, '13px','Times New Roman');
		$mpdf->debug = true;
		
		//$mpdf->setHTMLFooter('<div><b>ENGLISH PROGRAM</b></div><div><span style="float:left;font-size:12px;">Jl. Condet Raya No 5 Kramat Jati, Jakarta Timur 13520 - Indonesia <b>Telp.</b> 021-8088-7647 <b>Fax.</b> 021-8088 7467</span></div>');
		$mpdf->WriteHTML($html);

		$tanggal = date('d-m-Y');

		$mpdf->Output("[Tanda Terima Barang]_[$tanggal].pdf",'I');
	}

	public function cetakawalpo($pdf=true)
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$faktur	= $this->encryption->decode($get);
			$data['faktur'] = $faktur;
			$data['dataitempo']			= $this->db->query("SELECT
																detail_po.detailpoid,
																detail_po.itemid,
																detail_po.fakturpo,
																detail_po.putih, detail_po.hitam, detail_po.coklat,
																detail_po.hijau, detail_po.biru, detail_po.pink,
																detail_po.ungu, detail_po.merah, detail_po.silver,
																detail_po.oak, detail_po.walnut, detail_po.gold,
																detail_po.cfbeen, detail_po.honay, detail_po.kuning,
																item.namaitem,
																item.ukuran
																FROM
																detail_po
																INNER JOIN item ON detail_po.itemid = item.itemid
																WHERE detail_po.fakturpo = '".$faktur."'");
																
			$hitungtotalorder			= $this->db->query("SELECT 
															SUM(detail_po.putih + detail_po.hitam + detail_po.coklat +
															detail_po.hijau + detail_po.biru + detail_po.pink +
															detail_po.ungu + detail_po.merah + detail_po.silver +
															detail_po.oak + detail_po.walnut + detail_po.gold +
															detail_po.cfbeen + detail_po.honay + detail_po.kuning) AS jmlorder
															FROM
															detail_po
															WHERE detail_po.fakturpo = '".$faktur."'");		
															
			foreach($hitungtotalorder->result() as $showrow){
			    $data['jmlorder'] = $showrow->jmlorder;
			}

			$output = $this->load->view('porder/cetak_awalpo', $data, true);
								
			return $this->_gen_pdfawalpo($output);
		}else{
			redirect('v1/logout');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */