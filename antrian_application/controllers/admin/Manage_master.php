<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_master extends CI_Controller {

    protected $data;

    function __construct(){

            parent::__construct();
            if (!$this->ion_auth->is_admin()){
                 redirect('/', 'refresh');
            }else if (!$this->ion_auth->logged_in() ){
                redirect('/', 'refresh');
            }
            $this->_init();
            $this->load->library('grocery_CRUD');
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

    /*function index(){
        $this->config->set_item('grocery_crud_text_editor_type', 'minimal');
	    $this->data->set_table('gallery')
                ->set_field_upload('gbr_gallery','assets/uploads/img_galeri')
                ->set_relation('id_album','album','jdl_album');

        $output = $this->_render();
        $data = array(
                    'js_files' 	    => $output->js_files,
                    'css_files'     => $output->css_files,
                    'output'	    => $output->output,
                    'titles'        => 'Manage Galeri',
                    'menus'         => 'Manage Galeri',
                    'sub_menus'     => 'List image galeri',
                );

        $this->load->view('template/admin/master-data',$data);
    }*/

     function poli(){
        //$this->data->set_theme('datatables');
        $this->data->set_table('poliklinik');
        $this->data->fields('nonaktif');
        $this->data->columns('kode','nama','jenispoli','nonaktif','no_kode');
        $this->data->display_as('jenispoli','Jenis Poli');
        $this->data->display_as('nonaktif','Status');
        $this->data->unset_delete();
        $this->data->unset_add();
        $this->data->callback_column('nonaktif', array($this,'_status_display'));
        $this->data->callback_edit_field('nonaktif', function ($value, $primary_key) {
        $selectA = ($value==0) ? 'checked' : '';
        $selectB = ($value==1) ? 'checked' : '';
        return '<input type="radio" value="0" name="nonaktif" '.$selectA.'> Aktif
        <input type="radio" value="1" name="nonaktif" '.$selectB.'> Tidak Aktif';
        });
        $output = $this->_render();
        $data = array(
                    'js_files'      => $output->js_files,
                    'css_files'     => $output->css_files,
                    'output'        => $output->output,
                    'titles'        => 'Master Poliklinik',
                    'menus'         => 'Master',
                    'sub_menus'     => 'Poliklinik',
                );

        $this->load->view('template/admin/master-data',$data);
    }
    function _status_display($display){
      return ($display==0) ? 'Aktif' : 'Tidak aktif';
    }

    function dokter(){
        //$this->data->set_theme('datatables');
        $this->data->set_table('dokter');
        $this->data->set_relation('kode','poliklinik','nama');
        $this->data->fields('nama','aktif','kode','kode_simbol');
        $this->data->columns('iddokter','nama','telepon','jenisdokter','aktif','kode','kode_simbol');
        $this->data->display_as('iddokter','ID Dokter');
        $this->data->display_as('kode_simbol','Kode Antrian');
        $this->data->display_as('aktif','Status');
        $this->data->display_as('kode','Poli');
        $this->data->set_rules('kode_simbol','Simbol-No-Antrian','required|min_length[2]|max_length[2]|alpha');
        $this->data->required_fields('kode_simbol');
        $this->data->callback_before_update(array($this,'_kodeSimbol_callback'));
        $this->data->unset_delete();
        $this->data->unset_add();
        $output = $this->_render();
        $data = array(
                    'js_files'      => $output->js_files,
                    'css_files'     => $output->css_files,
                    'output'        => $output->output,
                    'titles'        => 'Master Dokter',
                    'menus'         => 'Data Master',
                    'sub_menus'     => 'Dokter',
                );

        $this->load->view('template/admin/master-data',$data);
    }
    function _kodeSimbol_callback($post_array,$anune=null)
    {
      if(!empty($post_array['kode_simbol'])) {
        $post_array['kode_simbol'] = strtoupper($post_array['kode_simbol']);
        
      }else{
        unset($post_array['kode_simbol']);
      }
      return $post_array;
    }

    function pasien(){
        //$this->data->set_theme('datatables');
        $this->data->set_table('pasien');
        //$this->data->set_relation('kode','poliklinik','nama');
        //$this->data->fields('nama','aktif','kode');
        $this->data->columns('norm','namapasien','alamat','notelp','namaibu');
        $this->data->display_as('norm','No. RM');
        $this->data->display_as('namapasien','Nama Pasien');
        $this->data->display_as('notelp','No Telepon');
        $this->data->display_as('namaibu','Nama Ibu');
        $this->data->edit_fields('norm','namapasien','jeniskelamin','alamat','namaibu','notelp');
        $this->data->unset_delete();
        $this->data->unset_add();
        //$this->data->unset_edit();
        $output = $this->_render();
        $data = array(
                    'js_files'      => $output->js_files,
                    'css_files'     => $output->css_files,
                    'output'        => $output->output,
                    'titles'        => 'Master Pasien',
                    'menus'         => 'Data Master',
                    'sub_menus'     => 'Pasien',
                );

        $this->load->view('template/admin/master-data',$data);
    }

    function pasien_baru(){
        //$this->data->set_theme('datatables');
        $this->data->set_table('pasienbaru');
        //$this->data->set_relation('kode','poliklinik','nama');
        //$this->data->fields('nama','aktif','kode');
        $this->data->columns('nama','alamat','lahir','telp','ibu','tanggal');
        $this->data->display_as('lahir','Tgl Lahir');
        $this->data->display_as('telp','No Telepon');
        $this->data->display_as('ibu','Nama Ibu');
        $this->data->display_as('tanggal','Tanggal Daftar');
        $this->data->callback_column('lahir', array($this,'_date_display'));
        $this->data->unset_delete();
        $this->data->unset_add();
        $this->data->unset_edit();
        $output = $this->_render();
        $data = array(
                    'js_files'      => $output->js_files,
                    'css_files'     => $output->css_files,
                    'output'        => $output->output,
                    'titles'        => 'Master Pasien Baru',
                    'menus'         => 'Data Master',
                    'sub_menus'     => 'Pasien Baru',
                );

        $this->load->view('template/admin/master-data',$data);
    }

    function tanggal_callback($post_array) {
        $post_array['tanggal'] = date('Y-m-d');
        return $post_array;
    }
    function _date_display($display){
      return ($display) ? date('d F Y',strtotime($display))  : '';
    }

    function bagian(){
        $this->data->set_table('bagian');
        $this->data->columns('nama','status','code');
        $this->data->fields('nama','status','code');
        $this->data->display_as('status','Status Aktif');
        $this->data->callback_field('code',array($this,'kode_callback'));
        /*$this->data->display_as('lahir','Tgl Lahir');
        $this->data->display_as('telp','No Telepon');
        $this->data->display_as('ibu','Nama Ibu');
        $this->data->display_as('tanggal','Tanggal Daftar');
        $this->data->callback_column('lahir', array($this,'_date_display'));*/
        /*$this->data->unset_delete();
        $this->data->unset_add();
        $this->data->unset_edit();*/
        $output = $this->_render();
        $data = array(
                    'js_files'      => $output->js_files,
                    'css_files'     => $output->css_files,
                    'output'        => $output->output,
                    'titles'        => 'Master Pasien Baru',
                    'menus'         => 'Data Master',
                    'sub_menus'     => 'Pasien Baru',
                );

        $this->load->view('template/admin/master-data',$data);
    }
    function kode_callback($value)
    {
      $options = array('A' => 'A' , 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E', 'F' => 'F', 'G' => 'G', 'H' => 'H', 'I' => 'I', 'J' => 'J');

      return form_dropdown('code', $options, $value,"id='kode' class='chosen-select'");
    }
}
