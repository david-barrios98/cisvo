<?php
    if ($_SESSION['rol_CISVO']!='A') {
        echo $insLogin->forzar_cierre_sesion_controlador();
    }     
?>
<div class="container-fluid">
<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i> Solicitudes<small> PERSONAS</small></h1>
	</div>
	<p class="lead">Este modulo del sistema permitirá el registro y busqueda de solicitudes, peticiones y quejas referentes a todo suceso que se presente en el estacionamiento. </p>
</div>
<!--ANCLAS PARA CAMBIAR DE FORMULARIOS-->
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>solicitudes/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA SOLICITUD
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>solicitudeslist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE SOLICITUDES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>solicitudsearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR SOLICITUD
	  		</a>
	  	</li>
	</ul>
</div>
<?php
	//Almacenamos la ultima busqueda en una v de sesion
	if (isset($_POST['busqueda_solicitud'])) {
		$_SESSION['busqueda_solicitud']=$_POST['busqueda_solicitud'];
	}

	//Eliminamos la busqueda
	if (isset($_POST['eliminar_busqueda_solicitud'])) {
		unset($_SESSION['busqueda_solicitud']);
	}
		
	if (!isset($_SESSION['busqueda_solicitud']) && empty($_SESSION['busqueda_solicitud'])):
?>
<!-- ZONA DE BUSQUEDA DEL FORMULARIO-->
<div class="container-fluid">
	<form class="well"  method="POST" action="" autocomplete="off">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<div class="form-group label-floating">
					<span class="control-label">¿Qué solicitud estas buscando?</span>
					<input pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð- ]{1,70}" class="form-control" type="text" name="busqueda_solicitud" required="" maxlength="70">
				</div>
			</div>
			<div class="col-xs-12">
				<p class="text-center">
					<button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-search"></i> &nbsp; Buscar</button>
				</p>
			</div>
		</div>
	</form>
</div>

<?php else:?>
<!--Ultima Busqueda-->
<div class="container-fluid">
	<form class="well"  method="POST" action="">
		<p class="lead text-center">Su última búsqueda  fue <strong>“<?php echo $_SESSION['busqueda_solicitud']?>”</strong></p>
		<div class="row">
			<input class="form-control" type="hidden" name="eliminar_busqueda_solicitud" required="">
			<div class="col-xs-12">
				<p class="text-center">
					<button type="submit" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-delete"></i> &nbsp; Eliminar búsqueda</button>
				</p>
			</div>
		</div>
	</form>
</div>

<!-- Panel listado de busqueda de vehiculos- RESULTADO DE LA BÚSQUEDA -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE SOLICITUDES</h3>
		</div>
		<div class="panel-body">
		<?php
			require_once "./controladores/solicitudesControlador.php";
			$insSolicitud= new solicitudControlador();
			$pagina = explode("/", $_GET['views']);
			echo $insSolicitud->cargar_tabla_solicitudes_controlador($pagina[1],1,$_SESSION['busqueda_solicitud']);
		?>
		</div>
	</div>
</div>
<?php endif;?>