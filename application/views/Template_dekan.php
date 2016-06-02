<?php 

?>

<style type="text/css">
    .resposonsive-font {
        font-size: 50px;
    }
    .col-me-2 {
        float: left;
        width : 16.6%;
    }
    .col-me-8 {
        float: left;
        width: 66.8%;
    }
    .no-float {
        float :none;
    }
    .list-view-people{
        display: inline-table;
    }
    .middle {
        font-size: 12px;
    }
    @media screen and (min-width : 401px){
        @media screen and (max-width : 992px){
            .resposonsive-font{
                font-size: 25px;
            }
            .middle {
                font-size: 8px;
            }
        }
    }
    @media screen and (max-width : 400px){
        @media screen and (min-width : 320px){
            .resposonsive-font{
                font-size: 12px;
            }
            .middle {
                font-size: 3px;
            }
        }
    }
    
    @media screen and (max-width : 668px){
        @media screen and (max-width : 768px){
            .resposonsive-font{
                font-size: 25px;
            }
            .middle {
                font-size: 8px;
            }
        }
    }
</style>
    <div style="display: none; position:absolute; height: 40px; background : rgba(255,255,255,0.3);width : 100%;" id="header-video"> 
        
    </div> 
    <div  style="width: 100%; height : 100%;">
		<div style="text-align:center; font-weight : bolder; line-height : 40px;" id="header-acara">
			STATUS KEHADIRAN
		</div>
        <div class="" id="list-dekan" style="width: 100%; height : 100%; overflow-y : hidden;"> 
            <?php 
            while($statuskehadiran->cursorNext()){
                echo 
               ' <div class="list-view-people" style=" width: 100%;"> 
                    <div class="col-me-2 bingkai-content-image" style="text-align: center;"> 
                         <img class="content-image" style="background-color : rgba(0,0,0,0); border-radius : 50%;" src="'.base_url().'resource/img/koko.jpg" class="img-circle"> 
                    </div> 
                    <div class="col-me-8 content-middle" > 
                        <div class="middle" style="">
                            <a style="color : #666;" >'.$statuskehadiran->getJabatan().'</a>
                            <p style="color : #666;" >'.$statuskehadiran->getNama().'</p>
                        </div>
                    </div> 
                    <div class="col-me-2  content-end"> 
                    ';
                if($statuskehadiran->getStatus() == '1'){
					echo "<div style='background-color : green; 
					border-radius : 10px; text-align : center; padding : 10px; margin-right : 10px; 
					color : rgba(255,255,255,0.9); font-weight : bolder; font-size : 11px; line-height : 30px;'>TERSEDIA</div>";
				}
                    //echo '<span class="icon-ok resposonsive-font" style="color : green;  line-height : 100%;"></span>';
                else {
                    //echo '<span class="icon-remove resposonsive-font" style="color : red;  line-height : 100%;"></span>';
					echo "<div style='background-color : red; 
					border-radius : 10px; text-align : center; padding : 10px; margin-right : 10px; 
					color : rgba(255,255,255,0.9); font-weight : bolder; font-size : 11px;'>TIDAK TERSEDIA</div>";
                }
                echo '
                </div> 
            </div>';
            }
            ?>
        </div>
    </div>