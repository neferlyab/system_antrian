<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Pendaftaran extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('antrian_model');
	}

	function index(){
    $data['title'] 		  = 'Pengambilan Nomor';
    $data['main']       = 'template/pendaftaran/pilihantrian';
    $data['getbagian']  = $this->antrian_model->getbagianpanel();
    $this->load->view('template/pendaftaran/pendaftar',$data);
	}

  function ambilantrian($att='',$id='',$simbol){
    $ambilnomor     = $this->antrian_model->ambilnomortereakhir($id);
    $ambilnamabagian = $this->antrian_model->ambilnamabagian($id);
    $nomorterakhir  = $ambilnomor['nomor'];
    $jmlantrian = $this->db->query("select * from antrian where `status`='0' and date(tanggal)=date(now()) and id_bagian='".$id."'")->num_rows();

    $custom_code    = $att;
    if(count($nomorterakhir) < 0){
      $new_code_ks = '1';
    }else{
      $nomorterakhire = str_replace($custom_code,'',$nomorterakhir);
      $new_code_ks = $nomorterakhire + 1;
    }

    $kd_ks = '';
    if ( $new_code_ks >= 1 && $new_code_ks < 10 ){
      $kd_ks .= $custom_code."00".$new_code_ks;
    }elseif ( $new_code_ks >= 10 && $new_code_ks < 100 ) {
      $kd_ks .= $custom_code."0".$new_code_ks;
    }else{
      $kd_ks .= $custom_code.$new_code_ks;
    };
    if($simbol){
      if($simbol =='OL'){
        $smb = 'Online';
        $valid = 0;
      }else if($simbol=='LS'){
        $smb = 'Langsung';
        $valid = 1;
      }
    }

    $this->antrian_model->insert_antrian($kd_ks,$att,$id,$smb,$valid);
    $data['antrian']        = $kd_ks;
    $data['tanggal']        = ($ambilnomor['tanggal'] == null) ? date('Y-m-d') : $ambilnomor['tanggal'];
    $data['jmlantrian']     = $jmlantrian;
    $data['waktu']          = ($ambilnomor['waktu'] == null) ? date('H:i') : $ambilnomor["waktu"];
    $data['id_bagian']      = $ambilnamabagian['nama'];
    $data['jenis']          = $this->db->get_where("bagian",array("id_bagian"=>$id))->row()->nama;
    $data['loket']          = $ambilnamabagian['loket'];
    $data['posisi']          = 'Pelayanan';
    $this->load->view('template/pendaftaran/print',$data);
  }
}
