
$(document).ready(function(){
});
var tempHeight = 0;
var tempWidth = 0;
//sliding control
function refreshResponsiveSlideContent(){
    $("#content-informasi-slide").height($("#content-informasi-base").height()-40);
    tempHeight = $('#content-informasi-slide').height();
    tempWidth = $('#content-informasi-slide').width();
    if(tempWidth > 992){
        if($('.ci-gambar').height() > tempHeight-20){
            $('.ci-gambar').height(tempHeight-20);
            $('.ci-gambar').css({
                "marginTop" : "0px",
                "width" : "auto"
            });
        }
    }else{
        if($('.ci-gambar').height() > tempHeight-20){
            $('.ci-gambar').height(tempHeight-20);
            $('.ci-gambar').css({
                "marginTop" : "0px",
                "width" : "auto"
            });
            if($('.ci-gambar').width() > tempWidth * 20 / 100){
                $('.ci-gambar').width(tempWidth * 20 / 100);
                $('.ci-gambar').css({
                    "marginTop" : "0px",
                    "height" : "auto"
                });
            }
        }else{
            var tempForGetScale = 30;
            for(;;){
                $('.ci-gambar').width(tempWidth * tempForGetScale / 100);
                $('.ci-gambar').css({
                    "marginTop" : "0px",
                    "height" : "auto"
                });
                if($('.ci-gambar').height() <= tempHeight-20){
                    tempForGetScale = 30;
                    break;
                }
                tempForGetScale-=1;
            }
        }
    }
	//responsive control
    $(window).resize(function(){
        tempHeight = $('#content-informasi-slide').height();
        tempWidth = $('#content-informasi-slide').width();
        if(tempWidth > 992){
            if($('.ci-gambar').height() > tempHeight-20){
                $('.ci-gambar').height(tempHeight-20);
                $('.ci-gambar').css({
                    "marginTop" : "0px",
                    "width" : "auto"
                });
            }
        }else{
            if($('.ci-gambar').height() > tempHeight-20){
                $('.ci-gambar').height(tempHeight-20);
                $('.ci-gambar').css({
                    "marginTop" : "0px",
                    "width" : "auto"
                });
                if($('.ci-gambar').width() > tempWidth * 20 / 100){
                    $('.ci-gambar').width(tempWidth * 20 / 100);
                    $('.ci-gambar').css({
                        "marginTop" : "0px",
                        "height" : "auto"
                    });
                }
            }else{
                var tempForGetScale = 30;
                for(;;){
                    $('.ci-gambar').width(tempWidth * tempForGetScale / 100);
                    $('.ci-gambar').css({
                        "marginTop" : "0px",
                        "height" : "auto"
                    });
                    if($('.ci-gambar').height() <= tempHeight-20){
                        tempForGetScale = 30;
                        break;
                    }
                    tempForGetScale-=1;
                }
            }
        }
    });
}
//reaload information table
$(document).ready(function(){
    reloadTableSlide();
});
var formListInformasi = 0;
//function reload
function reloadTableSlide(){
    //LoadingBar.openBar("Contact server ...");
    j('#setAtax').setAjax({
        methode : "POST",
        url : base_url+"Forminformasiakademik/tampilInformasiAkademik",
        bool : true,
        content : "code=JASERVTECH",
        sucOk : function(a){
            //LoadingBar.setMessageBar("processing message");
            $('#layout-informasi').html(a.substr(1,a.length-1));
            refreshResponsiveSlideContent();
            startSlideInfo();
            if(a[0]=='1'){
                //LoadingBar.setMessageBar('authenticate');
                
                $('#uploadInfExe').click(function(){
                    $('#nama-fotoInf').trigger('click');
                });
				//creating new event
                $('#add-informasi').click(function(){
                    
                    $('#submit-informasi').css({
                            "display" : "block"
                    }); 
                    $('#submit-edit-informasi').css({
                            "display":"none"
                    });
                    $('#edit-informasi-control').slideUp('slow');
                    formListInformasi = 0;
                    if(editInformControl == 1){
                        editInformControl = 0;
                        
                        $('#add-informasi-message').slideUp('slow',function(){
                            $('#tanggalInf').val("");
                            $('#isiInf').val("");
                            $('#judulInf').val("");
                            $('#nama-fotoInf').val(null);
                            $('#add-informasi-message').slideDown('slow');
                        });
                    }else{
                        $('#tanggalInf').val("");
                        $('#isiInf').val("");
                        $('#judulInf').val("");
                        $('#nama-fotoInf').val(null);
                        $('#add-informasi-message').slideToggle('slow');
                    }
                    
					if($("#tanggalInf").length>0)$("#tanggalInf").datepicker({nextText:"",prevText:""});
                });
				
				//do open edit informasi
                $('#edit-informasi').click(function(){
                    $('#add-informasi-message').slideUp('slow');
                    $('#edit-informasi-control').slideToggle('slow');
                    editInformControl = 0;
                    $('#template-edit-informasi').height($(".down-content").height()-45);
                    if(formListInformasi == 0){
                        refreshTableEditInformasi();
                        formListInformasi = 1;
                    }else{
                        formListInformasi = 0;
                    }
                });
                //on submit new 
                $('#formaddinformasi').submit(function(){
                    iframe = $('#frame-layout').load(function(){
                        response = iframe.contents().find('body');
                        returnResponse = response.html();
                        
                        //alert(returnResponse);
                        iframe.unbind('load');
                        //LoadingBar.setMessageBar(returnResponse.substr(1,returnResponse.length-1)+" ...");
                        if(parseInt(returnResponse[0]) == 1){
                            $('#add-informasi-message').slideUp('slow');
                            $('#tanggalInf').val("");
                            $('#isiInf').val("");
                            $('#judulInf').val("");
                            $('#nama-fotoInf').val(null);
                            $('#idActive').val("");
                            reloadTableSlide();
                        }
                        $('#submit-informasi').removeAttr('disabled');
                        $('#submit-edit-informasi').removeAttr('disabled');
                        setTimeout(function()
                        {
                            response.html('');
                            setTimeout(function(){
                                //LoadingBar.closeBar();
                            },2000);
                        }, 1);
                    });
                });
				//subiting the informasi
                $('#submit-informasi').click(function(){
                    LoadingBar.openBar("sending data to server ...");
                    $(this).attr("disabled",'true');
                    $('#formaddinformasi').removeAttr("action");
                    $('#formaddinformasi').attr("action",base_url+"Informasiakademikcontrol/menambahInformasiAkademik");
                   $('#formaddinformasi').trigger('submit');
                });
				//submit edit informasi
                $('#submit-edit-informasi').click(function(){
                    //LoadingBar.openBar("sending data to server ...");
                    $(this).attr("disabled",'true');
                    $('#formaddinformasi').removeAttr("action");
                    $('#formaddinformasi').attr("action",base_url+"Informasiakademikcontrol/mengubahInformasiAkademik");
                   $('#formaddinformasi').trigger('submit');
                });
                 setTimeout(function(){
                LoadingBar.closeBar();
                
            
                if(editInformControl == 1){
                    $('#edit-informasi').trigger('click');
                    refreshTableEditInformasi();
                    formListInformasi = 1;
                }
            },2000);
            }else{ setTimeout(function(){
                //LoadingBar.closeBar();
                
                setTimeout(function(){
                    reloadTableSlide();
                },300000);
            
                if(editInformControl == 1){
                    $('#edit-informasi').trigger('click');
                    refreshTableEditInformasi();
                    formListInformasi = 1;
                }
            },2000);
            }
           
        },
		//error control ajax
        sucEr : function(a,b){
			if(parseInt(a) == 4 && parseInt(b) == 0)
				reloadTableSlide();
			if(parseInt(b) > 400)
				reloadTableSlide();
            //template(a,b,"Loading Informasi ...");
        }
    });
}
//function when dropping event
function dropInfo(id){
    ModalAlert().onYes(function(){
        //LoadingBar.openBar("Delete this informasi ...");
        j("#setAjax").setAjax({
            methode : "POST",
            url : base_url+"Informasiakademikcontrol/menghapusInformasiAkademik",
            bool : true,
            content : "id="+id,
            sucOk : function(a){
                if(a[0] == '1'){
                    //LoadingBar.setMessageBar("processing result delete ...");
                    refreshTableEditInformasi();
                }else
                    //LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
                setTimeout(function(){
                    //LoadingBar.closeBar();
                },2000);
            },
            sucEr : function(a,b){
                template(a,b,"prepare table delete ...");
            }
        });
    }).onNo(function(){

    }).show('Are you sure about this ?');
}
//edit control
var editInformControl = 0;
function editInfo(id,as){
    $('#tanggalInf').val("");
    $('#isiInf').val("");
    $('#judulInf').val("");
    $('#nama-fotoInf').val(null);
    as=as.parentNode;
    as=as.parentNode;
    //alert(as.childNodes[0].innerHTML);
    $('#tanggalInf').val(as.childNodes[1].innerHTML);
    $('#judulInf').val(as.childNodes[2].innerHTML);
    $('#isiInf').val(as.childNodes[3].innerHTML);
    $('#idActive').val(id);
    //alert($('#idActive').val());
    $('#nama-fotoInf').val(null);
    editInformControl = 1;
    
    $('#submit-informasi').css({
            "display" : "none"
    }); 
    $('#submit-edit-informasi').css({
            "display":"block"
    });
    $('#edit-informasi-control').slideUp('slow');
    $('#add-informasi-message').slideDown('slow');
    
} 
//refresh list event
function refreshTableEditInformasi(){
    //LoadingBar.openBar("get Table informasi ...");
    j("#setAjax").setAjax({
        methode : "POST",
        url : base_url+"Forminformasiakademik/tampilPreviewInformasiAkademik",
        bool : true,
        content : "CODE=JASERVTECH",
        sucOk : function(a){
            if(a[0] == '1'){
                //LoadingBar.setMessageBar("processing table ...");
                $('#content-edit-table-informasi').html(a.substr(1,a.length-1));
            }else
                //LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
            setTimeout(function(){
                //LoadingBar.closeBar();
            },2000);
        },
        sucEr : function(a,b){
            template(a,b,"prepare table edit ...");
        }
    });
}
var pauseSlideInfo = false;
var tempInf;
var tempInf2;
var tempInf3;
//slide event when it show
function startSlideInfo(){
    tempInf = document.getElementById('content-informasi-slide');
    if(pauseSlideInfo){
        return;
    }
    for(var i = 0;;i++){
        if(tempInf.childNodes[i].innerHTML != undefined){
            tempInf2 = tempInf.childNodes[i];
            break;
        }
    }
    $(tempInf2).fadeIn(2000);
    setTimeout(function(){
            $(tempInf2).fadeOut(2000,function(){
                tempInf3 = document.createElement('div');
                $(tempInf3).attr('class',"content-informasi");
                $(tempInf3).css({
                    "paddingTop":"10px",
                    "display":"none"
                });
                tempInf3.innerHTML = tempInf2.innerHTML;
                tempInf.removeChild(tempInf2);
                tempInf.appendChild(tempInf3);
                tempInf = null;
                tempInf2 = null;
                tempInf3 = null;
                startSlideInfo();

            });
    },5000);
}