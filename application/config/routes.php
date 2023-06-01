<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['home']='Halaman/view';

$route['tabelrule']='Dataknowledge_control/dataRule';
$route['tabelrule/(:any)']='Dataknowledge_control/dataRule/$1';
$route['tambahRule']='Dataknowledge_control/tambahRule';
$route['deleteRule/(:any)']='Dataknowledge_control/deleteRule/$1';
$route['updateRule/(:any)']='Dataknowledge_control/updateRule/$1';

$route['tabelpertanyaan']='Dataknowledge_control/dataPenyakit';
$route['tambahPertanyaan']='Dataknowledge_control/tambahPertanyaan';
$route['tabelpertanyaan/(:any)']='Dataknowledge_control/dataPenyakit/$1';
$route['deletePertanyan/(:any)']='Dataknowledge_control/deletePertanyaan/$1';
$route['updatePertanyaan/(:any)']='Dataknowledge_control/updatePertanyaan/$1';

$route['tabelminat']='Dataknowledge_control/datatabelminat';
$route['tabelminat/(:any)']='Dataknowledge_control/datatabelminat/$1';
$route['tambahMinat']='Dataknowledge_control/tambahMinat';
$route['deletePenyakit/(:any)']='Dataknowledge_control/deletePenyakit/$1';
$route['updateMinat/(:any)']='Dataknowledge_control/updateMinat/$1';

$route['TabelPekerjaan']='Dataknowledge_control/dataGejala';
$route['TabelPekerjaan/(:any)']='Dataknowledge_control/dataGejala/$1';
$route['tambahGejala']='Dataknowledge_control/tambahGejala';
$route['deleteGejala/(:any)']='Dataknowledge_control/deleteGejala/$1';
$route['updateGejala/(:any)']='Dataknowledge_control/updateGejala/$1';


$route['tabelpeserta']='Dataknowledge_control/dataSiswa';
$route['tabelpeserta/(:any)']='Dataknowledge_control/dataSiswa/$1';
$route['tambahPeserta']='Dataknowledge_control/tambahSiswa';
$route['deletePeserta/(:any)']='Dataknowledge_control/deleteSiswa/$1';
$route['updatePeserta/(:any)']='Dataknowledge_control/updateSiswa/$1';
$route['logPeserta/(:any)']='Dataknowledge_control/logSiswa/$1';
$route['log_gula/(:any)']='Dataknowledge_control/log_gula/$1';
$route['cetakdiagnosa/(:any)']='Dataknowledge_control/cetakdiagnosa/$1';
$route['cetakgula/(:any)']='Dataknowledge_control/cetakgula/$1';

$route['tabelartikel']='Dataknowledge_control/dataArtikel';
$route['tabelartikel/(:any)']='Dataknowledge_control/dataArtikel/$1';
$route['tambahArtikel']='Dataknowledge_control/tambahArtikel';
$route['deleteArtikel/(:any)']='Dataknowledge_control/deleteArtikel/$1';
$route['updateArtikel/(:any)']='Dataknowledge_control/updateArtikel/$1';
// $route['logSiswa/(:any)']='Dataknowledge_control/logSiswa/$1';




$route['konsultasi'] = 'Konsultasi_control/konsultasi';
$route['profile'] = 'Profile_control/edit_profile';
$route['konsultasi/(:any)'] = 'Konsultasi_control/konsultasi/$1';
$route['index.php/Konsultasi_control/konsultasi_backwardchaining/(:any)'] = 'Konsultasi_control/konsultasi_backwardchaining/$1';
$route['signOut'] = 'Login/logout';
$route['default_controller'] ='Halaman/home';
// $route['default_controller'] ='Halaman/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
