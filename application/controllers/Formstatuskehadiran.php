<?php
if(!defined('BASEPATH'))
    exit();


function base_url(){
    return "http://localhost/DS-FSMRebuild/";
}
class Tempsme extends CI_Controller{
    function __CONSTRUCT(){
        parent::__CONSTRUCT();
       // $this->load->model('statuskehadiran');
    }
    function getModel($key){
        $this->load->model($key);
        return $this->$key;
    }
}
/*
	Class Assoc : Tempsme inherits to CI_Controller
	Class Status: Helper get model
	Classname	: Formstatuskehadiran
	Status		: Boundary
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	->tampilStatusKehadiran() <functional>
	->updateStatusKehadiran() <not functional>
	Definisi :
	Class = Class yang menampilkan informasi kehadiran dari dekan dengan mengambil data dari database dengan bantuan Class Tempsme sebagai gerbang model. output berupa tag HTML
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	->tampilStatusKehadiran() = fungsi untuk memperoleh data informasi yangs sudah tersedia dalam database
	->updateStatusKehadiran() = rencana update data tampi ndak jadi.
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
class Formstatuskehadiran {
    public function __CONSTRUCT(){
        
    }
    public function tampilStatusKehadiran(){
        //require_once BASEPATH.'core/Model.php';
        //require_once APPPATH.'models/Statuskehadiran.php';
        //$statuskehadiran = new Statuskehadiran();
        
        $temp = new Tempsme();
        $statuskehadiran = $temp->getModel('Statuskehadiran');
        $statuskehadiran->getData();
        //require_once BASEPATH.'helpers/url_helper.php';
        require_once APPPATH."views/Template_dekan.php";
        
    }
    public function updateStatusKehadiran(){
        
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

