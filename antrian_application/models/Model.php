<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model extends CI_Model {
    function getdata($table,$limit=null){
    	$data= array();
		$this->db->select('*');
		$this->db->from($table);
		if($limit){
			$this->db->limit($limit);
		}
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
    }

    function getdatawhere($table,$where,$id){
    	$data= array();
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where,$id);
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
    }

    function getwhere($table,$idtable,$id){
    $data= array();
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($idtable,$id);
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
    }

    function kode($idkode,$loop=null){
       $data   = $this->db->get_where('kode',array('idkode'=>$idkode));
       foreach($data->result() as $datane){
	       if(!is_null($loop)){	
				$printt 	= sprintf('%0'.$datane->digit.'d', $datane->nomor + $loop);
		       	$prefix	= $datane->prefix;
	       }else{
	           $printt 	= sprintf('%0'.$datane->digit.'d', $datane->nomor + 1);
	           $prefix	= $datane->prefix;
		   }
		}
       return $prefix.$printt;
    }

    function kodepoli($idkode){
       $datane=$this->db->get_where('poliklinik',array('kode'=>$idkode))->row();
       $printt 	= sprintf('%03d', $datane->no_urut + 1);
       $prefix	= $datane->no_kode;
       return $prefix.$printt;
    }

    function kodedokter($idkode){
       $datane=$this->db->get_where('dokter',array('iddokter'=>$idkode))->row();
       $printt 	= sprintf('%03d', $datane->kode_no + 1);
       $prefix	= $datane->kode_simbol;
       return $prefix.$printt;
    }

	function lastquery($table,$id){
		$data = array();
		$this->db->select_max($id);
		$hasil = $this->db->get($table);
		if($hasil->num_rows() > 0){
			return $hasil->row_array();
		}
	}

	function get_topmenu(){
		$data= array();
		$this->db->select('*');
		$this->db->from('mainmenu');
		$this->db->where('aktif','Y');
		$this->db->order_by('urutan','ASC');
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}

  function getmainmenufooter(){
    $data= array();
		$this->db->select('*');
		$this->db->from('mainmenu');
		$this->db->where('aktif','Y');
    $this->db->limit(3);
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
  }

	function get_submenu($id){
		$data= array();
		$this->db->select('*');
		$this->db->from('submenu');
		$this->db->where('id_main',$id);
		$this->db->where('aktif','Y');
		$this->db->order_by('id_sub','ASC');
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}

	function getabout(){
		$data= array();
		$this->db->select('s.*');
		$this->db->from('submenu s');
		$this->db->where('m.nama_menu','Lawfirm');
		$this->db->where('s.nama_sub','About');
		$this->db->where('s.aktif','Y');
		$this->db->join('mainmenu m','m.id_main = s.id_main','left');
		$this->db->limit('1');
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}

	function baca($id){
		$data= array();
		$this->db->select('*');
		$this->db->from('submenu');
		$this->db->where('id_sub',$id);
		$this->db->where('aktif','Y');
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}

	function getprogram(){
		$data= array();
		$this->db->select('*');
		$this->db->from('submenu s');
		$this->db->where('s.aktif','Y');
		$this->db->where('m.nama_menu','program');
		$this->db->join('mainmenu m','m.id_main = s.id_main','left');
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}

	function last_news(){
		$data= array();
		$this->db->select('b.*,k.nama_kategori kategori');
		$this->db->from('berita b');
		$this->db->order_by('b.id_berita','DESC');
		$this->db->join('kategori k','b.id_kategori = k.id_kategori','left');
		$this->db->limit(4);
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}

	function artikel(){
		$data= array();
		$this->db->select('b.*,k.nama_kategori kategori');
		$this->db->from('berita b');
		$this->db->order_by('b.id_berita','DESC');
		$this->db->join('kategori k','b.id_kategori = k.id_kategori','left');
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}

	function getartikel($id){
		$data= array();
		$this->db->select('b.*,k.nama_kategori kategori');
		$this->db->from('berita b');
		$this->db->where('b.id_kategori',$id);
		$this->db->join('kategori k','b.id_kategori = k.id_kategori','left');
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}

	function getdetailberita($id){
		$data= array();
		$this->db->select('b.*,k.nama_kategori kategori');
		$this->db->from('berita b');
		$this->db->where('b.id_berita',$id);
		$this->db->join('kategori k','b.id_kategori = k.id_kategori','left');
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
	}

  function getkategori(){
    $data= array();
		$this->db->select('*');
		$this->db->from('kategori');
    $this->db->order_by('id_kategori','DESC');
    $this->db->limit(5);
		$hasil= $this->db->get();
		if($hasil->num_rows() > 0){
			$data = $hasil->result();
		}
		$hasil->free_result();
		return $data;
  }

  function getlastnomor($idkode){
  	$kueri = $this->db->get_where('kode',array('idkode'=>$idkode))->row();
  	return ((int)$kueri->nomor + 1);
  }
}
