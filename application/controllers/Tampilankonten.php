<?php
if(!defined('BASEPATH'))
    exit('You dont have permission on this url');

/*
	Classname	: Tampilankonten
	Status		: Boundary
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	->__tampil() <functional>
	Definisi :
	Class = sebagai pondasi web, bertugas me load bingkai DSF dan memanggil booundari control lainnya untukdiletakan di dalam web
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	->tampil() = menampilkan menu login, output tag html
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
  class Tampilankonten {
      public function __CONSTRUCT(){
            require_once BASEPATH."libraries/Session/Session.php";
           $this->session = new CI_Session();
          
      }
      public function tampil(){
            if(!function_exists('base_url')){
                function base_url(){
                    return "http://localhost/DS-FSM/";
                }; 
            }
            if($this->session->has_userdata('login-admin'))
              exit("0");
              
            echo "1";
            require_once APPPATH.'/views/Template_login.php';
            $this->session = null;
      }
  }