var LoadingBar = {
    openBar : function(message){
         this.setMessageBar(message);
         $('#loading-bar').fadeIn('slow');
    },
    setMessageBar : function(message){
        document.getElementById('loading-bar-message').innerHTML = message;
    },
    closeBar : function(){
        $('#loading-bar').fadeOut('slow');
    }
}
var LoginBar = {
    openBar : function(message){
        this.setMessageErrorBar(message);
         $('#login').fadeIn('slow');
    },
    setMessageErrorBar : function(message){
       j('#login-message-error').setInHtml(message);
    },
    closeBar : function(){
        $('#login').fadeOut('slow');
    },
    inHTML : function(inHTML){
        j('#login').setInHtml(inHTML);
    }
}
function template(a,b,c){
    if(parseInt(b) == 200){
        console.log("server response status");
        if(parseInt(a) == 1){
            console.log("loading "+c);
            LoadingBar.setMessageBar("mengambil response data ...");
        }
        if(parseInt(a) == 2){
            console.log("loaded "+c);
            LoadingBar.setMessageBar("memperoleh response data ...");
        }
        if(parseInt(a) == 3){
            console.log("interactive "+c);
            LoadingBar.setMessageBar("menjawab response data ...");
        }
    }
    if(parseInt(b) == 500){
        console.log("error internal server "+c);
        LoadingBar.setMessageBar("server mengalami kesalahan instruksi ...");
        setTimeout(function(){
            LoadingBar.closeBar();
            //reloadTable();
        },2000);	
    }
    if(parseInt(b) == 404){
        console.log("server not found "+c);
        LoadingBar.setMessageBar("response tidak ditemukan ...");
        setTimeout(function(){
            LoadingBar.closeBar();
            //reloadTable();
        },2000);	
    }
    if(parseInt(b) >= 301 && parseInt(b) <= 303){
        console.log("page has been removed "+c);
        LoadingBar.setMessageBar("response di tolak ...");
        setTimeout(function(){
            LoadingBar.closeBar();
            //reloadTable();
        },2000);	
    }
}

//all code logic
var login = 1;
var barLoginOpen = 2;
$(document).ready(function(){
	$(window).keypress(function(event){
		if(event.keyCode == 108 || event.keyCode == 76){
			if(login == 1)
				once = 1;
		}	
	});
	$(window).keypress(function(event){
		if(event.keyCode == 97 || event.keyCode == 65){
			if(once == 1){
                if(barLoginOpen == 2){
                    barLoginOpen = 1;
                    LoadingBar.openBar("Opening form login ...");
                    j("#setAjax").setAjax({
                        methode : "POST",
                        url : base_url+"Tampilankonten/tampil",
                        bool : true,
                        content : "",
                        sucOk : function(a){
                            if(a[0] == "1"){
                                LoadingBar.setMessageBar("processing form ...");
                                LoginBar.inHTML(a.substr(1,a.length-1));
                                setTimeout(function(){
                                    LoadingBar.closeBar();
                                    LoginBar.openBar("");
                                    $('#close-login').click(function(){
                                        LoginBar.closeBar();
                                    });
                                    $('#try-login').on('click',function(){
                                        LoadingBar.openBar('Sending data to server');
                                        j('#setAjax').setAjax({
                                            methode : 'POST',
                                            url : base_url+"Logincontroladmin/validasiAdmin",
                                            bool : true,
                                            content : "username="+$("#username").val()+"&password="+$("#password").val(),
                                            sucOk : function(a){
                                                LoadingBar.setMessageBar('processing Data ...');
                                                setTimeout(function(){
                                                    if(a[0] == "1"){
                                                            setTimeout(function(){
                                                                LoadingBar.closeBar();
                                                                LoginBar.closeBar();
                                                                barLoginOpen = 2;
                                                                startTableAcara();
                                                                reloadTableSlide();
                                                                reloadVideo();
                                                                //formLog = 1;
                                                            },2000);
                                                        }else{
                                                            setTimeout(function(){
                                                                LoadingBar.closeBar();
                                                                LoginBar.setMessageErrorBar(a.substr(1,a.length-1));
                                                                LoginBar.openBar(a.substr(1,a.length-1));
                                                                barLoginOpen = 2;
                                                            },2000);
                                                        }
                                                },1000);
                                            },
                                            sucEr : function(a,b){
                                                template(a,b," session login");
                                            }
                                        });
                                    });
                                },2000);
                                //refresh table
                            }else{
                                LoadingBar.setMessageBar("Logout ...");
                                j('#setAjax').setAjax({
                                    methode : 'POST',
                                    url : base_url+"Logincontroladmin/logout",
                                    bool : true,
                                    content : "",
                                    sucOk : function(a){
                                        LoadingBar.setMessageBar('processing Logout ...');
                                        setTimeout(function(){
                                            if(a[0] == "1"){
                                                setTimeout(function(){
                                                    LoadingBar.closeBar();
                                                    barLoginOpen = 2;
                                                    startTableAcara();
                                                    reloadTableSlide();
                                                    reloadVideo();
                                                    //reload all page
                                                },2000);
                                            }else{
                                                LoadingBar.setMessageBar(a.substr(1,a.length-1));
                                                setTimeout(function(){
                                                    LoadingBar.closeBar();
                                                    barLoginOpen = 2;
                                                },2000);
                                            }
                                        },1000);
                                    },
                                    sucEr : function(a,b){
                                        template(a,b," session logout");
                                    }
                                });
                            }
                        },
                        sucEr : function(a,b){
                            template(a,b,"Login form load ...");
                        } 
                    });			
                }else{
                    barLoginOpen = 2;
                    LoginBar.closeBar();
                }	
			}
		}	
	});
	$(window).keyup(function(event){
		if(event.keyCode == 108 || event.keyCode == 76){
			once = 2;
		}	
	});
});

/*
$(document).ready(function(){
    refreshTableEvent();
   $('#try-login').on('click',function(){
       LoadingBar.openBar('Sending data to server');
       j('#setAjax').setAjax({
           methode : 'POST',
           url : "Logincontroladmin/validasiAdmin",
           bool : true,
           content : "username="+$("#username").val()+"&password="+$("#password").val(),
           sucOk : function(a){
               LoadingBar.setMessageBar('processing Data ...');
               setTimeout(function(){
                   if(parseInt(a[0]) == 1){
                        setTimeout(function(){
                            LoadingBar.closeBar();
                            formLog = 1;
                        },2000);
                    }else{
                        setTimeout(function(){
                            LoadingBar.closeBar();
                            LoginBar.openBar(a.substr(1,a.length-1));
                        },2000);
                    }
               },1000);
           },
           sucEr : function(a,b){
               template(a,b," session login");
           }
       });
   });
});
function refreshTableEvent(){
    pauseTableAcara = true;
    LoadingBar.openBar("connet server");
    j('#setAjax').setAjax({
        methode : 'POST',
        url : 'Defaultpage/loadEvent/',
        bool : true,
        content : "code=DSF-JASERV",
        sucEr : function (a,b){
            template(a,b,"load table event");
        },
        sucOk : function(a){
            if(parseInt(a[0]) == 1){
                LoadingBar.setMessageBar('proses data');
                j('#content-table-acara').setInHtml(a.substr(1,a.length-1));
                LoadingBar.closeBar();
            }else{
                LoadingBar.setMessageBar('re try catching data');
            }
            pauseTableAcara = false;
            reloadTableEvent();
        }
    });
}
function reloadTableEvent(){
    reLoadTable();
    setTimeout(function(){
        refreshTableEvent();
    },60000);
}
*/