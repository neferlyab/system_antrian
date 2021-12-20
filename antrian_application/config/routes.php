<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']= 'pages';
$route['daftar/(:any)']		= 'pendaftaran/$1';
$route['pasien-lama']		= 'public_controller/pasienlama';
$route['pasien-baru']		= 'public_controller/pasienbaru';
$route['jenis-layanan']		= 'public_controller/jenislayanan';
$route['daftar-langsung']	= 'public_controller/daftarlangsung';
$route['cek-kamar']			= 'public_controller/cek_kamar';
$route['maps']				= 'public_controller/peta_lokasi';
$route['daftar-tunggu']		= 'public_controller/daftar_tunggu';


/*data json controller*/
$route['ketersediaan-kamar']= 'datajson/getKamar';
$route['simpan-pendaftaran']= 'datajson/simpandaftar';
$route['selesai-layanan']	= 'datajson/selesaimelayani';
$route['cetak-nota/(:num)']	= 'datajson/cetaknota/$1';
$route['validasi-online']	= 'datajson/validOnline';
$route['cekrm-daftarlangsung']	= 'datajson/daftarlangsungCek';
$route['nota-modal/(:num)']	= 'datajson/notamodal/$1';
$route['nota-pdf/(:num)']	= 'datajson/notapdf/$1';
$route['pelayanan-informasi']	= 'datajson/daftarPelayananInformasi';
$route['pelayanan-sep']	= 'datajson/daftarPelayananSep';
$route['cetak-pelayanan/(:num)']	= 'datajson/cetakPelayanan/$1';


/*Administrator controller*/
$route['admin']='admin/adminpages/index';
$route['admin/(:any)'] = 'admin/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'admin/login';
$route['baca/(:any)'] = 'public_controller/baca/$1';
$route['berita.html'] = 'public_controller/artikel';
$route['read/(:any)'] = 'public_controller/read/$1';
$route['kategori/(:num)'] = 'public_controller/kategori/$1';
$route['list-download.html'] = 'public_controller/listdownload';
$route['getdownload/(:any)'] = 'public_controller/getdownload/$1';
$route['gallery.html']       = 'public_controller/gallery';
$route['galeri/(:any)']          = 'public_controller/galeri/$1';
$route['adminlogins']       = 'rsbglogin/login';
$route['admin-login-proc'] = 'rsbglogin/login';
$route['poweroff'] 	= 'rsbglogin/logout';
$route['hubungikami.html'] = 'public_controller/hubungikami';
$route['pengumuman.html'] = 'public_controller/pengumuman';
$route['agenda.html'] = 'public_controller/agenda';
$route['pengumuman/(:num)'] = 'public_controller/detailpengumuman/$1';
$route['agenda/(:num)'] = 'public_controller/detailagenda/$1';
