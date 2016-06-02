<?php 
if(!defined('BASEPATH'))
    exit("You dont have permission on this url");
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html> 
<html lang=en> 
	<head> 
		<title>Digital Signage - FSM Undip</title> 
		<meta http-equiv=Content-Type content="text/html; charset=utf-8" /> 
		<link rel=icon type=image/ico href="favicon.html"/> 
		<link href=<?php echo base_url();?>resource/css/stylesheets.css rel=stylesheet type=text/css /> 
		<script type=text/javascript src=<?php echo base_url();?>resource/js/plugins/jquery/jquery.min.js></script> 
		<script type=text/javascript src=<?php echo base_url();?>resource/js/plugins/jquery/jquery-ui.min.js></script> 
		<script type=text/javascript src=<?php echo base_url();?>resource/js/plugins/bootstrap/bootstrap.min.js></script>
		<script type=text/javascript src=<?php echo base_url();?>resource/js/plugins/jquery/jquery-migrate.min.js></script>
		<script type=text/javascript src=<?php echo base_url();?>resource/js/plugins/js/plugins/select2/select2.min.js></script>
		<script type=text/javascript src=<?php echo base_url();?>resource/js/plugins/tagsinput/jquery.tagsinput.min.js></script>
		<script type=text/javascript src=<?php echo base_url();?>resource/js/plugins/jquery/jquery-ui-timepicker-addon.js></script>
		<script	type="text/javascript" src="<?php echo base_url();?>resource/mystyle/jaserv.min.dev.js"></script>
		<script	type="text/javascript" src="<?php echo base_url();?>resource/mystyle/master.js"></script>
		<script	type="text/javascript" src="<?php echo base_url();?>resource/mystyle/acara.js"></script>
		<script	type="text/javascript" src="<?php echo base_url();?>resource/mystyle/informasi.js"></script>
		<script	type="text/javascript" src="<?php echo base_url();?>resource/mystyle/video.js"></script>
		<script	type="text/javascript" src="<?php echo base_url();?>resource/mystyle/dosen.js"></script>
		<script
		type="text/javascript"
		src="<?php echo base_url();?>resource/mystyle/login.js"
		></script>
		<script type="text/javascript" >
			//var formLog = <?php //if($status != null) echo '1'; else echo '2';?>;
			//
                        
                var uploadVideo = false;
			var base_url = "<?php echo base_url();?>";
		</script>
		<style type="text/css">
		.grey-color{
		background-color : #666;
		}
		.white-color{
		background-color : #aaa;
		}
		.layout-content {
			position:absolute;
			bottom : 2px;
			left : 2px;
			right : 2px;
			top : 2px;
			background-color : #fff;
			color : #666;
		}
		.damn-you {
			max-width : 100px; 
			max-height : 100px;
		}
		.font-automa{
			font-size : 12px;
		}
		@media screen and (max-width : 800px){
				
			.damn-you {
				max-width : 60px;
			}
			.font-automa{
				font-size : 8px;
			}
		}
		@media screen and (max-width : 600px){
				
			.damn-you {
				max-width : 30px;
			}
		}
		@media screen and (max-width : 400px){
				
			.damn-you {
				max-width : 20px;
			}
		}
		@media screen and (max-width : 992px){
			.layout-content {
				position:absolute;
				bottom : 2px;
				left : 2px;
				right : 2px;
				top : 2px;
				background-color : #fff;
			}	
		}
		body {
			background-color : #fff;
		}
		#watch-layout{
			background : rgba(0,0,0,0.2);
			font-size : 70px;
			font-family : courier new;
		}
		.pointer {
			cursor : pointer;
			color : #666;
			transition : 0.2s ease-in-out;
		}
		.pointer:hover {
			color : #555;
		}
		</style>
		
		
	</head> 
	<body style="height:100%; width : 100%;" id="layout_first"> 
		<div class="container">  
			<div class="row" style="background-color : #666;"> 
				<div class="col-md-6 up-content"> 
					<div class="layout-content" id="content-place-acara">
						<!--acara-->
					</div>
				</div> 
				<div class="col-md-6 up-content"> 
					<div class="layout-content"> 
                                            <div class="block" id="layout-video" style="width: 100%; height : 100%;">
                                                
                                            </div>
                        <!--Video-->
					</div>
				</div>  
				<div class="col-md-6 down-content"> 
                                    <div class="layout-content" >
                                        <div id="layout-dekan" class="block" style="width: 100%; height : 100%;"></div>
						<!--Dosen-->
					</div>
				</div> 
				<div class="col-md-6 down-content"> 
                                    <div class="layout-content">
                                        <div class="block" id="layout-informasi" style="width: 100%; height : 100%;">
                                            <!--Event-->

                                        </div>
                                            <!--end event acara-->
                                    </div>
				</div> 
			</div>	
		</div> 
		<div class="statusbar statusbar-success" id='login' style="display: none;"> 
			<!--login-->
		</div> 
		<div class="statusbar statusbar-success" id="loading-bar" style="display: none;  z-index: 1000;"> 
			<div class="statusbar-icon"><img src="<?php echo base_url();?>resource/img/loader.gif">
			</div> 
			<div class="statusbar-text" id="loading-bar-message">Loading...</div>
			<div class="statusbar-close icon-remove"></div> 
		</div>
		<div class="modal in" id="alert-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: none;"> 
			<div class="modal-dialog"> 
				<div class="modal-content"> 
					<div class="modal-header"> 
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
						<h4 id="modal-alert-title" class="modal-title">Do you want to continue?</h4> 
					</div> 
					<div class="modal-footer"> 
						<button id="modal-alert-yes" type="button" class="btn btn-success btn-clean" >Yes</button> 
						<button id="modal-alert-no" type="button" class="btn btn-danger btn-clean" >No</button> 
					</div> 
				</div> 
			</div> 
		</div>
	</body>
</html>