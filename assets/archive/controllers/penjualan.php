<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Penjualan';
			$data['link_sub_judul1']	= 'penjualan';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Penjualan';
			$data['judul_halaman']		= "Penjualan &nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-xs tooltips' href='".base_url()."penjualan/tambah' data-placement='right' data-toggle='tooltip' data-original-title='Tambah Penjualan'><i class='fa fa-plus fa-lg'></i></a>";
			$data['content']			= "penjualan/view_penjualan";
			$data['active']				= "penjualan";
			$data['datatable']			= "yes";

			$data['datapenjualan']		= $this->db->query("SELECT
															penjualan.penjualanid,
															penjualan.jumlah,
															penjualan.hargajual,
															penjualan.diskon,
															penjualan.customerid,
															penjualan.metodepembayaran,
															penjualan.tgltransaksi,
															penjualan.buktitransaksi,
															penjualan.keterangan,
															penjualan.bayar,
															customer.namacustomer
															FROM
															penjualan
															INNER JOIN customer ON penjualan.customerid = customer.customerid
															");

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function detail()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$id	= $this->encryption->decode($get);

			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Penjualan';
			$data['link_sub_judul1']	= 'penjualan';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Detail Penjualan';
			$data['judul_halaman']		= "Detail Penjualan";
			$data['content']			= "penjualan/detailview_penjualan";
			$data['active']				= "penjualan";
			$data['datatable']			= "yes";
			$data['select2']			= "yes";
			$data['menghitungpenjualan']= "yes";

			$data['penjualanid']		= $id;

			$data['datapenjualan']		= $this->db->query("SELECT
															detailpenjualan.detailpenjualanid,
															detailpenjualan.penjualanid,
															detailpenjualan.itemid,
															detailpenjualan.jumlahjual,
															detailpenjualan.totalharga,
															detailpenjualan.putih, detailpenjualan.hitam, detailpenjualan.coklat,
															detailpenjualan.hijau, detailpenjualan.biru, detailpenjualan.pink,
															detailpenjualan.ungu, detailpenjualan.merah, detailpenjualan.silver,
															detailpenjualan.oak, detailpenjualan.walnut, detailpenjualan.gold,
															detailpenjualan.cfbeen, detailpenjualan.honay, detailpenjualan.kuning,
															item.namaitem,
															item.ukuran
															FROM
															detailpenjualan
															INNER JOIN item ON detailpenjualan.itemid = item.itemid
															WHERE detailpenjualan.penjualanid = '".$id."'
															");
			$query = $this->db->query("select * from penjualan where penjualanid='".$id."'");
			foreach ($query->result() as $show) {
				$data['sudahselesai'] 	= $show->sudah;
				$data['diskon']			= $show->diskon;
			}

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function tampil_dataitem(){
		$price_id = $_GET['price_id'];
		$query = $this->db->query("SELECT * FROM item WHERE itemid ='{$price_id}' ");

		$price_tampil = array();
		
			if($query){
				foreach ($query->result() as $row) {
					$data = array(
						'harga' => $row->hargajual,
						'stok' => $row->totalitem
					);
					array_push($price_tampil, $data);
				}
			}else {
				$data = array('gagal' => 'cannot find size '.$price_id);
				array_push($price_tampil, $data);
			}
		
		echo json_encode($price_tampil);
	}

	public function selesaiplus(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);

			$cek['penjualanid']	= $this->encryption->decode($get);
			$tampung['sudah']	= "1";

			$this->db->update('penjualan',$tampung,$cek);
			
			$this->session->set_flashdata('sukses','Data Detail Pembelian Item Oleh Pelanggan Telah Selesai Dibuat</strong>');
			redirect('penjualan/detail/'.$get);	
		}else{
			redirect('v1/logout');
		}
	}

	public function urungkanplus(){
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);

			$cek['penjualanid']	= $this->encryption->decode($get);
			$tampung['sudah']	= "0";

			$this->db->update('penjualan',$tampung,$cek);
			
			$this->session->set_flashdata('sukses','Data Detail Pembelian Item Oleh Pelanggan Telah Diurungkan</strong>');
			redirect('penjualan/detail/'.$get);	
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
			$data['sub_judul1']			= 'Penjualan';
			$data['link_sub_judul1']	= 'penjualan';
			$data['sub_judul2']			= 'Tambah';
			$data['link_sub_judul2']	= 'penjualan/tambah';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Penjualan';
			$data['judul_halaman']		= 'Form Input Penjualan';
			$data['content']			= "penjualan/input_penjualan";
			$data['active']				= "penjualan";
			$data['validation']			= "yes";
			$data['select2']			= "yes";
			$data['datepicker']			= "yes";
			//$data['autokomplit']		= "yes";

			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function getpenjualan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['penjualanid']				= $this->input->post('penjualan');
			$tampung['penjualanid']			= $this->input->post('penjualan');
			$tampung['jumlah']				= 0;
			$tampung['hargajual']			= 0;
			$tampung['diskon']				= $this->input->post('diskon');
			$tampung['customerid']			= $this->input->post('customer');
			$tampung['metodepembayaran']	= $this->input->post('metode');
			$tampung['tgltransaksi']		= $this->input->post('tgltransaksi');
			$tampung['tgljatuhtempo']		= $this->input->post('jatuhtempo');
			$tampung['buktitransaksi']		= "";
			$tampung['keterangan']			= $this->input->post('keterangan');
			$tampung['bayar']				= 0;
			$tampung['sudah']				= 0;
			$tampung['datetime']			= date('Y-m-d H:i:s');
			$tampung['petugasid']			= $this->session->userdata('petugasid');

			$query_cek = $this->db->get_where('penjualan', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data penjualan Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('penjualan',$tampung);
				$this->session->set_flashdata('sukses','Data Baru penjualan Berhasil Di Input</strong>');
			}
			redirect('penjualan');
		}else{
			redirect('v1/logout');
		}
	}

	public function getitempenjualan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');

			$cek['penjualanid']				= $this->input->post('kode');
			$cek['itemid']					= $this->input->post('item');
			$tampung['detailpenjualanid']	= "";
			$tampung['penjualanid']			= $this->input->post('kode');
			$tampung['itemid']				= $this->input->post('item');
			$tampung['jumlahjual']			= $this->input->post('totalitem');
			$tampung['hargaasli']			= $this->input->post('totalharga');
			$tampung['totalharga']			= $this->input->post('hargaakhir');;
			$tampung['putih']				= $this->input->post('putih');
			$tampung['hitam']				= $this->input->post('hitam');
			$tampung['coklat']				= $this->input->post('coklat');
			$tampung['hijau']				= $this->input->post('hijau');
			$tampung['biru']				= $this->input->post('biru');
			$tampung['pink']				= $this->input->post('pink');
			$tampung['ungu']				= $this->input->post('ungu');
			$tampung['merah']				= $this->input->post('merah');
			$tampung['silver']				= $this->input->post('silver');
			$tampung['oak']					= $this->input->post('oak');
			$tampung['walnut']				= $this->input->post('walnut');
			$tampung['gold']				= $this->input->post('gold');
			$tampung['cfbeen']				= $this->input->post('cfbeen');
			$tampung['honay']				= $this->input->post('honay');
			$tampung['kuning']				= $this->input->post('kuning');


			$jmljual 						= $this->input->post('totalitem');
			$ttlharga 						= $this->input->post('hargaakhir');
			$id 							= $this->input->post('kode');
			$iditem							= $this->input->post('item');

			$query_cek = $this->db->get_where('detailpenjualan', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data penjualan Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('detailpenjualan',$tampung);
				$this->db->query("update penjualan set jumlah=(jumlah+".$jmljual."), hargajual=(hargajual+".$ttlharga.") where penjualanid='".$id."'");
				$this->db->query("update item set totalitem=(totalitem-".$jmljual.") where itemid='".$iditem."'");
				$this->session->set_flashdata('sukses','Data Baru penjualan Berhasil Di Input</strong>');
			}
			redirect('penjualan/detail/'.$this->encryption->encode($this->input->post('kode')));
		}else{
			redirect('v1/logout');
		}
	}

	public function updatepenjualan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['penjualanid']				= $this->input->post('penjualan');
			$tampung['penjualanid']			= $this->input->post('penjualan');
			$tampung['diskon']				= $this->input->post('diskon');
			$tampung['customerid']			= $this->input->post('customer');
			$tampung['metodepembayaran']	= $this->input->post('metode');
			$tampung['tgltransaksi']		= $this->input->post('tgltransaksi');
			$tampung['tgljatuhtempo']		= $this->input->post('jatuhtempo');
			$tampung['keterangan']			= $this->input->post('keterangan');

			$query_cek = $this->db->get_where('penjualan', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('penjualan',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data penjualan Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('penjualan');
		}else{
			redirect('v1/logout');
		}
	}
	
	public function editpenjualan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Penjualan';
			$tampilkan['link_sub_judul1']	= 'penjualan';
			$tampilkan['sub_judul2']		= 'Edit';
			$tampilkan['link_sub_judul2']	= 'penjualan/editpenjualan/'.$data;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | penjualan';
			$tampilkan['judul_halaman']		= 'penjualan';
			$tampilkan['content']			= "penjualan/edit_penjualan";
			$tampilkan['active']			= "penjualan";
			$tampilkan['validation']		= "yes";
			$tampilkan['datepicker']		= "yes";
			$tampilkan['select2']			= "yes";

			$query = $this->db->query("SELECT
										penjualan.penjualanid,
										penjualan.tgltransaksi,
										penjualan.tgljatuhtempo,
										penjualan.buktitransaksi,
										penjualan.keterangan,
										penjualan.metodepembayaran,
										penjualan.customerid,
										penjualan.diskon,
										customer.namacustomer
										FROM
										penjualan
										INNER JOIN customer ON penjualan.customerid = customer.customerid
										WHERE penjualan.penjualanid='".$data."'
										");
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']			= $row->penjualanid;
					$tampilkan['tgltransaksi']	= $row->tgltransaksi;
					$tampilkan['jatuhtempo']	= $row->tgljatuhtempo;
					$tampilkan['customerid']	= $row->customerid;
					$tampilkan['namacustomer']	= $row->namacustomer;
					$tampilkan['metode']		= $row->metodepembayaran;
					$tampilkan['diskon']		= $row->diskon;
					$tampilkan['keterangan']	= $row->keterangan;
				}
			}
			else
			{
				$tampilkan['id']			= '';
				$tampilkan['tgltransaksi']	= '';
				$tampilkan['jatuhtempo']	= '';
				$tampilkan['customerid']	= '';
				$tampilkan['namacustomer']	= '';
				$tampilkan['metode']		= '';
				$tampilkan['diskon']		= '';
				$tampilkan['keterangan']	= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	public function deletepenjualan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$this->db->where('penjualanid', $data);
			$query = $this->db->get('penjualan');
			if($query->num_rows() > 0){
				$this->db->where('penjualanid',$data);
				$this->db->delete('penjualan');
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('penjualan');
			}
			else
			{
				redirect('penjualan');
			}
		}else{
			redirect('v1/logout');
		}
	}

	public function deleteitempen()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$get2 = $this->uri->segment(4);
			$data	= $this->encryption->decode($get);
			$data2	= $this->encryption->decode($get2);

			$this->db->where('detailpenjualanid', $data);
			$query = $this->db->get('detailpenjualan');
			if($query->num_rows() > 0){
				$this->db->where('detailpenjualanid',$data);
				$this->db->delete('detailpenjualan');
				
				$tampildetail = $this->db->query("select * from detailpenjualan where detailpenjualanid = '".$data2."'");
				foreach ($tampildetail->result() as $showdetail) {
					$updateitem = $this->db->query("update item set totalitem=(totalitem+".$showdetail->jumlahjual.") where itemid='".$showdetail->itemid."'");
				}
				
				$countsum = $this->db->query("SELECT SUM(totalharga) AS hitung FROM detailpenjualan WHERE penjualanid='".$data2."'");
    			foreach($countsum->result() as $srow){
    			    $update = $this->db->query("update penjualan set hargajual='".$srow->hitung."' where penjualanid='".$data2."'");
    			}
				
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('penjualan/detail/'.$get2);
			}
			else
			{
				redirect('penjualan/detail/'.$get2);
			}
		}else{
			redirect('v1/logout');
		}
	}

	/*public function tampil_data_ish(){
		$kode_id = $this->input->get('kode_id');
		$query = $this->db->query("SELECT
									item.itemid,
									item.totalitem,
									item.category,
									pembelian.size,
									pembelian.harga,
									pembelian.kodepembelian
									FROM
									pembelian
									INNER JOIN item on pembelian.itemid = item.itemid
									WHERE item.category LIKE '%{$kode_id}%' ");

		$kode_tampil = array();
		
			if($query){
				foreach ($query->result() as $row) {
					$data = array(
						'kategori' => $row->category,
						'sizes' => $row->size,
						'harga' => $row->harga,
						'item' => $row->itemid,
						'nilai' => $row->totalitem,
						'pembelian' => $row->kodepembelian
					);
					array_push($kode_tampil, $data);
				}
			}else {
				$kode_tampil = array('gagal' => 'cannot find size '.$kode_id);
			}
		
		echo json_encode($kode_tampil);
	}*/

	public function tampil_data_ish() {
        $kode = $this->uri->segment(3); //variabel kunci yang di bawa dari input text id kode
        $query = $this->db->query("SELECT
									item.totalitem,
									item.category,
									item.size,
									pembelian.harga,
									pembelian.datetime,
									pembelian.itemid,
									pembelian.kodepembelian
									FROM
									pembelian
									INNER JOIN item on pembelian.itemid = item.itemid
									WHERE item.category LIKE '%".$kode."%' 
									");
 
        foreach($query->result() as $row)
		{
			$sodate = substr($row->datetime,0,10);

			$exp = explode('-',$sodate);
			if(count($exp) == 3) {
				if($exp[1] == 01){ $bln = 'Jan';}
				elseif($exp[1] == 02){ $bln = 'Feb';}
				elseif($exp[1] == 03){ $bln = 'Mar';}
				elseif($exp[1] == 04){ $bln = 'Apr';}
				elseif($exp[1] == 05){ $bln = 'Mei';}
				elseif($exp[1] == 06){ $bln = 'Jun';}
				elseif($exp[1] == 07){ $bln = 'Jul';}
				elseif($exp[1] == 08){ $bln = 'Agt';}
				elseif($exp[1] == 09){ $bln = 'Sep';}
				elseif($exp[1] == 10){ $bln = 'Okt';}
				elseif($exp[1] == 11){ $bln = 'Nov';}
				elseif($exp[1] == 12){ $bln = 'Des';}
				$date = $exp[2].'-'.$bln.'-'.$exp[0];
			}

			$arr['query'] = $kode;//." (".$date.")"
			$arr['suggestions'][] = array(
				'value'	=> $row->category ,
				'sizes' => $row->size,
				'harga' => $row->harga,
				'itemsa' => $row->itemid,
				'pembelian' => $row->kodepembelian,
				'nilai' => $row->totalitem
			);
		}

		echo json_encode($arr);
    }

	private function _gen_pdf($html,$paper='A4-L')
	{
		//ob_end_clean();
		$this->load->library('MPDF56/mpdf');
		$mpdf=new mPDF('utf-8', $paper );
		$mpdf->debug = true;
		
		$mpdf->setHTMLFooter('<div><span style="float:left;font-size:12px;">&copy; 2016 Farhan Chick</span></div>');
		$mpdf->WriteHTML($html);



		$tanggal = date('d-m-Y H:i:s');

		$kode = $this->uri->segment(3);

		$mpdf->Output("[Inventory]_[$tanggal]_[$kode].pdf",'I');
	}

	public function printpenjualan($pdf=true)
	{ 
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){	
			$isi['content']				= 'penjualan/print_penjualan';
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);
			$isi['judul']				= $data;
			$isi['tampildataprint']		= $this->db->query("SELECT
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
															WHERE penjualan.customerid = '0' AND penjualan.ketpembayaran = '1'
															AND penjualan.penjualanid='".$data."'");

			$output = $this->load->view('tampilan_print', $isi, true);

			return $this->_gen_pdf($output);
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
			$data['sub_judul1']			= 'Penjualan';
			$data['link_sub_judul1']	= 'penjualan';
			$data['sub_judul2']			= 'Rekap';
			$data['link_sub_judul2']	= 'penjualan/rekap';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Penjualan';
			$data['judul_halaman']		= 'Rekap Penjualan';
			$data['content']			= "penjualan/rekap_pen";
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
			$data['judul_halaman']		= 'Rekap Penjualan';
			$data['content']			= "penjualan/rekap_pen";
			$data['active']				= "penjualan";
			$data['datatable']			= "yes";
			$data['getrekap']			= "yes";

			$dari 	= $this->input->get('start');// . " 00:00:00";
			$sampai	= $this->input->get('end');//  . " 23:59:59";
			$data['datapenjualan']		= $this->db->query("SELECT
															penjualan.penjualanid,
															penjualan.jumlah,
															penjualan.hargajual,
															penjualan.diskon,
															penjualan.customerid,
															penjualan.tgltransaksi,
															customer.namacustomer,
															customer.namatoko
															FROM
															penjualan
															INNER JOIN customer ON penjualan.customerid = customer.customerid
															WHERE ( penjualan.tgltransaksi BETWEEN '".$dari."' AND '".$sampai."' )
															");//AND penjualan.customerid = '0' AND penjualan.ketpembayaran = '1'

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function rekapday()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['this_tittle']		= 'Inventory | Penjualan';
			$data['getrekap']			= 'Yes';
			$data['rekapperday']		= 'Yes';
			$dari 	= date('Y-m-d') . " 00:00:00";
			$sampai	= date('Y-m-d') . " 23:59:59";
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

			$this->load->view('penjualan/rekap_penjualan', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function rekapmonth()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['this_tittle']		= 'Inventory | Penjualan';
			$data['getrekap']			= 'Yes';
			$data['rekappermonth']		= 'Yes';

			$data['datapenjualan']		= $this->db->query("SELECT
															penjualan.penjualanid,
															penjualan.jumlah,
															penjualan.hargajual,
															penjualan.diskon,
															penjualan.customerid,
															penjualan.tgltransaksi,
															customer.namacustomer,
															customer.namatoko
															FROM
															penjualan
															INNER JOIN customer ON penjualan.customerid = customer.customerid
															WHERE penjualan.datetime LIKE '%".date('Y-m')."%'
															");

			$this->load->view('penjualan/rekap_penjualan', $data);
		}else{
				redirect('v1/logout');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
