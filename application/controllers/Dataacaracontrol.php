<?php
if(!defined('BASEPATH'))
exit('You dont have permission on this url');

/*
	Classname	: Dataacaracontrol
	Status		: Controller
	Tanggal		: 23-5-2016
	Methode		: 
	->__CONSTRUCT() <functional>
	->getDataAcara() <functional>
	->menambahDataAcara() <functional>
	->menghapusDataAcara() <functional>
	->mengubahDataAcara() <functional>
	Definisi :
	Class = sebagai class yang berurusan dengan control acara, terkait penghapusan perolehan data penghapusan dan penambahan
	Methode = 
	->__CONSTRUCT() = hal yang dijalankan saat inisialisasi class pada sesi instantiasi
	->getDataAcara() = mengambil data acara yang ada di database dengan output array of array ();
	->menambahDataAcara() = malakukan proses penambahan data, output berupa kode 1 berhasil dan 0 gagal
	->menghapusDataAcara() = malakukan proses penghapusan data, output berupa kode 1 berhasil dan 0 gagal
	->mengubahDataAcara() = malakukan proses pengubaan data atau update isi suatu baris pada tabel data acara, output berupa kode 1 berhasil dan 0 gagal
	Creator		: Jafar Abdurrahman Albasyir
	BASEPATH	: Design Visual dari designer dan analysys
*/
class Dataacaracontrol extends CI_Controller{
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->load->library('session');
    }
    public function getDataAcara($id=null){
        $this->load->model('dataacara');
        $this->load->helper('date');
        $temp = null;
        if($id==null){
            $this->dataacara->setActiveFunction('read');
            $this->dataacara->getProceedActive();
            $i = 0;
            while($this->dataacara->getCursorNext()){
                $temp[$i]['id'] = $this->dataacara->getId();
                $temp[$i]['tanggal'] = $this->dataacara->getTanggal();
                $temp[$i]['jam'] = $this->dataacara->getJam();
                $temp[$i]['nama_acara'] = $this->dataacara->getNamaAcara();
                $temp[$i]['penyelenggara'] = $this->dataacara->getPenyelenggara();
                $i++;
            }
            return $temp;
        }else{
            if(nice_date($id) == "Invalid Date"){
                $this->dataacara->setId($id);
                $this->dataacara->setActiveFunction('read');
                $this->dataacara->getProceedActive();
                if($this->dataacara->getCursorNext())
                return array(
                "id" => $this->dataacara->getId(),
                "tanggal" => $this->dataacara->getTanggal(),
                "jam" => $this->dataacara->getJam(),
                "nama_acara" => $this->dataacara->getNamaAcara(),
                "penyelenggara" => $this->dataacara->getPenyelenggara(),
                );
                else{
                    return array(
                        "id" => "Tidak ada",
                        "tanggal" => "Tidak ada",
                        "jam" => "Tidak ada",
                        "nama_acara" => "Tidak ada",
                        "penyelenggara" => "Tidak ada"
                    );
                }   
            }else{
                $this->dataacara->setTanggal($id);
                $this->dataacara->setActiveFunction('read');
                $this->dataacara->getProceedActive();
                $i = 0;
                while($this->dataacara->getCursorNext()){
                    $temp[$i]['id'] = $this->dataacara->getId();
                    $temp[$i]['tanggal'] = $this->dataacara->getTanggal();
                    $temp[$i]['jam'] = $this->dataacara->getJam();
                    $temp[$i]['nama_acara'] = $this->dataacara->getNamaAcara();
                    $temp[$i]['penyelenggara'] = $this->dataacara->getPenyelenggara();
                    $i++;
                }
                return $temp;
            } 
        }
    }
    public function menambahDataAcara(){
        if(!$this->session->has_userdata('login-admin'))
            exit("0anda melakukan debugging terhadap program");
        
        $tanggal = $this->isNullPost('tanggal');
        $jam = $this->isNullPost('jam');
        $nama = $this->isNullPost('namaacara');
        $penyelenggara = $this->isNullPost('penyelenggara');
        //exit("0".$tanggal." ".$jam." ".$nama." ".$penyelenggara);
        /*
        $tanggal = "2016-05-03";
        $jam = "12:30:45";
        $nama = "Reyhan";
        $penyelenggara = "Reyha";
        */
		//exit("0".date("Y-m-d H:i:s"));
        $this->load->helper('date');
        if(nice_date($tanggal,"Y-m-d") == 'Invalid Date')
            exit("0tanggal format year-month-day");
        if(nice_date($jam,"H:i:s") == 'Invalid Date')
            exit("0jam format hour:minute:second");
		//exit("0".nice_date($tanggal,"Y-m-d")." ".date("Y-m-d"));
        $tanggal = nice_date($tanggal,"Y-m-d");
        if(intval(nice_date($tanggal,"Y")) < intval(date("Y"))){
            exit("0start date minimum is now ");
        }else{
            if(intval(nice_date($tanggal,"Y")) == intval(date("Y"))){
                if(intval(nice_date($tanggal,"m")) < intval(date("m"))){
                    exit("0start date minimum is now ");
                }else{
                    if(intval(nice_date($tanggal,"m")) == intval(date("m"))){
                        if(intval(nice_date($tanggal,"d")) < intval(date("d"))){
                            exit("0start date minimum is now ");
                        }
						else if(intval(nice_date($tanggal,"d")) == intval(date("d"))){
							//exit("0".nice_date($jam,"H")." ".date("Y-m-d h:i:s"));
							if(intval(nice_date($jam,"H")) < intval(date("H"))){
								exit("0start time minimum is now ");
							}else{
								if(intval(nice_date($jam,"H")) == intval(date("H"))){
									if(intval(nice_date($jam,"i")) < intval(date("i"))){
										exit("0start time minimum is now ");
									}else{
										if(intval(nice_date($jam,"i")) == intval(date("i"))){
											if(intval(nice_date($jam,"s")) < intval(date("s"))){
												exit("0start time minimum is now ");
											}
										}
									}
								}
							}
						}
                    }
                }
            }
        }
        $jam = nice_date($jam,"H:i:s");
        $nama = htmlspecialchars(htmlentities($nama));
        $penyelenggara = htmlspecialchars(htmlentities($penyelenggara));
        $this->load->model('dataacara');
        $this->dataacara->setTanggal($tanggal);
        $this->dataacara->setJam($jam);
        $this->dataacara->setNamaAcara($nama);
        $this->dataacara->setPenyelenggara($penyelenggara);
        $this->dataacara->setActiveFunction();
        if($this->dataacara->getProceedActive()){
            exit("1valid");
        }else {
            exit("0failed to input data");
        }
    }
    public function menghapusDataAcara(){
        if(!$this->session->has_userdata('login-admin'))
            exit("0anda melakukan debugging terhadap program");
        $temp = intval($this->isNullPost('id'));
        //$temp = 1;
        if($temp <= 0)
            exit("0you are debugging");
        
        $this->load->model('dataacara');
        $this->dataacara->setId($temp);
        $this->dataacara->setActiveFunction('drop');
        if($this->dataacara->getProceedActive()){
            exit("1valid");
        }else {
            exit("0failed to input data");
        }
        
        
    }
    public function mengubahDataAcara(){
        if(!$this->session->has_userdata('login-admin'))
            exit("0anda melakukan debugging terhadap program");
        $tanggal = $this->isNullPost('tanggal');
        $jam = $this->isNullPost('jam');
        $nama = $this->isNullPost('namaacara');
        $penyelenggara = $this->isNullPost('penyelenggara');
        //exit("0".$tanggal." ".$jam." ".$nama." ".$penyelenggara);
        /*
        $tanggal = "2016-05-03";
        $jam = "12:30:45";
        $nama = "Reyhan";
        $penyelenggara = "Reyha";
        */
        $this->load->helper('date');
        if(nice_date($tanggal,"Y-m-d") == 'Invalid Date')
            exit("0tanggal format year-month-day");
        if(nice_date($jam,"H:i:s") == 'Invalid Date')
            exit("0jam format hour:minute:second");
        $id = intval($this->isNullPost('id'));
        $tanggal = nice_date($tanggal,"Y-m-d");
        $jam = nice_date($jam,"H:i:s");
        $nama = htmlspecialchars(htmlentities($nama));
        $penyelenggara = htmlspecialchars(htmlentities($penyelenggara));
        $this->load->model('dataacara');
        $this->dataacara->setId($id);
        $this->dataacara->setTanggal($tanggal);
        $this->dataacara->setJam($jam);
        $this->dataacara->setNamaAcara($nama);
        $this->dataacara->setPenyelenggara($penyelenggara);
        $this->dataacara->setActiveFunction('update');
        if($this->dataacara->getProceedActive()){
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