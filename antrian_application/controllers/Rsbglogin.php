<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rsbglogin extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->lang->load('auth');
        $this->load->library('form_validation');
    }
    
	function index(){
		if(!$this->ion_auth->logged_in()){
         	$data['message']	= (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
	    	$this->load->view('themes/login',$data);	
		}
    }

	public function login(){
    	$this->loginuser();
    }       
	
	private function loginuser(){
		$this->data['title'] = "Login";
		$this->form_validation->set_rules('identity', 'Email', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');

		if ($this->form_validation->run() == true){
			$remember = (bool) $this->input->post('remember');
			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('pass'), $remember)){
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$kc = array(
					'disabled'	=> false,
					'uploadURL'	=> '/upload',
					'uploadDir'	=> '',
				);
				$_SESSION['ses_kcfinder']=array();
            	$_SESSION['ses_kcfinder']['disabled'] = false;
           		$_SESSION['ses_kcfinder']['uploadURL'] = "upload";
           		
           		redirect('admin/adminpages', 'refresh');
			}else{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('/adminlogins','refresh');
			}
		}else{
			$data['message']	= (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		    $this->load->view('themes/login',$data);
		}
	}

	function logout(){
		$this->ion_auth->logout();
		redirect('/adminlogins', 'refresh');
	}
}