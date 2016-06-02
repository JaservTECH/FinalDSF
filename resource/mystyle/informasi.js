
$(document).ready(function(){
});
var tempHeight = 0;
var tempWidth = 0;
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
$(document).ready(function(){
    reloadTableSlide();
});
var formListInformasi = 0;
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
                $('#submit-informasi').click(function(){
                    //LoadingBar.openBar("sending data to server ...");
                    $(this).attr("disabled",'true');
                    $('#formaddinformasi').removeAttr("action");
                    $('#formaddinformasi').attr("action",base_url+"Informasiakademikcontrol/menambahInformasiAkademik");
                   $('#formaddinformasi').trigger('submit');
                });
                $('#submit-edit-informasi').click(function(){
                    //LoadingBar.openBar("sending data to server ...");
                    $(this).attr("disabled",'true');
                    $('#formaddinformasi').removeAttr("action");
                    $('#formaddinformasi').attr("action",base_url+"Informasiakademikcontrol/mengubahInformasiAkademik");
                   $('#formaddinformasi').trigger('submit');
                });
                 setTimeout(function(){
                //LoadingBar.closeBar();
                
            
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
        sucEr : function(a,b){
			if(parseInt(a) == 4 && parseInt(b) == 0)
				reloadTableSlide();
			if(parseInt(b) > 400)
				reloadTableSlide();
            //template(a,b,"Loading Informasi ...");
        }
    });
}
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
/*

var pauseTableAcara = true;
var pauseJamAcara = true;
var temp2=null;
var temp=null;
var temp1 = null;
var temp3=null;
var loop = 1;
var loopJ = 0;
function reLoadTable(){
	temp2 = document.getElementById('content-table-acara');
	if(pauseTableAcara){
		return;
	}
	for(var i = 0;;i++){
		if(temp2.childNodes[i].innerHTML != undefined){
			temp1 = temp2.childNodes[i];
			break;
		}
	}
	$(temp1).fadeOut(2000,function(){
		temp3 = document.createElement('tr');
		temp3.innerHTML = temp1.innerHTML;
		temp2.removeChild(temp1);
		temp2.appendChild(temp3);
		temp2 = null;
		temp1 = null;
		temp3 = null;
		setTimeout(function(){
			tryReRef();
		},5000);
	});
}
function tryReRef(){
	reLoadTable();
}
$(document).ready(function(){
    startTableAcara();
});
var editInformasi = 0;
var addAcara = 0;
function startTableAcara(){
	j('#setAjax').setAjax({
        methode : "POST",
        url : base_url+"Formdataacara/tampilDataAcara",
        bool : true,
        content : "code=JASERVTECH-CODE",
        sucOk : function(a){
			if(a[0] == "1"){
				$("#content-place-acara").html(a.substr(1,a.length-1));
				refreshTableAcara();
				setTimeout(function(){
					$("#edit-acara").click(function(){
						if(editInformasi == 0){
							editInformasi = 1;
							refreshTablePreviewAcara();
						}else{
							editInformasi = 0;
						}
						$('#add-acara-message').slideUp('slow');
						$('#edit-acara-control').slideToggle('slow');
					});
					$('#add-acara').click(function(){
						editInformasi = 0;
						$('#submit-acara').css({
							"display" : "block"
						});
						$('#submit-edit-acara').css({
							"display":"none"
						});
						$('#tanggal').val("");
						$('#jam').val("");
						$('#nama_acara').val("");
						$('#penyelenggara').val("");
						$('#edit-acara-control').slideUp('slow');
						if(formInformasiActiveEdit == 0){
							$('#add-acara-message').slideToggle('slow');
						}else{
							formInformasiActiveEdit = 0;
						}
						
					});
					$('#submit-acara').click(function(){
						
						//filter
						$(this).attr("disabled","true");
						
						//LoadingBar.openBar("Sending data to server ...");
						j('#setAjax').setAjax({
							methode : "POST",
							url : base_url+"Dataacaracontrol/menambahDataAcara",
							bool : true,
							content : 
							"tanggal="+$('#tanggal').val()+"&"+
							"jam="+$('#jam').val()+"&"+
							"namaacara="+$('#nama_acara').val()+"&"+
							"penyelenggara="+$('#penyelenggara').val(),
							sucOk : function(a){
								//LoadingBar.setMessageBar("Processing response");
								if(a[0] == "1"){
									$('#submit-acara').removeAttr("disabled");
									$('#tanggal').val("");
									$('#jam').val("");
									$('#nama_acara').val("");
									$('#penyelenggara').val("");
									$('#add-acara-message').slideToggle('slow');
									//LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
									startTableAcara();
									setTimeout(function(){
										//LoadingBar.closeBar();
									},2000);
								}else{
									$('#submit-acara').removeAttr("disabled");
									//LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
									setTimeout(function(){
										//LoadingBar.closeBar();
									},2000);
								}
							},
							sucEr : function(a,b){
								template(a,b,"Process new Event ...");
							}
						});
					});
					$('#submit-edit-acara').click(function(){
						//filter
						$(this).attr("disabled","true");
						
						//LoadingBar.openBar("Sending data to server ...");
						j('#setAjax').setAjax({
							methode : "POST",
							url : base_url+"Dataacaracontrol/mengubahDataAcara",
							bool : true,
							content : 
							"id="+idInformasiActive+"&"+
							"tanggal="+$('#tanggal').val()+"&"+
							"jam="+$('#jam').val()+"&"+
							"namaacara="+$('#nama_acara').val()+"&"+
							"penyelenggara="+$('#penyelenggara').val(),
							sucOk : function(a){
								//LoadingBar.setMessageBar("Processing response");
								if(a[0] == "1"){
									idInformasiActive = 0;
									$('#submit-edit-acara').removeAttr("disabled");
									$('#tanggal').val("");
									$('#jam').val("");
									$('#nama_acara').val("");
									$('#penyelenggara').val("");
									$('#add-acara-message').slideToggle('slow');
									formInformasiActiveEdit = 0;
									//LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
									refreshTableAcara();
									$('#edit-acara').trigger('click');
									setTimeout(function(){
										//LoadingBar.closeBar();
									},2000);
								}else{
									$('#submit-edit-acara').removeAttr("disabled");
									//LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
									setTimeout(function(){
										//LoadingBar.closeBar();
									},2000);
								}
							},
							sucEr : function(a,b){
								template(a,b,"Process new Event ...");
							}
						});
					});
				},1000);
			}else{
				$("#content-place-acara").html(a.substr(1,a.length-1));
			}
        },
        sucEr : function(a,b){
            template(a,b,"Rfresh Acara ...");
        }
    });
}
function dropEvent(id){
	ModalAlert().onYes(function(){
		//LoadingBar.openBar('Deleting event ...');
		j('#setAjax').setAjax({
			methode : "POST",
			url : base_url+"Dataacaracontrol/menghapusDataAcara",
			bool : true,
			content : "id="+id,
			sucEr : function(a,b){
				template(a,b,'process delete ...')
			},
			sucOk : function(a){
				//LoadingBar.setMessageBar("Processing response ...");
				//LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
				setTimeout(function(){
					//LoadingBar.closeBar();
					if(a[0]=='1'){
						refreshTablePreviewAcara();
					}
				},2000);
			}
		});
	}).onNo(function(){
		
	}).show('Are you sure about this ?');
}
var idInformasiActive=0;
var formInformasiActiveEdit = 0;
function editEvent(id,a){
	formInformasiActiveEdit = 1;
	a=a.parentNode;
	a=a.parentNode;
	$('#tanggal').val(a.childNodes[0].innerHTML);
	$('#jam').val(a.childNodes[1].innerHTML);
	$('#nama_acara').val(a.childNodes[2].innerHTML);
	$('#penyelenggara').val(a.childNodes[3].innerHTML);
	//alert
	editInformasi = 0;
	$('#submit-acara').css({
		"display" : "none"
	});
	$('#submit-edit-acara').css({
		"display":"block"
	});
	$('#edit-acara-control').slideUp('slow');
	$('#add-acara-message').slideToggle('slow');
	idInformasiActive = id;
}
function refreshTablePreviewAcara(){
	//LoadingBar.openBar('sending data to server ...');
	j('#setAjax').setAjax({
		methode : "POST",
		url : base_url+"Formdataacara/tampilPreviewDataAcara",
		bool : true,
		content : "CODE=JASERVTECH",
		sucOk : function(a){
			//LoadingBar.setMessageBar('Processing message ...');
			if(a[0] == '1'){
				//LoadingBar.setMessageBar("prepare table ...");
				$('#template-edit-acara').height($(".up-content").height()-45);
				$('#content-edit-table-acara').html(a.substr(1,a.length-1));
				
			}else{
				//LoadingBar.setMessageBar(a.substr(1,a.length-1)+" ...");
				
			}
			setTimeout(function(){
				//LoadingBar.closeBar();
			},2000);
		},
		sucEr : function(a,b){
			template(a,b,"Process Data Acara Preview ...")
		}
	});
}
function watchMe(){
    if(pauseJamAcara){
        return;
    }
	setTimeout(function(){
		var xx = new Date();
		var cold = document.getElementById('watch-me').innerHTML = xx.getHours()+":"+xx.getMinutes()+":"+xx.getSeconds();
		watchMe();
	},100);
}
*/