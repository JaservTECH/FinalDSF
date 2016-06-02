<style>
    .dropzones {
        
        background : rgba(255,255,255,0.4); 
        border : 2px #ccc dashed;
        color : #ccc;
    }
    .dropzones:hover {
        background : rgba(255,255,255,0.6); 
        color : #000;
    }
</style>
    <div style="z-index : 400;display: <?php if($login) echo "block"; else echo 'none;'?>;position:absolute; height: 100%;  width : 100%;" id="header-video"> 
        <div id="dropzones" class="dropzones" style="text-align : center; width: 100%; height: 100%; ">
            <span id="ico-video" style="font-size: 80px;color : #aaa; line-height: 100%;" class="icon-folder-open"><a style="font-size : 30px; color : #aaa;">drag or click</a></span>
            
        </div>
        <form id="form-video-submit" target="frame-video" style="display: none;" method=POST target="frame-layout" enctype="multipart/form-data" action="<?php echo base_url(); ?>Datavideocontrol/menggantiVideo">
            <input id="file-video" name="file-video" type="file">
        </form>
        <iframe id="frame-video" name="frame-video" style="display: none;"></iframe>
    </div> 
    <div id="content-video" style="background : rgba(0,0,0,1);">
        <video id="video-show" style="height : 100%; width : 100%;" autoplay name="media">
            <source src="<?php echo base_url();?>video/<?php echo $videoName;?>" type="video/mp4">
        </video>
    </div> 