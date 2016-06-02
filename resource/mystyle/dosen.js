/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    reloadDosen();
});
var refreshing = 0;
var totalViewPeople = 5;
function reloadDosen(){
    j('#setAjax').setAjax({
        methode : 'post',
        url : base_url+"Formstatuskehadiran/tampilStatusKehadiran",
        bool : true,
        content : "",
        sucOk : function(a){
            $('#layout-dekan').html(a);
            reLoadListViewPeople();
            if(refreshing == 0){
                refreshing = 1;
                
                
                $('.list-view-people').resize(function(){
                        reLoadListViewPeople();

                });
            }
            setTimeout(function(){
                reloadDosen();
            },1000);
        },
        sucEr : function(a,b){
			if(parseInt(a) == 4 && parseInt(b) == 0)
				reloadDosen();
			if(parseInt(b) > 400)
				reloadDosen();
            //template(a,b,"refresh dosen");
        }
    });
}
function refreshContentDosen(){
    
}

function reLoadListViewPeople(){
	$('#list-dekan').height($('#list-dekan').height()-40);
	$('.list-view-people').height(parseFloat($('#list-dekan').height())/totalViewPeople);
        $('.content-image').css({
            "maxWidth":((parseFloat($('#list-dekan').height())/totalViewPeople)-13)+"px",
            "maxHeight":((parseFloat($('#list-dekan').height())/totalViewPeople)-13)+"px"
        });
        /*
	if($('.bingkai-content-image').width() > $('.bingkai-content-image').height())
	{
		$('.content-image').height(parseFloat($('.bingkai-content-image').height()));
		$('.content-image').width(parseFloat($('.bingkai-content-image').height()));
	}else{
		$('.content-image').height(parseFloat($('.bingkai-content-image').width()));	
		$('.content-image').width(parseFloat($('.bingkai-content-image').width()));
	}
        */
	$('.content-middle').css({
		"paddingTop" : ((parseFloat($('.content-middle').height())-parseFloat($('.middle').height())))+"px"
	});	
	$('.bingkai-content-image').css({
		"paddingTop" : "5px"
	});	
        
        /*
	$('.content-image').css({
		"marginTop" : ((parseFloat($('.list-view-people').height())-parseFloat($('.content-image').height()))/2)+"px"
	});	
	
	$('.content-middle').css({
		"paddingTop" : ((parseFloat($('.list-view-people').height())-parseFloat($('.middle').height()))/2)+"px"
	});	
	
	$('.content-end').css({
		"paddingTop" : ((parseFloat($('.list-view-people').height())-parseFloat($('.content-image').height()))/2)+"px"
	});*/	
	//alert('hello');
	//alert($('.content-image').height());
}