<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

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
	public function toFrontPage()
	{
		$data['title']="Front Page";
		$data['stasiun'] = $this->M_Guest->getDataStation()->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('guest/frontPage');
		$this->load->view('template/footer');
	}

	public function toConfirmPage()
	{	
		if(isset($_GET['kode'])):
			$kode = $_GET['kode'];
			$data['no_tiket'] = $this->M_Guest-> getPembayaranWhere($kode)->row();
			$data['detail'] = $this->M_Guest->confirmCheckModel($data['no_tiket']->no_tiket)->result();
		endif;
		$data['title'] = "Confirm Page";
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar');
		$this->load->view('guest/confirmPage');
		$this->load->view('template/footer');
	}

	public function kirim()
	{
		// echo "hello";
		// die();
		// // die();
		$data = array(
			'asal' => $this->input->post('asal'),
			'tujuan' => $this->input->post('tujuan'),
		);
		// $data['tanggal'] = date_create($data['tanggal']);
		// $data['tanggal'] = date(strtotime($data['tanggal'], "yyyy-m-d h:i:s"));
		// var_dump($data);
		// die();
		$data['tiket'] = $this->M_Guest->cari_tiket($data)->result();
		$data['penumpang'] = $this->input->post('jumlah');
	
		$data['title']="Front Page";
		$data['stasiun'] = $this->M_Guest->getDataStation()->result();
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die();

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('guest/frontPage');
		$this->load->view('template/footer');
	}

	public function pesan($id)
	{
		$data['title']="Formulir Data Diri";
		$data['info'] = $this->M_Guest->getDataInfoPesan($id)->row();
	
		$data['id_jadwal'] = $id;

		$this->load->view('template/header',	$data);
		$this->load->view('template/navbar');
		$this->load->view('guest/data_diri');
		$this->load->view('template/footer');
	}

	public function pesanTiket()
	{
		$penumpang = $this->input->post('penumpang');

		// generate no pembayaran

		$cek = $this->M_Guest->getTiket()->num_rows() +1 ;
		// generate nomor tiket

		$no_pembayaran = 'AC246' . $cek;
		
		$harga = $this->input->post('harga');

		$total_pembayaran = $penumpang * $harga;

		$cek = $this->M_Guest->getTiket()->num_rows() + 1;
		$no_tiket ='TOO'. $cek;

		// input data penumpang
		for($i = 1; $i <= $penumpang; $i++)
		{
			$data = array(
				'nomor_tiket' => $no_tiket,
				'nama' => $this->input->post('nama' . $i),
				'no_identitas' => $this->input->post('identitas' . $i)
			);

			$this->M_Guest->insertPenumpang($data);
		}

		// input pembayaran

		$data = array(
			'no_pembayaran' => $no_pembayaran,
			'total_pembayaran' => $total_pembayaran,
			'status' => 0,
			'no_tiket' => $no_tiket
		);

		$this->M_Guest->insertPembayaran($data);

		// input data pemesan

		$data = array(
			'nomor_tiket' => $no_tiket,
			'id_jadwal' => $this->input->post('id_jadwal'),
			'nama_pemesan' => $this->input->post('nama_pemesan'),
			'email' => $this->input->post('email'),
			'no_telepon' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat')
		);

		$this->M_Guest->insertPemesan($data);
		$this->session->set_flashdata('nomor', $no_pembayaran);
		$this->session->set_flashdata('total', $total_pembayaran);
		redirect('payment', $total_pembayaran);
	}

	public function toPaymentPage(){

		$data['title'] = "Konfirmasi Pembayaran Tiket";

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar');
		$this->load->view('guest/payment');
		$this->load->view('template/footer');
	}

	public function confirmCheck()
	{
		$kode = $this->input->post('kode');
		

		redirect('confirm?kode=' . $kode);
	}

	public function pictureCheck()
	{

		//upload gambar

		$config['upload_path']          = './assets/bukti/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048; //2mb
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar'))
                {
                        // $error = array('error' => $this->upload->display_errors());

                        // redirect('confirm', $error);

						echo "<pre>";
						print_r($this->upload->display_errors());
						exit();
                }
                else
                {
                        $data = $this->upload->data();
						$filename = $data['file_name'];

						$no = $this->input->post('no_pembayaran');
						$this->M_Guest->insertBukti($filename, $no);

						$this->session->set_flashdata('pesan', 'Berhasil mengirim bukti, silahkan cek kembali 12 jam kemudian');

                        redirect('Guest/toConfirmPage');
                }

		// pemilihan kursi

		$data = array(
			'gerbong' => $this->input->post('gerbong'),
			'bagian' => $this->input->post('bagian'),
			'kursi' => $this->input->post('kursi'),
		);

		$this->M_Guest->pickSeat($data, $no);

	}
}
