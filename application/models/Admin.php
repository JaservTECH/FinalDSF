<?php
if(!defined('BASEPATH'))
exit('You dont have permission to this url');
/*
	Classname	: Admin
	Status		: Database
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	Definisi :
	Class = Class implemetasi tabel admin
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
class Admin extends CI_Model {
    private $username;
    private $password;
    private $name;
    function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->load->database();
        $temp = $this->db->query("SELECT * FROM admin")->result_object();
        $this->username = $temp[0]->username;
        $this->password = $temp[0]->password;
        $this->name = $temp[0]->nama;
    }
    public function getUsername(){
        $temp = $this->username;
        return $temp;
    }
    public function getPassword(){
        $temp = $this->password;
        return $temp;
    }
    public function getName(){
        $temp = $this->name;
        return $temp;
    }
}