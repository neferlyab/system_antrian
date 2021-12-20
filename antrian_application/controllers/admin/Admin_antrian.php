<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin_antrian extends CI_Controller
{
	protected $data;
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('logins', 'refresh');
		}
		$this->load->model('antrian_model');
		$this->user = $this->ion_auth->user()->row();
	}

	function tellerpanggil()
	{
		$data['getdokter']		 = $this->antrian_model->getdokter($this->user->iddokter);
		$data['getnomorantrian'] = $this->antrian_model->getnomorantrian();
		$data['getbagian']    	 = $this->antrian_model->getbagianpanel();
		$data['getulangan']	  	 = $this->antrian_model->getantrianulang($this->user->id, $this->user->bagian);
		$this->load->view('template/admin/cs/home', $data);
	}

	function saveAntrianLog()
	{
		$kolom = array(
			'id'			=> (int) $this->input->post('idantrian', TRUE),
			'no_antrian'	=> $this->input->post('nomor', TRUE),
			'bagian'		=> $this->input->post('bagiane', TRUE),
			'aktif'			=> (int) 1,
			'loket'			=> strtolower($this->input->post('loket', TRUE)),
			'tanggal'		=> date('Y-m-d H:i:s'),
			'iduser'		=> (int) $this->user->id,
		);
		$result = array('status' => FALSE, 'msg' => 'Gagal');
		if ($this->db->insert('antrianlog', $kolom)) {
			$result = array('status' => TRUE, 'msg' => 'Berhasil');
		}

		echo json_encode($result, true);
	}

	function updateloket()
	{
		$bagian 	= $this->input->post('loket');
		$idantrian 	= (int) $this->input->post('idantrian');
		$nomor 		= $this->input->post('nomor');
		$this->antrian_model->updateloket($bagian, $nomor, $this->user->id, $idantrian);
	}
}