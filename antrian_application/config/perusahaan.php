<?php

/**
 * @Author: PT. Global Eushanosoft
 * @Date:   2018-05-08 09:28:49
 * @Last Modified by:   amin
 * @Last Modified time: 2018-05-25 10:42:45
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$ci=& get_instance();
$ci->load->database();

$usaha = $ci->db->get("pengaturan")->result();
foreach($usaha as $u){
    $config["nama"] = $u->namalembaga;
    $config["alamat"] = $u->alamat;
    $config["telepon"] = $u->telepon;
    $config["email"] = $u->email;
    $config["web"] = $u->website;
    $config["bg"] = $u->bg;
    $config["logo"] = $u->logo;
   // $config["maps"] = $u->maps;
}