<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	Gatot Satriyo
**/
if ( ! function_exists('valid_title')){
	function valid_title($title = ''){
		$result = str_replace('_',' ',$title);
		return $result;
	}
}
	function rupiah($value = ''){
		if($value){
			$formated = 'Rp '.str_replace(',', '.', number_format($value));
			return $formated;
		}else{
			return false;
		}
    }
	function img_setujui($setujui=''){
        $gb = "<img id='link' src='".base_url()."asset/images/admtheme/icons/setujui.png' title='Tampilkan Data Terpilih' >$setujui";
		return $gb;
	}
	function img_nosetujui($nosetujui=''){
        $gb = "<img id='link' src='".base_url()."asset/images/admtheme/icons/nosetujui.png' title='Jangan Tampilkan Data Terpilih' >$nosetujui";
		return $gb;
	}
	function img_hapus($hapus=''){
        $gb = "<img id='link' src='".base_url()."asset/images/admtheme/icons/hapus.png' title='Hapus Data Terpilih' >$hapus";
		return $gb;
	}
	function img_edit($edit=''){
        $gb = "<img id='link' src='".base_url()."asset/images/admtheme/icons/edit.png' title='Ubah Data Terpilih' >$edit";
		return $gb;
	}
	function img_detail($detail=''){
		$gb = "<img id='link' src='".base_url()."asset/images/admtheme/icons/detail.png' title='Tampilkan Data Detail'>$detail";
		return $gb;
	}
	function img_balas($balas=''){
		$gb = "<img id='link' src='".base_url()."asset/images/admtheme/icons/balas.png' title='Balas Komentar'>$balas";
		return $gb;
	}
	function tgl_ingg($tgl_awal){
		$tahun	= substr($tgl_awal,6,4);
		$bulan 	= substr($tgl_awal,3,2);
		$hari	= substr($tgl_awal,0,2);
		$tgl = $tahun."-".$bulan."-".$hari;
		return $tgl;
	}
	function tgl_indo($tgl_awal,$text=0){
		$tahun	= substr($tgl_awal,0,4);
        if($text){
            $bln 	= substr($tgl_awal,5,2);
            switch($bln){
                case "01" :
                    $bulan = "Januari";
                    break;
                case "02" :
                    $bulan = "Febuari";
                    break;
                case "03" :
                    $bulan = "Maret";
                    break;
                case "04" :
                    $bulan = "April";
                    break;
                case "05" :
                    $bulan = "Mei";
                    break;
                case "06" :
                    $bulan = "Juni";
                    break;
                case "07" :
                    $bulan = "Juli";
                    break;
                case "08" :
                    $bulan = "Agustus";
                    break;
                case "09" :
                    $bulan = "September";
                    break;
                case "10" :
                    $bulan = "Oktober";
                    break;
                case "11" :
                    $bulan = "November";
                    break;
				default :
					$bulan = "Desember";
            }
            $hari	= substr($tgl_awal,8,2);
            $tgl    = $hari." ".$bulan." ".$tahun;
            return $tgl;
        }else{
    		$bulan 	= substr($tgl_awal,5,2);
            $hari	= substr($tgl_awal,8,2);
            $tgl = $hari."-".$bulan."-".$tahun;
            return $tgl;
        }
	}
/* End of file download_helper.php */
/* Location: ./system/helpers/download_helper.php */