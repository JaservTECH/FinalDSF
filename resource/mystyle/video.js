/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    reloadVideo();
});
function reloadVideo(){
    alert();
    //document.getElementById('video-show').load();
}
var dropzone;
function reloadVideo(){
    ////LoadingBar.openBar("contact server ...");
    
    j('#setAJax').setAjax({
        methode : "post",
        url : base_url+"Formdatavideo/tampilVideo",
        bool : true,
        content : "",
        sucOk : function(a){
            $('#layout-video').html(a.substr(1,a.length-1));
            if(a[0] == "1"){
                $('#form-video-submit').submit(function(){
                    iframest = $('#frame-video').load(function(){
                        response = iframest.contents().find('body');
                        returnResponse = response.html();
                        //alert(returnResponse);
                        iframest.unbind('load');
                        if(parseInt(returnResponse[0]) == 1){
                            reloadVideo();
                        }else{
							LoadingBar.setMessageBar(returnResponse.substr(1,returnResponse.length-1)+" ...");
						}
                        setTimeout(function()
                        {
                            response.html('');
                            setTimeout(function(){
                                LoadingBar.closeBar();
                            },2000);
                        }, 1);
                    }); 
                });
                $('#dropzones').click(function(){
                    $('#file-video').trigger('click');
                });
                $('#file-video').on('change',function(){
                    uploadVideo = true;
                    LoadingBar.openBar("upload video");
                    var kk = document.getElementById('file-video');
                    var TEMP_VIDEO = kk.files[0].name.substr(kk.files[0].name.length-4,4);
                    var err = 0;
                    if(TEMP_VIDEO != ".mp4" ) {
                        err+=1;
                    }
                    if(TEMP_VIDEO != ".MP4" ) {
                        err+=1;
                    }
                    if(err == 2){
                        LoadingBar.setMessageBar("format yang didukung mp4");
                        setTimeout(function(){
                           uploadVideo = false;
                           LoadingBar.closeBar();
                        },4000);
                    }else{
                        var TEMP_VIDEO_SIZE = kk.files[0].size/(1024*1024);
                        if(parseInt(TEMP_VIDEO_SIZE+"") > 500){
                            LoadingBar.setMessageBar("Ukuran maksimal 500 MB");
                            setTimeout(function(){
                                uploadVideo = false;
                                LoadingBar.closeBar();
                            },4000);
                        }else{
                            $('#form-video-submit').trigger('submit');
                        }
                    }
                });
                (function(){   
                    var dropzone = document.getElementById('dropzones');
                    dropzone.ondragover = function(){
                            //this.className = "dropzone dragover";
                            return false;
                    };
                    dropzone.ondragleave = function(){
                            //this.className = "dropzone";
                            return false;
                    };
                    dropzone.ondrop = function(e){
                            //this.className = "dropzone";
                            e.preventDefault();
                            //alert('hello');
                            //return console.log(e.dataTransfer.files[0].size/(1024*1024));
                            
                            var jj = document.getElementById('file-video');
                            if(parseInt(e.dataTransfer.files.length) == 1)
                                jj.files = e.dataTransfer.files;
                            else
                                jj.files = e.dataTransfer.files[0];
                            //upload(e.dataTransfer.files);
                    }
               }())
                
                
            }else{
                var temples = document.getElementById('video-show');
                temples.onended = function(){
                    reloadVideo();
                }
            }
            $("#content-video").height($('#layout-video').height());
            $('#ico-video').css({
                "lineHeight":$('#layout-video').height()+"px"
            });
            var h = parseFloat($('#layout-video').height())-parseFloat($('#video-show').height());
            $('#video-show').css({
                    "marginTop" : (h/2)+"px"
            });
            $(window).resize(function(){
                $("#content-video").height($('#layout-video').height());
                $('#ico-video').css({
                    "lineHeight":$('#layout-video').height()+"px"
                });
                var h = parseFloat($('#layout-video').height())-parseFloat($('#video-show').height());
                $('#video-show').css({
                        "marginTop" : (h/2)+"px"
                });
            });
            setTimeout(function(){
                //LoadingBar.closeBar();
            },2000);
        },
        sucEr : function(a,b){
			if(parseInt(a) == 4 && parseInt(b) == 0)
				reloadVideo();
			if(parseInt(b) > 400)
				reloadVideo();
            //template(a,b,"get layout video ...");
        }
    });
}

