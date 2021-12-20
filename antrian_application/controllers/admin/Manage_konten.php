<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_konten extends CI_Controller {

    protected $data;

    function __construct(){

            parent::__construct();
            if (!$this->ion_auth->is_admin()){
                 redirect('/', 'refresh');
            }else if (!$this->ion_auth->logged_in() ){
                redirect('/', 'refresh');
            }
            $this->_init();
            $this->load->library('image_moo');
            $this->load->model('ion_auth_model');
            $this->load->library('grocery_CRUD');
            $this->data = new grocery_CRUD();
            $this->load->helper('url');
            $this->load->config('grocery_crud');
            $this->user = $this->ion_auth->user()->row();
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

    function _date_display($display){
      return date('d F Y',strtotime($display));
    }

    function perusahaan(){
       $this->data->set_theme('datatables');
       $this->config->set_item('grocery_crud_text_editor_type', '');
       $this->data->set_table('pengaturan');
       $this->data->set_field_upload('logo','assets/themes/front/img');
       $this->data->set_field_upload('bg','assets/uploads/images');
       $this->data->display_as('namalembaga','Nama');
       $this->data->display_as('bg','Background');
       $this->data->unset_columns('maps','fax','linkplaystore');
       $this->data->unset_delete();
       $this->data->unset_add();
       $output = $this->_render();
       $data = array(
                   'js_files'      => $output->js_files,
                   'css_files'     => $output->css_files,
                   'output'        => $output->output,
                   'titles'        => 'Manage Konten',
                   'menus'         => 'Manage Perusahaan',
                   'sub_menus'     => 'Perusahaan',
               );

       $this->load->view('template/admin/master-data',$data);
   }
   function bpjs(){
       $this->data->set_table('setbpjs');
       $this->data->unset_add();
       $this->data->unset_delete();
       $output = $this->_render();
       $data = array(
                   'js_files'      => $output->js_files,
                   'css_files'     => $output->css_files,
                   'output'        => $output->output,
                   'titles'        => 'Pengaturan',
                   'menus'         => 'Pengaturan',
                   'sub_menus'     => 'BPJS',
               );
       $this->load->view('template/admin/master-data',$data);
   }
   function video(){
       $this->data->set_theme('datatables');
       $this->data->set_table('video');
       $output = $this->_render();
       $data = array(
                   'js_files'      => $output->js_files,
                   'css_files'     => $output->css_files,
                   'output'        => $output->output,
                   'titles'        => 'Pengaturan',
                   'menus'         => 'Pengaturan',
                   'sub_menus'     => 'VIDEO',
               );
       $this->load->view('template/admin/master-data',$data);
   }

   function bagian(){
      
      $this->data->set_table('bagian');
      $this->data->unset_columns('jenis','loket');
      $this->data->fields('nama','status','code');
      $huruf = range('A','Z');
      foreach($huruf as $h){
        $arr[$h] = $h;
      }
      $this->data->field_type('code','dropdown',$arr);
      $output = $this->_render();
      $data = array(
                  'js_files'      => $output->js_files,
                  'css_files'     => $output->css_files,
                  'output'        => $output->output,
                  'titles'        => 'Pengaturan',
                  'menus'         => 'Pengaturan',
                  'sub_menus'     => 'Bagian',
              );
      
      $this->load->view('template/admin/master-data',$data);
    }

    function users(){
      $data = array(
                  'titles'        => 'Management User',
                  'menus'         => 'Management',
                  'sub_menus'     => 'User',
              );
      
      $this->load->view('template/admin/user/listdata',$data);
    }
}
