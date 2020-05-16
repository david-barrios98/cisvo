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
	$('.FormularioAjax').submit(function(e){
        e.preventDefault(); //PREVENIR EL ENVIO POR DEFECTO (URL)

        var form=$(this); //SE ALMACENAN LOS ADATOS DE FORMULADO

        var tipo=form.attr('data-form'); //SE ALMACENA EL ATRIBUTO data-from
        var accion=form.attr('action'); //SE ALMACENA EL ATRIBUTO action
        var metodo=form.attr('method'); //SE ALMACENA EL ATRIBUTO method
        var respuesta=form.children('.RespuestaAjax'); //SE SELECIONANA UN HIJO DEL FORMCULARIO DONDE SE MOSTRARA LA RESPUESTA

        var msjError="<script>swal('Ocurrió un error inesperado','Por favor recargue la página','error');</script>";
        var formdata = new FormData(this); //ARRAY DE DATOS ENVIADOS POR AJAX
 

        var textoAlerta;
        if(tipo==="save"){
            textoAlerta="Los datos que enviaras quedaran almacenados en el sistema";
        }else if(tipo==="delete"){
            textoAlerta="Los datos serán eliminados completamente del sistema";
        }else if(tipo==="update"){
        	textoAlerta="Los datos del sistema serán actualizados";
        }else{
            textoAlerta="Quieres realizar la operación solicitada";
        }


        swal({
            title: "¿Estás seguro?",   
            text: textoAlerta,   
            type: "question",   
            showCancelButton: true,     
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
        }).then(function () {
            $.ajax({
                type: metodo,
                url: accion,
                data: formdata ? formdata : form.serialize(), //SE VALIDA UE LA VARIABLE fromdata VENGA DEIFINA
                cache: false,
                contentType: false,
                processData: false,
                xhr: function(){
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                      if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        if(percentComplete<100){
                        	respuesta.html('<p class="text-center">Procesado... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
                            alert('error,')
                        }else{
                      		respuesta.html('<p class="text-center"></p>');
                      	}
                      }
                    }, false);
                    return xhr;
                },
                success: function (data){
                    respuesta.html(data);
                    alert('acepta :'+ data)
                },
                error: function() {
                    respuesta.html(msjError);
                    alert('error :' +data);
                }
            });
            return false;
        });
        
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