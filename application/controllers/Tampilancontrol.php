<?php
if(!defined('BASEPATH'))
    exit('Yoou dont have permission to this url');
/*
	Classname	: Tampilancontrol
	Tanggal		: 23-5-2016
	Methode		: 
	->tampilanKonten() <functional>
	Definisi :
	Class = sebagai pondasi web, bertugas me load bingkai DSF dan memanggil booundari control lainnya untukdiletakan di dalam web
	Methode = 
	->tampilanKonten() = menampilkan bingkai web yang respponsive dan meload javascript untuk proses load boundary lain kedalam bingkai, output bberupa html, css dan javascript
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
class Tampilancontrol extends CI_Controller {
    public function tampilanKonten(){
        $this->load->helper('url');
        $this->load->view('template_konten');
    }
}