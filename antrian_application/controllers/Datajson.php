<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Datajson extends CI_Controller
{
	private $user;
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'download'));
		//$this->load->library(array('M_pdf','Api'));
		$this->load->model(array('model', 'antrian_model'));
		$this->user = $this->ion_auth->user()->row();
	}

	function getpasien()
	{
		$this->db->select('norm');
		$this->db->from('pasien');
		$kueri = $this->db->get()->result();
		echo json_encode($kueri, TRUE);
	}
	function getjaminan()
	{
		$kd = intval($this->input->post('kd', TRUE));
		$kueri = $this->model->getdatawhere('perusahaan', 'idkategori', $kd);
		echo json_encode($kueri, true);
	}

	function _cekPendaftaran($norm, $poli)
	{
		$kueri = $this->db->get_where("antrian", array('norm' => $norm, 'date(tanggal)' => date('Y-m-d'), 'kode' => $poli))->num_rows();
		return ($kueri > 0) ? (bool)FALSE : (bool)TRUE;
	}
	function _cekPendaftaranPelayanan($nama)
	{
		$kueri = $this->db->get_where("antrian", array('nama_pasien' => strtolower(strip_tags($nama)), 'date(tanggal)' => date('Y-m-d')))->num_rows();
		return ($kueri > 0) ? (bool)FALSE : (bool)TRUE;
	}

	function simpandaftar()
	{
		if (!isset($_POST)) {
			show_404();
		} else {
			$this->_resetnomor();
			$pesan = array();
			$caradaftar = ($this->ion_auth->logged_in() && $this->ion_auth->in_group('daftarlangsung')) ? 'Langsung' : 'Online';
			$validasi = ($this->ion_auth->logged_in() && $this->ion_auth->in_group('daftarlangsung')) ? 1 : 0;

			$kolom = array(
				'nomor'			=> $this->model->kode(5),
				'kode'			=> $this->input->post('poli'),
				'iddokter'		=> $this->input->post('dokter'),
				'validasi'		=> (int) $validasi,
				'bagian'		=> strtolower($this->input->post('jenisLayanan')),
				'idprsh'		=> $this->input->post('jenispasien'),
				'tanggal'		=> date('Y-m-d', strtotime($this->input->post('tanggal'))) . ' ' . date('H:i:s'),
				'jenispasien'	=> $this->input->post('jnspasien'),
				'cara_daftar'	=> $caradaftar,
				'nama_pasien'	=> $this->input->post('namapasien'),
				'norm'			=> $this->input->post('norm'),
				'posisi'		=> 'Poli',
			);
			$this->form_validation->set_rules('poli', 'Poliklinik', 'required');
			$this->form_validation->set_rules('dokter', 'Dokter', 'required');
			$this->form_validation->set_rules('tanggal', 'Tanggal periksa', 'required');
			if ($this->form_validation->run() == TRUE) {

				if ($this->_cekPendaftaran($this->input->post('norm'), $this->input->post('poli'))) {
					if ($this->db->insert('antrian', $kolom)) {
						$lastid = $this->db->insert_id();
						$this->db->query('UPDATE kode SET nomor=nomor+1 WHERE idkode=5');

						$kolomdtl = array(
							array(
								'id'		=> $lastid,
								'noantrian'	=> $this->model->kode(2),
								'jenis'		=> 'Pendaftaran',
							),
							array(
								'id'		=> $lastid,
								'noantrian'	=> $this->model->kodedokter($this->input->post('dokter', true)),
								'jenis'		=> 'Poli',
							),
						);

						if ($this->db->insert_batch('antriandtl', $kolomdtl)) {
							$this->db->query('UPDATE kode SET nomor=nomor+1 WHERE idkode=2');
							$this->db->query("UPDATE dokter SET kode_no=kode_no+1 WHERE `iddokter`='" . $this->input->post('dokter', true) . "'");

							$kueripost = $this->db->select("norm,tanggal,kode,iddokter,idprsh,jenispasien")
								->from("antrian")
								->where("id", $lastid)
								->get();
							if ($kueripost->num_rows() > 0) {
								$rowantrian = $kueripost->row();
								if ($rowantrian->jenispasien == 'lama') {
									$datapost = array(
										'faktur_rawatjalan' => $this->antrian_model->kode(1),
										'norm'          => $rowantrian->norm,
										'tglmasuk'      => $rowantrian->tanggal,
										'kodepoli'      => $rowantrian->kode,
										'iddokter'      => $rowantrian->iddokter,
										'idprsh'        => $rowantrian->idprsh,
									);

									$get_data = $this->api->callApi('POST', $this->config->item('urlapi') . 'rawatjalan', json_encode($datapost));
									$response = json_decode($get_data, true);
									if ($response["status"]) {
										$this->db->query("update kode set nomor=nomor+1 where idkode=1");
										$this->db->query("update antrian set status=1 where id='" . $lastid . "'");
										$pesan = array('status' => true, 'msg' => 'berhasil', 'id' => (int) $lastid);
									} else {
										$this->db->query("delete from antrian where id='" . $lastid . "'");
										$pesan = array('status' => false, 'msg' => 'gagal');
									}
								}
							}
						} else {
							$pesan = array('status' => false, 'msg' => 'gagal');
						}
					} else {
						$pesan = array('status' => false, 'msg' => 'gagal');
					}
				} else {
					$pesan = array('status' => false, 'msg' => 'Tidak diperbolehkan mendaftar dua kali di dalam poli yang sama');
				}
			} else {
				$pesan = array('status' => false, 'msg' => strip_tags(validation_errors()));
			}
			echo json_encode($pesan, TRUE);
		}
	}

	function daftarPelayananInformasi()
	{
		if (!isset($_POST)) {
			show_404();
		} else {
			$this->_resetnomor();
			$pesan = array();
			$caradaftar = ($this->ion_auth->logged_in() && $this->ion_auth->in_group('daftarlangsung')) ? 'Langsung' : 'Online';
			$validasi = ($this->ion_auth->logged_in() && $this->ion_auth->in_group('daftarlangsung')) ? 1 : 0;

			$kolom = array(
				'nomor'			=> $this->model->kode(5),
				'validasi'		=> (int) $validasi,
				'tanggal'		=> date('Y-m-d') . ' ' . date('H:i:s'),
				'cara_daftar'	=> $caradaftar,
				'nama_pasien'	=> strtolower(strip_tags($this->input->post('namapsn'))),
				'posisi'		=> 'Pelayanan',
				'loket'			=> 1,
			);

			if ($this->_cekPendaftaranPelayanan($this->input->post('namapsn', TRUE))) {
				if ($this->db->insert('antrian', $kolom)) {
					$lastid = $this->db->insert_id();
					$this->db->query('UPDATE kode SET nomor=nomor+1 WHERE idkode=5');

					$kolomdtl = array(
						array(
							'id'		=> $lastid,
							'noantrian'	=> $this->model->kode(3),
							'jenis'		=> 'Pelayanan',
						),
					);

					if ($this->db->insert_batch('antriandtl', $kolomdtl)) {
						$this->db->query('UPDATE kode SET nomor=nomor+1 WHERE idkode=3');

						if ($this->db->affected_rows() > 0) {
							$pesan = array('status' => true, 'msg' => 'berhasil', 'id' => (int) $lastid);
						}
					} else {
						$pesan = array('status' => false, 'msg' => 'gagal');
					}
				} else {
					$pesan = array('status' => false, 'msg' => 'gagal');
				}
			} else {
				$pesan = array('status' => false, 'msg' => 'Anda sudah mengambil antrian');
			}
			echo json_encode($pesan, TRUE);
		}
	}

	function daftarPelayananSep()
	{
		if (!isset($_POST)) {
			show_404();
		} else {
			$this->_resetnomor();
			$pesan = array();
			$caradaftar = ($this->ion_auth->logged_in() && $this->ion_auth->in_group('daftarlangsung')) ? 'Langsung' : 'Online';
			$validasi = ($this->ion_auth->logged_in() && $this->ion_auth->in_group('daftarlangsung')) ? 1 : 0;

			$kolom = array(
				'nomor'			=> $this->model->kode(5),
				'validasi'		=> (int) $validasi,
				'tanggal'		=> date('Y-m-d') . ' ' . date('H:i:s'),
				'cara_daftar'	=> $caradaftar,
				'nama_pasien'	=> strtolower(strip_tags($this->input->post('namapsn'))),
				'posisi'		=> 'Pelayanan',
				'kode'			=> $this->input->post('poli'),
				'loket'			=> 2,
			);

			if ($this->_cekPendaftaranPelayanan($this->input->post('namapsn', TRUE))) {
				if ($this->db->insert('antrian', $kolom)) {
					$lastid = $this->db->insert_id();
					$this->db->query('UPDATE kode SET nomor=nomor+1 WHERE idkode=5');

					$kolomdtl = array(
						array(
							'id'		=> $lastid,
							'noantrian'	=> $this->model->kode(4),
							'jenis'		=> 'Pelayanan',
						),
					);

					if ($this->db->insert_batch('antriandtl', $kolomdtl)) {
						$this->db->query('UPDATE kode SET nomor=nomor+1 WHERE idkode=4');

						if ($this->db->affected_rows() > 0) {
							$pesan = array('status' => true, 'msg' => 'berhasil', 'id' => (int) $lastid);
						}
					} else {
						$pesan = array('status' => false, 'msg' => 'gagal');
					}
				} else {
					$pesan = array('status' => false, 'msg' => 'gagal');
				}
			} else {
				$pesan = array('status' => false, 'msg' => 'Atas nama ' . $this->input->post('namapsn') . ' sudah mengambil antrian, Coba nama lain...!');
			}
			echo json_encode($pesan, TRUE);
		}
	}

	function cetakPelayanan($id)
	{
		$data = array(
			"getData"	 => $this->antrian_model->cetaknota($id),
			"getDatadtl" => $this->antrian_model->cetaknotadtl($id),
		);
		$this->load->view("template/front/cetaknotapelayanan", $data);
		$this->session->set_userdata('noprint', 'cetak-pelayanan/' . $id);
	}

	function cetaknota($id)
	{
		$js_files = array(site_url('assets/themes/front/js/jquery.PrintArea.js'));
		$data = array(
			'js_files' 	=> $js_files,
			'title'		=> 'Cetak Antrian',
			'getData'	=> $this->antrian_model->cetaknota($id),
			'getDatadtl' => $this->antrian_model->cetaknotadtl($id),
		);

		$this->load->view('template/front/cetaknota', $data);
		$this->session->set_userdata('noprint', 'cetak-nota/' . $id);
		$items = array('norm', 'namapasien', 'jnspasien');
		$this->session->unset_userdata($items);
	}

	function notamodal($id)
	{
		$getData	= $this->antrian_model->cetaknota($id);
		$getDatadtl = $this->antrian_model->cetaknotadtl($id);

		echo '<div class="row"  style="padding:0;margin:0;">
		<div class="col s3">
			<img class="img-responsive" src="' . site_url("assets/themes/front/img/" . $this->config->item('logo')) . '" style="max-width: 60px;">
		</div>
		<div class="col s9 text-center">
			<div style="color:#000;font-size:16px;font-weight: bold;text-align: center;margin-bottom:2px">
				' . strtoupper($this->config->item('nama')) . '
			</div>
			<span><small>' . $this->config->item('alamat') . '</small></span>
		</div>
	</div>
	
	<table class="table-responsive table-condensed" cellpadding="0" cellspacing="0" style="width: 100%;">
        <thead>
        	<th colspan="3" style="border-bottom: 1px solid #222;padding:0;"></th>
        </thead>
        <tbody>
          	<tr>
            	<th style="padding:0;">No. Daftar</th><td style="padding:0;">:</td><td style="padding:0;"> ' . $getData->nomor . '</td>
	        </tr>
	        <tr>
            	<th style="padding:0;">Nama</th><td style="padding:0;">:</td><td style="padding:0;"> ' . UCWORDS(STRTOLOWER($getData->nama_pasien)) . '</td>
	        </tr>
          	<tr>
            	<th style="padding:0;">Status</th><td style="padding:0;">:</td><td style="padding:0;"> Pasien ' . ucwords($getData->jenispasien) . '</td>
	        </tr>
	        <tr>
		        <th style="padding:0;">Jenis pasien</th><td style="padding:0;">:</td><td style="padding:0;"> ' . ucwords(($getData->namaprsh) ? $getData->namaprsh : $getData->bagian) . '</td>
		    </tr>
		    <tr>
		        <th style="padding:0;">Poli</th><td style="padding:0;">:</td><td style="padding:0;"> ' . ucwords($getData->poli) . '</td>
		    </tr>
		    <tr>
		        <th style="padding:0;">Dokter</th><td style="padding:0;">:</td><td style="padding:0;"> ' . ucwords($getData->nama) . '</td>
		    </tr>
		    <tr>
		    	<td colspan="3" style="padding:0;">Nomor Antrian Loket</td>
		    </tr>';

		foreach ($getDatadtl as $data) {
			echo '<tr>
					        <th style="padding:0;">' . ucfirst($data->jenis) . '</th><td style="padding:0;">:</td><td style="padding:0;">' . $data->noantrian . '</td>
					    </tr>';
		}


		echo '</tbody>
        <tfoot>
        	<tr><td colspan="3" style="border-bottom: 1px solid #222;padding:0;"></td></tr>
        	<tr><td colspan="2" align="left" style="padding:0;">Tgl : ' . date('d M y') . '</td><td align="right" style="padding:0;">Jam : ' . date('H:i') . '</td></tr>
        </tfoot>
      </table>';
		echo '<table class="table table-responsive table-condensed" cellpadding="3" cellspacing="0" border="0" style="background: #474747;border-radius:10px;color:#FFF;margin-top:30px;padding:10px;">
      				<tr><td><p>Catatan : <br/>' . $this->config->item('infodaftaronlinepdf') . '</p></td></tr>
      			</table>';
	}
	function validOnline()
	{
		if ($this->ion_auth->logged_in()) {
			if ($this->ion_auth->in_group('daftarlangsung')) {
				$nodaftar = strtoupper(strip_tags($this->input->post('no', TRUE)));
				$result = array('status' => true, 'msg' => 'gagal');
				if ($nodaftar) {
					$kuericeknomor = $this->db->get_where('antrian', array('UPPER(nomor)' => $nodaftar, 'date(tanggal)' => date('Y-m-d'), 'validasi' => 0));
					$row = $kuericeknomor->row();
					if ($kuericeknomor->num_rows() > 0) {
						$this->db->query("UPDATE antrian SET validasi=1 WHERE id='" . (int) $row->id . "'");
						$result = array('status' => true, 'msg' => 'berhasil', 'datane' => $row);
					} else {
						$result = array('status' => false, 'msg' => 'No pendaftaran ' . $nodaftar . ' tidak ditemukan');
					}
				}
				echo json_encode($result, TRUE);
			}
		}
	}

	function daftarlangsungCek()
	{
		if ($this->ion_auth->logged_in()) {
			if ($this->ion_auth->in_group('daftarlangsung')) {
				$this->form_validation->set_rules('norm', 'No Rekam Medis', 'required|callback_cek_norm');
				if ($this->form_validation->run() == TRUE) {
					$norm = $this->input->post('norm', TRUE);
					$kueri = $this->db->select("namapasien")->from('pasien')->where('norm', $norm)->get()->row();
					$this->session->set_userdata('norm', $this->input->post('norm', TRUE));
					$this->session->set_userdata('jnspasien', 'lama');
					$this->session->set_userdata('namapasien', $kueri->namapasien);
					$result = array('status' => (bool)true, 'msg' => 'berhasil');
				} else {
					$result = array('status' => false, 'msg' => form_error('norm'));
				}

				echo json_encode($result, TRUE);
			}
		}
	}


	function selesaimelayani()
	{
		if ($this->ion_auth->logged_in()) {
			$idantrian 	= (int) $this->input->post('idantrian', TRUE);
			if ($this->user->bagian == 'Pendaftaran') {
				$bagian = 'Poli';
			} else if ($this->user->bagian == 'Poli') {
				$bagian = 'Selesai';
			} else if ($this->user->bagian == 'Pelayanan') {
				$bagian = 'Selesai';
			}
			$sql = "UPDATE antrian SET posisi='" . $bagian . "' WHERE id='" . $idantrian . "'";
			if ($this->db->query($sql)) {
				$result = array('status' => TRUE, 'msg' => 'Berhasil');
			} else {
				$result = array('status' => FALSE, 'msg' => 'Gagal');
			}
			echo json_encode($result, true);
		}
	}

	private function _resetnomor()
	{
		$tgl = date('Y-m-d');
		$kueri = $this->db->query("SELECT DATE(lastupdate)tgl FROM kode WHERE idkode=5")->row();
		if ($kueri->tgl != $tgl) {
			$this->db->query('UPDATE kode SET nomor=0 WHERE idkode IN (2,3,4,5)');
		}
	}
}