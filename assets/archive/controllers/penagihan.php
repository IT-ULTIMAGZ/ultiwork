<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penagihan extends CI_Controller {

	private function _gen_pdf($html,$paper='A6')
	{
		//ob_end_clean();
		$this->load->library('MPDF56/mpdf');
		$mpdf=new mPDF('utf-8', $paper, '12px','',5,5,5,5,3,3);
		$mpdf->debug = true;
		
		$mpdf->setHTMLFooter('<div><span style="float:left;font-size:12px;">&copy; 2016 Inventory</span></div>');
		$mpdf->WriteHTML($html);

		$tanggal = date('d-m-Y H:i:s');

		$mpdf->Output("[StrukBayarCicilan]_[$tanggal].pdf",'I');

		$this->session->set_flashdata('sukses','Data Baru Penagihan Berhasil Di Input dan Struk Sukses Disimpan');
	}

	public function getpenagihan($pdf=true)
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['tagihanid']				= $this->input->post('id');
			$tampung['tagihanid']			= $this->input->post('id');
			$tampung['penjualanid']			= $this->input->post('nopenjualan');
			$tampung['tglbayar']			= date('Y-m-d');
			$tampung['bayar']				= $this->input->post('dibayar');
			$tampung['sisa']				= $this->input->post('sisabayar');
			$tampung['petugasid']			= $this->session->userdata('petugasid');
			$id 							= $this->input->post('nopenjualan');
			$sisa 							= $this->input->post('sisabayar');
			$query_cek = $this->db->get_where('tagihan', $cek);

			if(isset($_POST['simpan'])){

				if ($query_cek->num_rows > 0)
				{
					$this->session->set_flashdata('gagal','Data Penagihan Sudah Di Input Kan Sebelumnya</strong>');
				}
				else
				{
					$this->db->insert('tagihan',$tampung);
					
					if($sisa == 0){
					$this->db->query("update penjualan set ketpembayaran=1 where penjualanid='".$id."'");
					}

					$this->session->set_flashdata('sukses','Data Baru Penagihan Berhasil Di Input</strong>');
				}

				redirect('penagihan');
			}
			elseif(isset($_POST['save']))
			{
				if ($query_cek->num_rows > 0)
				{
					$this->session->set_flashdata('gagal','Data Penagihan Sudah Di Input Kan Sebelumnya</strong>');
				}
				else
				{
					$this->db->insert('tagihan',$tampung);
					
					if($sisa == 0){
					$this->db->query("update penjualan set ketpembayaran=1 where penjualanid='".$id."'");
					}

					$this->session->set_flashdata('sukses','Data Baru Penagihan Berhasil Di Input</strong>');

					$isi['content']				= 'penagihan/print_struk_p';
						
					$isi['penjualanid']			= $this->input->post('nopenjualan');
					$isi['tglbayar']			= date('Y-m-d');
					$isi['bayar']				= $this->input->post('dibayar');
					$isi['sisa']				= $this->input->post('sisabayar');
					
					$output = $this->load->view('tampilan_print', $isi, true);

					return $this->_gen_pdf($output);
				}

				redirect('penagihan');
			}
		}else{
			redirect('v1/logout');
		}
	}
	
	public function deletepenagihan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$this->db->where('tagihanid', $data);
			$query = $this->db->get('tagihan');
			if($query->num_rows() > 0){
				$this->db->where('tagihanid',$data);
				$this->db->delete('tagihan');
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('penagihan');
			}
			else
			{
				redirect('penagihan');
			}
		}else{
			redirect('v1/logout');
		}
	}

	public function tampil_data_tagihan() {
        $kode = $this->uri->segment(3);
        $query = $this->db->query("SELECT
									penjualan.penjualanid,
									customer.namacustomer,
									item.category,
									penjualan.hargajual
									FROM
									penjualan
									INNER JOIN customer ON penjualan.customerid = customer.customerid 
									INNER JOIN pembelian ON penjualan.kodepembelian = pembelian.kodepembelian
									INNER JOIN item ON pembelian.itemid = item.itemid
									WHERE 
									penjualan.ketpembayaran != '1'
									AND
									penjualan.customerid != '0'
									AND
									penjualan.penjualanid 
									LIKE '%".$kode."%' ");
 		$selectmin = $this->db->query("SELECT MIN(sisa) AS sisabayar FROM tagihan WHERE penjualanid LIKE '%".$kode."%'");

        foreach($query->result() as $row)
		{
			
			foreach ($selectmin->result() as $roww) {
        	
        	$sisabayar = $roww->sisabayar;
			$arr['query'] = $kode;//." (".$date.")"
			$arr['suggestions'][] = array(
				'value'	=> $row->penjualanid,
				'namacus' => $row->namacustomer,
				'items' => $row->category,
				'hargabeli' => $row->hargajual,
				'sisaygdibayar' => $sisabayar
			);

			}
		}

		echo json_encode($arr);
    }

    public function cektagihan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Penagihan';
			$data['link_sub_judul1']	= 'pengihan';
			$data['sub_judul2']			= 'Cek Penagihan';
			$data['link_sub_judul2']	= 'penagihan/cektagihan';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Penagihan';
			$data['judul_halaman']		= 'Cek Penagihan';
			$data['content']			= "penagihan/cek_penagihan";
			$data['active']				= "penagihan";
			$data['datatable']			= "yes";

			$data['datapenagihan']		= $this->db->query("SELECT
															penjualan.penjualanid,
															penjualan.jumlah,
															penjualan.hargajual,
															penjualan.diskon,
															penjualan.customerid,
															penjualan.metodepembayaran,
															penjualan.tgltransaksi,
															penjualan.tgljatuhtempo,
															penjualan.buktitransaksi,
															penjualan.keterangan,
															penjualan.bayar,
															customer.namacustomer,
															customer.telpcustomer
															FROM
															penjualan
															INNER JOIN customer ON penjualan.customerid = customer.customerid
															WHERE penjualan.bayar='0' AND penjualan.buktitransaksi= ''
															");

			$this->load->view('theme_sentral', $data);
		}else{
				redirect('v1/logout');
		}
	}

	public function editpenagihan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Penagihan';
			$tampilkan['link_sub_judul1']	= 'penagihan';
			$tampilkan['sub_judul2']		= 'Update Tagihan';
			$tampilkan['link_sub_judul2']	= 'penagihan/editpenagihan/'.$data;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | Penagihan';
			$tampilkan['judul_halaman']		= 'Penagihan';
			$tampilkan['content']			= "penagihan/edit_penagihan";
			$tampilkan['active']			= "penagihan";
			$tampilkan['validation']		= "yes";

			$query = $this->db->query("SELECT
										penjualan.penjualanid,
										penjualan.tgltransaksi,
										penjualan.tgljatuhtempo,
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
					$tampilkan['namacustomer']	= $row->namacustomer;
				}
			}
			else
			{
				$tampilkan['id']			= '';
				$tampilkan['tgltransaksi']	= '';
				$tampilkan['jatuhtempo']	= '';
				$tampilkan['namacustomer']	= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	public function updatetagihan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$config = array(
						'upload_path' 	=> 'assets/lampiranpembayaran/',
						'allowed_types' => 'jpg|jpeg|png|gif|pdf',
						'max_size'		=> '5000'
						);

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('buktitransaksi'))
			{
				$this->session->set_flashdata('gagal','<strong>Update</strong> Pembayaran Tagihan <strong>Gagal</strong>');
			}
			else
			{
				$upload_data = $this->upload->data();

				$cek['penjualanid']				= $this->input->post('penjualan');
				$tampung['buktitransaksi']		= $_FILES['buktitransaksi']['name'];
				$tampung['bayar']				= 1;

				$query_cek = $this->db->get_where('penjualan', $cek);

				if ($query_cek->num_rows > 0)
				{
					$this->db->update('penjualan',$tampung,$cek);
					$this->session->set_flashdata('sukses','Update Pembayaran Tagihan Berhasil</strong>');
				}
				else
				{
					$this->session->set_flashdata('gagal','Pembayaran Tagihan Sudah Di Konfirmasi Sebelumnya</strong>');
				}

				redirect('penagihan/cektagihan');
			}
		}else{
			redirect('v1/logout');
		}
	}

	public function getcektagihan()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Penagihan';
			$data['link_sub_judul1']	= 'penagihan';
			$data['sub_judul2']			= 'Cek Penagihan';
			$data['link_sub_judul2']	= 'penagihan/cektagihan';
			$data['sub_judul3']			= 'Hasil Cek Tagihan';
			$data['link_sub_judul3']	= 'penagihan/getcektagihan?cek='.$this->input->get('cek');
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Pembelian';
			$data['judul_halaman']		= 'Hasil Rekap Penagihan';
			$data['content']			= "penagihan/cek_penagihan";
			$data['active']				= "penagihan";
			$data['datatable']			= "yes";
			$data['getcektagihan']			= "yes";

			$cek 						= $this->input->get('cek');
			$data['datapenagihan']		= $this->db->query("SELECT * FROM tagihan WHERE penjualanid='".$cek."'");

			$this->load->view('theme_sentral', $data);
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
			$data['sub_judul1']			= 'Penagihan';
			$data['link_sub_judul1']	= 'penagihan';
			$data['sub_judul2']			= 'Rekap';
			$data['link_sub_judul2']	= 'penagihan/rekap';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Penagihan';
			$data['judul_halaman']		= 'Rekap Penagihan';
			$data['content']			= "penagihan/rekap_penagihan";
			$data['active']				= "penagihan";
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
			$data['sub_judul1']			= 'Penagihan';
			$data['link_sub_judul1']	= 'penagihan';
			$data['sub_judul2']			= 'Rekap';
			$data['link_sub_judul2']	= 'penagihan/rekap';
			$data['sub_judul3']			= 'Hasil Rekap';
			$data['link_sub_judul3']	= 'penagihan/getrekap?start='.$this->input->get('start').'&end='.$this->input->get('end');
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Pembelian';
			$data['judul_halaman']		= 'Hasil Rekap Penagihan';
			$data['content']			= "penagihan/rekap_penagihan";
			$data['active']				= "penagihan";
			$data['datatable']			= "yes";
			$data['getrekap']			= "yes";

			$dari 	= $this->input->get('start') . " 00:00:00";
			$sampai	= $this->input->get('end')  . " 23:59:59";
			$data['datapenagihan']		= $this->db->query("SELECT
															*
															FROM
															tagihan
															WHERE ( datetime BETWEEN '".$dari."' AND '".$sampai."' )
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