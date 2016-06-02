<div class="block" id="layout-acara" style="width: 100%; height : 100%;">
    <div style="display:<?php if($login) echo "block"; else echo "none";?>; position:absolute; height: 40px; background : rgba(255,255,255,0.3);width : 100%;"> 
        <span class="icon-plus pointer" id="add-acara" style="font-size : 20px; line-height : 40px;float : right ; margin-right : 10px;"></span>
        <span class="icon-edit pointer" id="edit-acara" style="font-size : 20px; line-height : 40px;float : right ; margin-right : 10px;"></span>
        <div id="add-acara-message" style="display: none; position : absolute; margin-top : 40px; z-index : 3000; color : #666; background-color : rgba(250,250,250,0.7); text-align : center; width : 100%;">
            <input class="datepicker" id="tanggal" type="text" placeholder="Tanggal (2016-04-23)" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
            <input class="timepicker" id="jam" type="text" placeholder="jam (12:30:00)" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
            <input id="nama_acara" type="text" placeholder="Nama Acara (Wisuda ke-89)" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
            <input id="penyelenggara" type="text" placeholder="Penanggungjawab (Jafar abdurrahman albasyir)" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
            <input type="button" id="submit-acara" value="Masukan" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
            <input type="button" id="submit-edit-acara" value="Masukan" style="background-color : #666; width : 95%; margin-left : 2.5%; margin-top : 10px;">
        </div>
        <div id="edit-acara-control"  style="max-height : 120px;display: none; position : absolute; margin-top : 40px; z-index : 1000; color : #666; background-color : rgba(250,250,250,0.95); text-align : center; width : 100%;">
            <div id="template-edit-acara" style="overflow-y:auto;overflow-x:hidden; background-color : rgba(250,250,250,0.95); width : 100%; ">
                <table class="table table-hover"> 
                    <thead> 
                        <tr> 
                            <th>Tanggal</th> 
                            <th>Jam</th> 
                            <th>Nama Acara</th> 
                            <th>Penyelenggara</th> 
                            <th>Kontrol</th>
                        </tr> 
                    </thead> 
                    <tbody id="content-edit-table-acara" > 
                        
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
    <div id="acara-layout" style="width:100%; height : 100%;">
        <div style="" id="watch-layout"> 
            <span style="margin-left : 3%;" id="watch-me">12:10</span>
        </div> 
		<div style="text-align:center; font-weight : bolder; line-height : 40px;" id="header-acara">
			ACARA LT.3 DEKANAT
		</div>
        <div id="content-acara" style="background : rgba(255,255,255,0.2);">
            <table class="table table-hover"> 
                <thead> 
                    <tr> 
                        <th>Tanggal</th> 
                        <th>Jam</th> 
                        <th>Nama Acara</th> 
                        <th>Penyelenggara</th> 
                    </tr> 
                </thead> 
                <tbody id="content-table-acara" style="overflow-y:auto;"> 
                    <?php
                    if(is_array($temp)){
                        if(array_key_exists(0,$temp)){
                            foreach($temp as $value){
                                echo "<tr><td>".$value['tanggal']."</td>
                                <td>".$value['jam']."</td>
                                <td>".$value['nama_acara']."</td>
                                <td>".$value['penyelenggara']."</td></tr>";
                            }
                        }else{
                            echo "<tr><td>".$value['tanggal']."</td>
                                <td>".$value['jam']."</td>
                                <td>".$value['nama_acara']."</td>
                                <td>".$value['penyelenggara']."</td></tr>";
                        }
                    }else{
                        echo "<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
                    }
                     
                    ?>
                </tbody> 
            </table>
        </div> 
    </div>
</div>