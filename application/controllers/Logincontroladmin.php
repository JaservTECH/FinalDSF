<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this site');
/*
	Classname	: Logincontroladmin
	Status		: Controller
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	->validasiAdmin() <functional>
	->logout() <functional>
	Definisi :
	Class = Class control admin, login dan logout session
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	->validasiAdmin() = melakukan validasi login berhasil atau tidak, setting session dan output berhasil atau gagal
	->logout() = melakukan penghapusan session dan mengembalikan pesan keberhasil penghapusan session , output berupa berhasil atau gagal
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
class Logincontroladmin extends CI_Controller{
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->load->library('session');
        
    }
    public function validasiAdmin(){
        if($this->session->has_userdata('login-admin'))
            exit("1Valid");
        $username;
        $password;
        //exit("0".$this->input->post('username')." ".$this->input->post('password'));
        if($this->input->post('username') == null)
            exit('0username cannot be blank');
        if($this->input->post('password') == null)
            exit('0password cannot be blank');
        $username = htmlentities(htmlspecialchars($this->input->post('username')));
        $password = htmlentities(htmlspecialchars($this->input->post('password')));
        $this->load->model('admin');
        if($username != $this->admin->getUsername())
            exit('0Username cannot be found');
        if($password != $this->admin->getPassword())
            exit('0Password did not match'.$this->admin->getPassword());
        $this->session->set_userdata('login-admin',true);
        exit('1Valid');
    }
    public function logout(){
        if(!$this->session->has_userdata('login-admin'))
            exit("0Failed");
        $this->session->unset_userdata('login-admin');
        exit("1succes");
    }
}