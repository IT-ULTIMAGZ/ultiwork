<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2" || $this->session->userdata('level') == "3"){
			$this->load->library('encryption');

			$data['judul']				= 'Dashboard';
			$data['link_judul']			= 'v1/dashboard';
			$data['sub_judul1']			= 'Customer';
			$data['link_sub_judul1']	= 'customer';
			$data['sub_judul2']			= '';
			$data['link_sub_judul2']	= '';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Customer';
			$data['judul_halaman']		= 'Customer';
			$data['content']			= "customer/view_customer";
			$data['active']				= "customer";
			$data['datatable']			= "yes";
			$data['datacustomer']		= $this->db->query("SELECT
															customer.customerid,
															customer.namacustomer,
															customer.namatoko,
															customer.alamatcustomer,
															customer.telpcustomer,
															customer.petugasid,
															customer.datetime,
															petugas.nmpetugas
															FROM
															customer
															INNER JOIN petugas ON customer.petugasid = petugas.petugasid
															WHERE customer.alamatcustomer != '-' AND customer.namacustomer != 'non-customer' AND customer.telpcustomer != '-'
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
			$data['sub_judul1']			= 'Customer';
			$data['link_sub_judul1']	= 'customer';
			$data['sub_judul2']			= 'Tambah';
			$data['link_sub_judul2']	= 'customer/tambah';
			$data['sub_judul3']			= '';
			$data['link_sub_judul3']	= '';
			$data['sub_judul4']			= '';
			$data['link_sub_judul4']	= '';
			$data['sub_judul5']			= '';
			$data['link_sub_judul5']	= '';

			$data['this_tittle']		= 'Inventory | Customer';
			$data['judul_halaman']		= 'Form Input Customer';
			$data['content']			= "customer/input_customer";
			$data['active']				= "customer";
			$data['validation']			= "yes";

			$this->load->view('theme_sentral', $data);
		}else{
			redirect('v1/logout');
		}
	}

	public function getcustomer()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['customerid']				= $this->input->post('kode');
			$tampung['customerid']			= $this->input->post('kode');
			$tampung['namacustomer']		= $this->input->post('namacustomer');
			$tampung['namatoko']			= $this->input->post('namatoko');
			$tampung['alamatcustomer']		= $this->input->post('alamat');
			$tampung['telpcustomer']		= $this->input->post('notelp');
			$tampung['petugasid']			= $this->session->userdata('petugasid');

			$query_cek = $this->db->get_where('customer', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->session->set_flashdata('gagal','Data customer Sudah Di Input Kan Sebelumnya</strong>');
			}
			else
			{
				$this->db->insert('customer',$tampung);
				$this->session->set_flashdata('sukses','Data Baru customer Berhasil Di Input</strong>');
			}

			redirect('customer');
		}else{
			redirect('v1/logout');
		}
	}
	public function updatecustomer()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$cek['customerid']				= $this->input->post('id');
			$tampung['customerid']			= $this->input->post('id');
			$tampung['namacustomer']		= $this->input->post('namacustomer');
			$tampung['namatoko']			= $this->input->post('namatoko');
			$tampung['alamatcustomer']		= $this->input->post('alamat');
			$tampung['telpcustomer']		= $this->input->post('notelp');

			$query_cek = $this->db->get_where('customer', $cek);

			if ($query_cek->num_rows > 0)
			{
				$this->db->update('customer',$tampung,$cek);
				$this->session->set_flashdata('sukses','Data customer Berhasil di Update</strong>');
			}
			else
			{
				$this->session->set_flashdata('gagal','Data Tidak Tersedia Untuk di Update</strong>');
			}

			redirect('customer');
		}else{
			redirect('v1/logout');
		}
	}
	
	public function editcustomer()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$tampilkan['judul']				= 'Dashboard';
			$tampilkan['link_judul']		= 'v1/dashboard';
			$tampilkan['sub_judul1']		= 'Customer';
			$tampilkan['link_sub_judul1']	= 'customer';
			$tampilkan['sub_judul2']		= 'Edit';
			$tampilkan['link_sub_judul2']	= 'customer/editcustomer/'.$get;
			$tampilkan['sub_judul3']		= '';
			$tampilkan['link_sub_judul3']	= '';
			$tampilkan['sub_judul4']		= '';
			$tampilkan['link_sub_judul4']	= '';
			$tampilkan['sub_judul5']		= '';
			$tampilkan['link_sub_judul5']	= '';

			$tampilkan['this_tittle']		= 'Inventory | Customer';
			$tampilkan['judul_halaman']		= 'Form Edit Customer';
			$tampilkan['content']			= "customer/edit_customer";
			$tampilkan['active']			= "customer";
			$tampilkan['datatable']			= "yes";
			$tampilkan['tambahitem']		= "yes";

			$this->db->where('customerid', $data);
			$query = $this->db->get('customer');
			if($query->num_rows() > 0){
				foreach ($query->result() as $row)
				{
					$tampilkan['id']		= $row->customerid;
					$tampilkan['namacustomer']	= $row->namacustomer;
					$tampilkan['namatoko']	= $row->namatoko;
					$tampilkan['alamat']	= $row->alamatcustomer;
					$tampilkan['notelp']	= $row->telpcustomer;
				}
			}
			else
			{
				$tampilkan['id']		= '';
				$tampilkan['namacustomer']		= '';
				$tampilkan['namatoko']	= '';
				$tampilkan['alamat']	= '';
				$tampilkan['notelp']	= '';
			}
			$this->load->view('theme_sentral', $tampilkan);
		}else{
			redirect('v1/logout');
		}
	}

	

	public function deletecustomer()
	{
		$this->model_security->getsecurity();

		if($this->session->userdata('level') == "1" || $this->session->userdata('level') == "2"){ 
			$this->load->library('encryption');
			$get = $this->uri->segment(3);
			$data	= $this->encryption->decode($get);

			$this->db->where('customerid', $data);
			$query = $this->db->get('customer');
			if($query->num_rows() > 0){

				$this->db->where('customerid',$data);
				$this->db->delete('customer');
				$this->session->set_flashdata('sukses','Hapus Data Sukses</strong>');
				redirect('customer');
			}
			else
			{
				redirect('customer');
			}
		}else{
			redirect('v1/logout');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */