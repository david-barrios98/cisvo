
<script>
    $(document).ready(function (){
        $('.btn-exit-system').on('click', function(e){
            e.preventDefault();
            //La variable Token guarda el token enviado por el metodo GET
			var Token= $(this).attr('href');
            swal({
                title: 'Estas seguro?',
                text: "Cerrar la sesión y salir del sistema",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#03A9F4',
                cancelButtonColor: '#F44336',
                confirmButtonText: '<i class="zmdi zmdi-run"></i> Si, Salir!',
                cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Quedarme!'
            }).then(function () {
                //Cierre de se session con Ajax
                $.ajax({
					url:'<?php echo SERVERURL;?>ajax/loginAjax.php?Token='+Token,
					success:function(data){
						if (data=="true" || data==true || data=='true' || data!=false || data!="false"){
							window.location.href="<?php echo SERVERURL;?>login/";
						}else{
							swal(
								"Ocurrio un error",
								"No se pudo cerrar la sesión ",
								"error"
							);
						}
					}	
				});
            });
        });
    });
</script>