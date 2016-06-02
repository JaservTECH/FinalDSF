<?php
if(!defined('BASEPATH'))
exit();
/*
	Classname	: Informasiakademik
	Status		: Database
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	Definisi :
	Class = Class model implementasi tabel Informasiakademik
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
class Informasiakademik extends CI_Model {
    private $id;
    private $tanggal;
    private $judul;
    private $nama_photo;
    private $isi;
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->resetValue();
        $this->load->database();
        $this->setDestroyCursor();
    }
    //add to insert, drop to delete, update to update, read to read
    public function setId($id=null){
        $this->id = $id;
    }
    public function setTanggal($tanggal=null){
        $this->tanggal = $tanggal;
    }
    public function setJudul($judul=null){
        $this->judul = $judul;
    }
    public function setNamaPhoto($nama_photo=null){
        $this->nama_photo = $nama_photo;
    }
    public function setIsi($isi=null){
        $this->isi = $isi;
    }
    public function getId(){
        $id = $this->id;
        return $id;
    }
    public function getTanggal(){
        $tanggal = $this->tanggal;
        return $tanggal;
    }
    public function getJudul(){
        $judul = $this->judul;
        return $judul;
    }
    public function getNamaPhoto(){
        $nama_photo = $this->nama_photo;
        return $nama_photo;
    }
    public function getIsi(){
        $isi = $this->isi;
        return $isi;
    }
    //executor
    public function setActiveFunction($cat="add"){
        $this->category = $cat;
    }
    public function getProceedActive(){
        if($this->category == null)
            return false;
        switch ($this->category) {
            case 'add':
                if($this->getSetNewInformasi()){
                    $this->resetValue();
                    return true;
                }else{
                    return false;
                }
                break;
            case "update" :
                if($this->getSetUpdate()){
                    $this->resetValue();
                    return true;
                }else{
                    return false;
                }
                break;
            case "drop" :
                if($this->getDropThisGuys()){
                    $this->resetValue();
                    return true;
                }else{
                    return false;
                }
                break;
            case 'read' :
                $this->getAllData();
                break;
            default:
                return false;
                break;
        }
    }
    public function getCursorNext(){
        if($this->temp == null)
            return false;
        if(!is_array($this->temp))
        {
            if(count($this->temp) > 0){
                $this->setId($this->temp->id);
                $this->setTanggal($this->temp->tanggal);
                $this->setJudul($this->temp->judul);
                $this->setNamaPhoto($this->temp->gambar);
                $this->setIsi($this->temp->isi);
                return true;
            }else{
                $this->setId();
                $this->setTanggal();
                $this->setJudul();
                $this->setIsi();
                $this->setNamaPhoto();
                return false;
            }
        }else{
            if(array_key_exists($this->index,$this->temp)){
                $this->setId($this->temp[$this->index]->id);
                $this->setTanggal($this->temp[$this->index]->tanggal);
                $this->setJudul($this->temp[$this->index]->judul);
                $this->setNamaPhoto($this->temp[$this->index]->gambar);
                $this->setIsi($this->temp[$this->index]->isi);
                $this->index +=1;
                return true;
            }else{
                $this->setId();
                $this->setTanggal();
                $this->setJudul();
                $this->setIsi();
                $this->setNamaPhoto();
                return false;
            }
        }
    }
    public function setDestroyCursor(){
        $this->temp = null;
        $this->index = 0;
    }
    //protected
    protected function resetValue(){
        $this->setId();
        $this->setTanggal();
        $this->setJudul();
        $this->setIsi();
        $this->setNamaPhoto();
        $this->category = null;
    }
    //add link
    protected function getSetNewInformasi(){
        if($this->id != null){
            $temp = $this->db->query("SELECT id FROM informasiakademik WHERE id=".$this->id)->result_object();
            if(count($temp) > 0)
                return false;   
        }
        if($this->tanggal == null)
            return false;
        if($this->judul == null)
            return false;
        if($this->nama_photo == null)
            $this->nama_photo = "";
        if($this->isi == null)
            return false;
        $this->db->set(
            array(
                "id" => $this->id,
                "tanggal" => $this->tanggal,
                "judul" => $this->judul,
                "gambar" => $this->nama_photo,
                "isi" => $this->isi
            )
        );
        $this->db->insert("informasiakademik");
        return true;
    }
    //update
    protected function getSetUpdate(){
        if($this->id == null)
            return false;
        if($this->tanggal == null)
            return false;
        if($this->judul == null)
            return false;
        if($this->nama_photo == null)
            $this->nama_photo = "";
        if($this->isi == null)
            return false;
        $temp = $this->db->query("SELECT * FROM informasiakademik WHERE id=".$this->id)->result_object();
        if(count($temp) <= 0)
            return false;
        $this->db->where('id',$this->id);
        if($this->nama_photo == ""){
            $this->db->update("informasiakademik",array(
                "tanggal" => $this->tanggal,
                "judul" => $this->judul,
                "isi" => $this->isi
            ));
            
        }else{
            $this->db->update("informasiakademik",array(
                "tanggal" => $this->tanggal,
                "judul" => $this->judul,
                "gambar" => $this->nama_photo,
                "isi" => $this->isi
            ));
        }
        return true;
    }
    //Drop
    protected function getDropThisGuys(){
        if($this->id == null)
            return false;
        $temp = $this->db->query("SELECT * FROM informasiakademik WHERE id=".$this->id)->row_object();
        if(count($temp) <= 0)
            return false;
        $this->db->delete("informasiakademik",array(
            'id' => $this->id
        ));
        return true;
    }
    //read
    protected function getAllData(){
        if($this->tanggal !=null){
            $this->temp = $this->db->query("SELECT * FROM informasiakademik WHERE tanggal='".$this->tanggal."'")->result_object();
        }
        else if($this->id == null)
            $this->temp = $this->db->query("SELECT * FROM informasiakademik")->result_object();
        else{
            $this->temp = $this->db->query("SELECT * FROM informasiakademik WHERE id=".$this->id)->row_object();
        }
    }
}