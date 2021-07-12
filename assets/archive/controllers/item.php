<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');

			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Item';
			$data['link_sub_judul1']	= 'item';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Item';
			$data['judul_halaman']		= "Item&nbsp;&nbsp;&nbsp;<a class='btn btn-primary btn-xs tooltips' href='".base_url()."item/tambah' data-placement='right' data-toggle='tooltip' data-original-title='Tambah Item'><i class='fa fa-plus fa-lg'></i></a>";
			$data['content']			= "item/view_item";
			$data['active']				= "item";
			$data['datatable']			= "yes";
			$data['dataitem']			= $this->db->get('item');
			
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
			$data['sub_judul1']			= 'Item';
			$data['link_sub_judul1']	= 'item';
			$data['sub_judul2']			= 'Tambah';
			$data['link_sub_judul2']	= 'item/tambah';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Item';
			$data['judul_halaman']		= 'Form Input Item';
			$data['content']			= "item/input_item";
			$data['active']				= "item";
			$data['validation']			= "yes";
			$data['tambahitem']			= "yes";

			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function getitem()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['itemid']				= $this->input->post('kode');
			$tampung['itemid']			= $this->input->post('kode');
			$tampung['namaitem']		= $this->input->post('namaitem');
			$tampung['ukuran']			= $this->input->post('ukuran');
			$tampung['hargabeli']		= $this->input->post('beli');
			$tampung['hargajual']		= $this->input->post('jual');
			$tampung['totalitem']		= $this->input->post('total_item');
			$tampung['petugasid']		= $this->session->userdata('petugasid');

			$query_cek = $this->db->get_where('item', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data Item Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('item',$tampung);
				$this->session->set_flashdata('sukses','Data Baru Item Berhasil Di Input</strong>');
			}

			redirect('item');
		}else{
			redirect('v1/logout');
		}
	}
	public function updateitem()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "4"){
			$cek['itemid']				= $this->input->post('id');
			$tampung['namaitem']		= $this->input->post('namaitem');
			$tampung['ukuran']			= $this->input->post('ukuran');
			$tampung['hargabeli']		= $this->input->post('beli');
			$tampung['hargajual']		= $this->input->post('jual');
			$tampung['totalitem']		= $this->input->post('total_item');

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
	
	public function edititem()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "4"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Item';
			$tampilkan['link_sub_judul1']	= 'item';
			$tampilkan['sub_judul2']		= 'Edit';
			$tampilkan['link_sub_judul2']	= 'item/edititem/'.$get;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | Item';
			$tampilkan['judul_halaman']		= 'Form Edit Item';
			$tampilkan['content']			= "item/edit_item";
			$tampilkan['active']			= "item";

			$this->db->where('itemid', $data);
			$query = $this->db->get('item');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']			= $row->itemid;
					$tampilkan['namaitem']		= $row->namaitem;
					$tampilkan['ukuran']		= $row->ukuran;
					$tampilkan['beli']			= $row->hargabeli;
					$tampilkan['jual']			= $row->hargajual;
					$tampilkan['total_item']	= $row->totalitem;
				}
			}
			else
			{
				$tampilkan['id']			= '';
				$tampilkan['namaitem']		= '';
				$tampilkan['ukuran']		= '';
				$tampilkan['beli']			= '';
				$tampilkan['jual']			= '';
				$tampilkan['total_item']	= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	

	public function deleteitem()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$this->db->where('itemid', $data);
			$query = $this->db->get('item');
			if($query->num_rows() > 0){

				$this->db->where('itemid',$data);
				$this->db->delete('item');
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('item');
			}
			else
			{
				redirect('item');
			}
		}else{
			redirect('v1/logout');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */