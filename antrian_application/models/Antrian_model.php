<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Sistem Antrian
 * Model
 * author	:       Ragiel
 * email	:       ragiel@yahoo.com
 *
 * PT. Global Eushanosoft
 * ===================================================
 */

class Antrian_model extends CI_Model
{
  private $db2;
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  function getbagianpanel($attr = '')
  {
    $data = array();
    $this->db->select('*');
    $this->db->order_by('id_bagian', 'ASC');
    $this->db->from('bagian');
    $this->db->where('status', 'aktif');
    if ($attr != '') {
      $this->db->where('jenis', $attr);
    }
    $hasil = $this->db->get();
    if ($hasil->num_rows() > 0) {
      $data = $hasil->result();
    }
    $hasil->free_result();
    return $data;
  }

  function getnomor($bagian = '', $kodepoli = null, $iddokter = null, $loket = NULL)
  {
    $date = date('Y-m-d');
    $data = array();
    $this->db->select('dt.noantrian,dt.jenis,a.id,LOWER(p.nama)nama,d.iddokter,p.kode kodepoli,d.nama namadokter', FALSE);
    $this->db->from('antrian a');
    $this->db->join('antriandtl dt', 'dt.id=a.id', 'left');
    $this->db->join('dokter d', 'd.iddokter=a.iddokter', 'left');
    $this->db->join('poliklinik p', 'p.kode=d.kode', 'left');
    $this->db->where('a.posisi', $bagian);
    $this->db->where('a.validasi', (int) 1);
    $this->db->where('dt.dipanggil', '0');
    $this->db->where('date(a.tanggal)', $date);
    if ($bagian != '') {
      $this->db->where('dt.jenis', $bagian);
    }
    if ($iddokter) {
      $this->db->where('a.iddokter', $iddokter);
    }
    if ($kodepoli) {
      $this->db->where('a.kode', $kodepoli);
    }
    if ($loket != NULL && $loket != 0) {
      //$this->db->where('a.loket',(int)$loket);
    }

    $this->db->order_by('id', 'ASC');

    $hasil = $this->db->get();
    if ($hasil->num_rows() > 0) {
      return $hasil->row_array();
    }
  }

  function getnomor2($noantrian = NULL, $bagian = '', $kodepoli = null, $iddokter = null, $loket = NULL)
  {
    $date = date('Y-m-d');
    $data = array();
    $this->db->select('a.nomor,a.jenis,a.id', FALSE);
    $this->db->from('antrian a');
    // $this->db->join('antriandtl dt','dt.id=a.id','left');
    //$this->db->join('dokter d','d.iddokter=a.iddokter','left');
    //$this->db->join('poliklinik p','p.kode=d.kode','left');
    $this->db->where('a.posisi', $bagian);
    //$this->db->where('a.validasi',(int) 1);
    if ($noantrian) {
      $this->db->where('a.id', $noantrian);
    }
    //$this->db->where('dt.dipanggil','0');
    $this->db->where('date(a.tanggal)', $date);
    /*if($loket){
            $this->db->where('a.id_bagian',$bagian);
      }*/
    /*if($iddokter){
          $this->db->where('a.iddokter',$iddokter);
      }
      if($kodepoli){
          $this->db->where('a.kode',$kodepoli);
      }*/
    if ($loket != NULL && $loket != 0) {
      $this->db->where('a.loket', (int)$loket);
    }

    $this->db->order_by('id', 'ASC');

    $hasil = $this->db->get();
    if ($hasil->num_rows() > 0) {
      return $hasil->row_array();
    }
  }

  function antrianloket($poli = NULL, $loket = NULL, $bagian = NULL)
  {
    $this->db->select('dt.noantrian,dt.id,LOWER(p.nama)nama,d.iddokter', FALSE);
    $this->db->from('antriandtl dt');
    $this->db->join('antrian a', 'a.id=dt.id', 'left');
    $this->db->join('dokter d', 'd.iddokter=a.iddokter', 'left');
    $this->db->join('poliklinik p', 'p.kode=d.kode', 'left');
    //$this->db->where('dt.iduser',$iduser);
    $this->db->where('dt.dipanggil', 0);
    if ($bagian) {
      $this->db->where('dt.jenis', $bagian);
      $this->db->where('a.posisi', $bagian);
    }
    if ($poli) {
      $this->db->where('a.kode', $poli);
    }
    if ($loket) {
      $this->db->where('a.loket', (int)$loket);
    }

    $this->db->where('a.validasi', 1);
    $this->db->where('date(a.tanggal)', date('Y-m-d'));
    //$this->db->limit('1');
    //$this->db->order_by('dt.last','desc');
    $kueri = $this->db->get();
    return (int) $kueri->num_rows();



    /*$date = date('Y-m-d');
    $data = array();
    $this->db->select('nomor');
    if($att !=''){
      $this->db->where('bagian',$att);
    }
    $this->db->where('status', '0');
    $this->db->where('tanggal',$date);
    $this->db->order_by('id','DESC');
    $this->db->from('antrian');
    $hasil= $this->db->get();
    if($hasil->num_rows() > 0){
      $data = $hasil->result();
    }
    $hasil->free_result();
    return $data;*/
  }

  function getnomorantrian()
  {
    $date = date('Y-m-d');
    $data = array();
    $this->db->select('*');
    $this->db->order_by('id', 'ASC');
    $this->db->where('status', '0');
    $this->db->where('date(tanggal)', $date);
    $this->db->from('antrian');
    $hasil = $this->db->get();
    if ($hasil->num_rows() > 0) {
      $data = $hasil->result();
    }
    $hasil->free_result();
    return $data;
  }

  function getdokter($iddokter)
  {
    if ($iddokter) {
      $sql = "SELECT d.`nama` namadokter,LOWER(p.`nama`) namapoli FROM dokter d
              LEFT JOIN poliklinik p ON p.`kode`=d.`kode`
              WHERE d.`iddokter`='" . $iddokter . "'";

      $kueri = $this->db->query($sql)->row();
      return $kueri;
    }
  }

  function statusselesai($iduser, $bagian, $idantrian)
  {
    $this->db->select('dt.noantrian,dt.id,LOWER(p.nama)nama,d.iddokter,p.kode kodepoli', FALSE);
    $this->db->from('antriandtl dt');
    $this->db->join('antrian a', 'a.id=dt.id', 'left');
    $this->db->join('dokter d', 'd.iddokter=a.iddokter', 'left');
    $this->db->join('poliklinik p', 'p.kode=d.kode', 'left');
    $this->db->where('dt.iduser', $iduser);
    $this->db->where('dt.dipanggil', 1);
    $this->db->where('dt.jenis', $bagian);
    $this->db->where('a.posisi', $bagian);
    $this->db->where('date(a.tanggal)', date('Y-m-d'));
    $this->db->where('a.id', $idantrian);
    $this->db->order_by('dt.last', 'desc');
    $kueri = $this->db->get();
    if ($kueri->num_rows() > 0) {
      $hasil = $kueri->row();
    } else {
      $hasil = array();
    }
    return $hasil;
  }

  function getantrianulang($iduser, $bagian, $idantrian = NULL, $loket = NULL)
  {
    $this->db->select('a.iduser id,a.nomor,a.id idantrian,a.loket', FALSE);
    $this->db->from('antrian a');
    //$this->db->join('antrian a','a.id=dt.id','left');
    //$this->db->join('dokter d','d.iddokter=a.iddokter','left');
    //$this->db->join('poliklinik p','p.kode=d.kode','left');
    $this->db->where('a.iduser', $iduser);
    $this->db->where('a.dipanggil', 1);
    $this->db->where('a.jenis', $bagian);
    $this->db->where('a.posisi', $bagian);
    if ($idantrian) {
      $this->db->where("a.id", $idantrian);
    }
    $this->db->where('date(a.tanggal)', date('Y-m-d'));
    $this->db->limit('1');
    $this->db->order_by('a.last', 'desc');
    $kueri = $this->db->get();
    if ($kueri->num_rows() > 0) {
      $hasil = $kueri->row();
    } else {
      $hasil = array();
    }
    return $hasil;
  }

  function updateloket($bagian, $nomor, $iduser = null, $idantrian)
  {
    $date = date('Y-m-d');
    $data = array(
      'dipanggil' => '1',
      //'loket'  => $loket,
      'iduser' => intval($iduser)
    );
    $this->db->where('dipanggil', '0');
    $this->db->where('jenis', $bagian);
    $this->db->where('id', $idantrian);
    $this->db->update('antriandtl', $data);
  }

  function insert_antrian($nomor, $att, $id, $simbol, $validasi)
  {
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    $waktu = date('H:i');
    $data = array(
      'nomor'   => $nomor,
      'status' => '0',
      'tanggal' => $date,
      'id_bagian' => $id,
      'waktu'  => $waktu,
      'cara_daftar' => $simbol,
      'validasi'    => intval($validasi),
      'posisi'  => 'Pelayanan',
      'jenis'   => 'Pelayanan',
    );
    $this->db->insert('antrian', $data);
  }

  function ambilnomortereakhir($id)
  {
    $hasil = $this->db->query("select * from antrian where date(tanggal)=date(now()) and id_bagian='" . $id . "' order by id desc limit 1");
    if ($hasil->num_rows() > 0) {
      return $hasil->row_array();
    }
  }

  function ambilnamabagian($id)
  {
    $date = date('Y-m-d');
    $data = array();
    $this->db->select('nama,jenis,loket');
    $this->db->where('id_bagian', $id);
    $this->db->where('status', 'aktif');
    $this->db->limit(1);
    $hasil = $this->db->get('bagian');
    if ($hasil->num_rows() > 0) {
      return $hasil->row_array();
    }
  }

  function getvideo()
  {
    $data = array();
    $this->db->select('*');
    $this->db->from('video');
    $this->db->where('status', 'aktif');
    $hasil = $this->db->get();
    if ($hasil->num_rows() > 0) {
      $data = $hasil->result();
    }
    $hasil->free_result();
    return $data;
  }

  function loket($loket)
  {
    $date = date('Y-m-d');
    $data = array();
    $this->db->select('nomor,bagian,tanggal,waktu');
    $this->db->where('status', '1');
    $this->db->where('date(tanggal)', $date);
    $this->db->where('loket', $loket);
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1);
    $hasil = $this->db->get('antrian');
    if ($hasil->num_rows() > 0) {
      return $hasil->row_array();
    }
  }

  function getlast($aktif = NULL, $bagian = NULL)
  {
    $date = date('Y-m-d');
    $hasil = array();
    $this->db->select('al.id,al.no_antrian nomor,al.loket,b.nama,al.iduser');
    $this->db->from('antrianlog al');
    $this->db->join("users u", "u.id=al.iduser", "left");
    $this->db->join("antrian a", "a.id=al.id", "left");
    $this->db->join("bagian b", "b.id_bagian=a.id_bagian", "left");
    if ($aktif) {
      $this->db->where('al.aktif', (int)$aktif);
    }
    if ($bagian) {
      $this->db->where('al.bagian', $bagian);
    }
    $this->db->where('date(al.tanggal)', $date);
    if ($aktif) {
      $this->db->order_by('al.tanggal', 'asc');
    } else {
      $this->db->order_by('al.tanggal', 'desc');
    }

    $this->db->limit(1);

    $hasil = $this->db->get()->row();
    return $hasil;
  }

  function _totalantrian($att = '')
  {
    $date = date('Y-m-d');
    $data = array();
    $this->db->select('nomor');
    if ($att != '') {
      $this->db->where('bagian', $att);
    }
    $this->db->where('status', 0);
    $this->db->where('loket', 0);
    $this->db->where('date(tanggal)', $date);
    $this->db->order_by('id', 'DESC');
    $this->db->from('antrian');
    $hasil = $this->db->get();
    if ($hasil->num_rows() > 0) {
      $data = $hasil->result();
    }
    $hasil->free_result();
    return $data;
  }

  function getAll($limit, $sidx, $sord)
  {
    $this->db->select('*');
    $this->db->from('antrian');
    $this->db->limit($limit);
    $this->db->order_by($sidx, $sord);
    $query = $this->db->get();

    return $query->result();
  }

  function getLoket()
  {
    $this->db->select('*');
    $this->db->from('loket');
    $this->db->where('status', 'Aktif');
    $kueri = $this->db->get();
    $hasil = array();
    if ($kueri->num_rows() > 0) {
      $hasil = $kueri->result();
    }
    return $hasil;
  }

  function cetaknota($id)
  {
    $sql = "SELECT a.*,d.nama,p.nama poli,pr.namaprsh FROM antrian a
            LEFT JOIN dokter d ON d.iddokter=a.iddokter
            LEFT JOIN poliklinik p ON p.kode=a.kode
            LEFT JOIN perusahaan pr ON pr.idprsh=a.idprsh
            WHERE a.id='" . $id . "' AND date(a.tanggal)=DATE(now())";
    $kueri = $this->db->query($sql);
    return $kueri->row();
  }

  function cetaknotadtl($id)
  {
    $sql = "SELECT dt.* FROM antriandtl dt
            LEFT JOIN antrian a on a.id=dt.id WHERE dt.id='" . $id . "' AND date(a.tanggal)=DATE(now()) AND (dt.jenis='Poli' OR dt.jenis='Pelayanan')";
    $kueri = $this->db->query($sql);
    return $kueri->result();
  }

  function getDipanggil($idantrian = NULL, $bagian = NULL, $iddokter = NULL, $kodepoli = NULL, $loket = NULL)
  {
    $this->db->select("a.dipanggil,a.nomor");
    $this->db->from("antrian a");
    //$this->db->join("antriandtl dtl","dtl.id=a.id","left");
    $this->db->where("a.id", $idantrian);
    $this->db->where('a.posisi', $bagian);
    //$this->db->where('a.dipanggil',0);
    if ($bagian) {
      $this->db->where("a.jenis", $bagian);
    }

    /*if($iddokter){
        $this->db->where('a.iddokter',$iddokter);
    }*/
    /*if($kodepoli){
        $this->db->where('a.kode',$kodepoli);
    }*/
    /*if($loket !=0){
      $this->db->where('a.loket',(int)$loket);
    }*/
    $kueri = $this->db->get();
    return $kueri->result();
  }

  function getNorm($norm)
  {
    return $this->db->get_where("pasien", array("norm" => $norm))->num_rows();
  }

  function kode($idkode, $loop = null)
  {
    $data   = $this->db->get_where('kode', array('idkode' => $idkode));
    foreach ($data->result() as $datane) {
      if (!is_null($loop)) {
        $printt   = sprintf('%0' . $datane->digit . 'd', $datane->nomor + $loop);
        $prefix = $datane->prefix;
      } else {
        $printt  = sprintf('%0' . $datane->digit . 'd', $datane->nomor + 1);
        $prefix  = $datane->prefix;
      }
    }
    return $prefix . $printt;
  }

  function saverawatjalanlama($idantrian)
  {
    //$this->db2 = $this->load->database('db2', TRUE);

    $kueri = $this->db->select("norm,tanggal,kode,iddokter,idprsh,jenispasien")
      ->from("antrian")
      ->where("id", $idantrian)
      ->get();
    if ($kueri->num_rows() > 0) {
      $rowantrian = $kueri->row();
      /*if($rowantrian->jenispasien == 'baru'){
        $q = $this->db->get_where('pasienbaru',array('idpasien'=>(int) $rowantrian->norm));
        if($q->num_rows() > 0){
          $this->db2->insert('pasienbaru',$q->row_array());
        }
      }*/
      // $norm = ($rowantrian->jenispasien=='baru') ? 'x'.$rowantrian->norm : $rowantrian->norm;
      if ($rowantrian->jenispasien == 'lama') {
        $kolom = array(
          'faktur_rawatjalan' => $this->kode(1),
          'norm'          => $rowantrian->norm,
          'tglmasuk'      => $rowantrian->tanggal,
          'kodepoli'      => $rowantrian->kode,
          'iddokter'      => $rowantrian->iddokter,
          'idprsh'        => $rowantrian->idprsh,
        );

        //$this->db2->insert('rawatjalan', $kolom);
        //if($this->db2->affected_rows() > 0){
        $this->db->query("update kode set nomor=nomor+1 where idkode=1");
        return (bool) TRUE;
        // }else{
        //  return (bool) FALSE;
        // }
      } else {
        return (bool) TRUE;
      }
    } else {
      return (bool)false;
    }
  }

  function getjumlahantri($kodepoli, $dipanggil = null)
  {
    $this->db->select("a.id");
    $this->db->from("antrian a");
    $this->db->join("antriandtl ad", "ad.id=a.id", "left");
    $this->db->join("dokter d", "d.iddokter=a.iddokter", "left");
    $this->db->where('ad.jenis', 'Poli');
    if (!is_null($dipanggil)) {
      $this->db->where('ad.dipanggil', $dipanggil);
    }
    $this->db->where('date(a.tanggal)', date('Y-m-d'));
    $this->db->where('a.kode', $kodepoli);

    $kueri = $this->db->get();
    return $kueri->num_rows();
  }

  function antrianGanda($idbagian)
  {
    $this->db->select("a.nomor,al.loket");
    $this->db->from("antrian a");
    $this->db->join("antrianlog al", "al.id=a.id", "right");
    $this->db->where("a.id_bagian", $idbagian);
    $this->db->where("date(a.tanggal)", date('Y-m-d'));
    $this->db->where("a.dipanggil", 1);
    $this->db->limit(1);
    $this->db->order_by("a.last", "desc");

    return $this->db->get()->row();
  }
  function totalantrianGanda($idbagian)
  {
    $this->db->select("a.nomor,al.loket");
    $this->db->from("antrian a");
    $this->db->join("antrianlog al", "al.id=a.id", "left");
    $this->db->where("a.id_bagian", $idbagian);
    $this->db->where("date(a.tanggal)", date('Y-m-d'));
    $this->db->group_by("a.id");
    return $this->db->get()->num_rows();
  }
  function antrianGandaBlmPanggil($idbagian)
  {
    $this->db->select("a.nomor,al.loket");
    $this->db->from("antrian a");
    $this->db->join("antrianlog al", "al.id=a.id", "left");
    $this->db->where("a.id_bagian", $idbagian);
    $this->db->where("date(a.tanggal)", date('Y-m-d'));
    $this->db->where("a.dipanggil", 0);
    $this->db->group_by("a.id");

    return $this->db->get()->num_rows();
  }
}