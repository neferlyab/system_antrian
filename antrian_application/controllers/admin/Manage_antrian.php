<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_antrian extends CI_Controller {

    protected $data;

    function __construct(){

            parent::__construct();
            if (!$this->ion_auth->logged_in() ){
                redirect('/', 'refresh');
            }
            $this->_init();
            $this->load->library('grocery_CRUD');
            $this->load->model('antrian_model');
            $this->data = new grocery_CRUD();
            $this->load->helper('url');
            $this->load->config('grocery_crud');
    }

    private function _init()
	{
		$this->load->section('navbar', 'template/admin/include/navbar');
		$this->load->section('menu', 'template/admin/include/menu');
		$this->output->set_template('admin');
	}

    function _render(){
        $this->data->unset_read()
                    ->unset_print()
                    ->unset_export();
        return $this->data->render();
    }

    function index(){
	    $this->data->set_table('poliklinik');
        $this->data->columns(array('kode','nama','jenispoli','nonaktif'));

        $this->data->display_as('jenispoli','Jenis Poli');
        $this->data->display_as('nonaktif','Status');

        $this->data->callback_column('nonaktif', array($this,'_status_display'));

        $this->data->add_action('Lihat', '#', '','btn fa fa-search',array($this,'_tombol_detail'));

        $this->data->unset_delete();
       	$this->data->unset_add();
       	$this->data->unset_edit();
       	$this->data->unset_read();
        $output = $this->_render();
        $data = array(
                    'js_files' 	    => $output->js_files,
                    'css_files'     => $output->css_files,
                    'output'	    => $output->output,
                    'titles'        => 'Manage Antrian',
                    'menus'         => 'Antrian',
                    'sub_menus'     => 'List Poliklinik',
                );

        $this->load->view('template/admin/master-data',$data);
    }

    function _status_display($display){
      return ($display==0) ? 'Aktif' : 'Tidak aktif';
    }
    function _tombol_detail($val,$row){
		return site_url("admin/Manage_antrian/detail_antrian/".$row->kode);
	}

	function detail_antrian($kode){
		//$this->data->set_theme('datatables');
		$this->data->set_table('antrian');
		$this->data->set_relation('id','antriandtl','{noantrian}',array('dipanggil'=>0,'jenis'=>'Poli'));
		$this->data->set_relation('kode','poliklinik','{nama}');
		$this->data->set_relation('iddokter','dokter','{nama}');
      	$this->data->where('jenis','Poli');
      	$this->data->where('dipanggil',0);
      	$this->data->where('date(tanggal)',date('Y-m-d'));
	    $this->data->where('antrian.kode',$kode);

	    $this->data->display_as('id','No antrian');
		$this->data->display_as('kode','Poliklinik');
		$this->data->display_as('iddokter','nama');
		$this->data->display_as('jenispasien','Jenis Pasien');
		$this->data->display_as('tanggal','Tgl Daftar');
		$this->data->display_as('validasi','Status Pasien');
		$this->data->display_as('dipanggil','Status Panggil');
		$this->data->display_as('loket','Jenis Layanan');

	    /*Tombol*/
	    //$this->data->add_action('Panggil', '', '','ui-icon-volume-on',array($this,'tombol_panggil'));
	    //$this->data->add_action('Selesai', '', '','ui-icon-check',array($this,'_tombol_selesai_panggil'));
      	
      	$this->data->columns(array('id','norm','nama_pasien','jenispasien','cara_daftar','dipanggil','validasi'));
      	
      	$this->data->callback_column('validasi', array($this,'_dilokasi_display'));
      	$this->data->callback_column('norm', array($this,'_norm_display'));

      	$this->data->unset_delete();
       	$this->data->unset_add();
       	$this->data->unset_edit();
       	$this->data->unset_read();
        $output = $this->data->render();

        $kueri = $this->db->get_where("poliklinik",array('kode'=>$kode))->row();
        $data = array(
                    'js_files' 	    => $output->js_files,
                    'css_files'     => $output->css_files,
                    'output'	    => $output->output,
                    'titles'        => 'Manage Antrian',
                    'menus'         => 'Antrian',
                    'sub_menus'     => 'List Antrian '.$kueri->nama.' <a href="'.site_url("admin/Manage_antrian").'" class="btn btn-sm" style="float:right;"><i class="fa fa-mail-reply"></i> Kembali</a>',
                );

        $this->load->view('template/admin/master-data',$data);
	}
	function _dilokasi_display($value,$row){
    	return ($value==0) ? 'Blm Datang' : 'Sdh Datang';
    }
    function _norm_display($value,$row){
	    return ($this->antrian_model->getNorm($row->norm) > 0) ? $value : '';
    }
}
