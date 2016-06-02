<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this url');
/*
	Classname	: Informasiakademikcontrol
	Status		: Controller
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	->getInformasiAkademik()
	->menambahInformasiAkademik()
	->menghapusInformasiAkademik()
	->mengubahInformasiAkademik()
	->isNullPost()
	Definisi :
	Class = Class control segala macam tindakan terkait informasi kontrol
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	->getInformasiAkademik() = fungsi untuk memperoleh data informasi yangs sudah tersedia dalam database
	->menambahInformasiAkademik() = fungsi control penambahan data pada informasi akademik , output berhasil atan gagal
	->menghapusInformasiAkademik() = funcsi control penghapusan data nformasi, output berupa berhasil atau gagal
	->mengubahInformasiAkademik() = fungsi control pengubahan data informasi akademik, output berhasil atau gagal
	->isNullPost() = check apakan input post null , output berupa nilai post atau halt dengan error NULL
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
class Informasiakademikcontrol extends CI_Controller{
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->load->library('session');
    }
    public function getInformasiAkademik($id=null){
        $this->load->model('informasiakademik');
        $this->load->helper('date');
        $temp = null;
        if($id==null){
            $this->informasiakademik->setActiveFunction('read');
            $this->informasiakademik->getProceedActive();
            $i = 0;
            while($this->informasiakademik->getCursorNext()){
                $temp[$i]['id'] = $this->informasiakademik->getId();
                $temp[$i]['tanggal'] = $this->informasiakademik->getTanggal();
                $temp[$i]['judul'] = $this->informasiakademik->getJudul();
                $temp[$i]['nama_foto'] = $this->informasiakademik->getNamaPhoto();
                $temp[$i]['isi'] = $this->informasiakademik->getIsi();
                $i++;
            }
            return $temp;
        }else{
            if(nice_date($id) == "Invalid Date"){
                $this->informasiakademik->setId($id);
                $this->informasiakademik->setActiveFunction('read');
                $this->informasiakademik->getProceedActive();
                if($this->informasiakademik->getCursorNext())
                return array(
                "id" => $this->informasiakademik->getId(),
                "tanggal" => $this->informasiakademik->getTanggal(),
                "judul" => $this->informasiakademik->getJudul(),
                "nama_foto" => $this->informasiakademik->getNamaPhoto(),
                "isi" => $this->informasiakademik->getIsi(),
                );
                else{
                    return array(
                        "id" => "Tidak ada",
                        "tanggal" => "Tidak ada",
                        "judul" => "Tidak ada",
                        "nama_foto" => "Tidak ada",
                        "isi" => "Tidak ada"
                    );
                }   
            }else{
                $this->informasiakademik->setTanggal($id);
                $this->informasiakademik->setActiveFunction('read');
                $this->informasiakademik->getProceedActive();
                $i = 0;
                while($this->informasiakademik->getCursorNext()){
                    $temp[$i]['id'] = $this->informasiakademik->getId();
                    $temp[$i]['tanggal'] = $this->informasiakademik->getTanggal();
                    $temp[$i]['judul'] = $this->informasiakademik->getJudul();
                    $temp[$i]['nama_foto'] = $this->informasiakademik->getNamaPhoto();
                    $temp[$i]['isi'] = $this->informasiakademik->getIsi();
                    $i++;
                }
                return $temp;
            } 
        }
    }
    public function menambahInformasiAkademik(){
        if(!$this->session->has_userdata('login-admin'))
            exit("0anda melakukan debugging terhadap program");
        $tanggal = $this->isNullPost('tanggalInf');
        $judul = $this->isNullPost('judulInf');
        $isi = $this->isNullPost('isiInf');
        
        $namafoto = "";
        $namF = date("Ymdhis");
        $config['upload_path'] = 'resource/img/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']     = '1024';
        $config['max_width'] = '768';
        $config['max_height'] = '768';
        $config['file_name'] = $namF;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('nama-fotoInf')){
            if($this->upload->display_errors('|','|') != "|You did not select a file to upload.|")
                exit("0Foto height : 768, width : 768 png|jpg max 1mb");
        }else
            $namafoto = $this->upload->data('file_name');
        //exit("0".$tanggal." ".$jam." ".$nama." ".$penyelenggara);
        /*
        $tanggal = "2016-05-03";
        $judul = "Holder";
        $namafoto = "koko.jpg";
        $isi = "Pada hari minggu ku turut ayah ke kota.";
        */
        $this->load->helper('date');
        if(nice_date($tanggal,"Y-m-d") == 'Invalid Date')
            exit("0tanggal format year-month-day");
        $judul = htmlspecialchars(htmlentities($judul));
        $tanggal = nice_date($tanggal,"Y-m-d");
        $isi = htmlspecialchars(htmlentities($isi));
        $this->load->model('informasiakademik');
        $this->informasiakademik->setTanggal($tanggal);
        $this->informasiakademik->setJudul($judul);
        $this->informasiakademik->setNamaPhoto($namafoto);
        $this->informasiakademik->setIsi($isi);
        $this->informasiakademik->setActiveFunction();
        if($this->informasiakademik->getProceedActive()){
            exit("1valid");
        }else {
            exit("0failed to input data");
        }
    }
    public function menghapusInformasiAkademik(){
        if(!$this->session->has_userdata('login-admin'))
            exit("0anda melakukan debugging terhadap program");
        $temp = intval($this->isNullPost('id'));
        //$temp = 1;
        if($temp <= 0)
            exit("0you are debugging");
        
        $this->load->model('informasiakademik');
        $this->informasiakademik->setId($temp);
        $this->informasiakademik->setActiveFunction('drop');
        if($this->informasiakademik->getProceedActive()){
            exit("1valid");
        }else {
            exit("0failed to input data");
        }
        
        
    }
    public function mengubahInformasiAkademik(){
        
        if(!$this->session->has_userdata('login-admin'))
            exit("0anda melakukan debugging terhadap program");
        $tanggal = $this->isNullPost('tanggalInf');
        $judul = $this->isNullPost('judulInf');
        $isi = $this->isNullPost('isiInf');
        $id = intval($this->isNullPost('idActive'));
        if($id <= 0)
            exit("0anda melakukan debugging terhadap program");
        $namafoto = "";
        $namF = date("Ymdhis");
        $config['upload_path'] = 'resource/img/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']     = '1024';
        $config['max_width'] = '768';
        $config['max_height'] = '768';
        $config['file_name'] = $namF;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('nama-fotoInf')){
            if($this->upload->display_errors('|','|') != "|You did not select a file to upload.|")
                exit("0Foto height : 768, width : 768 png|jpg max 1mb");
        }else
            $namafoto = $this->upload->data('file_name');
        //exit("0".$tanggal." ".$jam." ".$nama." ".$penyelenggara);
        /*
        $tanggal = "2016-05-03";
        $judul = "Holder";
        $namafoto = "koko.jpg";
        $isi = "Pada hari minggu ku turut ayah ke kota.";
        */
        $this->load->helper('date');
        if(nice_date($tanggal,"Y-m-d") == 'Invalid Date')
            exit("0tanggal format year-month-day");
        $judul = htmlspecialchars(htmlentities($judul));
        $tanggal = nice_date($tanggal,"Y-m-d");
        $isi = htmlspecialchars(htmlentities($isi));
        $this->load->model('informasiakademik');
        $this->informasiakademik->setId($id);
        $this->informasiakademik->setTanggal($tanggal);
        $this->informasiakademik->setJudul($judul);
        $this->informasiakademik->setNamaPhoto($namafoto);
        $this->informasiakademik->setIsi($isi);
        
        
        $this->informasiakademik->setActiveFunction('update');
        if($this->informasiakademik->getProceedActive()){
            exit("1valid");
        }else {
            exit("0failed to input data");
        }
    }
    protected function isNullPost($a){
        if($this->input->post($a) == null){
            exit("0Check your input");
        }
        return htmlspecialchars(htmlentities($this->input->post($a)));
    }
}