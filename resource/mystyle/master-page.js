var totalViewPeople = 5;
var once = 2;
var once2 = 2;
var login = 1;
var formLog = <?php if($status != null) echo '1'; else echo '2';?>;
var barLoginOpen = 2;
//feature login, pressing l and a sequently, and log off too
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
				if(formLog == 2){
					if(barLoginOpen == 2){
						barLoginOpen = 1;
						LoginBar.openBar("");			
					}else{
						barLoginOpen = 2;
						LoginBar.closeBar();
					}	
				}
			}
		}	
	});
	//close login if not to log
	$('#close-login').click(function(){
		LoginBar.closeBar();
	});
	$(window).keyup(function(event){
		if(event.keyCode == 108 || event.keyCode == 76){
			once = 2;
		}	
	});
	//tweek on size master page, there are 4 segment, and it must be responsivenes
	if($("#layout_first").length>0)
		$("#layout_first").height($(window).height());
	$(".up-content").height($("#layout_first").height()*6/10);
	$(".down-content").height($("#layout_first").height()*4/10);	
	$("#content-video").height($('#layout-video').height());
	var h = parseFloat($('#layout-video').height())-parseFloat($('#video-show').height());
	$('#video-show').css({
		"marginTop" : (h/2)+"px"
	});
	$('#content-acara').height(parseFloat($('#acara-layout').height())-parseFloat($('#watch-layout').height()));
	reLoadListViewPeople();
	//on resize main page
	$(window).resize(function(){
	    if($("#layout_first").length>0)
			$("#layout_first").height($(window).height());
	    $(".up-content").height($("#layout_first").height()*6/10);
	    $(".down-content").height($("#layout_first").height()*4/10);
		$("#content-video").height($('#layout-video').height());
		var h = parseFloat($('#layout-video').height())-parseFloat($('#video-show').height());
		$('#video-show').css({
			"marginTop" : (h/2)+"px"
		});
		$('#content-acara').height(parseFloat($('#acara-layout').height())-parseFloat($('#watch-layout').height()));
		
	});
	//re size video if resize main layout
	$('#video-show').resize(function(){
		var h = parseFloat($('#layout-video').height())-parseFloat($('#video-show').height());
		$('#video-show').css({
			"marginTop" : (h/2)+"px"
		});
	});
	//too like video case
	$('.list-view-people').resize(function(){
		reLoadListViewPeople();
		
	});
	reLoadTable();
});
$(document).ready(function(){
	//reLoadLDTable();
});
$(document).ready(function(){
	watchMe();
});
var temp2=null;
var temp=null;
var temp1 = null;
var temp3=null;
var loop = 1;
var loopJ = 0;
//reload list view people to make it always new
function reLoadListViewPeople(){
	$('.list-view-people').height(parseFloat($('#list-dekan').height())/totalViewPeople);
	if($('.bingkai-content-image').width() > $('.bingkai-content-image').height())
	{
		$('.content-image').height(parseFloat($('.bingkai-content-image').height()));
		$('.content-image').width(parseFloat($('.bingkai-content-image').height()));
	}else{
		$('.content-image').height(parseFloat($('.bingkai-content-image').width()));	
		$('.content-image').width(parseFloat($('.bingkai-content-image').width()));
	}
	$('.content-image').css({
		"marginTop" : ((parseFloat($('.list-view-people').height())-parseFloat($('.content-image').height()))/2)+"px"
	});	
	
	$('.content-middle').css({
		"paddingTop" : ((parseFloat($('.list-view-people').height())-parseFloat($('.middle').height()))/2)+"px"
	});	
	
	$('.content-end').css({
		"paddingTop" : ((parseFloat($('.list-view-people').height())-parseFloat($('.content-image').height()))/2)+"px"
	});	
	//alert('hello');
	//alert($('.content-image').height());
}
var pauseTableAcara = true;
//some sliding table drop down
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
function watchMe(){
	setTimeout(function(){
		var xx = new Date();
		var cold = document.getElementById('watch-me').innerHTML = xx.getHours()+":"+xx.getMinutes()+":"+xx.getSeconds();
		watchMe();
	},100);
}