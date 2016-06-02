<?php if(!defined('BASEPATH'))
     exit ('You dont have permission on this site');
?>
        <div style="display:<?php if($login) echo 'block'; else echo 'none';?>; position:absolute; z-index: 600;height: 40px; background : rgba(255,255,255,0.3);width : 100%;"> 
                <span class="icon-plus pointer" id="add-informasi" style="font-size : 20px; line-height : 40px;float : right ; margin-right : 10px;"></span>
                <span class="icon-edit pointer" id="edit-informasi" style="font-size : 20px; line-height : 40px;float : right ; margin-right : 10px;"></span>
                <div id="add-informasi-message" style="display: none; position : absolute; margin-top : 40px; z-index : 500; color : #666; background-color : rgba(250,250,250,0.7); text-align : center; width : 100%;">
                    <form id="formaddinformasi" method=POST target="frame-layout" enctype="multipart/form-data" action="<?php echo base_url(); ?>Informasiakademikcontrol/menambahInformasiAkademik" >
                        <input id="tanggalInf" name="tanggalInf" type="text" placeholder="Tanggal (2016-04-23)" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
                        <input id="judulInf" name="judulInf" type="text" placeholder="judul (Acara Peresmian)" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
                        <input id="isiInf" name="isiInf" type="text" placeholder="Isi (Hello guys hoalah)" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
                        <input id="idActive" name="idActive" style="display : none;">
                        <input type="button" id="uploadInfExe" value="Upload(.jpg,.png)" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
                        <input id="nama-fotoInf"  name="nama-fotoInf" type="file" placeholder="Penanggungjawab (Jafar abdurrahman albasyir)" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px; display: none;">
                        <input type="button" id="submit-informasi" value="Masukan" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
                        <input type="button" id="submit-edit-informasi" value="Masukan" style="display : none; background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
                        
                    <iframe id="frame-layout" name="frame-layout" class="hidden"></iframe>
                    </form>
                </div>
                <div id="edit-informasi-control"  style="max-height : 120px;display: none; position : absolute; margin-top : 40px; z-index : 500; color : #666; background-color : rgba(250,250,250,0.95); text-align : center; width : 100%;">
                        <div id="template-edit-informasi" style="overflow-y:auto;overflow-x:hidden; background-color : rgba(250,250,250,0.95); width : 100%; ">
                                <table class="table table-hover"> 
                                        <thead> 
                                                <tr> 
                                                        <th>Foto</th> 
                                                        <th>Tanggal</th> 
                                                        <th>Judul</th> 
                                                        <th>Isi</th> 
                                                        <th>Kontrol</th>
                                                </tr> 
                                        </thead> 
                                        <tbody id="content-edit-table-informasi" > 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                                <tr> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th> 
                                                        <th>-</th>
                                                </tr> 
                                        </tbody> 
                                </table>
                        </div>
                </div>
        </div>
    <style type="text/css">
        .ci-gambar{
            height: 200px; width: 150px; float: left; margin-left : 10px; margin-bottom: 10px;margin-right: 10px;
        } 
    </style>
    <script type="text/javascript">
    </script>
	<div  id="content-informasi-base" style="width: 100%; height: 100%;">
		<div style="text-align:center; font-weight : bolder; line-height : 40px;" id="header-acara">
			ACARA MENDATANG
		</div>
        <div id="content-informasi-slide" style="width: 100%; height: 100%; overflow-y: hidden; ">
            <?php
            if(count($temp) > 0){
                foreach ($temp as $key => $value) {
                 echo '<div class="content-informasi" style="padding-top : 10px;display: none;">';
                 if($value['nama_foto'] != '')
                 echo '
                <img class="ci-gambar" src="'.base_url().'resource/img/'.$value['nama_foto'].'">';
                 echo'
                <div style="text-align : center; margin-left  : 10px;margin-right: 10px;">
                    <h1 class="ci-title">'.$value['judul'].'</h1>
                    <p class="max-width-inform" class="ci-content" style="font-size : 20px;text-align : justify; word-wrap : break-word;">'.$value['isi'].'</p>
                </div>
            </div>';
             }
            }else{
                echo '<div class="content-informasi" style="padding-top : 10px;display: none;">';
                 echo'
                <div style="text-align : center; margin-left  : 10px;margin-right: 10px;">
                    <h1 class="ci-title">Tidak Ada</h1>
                    <p class="ci-content" style="font-size : 20px;text-align : justify; word-wrap : break-word;">Nothing to show</p>
                </div>
            </div>';
            }
             
            ?>
        </div>
	
	</div>