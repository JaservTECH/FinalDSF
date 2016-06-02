<?php
if(!defined('BASEPATH'))
    exit();

/*
	Classname	: Formdatavideo
	Status		: Boundary
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	->tampilVideo() <functional>
	->tampilPeviewVideo() <not functional>
	->submit() <not functional>
	Definisi :
	Class = Class yang menampilkan video tag bingkai
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	->tampilVideo() = menampilkan tampilan video yang akan dilihat pengunjung maupun admin menyesuaikan diri denga sesi login, output tag html
	->tampilPreviewVideo() = rencana untyk versi admin
	->submit() = belum ada rencana peggunaannya
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
function base_url(){
    return "http://localhost/FinalDSF/";
}
class Formdatavideo {
    public function __CONSTRUCT(){
        require_once BASEPATH."libraries/Session/Session.php";
        $this->session = new CI_Session();
        
    }
    public function tampilVideo(){
        $edit = false;
        
        $login = false;
        if($this->session->has_userdata('login-admin')){
            $login = true;
            echo "1";
        }else echo "0";
        $temp = "";
        $this->session = null;
        require_once APPPATH.'controllers/Datavideocontrol.php';
        $this->datavideocontrol = new Datavideocontrol();
        $videoName = $this->datavideocontrol->getDataVideo();
        //require_once BASEPATH.'helpers/url_helper.php';
        require_once APPPATH."views/Template_video.php";
        
    }
    public function tampilPeviewVideo(){
        
    }
    public function submit(){
        
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

