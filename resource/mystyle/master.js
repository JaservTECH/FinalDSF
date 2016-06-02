$(document).ready(function(){
	if($("#layout_first").length>0)
		$("#layout_first").height($(window).height());
	$(".up-content").height($("#layout_first").height()*21/40);
	$(".down-content").height($("#layout_first").height()*19/40);	
	$(window).resize(function(){
		if($("#layout_first").length>0)
			$("#layout_first").height($(window).height());
	    $(".up-content").height($("#layout_first").height()*21/40);
	    $(".down-content").height($("#layout_first").height()*19/40);
	});
});
ModalAlert = function(){
	
	this.show = function(a){
		$("#modal-alert-title").html(a);
		$('#modal-alert-yes').bind('click',this.modalAlertYes);
		$('#modal-alert-no').bind('click',this.modalAlertNo);
		$('#alert-modal').modal({backdrop : 'static'});
	};
	this.onYes = function(a){
		if(a==0)
		a=function(){};
		this.modalAlertYes = function(){
			$('#alert-modal').modal('hide');
			$('#modal-alert-no').unbind('click',this.modalAlertNo);
			$('#modal-alert-yes').unbind('click',this.modalAlertYes);
			a();
		};
		return this;
	}
	this.onNo = function(a){
		if(a==0)
		a=function(){};
		this.modalAlertNo = function(){
			$('#alert-modal').modal('hide');
			$('#modal-alert-no').unbind('click',this.modalAlertNo);
			$('#modal-alert-yes').unbind('click',this.modalAlertYes);
			a();
		};
		return this;
	}
	this.modalAlertNo = 0;
	this.modalAlertYes = 0;
	return this;
};
$(document).ready(function(){
	
});