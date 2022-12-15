<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function toLoginPage()
	{
		$data['title']="Login";

		$this->load->view('template/header', $data);
		$this->load->view('admin/loginPage');
		$this->load->view('template/footer');
		
	}

	public function login()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			
		);

		// var_dump($data);

		// die();
		
		$cek = $this->M_Admin->cekLogin($data);

		if($cek > 0){
			$sess = array(
				'status'=>TRUE,
				'level' => 'admin',
			);
			// SET USER DATA SESSION
			$this->session->set_userdata($sess);
			redirect(base_url('admin/dashboard'));
		} else {
			redirect(base_url('login'));
		}
	}

	public function toDashboard()
	{	
		$data['title'] = "Dashboard";
		$data['stasiun'] = $this->M_Admin->getDataStasiun();

		if($this->session->status === TRUE)
		{
			$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();
			$this->load->view('admin/dashboard', $data);
		} else 
		{
			redirect(base_url());
		}
	}

	public function toManagePage()
	{
		$data['title'] = "Kelola Jadwal";
		$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();
		$data['jadwal'] = $this->M_Admin->get_jadwal()->result();
		
		
		// var_dump($data['jadwal']);
		// die();
		$this->load->view('admin/kelola-jadwal', $data);
	}

	public function manageSchedule()
	{
		$data=array(
			'nama_kereta' => $this->input->post('nama_kereta'),
			'asal' => $this->input->post('asal'),
			'tujuan' => $this->input->post('tujuan'),
			'tgl_berangkat' => $this->input->post('tgl_berangkat'),
			'tgl_sampai' => $this->input->post('tgl_sampai'),
			'kelas' => $this->input->post('kelas'),
			'harga' => $this->input->post('harga')
		);

		$this->M_Admin->tambah_jadwal($data);
		// var_dump($data);
		// die();
		$data['jadwal'] = $this->M_Admin->get_jadwal()->result();
		$this->load->view('admin/kelola-jadwal', $data);

	}

	public function toEditSchedulePage($id)
	{
		$data['data_edit'] = $this->M_Admin->getDataEditJadwal($id)->row();
		$data['title'] = "Edit Page";
		$data['jadwal'] = $this->M_Admin->get_jadwal()->result();
		$data['stasiun'] = $this->M_Admin->getDataStasiun()->result();

		// var_dump($data['data_edit']);
		// die();

		$this->load->view('admin/edit-jadwal', $data);
	}

	public function editSchedule()
	{
		$data=array(
			'nama_kereta' => $this->input->post('nama_kereta'),
			'asal' => $this->input->post('asal'),
			'tujuan' => $this->input->post('tujuan'),
			'tgl_berangkat' => $this->input->post('tgl_berangkat'),
			'tgl_sampai' => $this->input->post('tgl_sampai'),
			'nama_kereta' => $this->input->post('nama_kereta'),
			'kelas' => $this->input->post('kelas'),
		);

		$success = $this->M_Admin->edit_jadwal($data);

		if($success){
			redirect(base_url('admin/dashboard/kelola-jadwal'));
		}


	}

	public function deleteSchedule($id)
	{
		

		$this->M_Admin->deleteJadwal($id);

		redirect(base_url('admin/dashboard/kelola-jadwal'));

	}

	public function logout()
	{
		foreach ($_SESSION as $key) {
			unset($_SESSION[$key]);
		  }
		redirect(base_url('/'));
	}

	public function addStation()
	{
		$nama = $this->input->post('nama_stasiun');

		// ucfirst($nama);

		// var_dump($nama);

		// die();
		$input = $this->M_Admin->tambah_stasiun($nama);

		if($input){
			redirect(base_url('admin/dashboard'));
		}
	}

	public function deleteStation($id)
	{
		$delete = $this->M_Admin->delete_station($id);
		// var_dump($delete);
		// die();
		redirect(base_url('admin/dashboard'));
	}
	public function updateStation($id)
	{
		$data['data_stasiun'] = $this->M_Admin->getDataEditStasiun($id)->row();


		// var_dump($data);
		// die();
		$this->load->view('admin/edit_station', $data);
	}

	public function editStation()
	{
		$nama = $this->input->post('nama_stasiun');

		$edit = $this->M_Admin->editStasiun($nama);

		redirect(base_url('admin/dashboard'));
	}

	
	
}
