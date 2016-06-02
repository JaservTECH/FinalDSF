<?php
if(!defined('BASEPATH'))
exit();

/*
	Classname	: Dataacara
	Status		: Database
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	Definisi :
	Class = Class model implementasi tabel Dataacara
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
class Dataacara extends CI_Model {
    private $id;
    private $tanggal;
    private $jam;
    private $nama_acara;
    private $penyelenggara;
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
    public function setJam($jam=null){
        $this->jam = $jam;
    }
    public function setNamaAcara($nama_acara=null){
        $this->nama_acara = $nama_acara;
    }
    public function setPenyelenggara($penyelenggara=null){
        $this->penyelenggara = $penyelenggara;
    }
    public function getId(){
        $id = $this->id;
        return $id;
    }
    public function getTanggal(){
        $tanggal = $this->tanggal;
        return $tanggal;
    }
    public function getJam(){
        $jam = $this->jam;
        return $jam;
    }
    public function getNamaAcara(){
        $nama_acara = $this->nama_acara;
        return $nama_acara;
    }
    public function getPenyelenggara(){
        $penyelenggara = $this->penyelenggara;
        return $penyelenggara;
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
                if($this->getSetNewAcara()){
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
                $this->setJam($this->temp->jam);
                $this->setNamaAcara($this->temp->nama_acara);
                $this->setPenyelenggara($this->temp->penyelenggara);
                return true;
            }else{
                $this->setId();
                $this->setTanggal();
                $this->setJam();
                $this->setNamaAcara();
                $this->setPenyelenggara();
                return false;
            }
        }else{
            if(array_key_exists($this->index,$this->temp)){
                $this->setId($this->temp[$this->index]->id);
                $this->setTanggal($this->temp[$this->index]->tanggal);
                $this->setJam($this->temp[$this->index]->jam);
                $this->setNamaAcara($this->temp[$this->index]->nama_acara);
                $this->setPenyelenggara($this->temp[$this->index]->penyelenggara);
                $this->index +=1;
                return true;
            }else{
                $this->setId();
                $this->setTanggal();
                $this->setJam();
                $this->setNamaAcara();
                $this->setPenyelenggara();
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
        $this->setJam();
        $this->setNamaAcara();
        $this->setPenyelenggara();
        $this->category = null;
    }
    //add link
    protected function getSetNewAcara(){
        if($this->id != null){
            $temp = $this->db->query("SELECT id FROM dataacara WHERE id=".$this->id)->result_object();
            if(count($temp) > 0)
                return false;   
        }
        if($this->tanggal == null)
            return false;
        if($this->jam == null)
            return false;
        if($this->nama_acara == null)
            return false;
        if($this->penyelenggara == null)
            return false;
        $this->db->set(
            array(
                "id" => $this->id,
                "tanggal" => $this->tanggal,
                "jam" => $this->jam,
                "nama_acara" => $this->nama_acara,
                "penyelenggara" => $this->penyelenggara
            )
        );
        $this->db->insert("dataacara");
        return true;
    }
    //update
    protected function getSetUpdate(){
        if($this->id == null)
            return false;
        if($this->tanggal == null)
            return false;
        if($this->jam == null)
            return false;
        if($this->nama_acara == null)
            return false;
        if($this->penyelenggara == null)
            return false;
        $temp = $this->db->query("SELECT * FROM dataacara WHERE id=".$this->id)->result_object();
        if(count($temp) <= 0)
            return false;
        $this->db->where('id',$this->id);
        $this->db->update("dataacara",array(
            "tanggal" => $this->tanggal,
            "jam" => $this->jam,
            "nama_acara" => $this->nama_acara,
            "penyelenggara" => $this->penyelenggara
        ));
        return true;
    }
    //Drop
    protected function getDropThisGuys(){
        if($this->id == null)
            return false;
        $temp = $this->db->query("SELECT * FROM dataacara WHERE id=".$this->id)->row_object();
        if(count($temp) <= 0)
            return false;
        $this->db->delete("dataacara",array(
            'id' => $this->id
        ));
        return true;
    }
    //read
    protected function getAllData(){
        if($this->tanggal !=null){
            $this->temp = $this->db->query("SELECT * FROM dataacara WHERE tanggal='".$this->tanggal."'")->result_object();
        }
        else if($this->id == null)
            $this->temp = $this->db->query("SELECT * FROM dataacara")->result_object();
        else{
            $this->temp = $this->db->query("SELECT * FROM dataacara WHERE id=".$this->id)->row_object();
        }
    }
}