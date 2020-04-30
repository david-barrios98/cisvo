$(document).ready(function(){
	$("#checkMain").on("click", function() {  
		$(".case").prop("checked", this.checked);  
	  });  
	  /* si todos los checkbox estan marcados, se marca el check que selecciona todos (linea 9-12),
	   sino estan marcados todos se quita el check al que selecciona todos (linea 11-13)*/
	  $(".case").on("click", function() {  
		if ($(".case").length == $(".case:checked").length) {  
		  $("#checkMain").prop("checked", true);  
		} else {  
		  $("#checkMain").prop("checked", false);  
		}  
	});

	$('.btn-sideBar-SubMenu').on('click', function(e){
		e.preventDefault();
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.zmdi-caret-down');
		if(SubMenu.hasClass('show-sideBar-SubMenu')){
			iconBtn.removeClass('zmdi-hc-rotate-180');
			SubMenu.removeClass('show-sideBar-SubMenu');
		}else{
			iconBtn.addClass('zmdi-hc-rotate-180');
			SubMenu.addClass('show-sideBar-SubMenu');
		}
	});
	$('.form-control tooltips-general').on('click', function(){
		if (this.value=='aprendiz'){
			$.ajax({ 
				beforeSend: function(){ 
					$('#visitante').hide(); 
					$('#funcionario').hide();
				}
			});
		}
	});
    $('.btn-exit-system').on('click', function(e){
        e.preventDefault();
        swal({
            title: 'Are you sure?',
            text: "The current session will be closed",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#03A9F4',
            cancelButtonColor: '#F44336',
            confirmButtonText: '<i class="zmdi zmdi-run"></i> Yes, Exit!',
            cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancel!'
        }).then(function () {
            window.location.href="index.html";
        });
    });
	$('.btn-menu-dashboard').on('click', function(e){
		e.preventDefault();
		var body=$('.dashboard-contentPage');
		var sidebar=$('.dashboard-sideBar');
		if(sidebar.css('pointer-events')=='none'){
			body.removeClass('no-paddin-left');
			sidebar.removeClass('hide-sidebar').addClass('show-sidebar');
		}else{
			body.addClass('no-paddin-left');
			sidebar.addClass('hide-sidebar').removeClass('show-sidebar');
		}
	});
	
});
(function($){
    $(window).on("load",function(){
        $(".dashboard-sideBar-ct").mCustomScrollbar({
        	theme:"light-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
        $(".dashboard-contentPage, .Notifications-body").mCustomScrollbar({
        	theme:"dark-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
    });
})(jQuery);