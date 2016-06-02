<?php
if(!defined('BASEPATH'))
    exit();

/*
	Classname	: Datavideo
	Status		: Database
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	Definisi :
	Class = Class model implementasi tabel Datavideo
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
class Datavideo extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->video = null;
    }
    private $video;
    public function setVideo($video=null){
        if($video == null)
            return false;
        if($video == "")
            return false;
        $temp = $this->db->query("SELECT * from datavideo")->result_object();
		if(count($temp) <=0){
			$this->db->insert("datavideo",array(
				"video" => $video
			));
			$this->video = null;
			return true;
		}
        $id = $temp[0]->video;
        $this->db->where('video',$id);
        $this->db->update("datavideo",array(
            "video" => $video
        ));
        $this->video = null;
        return true;
    }
    public function getVideo(){
        if($this->video == null)
        {
            $temp = $this->db->query("SELECT * from datavideo")->result_object();
            if(count($temp)>0)
            $this->video = $temp[0]->video;
            else $this->video = "";
        }
        $video = $this->video;    
        return $video;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

