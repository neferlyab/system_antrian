<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Adminpages extends CI_Controller
{
	protected $data;
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('/', 'refresh');
		}
		$this->_init();
		$this->load->model('antrian_model');
		$this->load->library('image_moo');
		$this->load->library('grocery_CRUD');
		$this->data = new grocery_CRUD();
		$this->load->config('grocery_crud');
		$this->config->set_item('grocery_crud_default_per_page', '1000');
		$this->load->helper('url');

		$this->user = $this->ion_auth->user()->row();
	}

	private function _init()
	{
		$this->load->section('navbar', 'template/admin/include/navbar');
		$this->load->section('menu', 'template/admin/include/menu');
		$this->output->set_template('admin');
	}
	function _render()
	{
		$this->data->unset_read()
			->unset_print()
			->unset_export();
		return $this->data->render();
	}

	public function index()
	{
		$data =  array('titles' => ($this->ion_auth->is_admin()) ? 'Administrator' : 'Loket Panggilan');
		$kolom = array('nomor', 'id_bagian', 'dipanggil');
		$this->data->set_table('antrian');
		$this->data->display_as('id_bagian', 'Bagian');
		$this->data->set_relation('id_bagian', 'bagian', '{nama}');
		$this->data->where('antrian.jenis', $this->user->bagian);
		$this->data->where('date(antrian.tanggal)', date('Y-m-d'));

		$this->data->add_action('Panggil', '#', '', 'btn btn-xs fa fa-bullhorn', array($this, 'tombol_panggil'));
		$this->data->add_action('Selesai', '#', '', 'btn btn-xs fa fa-check', array($this, '_tombol_selesai_panggil'));

		$this->data->columns($kolom);

		$this->data->callback_column('dipanggil', array($this, '_dipanggil_display'));

		$this->data->unset_delete();
		$this->data->unset_add();
		$this->data->unset_edit();
		$this->data->unset_read();

		$output = $this->data->render();
		$this->load->js(site_url() . 'assets/js/sendiri.js');
		$data['css_files']		= $output->css_files;
		$data['js_files']		= $output->js_files;
		$data['output']      	= $output->output;
		$this->load->view('template/admin/dashboard/dash', $data);
	}

	function _date_display($display)
	{
		return tgl_indo($display);
	}
	function _dipanggil_display($value, $row)
	{
		$k = $this->antrian_model->getDipanggil($row->id, $this->user->bagian, NULL, NULL, (int)$this->user->loket);

		if (count($k) > 0) {
			foreach ($k as $r) {
				return ($r->dipanggil == 0) ? 'Belum' : 'Menunggu';
			}
		} else {
			return 'Selesai';
		}
	}

	function tombol_panggil($primary_key, $row)
	{
		$k = $this->antrian_model->getDipanggil($row->id, $this->user->bagian, NULL, NULL, (int)$this->user->loket);

		if (count($k) > 0) {
			foreach ($k as $r) {
				$datanomor = "mulai('" . $r->nomor . "-" . $this->user->bagian . "-" . $row->id . "-" . $this->user->loket . "')";
				return "javascript:" . $datanomor . ";";
			}
		} else {
			return "javascript:void(0);";
		}
	}

	function _tombol_selesai_panggil($val, $row)
	{
		$getulangan = $this->antrian_model->getantrianulang($this->user->id, $this->user->bagian, $val);
		$sts = ($getulangan) ? "selesaiLayanan('" . $getulangan->idantrian . "',true)" : 'void(0)';
		return "javascript:" . $sts . ";";
	}

	function settingaccount()
	{
		$data = array(
			'titles'        => 'Management User',
			'menus'         => 'Management',
			'sub_menus'     => 'User',
		);
		$this->load->view('template/admin/user/listdata', $data);
	}
}