<?php
if(!defined('BASEPATH'))
    exit();
/*
	Classname	: Statuskehadiran
	Status		: Database
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	Definisi :
	Class = Class model implementasi tabel Statuskehadiran
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
class Statuskehadiran extends CI_Model {
    private $nama;
    private $nip;
    private $jabatan;
    private $status;
    private $foto;
    function getNama() {
        return $this->nama;
    }

    function getNip() {
        return $this->nip;
    }

    function getJabatan() {
        return $this->jabatan;
    }

    function getStatus() {
        return $this->status;
    }

    function getFoto() {
        return $this->foto;
    }
    function setNama($nama) {
        $this->nama = $nama;
    }

    function setNip($nip) {
        $this->nip = $nip;
    }

    function setJabatan($jabatan) {
        $this->jabatan = $jabatan;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->resetValue();
    }
    protected function resetValue(){
        
        $this->temp = null;
        $this->setFoto(null);
        $this->setJabatan(null);
        $this->setNama(null);
        $this->setNip(null);
        $this->setStatus(null);
        $this->cursor = 0;
    }
    public function getData(){
        $this->temp = $this->db->query('SELECT * FROM statuskehadiran')->result_object();
    }
    public function cursorNext(){
        if($this->temp == null)
            return false;
        if(!array_key_exists($this->cursor, $this->temp))
                return false;
        $this->setFoto($this->temp[$this->cursor]->foto);
        $this->setJabatan($this->temp[$this->cursor]->jabatan);
        $this->setNama($this->temp[$this->cursor]->nama);
        $this->setNip($this->temp[$this->cursor]->nip);
        $this->setStatus($this->temp[$this->cursor]->status);
        $this->cursor+=1;
        return true;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

