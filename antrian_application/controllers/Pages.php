<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Pages extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('antrian_model');
	}

	function index(){
	 $this->home();
	}

	function home(){
		$data ['title'] 	 = 'Sistem Antrian';
        $data ['getlast']    = $this->antrian_model->getlast();
        $data ['getvideo']   = $this->antrian_model->getvideo();
		$this->load->view('template/front/index',$data);
	}

    function getnoantrian(){
        $kueri = $this->antrian_model->getlast($aktif=1,$bagian='Poli');
        if(count($kueri) > 0){
            $result = array('status'=>TRUE,'datane'=>$kueri,'identitas'=>(bool)TRUE);
        }else{
            $kueri2 = $this->antrian_model->getlast(NULL,$bagian='Poli');
            if(count($kueri2) > 0){
                $result = array('status'=>TRUE,'datane'=>$kueri2,'identitas'=>(bool)FALSE);
            }else{
                $result = array('status'=>FALSE,'datane'=>array(),'identitas'=>(bool)FALSE);
            }
        }
        
        echo json_encode($result,TRUE);
    }
    function getnoantrian_pelayanan(){
        $kueri = $this->antrian_model->getlast($aktif=1,$bagian='Pelayanan');
        if(count($kueri) > 0){
            $result = array('status'=>TRUE,'datane'=>$kueri,'identitas'=>(bool)TRUE);
        }else{
            $kueri2 = $this->antrian_model->getlast(NULL,$bagian='Pelayanan');
            if(count($kueri2) > 0){
                $result = array('status'=>TRUE,'datane'=>$kueri2,'identitas'=>(bool)FALSE);
            }else{
                $result = array('status'=>FALSE,'datane'=>array(),'identitas'=>(bool)FALSE);
            }
        }
        
        echo json_encode($result,TRUE);
    }
    function updateLoket(){
        $bagian = $this->input->post('loket',true);
        $idantrian = (int) $this->input->post('idantrian',true);
        $nomor = $this->input->post('nomor',true);
        $iduser = (int) $this->input->post('un',true);

        $date = date('Y-m-d');
        $data = array(
          'loket'   => $this->input->post("loket",TRUE),
          'dipanggil' => '1',
          'iduser' => $iduser
        );
        $this->db->where('dipanggil','0');
        $this->db->where('id',$idantrian);
        if($this->db->update('antrian',$data)){
            $this->db->query("UPDATE antrianlog SET aktif=0 WHERE id='".$idantrian."'");
        }
    }

    function view_informasi(){
        $this->load->view('template/front/panggilan_informasi');
    }
    function view_ganda(){
        $data = array(
            "dataBagian" => $this->db->get_where("bagian",array("status"=>"aktif"))->result(),
        );

        $this->load->view('template/front/tampilan_ganda',$data);
    }

    function deteksiPanggil(){
        $this->db->select("*");
        $this->db->from("antrianlog");
        $this->db->where("aktif",1);
        $this->db->where("date(tanggal)",date("Y-m-d"));
        $kueri = $this->db->get()->num_rows();
        if($kueri > 0){
            $result = array("status"=>TRUE,"msg"=>"berhasil");
        }else{
            $result = array("status"=>FALSE,"msg"=>"gagal");
        }
        echo json_encode($result,true);
    }
}
