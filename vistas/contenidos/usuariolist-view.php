<!-- Content page-Descripcion del formulario -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-accounts-alt "></i> Usuarios </h1>
	</div>
	<p class="lead" align="justify">
		Esta funcionalidad del sistema, le permite añadir, actualizar, eliminar y consultar información de las personas que hacen uso (Empresa de Vigilancia) de las distintas funciones que permite realizar el sistema!
	</p>
</div>

<!-- Anclas para cambiar las paginas (registrar,listar,buscar). -->
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>usuario/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO USUARIO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>usuariolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE USUARIOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>usuariosearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR USUARIO
	  		</a>
	  	</li>
	</ul>
</div>
<?php require_once "./controladores/usuarioControlador.php";
	$usu = new usuarioControlador();
?>

<!-- panel listado de usuarios- LISTADO DE INFORMACION  -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE USUARIOS</h3>
		</div>
		<div class="panel-body">
			<?php
				$pagina = explode("/", $_GET['views']);
				echo $usu->config_tabla_controlador($pagina[1], 4);
			?>		
		</div>
	</div>
</div>